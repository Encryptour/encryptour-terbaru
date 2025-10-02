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
    class="relative overflow-hidden group flex flex-col justify-end items-center 
           mx-auto aspect-square xl:w-[350px] lg:w-[280px] sm:w-[210px] w-[108px]
           bg-gradient-to-br from-purple-700 via-purple-500 to-lilac-300 
           bg-center bg-cover bg-no-repeat
           rounded-2xl border-2 border-purple-400
           text-white shadow-md
           transition-all duration-700 ease-in-out
           hover:scale-105 hover:shadow-[0_0_30px_rgba(168,85,247,0.9)]
           hover:border-lilac-400">

    <!-- Glow Overlay -->
    <div class="absolute inset-0 pointer-events-none opacity-0 group-hover:opacity-100 transition duration-700">
        <div class="absolute w-[250%] h-[250%] -left-1/2 -top-1/2 
                    bg-[conic-gradient(at_top_left,_#a855f7_30%,_transparent_70%)] 
                    animate-[spin_3s_linear_infinite]"></div>
    </div>

    <!-- Foto popup (full cover, tanpa border) -->
    <div class="absolute inset-0 z-20 opacity-0 scale-105 
                group-hover:opacity-100 group-hover:scale-150 
                transition-all duration-700 ease-in-out">
        <img src="{{ $item['formal_picture'] }}" 
             alt="Foto {{ $item['nama_lengkap'] }}" 
             class="w-full h-full object-cover">
    </div>

    <!-- ⚡ Petir belakang foto -->
    <div class="absolute inset-0 z-10 opacity-0 group-hover:opacity-100 pointer-events-none">
        <div class="absolute w-full h-full bg-[radial-gradient(circle_at_center,_rgba(168,85,247,0.4),_transparent_70%)] 
                    animate-pulse"></div>
        <div class="absolute top-0 left-1/4 w-1 h-full bg-purple-400 opacity-70 
                    animate-[flash_1s_infinite]"></div>
        <div class="absolute top-0 right-1/4 w-1 h-full bg-purple-300 opacity-60 
                    animate-[flash_1.5s_infinite]"></div>
    </div>

    <!-- ⚡ Petir depan foto -->
    <div class="absolute inset-0 z-30 opacity-0 group-hover:opacity-100 pointer-events-none">
        <div class="absolute inset-0 bg-[radial-gradient(circle,_rgba(255,255,255,0.25)_0%,_transparent_70%)] 
                    animate-[flicker_2s_infinite]"></div>
    </div>

    <!-- Content -->
    <div class="relative z-10 text-center p-3 sm:p-4 lg:p-6 w-full 
                bg-gradient-to-t from-black/70 via-black/40 to-transparent">

        <!-- Nama panggilan -->
        <div class="text-xl sm:text-2xl lg:text-3xl font-extrabold uppercase 
                    tracking-wide text-lilac-200 
                    group-hover:text-purple-300 transition-all duration-500">
            {{ $item['nama_panggilan'] }}
        </div>

        <!-- Nama lengkap -->
        <div class="text-xs sm:text-sm font-medium mb-1 
                    text-purple-200 drop-shadow-[0_0_8px_rgba(255,255,255,0.7)] 
                    group-hover:text-lilac-300">
            {{ ucwords(strtolower($item['nama_lengkap'])) }}
        </div>

        <!-- Detail info -->
        <div class="flex flex-col gap-1 mt-2 text-[10px] sm:text-xs text-purple-100">
            <div class="tracking-wide">NIM: {{ $item['nim'] }}</div>
            <div class="tracking-wide">Asal: {{ $item['asal'] }}</div>
            <div class="tracking-wide">{{ $item['mdpl'] }} MDPL</div>
        </div>
    </div>
</div>
{{-- End Card --}}
{{-- Style Card --}}
<style>
@keyframes flash {
  0%, 100% { opacity: 0; }
  50% { opacity: 1; }
}
@keyframes flicker {
  0%, 19%, 21%, 23%, 25%, 54%, 56%, 100% { opacity: 0; }
  20%, 24%, 55% { opacity: 0.8; }
}
</style>
{{-- End Style Card --}}


{{-- Modal (Boleh Diubah) --}}
<div id="{{ $modalId }}" class="hidden fixed inset-0 z-50 flex justify-center items-center bg-black bg-opacity-50">
    <div id="{{ $modalContentId }}" class="transform transition-all scale-95 opacity-0 w-[90vw] h-[90vh] shadow-xl
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
                <img class="bg-vanilla w-[200px] sm:w-[240px] md:w-[260px] max-h-[40vh] md:max-h-[60vh] object-cover rounded-xl shadow-lg modalImage"
                    alt="">
            </div>
            <div class="w-full flex justify-center items-center gap-4 mt-2">
                <a class="modalIg"><i class="fa fa-instagram text-chocolate hover:scale-110 transition"
                        style="font-size: 3rem;"></i></a>
                <a class="modalEmail"><i class="fa fa-envelope text-chocolate hover:scale-110 transition"
                        style="font-size: 3rem;"></i></a>
                <a class="modalWa"><i class="fa fa-whatsapp text-chocolate hover:scale-110 transition"
                        style="font-size: 3rem;"></i></a>
            </div>
        </div>

        <!-- KANAN: Scrollable card -->
        <div class="flex items-start justify-start p-4 md:p-6 h-full min-h-0">
            <div
                class="bg-chocolate rounded-2xl shadow-inner p-4 md:p-6 w-full h-full overflow-y-auto max-w-[95%] scroll-card">
                <div class="mb-6 md:mb-8 text-center md:text-left">
                    <h4 class="text-sm text-orange-200 font-light capitalize modalNamaLengkap"></h4>
                    <h1
                        class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold uppercase text-orange-50 modalNamaPanggilan">
                    </h1>
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

