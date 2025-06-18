<x-app-layout class="">
    {{-- <div class="flex h-screen items-center justify-center text-wrap text-chocolate">
        <div class="text items-center text-center">
            <div class="w-50 h-50 relative my-10 mx-auto">
                <img class="w-40 mx-auto h-40 transition-all  spin-reverse " src="{{ asset('assets/maintenance.png') }}"
                    alt="">
                <img class="h-24 w-24 absolute top-1/3 left-1/2 transition-all animate-spin-slow"
                    src="{{ asset('assets/maintenance.png') }}" alt="">
            </div>
            <h1 class="text-xl font-bold md:font-extrabold md:text-4xl">OUR GALLERY IS COMING SOON.</h1>
            <p class="text-lg md:text-2xl font-normal md:font-semibold">Relax, it's wont take a century!</p>
        </div>
        <style>
            @keyframes spin-reverse {
                0% {
                    transform: rotate(0deg);
                }

                100% {
                    transform: rotate(-360deg);
                    /* Negative value for counterclockwise spin */
                }
            }
        </style>
        </style>
    </div> --}}
    {{-- hidden sementara ini --}}
    <section id="gallery" class="container mx-auto mt-20 py-24 px-6 bg-vanilla">
        <h1 class="text-4xl md:text-5xl font-extrabold text-center mb-8 text-[#66391c]">Our Gallery</h1>

        <!-- Ini buat desktop! -->
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


        <div class="hidden lg:grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6" id="galleryGrid">
            @foreach ($data as $item)
                <div class="gallery-item bg-cards/20 rounded-lg shadow-lg overflow-hidden"
                    data-category="{{ Str::slug($item->category->name) }}">
                    <img src="{{ $item['img'] }}" alt="Gallery Image" class="w-full">
                    <div class="p-4">
                        <span
                            class="text-sm bg-mocca text-[#66391c] py-1 px-2 rounded-full font-semibold uppercase">{{ $item->category->name ?? 'None' }}</span>
                        <h3 class="text-xl font-bold mt-4">{{ $item['title'] }}</h3>
                        <p class="text-gray-600 text-sm mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </p>
                        <a href="#" class="text-[#66391c] font-bold text-sm mt-4 inline-block hover:underline">read more
                            →</a>
                    </div>
                </div>
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
                                <img src="https://placehold.co/300" alt="Gallery Image" class="swiper-image w-full">
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Pagination dan Navigation Opsional -->
                {{-- <div class="swiper-pagination"></div> --}}
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
</x-app-layout>