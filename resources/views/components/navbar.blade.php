<nav class="items-center sticky top-0 left-0 w-full bg-mocca shadow-md p-4 z-50 drop-shadow-xl">
    <div class="max-w-full px-2 sm:px-6 lg:px-8">

        <div class="flex items-center justify-between h-10">
            <div class="flex items-center">
                {{-- kalo mau kasi logo encryptour --}}
                {{-- <img class="h-14 w-auto " src="{{ asset('logo.png') }}" alt="Your Company"> --}}

                <a href="/" class="text-2xl font-bold text-vanilla">ENCRYPTOUR</a>
            </div>
            <!-- Menu NAvigasi -->
            <div class="hidden sm:flex sm:ml-auto lg:mr-4 font-semibold">
                <div class="flex space-x-10 items-center">
                    <a href="/"
                        class="{{ request()->is('/') ? 'underline underline-offset-4' : '' }} rounded-md px-3 py-2 text-md font-semibold text-vanilla hover:bg-chocolate hover:text-vanilla">Home</a>
                    <a href="/identity"
                        class="{{ request()->is('identity') ? 'underline underline-offset-4' : '' }} rounded-md px-3 py-2 text-md font-semibold text-vanilla hover:bg-chocolate hover:text-vanilla"
                        >Identity</a>
                    <a href="/biodata"
                        class="{{ request()->is('biodata') ? 'underline underline-offset-4' : '' }} rounded-md px-3 py-2 text-md font-semibold text-vanilla hover:bg-chocolate hover:text-vanilla"
                        >Biodata</a>
                    <a href="/gallery"
                        class="{{ request()->is('gallery') ? 'underline underline-offset-4' : '' }} rounded-md px-3 py-2 text-md font-semibold text-vanilla hover:bg-chocolate hover:text-vanilla"
                        >Gallery</a>
                </div>
            </div>

            <!-- Mobile Menu Button -->
            <div class="sm:hidden">
                <button type="button"
                    class="relative inline-flex items-center justify-center rounded-md p-2 hover:text-vanilla focus:outline-none focus:ring-2 focus:ring-inset focus:ring-vanilla"
                    aria-controls="mobile-menu" aria-expanded="false"
                    onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
                    <span class="sr-only">Open main menu</span>
                    {{-- tutup --}}
                    <svg class="block text-vanilla size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    {{-- buka --}}
                    <svg class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="sm:hidden hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2">
            <a href="/"
                class="block rounded-md px-3 py-2 text-base font-semibold text-vanilla hover:bg-chocolate">Home</a>
            <a href="/identity"
                class="block rounded-md px-3 py-2 text-base font-semibold hover:bg-chocolate text-vanilla">Identity</a>
            <a href="/biodata"
                class="block rounded-md px-3 py-2 text-base font-semibold hover:bg-chocolate text-vanilla">Biodata</a>
            <a href="/gallery"
                class="block rounded-md px-3 py-2 text-base font-semibold hover:bg-chocolate text-vanilla">Gallery</a>
        </div>
    </div>
</nav>
