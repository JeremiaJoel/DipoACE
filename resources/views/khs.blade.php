<html>

<head lang="en" class="h-full bg-gray-100">
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>

<body class="h-full">

    <div class="min-h-full">
        <nav class="bg-gray-800" x-data="{ isOpen: false }">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img class="h-8 w-8" src="../img/logoundip.png" alt="Logo Undip">

                        </div>
                        <div class="hidden md:block">
                            <div class="flex items-baseline space-x-4">
                                <a class="rounded-md px-3 py-2 text-2xl font-medium text-white"
                                    href="{{ url('/dashboard-mahasiswa') }}">DipoACE</a>
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6">
                            <span
                                class="rounded-md px-1 py-2 text-xl font-medium text-white">{{ \App\Models\mahasiswa::where('email', Auth::user()->email)->first()->nama }}</span>

                            <!-- Profile dropdown -->
                            <div class="relative ml-3">
                                <div>
                                    <button type="button" @click = "isOpen = !isOpen"
                                        class="relative flex max-w-xs items-center rounded-full bg-gray-800 
                                                text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 
                                                focus:ring-offset-gray-800"
                                        id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                        <span class="absolute -inset-1.5"></span>
                                        <span class="sr-only">Open user menu</span>
                                        <img class="h-8 w-8 rounded-full" src="../img/saiful.png" alt="Foto Profile">
                                    </button>
                                </div>


                                <div x-show="isOpen" x-transition:enter="transition ease-out duration-100 transform"
                                    x-transition:enter-start="opacity-0 scale-95"
                                    x-transition:enter-end="opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75 transform"
                                    x-transition:leave-start="opacity-100 scale-100"
                                    x-transition:leave-end="opacity-0 scale-95"
                                    class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                    tabindex="-1">

                                    <a href="logout" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                        tabindex="-1" id="user-menu-item-2">Sign out</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <a href="dashboard-mahasiswa" class="text-3xl font-bold tracking-tight text-gray-900">KHS</a>
            </div>
        </header>

        <main>
            <div class="flex border-b p-8">
                <!-- Your content -->
                <div class="container mx-auto mt-5">
                    <div class="row justify-center">
                        <div class="col-sm-6">
                            <div class="card bg-white rounded-lg shadow-md">
                                <div class="flex border-b">
                                    <button class="flex-1 py-4 px-6 text-center text-gray-500 hover"
                                        onclick="window.location.href='/mahasiswa-buatirs'">Buat IRS</button>
                                    <button class="flex-1 py-4 px-6 text-center text-gray-500 border-b-2 hover"
                                        onclick="window.location.href='/mahasiswa-irs'">IRS</button>
                                    <button
                                        class="flex-1 py-4 px-6 text-center text-gray-500 border-b-2 border-gray-500">KHS</button>
                                </div>

                                <div class="card-body p-4">
                                    <h1 class="card-title mb-3 text-lg font-bold">Kartu Hasil Studi (KHS)</h1>
                                    <div class="space-y-2">
                                        @php
                                            $mahasiswa = \App\Models\Mahasiswa::where(
                                                'email',
                                                Auth::user()->email,
                                            )->first();
                                            $nim = $mahasiswa ? $mahasiswa->nim : null;
                                            $semesterMahasiswa = $mahasiswa ? $mahasiswa->semester : null;
                                            $semesters = range(1, $semesterMahasiswa); // Array of semesters to display
                                        @endphp

                                        @foreach ($semesters as $semester)
                                            <div x-data="{ isOpen: false }"
                                                class="bg-blue-50 p-4 rounded-lg border border-gray-200">
                                                <div class="flex justify-between items-center">
                                                    <span
                                                        class="font-semibold text-blue-600">Semester-{{ $semester }}
                                                        | Tahun Ajaran
                                                        {{ $semester <= 2 ? '2021/2022' : ($semester <= 4 ? '2022/2023' : '2023/2024') }}
                                                        {{ $semester % 2 == 0 ? 'Genap' : 'Ganjil' }}</span>
                                                    <span class="text-gray-500 cursor-pointer"
                                                        @click="isOpen = !isOpen">+</span>
                                                </div>
                                                @php
                                                    $khsData = \App\Models\KHS::where('nim', $nim)
                                                        ->where('semester', $semester)
                                                        ->get();
                                                    $totalSKS = $khsData->sum('sks');
                                                    $totalBobot = $khsData->sum('bobot');
                                                    $totalSKSxBobot = $khsData->sum('sks_x_bobot');
                                                    $ipSemester = $totalSKS > 0 ? $totalSKSxBobot / $totalSKS : 0;

                                                    $allKhsData = \App\Models\KHS::where('nim', $nim)->get();
                                                    $totalSksKumulatif = $allKhsData->sum('sks');
                                                    $totalSksxBobotKumulatif = $allKhsData->sum('sks_x_bobot');
                                                    $ipk =
                                                        $totalSksKumulatif > 0
                                                            ? $totalSksxBobotKumulatif / $totalSksKumulatif
                                                            : 0;
                                                @endphp
                                                <div class="text-gray-500">Jumlah SKS {{ $khsData->sum('sks') }}</div>

                                                <div x-show="isOpen"
                                                    x-transition:enter="transition ease-out duration-100 transform"
                                                    x-transition:enter-start="opacity-0 scale-95"
                                                    x-transition:enter-end="opacity-100 scale-100"
                                                    x-transition:leave="transition ease-in duration-75 transform"
                                                    x-transition:leave-start="opacity-100 scale-100"
                                                    x-transition:leave-end="opacity-0 scale-95"
                                                    class="mt-4 bg-white p-4 rounded-lg shadow-md">
                                                    <table id="khs" class="min-w-full table-auto mb-8">
                                                        <thead>
                                                            <tr>
                                                                <th class="px-4 py-2 text-left">No</th>
                                                                <th class="px-4 py-2 text-left">KodeMK</th>
                                                                <th class="px-4 py-2 text-left">Mata Kuliah</th>
                                                                <th class="px-4 py-2 text-left">Jenis</th>
                                                                <th class="px-4 py-2 text-left">Status</th>
                                                                <th class="px-4 py-2 text-left">SKS</th>
                                                                <th class="px-4 py-2 text-left">Nilai Huruf</th>
                                                                <th class="px-4 py-2 text-left">Bobot</th>
                                                                <th class="px-4 py-2 text-left">SKS x Bobot</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if ($khsData->isEmpty())
                                                                <tr>
                                                                    <td colspan="9"
                                                                        class="text-gray-500 text-center">Tidak ada data
                                                                        KHS untuk semester ini.</td>
                                                                </tr>
                                                            @else
                                                                @foreach ($khsData as $index => $khs)
                                                                    <tr>
                                                                        <td class="border px-4 py-2">{{ $index + 1 }}
                                                                        </td>
                                                                        <td class="border px-4 py-2">
                                                                            {{ $khs->kodemk }}</td>
                                                                        <td class="border px-4 py-2">
                                                                            {{ $khs->matakuliah }}</td>
                                                                        <td class="border px-4 py-2">
                                                                            {{ $khs->jenis }}</td>
                                                                        <td class="border px-4 py-2">
                                                                            {{ $khs->status_mk }}</td>
                                                                        <td class="border px-4 py-2">
                                                                            {{ $khs->sks }}</td>
                                                                        <td class="border px-4 py-2">
                                                                            {{ $khs->nilai_huruf }}</td>
                                                                        <td class="border px-4 py-2">
                                                                            {{ $khs->bobot }}</td>
                                                                        <td class="border px-4 py-2">
                                                                            {{ $khs->sks_x_bobot }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                    <div class="mt-4">
                                                        <p>IP Semester: {{ number_format($ipSemester, 2) }}</p>
                                                        <p class="text-sm md:text-base">{{ $totalSKSxBobot }} /
                                                            {{ $totalSKS }}</p>
                                                        <p>Formula: total(SKS x Bobot) / total SKS</p>
                                                    </div>
                                                    <div class="mt-4">
                                                        <p>Total SKS: {{ $totalSksKumulatif }}</p>
                                                        <p>Total SKS x Bobot: {{ $totalSksxBobotKumulatif }}</p>
                                                        <p>IPK: {{ number_format($ipk, 2) }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    </main>
