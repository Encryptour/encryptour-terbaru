{{-- PHP JANGAN DIUBAH!! --}}
@php
    $modalId = 'modal_' . $item['nim'];
    $modalContentId = 'modalContent_' . $item['nim'];
    $closeModalId = 'closeModal_' . $item['nim'];
@endphp
{{-- PHP JANGAN DIUBAH!! --}}

<style>
    @keyframes subtleGlow {

        0%,
        100% {
            box-shadow: 0 0 15px rgba(255, 140, 0, 0.15),
                0 0 25px rgba(0, 128, 255, 0.1);
        }

        50% {
            box-shadow: 0 0 25px rgba(255, 180, 60, 0.35),
                0 0 35px rgba(0, 160, 255, 0.25);
        }
    }

    .sunset-card {
        position: relative;
        overflow: hidden;
        border-radius: 1.5rem;
        border: 2px solid rgba(255, 180, 120, 0.5);
        backdrop-filter: blur(6px);
        animation: subtleGlow 6s ease-in-out infinite;
        transition: all 0.5s ease-in-out;
    }

    /* ⛰️ Layer gambar di belakang */
    .sunset-card::before {
        content: "";
        position: absolute;
        inset: 0;
        background-image: var(--bg-image);
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
        transform: scale(1);
        transition: transform 0.6s ease;
        z-index: 0;
    }

    /* ✨ Efek zoom halus saat hover */
    .sunset-card:hover::before {
        transform: scale(1.08);
    }

    /* Modal BG sunset gradient */
    .sunset-modal {
        color: #fff;
        border-radius: 1.25rem;
        backdrop-filter: blur(10px);
        box-shadow: 0 0 40px rgba(255, 150, 50, 0.3);
    }

    /* Glow Text Accent */
    .text-glow {
        color: #000000;
        text-shadow: 0 0 8px rgb(255, 123, 0),
            0 0 16px rgba(14, 57, 247, 0.712);
    }
    .text-glow-title {
        color: #ffffff;
        text-shadow: 0 0 8px rgb(255, 123, 0),
            0 0 16px rgba(14, 57, 247, 0.712);
    }

    .modalImage {
        position: relative;
        z-index: 5;
        opacity: 1 !important;
        filter: none !important;
    }
</style>

{{-- Card (Boleh Diubah) --}}
<div onclick="openModal('{{ $modalId }}', '{{ $modalContentId }}', this)" data-item="{{ json_encode($item) }}"
    style="--bg-image: url('{{ $item['formal_picture'] }}');"
    class="card sunset-card group flex items-end mx-auto aspect-square 
            xl:w-[350px] lg:w-[280px] sm:w-[210px] w-[108px] text-white">

    <div class="grid grid-cols-2 bg-gradient-to-t from-orange-200 to-transparent w-full h-full">
        <div class="flex flex-col mb-2 sm:mb-4 lg:mb-12 ml-1 sm:ml-2 lg:ml-6 z-10">
            <div class="text-xs text-glow drop-shadow-lg sm:text-sm">
                {{ ucwords(strtolower($item['nama_lengkap'])) }}
            </div>
            <div class="hidden sm:block text-2xl uppercase font-bold mb-2 text-glow">
                {{ $item['nama_panggilan'] }}
            </div>
            <div class="hidden sm:block text-sm text-glow">{{ $item['nim'] }}</div>
            <div class="hidden sm:block text-sm text-glow">{{ $item['asal'] }}</div>
            <div class="hidden sm:block text-sm text-glow">{{ $item['mdpl'] }} MDPL</div>
        </div>
    </div>
</div>

