@extends('layouts.user')

@section('content')

    <style>
        .cart-card {
            border-radius: 16px;
            transition: 0.2s;
        }

        .cart-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        }

        .cart-img {
            width: 90px;
            height: 90px;
            object-fit: cover;
            border-radius: 12px;
        }

        .summary-card {
            border-radius: 16px;
            position: sticky;
            top: 100px;
        }

        .checkout-btn {
            border-radius: 12px;
            font-size: 16px;
        }

        .selectable-card {
            cursor: pointer;
        }

        .selectable-card.active {
            border: 2px solid #3b82f6;
            background: #eff6ff;
        }

        .selectable-card.active {
            transform: scale(1.01);
        }

        .popup-wa {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
        }

        .popup-content {
            background: white;
            padding: 25px;
            border-radius: 16px;
            width: 320px;
            text-align: center;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from {
                transform: scale(0.9);
                opacity: 0;
            }

            to {
                transform: scale(1);
                opacity: 1;
            }
        }
    </style>

    <div class="container py-5" style="background:#f1f5f9; min-height:100vh;">

        <h3 class="fw-bold mb-4">🛒 Keranjang Belanja</h3>

        @if($cartItems->isEmpty())
            <div class="text-center py-5">
                <p class="text-muted">Keranjang kosong 😢</p>
                <a href="/katalog" class="btn btn-primary rounded-pill">Belanja</a>
            </div>
        @else

            @if ($errors->any())
                <div class="alert alert-danger">
                    {{ implode('', $errors->all(':message')) }}
                </div>
            @endif

            <div class="row g-4">

                <form action="{{ route('checkout') }}" method="POST" class="row g-4 w-100">
                    @csrf

                    <!-- ================= LIST ================= -->
                    <div class="col-lg-8">

                        <!-- PILIH SEMUA -->
                        <div class="mb-3 form-check">
                            <input type="checkbox" id="checkAll" class="form-check-input">
                            <label for="checkAll" class="form-check-label fw-semibold">
                                Pilih Semua
                            </label>
                        </div>

                        @foreach($cartItems as $item)
                            <div class="card border-0 shadow-sm mb-3 cart-card selectable-card" data-id="{{ $item->id }}">
                                <div class="card-body d-flex align-items-center gap-3">

                                    <!-- CHECKBOX -->
                                    <input type="checkbox" name="selected_items[]" value="{{ $item->id }}"
                                        class="item-checkbox d-none" data-harga="{{ $item->barang->harga * $item->jumlah }}">
                                    <!-- IMAGE -->
                                    <img src="{{ asset('storage/' . $item->barang->gambar) }}" class="cart-img">

                                    <!-- INFO -->
                                    <div class="flex-grow-1">
                                        <h6 class="fw-bold mb-1">
                                            {{ $item->barang->nama_barang }}
                                        </h6>
                                        <small class="text-muted">
                                            Jumlah: <span id="qty-{{ $item->id }}">{{ $item->jumlah }}</span>
                                        </small>
                                    </div>

                                    <!-- QTY -->
                                    <div class="d-flex align-items-center gap-2">
                                        <button type="button" class="btn btn-sm btn-outline-secondary"
                                            onclick="updateQty({{ $item->id }}, 'minus')">-</button>

                                        <span class="fw-semibold" id="qty2-{{ $item->id }}">
                                            {{ $item->jumlah }}
                                        </span>

                                        <button type="button" class="btn btn-sm btn-outline-secondary"
                                            onclick="updateQty({{ $item->id }}, 'plus')">+</button>
                                    </div>

                                    <!-- HARGA -->
                                    <div class="fw-bold text-primary">
                                        Rp {{ number_format($item->barang->harga, 0, ',', '.') }}
                                    </div>

                                    <!-- DELETE -->
                                    <button type="button" onclick="deleteItem({{ $item->id }})"
                                        class="btn btn-sm btn-light text-danger">
                                        🗑
                                    </button>

                                </div>
                            </div>
                        @endforeach

                    </div>

                    <!-- ================= SUMMARY ================= -->
                    <div class="col-lg-4">
                        <div class="card border-0 shadow-lg p-4 summary-card">

                            <h5 class="fw-bold mb-3">Ringkasan</h5>

                            <div class="d-flex justify-content-between mb-3">
                                <span>Total</span>
                                <span id="totalHarga" class="fw-bold text-primary">Rp 0</span>
                            </div>

                            <input type="text" name="no_wa" class="form-control mb-3" placeholder="Nomor WhatsApp" required>

                            <select name="metode_pembayaran" class="form-select mb-3" required onchange="toggleRekening(this)">
                                <option value="">Pilih Pembayaran</option>
                                <option value="Transfer Bank">Transfer Bank</option>
                                <option value="Bayar di Bengkel">Bayar di Tempat (COD) </option>
                            </select>

                            <div id="infoRekening" class="p-3 mb-3"
                                style="display:none; background:#e0f2fe; border-radius:12px;">
                                <small>Transfer ke:</small><br>
                                <b>BCA - 1690316141</b><br>
                                A.N DIMAS
                            </div>

                            <button type="submit" class="btn btn-primary w-100 py-2 fw-bold checkout-btn">
                                Checkout
                            </button>

                        </div>
                    </div>

                </form>
            </div>

        @endif
    </div>

    <!-- DELETE FORM -->
    <form id="deleteForm" method="POST" style="display:none;">
        @csrf
        @method('DELETE')
    </form>

    @if(session('checkout_success'))
        <div id="popupWA" class="popup-wa">
            <div class="popup-content">

                <h5 class="fw-bold mb-2">🎉 Pesanan Berhasil!</h5>
                <p class="text-muted mb-3">
                    Silakan lanjutkan chat admin untuk konfirmasi pesanan kamu.
                </p>

                <div class="d-flex gap-2">
                    <a href="https://wa.me/6283838762064?text={{ urlencode(session('wa_message')) }}" target="_blank"
                        class="btn btn-success w-100">
                        💬 Chat Admin
                    </a>

                    <button onclick="closePopup()" class="btn btn-light">
                        Nanti
                    </button>
                </div>

            </div>
        </div>
    @endif

    <script>
        // DELETE
        function deleteItem(id) {
            if (confirm('Hapus item ini?')) {
                let form = document.getElementById('deleteForm');
                form.action = '/cart/delete/' + id;
                form.submit();
            }
        }

        // CHECK ALL
        document.getElementById('checkAll').addEventListener('change', function () {
            document.querySelectorAll('.item-checkbox').forEach(cb => {
                cb.checked = this.checked;

                let card = cb.closest('.selectable-card');
                if (this.checked) {
                    card.classList.add('active');
                } else {
                    card.classList.remove('active');
                }
            });
            updateTotal();
        });

        // TOTAL
        const checkboxes = document.querySelectorAll('.item-checkbox');
        const totalDisplay = document.getElementById('totalHarga');

        function updateTotal() {
            let total = 0;
            checkboxes.forEach(cb => {
                if (cb.checked) {
                    total += parseInt(cb.dataset.harga);
                }
            });
            totalDisplay.innerText = 'Rp ' + total.toLocaleString('id-ID');
        }

        checkboxes.forEach(cb => {
            cb.addEventListener('change', updateTotal);
        });

        // REKENING
        function toggleRekening(select) {
            document.getElementById('infoRekening').style.display =
                select.value === 'Transfer Bank' ? 'block' : 'none';
        }

        // UPDATE QTY
        function updateQty(id, action) {
            fetch(`/cart/update/${id}`, {
                method: 'POST'
                , headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    , 'Content-Type': 'application/json'
                }
                , body: JSON.stringify({
                    action: action
                })
            })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById(`qty-${id}`).innerText = data.jumlah;
                        document.getElementById(`qty2-${id}`).innerText = data.jumlah;

                        let checkbox = document.querySelector(`.item-checkbox[value="${id}"]`);
                        checkbox.dataset.harga = data.subtotal;

                        updateTotal();
                    }
                });
        }

    </script>

    <script>
        document.querySelectorAll('.selectable-card').forEach(card => {
            card.addEventListener('click', function (e) {

                // biar tombol +/- ga ikut ke-trigger
                if (e.target.tagName === 'BUTTON' || e.target.tagName === 'I') {
                    return;
                }

                let id = this.dataset.id;
                let checkbox = document.querySelector(`.item-checkbox[value="${id}"]`);

                checkbox.checked = !checkbox.checked;

                this.classList.toggle('active');

                updateTotal();
            });
        });

    </script>

    <script>
        function closePopup() {
            document.getElementById('popupWA').style.display = 'none';
        }
    </script>

@endsection