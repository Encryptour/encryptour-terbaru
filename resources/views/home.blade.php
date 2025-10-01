<x-app-layout class="bg-vanilla">
    <section id="carousel-gambar">
        {{-- carousel gambar --}}
        <div class="relative w-full h-[80vh] md:h-[70vh] overflow-hidden mt-14 md:mt-16 ">
            <!-- Carousel Wrapper -->
            <div id="carousel-items" class="flex transition-all duration-500">

                @foreach ($carousels as $index => $item)
                    <div class="w-full h-[80vh] md:h-[70vh] flex-shrink-0 relative snap-center">
                        @if ($index === 0)
                            <div
                                class="w-full h-full flex justify-center items-center bg-gradient-to-b absolute z-10 from-black/50 via-transparent to-black/30">
                                <h1
                                    class="text-2xl md:text-5xl drop-shadow-2xl rounded-xl bg-black/5 p-4 backdrop-blur-[1px] font-bold font-montserrat text-vanilla">
                                    WELCOME TO OUR PAGE
                                </h1>
                            </div>
                        @endif
                        <img src="{{ $item->img }}" class="object-center h-full object-cover w-full relative"
                            alt="Image {{ $index + 1 }}">
                    </div>
                @endforeach
            </div>
            <!-- Navigation Controls -->
            <button id="prev0"
                class="absolute top-1/2 left-2 -translate-y-1/2 font-montserrat text-lg hover:text-2xl bg-black/10 hover:bg-black/30 hover:w-[5vh] hover:h-[5vh] transition-all  backdrop-blur-sm text-white/50 w-[4vh] h-[4vh]  rounded-full">˂</button>
            <button id="next0"
                class="absolute top-1/2 right-2 -translate-y-1/2 font-montserrat text-lg hover:text-2xl bg-black/10 hover:bg-black/30 hover:w-[5vh] hover:h-[5vh] transition-all  backdrop-blur-sm text-white/50 w-[4vh] h-[4vh]  rounded-full">˃</button>
            <!-- Indicators -->
            <div id="indicators"
                class="absolute transition-all duration-500 bottom-0 left-0 right-0 flex justify-center space-x-2 bg-gradient-to-t bg-opacity-20 md:from-vanilla/80 from-vanilla w-full pb-12 pt-4">
            </div>
        </div>
    </section>

    <section id="aboutUs">
        {{-- carousel about us --}}
        <div class="relative w-full h-[80vh] md:h-[70vh] flex justify-center items-center mt-14 md:mt-16">
            <!-- Card -->
            <div
                class="relative w-[90vw] lg:w-[65vw] xl:w-[80vw] h-[60vh] shadow-2xl shadow-chocolate 
        bg-mocca bg-opacity-10 rounded-3xl p-6 xl:px-24 flex flex-col justify-center items-center text-chocolate overflow-hidden">

                @php
                    $aboutSlides = [
                        ['type' => 'title', 'content' => 'About Us'],
                        [
                            'type' => 'text',
                            'content' =>
                                'ENCRYPTOUR (enkriptour) memiliki akronim yaitu ENgineers of Computer, Young Pioneers Twenty fOUR.',
                        ],
                        [
                            'type' => 'text',
                            'content' => 'Diambil dari kata “enkripsi” yang artinya melindungi suatu data.',
                        ],
                        [
                            'type' => 'text',
                            'content' =>
                                'Young Pioneer maksudnya adalah kami penggerak muda dari Teknik Komputer angkatan 2024.',
                        ],
                        [
                            'type' => 'text',
                            'content' =>
                                'Kami sebagai angkatan memiliki keharusan dan tanggung jawab dalam saling melindungi satu sama lain.',
                        ],
                    ];
                @endphp
                <div class="relative w-full h-[300px] overflow-hidden">
                    <div id="about-carousel-items"
                        class="flex transition-transform duration-500 w-full h-full items-center">
                        @foreach ($aboutSlides as $slide)
                            <div class="min-w-full flex flex-col items-center justify-center text-center px-10">
                                @if ($slide['type'] === 'title')
                                    <img src="{{ asset('assets/Logo Encryptour.png') }}" alt="logo"
                                        class="w-auto h-[100px] md:h-[200px] xl:h-[250px] mb-0">
                                    <h2 class="text-2xl md:text-3xl font-bold">{{ $slide['content'] }}</h2>
                                @else
                                    <p class="text-base md:text-2xl">{{ $slide['content'] }}</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- Indicators (di dalam card) -->
                <div id="about-indicators" class="absolute bottom-4 flex space-x-2"></div>
            </div>

            <!-- Navigation Controls -->
            <button id="prevAbout" class="absolute left-4 top-1/2 -translate-y-1/2 font-montserrat text-lg bg-black/20 hover:text-2xl bg-black/10 hover:bg-black/30 hover:w-[5vh] hover:h-[5vh] transition-all 
                   text-white/70 w-[4vh] h-[4vh] rounded-full flex items-center justify-center">˂</button>
            <button id="nextAbout" class="absolute right-4 top-1/2 -translate-y-1/2 font-montserrat text-lg bg-black/20 hover:text-2xl bg-black/10 hover:bg-black/30 hover:w-[5vh] hover:h-[5vh] transition-all 
                   text-white/70 w-[4vh] h-[4vh] rounded-full flex items-center justify-center">˃</button>
        </div>
    </section>


    <div class="tes">
        <div class="flex my-20 md:my-32 items-center justify-center">
            <div class="w-1/4 md:w-1/3 h-1 bg-chocolate shadow-lg"></div>
            <div class="w-4 rounded-full bg-chocolate h-4 shadow-xl"></div>
            <div class="text-2xl md:text-4xl md:w-1/3 w-2/4 font-bold flex justify-center text-chocolate">
                <h2> Our Gallery</h2>
            </div>
            <div class="w-4 rounded-full bg-chocolate h-4 shadow-xl"></div>
            <div class="w-1/4 md:w-1/3 h-1 bg-chocolate shadow-lg"></div>
        </div>
        <section id="Gallery" class="container mx-auto mt-20 py-4 px-6 ">
            <h1 class="text-4xl md:text-5xl font-extrabold text-start mb-4 md:mb-8 text-[#66391c]">GALLERY</h1>
            <p class="max-w-4xl text-[#66391c] font-medium md:font-semibold md:text-base text-sm leading-relaxed mb-6">
                A collection of exciting moments, from projects, achievements, to other memories. Choose a category
                below to check it all out!
            </p>

            <div class="hidden lg:grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6" id="galleryGrid">
                @foreach ($data as $item)
                    <a href="{{ route('gallery.index') }}">

                        <div class="relative gallery-item w-full h-80 rounded-lg shadow-lg overflow-hidden"
                            data-category="{{ $item->category->name }}">

                            <!-- Background Image -->
                            <div class="absolute inset-0">
                                <img src="{{ $item['img'] }}" alt="{{ $item['title'] }}" class="w-full h-full object-cover">
                                <!-- Tinted Overlay -->
                                <div class="absolute inset-0 bg-black/40"></div>
                            </div>

                            <!-- Category Top Right -->
                            <div class="absolute top-3 right-3 backdrop-blur-md bg-chocolate/40 rounded-full px-3 py-1">
                                <span class="text-xs text-white font-semibold uppercase">
                                    {{ $item->category->name }}
                                </span>
                            </div>

                            <!-- Content Bottom -->
                            <div class="absolute bottom-0 left-0 right-0 p-4">
                                <div class="backdrop-blur-sm bg-mocca/40 rounded-lg px-3 py-2">
                                    <h3 class="text-lg font-bold text-white">{{ $item['title'] }}</h3>
                                </div>
                                <p class="text-white/90 text-sm mt-2 line-clamp-3">{{ $item['desc'] }}</p>
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
                            <div class="swiper-slide swiper-slides relative">
                                <div class="gallery-item bg-cards/20 rounded-lg shadow-lg overflow-hidden">
                                    <!-- Overlay -->
                                    <div class="absolute inset-0 flex flex-col justify-between p-4 z-10">
                                        <!-- Judul + kategori -->
                                        <div>
                                            <span
                                                class="text-sm bg-mocca text-[#66391c] py-1 px-2 rounded-full font-semibold uppercase">
                                                {{ is_array($item['category']) ? $item['category'] : $item['category']->name }}
                                            </span>
                                            <h3 class="text-xl font-bold mt-2 text-white">{{ $item['title'] }}</h3>
                                        </div>
                                    </div>

                                    <!-- Background gambar -->
                                    <div class="swiper-image w-full h-full bg-cover bg-center"
                                        style="background-image: url('{{ $item['img'] }}');">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Navigasi -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </section>

        <!-- Ini library Swiper nya -->
        <style>
            @media (max-width: 768px) {
                .swiper-slides {
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

            .swiper-slides .absolute {
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
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                var swiper = new Swiper(".swiper", {
                    loop: true, // biar muter terus
                    slidesPerView: 1,
                    spaceBetween: 20,
                    navigation: {
                        nextEl: ".swiper-button-next",
                        prevEl: ".swiper-button-prev",
                    },
                    pagination: {
                        el: ".swiper-pagination",
                        clickable: true,
                    },
                });
            });
        </script>

        {{-- carousel gambar --}}
        <script>
            const carousel = document.getElementById('carousel-items');
            const items = carousel.children;
            const totalItems = items.length;
            let currentIndex = 0;
            let interval;

            // Generate indicators
            const indicatorsContainer = document.getElementById('indicators');
            const indicators = [];

            for (let i = 0; i < totalItems; i++) {
                const indicator = document.createElement('button');
                indicator.classList.add('w-3', 'shadow-xl', 'h-2', 'rounded-full', 'bg-vanilla', 'transition-all',
                    'duration-500');
                indicator.setAttribute('aria-label', `Slide ${i + 1}`);
                indicator.addEventListener('click', () => {
                    currentIndex = i;
                    updateCarousel();
                    resetInterval();
                });
                indicatorsContainer.appendChild(indicator);
                indicators.push(indicator);
            }

            document.getElementById('prev0').addEventListener('click', () => {
                currentIndex = (currentIndex > 0) ? currentIndex - 1 : totalItems - 1;
                updateCarousel();
                resetInterval();
            });

            document.getElementById('next0').addEventListener('click', () => {
                currentIndex = (currentIndex < totalItems - 1) ? currentIndex + 1 : 0;
                updateCarousel();
                resetInterval();
            });

            function updateCarousel() {
                const offset = -currentIndex * 100;
                carousel.style.transform = `translateX(${offset}%)`;
                updateIndicators();
            }

            function updateIndicators() {
                indicators.forEach((indicator, index) => {
                    if (index === currentIndex) {
                        indicator.classList.remove('bg-vanilla', 'w-3', 'opacity-50');
                        indicator.classList.add('opacity-100', 'w-10', 'bg-chocolate');
                    } else {
                        indicator.classList.remove('w-10', 'bg-chocolate', 'opacity-100');
                        indicator.classList.add('opacity-50', 'w-3', 'bg-vanilla');
                    }
                });
            }

            function startCarousel() {
                const duration = currentIndex === 0 ? 10000 : 3000;
                interval = setTimeout(() => {
                    currentIndex = (currentIndex < totalItems - 1) ? currentIndex + 1 : 0;
                    updateCarousel();
                    startCarousel();
                }, duration);
            }

            function resetInterval() {
                clearTimeout(interval);
                startCarousel();
            }

            // Initialize the carousel
            updateCarousel();
            startCarousel();
        </script>

        {{-- carousel about us --}}
        <script>
            const aboutCarousel = document.getElementById('about-carousel-items');
            const aboutItems = aboutCarousel.children;
            const aboutTotal = aboutItems.length;
            let aboutIndex = 0;

            // generate indicators
            const aboutIndicators = document.getElementById('about-indicators');
            const dots = [];
            for (let i = 0; i < aboutTotal; i++) {
                const dot = document.createElement('div');
                dot.className = "w-3 h-3 rounded-full bg-chocolate opacity-40 transition-all";
                dot.addEventListener('click', () => {
                    aboutIndex = i;
                    updateAbout();
                });
                aboutIndicators.appendChild(dot);
                dots.push(dot);
            }

            function updateAbout() {
                aboutCarousel.style.transform = `translateX(-${aboutIndex * 100}%)`;
                dots.forEach((dot, i) => {
                    dot.classList.toggle("opacity-100", i === aboutIndex);
                    dot.classList.toggle("w-6", i === aboutIndex);
                });
            }

            document.getElementById('prevAbout').addEventListener('click', () => {
                aboutIndex = (aboutIndex > 0) ? aboutIndex - 1 : aboutTotal - 1;
                updateAbout();
            });

            document.getElementById('nextAbout').addEventListener('click', () => {
                aboutIndex = (aboutIndex < aboutTotal - 1) ? aboutIndex + 1 : 0;
                updateAbout();
            });

            // // auto slide
            // setInterval(() => {
            //     aboutIndex = (aboutIndex < aboutTotal - 1) ? aboutIndex + 1 : 0;
            //     updateAbout();
            // }, 3000);
            updateAbout();
        </script>


</x-app-layout>