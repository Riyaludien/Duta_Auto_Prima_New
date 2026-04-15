@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>Edit Barang</h2>

    <form action="{{ route('barangs.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" value="{{ old('nama_barang', $barang->nama_barang) }}" required>
        </div>

        <div class="mb-3">
            <label>Kategori</label>
            <select name="kategori_id" class="form-control" required>
                @foreach ($kategoris as $kategori)
                <option value="{{ $kategori->id }}" {{ $barang->kategori_id == $kategori->id ? 'selected' : '' }}>
                    {{ $kategori->nama_kategori }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stok" class="form-control" value="{{ old('stok', $barang->stok) }}" required>
        </div>

        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" value="{{ old('harga', $barang->harga) }}" required>
        </div>

        <div class="mb-3">
            <label>Supplier</label>
            <input type="text" name="supplier" class="form-control" value="{{ old('supplier', $barang->supplier) }}">
        </div>

        <div class="mb-3">
            <label>Gambar</label>

            <!-- PREVIEW GAMBAR LAMA -->
            <div class="mb-2">
                <img id="preview" src="{{ $barang->gambar ? asset('storage/' . $barang->gambar) : asset('images/katalog/default.jpg') }}" style="width:120px; height:120px; object-fit:cover; border-radius:10px;">
            </div>

            <!-- INPUT FILE -->
            <input type="file" name="gambar" class="form-control" accept="image/*" onchange="previewImage(event)">
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('barangs.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>

<script>
function previewImage(event){
    const reader = new FileReader();
    reader.onload = function(){
        document.getElementById('preview').src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}
</script>

@endsection
