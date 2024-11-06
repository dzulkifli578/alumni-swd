<div class="card-section-primary transition-smooth">
    <h1 class="card-title-primary hover-scale-sm">Data Alumni</h1>

    <div class="bg-base-100 rounded-xl shadow-xl p-6">
        <div class="overflow-x-auto rounded-xl shadow-xl mb-6">
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
                    @if ($alumni->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data alumni...</td>
                        </tr>
                    @else
                        @foreach ($alumni as $alumni)
                            <tr>
                                <th>{{ $alumni->id }}</th>
                                <td>{{ $alumni->nama_lengkap }}</td>
                                <td>{{ $alumni->jenis_kelamin }}</td>
                                <td>{{ $alumni->tahun_lulus }}</td>
                                <td>{{ $alumni->jurusan }}</td>
                            </tr>
                        @endforeach
                        <tr id="noDataRow" style="display: none">
                            <td colspan="5" class="text-center">Tidak ada data alumni yang cocok...</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const searchInput = document.getElementById('searchInput');
        const filterJurusan = document.getElementById('filterJurusan');
        const filterTahunLulus = document.getElementById('filterTahunLulus');
        const noDataRow = document.getElementById('noDataRow');

        // Pastikan mengambil semua baris data alumni
        let tableRows = Array.from(document.querySelectorAll('tbody tr:not(#noDataRow)'));

        function filterData() {
            const searchValue = searchInput.value.toLowerCase();  // Nilai pencarian
            const selectedJurusan = filterJurusan.value;  // Jurusan terpilih
            const selectedTahunLulus = filterTahunLulus.value;  // Tahun lulus terpilih

            // Filter rows berdasarkan pencarian dan pilihan filter
            let filteredRows = tableRows.filter(row => {
                const name = row.cells[1].textContent.toLowerCase();  // Nama alumni (kolom 2)
                const jurusan = row.cells[4].textContent;  // Jurusan alumni (kolom 5)
                const tahunLulus = row.cells[3].textContent;  // Tahun lulus (kolom 4)

                return (
                    name.includes(searchValue) &&  // Pencarian nama
                    (!selectedJurusan || jurusan === selectedJurusan) &&  // Filter jurusan
                    (!selectedTahunLulus || tahunLulus === selectedTahunLulus)  // Filter tahun lulus
                );
            });

            // Sembunyikan semua baris, kemudian tampilkan yang sesuai dengan filter
            tableRows.forEach(row => row.style.display = 'none');
            filteredRows.forEach(row => row.style.display = '');

            // Tampilkan atau sembunyikan baris 'no data'
            noDataRow.style.display = filteredRows.length === 0 ? '' : 'none';
        }

        // Event listeners untuk menangani pencarian dan filter
        searchInput.addEventListener('input', filterData);
        filterJurusan.addEventListener('change', filterData);
        filterTahunLulus.addEventListener('change', filterData);

        // Panggil filterData ketika halaman pertama kali dimuat
        filterData();
    });
</script>
