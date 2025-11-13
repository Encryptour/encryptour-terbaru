<x-app-layout>
    <div class="flex h-screen items-center justify-center text-wrap text-chocolate">
        <div class="text items-center text-center">
            <div class="w-50 h-50 relative my-10 mx-auto">
                <img class="w-40 mx-auto h-40 transition-all  spin-reverse " src="{{ asset('assets/maintenance.png') }}" alt="">
                <img class="h-24 w-24 absolute top-1/3 left-1/2 transition-all animate-spin-slow" src="{{ asset('assets/maintenance.png') }}" alt="">
            </div>
            <h1 class="text-xl font-bold md:font-extrabold md:text-4xl">This Page Is Under Maintenance!</h1>
            <p class="text-lg md:text-2xl font-normal md:font-semibold">Relax, it's wont take a century!</p>
        </div>
        <style>
            @keyframes spin-reverse {
                0% {
                    transform: rotate(0deg);
                }

                100% {
                    transform: rotate(-360deg);
                }
            }
        </style>
    </div>


</x-app-layout>