<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Alumni</title>
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
    <script defer src="{{ asset('js/turbo.js') }}"></script>
</head>

<body class="body-section">
    @include('components.navbar')

    <turbo-frame id="main-content">
        @include('data-alumni.cari-filter')
        @include('data-alumni.tabel')
    </turbo-frame>

    @include('components.footer')
</body>

</html>
