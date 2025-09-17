<x-app-layout class="">
    <section id="gallery" class="container mx-auto mt-20 py-24 px-6 bg-vanilla">
        <h1 class="text-4xl md:text-5xl font-extrabold text-center mb-8 text-[#66391c]">Our Gallery</h1>

        <!-- Overlay Modal Desktop -->
        <div id="galleryModal"
            class="fixed inset-0 bg-black bg-opacity-70 hidden items-center justify-center z-50 transition-opacity duration-300">

            <!-- Konten Modal -->
            <div id="galleryModalContent"
                class="transform transition-all scale-95 opacity-0 w-[90vw] md:w-[70vw] h-[80vh] shadow-xl bg-white mx-auto relative rounded-2xl overflow-hidden duration-300 ease-out flex flex-col">

                <!-- Tombol close -->
                <div id="galleryCloseModal"
                    class="absolute right-5 top-3 cursor-pointer text-chocolate text-3xl hover:rotate-90 transition z-20">
                    ✖
                </div>

                <!-- Judul (selalu fixed di atas modal) -->
                <div class="bg-mocca backdrop-blur-sm text-vanilla p-4 text-center">
                    <h2 id="galleryModalTitle" class="text-2xl font-bold"></h2>
                </div>

                <!-- Konten scrollable -->
                <div class="flex-1 overflow-y-auto flex flex-col">
                    <!-- Gambar -->
                    <div class="w-full flex justify-center items-center bg-mocca">
                        <img id="galleryModalImage" class="max-h-[60vh] w-auto object-contain mx-auto" src=""
                            alt="Gallery Image">
                    </div>

                    <!-- Deskripsi -->
                    <div class="p-6 bg-white">
                        <p id="galleryModalDesc" class="text-gray-700 leading-relaxed"></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ini buat Kategori -->
        <div class="flex justify-center mb-12 hidden lg:flex">
            <div id="categoryButtons" class="flex gap-4 bg-mocca px-4 py-2 rounded-full text-sm font-semibold">
                <button data-category="all"
                    class="px-4 py-2 bg-[#66391c] text-vanilla hover:bg-[#F2E5BF] rounded-full category-button">
                    all
                </button>

                @foreach ($categories as $category)
                    <button data-category="{{ Str::slug($category->name) }}"
                        class="px-4 py-2 text-[#66391c] hover:bg-[#F2E5BF] rounded-full category-button">
                        {{ $category->name }}
                    </button>
                @endforeach
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const buttons = document.querySelectorAll('.category-button');
                const items = document.querySelectorAll('.gallery-item');

                function filterItems(category) {
                    items.forEach(item => {
                        const itemCategory = item.getAttribute('data-category');
                        if (category === 'all' || itemCategory === category) {
                            item.classList.remove('hidden');
                        } else {
                            item.classList.add('hidden');
                        }
                    });
                }

                function updateActiveButton(activeButton) {
                    buttons.forEach(btn => {
                        btn.classList.remove('bg-[#66391c]', 'text-vanilla');
                        btn.classList.add('text-[#66391c]');
                    });
                    activeButton.classList.add('bg-[#66391c]', 'text-vanilla');
                    activeButton.classList.remove('text-[#66391c]');
                }

                if (window.innerWidth >= 1024) {
                    buttons.forEach(button => {
                        button.addEventListener('click', () => {
                            const category = button.getAttribute('data-category');
                            updateActiveButton(button);
                            filterItems(category);
                        });
                    });
                }

                // Opsional: Reset filter jika diresize ke mobile dan balik ke desktop
                window.addEventListener('resize', () => {
                    if (window.innerWidth >= 1024) {
                        filterItems('all');
                    }
                });
            });
        </script>

        <!-- Ini buat desktop! -->
        <div class="hidden lg:grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6" id="galleryGrid">
            @foreach ($data as $item)
                <a href="#" class="open-gallery-modal" data-img="{{ $item['img'] }}" data-title="{{ $item['title'] }}" data-desc="{{ $item['desc'] }}">
                    <div class="gallery-item bg-cards/20 rounded-lg shadow-lg overflow-hidden relative w-full h-[360px]"
                        data-category="{{ Str::slug($item->category->name) }}">

                        <!-- Gambar -->
                        <img src="{{ $item['img'] }}" alt="Gallery Image" class="w-full h-2/3 object-cover">

                        <!-- Kategori floating pojok kanan atas -->
                        <span
                            class="absolute top-2 right-2 text-xs bg-mocca text-vanilla py-1 px-2 rounded-full font-semibold uppercase shadow">
                            {{ $item->category->name ?? 'None' }}
                        </span>

                        <!-- Judul -->
                        <div class="p-4">
                            <h3 class="text-lg font-bold text-chocolate">{{ $item['title'] }}</h3>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>


        <!-- Ini buat mobile! -->
        <div class="lg:hidden">
            <div class="swiper">
                <div class="swiper-wrapper">
                    @foreach ($data as $item)
                        <div class="swiper-slide relative">
                            <div class="gallery-item bg-cards/20 rounded-lg shadow-lg overflow-hidden">
                                <!-- Semua overlay -->
                                <div class="absolute inset-0 flex flex-col justify-between p-4 z-10">
                                    <!-- Judul sama kategori -->
                                    <div>
                                        <span
                                            class="text-sm bg-mocca text-[#66391c] py-1 px-2 rounded-full font-semibold uppercase">{{ $item->category->name ?? 'None' }}</span>
                                        <h3 class="text-xl font-bold mt-2 text-white">{{ $item['title'] }}</h3>
                                    </div>
                                    <!-- Ini read More nya -->
                                    <div class="flex justify-center mt-auto">
                                        <a href="#"
                                            class="text-[#66391c] font-bold text-xl py-1 px-2 rounded mx-4 flex flex-col items-center">
                                            <span class="text-lg">&#8593;</span> <!-- Upward arrow -->
                                            open
                                        </a>
                                    </div>
                                </div>
                                <!-- Gambarnya -->
                                <img src="{{ $item['img'] }}" alt="Gallery Image" class="swiper-image w-full">
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Pagination dan Navigation Opsional -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </section>

    <!-- Ini library Swiper nya -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <style>
        @media (max-width: 768px) {
            .swiper-slide {
                position: relative;
                overflow: hidden;
                border-radius: 50px;
            }

            .swiper-image {
                height: 500px;
                object-fit: cover;
                object-position: center center;
            }
        }

        .swiper-slide .absolute {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 10;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 1rem;
        }

        .swiper-button-next,
        .swiper-button-prev {
            color: #66391c;
            stroke-width: 30px
        }
    </style>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const swiper = new Swiper('.swiper', {
                slidesPerView: 1,
                spaceBetween: 20,
                effect: 'coverflow',
                coverflowEffect: {
                    rotate: 50,
                    stretch: 0,
                    depth: 100,
                    modifier: 1,
                    slideShadows: true,
                },
                autoplay: {
                    delay: 2000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });
        });
    </script>

    <!-- Ini buat modalnya -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Open Desktop Modal
            document.querySelectorAll('.open-gallery-modal').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.preventDefault();

                    // ambil data dari tombol
                    const img = btn.getAttribute('data-img');
                    const title = btn.getAttribute('data-title');
                    const desc = btn.getAttribute('data-desc');

                    // isi modal
                    document.getElementById('galleryModalImage').src = img;
                    document.getElementById('galleryModalTitle').textContent = title;
                    document.getElementById('galleryModalDesc').textContent = desc;

                    // tampilkan modal
                    const modal = document.getElementById('galleryModal');
                    const modalContent = document.getElementById('galleryModalContent');

                    modal.classList.remove('hidden');
                    modal.classList.add('flex');

                    setTimeout(() => {
                        modalContent.classList.add('opacity-100', 'scale-100');
                        modalContent.classList.remove('opacity-0', 'scale-95');
                    }, 10);
                });
            });

            // Close Gallery Modal
            const closeModal = () => {
                const modal = document.getElementById('galleryModal');
                const modalContent = document.getElementById('galleryModalContent');

                modalContent.classList.add('opacity-0', 'scale-95');
                modalContent.classList.remove('opacity-100', 'scale-100');

                setTimeout(() => {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                }, 300);
            };

            document.getElementById('galleryCloseModal').addEventListener('click', closeModal);
            document.getElementById('galleryModal').addEventListener('click', (e) => {
                if (e.target.id === 'galleryModal') closeModal();
            });
        });
    </script>

</x-app-layout>