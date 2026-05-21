<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - Bengkel MOMO</title>
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
            0% { transform: translateX(-300px); opacity: 0; }
            100% { transform: translateX(0); opacity: 1; }
        }

        .car-img {
            animation: driveIn 2s ease-out forwards;
            filter: drop-shadow(0 10px 15px rgba(0,0,0,0.3));
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
                Daftar sekarang dan nikmati kemudahan servis kendaraan digital 🚗
            </p>

            <div class="mt-10 flex justify-center">
                <img src="{{ asset('images/mobil.png') }}" class="car-img" width="220">
            </div>
        </div>
    </div>

    <!-- RIGHT -->
    <div class="w-full md:w-1/2 flex items-center justify-center px-6">

        <div class="card w-full max-w-md p-8 shadow-lg">

            <h2 class="text-2xl font-bold mb-6 text-center">Register</h2>

            <!-- FORM ASLI (AMAN) -->
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full"
                        type="text" name="name" :value="old('name')" required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full"
                        type="email" name="email" :value="old('email')" required />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full"
                        type="password" name="password" required />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                        type="password" name="password_confirmation" required />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Action -->
                <div class="flex items-center justify-end mt-4">
                    <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-gray-900">
                        Sudah punya akun?
                    </a>

                    <x-primary-button class="ms-4">
                        Daftar
                    </x-primary-button>
                </div>

            </form>

        </div>
    </div>

</div>

</body>
</html>