{{-- Modal --}}
<div id="{{ $modalId }}"
    class="hidden fixed inset-0 z-50 flex justify-center items-center bg-black/70 backdrop-blur-md">
    <div id="{{ $modalContentId }}"
        class="sunset-modal transform transition-all scale-95 opacity-0 w-[90vw] h-[90vh] shadow-xl mx-auto relative overflow-hidden flex flex-col md:grid md:grid-cols-[auto_1fr]">

        <div class="absolute inset-0 pointer-events-none z-0">
            <div
                class="w-full h-full bg-[url('https://i.pinimg.com/originals/ba/0d/5d/ba0d5da4688341cc0c0da14a9b5526c5.gif')]
                bg-cover bg-center opacity-45 mix-blend-screen">
            </div>
        </div>

        <!-- Tombol close -->
        <div id="{{ $closeModalId }}"
            class="absolute right-5 top-5 cursor-pointer text-white text-3xl hover:rotate-90 transition"
            onclick="closeModal('{{ $modalId }}', '{{ $modalContentId }}')">
            ✖
        </div>

        <!-- KIRI -->
        <div class="flex flex-col justify-evenly p-4 md:p-6 h-auto md:h-full items-center">
            <div class="flex items-start justify-center mb-4 md:mb-0">
                <img class="bg-gradient-to-tr from-orange-200 to-orange-400 w-[200px] sm:w-[240px] md:w-[260px] max-h-[40vh] md:max-h-[60vh] object-cover rounded-xl shadow-lg modalImage"
                    alt="">
            </div>
            <div class="w-full flex justify-center items-center gap-4 mt-2">
                <a class="modalIg"><i
                        class="fa fa-instagram text-orange-700 hover:text-orange-300 hover:scale-110 transition"
                        style="font-size: 3rem;"></i></a>
                <a class="modalEmail"><i
                        class="fa fa-envelope text-orange-700 hover:text-orange-300 hover:scale-110 transition"
                        style="font-size: 3rem;"></i></a>
                <a class="modalWa"><i
                        class="fa fa-whatsapp text-orange-700 hover:text-orange-300 hover:scale-110 transition"
                        style="font-size: 3rem;"></i></a>
            </div>
        </div>

        <!-- KANAN -->
        <div class="flex items-start justify-start p-4 md:p-6 h-full min-h-0">
            <div
                class="bg-black/60 backdrop-brightness-80 z-[1] pointer-events-none rounded-2xl shadow-inner p-4 md:p-6 w-full h-full overflow-y-auto max-w-[95%] scroll-card text-orange-50">
                <div class="mb-6 md:mb-8 text-center md:text-left">
                    <h4 class="text-sm text-orange-400 font-light capitalize modalNamaLengkap"></h4>
                    <h1
                        class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold uppercase text-glow-title modalNamaPanggilan">
                    </h1>
                </div>
                <div class="mb-4 md:mb-6">
                    <p class="text-orange-100 italic text-base sm:text-lg modalQuotes"></p>
                </div>
                <div class="mb-4 md:mb-6">
                    <ul class="text-orange-400 text-xs sm:text-sm mb-1 flex flex-wrap">
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
                    <h1 class="text-orange-400 font-light">Alamat Kos</h1>
                    <h1 class="text-orange-50 font-semibold modalAlamatKos"></h1>
                </div>
                <div class="flex flex-col sm:flex-row gap-4 mb-4 md:mb-6">
                    <div class="w-full sm:w-1/2">
                        <h1 class="text-orange-400 font-light">Alamat Rumah</h1>
                        <h1 class="text-orange-50 font-semibold max-h-16 overflow-y-auto modalAlamatRumah"></h1>
                    </div>
                    <div class="w-full sm:w-1/3">
                        <h1 class="text-orange-400 font-light">Ketinggian Rumah</h1>
                        <h1 class="text-orange-50 font-semibold modalMdpl"></h1>
                    </div>
                </div>
                <div class="mb-4 md:mb-6">
                    <h1 class="text-orange-400 font-light">Hobi</h1>
                    <h1 class="text-orange-50 font-semibold modalHobi"></h1>
                </div>
                <div>
                    <h1 class="text-orange-400 font-light">Tempat Makan Favorit</h1>
                    <h1 class="text-orange-50 font-semibold modalTempatMakanFav"></h1>
                </div>
            </div>
        </div>
    </div>
</div>
