{{-- PHP JANGAN DIUBAH!! --}}
@php
    $modalId = "modal_" . $item['nim'];
    $modalContentId = "modalContent_" . $item['nim'];
    $closeModalId = "closeModal_" . $item['nim'];
@endphp
{{-- PHP JANGAN DIUBAH!! --}}

{{-- Card (Boleh Diubah) --}}
<div onclick="openModal('{{ $modalId }}', '{{ $modalContentId }}', this)" data-item="{{ json_encode($item) }}"
    style="background-image: url('{{ $item['formal_picture'] }}');" class="relative overflow-hidden group flex flex-col justify-end items-center 
           mx-auto aspect-square xl:w-[350px] lg:w-[280px] sm:w-[210px] w-[108px]
           bg-gradient-to-br from-purple-700 via-purple-500 to-lilac-300 
           bg-center bg-cover bg-no-repeat
           rounded-2xl border-2 border-purple-400
           text-white shadow-md
           transition-all duration-700 ease-in-out
           hover:scale-105 hover:shadow-[0_0_30px_rgba(168,85,247,0.9)]
           hover:border-lilac-400 bg-purple-300/40">

    <!-- Glow Overlay -->
    <div
        class="absolute inset-0 pointer-events-none opacity-0 group-hover:opacity-100 transition duration-700 bg-[url('https://i.pinimg.com/originals/cd/85/81/cd858118ccb63569d8a204aeca7e00f4.gif')]">
        <div class="absolute w-[250%] h-[250%] -left-1/2 -top-1/2 
                    bg-[conic-gradient(at_top_left,_#a855f7_30%,_transparent_70%)] 
                    animate-[spin_3s_linear_infinite]"></div>
    </div>

    <!-- Foto popup (full cover, tanpa border) -->
    <div class="absolute inset-0 z-20 opacity-0 scale-105 
                group-hover:opacity-100 group-hover:scale-150 
                transition-all duration-700 ease-in-out">
        <img src="{{ $item['formal_picture'] }}" alt="Foto {{ $item['nama_lengkap'] }}"
            class="w-full h-full object-cover">
    </div>

    <!-- Petir belakang foto -->
    <div class="absolute inset-0 z-10 opacity-0 group-hover:opacity-100 pointer-events-none">
        <div class="absolute w-full h-full bg-[radial-gradient(circle_at_center,_rgba(168,85,247,0.4),_transparent_70%)] 
                    animate-pulse"></div>
        <div class="absolute top-0 left-1/4 w-1 h-full bg-purple-400 opacity-70 
                    animate-[flash_1s_infinite]"></div>
        <div class="absolute top-0 right-1/4 w-1 h-full bg-purple-300 opacity-60 
                    animate-[flash_1.5s_infinite]"></div>
    </div>

    <!-- Petir depan foto -->
    <div class="absolute inset-0 z-30 opacity-0 group-hover:opacity-100 pointer-events-none">
        <div class="absolute inset-0 bg-[radial-gradient(circle,_rgba(255,255,255,0.25)_0%,_transparent_70%)] 
                    animate-[flicker_2s_infinite]"></div>
    </div>

    <!-- Content -->
    <div class="relative z-10 text-center p-3 sm:p-4 lg:p-6 w-full 
                bg-gradient-to-t from-purple-800/50 via-lilac-600/40 to-transparent">

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
            <div class="tracking-wide">{{ $item['nim'] }}</div>
            <div class="tracking-wide">From {{ $item['asal'] }}</div>
            <div class="tracking-wide">{{ $item['mdpl'] }} MDPL</div>
        </div>
    </div>
</div>
{{-- End Card --}}
{{-- Style Card --}}
<style>
    @keyframes flash {

        0%,
        100% {
            opacity: 0;
        }

        50% {
            opacity: 1;
        }
    }

    @keyframes flicker {

        0%,
        19%,
        21%,
        23%,
        25%,
        54%,
        56%,
        100% {
            opacity: 0;
        }

        20%,
        24%,
        55% {
            opacity: 0.8;
        }
    }
</style>
{{-- End Style Card --}}


{{-- Modal (Boleh Diubah) --}}
<div id="{{ $modalId }}"
    class="hidden fixed inset-0 z-50 flex justify-center items-center bg-black/70 backdrop-blur-md">
    <div id="{{ $modalContentId }}" class="transform transition-all duration-500 ease-out scale-95 opacity-0 
        w-[90vw] h-[90vh] shadow-2xl bg-gradient-to-br from-purple-800 via-purple-700 to-purple-500
        mx-auto relative rounded-3xl overflow-hidden flex flex-col md:grid md:grid-cols-[auto_1fr] 
        animate-[glow_3s_infinite] border border-purple-300/40">

        <!-- Efek Petir -->
        <div class="absolute inset-0 pointer-events-none z-10">
            <div class="w-full h-full bg-[url('https://i.pinimg.com/originals/cd/85/81/cd858118ccb63569d8a204aeca7e00f4.gif')] 
                        bg-cover bg-center opacity-20 mix-blend-screen animate-pulse"></div>
        </div>

        <!-- Tombol close -->
        <div id="{{ $closeModalId }}" {{-- Jangan Diubah! --}} class="absolute right-5 top-5 cursor-pointer text-[#e0b8ff] text-3xl transition-all duration-500 z-30
                   hover:rotate-180 hover:scale-125 hover:drop-shadow-[0_0_15px_#d8b4f8]"
            onclick="closeModal('{{ $modalId }}', '{{ $modalContentId }}')"> {{-- Jangan Diubah! --}}
            ✖
        </div>

        <!-- KIRI: Foto + Sosmed -->
        <div class="flex flex-col justify-evenly p-4 md:p-6 h-auto md:h-full items-center relative z-20">
            <!-- Foto Flip -->
            <div class="group perspective w-[220px] h-[300px] sm:w-[260px] sm:h-[340px]">
                <div
                    class="relative w-full h-full transition-transform duration-700 transform-style-preserve-3d group-hover:rotate-y-180">
                    <!-- Depan -->
                    <img class="absolute inset-0 w-full h-full object-cover rounded-2xl backdrop-blur-md shadow-[0_0_25px_rgba(168,85,247,0.7)] border-2 border-purple-300 backface-hidden modalImage"
                        alt="">
                    <!-- Belakang -->
                    <div
                        class="absolute inset-0 flex items-center justify-center text-white border-2 border-purple-300 hover:bg-black/30 rounded-2xl backface-hidden transform rotate-y-180">
                        <a href="https://maitsam-kadzim.vercel.app/" class="group relative flex items-center justify-center w-40 h-40 rounded-full 
                            bg-gradient-to-br from-purple-600 via-purple-500 to-purple-400 
                            shadow-[0_0_20px_rgba(216,180,248,0.6)] 
                            transition-all duration-500 hover:scale-110 hover:shadow-[0_0_30px_rgba(216,180,248,0.9)]">
                            <img class="animate-spin-slow group-hover:animate-spin-fast drop-shadow-[0_0_10px_#d8b4f8]"
                                src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/9902d258-2f9e-46d8-adb1-7bb68e3154c9/de9fbvk-8020625a-ce90-4824-b245-ff48b9874e02.png/v1/fill/w_1280,h_1281/genshin_impact_electro_by_anotheraizen14_de9fbvk-fullview.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7ImhlaWdodCI6Ijw9MTI4MSIsInBhdGgiOiIvZi85OTAyZDI1OC0yZjllLTQ2ZDgtYWRiMS03YmI2OGUzMTU0YzkvZGU5ZmJ2ay04MDIwNjI1YS1jZTkwLTQ4MjQtYjI0NS1mZjQ4Yjk4NzRlMDIucG5nIiwid2lkdGgiOiI8PTEyODAifV1dLCJhdWQiOlsidXJuOnNlcnZpY2U6aW1hZ2Uub3BlcmF0aW9ucyJdfQ.8BlgNe89VTppiIH5MedZMB_rCVA4ZTrNMWUOqiw2FpQ">
                        </a>
                    </div>
                </div>
            </div>

            <!-- Sosmed -->
            <div class="w-full flex justify-center items-center gap-6 mt-6">
                <a class="modalIg">
                    <i class="fa fa-instagram text-lilac-200 text-[#e0b8ff] hover:text-white hover:scale-125 hover:drop-shadow-[0_0_10px_#d8b4f8] transition duration-300"
                        style="font-size: 3rem;"></i>
                </a>
                <a class="modalEmail">
                    <i class="fa fa-envelope text-lilac-200 text-[#e0b8ff] hover:text-white hover:scale-125 hover:drop-shadow-[0_0_10px_#d8b4f8] transition duration-300"
                        style="font-size: 3rem;"></i>
                </a>
                <a class="modalWa">
                    <i class="fa fa-whatsapp text-lilac-200 text-[#e0b8ff] hover:text-white hover:scale-125 hover:drop-shadow-[0_0_10px_#d8b4f8] transition duration-300"
                        style="font-size: 3rem;"></i>
                </a>
            </div>
        </div>

        <!-- KANAN: Scrollable Card -->
        <div class="flex items-start justify-start p-4 md:p-6 h-full min-h-0 relative z-20">
            <div class="bg-purple-950/80 backdrop-blur-md rounded-2xl shadow-inner p-6 w-full h-full overflow-y-auto 
                       max-w-[95%] border border-purple-900/40 scroll-card">
                <!-- Nama -->
                <div class="mb-6 text-center md:text-left">
                    <h4 class="text-sm text-[#c49bd9] font-light capitalize modalNamaLengkap"></h4>
                    <h1
                        class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold uppercase 
                               text-[#e0b8ff] drop-shadow-[0_0_20px_rgba(208,169,255,0.8)] modalNamaPanggilan glow-text-name">
                    </h1>
                </div>

                <!-- Quotes -->
                <div class="mb-6">
                    <p
                        class="text-[#c49bd9] italic text-lg modalQuotes hover:text-white hover:drop-shadow-[0_0_12px_#d8b4f8] transition-all duration-300">
                    </p>
                </div>

                <!-- Data Singkat -->
                <div class="mb-6">
                    <ul class="text-[#c49bd9] text-sm mb-1 flex flex-wrap font-bold">
                        <li class="w-1/3">Asal</li>
                        <li class="w-1/3">NIM</li>
                        <li class="w-1/3">TTL</li>
                    </ul>
                    <ul class="text-[#9b6fb3] font-semibold flex flex-wrap text-base">
                        <li class="w-1/3 modalAsal hover:text-white hover:drop-shadow-[0_0_12px_#d8b4f8] transition">
                        </li>
                        <li class="w-1/3 modalNim hover:text-white hover:drop-shadow-[0_0_12px_#d8b4f8] transition">
                        </li>
                        <li class="w-1/3 modalTtl hover:text-white hover:drop-shadow-[0_0_12px_#d8b4f8] transition">
                        </li>
                    </ul>
                </div>

                <!-- Alamat -->
                <div class="mb-6">
                    <h1 class="text-[#c49bd9] font-bold">Alamat Kos</h1>
                    <h1
                        class="text-[#9b6fb3] font-semibold modalAlamatKos hover:text-white hover:drop-shadow-[0_0_12px_#d8b4f8] transition">
                    </h1>
                </div>
                <div class="flex flex-col sm:flex-row gap-4 mb-6">
                    <div class="w-full sm:w-1/2">
                        <h1 class="text-[#c49bd9] font-bold">Alamat Rumah</h1>
                        <h1
                            class="text-[#9b6fb3] font-semibold max-h-16 overflow-y-auto modalAlamatRumah hover:text-white hover:drop-shadow-[0_0_12px_#d8b4f8] transition">
                        </h1>
                    </div>
                    <div class="w-full sm:w-1/3">
                        <h1 class="text-[#c49bd9] font-bold">Ketinggian Rumah</h1>
                        <h1
                            class="text-[#9b6fb3] font-semibold modalMdpl hover:text-white hover:drop-shadow-[0_0_12px_#d8b4f8] transition">
                        </h1>
                    </div>
                </div>

                <!-- Hobi -->
                <div class="mb-6">
                    <h1 class="text-[#c49bd9] font-bold">Hobi</h1>
                    <h1
                        class="text-[#9b6fb3] font-semibold modalHobi hover:text-white hover:drop-shadow-[0_0_12px_#d8b4f8] transition">
                    </h1>
                </div>

                <!-- Tempat Makan -->
                <div>
                    <h1 class="text-[#c49bd9] font-bold">Tempat Makan Favorit</h1>
                    <h1
                        class="text-[#9b6fb3] font-semibold modalTempatMakanFav hover:text-white hover:drop-shadow-[0_0_12px_#d8b4f8] transition">
                    </h1>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- End Modal --}}

{{-- Style Modal --}}
<style>
    @keyframes glow {
        0% {
            box-shadow: 0 0 10px rgba(167, 139, 250, 0.4);
        }

        50% {
            box-shadow: 0 0 35px rgba(167, 139, 250, 0.9);
        }

        100% {
            box-shadow: 0 0 10px rgba(167, 139, 250, 0.4);
        }
    }

    @keyframes spin-slow {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    @keyframes spin-fast {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    @keyframes glow-name {

        0%,
        100% {
            text-shadow: 0 0 10px #a855f7, 0 0 20px #a855f7;
            color: #ebd5ff;
        }

        25% {
            text-shadow: 0 0 10px #5806d4, 0 0 20px #5806d4;
            color: #ccf5fc;
        }

        50% {
            text-shadow: 0 0 10px #b83ff4, 0 0 20px #b83ff4;
            color: #ffdcfe;
        }

        75% {
            text-shadow: 0 0 10px #6122c5, 0 0 20px #6122c5;
            color: #e0dcff;
        }
    }

    .glow-text-name {
        animation: glow-name 2s infinite ease-in-out;
    }


    .animate-spin-slow {
        animation: spin-slow 6s linear infinite;
    }

    .group-hover\:animate-spin-fast:hover i {
        animation: spin-fast 1s linear infinite !important;
    }

    .perspective {
        perspective: 1000px;
    }

    .backface-hidden {
        backface-visibility: hidden;
    }

    .transform-style-preserve-3d {
        transform-style: preserve-3d;
    }

    .group:hover .group-hover\:rotate-y-180 {
        transform: rotateY(180deg);
    }

    .rotate-y-180 {
        transform: rotateY(180deg);
    }
</style>
{{-- End Style Modal --}}