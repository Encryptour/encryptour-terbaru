<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encryptour Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="icon" href="assets/Logo Encryptour.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body
    class="bg-gradient-to-br from-mocca via-vanilla to-mocca min-h-screen flex items-center justify-center font-[Montserrat] p-4">

    <div class="backdrop-blur-xl bg-chocolate/20 rounded-2xl shadow-2xl p-8 w-full max-w-md border border-white/20">
        <div class="flex flex-col items-center mb-6">
            <img src="assets/Logo Encryptour.png" alt="logo" class="w-20 h-20 mb-2">
            <h2 class="text-chocolate font-bold text-2xl tracking-wide drop-shadow-lg">Welcome Back</h2>
            <p class="text-chocolate/80 text-sm">Login to continue to Encryptour dashboard</p>
        </div>
        <form action="{{ route('login.authenticate') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="text-chocolate text-sm font-medium">Password</label>
                <input type="password" placeholder="Enter your password" name="password"
                    class="w-full mt-1 p-3 rounded-xl bg-mocca/20 text-chocolatte placeholder-mocca/60 outline-none border border-transparent focus:border-white/50 transition">
            </div>
            @error('password') <p class="text-red-500">{{ $message }}</p> @enderror
            <button type="submit"
                class="w-full py-3 bg-mocca/80 text-chocolate-700 font-semibold rounded-xl shadow-md hover:bg-vanilla transition">Login</button>
        </form>
    </div>

</body>

</html>
