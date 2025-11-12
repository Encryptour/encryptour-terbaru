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
                <input class="w-[250px] border-b-2 border-chocolate bg-transparent placeholder:text-chocolate placeholder:font-semibold focus:outline-none"
                       type="text" name="search" placeholder="Search" value="{{ $searchQuery ?? '' }}">
                <button type="submit"><i class="fa fa-search text-chocolate"></i></button>
            </form>
        </div>

        {{-- Cards --}}
        <div id="biodataGrid"  class="grid grid-cols-3 gap-6">
            @forelse ($data as $item)
                @switch($item['nim'])
                    @case('21120124140161')
                        @include('cards.21120124140161_card', ['item' => $item])
                    @break
                    @case('21120124140163')
                        @include('cards.21120124140163_card', ['item' => $item])
                    @break

                    @default
                        @include('cards.default_card', ['item' => $item])
                @endswitch
            @empty
                <div>No data found.</div>
            @endforelse
        </div>

    </div>
</x-app-layout>

<script>
    function openModal(modalId, modalContentId, button) {
        const itemData = JSON.parse(button.getAttribute('data-item'));
        const modal = document.getElementById(modalId);
        const modalContent = document.getElementById(modalContentId);

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

        modalContent.classList.remove('opacity-100', 'scale-100');
        modalContent.classList.add('opacity-0', 'scale-95');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }

    // ================== LIVE SEARCH ==================
    const searchInput = document.querySelector('input[name="search"]');
    const gridContainer = document.getElementById('biodataGrid');
    let searchTimeout = null;

    searchInput.addEventListener('keyup', function() {
        clearTimeout(searchTimeout);
        const query = this.value.trim();

        // delay dikit biar gak spam request
        searchTimeout = setTimeout(() => {
            fetch(`/biodata/search?q=${encodeURIComponent(query)}`)
                .then(res => res.json())
                .then(data => {
                    gridContainer.innerHTML = data.html;
                })
                .catch(err => console.error('Search error:', err));
        }, 100);
    });
</script>
