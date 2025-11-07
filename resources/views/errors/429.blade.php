<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>429 ─ Too Many Requests</title>
    <link rel="icon" href="assets/Logo Encryptour.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="bg-vanilla min-h-screen flex items-center justify-center font-montserrat relative select-none">

    {{-- Soft background gradient --}}
    <div class="absolute inset-0 bg-gradient-to-br from-chocolate/20 via-vanilla to-transparent"></div>

    {{-- Wrapper --}}
    <div
        class="relative w-[90%] sm:w-[70%] md:w-[50%] lg:w-[35%] p-8 rounded-3xl 
                bg-mocca/20 backdrop-blur-xl shadow-xl shadow-chocolate/20">
        <div class="mt-2 md-2 flex flex-col items-center text-chocolate">



            {{-- Logo --}}
            <img src="{{ asset('assets/Logo Encryptour.png') }}" alt="Encryptour Logo"
                class="w-24 md:w-32 drop-shadow-xl mb-4 animate-[fadeIn_0.8s_ease]">

            {{-- Main number --}}
            <h1
                class="text-7xl md:text-8xl font-extrabold drop-shadow-xl
                   tracking-widest animate-[fadeIn_0.8s_ease]">
                429
            </h1>

            {{-- Title --}}
            <p class="text-xl md:text-2xl font-bold mt-1 tracking-wide">
                Too Many Requests
            </p>

            {{-- Subtext --}}
            <p class="text-center mt-3 text-chocolate/70 text-sm md:text-base px-4 leading-relaxed">
                You've made too many requests within a short period.
                Please slow down — the server needs room to breathe.
            </p>

            {{-- Countdown --}}
            <div class="mt-4 text-chocolate font-semibold text-lg">
                Retry in
                <span id="timer" class="text-red-600 font-bold">{{ $retryAfter }}</span>
                seconds.
            </div>

            {{-- Button --}}
            <a id="backBtn" href="{{ route('login') }}"
                class="mt-6 px-8 py-3 rounded-full bg-chocolate text-vanilla shadow-lg
                  hover:shadow-xl hover:bg-chocolate/90 transition-all duration-300
                  backdrop-blur-sm text-sm md:text-base font-semibold">
                Back to Login
            </a>

            {{-- Decorative bottom fade --}}
            <div
                class="absolute bottom-0 inset-x-0 h-10 bg-gradient-to-t from-chocolate/10 to-transparent rounded-b-3xl">
            </div>
        </div>
    </div>

    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(6px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
    <script>
        const retry = {{ $retryAfter ?? 60 }};
        const key = 'throttle_expire';
        const timerEl = document.getElementById('timer');
        const btn = document.getElementById('backBtn');

        let expireAt = localStorage.getItem(key);

        if (!expireAt) {
            expireAt = Date.now() + (retry * 1000);
            localStorage.setItem(key, expireAt);
        }

        function tick() {
            const diff = Math.floor((expireAt - Date.now()) / 1000);

            if (diff <= 0) {
                localStorage.removeItem(key);
                timerEl.textContent = 0;

                btn.classList.remove('bg-chocolate', 'text-vanilla');
                btn.classList.add('bg-green-600', 'text-white', 'animate-pulse');

                btn.textContent = "Retry Login";

                return;
            }

            timerEl.textContent = diff;
        }

        tick();
        setInterval(tick, 1000);
    </script>

</body>

</html>
