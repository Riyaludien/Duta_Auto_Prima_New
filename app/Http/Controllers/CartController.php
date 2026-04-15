<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Barang;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\PesananBaruBarang;
use App\Mail\NotifPesananAdminBarang;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    // 1. Menampilkan halaman keranjang
    public function index()
    {
        $cartItems = Cart::with('barang')->where('user_id', Auth::id())->get();
        $total = $cartItems->sum(function ($item) {
            return $item->barang->harga * $item->jumlah;
        });

        return view('user.cart.index', compact('cartItems', 'total'));
    }

    // 2. FUNGSI YANG HILANG: Menambah barang ke keranjang
    public function add(Request $request, $id)
    {
        $request->validate([
            'jumlah' => 'required|integer|min:1'
        ]);

        $barang = Barang::findOrFail($id);

        // Cegah melebihi stok
        if ($request->jumlah > $barang->stok) {
            return back()->with('error', 'Jumlah melebihi stok!');
        }

        $cart = Cart::where('user_id', Auth::id())
            ->where('barang_id', $id)
            ->first();

        if ($cart) {
            $total = $cart->jumlah + $request->jumlah;

            if ($total > $barang->stok) {
                return back()->with('error', 'Jumlah melebihi stok!');
            }

            $cart->update([
                'jumlah' => $total
            ]);
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'barang_id' => $id,
                'jumlah' => $request->jumlah
            ]);
        }

        return redirect()->back()->with('success', 'Barang berhasil ditambah ke keranjang!');
    }

    // 3. FUNGSI YANG HILANG: Menghapus barang dari keranjang
    public function destroy($id)
    {
        $cart = Cart::where('user_id', Auth::id())->findOrFail($id);
        $cart->delete();
        return redirect()->back()->with('success', 'Barang dihapus dari keranjang.');
    }

    // 4. Proses Checkout
    public function checkout(Request $request)
    {
        $request->validate([
            'metode_pembayaran' => 'required',
            'no_wa' => 'required|numeric|min:10',
            'selected_items' => 'required|array|min:1'
        ]);

        $userId = Auth::id();
        $user = Auth::user();

        $cartItems = Cart::with('barang')
            ->where('user_id', $userId)
            ->whereIn('id', $request->selected_items)
            ->get();

        if ($cartItems->isEmpty()) {
            return back()->with('error', 'Keranjang kosong!');
        }

        // ================= TOTAL =================
        $total = $cartItems->sum(function ($item) {
            return $item->barang->harga * $item->jumlah;
        });

        // ================= PESAN WA =================
        $message = "Halo admin, saya {$user->name} sudah checkout.%0A%0A";
        $message .= "🛒 *Detail Pesanan:*%0A";

        foreach ($cartItems as $item) {
            $subtotal = $item->barang->harga * $item->jumlah;

            $message .= "- {$item->barang->nama_barang} ({$item->jumlah}x) - Rp "
                . number_format($subtotal, 0, ',', '.') . "%0A";
        }

        $message .= "%0A💰 *Total:* Rp " . number_format($total, 0, ',', '.') . "%0A";
        $message .= "📱 No WA: {$request->no_wa}%0A";
        $message .= "💳 Metode: {$request->metode_pembayaran}%0A%0A";
        $message .= "Mohon konfirmasi ya 🙏";

        try {
            DB::transaction(function () use ($userId, $user, $cartItems, $request, $total) {

                $transaksi = Transaksi::create([
                    'user_id' => $userId,
                    'total_harga' => $total,
                    'status' => 'Pending',
                    'metode_pembayaran' => $request->metode_pembayaran,
                    'no_wa' => $request->no_wa,
                ]);

                foreach ($cartItems as $item) {
                    DetailTransaksi::create([
                        'transaksi_id' => $transaksi->id,
                        'barang_id' => $item->barang_id,
                        'jumlah' => $item->jumlah,
                        'harga' => $item->barang->harga,
                    ]);

                    $item->barang->decrement('stok', $item->jumlah);
                }

                Cart::where('user_id', $userId)
                    ->whereIn('id', $request->selected_items)
                    ->delete();

                Mail::to($user->email)->send(new PesananBaruBarang($transaksi));
                Mail::to('novieanramadan@gmail.com')->send(new NotifPesananAdminBarang($transaksi));
            });

            return redirect()->route('riwayat.index')
                ->with('checkout_success', true)
                ->with('wa_message', $message);

        } catch (\Exception $e) {
            Log::error('Error Checkout: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan. Coba lagi.');
        }
    }

    public function updateQty(Request $request, $id)
    {
        $cart = Cart::with('barang')->findOrFail($id);

        if ($request->action == 'plus') {
            $cart->jumlah++;
        } elseif ($request->action == 'minus' && $cart->jumlah > 1) {
            $cart->jumlah--;
        }

        $cart->save();

        $subtotal = $cart->jumlah * $cart->barang->harga;

        return response()->json([
            'success' => true,
            'jumlah' => $cart->jumlah,
            'subtotal' => $subtotal
        ]);
    }

}