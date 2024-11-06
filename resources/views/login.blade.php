<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
</head>

<body class="body-section">
    <div class="flex flex-col h-screen justify-center items-center">
        <div class="w-[90%] flex flex-col justify-center card-section-primary transition-smooth gap-y-4">
            <div class="flex justify-center w-full">
                <img src="{{ asset('img/swadhipa.avif') }}" alt="Logo Swadhipa" class="object-contain w-16 h-16">
            </div>

            <p class="text-base text-neutral-content text-center tracking-wide cursor-default">Login untuk mengelola data alumni.</p>

            @if (session('error'))
                <div role="alert" class="alert alert-error">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            <form action="{{ route('proses-login') }}" method="post"
                class="flex flex-col card-section-secondary gap-y-4">
                @csrf
                <label class="input input-bordered input-primary flex items-center gap-2">
                    <span class="fa-solid fa-user text-base-content"></span>
                    <input type="text" name="nis" class="grow" placeholder="NIS" required />
                </label>
                <label class="input input-bordered input-primary flex items-center gap-2">
                    <span class="fa-solid fa-lock text-base-content"></span>
                    <input type="password" name="kata_sandi" class="grow" placeholder="Kata Sandi" required />
                </label>
                <button type="submit" class="btn btn-primary w-full">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>
