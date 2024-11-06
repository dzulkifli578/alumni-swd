<div class="card-section-primary transition-smooth">
    <h1 class="card-title-primary hover-scale-sm">Data Alumni</h1>

    <div class="bg-base-100 rounded-xl shadow-xl p-6">
        <div class="overflow-x-auto rounded-xl shadow-xl">
            <table class="table table-zebra">
                <thead class="bg-base-300">
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis Kelamin</th>
                        <th>Tahun Lulus</th>
                        <th>Jurusan</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($data->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data alumni...</td>
                        </tr>
                    @else
                        @foreach ($data as $data)
                            <tr>
                                <th>{{ $data->id }}</th>
                                <td>{{ $data->nama_lengkap }}</td>
                                <td>{{ $data->jenis_kelamin }}</td>
                                <td>{{ $data->tahun_lulus }}</td>
                                <td>{{ $data->jurusan->nama }}</td>
                            </tr>
                        @endforeach
                        <tr id="noDataRow" style="display: none">
                            <td colspan="5" class="text-center">Tidak ada data alumni yang cocok...</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
            <button class="btn btn-primary w-full mt-6" onclick="window.location.href='{{ route('admin-data-alumni') }}'">Lihat
                Selengkapnya</button>
    </div>
</div>