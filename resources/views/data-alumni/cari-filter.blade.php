<div class="card-section-primary transition-smooth">
    <h1 class="card-title-primary hover-scale-sm">Cari & Filter</h1>

    <div class="card-section-secondary">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <label class="input input-bordered input-primary flex items-center gap-2">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" class="grow" placeholder="Nama" id="searchInput" />
            </label>
            <select id="filterJurusan" class="select select-primary w-full">
                <option value="" selected>Jurusan</option>
                @foreach ($jurusan as $jurusan)
                    <option value="{{ $jurusan->nama }}">{{ $jurusan->nama }}</option>
                @endforeach
            </select>
            <select id="filterTahunLulus" class="select select-primary w-full">
                <option value="" selected>Tahun Lulus</option>
                @foreach ($tahunLulus as $tahunLulus)
                    <option value="{{ $tahunLulus->tahun_lulus }}">{{ $tahunLulus->tahun_lulus }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>