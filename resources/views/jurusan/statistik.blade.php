<div class="card-section-primary transition-smooth">
    <h1 class="card-title-primary hover-scale-sm">Statistik</h1>

    <div class="grid grid-cols-1 gap-6">
        <div class="group card-section-secondary transition-smooth hover:bg-warning">
            <div class="flex flex-row justify-between items-center gap-x-6">
                <div class="flex flex-col group-hover:text-warning-content transition-smooth gap-y-6">
                    <p class="text-sm md:text-base lg:text-md font-semibold tracking-wide">Total Alumni</p>
                    <p class="text-2xl md:text-3xl lg:text-4xl font-bold tracking-wide">{{ $totalAlumni }}</p>
                </div>
                <div class="bg-base-300 rounded-xl p-6 group-hover:bg-base-300 hover:rounded-full transition-slow">
                    <i class="fa-solid fa-trophy text-3xl group-hover:text-neutral-200 transition-smooth"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="group card-section-secondary hover:bg-warning transition-smooth my-6">
        <h1 class="card-title-secondary group-hover:text-warning-content hover-scale-sm">Perbandingan Data Alumni Berdasarkan
            Tahun Lulus</h1>
        <div>
            <canvas id="yearLineChart" style="width: 100%; height: 400px; margin: 0 auto;"></canvas>
        </div>
    </div>

    <div class="group card-section-secondary hover:bg-warning transition-smooth">
        <h1 class="card-title-secondary group-hover:text-warning-content hover-scale-sm">Perbandingan Data Alumni Berdasarkan
            Jenis Kelamin</h1>
        <div>
            <canvas id="genderChart" style="width: 300px; height: 300px; margin: 0 auto;"></canvas>
        </div>
    </div>

</div>

<script>
    const alumniPerTahun = @json($alumniPerTahun);
    const labelAlumniPerTahun = alumniPerTahun.map(item => item.tahun_lulus);
    const dataAlumniPerTahun = alumniPerTahun.map(item => item.jumlah);

    const ctxLineChart = document.getElementById('yearLineChart').getContext('2d');

    const yearLineChart = new Chart(ctxLineChart, {
        type: 'line',
        data: {
            labels: labelAlumniPerTahun,
            datasets: [{
                label: 'Jumlah Alumni',
                data: dataAlumniPerTahun,
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

<script>
    const alumniPerJenisKelamin = @json($alumniPerJenisKelamin);
    const labelAlumniPerJenisKelamin = alumniPerJenisKelamin.map(item => item.jenis_kelamin);
    const dataAlumniPerJenisKelamin = alumniPerJenisKelamin.map(item => item.jumlah);

    const ctxPieChart = document.getElementById('genderChart').getContext('2d');

    const genderChart = new Chart(ctxPieChart, {
        type: 'pie',
        data: {
            labels: ["Laki-laki", "Perempuan"],
            datasets: [{
                data: dataAlumniPerJenisKelamin,
                backgroundColor: ['rgba(44, 175, 255, 1)', 'rgba(255, 182, 193, 1)'],
                borderColor: ['#ffffff', '#ffffff'],
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: false,
            }
        }
    });
</script>
