<nav class="sticky z-50">
    <div
        class="max-w-full px-2 sm:px-4 lg:px-8 bg-mocca items-center fixed top-0 left-0 w-full shadow-md p-2 md:p-4 z-10 drop-shadow-xl">
        <div class="flex items-center justify-between h-10">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="/" class="flex items-center gap-2 text-2xl font-bold text-vanilla">
                    <img class="h-10 w-auto md:h-14 lg:h-15" src="{{ asset('assets/Logo Encryptour.png') }}"
                        alt="Logo Encryptour">
                    <span class="hidden sm:inline">ENCRYPTOUR</span>
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden sm:flex sm:ml-auto lg:mr-4 font-semibold">
                <div class="flex space-x-10 items-center transition-all">
                    <a href="/"
                        class="{{ request()->is('/') ? 'underline underline-offset-4 animate-floatglow' : '' }} rounded-md px-3 py-2 text-md font-semibold text-vanilla hover:bg-chocolate hover:text-vanilla transition-all duration-300 transform hover:scale-105 hover:-translate-y-1">
                        <i class="fa fa-home"></i>
                        Home
                    </a>
                    <a href="/identity"
                        class="{{ request()->is('identity') ? 'underline underline-offset-4 animate-floatglow' : '' }} rounded-md px-3 py-2 text-md font-semibold text-vanilla hover:bg-chocolate hover:text-vanilla transition-all duration-300 transform hover:scale-105 hover:-translate-y-1">
                        <i class="fa fa-info-circle"></i>
                        Identity
                    </a>
                    <a href="/biodata"
                        class="{{ request()->is('biodata') ? 'underline underline-offset-4 animate-floatglow' : '' }} rounded-md px-3 py-2 text-md font-semibold text-vanilla hover:bg-chocolate hover:text-vanilla transition-all duration-300 transform hover:scale-105 hover:-translate-y-1">
                        <i class="fa fa-users"></i>
                        Biodata
                    </a>
                    <a href="/gallery"
                        class="{{ request()->is('gallery') ? 'underline underline-offset-4 animate-floatglow' : '' }} rounded-md px-3 py-2 text-md font-semibold text-vanilla hover:bg-chocolate hover:text-vanilla transition-all duration-300 transform hover:scale-105 hover:-translate-y-1">
                        <i class="fa fa-picture-o"></i>
                        Gallery
                    </a>
                </div>
            </div>

            <!-- Mobile Menu Button -->
            <div class="sm:hidden">
                <button id="opennav" type="button"
                    class="relative transition-all duration-300 inline-flex items-center justify-center rounded-md p-2 hover:text-vanilla focus:outline-none focus:ring-2 focus:ring-inset focus:ring-vanilla">
                    <span class="sr-only">Open main menu</span>
                    <!-- Icon open -->
                    <svg id="icon-open" class="block text-vanilla size-6" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!-- Icon close -->
                    <svg id="icon-close" class="hidden text-vanilla size-6" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="sm:hidden w-full h-full fixed flex justify-end z-40 mt-12 hidden" id="nav">
        <div class="space-y-1 bg-mocca px-4 pb-6 pt-4 w-2/3 h-full shadow-lg transition-all duration-300 opacity-0 translate-x-full"
            id="navContent">
            <a href="/"
                class="block rounded-md px-3 py-2 text-base font-semibold text-vanilla hover:bg-chocolate">
                <i class="fa fa-home"></i>
                Home
            </a>
            <a href="/identity"
                class="block rounded-md px-3 py-2 text-base font-semibold text-vanilla hover:bg-chocolate">
                <i class="fa fa-info-circle"></i>
                Identity
            </a>
            <a href="/biodata"
                class="block rounded-md px-3 py-2 text-base font-semibold text-vanilla hover:bg-chocolate">
                <i class="fa fa-users"></i>
                Biodata
            </a>
            <a href="/gallery"
                class="block rounded-md px-3 py-2 text-base font-semibold text-vanilla hover:bg-chocolate">
                <i class="fa fa-picture-o"></i>
                Gallery
            </a>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const nav = document.getElementById('nav');
        const navContent = document.getElementById('navContent');
        const openBtn = document.getElementById('opennav');
        const iconOpen = document.getElementById('icon-open');
        const iconClose = document.getElementById('icon-close');

        openBtn.addEventListener('click', () => {
            const isOpen = !nav.classList.contains('hidden');

            if (isOpen) {
                // close
                navContent.classList.add('opacity-0', 'translate-x-full');
                navContent.classList.remove('opacity-100', 'translate-x-0');
                iconClose.classList.add('hidden');
                iconOpen.classList.remove('hidden');
                setTimeout(() => nav.classList.add('hidden'), 300);
            } else {
                // open
                nav.classList.remove('hidden');
                setTimeout(() => {
                    navContent.classList.remove('opacity-0', 'translate-x-full');
                    navContent.classList.add('opacity-100', 'translate-x-0');
                    iconOpen.classList.add('hidden');
                    iconClose.classList.remove('hidden');
                }, 10);
            }
        });

        // Klik background untuk close
        nav.addEventListener('click', (e) => {
            if (e.target === nav) openBtn.click();
        });
    });
</script>
