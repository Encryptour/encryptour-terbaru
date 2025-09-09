<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Secret</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="assets/logo-encryptour.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="min-h-screen bg-gradient-to-b from-vanilla to-white py-12 px-6">
        <div class="max-w-4xl mx-auto">

            {{-- Title Section --}}
            <h1 class="text-4xl font-montserrat font-bold text-chocolate text-center mb-8">
                🎉 Upcoming Birthdays
            </h1>

            {{-- Card Container --}}
            <div
                class="bg-mocca/20 backdrop-blur-md rounded-3xl shadow-2xl p-6 max-h-[500px] overflow-y-auto scrollbar-hide">

                @if ($upcoming->isEmpty())
                    <p class="text-center text-gray-500 font-medium">Tidak ada mahasiswa yang akan ulang tahun dalam 30
                        hari ke depan.</p>
                @else
                    <ul class="space-y-4">
                        @foreach ($upcoming as $item)
                            @if ($item['days_left'] == 0)
                                {{-- Highlight: Hari ini Ultah --}}
                                <li
                                    class="bg-chocolate text-vanilla rounded-2xl p-4 shadow-lg flex justify-between items-center animate-pulse">
                                    <div>
                                        <p class="text-xl font-bold">🎂 {{ $item['nama'] }}</p>
                                        <p class="text-sm opacity-90">{{ $item['nim'] }}</p>
                                        <p class="text-sm mt-1">Hari ini,
                                            {{ \Carbon\Carbon::parse(explode(',', $item['ttl'])[1])->format('d M') }}
                                        </p>
                                    </div>
                                    <span class="bg-vanilla text-chocolate font-bold px-4 py-2 rounded-xl">
                                        🎉 Selamat Ulang Tahun!
                                    </span>
                                </li>
                            @else
                                {{-- Default tampilan --}}
                                <li
                                    class="bg-white/70 rounded-2xl p-4 shadow hover:shadow-xl transition-all flex justify-between items-center">
                                    <div>
                                        <p class="text-lg font-semibold text-chocolate">{{ $item['nama'] }}</p>
                                        <p class="text-sm text-gray-600">{{ $item['nim'] }}</p>
                                        <p class="text-sm mt-1">
                                            {{ \Carbon\Carbon::parse(explode(',', $item['ttl'])[1])->format('d M') }}
                                        </p>
                                    </div>
                                    <span class="bg-green-500 text-white px-4 py-2 rounded-xl font-medium">
                                        {{ $item['days_left'] }} hari lagi
                                    </span>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                @endif

            </div>
        </div>
    </div>
</body>

</html>
