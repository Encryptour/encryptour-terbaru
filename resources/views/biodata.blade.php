<x-app-layout>
    <div class="container mt-20 mx-auto">
        {{-- Header (Sort + Search) --}}
        <div class="flex flex-wrap justify-between items-center mb-6">
            {{-- Tombol Sort --}}
            @if ($order == 'asc')
                <a href="{{ url('/biodata?order=desc') }}">
                    <button class="flex items-center gap-2 font-semibold">
                        <i class="fa fa-sort-amount-desc"></i>
                        Sort
                    </button>
                </a>
            @else
                <a href="{{ url('/biodata?order=asc') }}">
                    <button class="flex items-center gap-2 font-semibold">
                        <i class="fa fa-sort-amount-asc"></i>
                        Sort
                    </button>
                </a>
            @endif

            {{-- Search --}}
            <form class="flex items-center gap-2" method="GET" action="{{ route('biodata.index') }}">
                <input
                    class="w-[250px] border-b-2 border-chocolate bg-transparent placeholder:text-chocolate placeholder:font-semibold focus:outline-none"
                    type="text" name="search" placeholder="Search" value="{{ $searchQuery ?? '' }}">
                <button type="submit"><i class="fa fa-search text-chocolate"></i></button>
            </form>
        </div>

        {{-- Loading Screen --}}
        <div class="flex h-screen items-center justify-center text-wrap text-chocolate" id="loading">
            <div class="text items-center text-center">
                <div class="w-50 h-50 relative my-10 mx-auto">
                    <img class="w-40 mx-auto h-40 transition-all spin-reverse"
                        src="{{ asset('assets/maintenance.png') }}" alt="">
                    <img class="h-24 w-24 absolute top-1/3 left-1/2 transition-all animate-spin-slow"
                        src="{{ asset('assets/maintenance.png') }}" alt="">
                </div>
                <h1 class="text-xl font-bold md:font-extrabold md:text-4xl">Loading Data Mahasiswa..</h1>
                <p class="text-lg md:text-2xl font-normal md:font-semibold">Jika memakan waktu lama, silahkan cek
                    internet anda!</p>
            </div>
        </div>

        @if (empty($is_fake))
            {{-- Cards --}}
            <div id="biodataGrid" class="grid grid-cols-3 gap-6 hidden">
                @forelse ($data as $item)
                    @switch($item['nim'])
                        {{-- @case('21120124140161')
                            @include('cards.21120124140161_card', ['item' => $item])
                        @break

                        @case('21120124140163')
                            @include('cards.21120124140163_card', ['item' => $item])
                        @break --}}

                        @default
                            @include('cards.default_card', ['item' => $item])
                    @endswitch
                    @empty
                        <div>No data found.</div>
                    @endforelse
                </div>
            </div>

            {{-- SCRIPT --}}
        <script>
            // ============ LOADING HANDLER ============
            setTimeout(() => {
                const loading = document.getElementById('loading');
                const view = document.getElementById('biodataGrid');

                if (loading && view) {
                    loading.style.display = 'none';
                    view.classList.remove('hidden');
                }
            }, 1000);

            // ============ MODAL HANDLER ============
            function openModal(modalId, modalContentId, button) {
                const itemData = JSON.parse(button.getAttribute('data-item'));
                const modal = document.getElementById(modalId);
                const modalContent = document.getElementById(modalContentId);

                if (!modal || !modalContent) return;

                modal.querySelector('.modalImage').src = itemData.non_formal_picture;
                modal.querySelector('.modalNamaLengkap').innerText = itemData.nama_lengkap;
                modal.querySelector('.modalNamaPanggilan').innerText = itemData.nama_panggilan;
                modal.querySelector('.modalAsal').innerText = itemData.asal;
                modal.querySelector('.modalQuotes').innerText = itemData.quotes;
                modal.querySelector('.modalNim').innerText = itemData.nim;
                modal.querySelector('.modalTtl').innerText = itemData.ttl;
                modal.querySelector('.modalAlamatKos').innerText = itemData.alamat_kos;
                modal.querySelector('.modalAlamatRumah').innerText = itemData.alamat_rumah;
                modal.querySelector('.modalMdpl').innerText = itemData.mdpl;
                modal.querySelector('.modalHobi').innerText = itemData.hobi;
                modal.querySelector('.modalTempatMakanFav').innerText = itemData.tempat_makan_fav;

                modal.querySelector('.modalIg').href = `https://www.instagram.com/${itemData.user_ig}/`;
                modal.querySelector('.modalEmail').href = `mailto:${itemData.email_adress}`;
                modal.querySelector('.modalWa').href = `https://wa.me/${itemData.no_wa}`;

                modal.classList.remove('hidden');
                setTimeout(() => {
                    modalContent.classList.add('opacity-100', 'scale-100');
                    modalContent.classList.remove('opacity-0', 'scale-95');
                }, 10);
            }

            function closeModal(modalId, modalContentId) {
                const modal = document.getElementById(modalId);
                const modalContent = document.getElementById(modalContentId);
                if (!modal || !modalContent) return;

                modalContent.classList.remove('opacity-100', 'scale-100');
                modalContent.classList.add('opacity-0', 'scale-95');
                setTimeout(() => {
                    modal.classList.add('hidden');
                }, 300);
            }

            // ============ LIVE SEARCH ============
            const searchInput = document.querySelector('input[name="search"]');
            const gridContainer = document.getElementById('biodataGrid');
            let searchTimeout = null;

            if (searchInput && gridContainer) {
                searchInput.addEventListener('keyup', function() {
                    clearTimeout(searchTimeout);
                    const query = this.value.trim();

                    searchTimeout = setTimeout(() => {
                        fetch(`/biodata/search?q=${encodeURIComponent(query)}`)
                            .then(res => res.json())
                            .then(data => {
                                gridContainer.innerHTML = data.html;
                            })
                            .catch(err => console.error('Search error:', err));
                    }, 200);
                });
            }
        </script>
    @else
        <script>
            setTimeout(() => {
                location.reload();
            }, 5000);
        </script>
    @endif

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
</x-app-layout>
