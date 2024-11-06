<div class="card-section-primary transition-smooth">
    <h1 class="card-title-primary hover-scale-sm">Jurusan</h1>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 justify-center gap-6">
        @foreach ($jurusan as $jurusan)
            <div onclick="window.location.href='{{ route($jurusan->tautan) }}'"
                class="group card-section-secondary flex flex-col items-center transition-smooth hover:bg-warning hover-scale-down gap-y-4">
                <img src="{{ asset($jurusan->logo) }}" alt="Logo Jurusan {{ $jurusan->nama }}"
                    class="object-contain w-32 h-32">
                <p class="font-bold text-center group-hover:text-black transition-colors duration-500">
                    {{ $jurusan->nama }}</p>
            </div>
        @endforeach
    </div>
</div>
