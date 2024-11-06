<div class="bg-base-100 rounded-xl shadow xl p-6">
    <div class="flex flex-col justify-center items-center gap-y-4">
        @if ($akun->foto == null)
            <div class="bg-base-300 w-full h-full rounded-xl shadow-xl p-6">
                <h1 class="text-error text-center">Tidak ada foto.</h1>
            </div>
        @else
            <img src="{{ asset($akun->foto) }}" alt="Foto Profil"
                class="object-contain w-full max-h-full rounded-xl shadow-xl md:max-w-xs md:max-h-xs">
            <p class="text-xl lg:text-2xl font-bold">{{ $akun->nama_pengguna }}</p>
        @endif
    </div>
</div>
