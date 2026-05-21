@extends('layouts.user')

@section('title', 'Bengkel Momo - Booking Service Mudah & Terpercaya')

@section('content')
    <div class="container py-5">

        <!-- HERO -->
        <div class="p-5 rounded-4 text-white mb-5"
            style="background: linear-gradient(135deg, var(--primary-blue), var(--primary-blue-hover));">

            <h1 class="fw-bold mb-3">Inspeksi Mobil Profesional</h1>

            <p style="max-width:600px;">
                Pastikan kendaraan Anda dalam kondisi terbaik sebelum digunakan.
                Inspeksi menyeluruh membantu mendeteksi potensi kerusakan lebih awal,
                sehingga Anda terhindar dari risiko besar di kemudian hari.
            </p>

            <button class="btn rounded-pill px-4 mt-3" style="background:white; color:var(--primary-blue); font-weight:600;"
                onclick="document.getElementById('booking').scrollIntoView({behavior:'smooth'})">
                Inspeksi Mobil Anda Sekarang
            </button>
        </div>


        <!-- KEUNGGULAN -->
        <div class="mb-5 text-center">
            <h4 class="fw-bold mb-4">Kenapa Perlu Inspeksi?</h4>

            <div class="row g-4">

                <div class="col-md-4">
                    <div class="p-4 h-100 rounded-4 shadow-sm"
                        style="background: var(--surface-white); border:1px solid var(--border-light);">

                        <h6 class="fw-bold">Deteksi Dini Kerusakan</h6>
                        <p class="text-muted small mb-0">
                            Masalah kecil bisa diketahui sebelum menjadi kerusakan besar.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="p-4 h-100 rounded-4 shadow-sm"
                        style="background: var(--surface-white); border:1px solid var(--border-light);">

                        <h6 class="fw-bold">Keamanan Berkendara</h6>
                        <p class="text-muted small mb-0">
                            Semua sistem dicek agar kendaraan tetap aman digunakan.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="p-4 h-100 rounded-4 shadow-sm"
                        style="background: var(--surface-white); border:1px solid var(--border-light);">

                        <h6 class="fw-bold">Lebih Hemat Biaya</h6>
                        <p class="text-muted small mb-0">
                            Mencegah biaya besar akibat kerusakan yang terlambat ditangani.
                        </p>
                    </div>
                </div>

            </div>
        </div>


        <!-- YANG DICEK -->
        <div class="mb-5">
            <h4 class="fw-bold mb-4">Apa Saja yang Diperiksa?</h4>

            <div class="row g-4">

                <div class="col-md-3">
                    <div class="card border-0 shadow-sm h-100">
                        <img src="{{ asset('storage/katalog/mesin.jpeg') }}" style="height:160px; object-fit:cover;">
                        <div class="card-body">
                            <h6 class="fw-bold">Mesin</h6>
                            <p class="small text-muted mb-0">
                                Kondisi performa dan potensi kebocoran.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card border-0 shadow-sm h-100">
                        <img src="{{ asset('storage/katalog/kaki.jpeg') }}" style="height:160px; object-fit:cover;">
                        <div class="card-body">
                            <h6 class="fw-bold">Kaki-Kaki</h6>
                            <p class="small text-muted mb-0">
                                Suspensi, shockbreaker, dan kestabilan kendaraan.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card border-0 shadow-sm h-100">
                        <img src="{{ asset('storage/katalog/lampu.jpeg') }}" style="height:160px; object-fit:cover;">
                        <div class="card-body">
                            <h6 class="fw-bold">Kelistrikan</h6>
                            <p class="small text-muted mb-0">
                                Lampu, aki, dan sistem kelistrikan lainnya.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card border-0 shadow-sm h-100">
                        <img src="{{ asset('storage/katalog/rem.jpeg') }}" style="height:160px; object-fit:cover;">
                        <div class="card-body">
                            <h6 class="fw-bold">Sistem Rem</h6>
                            <p class="small text-muted mb-0">
                                Keamanan pengereman kendaraan.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <!-- CTA -->
        <div id="booking" class="text-center p-5 rounded-4" style="background: var(--surface-light);">

            <h4 class="fw-bold mb-2">Jangan Tunggu Sampai Bermasalah</h4>

            <p class="text-muted mb-4">
                Inspeksi rutin adalah langkah kecil yang menjaga kendaraan Anda tetap aman,
                nyaman, dan siap digunakan kapan saja.
            </p>

            <button class="btn btn-primary rounded-pill px-5 py-2">
                Booking Inspeksi Sekarang
            </button>
        </div>

    </div>




@endsection