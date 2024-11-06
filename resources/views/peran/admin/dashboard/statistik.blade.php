<div class="card-section-primary transition-smooth">
    <h1 class="card-title-primary hover-scale-sm">Statistik</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="group md:col-span-2 card-section-secondary transition-smooth hover:bg-success">
            <div class="flex flex-row justify-between items-center gap-x-6">
                <div class="flex flex-col group-hover:text-success-content transition-smooth gap-y-6">
                    <p class="text-sm md:text-base lg:text-md font-semibold tracking-wide">Total Alumni</p>
                    <p class="text-2xl md:text-3xl lg:text-4xl font-bold tracking-wide">{{ $totalAlumni }}</p>
                </div>
                <div class="bg-base-300 rounded-lg p-6 group-hover:bg-base-300 hover:rounded-full transition-slow">
                    <i class="fa-solid fa-user text-3xl group-hover:text-neutral-200 transition-smooth"></i>
                </div>
            </div>
        </div>

        <div class="group card-section-secondary transition-smooth hover:bg-success">
            <div class="flex flex-row justify-between items-center gap-x-6">
                <div class="flex flex-col group-hover:text-success-content transition-smooth gap-y-6">
                    <p class="text-sm md:text-base lg:text-md font-semibold tracking-wide">Tahun Lulusan Awal</p>
                    <p class="text-2xl md:text-3xl lg:text-4xl font-bold tracking-wide">{{ $tahunAwalAkhir->tahunAwal }}
                    </p>
                </div>
                <div class="bg-base-300 rounded-lg p-6 group-hover:bg-base-300 hover:rounded-full transition-slow">
                    <i class="fa-solid fa-calendar text-3xl group-hover:text-neutral-200 transition-smooth"></i>
                </div>
            </div>
        </div>

        <div class="group card-section-secondary transition-smooth hover:bg-error">
            <div class="flex flex-row justify-between items-center gap-x-6">
                <div class="flex flex-col group-hover:text-error-content transition-smooth gap-y-6">
                    <p class="text-sm md:text-base lg:text-md font-semibold tracking-wide">Tahun Lulusan Akhir</p>
                    <p class="text-2xl md:text-3xl lg:text-4xl font-bold tracking-wide">
                        {{ $tahunAwalAkhir->tahunAkhir }}</p>
                </div>
                <div class="bg-base-300 rounded-lg p-6 group-hover:bg-base-300 hover:rounded-full transition-slow">
                    <i class="fa-solid fa-calendar text-3xl group-hover:text-neutral-200 transition-smooth"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 my-6 gap-6">
        <div class="group card-section-secondary transition-smooth hover:bg-success">
            <div class="flex flex-row justify-between items-center gap-x-6">
                <div class="flex flex-col group-hover:text-success-content transition-smooth gap-y-6">
                    <p class="text-sm md:text-base lg:text-md font-semibold tracking-wide">Alumni Terbanyak
                        ({{ $alumni->alumni_terbanyak_tahun }}) </p>
                    <p class="text-2xl md:text-3xl lg:text-4xl font-bold tracking-wide">
                        {{ $alumni->jumlah_alumni_terbanyak_tahun }}</p>
                </div>
                <div class="bg-base-300 rounded-lg p-6 group-hover:bg-base-300 hover:rounded-full transition-slow">
                    <i class="fa-solid fa-chart-simple text-3xl group-hover:text-neutral-200 transition-smooth"></i>
                </div>
            </div>
        </div>


        <div class="group card-section-secondary transition-smooth hover:bg-error">
            <div class="flex flex-row justify-between items-center gap-x-6">
                <div class="flex flex-col group-hover:text-error-content transition-smooth gap-y-6">
                    <p class="text-sm md:text-base lg:text-md font-semibold tracking-wide">Alumni Tersedikit
                        ({{ $alumni->alumni_tersedikit_tahun }}) </p>
                    <p class="text-2xl md:text-3xl lg:text-4xl font-bold tracking-wide">
                        {{ $alumni->jumlah_alumni_tersedikit_tahun }}</p>
                </div>
                <div class="bg-base-300 rounded-lg p-6 group-hover:bg-base-300 hover:rounded-full transition-slow">
                    <i class="fa-solid fa-chart-simple text-3xl group-hover:text-neutral-200 transition-smooth"></i>
                </div>
            </div>
        </div>

        <div class="group card-section-secondary transition-smooth hover:bg-success">
            <div class="flex flex-row justify-between items-center gap-x-6">
                <div class="flex flex-col group-hover:text-success-content transition-smooth gap-y-6">
                    <p class="text-sm md:text-base lg:text-md font-semibold tracking-wide">Alumni Terbanyak
                        ({{ $alumni->alumni_terbanyak_jurusan }}) </p>
                    <p class="text-2xl md:text-3xl lg:text-4xl font-bold tracking-wide">
                        {{ $alumni->jumlah_alumni_terbanyak_jurusan }}</p>
                </div>
                <div class="bg-base-300 rounded-lg p-6 group-hover:bg-base-300 hover:rounded-full transition-slow">
                    <i class="fa-solid fa-chart-simple text-3xl group-hover:text-neutral-200 transition-smooth"></i>
                </div>
            </div>
        </div>

        <div class="group card-section-secondary transition-smooth hover:bg-error">
            <div class="flex flex-row justify-between items-center gap-x-6">
                <div class="flex flex-col group-hover:text-error-content transition-smooth gap-y-6">
                    <p class="text-sm md:text-base lg:text-md font-semibold tracking-wide">Alumni Tersedikit
                        ({{ $alumni->alumni_tersedikit_jurusan }}) </p>
                    <p class="text-2xl md:text-3xl lg:text-4xl font-bold tracking-wide">
                        {{ $alumni->jumlah_alumni_tersedikit_jurusan }}</p>
                </div>
                <div class="bg-base-300 rounded-lg p-6 group-hover:bg-base-300 hover:rounded-full transition-slow">
                    <i class="fa-solid fa-chart-simple text-3xl group-hover:text-neutral-200 transition-smooth"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card-section-primary transition-smooth">
    <h1 class="card-title-primary hover-scale-sm">Jumlah Alumni Per Jurusan</h1>
    <div class="relative">
        <canvas id="alumniChart" height="100"></canvas>
    </div>
</div>

<script>
    var jurusanLabels = {!! json_encode($alumniPerJurusan->pluck('jurusan')) !!};
    var alumniData = {!! json_encode($alumniPerJurusan->pluck('jumlah')) !!};

    var ctx = document.getElementById('alumniChart').getContext('2d');
    
    var alumniChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: jurusanLabels,
            datasets: [{
                label: 'Jumlah Alumni per Jurusan',
                data: alumniData,
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            plugins : {
                legend: false
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>