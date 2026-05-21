<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Bengkel MOMO</title>
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

        /* Override Breeze input */
        input {
            background: var(--surface-light) !important;
            border-color: var(--border-light) !important;
            color: var(--text-main) !important;
        }

        input:focus {
            border-color: var(--primary-blue) !important;
            box-shadow: 0 0 0 2px var(--accent-soft) !important;
        }

        /* Button override */
        button {
            background: var(--primary-blue) !important;
        }

        button:hover {
            background: var(--primary-blue-hover) !important;
        }

        /* LEFT BG */
        .left-bg {
            background: linear-gradient(135deg, var(--primary-blue), var(--accent-blue));
            color: white;
        }

        /* Animasi mobil */
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
                    Sistem servis kendaraan modern dalam satu platform.
                </p>

                <!-- GAMBAR MOBIL -->
                <div class="mt-10 flex justify-center">
                    <img src="{{ asset('images/mobil.png') }}" class="car-img" width="220">
                </div>
            </div>
        </div>

        <!-- RIGHT -->
        <div class="w-full md:w-1/2 flex items-center justify-center px-6">

            <div class="card w-full max-w-md p-8 shadow-lg">

                <div class="mb-4">
                    <a href="{{ route('beranda') }}" class="inline-flex items-center text-sm font-medium transition" style="color: var(--primary-blue);">
                        <span class="mr-2">←</span> Lihat tanpa Login
                    </a>
                </div>

                <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>

                <!-- FORM ASLI (JANGAN DIUBAH STRUKTURNYA) -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember -->
                    <div class="block mt-4">
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="remember" class="rounded border-gray-300 text-indigo-600 shadow-sm">
                            <span class="ms-2 text-sm text-gray-600">Remember me</span>
                        </label>
                    </div>

                    <!-- Action -->
                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                        <a class="text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            Forgot password?
                        </a>
                        @endif

                        <x-primary-button class="ms-3">
                            Log in
                        </x-primary-button>
                    </div>
                </form>

            </div>
        </div>

    </div>

</body>
</html>
