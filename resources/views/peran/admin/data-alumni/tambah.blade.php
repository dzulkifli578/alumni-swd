<button class="btn btn-primary mb-3 hover-scale-sm" onclick="tambahDataAlumni.showModal()">Tambah</button>

<dialog id="tambahDataAlumni" class="modal">
    <div class="modal-box">
        <h3 class="text-lg font-bold mb-4">Tambah Data Alumni</h3>

        <form action="{{ route('tambah-data-alumni') }}" method="post" enctype="multipart/form-data" data-turbo="false">
            @csrf
            <div class="flex flex-col gap-4">
                <label class="input input-bordered flex items-center gap-2">
                    <i class="fa-solid fa-tag"></i>
                    <input type="text" name="nama_lengkap" class="grow" placeholder="Nama Lengkap" required />
                </label>
                <select class="select select-bordered w-full" name="jenis_kelamin">
                    <option disabled selected>Jenis Kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
                <label class="input input-bordered flex items-center gap-2">
                    <i class="fa-solid fa-tag"></i>
                    <input type="text" name="tahun_lulus" class="grow" placeholder="Tahun Lulus" required />
                </label>
                <select class="select select-bordered w-full" name="jenis_kelamin">
                    <option disabled selected>Jurusan</option>
                    @foreach ($jurusan as $jurusan)
                        <option value="{{ $jurusan->id }}">{{ $jurusan->nama }}</option>
                    @endforeach
                </select>
                <input type="file" name="foto" class="file-input file-input-bordered file-input-primary w-full"
                    required />
            </div>
            <div class="modal-action flex justify-between">
                <button type="submit" class="btn btn-success">Simpan</button>
                <button class="btn" type="button"
                    onclick="document.getElementById('tambahDataAlumni').close()">Batal</button>
            </div>
        </form>
    </div>
</dialog>
