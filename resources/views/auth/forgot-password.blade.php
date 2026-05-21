<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password - Bengkel MOMO</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --primary-blue: #2563eb;
            --primary-blue-hover: #1e40af;
            --bg-main: #f8fafc;
            --surface-white: #ffffff;
            --surface-light: #eff6ff;
            --border-light: #e2e8f0;
            --accent-blue: #38bdf8;
            --accent-soft: #dbeafe;
            --text-main: #0f172a;
            --text-muted: #64748b;
        }

        body {
            background: var(--bg-main);
        }

        .card {
            background: var(--surface-white);
            border: 1px solid var(--border-light);
            border-radius: 16px;
        }

        input {
            background: var(--surface-light) !important;
            border-color: var(--border-light) !important;
            color: var(--text-main) !important;
        }

        input:focus {
            border-color: var(--primary-blue) !important;
            box-shadow: 0 0 0 2px var(--accent-soft) !important;
        }

        button {
            background: var(--primary-blue) !important;
        }

        button:hover {
            background: var(--primary-blue-hover) !important;
        }

        .left-bg {
            background: linear-gradient(135deg, var(--primary-blue), var(--accent-blue));
            color: white;
        }

        /* animasi mobil */
        @keyframes driveIn {
            0% {
                transform: translateX(-300px);
                opacity: 0;
            }

            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .car-img {
            animation: driveIn 2s ease-out forwards;
            filter: drop-shadow(0 10px 15px rgba(0, 0, 0, 0.3));
        }

    </style>
</head>

<body>

    <div class="min-h-screen flex">

        <!-- LEFT -->
        <div class="hidden md:flex w-1/2 left-bg items-center justify-center p-10">
            <div class="text-center max-w-md">
                <h1 class="text-4xl font-bold mb-4">Bengkel MOMO</h1>
                <p class="opacity-90">
                    Lupa password? Tenang, kita bantu kamu balik ke jalan 🚗
                </p>

                <div class="mt-10 flex justify-center">
                    <img src="{{ asset('images/mobil.png') }}" class="car-img" width="220">
                </div>
            </div>
        </div>

        <!-- RIGHT -->
        <div class="w-full md:w-1/2 flex items-center justify-center px-6">

            <div class="card w-full max-w-md p-8 shadow-lg">

                <div class="mb-4">
                    <a href="{{ route('login') }}" class="inline-flex items-center text-sm font-medium transition" style="color: var(--primary-blue);">
                        <span class="mr-2">←</span> Kembali ke Login
                    </a>
                </div>

                <h2 class="text-2xl font-bold mb-4 text-center">Reset Password</h2>

                <div class="mb-4 text-sm text-gray-600 text-center">
                    Masukkan email kamu, nanti kami kirim link untuk reset password.
                </div>

                <!-- STATUS -->
                <x-auth-session-status class="mb-4 text-green-500 text-center" :status="session('status')" />

                <!-- FORM ASLI -->
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button>
                            Kirim Link Reset
                        </x-primary-button>
                    </div>
                </form>

            </div>
        </div>

    </div>

</body>
</html>
