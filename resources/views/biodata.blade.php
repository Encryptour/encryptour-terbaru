<x-app-layout>

    <script>
        function openModal(button) {


            var itemData = JSON.parse(button.getAttribute('data-item'));
// push terbaru 2
            // Update the modal content
            var modal = document.getElementById('modal');


            // Assuming you're passing an object with properties, update modal content
            modal.innerHTML = `
        <div id="modalContent"
    class="transform transition-all scale-95 opacity-0 w-[90vw] h-[90vh] shadow-lg hidden md:flex flex-wrap bg-gradient-to-tl from-[#AD7D4F] from-60% to-[#EDB47E]  mx-auto">
    <div class="w-[5vw] h-full bg-transparent mx-auto mt-20 relative">
        <!-- <a href="https://www.instagram.com/${itemData.user_ig}/"><img class="mx-auto mb-6 w-1/2" src="storage/biodata/uil_instagram.svg" alt=""></a>
         <a href="mailto:${itemData.email_adress}"><img class="mx-auto mb-6 w-1/2" src="storage/biodata/mail.svg" alt=""></a>
         <a href="https://wa.me/${itemData.no_wa}"><img class="mx-auto mb-6 w-1/2" src="storage/biodata/telephone.svg" alt=""></a>
        <a href="https://www.instagram.com/tekkom_24/"><img class="mx-auto mb-4 w-1/3 absolute bottom-24 left-1/2 -translate-x-1/2"
                src="storage/biodata/burger.svg" alt=""></a> -->
    </div>
    <div class="w-1/3 bg-white h-full border"></div>
    <div class="w-7/12  h-full relative">
        <div id="closeModal"
            class="absolute right-5 top-3 hover:rotate-180 hover:duration-500 hover:scale-90 transition cursor-pointer text-vanilla text-3xl">
            &#128936;
        </div>
        <img src="${itemData.non_formal_picture}"
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
        <img src="${itemData.non_formal_picture}" class="object-cover h-[125%] absolute  -bottom-20" alt="">
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
         <!-- <a href="https://www.instagram.com/${itemData.user_ig}/"><img class=" w-2/3" src="storage/biodata/uil_instagram.svg"
                 alt="instagram"></a>
         <a href="mailto:${itemData.email_adress}"><img class=" w-2/3" src="storage/biodata/mail.svg" alt="Mail"></a>
         <a href="https://wa.me/${itemData.no_wa}"><img class=" w-2/3" src="storage/biodata/telephone.svg"
                 alt="Whatsapp Number"></a>
        <a href=""><img class=" w-2/3" src="storage/biodata/burger.svg" alt=""></a> -->
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
            action="{{ url('/biodata') }}">
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
        <div id="modal" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black/50">
        </div>
        @forelse ($data as $item)
            {{-- <button > --}}
            <div onclick="openModal(this)" data-item="{{ json_encode($item) }}"
                style="background-image: url('{{ $item['formal_picture'] }}');"
                class="card overflow-hidden group flex items-end mx-auto aspect-square xl:w-[350px] lg:w-[280px] sm:w-[210px] w-[108px] transition-all duration-700 ease-in-out border-chocolate border-2 hover:bg-chocolate text-black hover:text-vanilla :hover:text-opacity-75">
                <div class="grid grid-cols-2">
                    <div class="flex flex-col mb-2 sm:mb-4 lg:mb-12 ml-1 sm:ml-2 lg:ml-6 z-10">
                        <div
                            class="text-xs drop-shadow-[1px_-1px_8px_rgba(255,255,255,1)] group-hover:drop-shadow-none sm:drop-shadow-none sm:text-sm">
                            {{ ucwords(strtolower($item['nama_lengkap'])) }}</div>
                        <div class="hidden sm:block text-2xl uppercase font-bold mb-2 ">{{ $item['nama_panggilan'] }}
                        </div>
                        <div class="hidden sm:block text-sm">{{ $item['nim'] }}</div>
                        <div class="hidden sm:block text-sm">{{ $item['asal'] }}</div>
                        <div class="hidden sm:block text-sm">{{ $item['mdpl'] }} MDPL</div>
                    </div>
                    <div class=""></div>
                </div>
                {{-- <div
                                class="z-0
                    xl:group-hover:scale-125 group-hover:scale-150
                    xl:group-hover:-translate-x-6 lg:group-hover:-translate-x-8 sm:group-hover:-translate-x-6 group-hover:-translate-x-1
                    xl:group-hover:-translate-y-8 lg:group-hover:-translate-y-12 sm:group-hover:-translate-y-8 group-hover:-translate-y-2
                    transition-transform">
                                <img src="{{ asset('/storage/biodata/foto-formal/' . $item['formal_picture']) }}" alt=""
                                    srcset="" class="object-cover w-full h-full max-w-[360px] max-h-[360px]">
                            </div> --}}
            </div>
            {{-- </button> --}}
        @empty
            <div>No data found.</div>
        @endforelse
    </div>
    <div class="container my-20 mx-auto flex gap-2 justify-center">
        @if ($currentPage > 1)
            <a href="{{ url('/biodata?page=' . $currentPage - 1) }}">
                <button class="flex gap-2 text-chocolate hover:border-mocca hover:border-2 md:py-2 md:px-4 rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-left">
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
                    <button
                        class="text-mocca hover:border-mocca hover:border-2 md:py-2 md:px-4 px-1 md:rounded-xl rounded-md">
                        {{ $i }}
                    </button>
                </a>
            @endif
        @endfor
        @if ($currentPage < $totalPages)
            <a href="{{ url('/biodata?page=' . $currentPage + 1) }}">
                <button
                    class="flex gap-2 text-chocolate hover:border-mocca hover:border-2 md:py-2 md:px-4 px-1 rounded-xl">
                    <div class="md:block hidden">Next</div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-right">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M5 12l14 0" />
                        <path d="M13 18l6 -6" />
                        <path d="M13 6l6 6" />
                    </svg>
                </button>
            </a>
        @else
            <div
                class="flex gap-2 md:text-chocolate text-gray-500 md:py-2 md:px-4 px-1 rounded-xl hover:cursor-default">
                <div class="text-gray-500 md:block hidden">Next</div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-right">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M5 12l14 0" />
                    <path d="M13 18l6 -6" />
                    <path d="M13 6l6 6" />
                </svg></button>
            </div>
        @endif
    </div>
</x-app-layout>
