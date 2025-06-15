@php
    $jsonPath = public_path('assets/data-gallery.json'); // Path ke JSON file
    $items = json_decode(file_get_contents($jsonPath), true); // Decode JSON ke array
@endphp

<x-app-layout class="bg-vanilla">
    <section id="carousel-gambar">
        {{-- carousel gambar --}}
        <div class="relative w-full h-[80vh] md:h-[70vh] overflow-hidden mt-14 md:mt-16 ">
            <!-- Carousel Wrapper -->
            <div id="carousel-items" class="flex transition-all duration-500">
                <!-- Carousel Items -->
                <div class="w-full h-[80vh] md:h-[70vh] flex-shrink-0">
                    <div
                        class="w-full h-[80vh] md:h-[70vh] flex justify-center items-center bg-gradient-to-b absolute
                 z-10 from-black/50 from- via-transparent to-black-30">
                        <h1
                            class="text-2xl md:text-5xl drop-shadow-2xl rounded-xl bg-black/5 p-4 backdrop-blur-[1px] font-bold font-montserrat text-vanilla">
                            WELCOME TO OUR PAGE</h1>
                    </div>
                    <img src="{{ asset('assets/foto-angkatan(1).JPG') }}"
                        class="object-center h-full object-cover relative w-full" alt="Image 1">
                </div>
                <div class="w-full h-[80vh] md:h-[70vh] flex-shrink-0">
                    <img src="{{ asset('assets/foto-angkatan(1).JPG') }}"
                        class="w-full object-center h-full object-cover" alt="Image 2">
                </div>
                <div class="w-full h-[80vh] md:h-[70vh] flex-shrink-0">

                    <img src="{{ asset('assets/foto-angkatan(1).JPG') }}"
                        class="w-full object-center h-full object-cover" alt="Image 2">
                </div>
                <div class="w-full h-[80vh] md:h-[70vh] flex-shrink-0">
                    <img src="{{ asset('assets/foto-angkatan(1).JPG') }}"
                        class="w-full object-center h-full object-cover" alt="Image 2">
                </div>

                <!-- Add more items as needed -->
            </div>
            <!-- Navigation Controls -->
            <button id="prev0"
                class="absolute top-1/2 left-2 -translate-y-1/2 font-montserrat text-lg hover:text-2xl bg-black/10 hover:bg-black/30 hover:w-[5vh] hover:h-[5vh] transition-all  backdrop-blur-sm text-white/50 w-[4vh] h-[4vh]  rounded-full">
                < </button>
                    <button id="next0"
                        class="absolute top-1/2 right-2 -translate-y-1/2 font-montserrat text-lg hover:text-2xl bg-black/10 hover:bg-black/30 hover:w-[5vh] hover:h-[5vh] transition-all  backdrop-blur-sm text-white/50 w-[4vh] h-[4vh]  rounded-full">></button>

                    <!-- Indicators -->
                    <div id="indicators"
                        class="absolute transition-all duration-500 bottom-0 left-0 right-0 flex justify-center space-x-2 bg-gradient-to-t bg-opacity-20 md:from-vanilla/80 from-vanilla w-full pb-12 pt-4">
                        <!-- Indicators will be generated here -->
                    </div>
        </div>
    </section>

    <section id="aboutUs">
        <div class="slider w-screen max-w-full xl:h-[600px] h-[500px] mx-auto relative overflow-hidden">
             <button id="prev1"
                    class="absolute top-1/2 left-4 md:left-16 z-50 -translate-y-1/2 font-mono text-lg hover:text-2xl text-chocolate rounded-full">
                    < </button>
             <button id="next1"
                    class="absolute top-1/2 right-4 md:right-16 z-50 -translate-y-1/2 font-mono text-lg hover:text-2xl text-chocolate rounded-full">
                    > </button>
             
            <div class="list absolute w-max h-full left-0 top-0 flex transition duration-1000">
               
                        <div class="item w-screen flex justify-center max-w-full py-24">
                            <div
                                class="w-[90vw] lg:w-[65vw] relative xl:w-[80vw] grid grid-cols-12 items-center shadow-2xl shadow-chocolate bg-mocca bg-opacity-10 rounded-3xl xl:px-24 text-justify text-chocolate">
                                
                                <div class="flex items-center col-span-10 md:pr-8">
                                    <img src="{{ asset('assets/logo-encryptour.png') }}" alt="logo"
                                        class="w-auto h-[150px] md:h-[300px] xl:h-[400px]">
                                    <h2 class="text-4xl font-bold">About Us</h2>
                                </div>
                              
                            </div>
                        </div>
                        <div class="item w-screen flex justify-center max-w-full py-24">
                            <div
                                class="w-[90vw] lg:w-[65vw] xl:w-[80vw] grid grid-cols-12 items-center shadow-2xl shadow-chocolate bg-mocca bg-opacity-10 rounded-3xl xl:px-24 text-justify text-chocolate">
                                
                                <div class="flex items-center col-span-10 pr-8">
                                    <img src="{{ asset('assets/logo-encryptour.png') }}" alt="logo"
                                        class="w-auto h-[150px] md:h-[300px] xl:h-[400px]">
                                    <p class="md:text-2xl">ENCRYPTOUR (enkriptour) memiliki akronim yaitu ENgineers of Computer, Young
                                        Pioneers Twenty fOUR.</p>
                                </div>
                                
                            </div>
                        </div>
                        <div class="item w-screen flex justify-center max-w-full py-24">
                            <div
                                class="w-[90vw] lg:w-[65vw] xl:w-[80vw] grid grid-cols-12 items-center shadow-2xl shadow-chocolate bg-mocca bg-opacity-10 rounded-3xl xl:px-24 text-justify text-chocolate">
                               
                                <div class="flex items-center col-span-10 pr-8">
                                    <img src="{{ asset('assets/logo-encryptour.png') }}" alt="logo"
                                        class="w-auto h-[150px] md:h-[300px] xl:h-[400px]">
                                    <p class="md:text-2xl">Diambil dari kata “enkripsi” yang artinya melindungi suatu data.</p>
                                </div>
                               
                            </div>
                        </div>
                        <div class="item w-screen flex justify-center max-w-full py-24">
                            <div
                                class="w-[90vw] lg:w-[65vw] xl:w-[80vw] grid grid-cols-12 items-center shadow-2xl shadow-chocolate bg-mocca bg-opacity-10 rounded-3xl xl:px-24 text-justify text-chocolate">
                                
                                <div class="flex items-center col-span-10 pr-8">
                                    <img src="{{ asset('assets/logo-encryptour.png') }}" alt="logo"
                                        class="w-auto h-[150px] md:h-[300px] xl:h-[400px]">
                                    <p class="md:text-2xl">Young Pioneer maksudnya adalah kami penggerak muda dari Teknik Komputer angkatan
                                        2024.</p>
                                </div>
                                
                            </div>
                        </div>
                        <div class="item w-screen flex justify-center max-w-full py-24">
                            <div
                                class="w-[90vw] lg:w-[65vw] xl:w-[80vw] grid grid-cols-12 items-center shadow-2xl shadow-chocolate bg-mocca bg-opacity-10 rounded-3xl xl:px-24 text-justify text-chocolate">
                              
                                <div class="flex items-center col-span-10 pr-8">
                                    <img src="{{ asset('assets/logo-encryptour.png') }}" alt="logo"
                                        class="w-auto h-[150px] md:h-[300px] xl:h-[400px]">
                                    <p class="md:text-2xl">Kami sebagai angkatan memiliki keharusan dan tanggung jawab dalam saling
                                        melindungi satu sama lain.</p>
                                </div>
                             
                            </div>
                        </div>
            </div>
            <ul class="dots absolute bottom-[100px] left-0 text-white w-full m-0 p-0 flex justify-center transition-all">
                <li class="active list-none w-[10px] h-[10px] bg-chocolate m-[10px] rounded-[20px] transition duration-500">
                </li>
                <li class="list-none w-[10px] h-[10px] bg-white m-[10px] rounded-[20px] transition duration-500"></li>
                <li class="list-none w-[10px] h-[10px] bg-white m-[10px] rounded-[20px] transition duration-500"></li>
                <li class="list-none w-[10px] h-[10px] bg-white m-[10px] rounded-[20px] transition duration-500"></li>
                <li class="list-none w-[10px] h-[10px] bg-white m-[10px] rounded-[20px] transition duration-500"></li>
            </ul>
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
                below to check it all out!</p>

            <!-- Ini buat desktop! -->
            <div class="flex justify-center mb-12 hidden lg:flex">
                <div id="categoryButtons" class="flex gap-4 bg-mocca rounded-full px-4 py-2 text-lg font-bold">
                    <button data-category="all"
                        class="px-4 text-[#66391c] border-b-4 hover:text-[#F2E5BF] category-button">all</button>
                    <button data-category="proker" class="px-4 text-[#66391c] hover:text-[#F2E5BF] category-button">
                        proker
                    </button>
                    <button data-category="prestasi" class="px-4 text-[#66391c] hover:text-[#F2E5BF] category-button">
                        prestasi </button>
                    <button data-category="tweets" class="px-4 text-[#66391c] hover:text-[#F2E5BF] category-button">
                        tweets
                    </button>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    if (window.innerWidth >= 1024) {
                        const buttons = document.querySelectorAll('.category-button');
                        const items = document.querySelectorAll('.gallery-item');
                        buttons.forEach(button => {
                            button.addEventListener('click', () => {
                                const category = button.getAttribute('data-category');

                                buttons.forEach(btn => {
                                    btn.classList.remove('border-b-4');
                                    btn.classList.add('text-[#66391c]');
                                });
                                button.classList.add('border-b-4');
                                button.classList.remove('text-[#66391c]');

                                items.forEach(item => {
                                    if (category === 'all' || item.getAttribute('data-category') ===
                                        category) {
                                        item.style.display = 'block';
                                    } else {
                                        item.style.display = 'none';
                                    }
                                });
                            });
                        });
                    }

                    // Optional: Kalo mau bisa nge handle resize windows
                    window.addEventListener('resize', () => {
                        if (window.innerWidth >= 1024) {
                            // kasih kode aja
                        }
                    });
                });
            </script>

            <div class="hidden lg:grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6" id="galleryGrid">
                @foreach ($items as $item)
                    <div class="gallery-item bg-white rounded-lg shadow-lg overflow-hidden"
                        data-category="{{ $item['category'] }}">
                        <div
                            class="h-full bg-mocca flex justify-center items-center text-3xl text-vanilla text-center font-bold w-full">
                            COMING SOON!
                        </div>
                        {{-- <img src="{{ asset($item['img']) }}" alt="Gallery Image" class="w-full"> --}}
                        <div class="p-4">
                            <span
                                class="text-sm bg-mocca/20 text-[#66391c] py-1 px-2 rounded-full font-semibold uppercase">{{ $item['category'] }}</span>
                            <h3 class="text-xl font-bold mt-4">{{ $item['title'] }}</h3>
                            <p class="text-gray-600 text-sm mt-2">Lorem ipsum dolor sit amet consectetur adipisicing
                                elit.
                            </p>
                            <a href="#"
                                class="text-[#66391c] font-bold text-sm mt-4 inline-block hover:underline">see
                                more →</a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Ini buat mobile! -->
            <div class="lg:hidden">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        @foreach ($items as $item)
                            <div class="swiper-slide swiper-slides relative">
                                <div class="gallery-item bg-cards/20 rounded-lg shadow-lg overflow-hidden">
                                    <!-- Semua overlay -->
                                    <div class="absolute inset-0 flex flex-col justify-between p-4 z-10">
                                        <!-- Judul sama kategori -->
                                        <div>
                                            <span
                                                class="text-sm bg-mocca text-[#66391c] py-1 px-2 rounded-full font-semibold uppercase">{{ $item['category'] }}</span>
                                            <h3 class="text-xl font-bold mt-2 text-white">{{ $item['title'] }}</h3>
                                        </div>
                                        <div
                                            class="h-full flex justify-center items-center text-3xl text-vanilla text-center font-bold w-full">
                                            COMING SOON!
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
                                    <div class="bg-mocca swiper-image w-full h-full"></div>
                                    {{-- <img src="{{ asset($item['img']) }}" alt="Gallery Image"
                                        class="swiper-image w-full"> --}}
                                </div>
                            </div>
                            <div class="swiper-slide swiper-slides relative">
                                <div class="gallery-item bg-cards/20 rounded-lg shadow-lg overflow-hidden">
                                    <!-- Semua overlay -->
                                    <div class="absolute inset-0 flex flex-col justify-between p-4 z-10">
                                        <!-- Judul sama kategori -->
                                        <div>
                                            <span
                                                class="text-sm bg-mocca text-[#66391c] py-1 px-2 rounded-full font-semibold uppercase">{{ $item['category'] }}</span>
                                            <h3 class="text-xl font-bold mt-2 text-white">{{ $item['title'] }}</h3>
                                        </div>
                                        <div
                                            class="h-full flex justify-center items-center text-3xl text-vanilla text-center font-bold w-full">
                                            COMING SOON!
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
                                    <div class="bg-mocca swiper-image w-full h-full"></div>
                                    {{-- <img src="{{ asset($item['img']) }}" alt="Gallery Image"
                                        class="swiper-image w-full"> --}}
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
        <!-- <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" /> -->
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

        <!-- <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script> -->

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
    </div>

    <section id="proker">
        <div class="flex my-20 md:my-32 items-center justify-center">
            <div class="w-1/4 md:w-1/3 h-1 bg-chocolate shadow-lg"></div>
            <div class="w-4 rounded-full bg-chocolate h-4 shadow-xl"></div>
            <div class="text-2xl md:text-4xl md:w-1/3 w-2/4 font-bold flex justify-center text-chocolate">
                <h2> Program Kerja</h2>
            </div>
            <div class="w-4 rounded-full bg-chocolate h-4 shadow-xl"></div>
            <div class="w-1/4 md:w-1/3 h-1 bg-chocolate shadow-lg"></div>
        </div>
        <div class="w-full relative  overflow-hidden">
            <div class="swipers centered-slide-carousel swiper-container relative ">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div
                            class=" w-full h-1/4 z-10 absolute rounded-2xl top-0 overflow-hidden left-0 p-7  bg-gradient-to-b from-black/30">
                            <h3
                                class="text-lg md:text-2xl text-vanilla font-medium absolute top-5 md:top-10 font-montserrat drop-shadow-md">
                                DD - MM - YYYY</h3>
                        </div>
                        <div
                            class=" w-full h-1/2 z-10 rounded-2xl absolute bottom-0 overflow-hidden left-0 p-7  bg-gradient-to-t from-black/60">
                            <h3
                                class="text-xl md:text-4xl text-vanilla pr-2 md:pr-0 font-bold absolute bottom-16 md:bottom-16 font-montserrat drop-shadow-md">
                                COMING SOON!</h3>
                            <p style="scrollbar-width: none; -ms-overflow-style: none;"
                                class="text-xs text-vanilla font-base absolute top-2/3 md:bottom-10 pr-2  md:pr-4 md:text-md md:h-8 h-6 overflow-y-auto font-montserrat">
                                Our Proker is still coming soon!
                            </p>
                        </div>
                        <div class="w-full absolute rounded-2xl h-full bg-mocca shadow-lg overflow-hidden ">

                            {{-- <img src="{{ asset('assets/foto-angkatan(2).JPG') }}" class=" object-cover w-full h-full object-center"
                                alt="foto-angkatan2"> --}}
                            <img src="{{ asset('assets/maintenance.png') }}"
                                class="transition-all -left-1/3 top-1/4 md:left-0 md:top-0 absolute animate-spin-slow duration-1000 "
                                alt="">

                        </div>
                        <div class="bg-indigo-50 rounded-2xl h-[40vh]  flex justify-center items-center">
                            <span class="text-3xl font-semibold text-chocolate">Slide</span>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div
                            class=" w-full h-1/4 z-10 absolute rounded-2xl top-0 overflow-hidden left-0 p-7  bg-gradient-to-b from-black/30">
                            <h3
                                class="text-lg md:text-2xl text-vanilla font-medium absolute top-5 md:top-10 font-montserrat drop-shadow-md">
                                DD - MM - YYYY</h3>
                        </div>
                        <div
                            class=" w-full h-1/2 z-10 rounded-2xl absolute bottom-0 overflow-hidden left-0 p-7  bg-gradient-to-t from-black/60">
                            <h3
                                class="text-xl md:text-4xl text-vanilla pr-2 md:pr-0 font-bold absolute bottom-16 md:bottom-16 font-montserrat drop-shadow-md">
                                COMING SOON!</h3>
                            <p style="scrollbar-width: none; -ms-overflow-style: none;"
                                class="text-xs text-vanilla font-base absolute top-2/3 md:bottom-10 pr-2  md:pr-4 md:text-md md:h-8 h-6 overflow-y-auto font-montserrat">
                                Our Proker is still coming soon!
                            </p>
                        </div>
                        <div class="w-full absolute rounded-2xl h-full bg-mocca shadow-lg overflow-hidden ">
                            {{-- <img src="{{ asset('assets/foto-angkatan(2).JPG') }}" class=" object-cover w-full h-full object-center"
                                alt=""> --}}
                            <img src="{{ asset('assets/maintenance.png') }}"
                                class="transition-all -left-1/3 top-1/4 md:left-0 md:top-0 absolute animate-spin-slow duration-1000 "
                                alt="">

                        </div>
                        <div class="bg-indigo-50 rounded-2xl h-[40vh]  flex justify-center items-center">
                            <span class="text-3xl font-semibold text-chocolate">Slide</span>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div
                            class=" w-full h-1/4 z-10 absolute rounded-2xl top-0 overflow-hidden left-0 p-7  bg-gradient-to-b from-black/30">
                            <h3
                                class="text-lg md:text-2xl text-vanilla font-medium absolute top-5 md:top-10 font-montserrat drop-shadow-md">
                                DD - MM - YYYY</h3>
                        </div>
                        <div
                            class=" w-full h-1/2 z-10 rounded-2xl absolute bottom-0 overflow-hidden left-0 p-7  bg-gradient-to-t from-black/60">
                            <h3
                                class="text-xl md:text-4xl text-vanilla pr-2 md:pr-0 font-bold absolute bottom-16 md:bottom-16 font-montserrat drop-shadow-md">
                                COMING SOON!</h3>
                            <p style="scrollbar-width: none; -ms-overflow-style: none;"
                                class="text-xs text-vanilla font-base absolute top-2/3 md:bottom-10 pr-2  md:pr-4 md:text-md md:h-8 h-6 overflow-y-auto font-montserrat">
                                Our Proker is still coming soon!
                            </p>
                        </div>
                        <div class="w-full absolute rounded-2xl h-full bg-mocca shadow-lg overflow-hidden ">
                            {{-- <img src="{{ asset('assets/foto-angkatan(2).JPG') }}" class=" object-cover w-full h-full object-center"
                                alt=""> --}}
                            <img src="{{ asset('assets/maintenance.png') }}"
                                class="transition-all -left-1/3 top-1/4 md:left-0 md:top-0 absolute animate-spin-slow duration-1000 "
                                alt="">

                        </div>
                        <div class="bg-indigo-50 rounded-2xl h-[40vh]  flex justify-center items-center">
                            <span class="text-3xl font-semibold text-chocolate">Slide</span>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div
                            class=" w-full h-1/4 z-10 absolute rounded-2xl top-0 overflow-hidden left-0 p-7  bg-gradient-to-b from-black/30">
                            <h3
                                class="text-lg md:text-2xl text-vanilla font-medium absolute top-5 md:top-10 font-montserrat drop-shadow-md">
                                DD - MM - YYYY</h3>
                        </div>
                        <div
                            class=" w-full h-1/2 z-10 rounded-2xl absolute bottom-0 overflow-hidden left-0 p-7  bg-gradient-to-t from-black/60">
                            <h3
                                class="text-xl md:text-4xl text-vanilla pr-2 md:pr-0 font-bold absolute bottom-16 md:bottom-16 font-montserrat drop-shadow-md">
                                COMING SOON!</h3>
                            <p style="scrollbar-width: none; -ms-overflow-style: none;"
                                class="text-xs text-vanilla font-base absolute top-2/3 md:bottom-10 pr-2  md:pr-4 md:text-md md:h-8 h-6 overflow-y-auto font-montserrat">
                                Our Proker is still coming soon!
                            </p>
                        </div>
                        <div class="w-full absolute rounded-2xl h-full bg-mocca shadow-lg overflow-hidden ">
                            {{-- <img src="{{ asset('assets/foto-angkatan(2).JPG') }}" class=" object-cover w-full h-full object-center"
                                alt=""> --}}
                            <img src="{{ asset('assets/maintenance.png') }}"
                                class="transition-all -left-1/3 top-1/4 md:left-0 md:top-0 absolute animate-spin-slow duration-1000 "
                                alt="">

                        </div>
                        <div class="bg-indigo-50 rounded-2xl h-[40vh]  flex justify-center items-center">
                            <span class="text-3xl font-semibold text-chocolate">Slide</span>
                        </div>
                    </div>
                </div>

                <div class="w-full flex justify-center swiper-paginations "></div>
            </div>
        </div>
        <style>
            /* CSS Code */
            .swiper-wrapper {
                width: 100%;
                height: max-content !important;
                padding-bottom: 64px !important;
                -webkit-transition-timing-function: linear !important;
                transition-timing-function: linear !important;
                position: relative;
            }

            .swiper-pagination-bullet {
                background: #66391C;
            }

            .swiper-pagination-bullet-active {
                background: #66391C !important;
            }
        </style>
        <link href="{{ asset('css/swiper.css') }}" rel="stylesheet" />
        <script src="{{ asset('js/swiper.js') }}"></script>
        <script>
            var swiper = new Swiper(".centered-slide-carousel", {
                centeredSlides: true,
                paginationClickable: true,
                loop: true,
                spaceBetween: 30,
                slideToClickedSlide: true,
                pagination: {
                    el: ".centered-slide-carousel .swiper-paginations",
                    clickable: true,
                },
                breakpoints: {
                    1920: {
                        slidesPerView: 4,
                        spaceBetween: 30
                    },
                    720: {
                        slidesPerView: 2,
                        spaceBetween: 20
                    },
                    300: {
                        slidesPerView: 2,
                        spaceBetween: 10
                    }
                }
            });
        </script>
    </section>
    <section id="bio" class="relative overflow-hidden">
        <script>
            function openModal(button) {


                var itemData = JSON.parse(button.getAttribute('data-item'));

                // Update the modal content
                var modal = document.getElementById('modal');


                // Assuming you're passing an object with properties, update modal content
                modal.innerHTML = `
        <div id="modalContent"
    class="transform transition-all scale-95 opacity-0 w-[90vw] h-[90vh] shadow-lg hidden md:flex flex-wrap bg-gradient-to-tl from-[#AD7D4F] from-60% to-[#EDB47E]  mx-auto">
    <div class="w-[5vw] h-full bg-transparent mx-auto mt-20 relative">
        <a href="https://www.instagram.com/${itemData.user_ig}/"><img class="mx-auto mb-6 w-1/2" src="assets/uil_instagram.svg" alt=""></a>
        <a href="mailto:${itemData.email_adress}"><img class="mx-auto mb-6 w-1/2" src="assets/mail.svg" alt=""></a>
        <a href="https://wa.me/${itemData.no_wa}"><img class="mx-auto mb-6 w-1/2" src="assets/telephone.svg" alt=""></a>
        <a href="https://www.instagram.com/tekkom_24/"><img class="mx-auto mb-4 w-1/3 absolute bottom-24 left-1/2 -translate-x-1/2"
                src="assets/burger.svg" alt=""></a>
    </div>
    <div class="w-1/3 bg-white h-full border"></div>
    <div class="w-7/12  h-full relative">
        <div id="closeModal"
            class="absolute right-5 top-3 hover:rotate-180 hover:duration-500 hover:scale-90 transition cursor-pointer text-vanilla text-3xl">
            &#128936;
        </div>
        <img src="/assets/foto-bebas/${itemData.non_formal_picture}"
            class="w-3/4 max-w-[340px] bottom-0 lg:-left-1/2 md:-left-1/2  md:-translate-x-10 -left-2/3 absolute float-left"
            alt="">
        <div class="p-4">
            <h4 class="lg:text-xl text-sm  mt-10 font-light text-orange-100 capitalize">${itemData.nama_lengkap}</h4>
            <h1 class="lg:text-9xl sm:text-7xl font-bold uppercase text-vanilla">${itemData.nama_panggilan}</p></h1>
        </div>
        <div class="lg:text-xl text-sm  font-light text-orange-100 ml-10 mb-2">
            <p>${itemData.quotes}</p>
        </div>
        <div class="lg:text-xl text-sm  font-light text-orange-100 ml-10 mb-2">
            <ul class="flex flex-wrap">
                <li class="w-1/3">Asal</li>
                <li class="w-1/3">NIM</li>
                <li class="w-1/3">TTL</li>
            </ul>
            <ul class="font-semibold flex flex-wrap">
                <li class="w-1/3">${itemData.asal}</li>
                <li class="w-1/3">${itemData.nim}</li>
                <li class="w-1/3 pr-4">${itemData.ttl}</li>
            </ul>
        </div>
        <!-- alamat kos -->
        <div class="w-full m-4 text-orange-100 lg:text-xl text-sm ml-8 lg:ml-10">
            <h1 class="font-light">Alamat Kos</h1>
            <h1 class="font-semibold w-3/4 overflow-x-auto">${itemData.alamat_kos}</h1>
        </div>
        <!-- alamat rumah -->
        <div class="w-full m-4 ml-4 text-orange-100 lg:text-xl text-sm  flex
             justify-start"  >
            <div class=" ml-4 w-1/2">
                <h1 class="font-light">Alamat Rumah</h1>
                <h1 class="font-semibold  max-h-16 overflow-y-auto">${itemData.alamat_rumah}</h1>
            </div>
            <div class="ml-4">
                <h1 class="font-light">Ketinggian Rumah</h1>
                <h1 class="font-semibold">${itemData.mdpl}</h1>
            </div>
        </div>
        <!-- Hobi -->
        <div class="w-full m-4 ml-4 text-orange-100 lg:text-xl text-sm ">
            <h1 class="  ml-4  font-light">Hobi</h1>
            <h1 class=" ml-4  font-semibold">${itemData.hobi}</h1>
        </div>
        <div class="w-full m-4 ml-4 text-orange-100 lg:text-xl text-sm ">
            <h1 class=" ml-4 font-light">Tempat Makan Favorit</h1>
            <h1 class=" ml-4 font-semibold">${itemData.tempat_makan_fav}</h1>
        </div>

    </div>

</div>

<div id="modalContent2" class="transform transition-all scale-95 opacity-0 md:hidden w-[95vw] my-4 h-[90vh] bg-mocca relative shadow-lg rounded-xl mx-auto overflow-hidden">
    <div class="w-full flex justify-center items-center relative h-12 bg-gradient-to-l from-[#AD7D4F] from-60% to-[#EDB47E]">
        <h1 class="font-montserrat font-bold text-vanilla uppercase text-xl">${itemData.nama_panggilan}</h1>
        <button id="closeModal2"
            class="absolute p-1 right-6 top-1 hover:rotate-180 hover:duration-500 hover:scale-90 transition cursor-pointer text-chocolate text-xl">
            x
        </button>
    </div>
    <div class="w-full h-1/3  bg-transparent flex justify-center bg-white relative items-end ">
        <img src="/assets/foto-bebas/${itemData.non_formal_picture}" class="object-cover h-[125%] absolute  -bottom-20" alt="">
    </div>
    <div class="w-full h-1/2 bg-gradient-to-tr from-[#AD7D4F] from-60% to-[#EDB47E] relative p-6">
        <div class="w-full">
            <h1 class="text-base font-semibold text-vanilla mb-2">${itemData.nama_lengkap}</h1>
        </div>
        <div 
            class="w-full h-12 text-vanilla overflow-y-auto text-xs font-light mb-4 ">
            ${itemData.quotes}
        </div>
        <div class="asal-nim-ttl">
            <div class="w-full flex text-xs font-normal text-vanilla justify-evenly ">
                <h3 class="w-1/3">ASAL</h3>
                <h3 class="w-1/3">NIM</h3>
                <h3 class="w-1/3">TTL</h3>
            </div>
            <div class="w-full flex text-xs font-medium text-vanilla justify-evenly mb-2">
                <h3 class="w-1/3">${itemData.asal}</h3>
                <h3 class="w-1/3">${itemData.nim}</h3>
                <h3 class="w-1/3">${itemData.ttl}</h3>
            </div>
        </div>
        <div class="alamat mb-2">
            <div class="w-full text-vanilla text-xs font-normal flex justify-evenly">
                <h3 class="w-1/3">Alamat Kos</h3>
                <h3 class="w-1/3"></h3>
                <h3 class="w-1/3">Alamat Rumah</h3>
            </div>
            <div class="w-full text-vanilla text-xs font-medium flex justify-evenly">
                <h3 class="w-2/3 overflow-y-auto h-14 pr-4">${itemData.alamat_kos}</h3>
                <h3 class="w-1/3 overflow-y-auto  h-14">${itemData.alamat_rumah}</h3>
            </div>
        </div>
        <div class="unique">
            <div class="w-full text-vanilla text-xs font-normal flex justify-evenly">
                <h3 class="w-1/3">Ketinggian Rumah</h3>
                <h3 class="w-1/3">Hobi</h3>
                <h3 class="w-1/3">Tempat Makan Fav.</h3>
            </div>
            <div class="w-full text-vanilla text-xs font-medium flex justify-evenly">
                <h3 class="w-1/3">${itemData.mdpl}</h3>
                <h3 class="w-1/3">${itemData.hobi}</h3>
                <h3 class="w-1/3">${itemData.tempat_makan_fav}</h3>
            </div>
        </div>

    </div>
    <div class="w-full h-12 absolute bottom-0 bg-chocolate md:hidden ">
    <div class="w-full h-1 bg-vanilla"></div>
    <div class="w-full flex justify-center items-center h-full">
        <a href="https://www.instagram.com/${itemData.user_ig}/"><img class=" w-2/3" src="assets/uil_instagram.svg"
                alt="instagram"></a>
        <a href="mailto:${itemData.email_adress}"><img class=" w-2/3" src="assets/mail.svg" alt="Mail"></a>
        <a href="https://wa.me/${itemData.no_wa}"><img class=" w-2/3" src="assets/telephone.svg"
                alt="Whatsapp Number"></a>
        <!-- <a href=""><img class=" w-2/3" src="assets/burger.svg" alt=""></a> -->
    </div>
</div>
</div>
    `;
                document.getElementById('modal').classList.remove('hidden');
                var modalContent = document.getElementById('modalContent');
                var modalContent2 = document.getElementById('modalContent2');
                setTimeout(() => {
                    modalContent.classList.add('opacity-100', 'scale-100');
                    modalContent.classList.remove('opacity-0', 'scale-95');
                    modalContent2.classList.add('opacity-100', 'scale-100');
                    modalContent2.classList.remove('opacity-0', 'scale-95');
                }, 10);
                var closeModalBtn = document.getElementById('closeModal');
                var closeModalBtn2 = document.getElementById('closeModal2');

                closeModalBtn.addEventListener('click', () => {
                    modalContent.classList.remove('opacity-100', 'scale-100');
                    modalContent.classList.add('opacity-0', 'scale-95');
                    setTimeout(() => {
                        modal.classList.add('hidden');
                    }, 300);

                });
                closeModalBtn2.addEventListener('click', () => {
                    modalContent2.classList.remove('opacity-100', 'scale-100');
                    modalContent2.classList.add('opacity-0', 'scale-95');
                    setTimeout(() => {
                        modal.classList.add('hidden');
                    }, 300);
                });


            }
        </script>
        <div class="flex my-20 md:my-32 items-center justify-center">
            <div class="w-1/4 md:w-1/3 h-1 bg-chocolate shadow-lg"></div>
            <div class="w-4 rounded-full bg-chocolate h-4 shadow-xl"></div>
            <div class="text-2xl md:text-4xl md:w-1/3 w-2/4 font-bold flex justify-center text-chocolate">
                <h2> Biodata</h2>
            </div>
            <div class="w-4 rounded-full bg-chocolate h-4 shadow-xl"></div>
            <div class="w-1/4 md:w-1/3 h-1 bg-chocolate shadow-lg"></div>
        </div>
        {{-- <div id="biodata" class="absolute w-full top-10 left-0 flex justify-center bg-mocca">
            <h1 class="bg-vanilla rounded-full py-4 px-24 text-chocolate text-4xl font-bold">Biodata</h1>
        </div> --}}
        <div class="mt-44 grid grid-cols-12 items-center justify-center">
            <a class="col-span-1 mx-auto" href="{{ url('/?page=1&#biodata') }}">
                <button class="w-[50px] h-[50px] rounded-full text-chocolate border-none font-mono font-bold"
                    id="prev">
                    < </button>
            </a>
            <div class="col-span-10 container grid grid-cols-3 gap-2">
                <div id="modal" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black/50">
                </div>
                @forelse ($data as $item)
                    <div onclick="openModal(this)" data-item="{{ json_encode($item) }}"
                        class="overflow-hidden group flex justify-between items-end mx-auto aspect-square xl:w-[350px] lg:w-[280px] sm:w-[210px] w-[108px] transition-all duration-700 ease-in-out border-chocolate border-2 hover:bg-chocolate hover:text-vanilla hover:text-opacity-75">
                        <div class="flex flex-col mb-2 sm:mb-4 lg:mb-12 ml-1 sm:ml-2 lg:ml-6 z-10">
                            <div class="text-xs sm:text-sm">{{ $item['nama_lengkap'] }}</div>
                            <div class="hidden sm:block text-2xl font-bold mb-2">{{ $item['nama_panggilan'] }}</div>
                            <div class="hidden sm:block text-sm">{{ $item['nim'] }}</div>
                            <div class="hidden sm:block text-sm">{{ $item['asal'] }}</div>
                        </div>
                        <div
                            class="z-0
                    xl:group-hover:scale-125 group-hover:scale-150
                    xl:group-hover:-translate-x-6 lg:group-hover:-translate-x-8 sm:group-hover:-translate-x-6 group-hover:-translate-x-1
                    xl:group-hover:-translate-y-8 lg:group-hover:-translate-y-12 sm:group-hover:-translate-y-8 group-hover:-translate-y-2
                    transition-transform">
                            <img src="{{ '/assets/foto-formal/' . $item['formal_picture'] }}" alt=""
                                srcset="" class="object-cover w-full h-full max-w-[360px] max-h-[360px]">
                        </div>
                    </div>
                @empty
                    <div>No data found.</div>
                @endforelse
            </div>
            <a class="col-span-1 mx-auto" href="{{ url('/?page=2&#biodata') }}">
                <button class="w-[50px] h-[50px] rounded-full text-chocolate border-none font-mono font-bold"
                    id="next">></button>
            </a>
        </div>
        <div class="container my-10 mx-auto flex gap-2 justify-center">
            <a href="{{ url('/biodata') }}">
                <button
                    class="text-chocolate border-chocolate border-2 py-2 px-4 rounded-lg hover:bg-chocolate hover:text-vanilla">
                    See More
                </button>
            </a>
        </div>
        <script type="text/javascript">
            let slider = document.querySelector('.slider .list');
            let items2 = document.querySelectorAll('.slider .list .item');
            let dots = document.querySelectorAll('.slider .dots li');
            let lengthItems = items2.length - 1;
            let active = 0;

            for (let i = 1; i <= 5; i++) {
                let next = document.getElementById(`next${i}`);
                let prev = document.getElementById(`prev${i}`);

                next.onclick = function() {
                    active = active + 1 <= lengthItems ? active + 1 : 0;
                    reloadSlider();
                }
                prev.onclick = function() {
                    active = active - 1 >= 0 ? active - 1 : lengthItems;
                    reloadSlider();
                }
            }
            // let refreshInterval = setInterval(()=> {next.click()}, 3000);
            function reloadSlider() {
                slider.style.left = -items2[active].offsetLeft + 'px';
                //
                let last_active_dot = document.querySelector('.slider .dots li.active');
                last_active_dot.classList.remove('active','bg-chocolate');
                last_active_dot.classList.add('bg-white');
                dots[active].classList.remove('bg-white');
                dots[active].classList.add('active','bg-chocolate');

                // clearInterval(refreshInterval);
                // refreshInterval = setInterval(()=> {next.click()}, 3000);
            }

            dots.forEach((li, key) => {
                li.addEventListener('click', () => {
                    active = key;
                    reloadSlider();
                })
            })
            window.onresize = function(event) {
                reloadSlider();
            };
        </script>
    </section>


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
            const duration = currentIndex === 0 ? 3000 : 2500;
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

</x-app-layout>
