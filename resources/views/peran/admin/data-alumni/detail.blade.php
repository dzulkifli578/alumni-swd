<dialog id="detailDataAlumni" class="modal">
    <div class="modal-box">
        <h3 class="text-lg font-bold mb-4">Detail Data Alumni</h3>

        <form method="post" id="editDataAlumni" data-turbo="false">
            @csrf
            @method('PUT')
            <div class="flex flex-col gap-4">
                <input type="hidden" name="id" id="dataAlumniId">
                <label class="input input-bordered flex items-center gap-2">
                    <i class="fa-solid fa-tag"></i>
                    <input type="text" name="nama_lengkap" id="nama_lengkap" class="grow"
                        placeholder="Nama Lengkap" required />
                </label>
                <select class="select select-bordered w-full" name="jenis_kelamin" id="jenis_kelamin" required>
                    <option disabled selected>Jenis Kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
                <label class="input input-bordered flex items-center gap-2">
                    <i class="fa-solid fa-tag"></i>
                    <input type="text" name="tahun_lulus" id="tahun_lulus" class="grow" placeholder="Tahun Lulus"
                        required />
                </label>
                <select class="select select-bordered w-full" name="jurusan_id" id="jurusan_id" required>
                    <option disabled selected>Jurusan</option>
                    @foreach ($jurusan as $jurusanItem)
                        <option value="{{ $jurusanItem->id }}">{{ $jurusanItem->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="modal-action flex justify-between">
                <div class="flex flex-row gap-2">
                    <button type="submit" class="btn btn-warning">Edit</button>
        </form>
        <form method="post" id="hapusDataPrestasi" data-turbo="false">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-error" onclick="hapusData()">Hapus</button>
        </form>
    </div>
    <button class="btn" type="button" onclick="document.getElementById('detailDataAlumni').close()">Batal</button>
    </div>
    </div>
</dialog>

<script>
    function bukaDetailDataAlumni(alumni) {
        document.getElementById('detailDataAlumni').showModal();
        document.getElementById('editDataAlumni').action = `{{ url('admin/data-alumni/edit') }}/${alumni.id}`;
        document.getElementById('dataAlumniId').value = alumni.id;
        document.getElementById('nama_lengkap').value = alumni.nama_lengkap;
        document.getElementById('jenis_kelamin').value = alumni.jenis_kelamin;
        document.getElementById('tahun_lulus').value = alumni.tahun_lulus;
        document.getElementById('jurusan_id').value = alumni.jurusan_id;
    }

    function hapusData() {
        const id = document.getElementById('dataAlumniId').value;

        if (confirm("Yakin ingin menghapus data ini?"))
            document.getElementById('hapusDataPrestasi').action = `{{ url('admin/data-alumni/hapus') }}/${id}`;
    }
</script>
