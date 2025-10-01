{{-- default_card.blade.php --}}

{{-- PHP JANGAN DIUBAH!! --}}
@php
    $modalId = "modal_" . $item['nim'];
    $modalContentId = "modalContent_" . $item['nim'];
    $closeModalId = "closeModal_" . $item['nim'];
@endphp
{{-- PHP JANGAN DIUBAH!! --}}

{{-- Card (Boleh Diubah) --}}
<div onclick="openModal('{{ $modalId }}', '{{ $modalContentId }}', this)" 
     data-item="{{ json_encode($item) }}"
     style="background-image: url('{{ $item['formal_picture'] }}');"
     class="card overflow-hidden group flex items-end mx-auto aspect-square xl:w-[350px] lg:w-[280px] sm:w-[210px] w-[108px] transition-all duration-700 ease-in-out border-chocolate border-2 hover:bg-chocolate text-black hover:text-vanilla hover:text-opacity-75">
    <div class="grid grid-cols-2">
        <div class="flex flex-col mb-2 sm:mb-4 lg:mb-12 ml-1 sm:ml-2 lg:ml-6 z-10">
            <div class="text-xs drop-shadow-[1px_-1px_8px_rgba(255,255,255,1)] group-hover:drop-shadow-none sm:text-sm">
                {{ ucwords(strtolower($item['nama_lengkap'])) }}
            </div>
            <div class="hidden sm:block text-2xl uppercase font-bold mb-2 ">
                {{ $item['nama_panggilan'] }}
            </div>
            <div class="hidden sm:block text-sm">{{ $item['nim'] }}</div>
            <div class="hidden sm:block text-sm">{{ $item['asal'] }}</div>
            <div class="hidden sm:block text-sm">{{ $item['mdpl'] }} MDPL</div>
        </div>
    </div>
</div>
{{-- End Card --}}

{{-- Modal (Boleh Diubah) --}}
<div id="{{ $modalId }}" class="hidden fixed inset-0 z-50 flex justify-center items-center bg-black bg-opacity-50">
    <div id="{{ $modalContentId }}" 
         class="transform transition-all scale-95 opacity-0 w-[90vw] h-[90vh] shadow-xl
                bg-gradient-to-tl from-[#AD7D4F] to-[#EDB47E] mx-auto relative rounded-2xl overflow-hidden
                flex flex-col md:grid md:grid-cols-[auto_1fr]">

        <!-- Tombol close -->
        <div id="{{ $closeModalId }}"
            class="absolute right-5 top-5 cursor-pointer text-chocolate text-3xl hover:rotate-90 transition"
            onclick="closeModal('{{ $modalId }}', '{{ $modalContentId }}')">
            ✖
        </div>

        <!-- KIRI: Foto + Sosmed -->
        <div class="flex flex-col justify-evenly p-4 md:p-6 h-auto md:h-full items-center">
            <div class="flex items-start justify-center mb-4 md:mb-0">
                <img class="bg-vanilla w-[200px] sm:w-[240px] md:w-[260px] max-h-[40vh] md:max-h-[60vh] object-cover rounded-xl shadow-lg modalImage" alt="">
            </div>
            <div class="w-full flex justify-center items-center gap-4 mt-2">
                <a class="modalIg"><i class="fa fa-instagram text-chocolate hover:scale-110 transition" style="font-size: 3rem;"></i></a>
                <a class="modalEmail"><i class="fa fa-envelope text-chocolate hover:scale-110 transition" style="font-size: 3rem;"></i></a>
                <a class="modalWa"><i class="fa fa-whatsapp text-chocolate hover:scale-110 transition" style="font-size: 3rem;"></i></a>
            </div>
        </div>

        <!-- KANAN: Scrollable card -->
        <div class="flex items-start justify-start p-4 md:p-6 h-full min-h-0">
            <div class="bg-chocolate rounded-2xl shadow-inner p-4 md:p-6 w-full h-full overflow-y-auto max-w-[95%] scroll-card">
                <div class="mb-6 md:mb-8 text-center md:text-left">
                    <h4 class="text-sm text-orange-200 font-light capitalize modalNamaLengkap"></h4>
                    <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold uppercase text-orange-50 modalNamaPanggilan"></h1>
                </div>
                <div class="mb-4 md:mb-6">
                    <p class="text-orange-100 italic text-base sm:text-lg modalQuotes"></p>
                </div>
                <div class="mb-4 md:mb-6">
                    <ul class="text-orange-100 text-xs sm:text-sm mb-1 flex flex-wrap">
                        <li class="w-1/3">Asal</li>
                        <li class="w-1/3">NIM</li>
                        <li class="w-1/3">TTL</li>
                    </ul>
                    <ul class="text-orange-50 font-semibold flex flex-wrap text-sm sm:text-base">
                        <li class="w-1/3 modalAsal"></li>
                        <li class="w-1/3 modalNim"></li>
                        <li class="w-1/3 modalTtl"></li>
                    </ul>
                </div>
                <div class="mb-4 md:mb-6">
                    <h1 class="text-orange-100 font-light">Alamat Kos</h1>
                    <h1 class="text-orange-50 font-semibold modalAlamatKos"></h1>
                </div>
                <div class="flex flex-col sm:flex-row gap-4 mb-4 md:mb-6">
                    <div class="w-full sm:w-1/2">
                        <h1 class="text-orange-100 font-light">Alamat Rumah</h1>
                        <h1 class="text-orange-50 font-semibold max-h-16 overflow-y-auto modalAlamatRumah"></h1>
                    </div>
                    <div class="w-full sm:w-1/3">
                        <h1 class="text-orange-100 font-light">Ketinggian Rumah</h1>
                        <h1 class="text-orange-50 font-semibold modalMdpl"></h1>
                    </div>
                </div>
                <div class="mb-4 md:mb-6">
                    <h1 class="text-orange-100 font-light">Hobi</h1>
                    <h1 class="text-orange-50 font-semibold modalHobi"></h1>
                </div>
                <div>
                    <h1 class="text-orange-100 font-light">Tempat Makan Favorit</h1>
                    <h1 class="text-orange-50 font-semibold modalTempatMakanFav"></h1>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- End Modal --}}
