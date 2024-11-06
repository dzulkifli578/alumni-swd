@php
    $inisiator = [
        [
            'id' => 1,
            'foto' => asset('img/tentang/inisiator-1.jpeg'),
            'nama' => 'Purwadi, S.T.',
            'status' => 'Kepala Sekolah',
            'jurusan' => 'Teknik Instalasi Tenaga Listrik',
            'sebutan' => 'Inisiator 1',
        ],
        [
            'id' => 2,
            'foto' => asset('img/tentang/inisiator-2.jpg'),
            'nama' => 'Yusuf Anggara, S. Kom',
            'status' => 'Kepala Jurusan RPL',
            'jurusan' => 'Teknik Komputer dan Jaringan',
            'sebutan' => 'Inisiator 2',
        ],
        [
            'id' => 3,
            'foto' => asset('img/tentang/kreator.jpg'),
            'nama' => 'Dzulkifli Anwar',
            'status' => 'Anak Magang',
            'jurusan' => 'Rekayasa Perangkat Lunak',
            'sebutan' => 'Kreator Website',
        ],
    ];
@endphp

<div class="card-section-primary transition-smooth">
    <h1 class="card-title-primary hover-scale-sm">Kontributor</h1>
    <div class="border border-primary my-6"></div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach ($inisiator as $inisiator)
            <div class="group card-section-secondary hover:bg-warning transition-smooth"
                onclick="bukaDetailKontributor{{ $inisiator['id'] }}()">
                <div class="flex flex-col gap-y-6 w-full">
                    <img src="{{ asset($inisiator['foto']) }}" alt="Prestasi"
                        class="object-cover w-auto h-auto rounded-xl">
                    <div class="flex flex-col gap-y-2 group-hover:text-warning-content transition-smooth">
                        <p class="text-xl lg:text-2xl font-bold">{{ $inisiator['nama'] }}</p>
                        <p class="text-lg lg:text-xl font-medium tracking-wide">{{ $inisiator['status'] }}</p>
                        <p class="text-base lg:text-lg font-medium tracking-wide">{{ $inisiator['jurusan'] }}</p>
                        <div class="border border-primary group-hover:border-warning-content transition-smooth">
                        </div>
                        <p class="text-base lg:text-lg font-semibold tracking-wide">{{ $inisiator['sebutan'] }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
