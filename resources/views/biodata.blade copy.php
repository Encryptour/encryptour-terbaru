<x-app-layout>
    <!-- Modal Wrapper -->
    <div id="modal" class="hidden fixed inset-0 z-50 flex justify-center items-center bg-black bg-opacity-50">

        <!-- Desktop Modal -->
        <div id="modalContent"
            class="transform transition-all scale-95 opacity-0 w-[90vw] h-[90vh] shadow-xl hidden md:grid grid-cols-[auto_1fr] bg-gradient-to-tl from-[#AD7D4F] to-[#EDB47E] mx-auto relative rounded-2xl overflow-hidden">

            <!-- Tombol close (luar card, tapi dalam modal) -->
            <div id="closeModal"
                class="absolute right-5 top-5 cursor-pointer text-chocolate text-3xl hover:rotate-90 transition">
                ✖
            </div>

            <!-- KIRI: foto (fixed, no scroll) -->
            <div class="flex flex-col justify-evenly p-6 h-full">
                <!-- Foto -->
                <div class="flex items-start justify-center">
                    <img id="modalImage" class="bg-vanilla w-[260px] max-h-[60vh] object-cover rounded-xl shadow-lg"
                        alt="">
                </div>

                <!-- Bagian bawah: icon sosmed -->
                <div class="w-full flex justify-center items-center gap-4 mt-2">
                    <a id="modalIg" href="">
                        <i class="fa fa-instagram text-chocolate hover:scale-110 transition"
                            style="font-size: 3rem;"></i>
                    </a>
                    <a id="modalEmail" href="">
                        <i class="fa fa-envelope text-chocolate hover:scale-110 transition"
                            style="font-size: 3rem;"></i>
                    </a>
                    <a id="modalWa" href="">
                        <i class="fa fa-whatsapp text-chocolate hover:scale-110 transition"
                            style="font-size: 3rem;"></i>
                    </a>
                </div>
            </div>


            <!-- KANAN: Scrollable card (lebih kecil, ada margin) -->
            <div class="flex items-start justify-start p-6 h-full min-h-0">
                <div
                    class="bg-chocolate rounded-2xl shadow-inner p-6 w-full h-full overflow-y-auto max-w-[95%] scroll-card">

                    <!-- Nama -->
                    <div class="mb-8">
                        <h4 id="modalNamaLengkap" class="text-sm text-orange-200 font-light capitalize"></h4>
                        <h1 id="modalNamaPanggilan" class="text-6xl md:text-7xl font-bold uppercase text-orange-50">
                        </h1>
                    </div>

                    <!-- Quotes -->
                    <div class="mb-6">
                        <p id="modalQuotes" class="text-orange-100 italic text-lg"></p>
                    </div>

                    <!-- Data ringkas -->
                    <div class="mb-6">
                        <ul class="text-orange-100 text-sm mb-1 flex flex-wrap">
                            <li class="w-1/3">Asal</li>
                            <li class="w-1/3">NIM</li>
                            <li class="w-1/3">TTL</li>
                        </ul>
                        <ul class="text-orange-50 font-semibold flex flex-wrap">
                            <li id="modalAsal" class="w-1/3"></li>
                            <li id="modalNim" class="w-1/3"></li>
                            <li id="modalTtl" class="w-1/3"></li>
                        </ul>
                    </div>

                    <!-- Alamat Kos -->
                    <div class="mb-6">
                        <h1 class="text-orange-100 font-light">Alamat Kos</h1>
                        <h1 id="modalAlamatKos" class="text-orange-50 font-semibold"></h1>
                    </div>

                    <!-- Alamat Rumah + MDPL -->
                    <div class="flex flex-wrap gap-4 mb-6">
                        <div class="w-1/2">
                            <h1 class="text-orange-100 font-light">Alamat Rumah</h1>
                            <h1 id="modalAlamatRumah" class="text-orange-50 font-semibold max-h-16 overflow-y-auto">
                            </h1>
                        </div>
                        <div class="w-1/3">
                            <h1 class="text-orange-100 font-light">Ketinggian Rumah</h1>
                            <h1 id="modalMdpl" class="text-orange-50 font-semibold"></h1>
                        </div>
                    </div>

                    <!-- Hobi -->
                    <div class="mb-6">
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



        <!-- Mobile Modal -->
        <div id="modalContent2"
            class="transform transition-all scale-95 opacity-0 md:hidden w-[95vw] my-4 h-[90vh] bg-mocca relative shadow-lg rounded-xl mx-auto overflow-hidden">

            <div
                class="w-full flex justify-center items-center relative h-12 bg-gradient-to-l from-[#AD7D4F] from-60% to-[#EDB47E]">
                <h1 id="modalNamaPanggilan2" class="font-montserrat font-bold text-vanilla uppercase text-xl"></h1>
                <button id="closeModal2"
                    class="absolute p-1 right-6 top-1 hover:rotate-180 hover:duration-500 hover:scale-90 transition cursor-pointer text-chocolate text-xl">
                    x
                </button>
            </div>

            <div class="w-full h-1/3 bg-transparent flex justify-center bg-white relative items-end">
                <img id="modalImage2" class="object-cover h-[125%] absolute -bottom-20" alt="">
            </div>

            <div class="w-full h-1/2 bg-gradient-to-tr from-[#AD7D4F] from-60% to-[#EDB47E] relative p-6">
                <div class="w-full">
                    <h1 id="modalNamaLengkap2" class="text-base font-semibold text-vanilla mb-2"></h1>
                </div>

                <div id="modalQuotes2" class="w-full h-12 text-vanilla overflow-y-auto text-xs font-light mb-4">
                </div>

                <!-- Data ringkas -->
                <div class="asal-nim-ttl">
                    <div class="w-full flex text-xs font-normal text-vanilla justify-evenly">
                        <h3 class="w-1/3">ASAL</h3>
                        <h3 class="w-1/3">NIM</h3>
                        <h3 class="w-1/3">TTL</h3>
                    </div>
                    <div class="w-full flex text-xs font-medium text-vanilla justify-evenly mb-2">
                        <h3 id="modalAsal2" class="w-1/3"></h3>
                        <h3 id="modalNim2" class="w-1/3"></h3>
                        <h3 id="modalTtl2" class="w-1/3"></h3>
                    </div>
                </div>

                <!-- Alamat -->
                <div class="alamat mb-2">
                    <div class="w-full text-vanilla text-xs font-normal flex justify-evenly">
                        <h3 class="w-1/3">Alamat Kos</h3>
                        <h3 class="w-1/3"></h3>
                        <h3 class="w-1/3">Alamat Rumah</h3>
                    </div>
                    <div class="w-full text-vanilla text-xs font-medium flex justify-evenly">
                        <h3 id="modalAlamatKos2" class="w-2/3 overflow-y-auto h-14 pr-4"></h3>
                        <h3 id="modalAlamatRumah2" class="w-1/3 overflow-y-auto h-14"></h3>
                    </div>
                </div>

                <!-- Unik -->
                <div class="unique">
                    <div class="w-full text-vanilla text-xs font-normal flex justify-evenly">
                        <h3 class="w-1/3">Ketinggian Rumah</h3>
                        <h3 class="w-1/3">Hobi</h3>
                        <h3 class="w-1/3">Tempat Makan Fav.</h3>
                    </div>
                    <div class="w-full text-vanilla text-xs font-medium flex justify-evenly">
                        <h3 id="modalMdpl2" class="w-1/3"></h3>
                        <h3 id="modalHobi2" class="w-1/3"></h3>
                        <h3 id="modalTempatMakanFav2" class="w-1/3"></h3>
                    </div>
                </div>
            </div>

            <div class="w-full h-12 absolute bottom-0 bg-chocolate md:hidden">
                <div class="w-full h-1 bg-vanilla"></div>
                <div class="w-full flex justify-center items-center h-full">
                    <!-- Social icons (opsional) -->
                </div>
            </div>
        </div>
    </div>

    <script>
        function openModal(button) {
            const d = JSON.parse(button.dataset.item);

            // Mapping id modal ke property object
            const map = {
                // Desktop
                modalImage: ['src', 'non_formal_picture'],
                modalNamaLengkap: ['text', 'nama_lengkap'],
                modalNamaPanggilan: ['text', 'nama_panggilan'],
                modalQuotes: ['text', 'quotes'],
                modalAsal: ['text', 'asal'],
                modalNim: ['text', 'nim'],
                modalTtl: ['text', 'ttl'],
                modalAlamatKos: ['text', 'alamat_kos'],
                modalAlamatRumah: ['text', 'alamat_rumah'],
                modalMdpl: ['text', 'mdpl'],
                modalHobi: ['text', 'hobi'],
                modalTempatMakanFav: ['text', 'tempat_makan_fav'],

                // Mobile
                modalImage2: ['src', 'non_formal_picture'],
                modalNamaLengkap2: ['text', 'nama_lengkap'],
                modalNamaPanggilan2: ['text', 'nama_panggilan'],
                modalQuotes2: ['text', 'quotes'],
                modalAsal2: ['text', 'asal'],
                modalNim2: ['text', 'nim'],
                modalTtl2: ['text', 'ttl'],
                modalAlamatKos2: ['text', 'alamat_kos'],
                modalAlamatRumah2: ['text', 'alamat_rumah'],
                modalMdpl2: ['text', 'mdpl'],
                modalHobi2: ['text', 'hobi'],
                modalTempatMakanFav2: ['text', 'tempat_makan_fav']
            };

            // Isi semua element berdasarkan mapping
            for (const [id, [type, key]] of Object.entries(map)) {
                const el = document.getElementById(id);
                if (!el) continue;
                if (type === 'text') el.textContent = d[key] || '';
                else if (type === 'src') el.src = d[key] || '';
            }

            // Sosial media (khusus desktop)
            document.getElementById('modalIg').href = `https://www.instagram.com/${d.user_ig || ''}/`;
            document.getElementById('modalEmail').href = `mailto:${d.email_adress || ''}`;
            document.getElementById('modalWa').href = `https://wa.me/${d.no_wa || ''}`;

            // Show modal + animasi
            const modal = document.getElementById('modal');
            modal.classList.remove('hidden');
            ['modalContent', 'modalContent2'].forEach(id => {
                const c = document.getElementById(id);
                c.classList.add('opacity-100', 'scale-100');
                c.classList.remove('opacity-0', 'scale-95');
            });
        }

        // Tutup modal (reusable)
        function closeModal() {
            const modal = document.getElementById('modal');
            ['modalContent', 'modalContent2'].forEach(id => {
                const c = document.getElementById(id);
                c.classList.remove('opacity-100', 'scale-100');
                c.classList.add('opacity-0', 'scale-95');
            });
            setTimeout(() => modal.classList.add('hidden'), 300);
        }

        // Event close
        document.getElementById('closeModal').addEventListener('click', closeModal);
        document.getElementById('closeModal2').addEventListener('click', closeModal);
    </script>



    {{-- Sorting and Search --}}
    @php
        $nextOrder = $order === 'asc' ? 'desc' : 'asc';
        $sortIcon = $order === 'asc'
            ? 'M151.6 42.4C145.5 35.8 137 32 128 32s-17.5 3.8-23.6 10.4l-88 96c-11.9 13-11.1 33.3 2 45.2s33.3 11.1 45.2-2L96 146.3 96 448c0 17.7 14.3 32 32 32s32-14.3 32-32l0-301.7 32.4 35.4c11.9 13 32.2 13.9 45.2 2s13.9-32.2 2-45.2l-88-96zM320 32c-17.7 0-32 14.3-32 32s14.3 32 32 32l32 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-32 0zm0 128c-17.7 0-32 14.3-32 32s14.3 32 32 32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0zm0 128c-17.7 0-32 14.3-32 32s14.3 32 32 32l160 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-160 0zm0 128c-17.7 0-32 14.3-32 32s14.3 32 32 32l224 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-224 0z'
            : 'M151.6 469.6C145.5 476.2 137 480 128 480s-17.5-3.8-23.6-10.4l-88-96c-11.9-13-11.1-33.3 2-45.2s33.3-11.1 45.2 2L96 365.7 96 64c0-17.7 14.3-32 32-32s32 14.3 32 32l0 301.7 32.4-35.4c11.9-13 32.2-13.9 45.2-2s13.9 32.2 2 45.2l-88 96zM320 32l32 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-32 0c-17.7 0-32-14.3-32-32s14.3-32 32-32zm0 128l96 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-96 0c-17.7 0-32-14.3-32-32s14.3-32 32-32zm0 128l160 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-160 0c-17.7 0-32-14.3-32-32s14.3-32 32-32zm0 128l224 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-224 0c-17.7 0-32-14.3-32-32s14.3-32 32-32z';
    @endphp

    <div class="container mt-20 mx-auto grid grid-cols-3 gap-6">
        {{-- Sort Button --}}
        <a href="{{ url('/biodata?page=' . $currentPage . '&order=' . $nextOrder) }}">
            <button class="flex gap-2 xl:w-[350px] lg:w-[280px] sm:w-[210px] w-[108px] mx-auto font-semibold">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 576 512">
                    <path d="{{ $sortIcon }}" />
                </svg>
                Sort
            </button>
        </a>

        <div></div>

        {{-- Search Form --}}
        <form class="flex justify-end mx-auto gap-2 xl:w-[350px] lg:w-[280px] sm:w-[210px] w-[108px]" method="GET"
            action="{{ route('biodata.index') }}">
            <input class="w-[30vw] bg-transparent placeholder:text-chocolate placeholder:font-semibold" type="text"
                name="search" placeholder="Search" value="{{ $searchQuery ?? '' }}">
            <button type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                    <path d="M21 21l-6 -6" />
                </svg>
            </button>
        </form>

        <div id="modal" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black/50"></div>

        {{-- Data Cards --}}
        @forelse ($data as $item)
            <div onclick="openModal(this)" data-item="{{ json_encode($item) }}"
                style="background-image: url('{{ $item['formal_picture'] }}');"
                class="card overflow-hidden group flex items-end mx-auto aspect-square xl:w-[350px] lg:w-[280px] sm:w-[210px] w-[108px] transition-all duration-700 ease-in-out border-chocolate border-2 hover:bg-chocolate text-black hover:text-vanilla">
                <div class="grid grid-cols-2">
                    <div class="flex flex-col mb-2 sm:mb-4 lg:mb-12 ml-1 sm:ml-2 lg:ml-6 z-10">
                        <div
                            class="text-xs drop-shadow-[1px_-1px_8px_rgba(255,255,255,1)] group-hover:drop-shadow-none sm:text-sm">
                            {{ ucwords(strtolower($item['nama_lengkap'])) }}
                        </div>
                        <div class="hidden sm:block text-2xl uppercase font-bold mb-2">{{ $item['nama_panggilan'] }}</div>
                        <div class="hidden sm:block text-sm">{{ $item['nim'] }}</div>
                        <div class="hidden sm:block text-sm">{{ $item['asal'] }}</div>
                        <div class="hidden sm:block text-sm">{{ $item['mdpl'] }} MDPL</div>
                    </div>
                </div>
            </div>
        @empty
            <div>No data found.</div>
        @endforelse
    </div>

    {{-- Pagination --}}
    <div class="container my-20 mx-auto flex gap-2 justify-center">
        {{-- Previous --}}
        @php
            $prevDisabled = $currentPage <= 1;
            $nextDisabled = $currentPage >= $totalPages;
        @endphp
        <a href="{{ $prevDisabled ? '#' : url('/biodata?page=' . ($currentPage - 1)) }}"
            class="{{ $prevDisabled ? 'pointer-events-none text-gray-500' : '' }}">
            <button class="flex gap-2 text-chocolate hover:border-mocca hover:border-2 md:py-2 md:px-4 rounded-xl">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M5 12l14 0" />
                    <path d="M5 12l6 6" />
                    <path d="M5 12l6 -6" />
                </svg>
                <span class="md:block hidden">Previous</span>
            </button>
        </a>

        {{-- Page Numbers --}}
        @for ($i = 1; $i <= $totalPages; $i++)
            <a href="{{ url('/biodata?page=' . $i) }}">
                <button class="{{ $currentPage == $i
            ? 'bg-mocca text-white'
            : 'text-mocca hover:border-mocca hover:border-2' }} md:py-2 md:px-4 px-1 md:rounded-xl rounded-md">
                    {{ $i }}
                </button>
            </a>
        @endfor

        {{-- Next --}}
        <a href="{{ $nextDisabled ? '#' : url('/biodata?page=' . ($currentPage + 1)) }}"
            class="{{ $nextDisabled ? 'pointer-events-none text-gray-500' : '' }}">
            <button class="flex gap-2 text-chocolate hover:border-mocca hover:border-2 md:py-2 md:px-4 px-1 rounded-xl">
                <span class="md:block hidden">Next</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M5 12l14 0" />
                    <path d="M13 18l6 -6" />
                    <path d="M13 6l6 6" />
                </svg>
            </button>
        </a>
    </div>

</x-app-layout>