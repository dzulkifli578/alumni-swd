<div class="card-section-primary transition-smooth">
    <h1 class="card-title-primary hover-scale-sm">Statistik</h1>

    <div class="grid grid-cols-1 gap-6">
        <div class="group card-section-secondary transition-smooth hover:bg-warning">
            <div class="flex flex-row justify-between items-center gap-x-6">
                <div class="flex flex-col group-hover:text-warning-content transition-smooth gap-y-6">
                    <p class="text-sm md:text-base lg:text-md font-semibold tracking-wide">Total Alumni</p>
                    <p class="text-2xl md:text-3xl lg:text-4xl font-bold tracking-wide">{{ $totalAlumni }}</p>
                </div>
                <div class="bg-base-300 rounded-lg p-6 group-hover:bg-base-300 hover:rounded-full transition-slow">
                    <i class="fa-solid fa-trophy text-3xl group-hover:text-neutral-200 transition-smooth"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 my-6">
        <div class="group card-section-secondary transition-smooth hover:bg-warning">
            <div class="flex flex-row justify-between items-center gap-x-6">
                <div class="flex flex-col group-hover:text-warning-content transition-smooth gap-y-6">
                    <p class="text-sm md:text-base lg:text-md font-semibold tracking-wide">Alumni Terbanyak
                        ({{ $alumniTerbanyakPerTahun->tahun_lulus }})</p>
                    <p class="text-2xl md:text-3xl lg:text-4xl font-bold tracking-wide">
                        {{ $alumniTerbanyakPerTahun->jumlah }}</p>
                </div>
                <div class="bg-base-300 rounded-lg p-6 group-hover:bg-base-300 hover:rounded-full transition-slow">
                    <i class="fa-solid fa-trophy text-3xl group-hover:text-neutral-200 transition-smooth"></i>
                </div>
            </div>
        </div>

        <div class="group card-section-secondary transition-smooth hover:bg-warning">
            <div class="flex flex-row justify-between items-center gap-x-6">
                <div class="flex flex-col group-hover:text-warning-content transition-smooth gap-y-6">
                    <p class="text-sm md:text-base lg:text-md font-semibold tracking-wide">Alumni Terbanyak
                        ({{ $alumniTerbanyakPerJurusan->nama }})</p>
                    <p class="text-2xl md:text-3xl lg:text-4xl font-bold tracking-wide">
                        {{ $alumniTerbanyakPerJurusan->jumlah }}</p>
                </div>
                <div class="bg-base-300 rounded-lg p-6 group-hover:bg-base-300 hover:rounded-full transition-slow">
                    <i class="fa-solid fa-trophy text-3xl group-hover:text-neutral-200 transition-smooth"></i>
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
                    <i class="fa-solid fa-trophy text-3xl group-hover:text-neutral-200 transition-smooth"></i>
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
                    <i class="fa-solid fa-trophy text-3xl group-hover:text-neutral-200 transition-smooth"></i>
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
                    <i class="fa-solid fa-trophy text-3xl group-hover:text-neutral-200 transition-smooth"></i>
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
                    <i class="fa-solid fa-trophy text-3xl group-hover:text-neutral-200 transition-smooth"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="group card-section-secondary hover:bg-warning transition-smooth">
        <h1 class="card-title-secondary group-hover:text-warning-content transition-smooth">Perbandingan Data Alumni Berdasarkan
            Tahun Lulus</h1>
        <canvas id="yearLineChart" style="width: 100%; height: 400px; margin: 0 auto;"></canvas>
    </div>
</div>

<script>
    const alumniPerTahunLulus = @json($alumniPerTahunLulus);
    const labelAlumniPerTahunLulus = alumniPerTahunLulus.map(item => item.tahun_lulus);
    const dataAlumniPerTahunLulus = alumniPerTahunLulus.map(item => item.jumlah);

    const ctxLineChart = document.getElementById('yearLineChart').getContext('2d');

    const yearLineChart = new Chart(ctxLineChart, {
        type: 'line',
        data: {
            labels: labelAlumniPerTahunLulus,
            datasets: [{
                label: 'Jumlah Alumni',
                data: dataAlumniPerTahunLulus,
                fill: false,
                borderColor: 'rgba(44, 175, 255, 1)',
                backgroundColor: 'rgba(44, 175, 255, 0.2)',
                tension: 0.3
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: false
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Tahun Lulus'
                    }
                },
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Jumlah Alumni'
                    }
                }
            }
        }
    });
</script>
