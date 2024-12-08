<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Document</title>
</head>

<body class="min-h-full">
    <nav class="bg-gray-800" x-data="{ isOpen: false }">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <img class="h-8 w-8" src="{{ asset('img/logoundip.png') }}" alt="Your Company">

                    </div>
                    <div class="hidden md:block">
                        <div class="flex items-baseline space-x-4">
                            <span class="rounded-md px-3 py-2 text-2xl font-medium text-white">DipoACE</span>
                        </div>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6">
                        <span class="rounded-md px-1 py-2 text-xl font-medium text-white">{{ \App\Models\dosen::where('email', Auth::user()->email)->first()->nama }}</span>

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
                                    <img class="h-8 w-8 rounded-full"
                                        src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                        alt="">
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
                                <!-- Active: "bg-gray-100", Not Active: "" -->
                                <a href="logout" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                    tabindex="-1" id="user-menu-item-2">Sign out</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="-mr-2 flex md:hidden">
                    <!-- Mobile menu button -->
                    <button type="button" @click="isOpen = !isOpen"
                        class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                        aria-controls="mobile-menu" aria-expanded="false">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>
                        <!-- Menu open: "hidden", Menu closed: "block" -->
                        <svg :class="{ 'hidden': isOpen, 'block': !isOpen }" class="block h-6 w-6" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <!-- Menu open: "block", Menu closed: "hidden" -->
                        <svg :class="{ 'block': isOpen, 'hidden': !isOpen }" class="hidden h-6 w-6" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div x-show = "isOpen" class="md:hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
            </div>
            <div class="border-t border-gray-700 pb-3 pt-4">
                <div class="mt-3 space-y-1 px-2">
                    <a href="#"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Your
                        Profile</a>
                    <a href="#"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Settings</a>
                    <a href="#"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Sign
                        out</a>
                </div>
            </div>
        </div>
    </nav>

    <header class="bg-white shadow">
        <a href="{{ route('dashboard-pembimbing') }}">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <div class="translate-y-4">
                    <button type="button"
                    class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700
                    sm:translate-x-0 sm:translate-y-0 translate-x-48">
                    Kembali
                </button>
                </div>
                
                <a class="text-3xl font-bold tracking-tight text-gray-900 flex justify-center">Mahasiswa Perwalian</a>
            </div>
        </a>
        
    </header>
    

    <!-- Isi konten table IRS -->
    <div class="container mx-auto mt-10">
        <div class="bg-white shadow-md rounded-lg">
            <div class="flex border-b">
                <button id="btn-belum-disetujui"
                    class="flex-1 py-4 px-6 text-center text-blue-500 border-b-2 border-blue-500"
                    onclick="showTable('belum-disetujui' ,'btn-belum-disetujui')">Belum
                    Disetujui</button>
                <button id="btn-sudah-disetujui" class="flex-1 py-4 px-6 text-center text-gray-500 hover"
                    onclick="showTable('sudah-disetujui' , 'btn-sudah-disetujui')">Sudah
                    Disetujui</button>
                <button id="btn-belum-mengambil" class="flex-1 py-4 px-6 text-center text-gray-500 hover"
                    onclick="showTable('belum-mengambil', 'btn-belum-mengambil')">Belum Mengambil
                </button>
            </div>
            <!-- table belum disetujui-->
            <div class="p-6">
                <table id="belum-disetujui" class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                No</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nama</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                NIM</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status IRS</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aksi</th>

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($notApproved as $mahasiswa)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $mahasiswa->mahasiswa_nama }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $mahasiswa->mahasiswa_id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">

                                        <span
                                            class="inline-flex text-xs leading-9 font-semibold rounded-full bg-red-500 px-1 text-red-100">
                                            Belum Disetujui</span>

                                    </td>
                                    <td>
                                        <a href="{{ route('irs.belumDisetujui', ['nim' => $mahasiswa->mahasiswa_id]) }}">
                                            <div class="py-1 px-4 border-solid border-2 border-gray-500 flex rounded-lg w-fit cursor-pointer hover:bg-blue-600 hover:text-white hover:border-blue-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                </svg>
                                                <span>Lihat</span>
                                            </div>
                                        </a>
                                        

                                    </td>
                                </tr>
                        @endforeach
                    </tbody>
                </table>

                <!--Tabel sudah disetujui-->
                <table id="sudah-disetujui" class="min-w-full divide-y divide-gray-200 hidden">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                No</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nama</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                NIM</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status IRS</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($approved as $mahasiswa)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $mahasiswa->mahasiswa_nama }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $mahasiswa->mahasiswa_id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="inline-flex text-xs leading-9 font-semibold rounded-full bg-green-500 px-1 text-green-100">
                                        Sudah Disetujui
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('irs.sudahDisetujui', ['nim' => $mahasiswa->mahasiswa_id]) }}">
                                        <div
                                            class="py-1 px-4 border-solid border-2 border-gray-500 flex rounded-lg w-fit cursor-pointer hover:bg-blue-600 hover:text-white hover:border-blue-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>
                                            <span>Lihat</span>
                                        </div>

                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    </div>
    </div>

    </div>
    <!--Kode javascript untuk membuat page lebih responsif-->
    <script>
        function showTable(tableId, buttonId) {
            //menyembunyikan tabel lain
            const tables = document.querySelectorAll('table');
            tables.forEach((table) => {
                table.classList.add('hidden');
            })
            //menampilkan tabel
            const selected = document.getElementById(tableId);
            selected.classList.remove('hidden');

            //Reset Style button 
            const buttons = document.querySelectorAll('button');
            buttons.forEach((button) => {
                button.classList.remove('text-blue-500', 'border-blue-500', 'border-b-2');
                button.classList.add('text-gray-500');

            })

            // mengaktifkan style button yang aktif
            const selectedButton = document.getElementById(buttonId);
            selectedButton.classList.add('text-blue-500', 'border-blue-500', 'border-b-2');
            selectedButton.classList.remove('text-gray-500');

        }

        function getQueryParam(param) {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(param);
        }

        document.addEventListener('DOMContentLoaded', () => {
            const status = getQueryParam('status'); // Mengambil nilai parameter 'status' dari URL
            console.log(status);
            switch (status) {
                case 'belum_disetujui':
                    showTable('belum-disetujui', 'btn-belum-disetujui'); // Tampilkan tabel 1 dan aktifkan tombol 1
                    break;
                case 'sudah_disetujui':
                    showTable('sudah-disetujui', 'btn-sudah-disetujui'); // Tampilkan tabel 2 dan aktifkan tombol 2
                    break;
                case 'belum_mengambil':
                    showTable('belum-mengambil', 'btn-belum-mengambil'); // Tampilkan tabel 3 dan aktifkan tombol 3
                    break;
                default:
                    console.error('Status tidak dikenal:', status); // Error jika status tidak dikenali
            }
        });
    </script>

</body>

</html>
