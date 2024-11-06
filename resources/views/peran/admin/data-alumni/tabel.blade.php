<div class="card-section-secondary">
    <div class="overflow-x-auto rounded-xl shadow-xl">
        <table class="table table-zebra">
            <thead class="bg-base-300">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Tahun Lulus</th>
                    <th>Jurusan</th>
                </tr>
            </thead>
            <tbody>
                @if ($alumni->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data alumni...</td>
                    </tr>
                @else
                    @foreach ($alumni as $alumni)
                        <tr class="hover:bg-base-200 cursor-pointer"
                            onclick="bukaDetailDataAlumni({{ json_encode($alumni) }})">
                            <th>{{ $alumni->id }}</th>
                            <td>{{ $alumni->nama_lengkap }}</td>
                            <td>{{ $alumni->jenis_kelamin }}</td>
                            <td>{{ $alumni->tahun_lulus }}</td>
                            <td>{{ $alumni->jurusan }}</td>
                        </tr>
                    @endforeach
                    <tr id="noDataRow" style="display: none">
                        <td colspan="6" class="text-center">Tidak ada data alumni yang sesuai dengan pencarian...
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

<script>
    const searchInput = document.getElementById('searchInput');
    const filterJurusan = document.getElementById('filterJurusan');
    const filterTahunLulus = document.getElementById('filterTahunLulus');
    const tableRows = document.querySelectorAll('tbody tr:not(#noDataRow)');
    const noDataRow = document.getElementById('noDataRow');

    function filterData() {
        const searchValue = searchInput.value.toLowerCase();
        const selectedJurusan = filterJurusan.value;
        const selectedTahunLulus = filterTahunLulus.value;

        let filteredRows = Array.from(tableRows);

        filteredRows = filteredRows.filter(row => {
            const name = row.cells[1].textContent.toLowerCase();
            return name.includes(searchValue);
        });

        if (selectedJurusan)
            filteredRows = filteredRows.filter(row => {
                return row.cells[4].textContent === selectedJurusan;
            });

        if (selectedTahunLulus)
            filteredRows = filteredRows.filter(row => {
                return row.cells[3].textContent === selectedTahunLulus;
            });

        tableRows.forEach(row => row.style.display = 'none');
        filteredRows.forEach(row => {
            row.style.display = '';
        });

        noDataRow.style.display = filteredRows.length === 0 ? '' : 'none';
    }

    searchInput.addEventListener('input', filterData);
    filterJurusan.addEventListener('change', filterData);
    filterTahunLulus.addEventListener('change', filterData);
</script>
