<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profil Akun</title>
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
    <script defer src="{{ asset('js/turbo.js') }}"></script>
</head>

<body class="body-section">
    @include('peran.components.navbar')

    <turbo-frame id="main-content">
        <div class="bg-base-300 rounded-xl shadow-xl p-6 m-6">
            <h1 class="text-2xl md:text-3xl lg:text-4xl text-center font-bold mb-6">Profil Akun</h1>

            @include('peran.components.kondisi')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @include('peran.components.profil.gambar')
                @include('peran.components.profil.form')
            </div>
        </div>
    </turbo-frame>

    @include('peran.components.footer')
</body>

</html>
