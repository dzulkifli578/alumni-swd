<form action="{{ route(session('peran') === 'admin' ? 'perbarui-profil-admin' : 'perbarui-profil-admin-manager') }}" method="post"
    class="flex flex-col bg-base-100 rounded-xl shadow-xl p-6 gap-y-4" enctype="multipart/form-data" data-turbo="false">
    @csrf
    @method('PUT')
    <label class="input input-bordered input-primary flex items-center gap-2">
        <span class="fa-solid fa-user text-base-content"></span>
        <input type="text" name="nama_pengguna" value="{{ $akun->nama_pengguna }}" class="grow w-full"
            placeholder="Nama Pengguna" />
    </label>
    <label class="input input-bordered input-primary flex items-center gap-2">
        <span class="fa-solid fa-tag"></span>
        <input type="text" name="nis" value="{{ $akun->nis }}" class="grow w-full" placeholder="NIS" />
    </label>
    <label class="input input-bordered input-primary flex items-center gap-2">
        <span class="fa-solid fa-lock text-base-content"></span>
        <input type="password" name="kata_sandi" class="grow w-full" placeholder="Kata Sandi" />
    </label>

    <input type="file" name="foto" class="file-input file-input-bordered file-input-primary w-full" />
    <button type="submit" class="btn btn-primary w-full">Perbarui</button>
    <p class="text-sm font-medium italic">*Kosongkan sandi untuk tidak diubah</p>
</form>
