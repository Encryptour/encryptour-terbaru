<x-app-layout>
    <!-- Modal Wrapper -->
    <div id="modal" class="hidden fixed inset-0 z-50 flex justify-center items-center bg-black bg-opacity-50">
        <!-- Content Modal -->
        <div id="modalContent" class="transform transition-all scale-95 opacity-0 w-[90vw] h-[90vh] shadow-xl
           bg-gradient-to-tl from-[#AD7D4F] to-[#EDB47E] mx-auto relative rounded-2xl overflow-hidden
           flex flex-col md:grid md:grid-cols-[auto_1fr]">

            <!-- Tombol close -->
            <div id="closeModal"
                class="absolute right-5 top-5 cursor-pointer text-chocolate text-3xl hover:rotate-90 transition">
                ✖
            </div>

            <!-- KIRI: Foto + Sosmed -->
            <div class="flex flex-col justify-evenly p-4 md:p-6 h-auto md:h-full items-center">
                <div class="flex items-start justify-center mb-4 md:mb-0">
                    <img id="modalImage"
                        class="bg-vanilla w-[200px] sm:w-[240px] md:w-[260px] max-h-[40vh] md:max-h-[60vh] object-cover rounded-xl shadow-lg"
                        alt="">
                </div>
                <div class="w-full flex justify-center items-center gap-4 mt-2">
                    <a id="modalIg" href="">
                        <i class="fa fa-instagram text-chocolate hover:scale-110 transition" style="font-size: 3rem;"></i>
                    </a>
                    <a id="modalEmail" href="">
                        <i class="fa fa-envelope text-chocolate hover:scale-110 transition" style="font-size: 3rem;"></i>
                    </a>
                    <a id="modalWa" href="">
                        <i class="fa fa-whatsapp text-chocolate hover:scale-110 transition" style="font-size: 3rem;"></i>
                    </a>
                </div>
            </div>

            <!-- KANAN: Scrollable card -->
            <div class="flex items-start justify-start p-4 md:p-6 h-full min-h-0">
                <div
                    class="bg-chocolate rounded-2xl shadow-inner p-4 md:p-6 w-full h-full overflow-y-auto max-w-[95%] scroll-card">
                    <!-- Nama -->
                    <div class="mb-6 md:mb-8 text-center md:text-left">
                        <h4 id="modalNamaLengkap" class="text-sm text-orange-200 font-light capitalize"></h4>
                        <h1 id="modalNamaPanggilan"
                            class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold uppercase text-orange-50">
                        </h1>
                    </div>

                    <!-- Quotes -->
                    <div class="mb-4 md:mb-6">
                        <p id="modalQuotes" class="text-orange-100 italic text-base sm:text-lg"></p>
                    </div>

                    <!-- Data ringkas -->
                    <div class="mb-4 md:mb-6">
                        <ul class="text-orange-100 text-xs sm:text-sm mb-1 flex flex-wrap">
                            <li class="w-1/3">Asal</li>
                            <li class="w-1/3">NIM</li>
                            <li class="w-1/3">TTL</li>
                        </ul>
                        <ul class="text-orange-50 font-semibold flex flex-wrap text-sm sm:text-base">
                            <li id="modalAsal" class="w-1/3"></li>
                            <li id="modalNim" class="w-1/3"></li>
                            <li id="modalTtl" class="w-1/3"></li>
                        </ul>
                    </div>

                    <!-- Alamat Kos -->
                    <div class="mb-4 md:mb-6">
                        <h1 class="text-orange-100 font-light">Alamat Kos</h1>
                        <h1 id="modalAlamatKos" class="text-orange-50 font-semibold"></h1>
                    </div>

                    <!-- Alamat Rumah + MDPL -->
                    <div class="flex flex-col sm:flex-row gap-4 mb-4 md:mb-6">
                        <div class="w-full sm:w-1/2">
                            <h1 class="text-orange-100 font-light">Alamat Rumah</h1>
                            <h1 id="modalAlamatRumah" class="text-orange-50 font-semibold max-h-16 overflow-y-auto">
                            </h1>
                        </div>
                        <div class="w-full sm:w-1/3">
                            <h1 class="text-orange-100 font-light">Ketinggian Rumah</h1>
                            <h1 id="modalMdpl" class="text-orange-50 font-semibold"></h1>
                        </div>
                    </div>

                    <!-- Hobi -->
                    <div class="mb-4 md:mb-6">
                        <h1 class="text-orange-100 font-light">Hobi</h1>
                        <h1 id="modalHobi" class="text-orange-50 font-semibold"></h1>
                    </div>

                    <!-- Tempat makan favorit -->
                    <div>
                        <h1 class="text-orange-100 font-light">Tempat Makan Favorit</h1>
                        <h1 id="modalTempatMakanFav" class="text-orange-50 font-semibold"></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openModal(button) {
            const itemData = JSON.parse(button.getAttribute('data-item'));

            // Desktop modal
            document.getElementById('modalImage').src = itemData.non_formal_picture;
            document.getElementById('modalNamaLengkap').innerText = itemData.nama_lengkap;
            document.getElementById('modalNamaPanggilan').innerText = itemData.nama_panggilan;
            document.getElementById('modalQuotes').innerText = itemData.quotes;
            document.getElementById('modalAsal').innerText = itemData.asal;
            document.getElementById('modalNim').innerText = itemData.nim;
            document.getElementById('modalTtl').innerText = itemData.ttl;
            document.getElementById('modalAlamatKos').innerText = itemData.alamat_kos;
            document.getElementById('modalAlamatRumah').innerText = itemData.alamat_rumah;
            document.getElementById('modalMdpl').innerText = itemData.mdpl;
            document.getElementById('modalHobi').innerText = itemData.hobi;
            document.getElementById('modalTempatMakanFav').innerText = itemData.tempat_makan_fav;
            document.getElementById('modalIg').href = `https://www.instagram.com/${itemData.user_ig}/`;
            document.getElementById('modalEmail').href = `mailto:${itemData.email_adress}`;
            document.getElementById('modalWa').href = `https://wa.me/${itemData.no_wa}`;

            // Show modal + animasi
            const modal = document.getElementById('modal');
            const modalContent = document.getElementById('modalContent');
            modal.classList.remove('hidden');
            setTimeout(() => {
                modalContent.classList.add('opacity-100', 'scale-100');
                modalContent.classList.remove('opacity-0', 'scale-95');
            }, 10);
        }

        // Tutup modal
        document.getElementById('closeModal').addEventListener('click', () => {
            const modal = document.getElementById('modal');
            const modalContent = document.getElementById('modalContent');
            modalContent.classList.remove('opacity-100', 'scale-100');
            modalContent.classList.add('opacity-0', 'scale-95');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        });
    </script>


    <div class="container mt-20 mx-auto grid grid-cols-3  gap-6">
        @if ($order == 'asc')
            <a href="{{ url('/biodata?page=' . $currentPage . '&order=desc') }}">
                <button class="flex gap-2 xl:w-[350px] lg:w-[280px] sm:w-[210px] w-[108px] mx-auto font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 576 512">
                        <path
                            d="M151.6 42.4C145.5 35.8 137 32 128 32s-17.5 3.8-23.6 10.4l-88 96c-11.9 13-11.1 33.3 2 45.2s33.3 11.1 45.2-2L96 146.3 96 448c0 17.7 14.3 32 32 32s32-14.3 32-32l0-301.7 32.4 35.4c11.9 13 32.2 13.9 45.2 2s13.9-32.2 2-45.2l-88-96zM320 32c-17.7 0-32 14.3-32 32s14.3 32 32 32l32 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-32 0zm0 128c-17.7 0-32 14.3-32 32s14.3 32 32 32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0zm0 128c-17.7 0-32 14.3-32 32s14.3 32 32 32l160 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-160 0zm0 128c-17.7 0-32 14.3-32 32s14.3 32 32 32l224 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-224 0z" />
                    </svg>
                    Sort
                </button>
            </a>
        @else
            <a href="{{ url('/biodata?page=' . $currentPage . '&order=asc') }}">
                <button class="flex gap-2 xl:w-[350px] lg:w-[280px] sm:w-[210px] w-[108px] mx-auto font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 576 512">
                        <path
                            d="M151.6 469.6C145.5 476.2 137 480 128 480s-17.5-3.8-23.6-10.4l-88-96c-11.9-13-11.1-33.3 2-45.2s33.3-11.1 45.2 2L96 365.7 96 64c0-17.7 14.3-32 32-32s32 14.3 32 32l0 301.7 32.4-35.4c11.9-13 32.2-13.9 45.2-2s13.9 32.2 2 45.2l-88 96zM320 32l32 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-32 0c-17.7 0-32-14.3-32-32s14.3-32 32-32zm0 128l96 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-96 0c-17.7 0-32-14.3-32-32s14.3-32 32-32zm0 128l160 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-160 0c-17.7 0-32-14.3-32-32s14.3-32 32-32zm0 128l224 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-224 0c-17.7 0-32-14.3-32-32s14.3-32 32-32z" />
                    </svg>
                    Sort
                </button>
            </a>
        @endif
        <div></div>
        <form class="flex justify-end mx-auto gap-2 xl:w-[350px] lg:w-[280px] sm:w-[210px] w-[108px]" method="GET"
            action="{{ route('biodata.index') }}">
            <input class="w-[30vw] bg-transparent placeholder:text-chocolate placeholder:font-semibold" type="text"
                name="search" placeholder="Search" value="{{ $searchQuery ?? '' }}">
            <button type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                    <path d="M21 21l-6 -6" />
                </svg>
            </button>
        </form>

        @forelse ($data as $item)
            <div onclick="openModal(this)" data-item="{{ json_encode($item) }}"
                style="background-image: url('{{ $item['formal_picture'] }}');"
                class="card overflow-hidden group flex items-end mx-auto aspect-square xl:w-[350px] lg:w-[280px] sm:w-[210px] w-[108px] transition-all duration-700 ease-in-out border-chocolate border-2 hover:bg-chocolate text-black hover:text-vanilla :hover:text-opacity-75">
                <div class="grid grid-cols-2">
                    <div class="flex flex-col mb-2 sm:mb-4 lg:mb-12 ml-1 sm:ml-2 lg:ml-6 z-10">
                        <div
                            class="text-xs drop-shadow-[1px_-1px_8px_rgba(255,255,255,1)] group-hover:drop-shadow-none sm:drop-shadow-none sm:text-sm">
                            {{ ucwords(strtolower($item['nama_lengkap'])) }}
                        </div>
                        <div class="hidden sm:block text-2xl uppercase font-bold mb-2 ">
                            {{ $item['nama_panggilan'] }}
                        </div>
                        <div class="hidden sm:block text-sm">{{ $item['nim'] }}</div>
                        <div class="hidden sm:block text-sm">{{ $item['asal'] }}</div>
                        <div class="hidden sm:block text-sm">{{ $item['mdpl'] }} MDPL</div>
                    </div>
                    <div class=""></div>
                </div>
            </div>
        @empty
            <div>No data found.</div>
        @endforelse


    </div>
    <div class="container my-20 mx-auto flex gap-2 justify-center">
        @if ($currentPage > 1)
            <a href="{{ url('/biodata?page=' . $currentPage - 1) }}">
                <button class="flex gap-2 text-chocolate hover:border-mocca hover:border-2 md:py-2 md:px-4 rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-left">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M5 12l14 0" />
                        <path d="M5 12l6 6" />
                        <path d="M5 12l6 -6" />
                    </svg>
                    <div class="md:block hidden">Previous</div>
                </button>
            </a>
        @else
            <div
                class="flex gap-2 md:text-chocolate text-gray-500 md:py-2 md:px-4 md:rounded-xl rounded-md hover:cursor-default">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-left">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M5 12l14 0" />
                    <path d="M5 12l6 6" />
                    <path d="M5 12l6 -6" />
                </svg>
                <div class="text-gray-500 md:block hidden">Previous</div>
            </div>
        @endif
        @for ($i = 1; $i < $totalPages + 1; $i++)
            @if ($currentPage == $i)
                <a href="{{ url('/biodata?page=' . $i) }}">
                    <button class="bg-mocca text-white md:py-2 md:px-4 px-1 md:rounded-xl rounded-md">
                        {{ $i }}
                    </button>
                </a>
            @else
                <a href="{{ url('/biodata?page=' . $i) }}">
                    <button class="text-mocca hover:border-mocca hover:border-2 md:py-2 md:px-4 px-1 md:rounded-xl rounded-md">
                        {{ $i }}
                    </button>
                </a>
            @endif
        @endfor
        @if ($currentPage < $totalPages)
            <a href="{{ url('/biodata?page=' . $currentPage + 1) }}">
                <button class="flex gap-2 text-chocolate hover:border-mocca hover:border-2 md:py-2 md:px-4 px-1 rounded-xl">
                    <div class="md:block hidden">Next</div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-right">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M5 12l14 0" />
                        <path d="M13 18l6 -6" />
                        <path d="M13 6l6 6" />
                    </svg>
                </button>
            </a>
        @else
            <div class="flex gap-2 md:text-chocolate text-gray-500 md:py-2 md:px-4 px-1 rounded-xl hover:cursor-default">
                <div class="text-gray-500 md:block hidden">Next</div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-right">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M5 12l14 0" />
                    <path d="M13 18l6 -6" />
                    <path d="M13 6l6 6" />
                </svg></button>
            </div>
        @endif
    </div>
</x-app-layout>