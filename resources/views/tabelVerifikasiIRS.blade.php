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
                        <img class="h-8 w-8" src="../img/logoundip.png" alt="Your Company">

                    </div>
                    <div class="hidden md:block">
                        <div class="flex items-baseline space-x-4">
                            <a href="dashboard-kaprodi" class="rounded-md px-3 py-2 text-2xl font-medium text-white">DipoACE</a>
                        </div>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6">
                        <span
                            class="rounded-md px-1 py-2 text-xl font-medium text-white">{{ \App\Models\dosen::where('email', Auth::user()->email)->first()->nama }}</span>

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
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            {{-- <h1 class="text-3xl font-bold tracking-tight text-gray-900">Dashboard</h1> --}}
            <a href="dashboard-kaprodi" class="text-3xl font-bold tracking-tight text-gray-900">Verifikasi IRS Mahasiswa</a>
        </div>
    </header>

    <!-- Isi konten table IRS -->
    <div class="container mx-auto mt-10">
        <div class="bg-white shadow-md rounded-lg">
            <div class="flex border-b">
                <button id="btn-belum-diverifikasi"
                    class="flex-1 py-4 px-6 text-center text-blue-500 border-b-2 border-blue-500"
                    onclick="showTable('belum-diverifikasi' ,'btn-belum-diverifikasi')">Belum
                    Diverifikasi</button>
                <button id="btn-sudah-diverifikasi" class="flex-1 py-4 px-6 text-center text-gray-500 hover"
                    onclick="showTable('sudah-diverifikasi' , 'btn-sudah-diverifikasi')">Sudah
                    Diverifikasi</button>
                
            </div>
            <!-- table belum diverifikasi-->
            <div class="p-6">
                
                <table id="belum-diverifikasi" class="min-w-full divide-y divide-gray-200">
                    <div class="flex justify-between mb-4">
                        <div>
                            <input id="select-all" type="checkbox" class="mr-2" onclick="toggleSelectAll(this)">
                            <label for="select-all">Pilih Semua</label>
                        </div>
                        <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600"
                            onclick="verifikasiPilihan()">Verifikasi Pilihan</button>
                    </div>
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                No</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nama</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                NIM</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Jumlah SKS</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status IRS</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Detail</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aksi</th>
                            
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">1</td>
                            <td class="px-6 py-4 whitespace-nowrap">Jeremia Joel Richard</td>
                            <td class="px-6 py-4 whitespace-nowrap">24060122140109</td>
                            <td class="pl-12 py-4 whitespace-nowrap text-justify"> 22 </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Belum
                                    Diverifikasi</span>

                            </td>
                            <td class="px-1 py-4 whitespace-nowrap">
                                <div class="py-1 px-4 border-solid border-2 border-gray-500 flex rounded-lg w-fit cursor-pointer hover:bg-blue-600 hover:text-white hover:border-blue-500"
                                    onclick="window.location.href='{{ route('pembimbing-irs-mahasiswa') }}'">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                    <span>Lihat</span>
                                </div>


                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <input type="checkbox" class="row-checkbox">
                            </td>
                            
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">2</td>
                            <td class="px-6 py-4 whitespace-nowrap">Nama mahasiswa 2</td>
                            <td class="px-6 py-4 whitespace-nowrap">24060122019284</td>
                            <td class="pl-12 py-4 whitespace-nowrap">21</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Belum
                                    Diverifikasi</span>

                            </td>
                            <td class="px-1 py-4 whitespace-nowrap">
                                <div class="py-1 px-4 border-solid border-2 border-gray-500 flex rounded-lg w-fit cursor-pointer hover:bg-blue-600 hover:text-white hover:border-blue-500"
                                    onclick="window.location.href='{{ route('pembimbing-irs-mahasiswa') }}'">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                    <span>Lihat</span>
                                </div>


                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <input type="checkbox" class="row-checkbox">
                            </td>
                            
                        </tr>
                    </tbody>
                </table>

                <!--Tabel IRS sudah diverifikasi-->
                
                <table id="sudah-diverifikasi" class="min-w-full divide-y divide-gray-200 hidden">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                No</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nama</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                NIM</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Jumlah SKS</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status IRS</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Detail</th>

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">1</td>
                            <td class="px-6 py-4 whitespace-nowrap">Jeremia Joel Richard</td>
                            <td class="px-6 py-4 whitespace-nowrap">24060122140109</td>
                            <td class="pl-12 py-4 whitespace-nowrap text-justify"> 22 </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-500">Sudah
                                    Diverifikasi</span>


                            </td>
                            <td class="px-1 py-4 whitespace-nowrap">
                                <div class="py-1 px-4 border-solid border-2 border-gray-500 flex rounded-lg w-fit cursor-pointer hover:bg-blue-600 hover:text-white hover:border-blue-500"
                                    onclick="window.location.href='{{ route('pembimbing-irs-mahasiswa') }}'">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                    <span>Lihat</span>
                                </div>


                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">1</td>
                            <td class="px-6 py-4 whitespace-nowrap">Nama mahasiswa 2</td>
                            <td class="px-6 py-4 whitespace-nowrap">2406012213049</td>
                            <td class="pl-12 py-4 whitespace-nowrap">24
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-500">Sudah
                                    Diverifikasi</span>

                            </td>
                            <td class="px-1 py-4 whitespace-nowrap">
                                <div class="py-1 px-4 border-solid border-2 border-gray-500 flex rounded-lg w-fit cursor-pointer hover:bg-blue-600 hover:text-white hover:border-blue-500"
                                    onclick="window.location.href='{{ route('pembimbing-irs-mahasiswa') }}'">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                    <span>Lihat</span>
                                </div>


                            </td>

                            
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>

    </div>
    <!--Kode javascript untuk membuat page lebih responsif-->
    <script>
        // Fungsi untuk toggle semua checkbox
        function toggleSelectAll(checkbox) {
        const checkboxes = document.querySelectorAll('.row-checkbox');
        checkboxes.forEach(cb => cb.checked = checkbox.checked);
        }

    
        // Fungsi untuk verifikasi pilihan
        function verifikasiPilihan() {
        const selectedRows = [];
        const checkboxes = document.querySelectorAll('.row-checkbox:checked');
        checkboxes.forEach(checkbox => {
            const row = checkbox.closest('tr');
            const nama = row.children[2].innerText;
            const nim = row.children[3].innerText;
            selectedRows.push({ nama, nim });
        });

        if (selectedRows.length === 0) {
            alert('Tidak ada data yang dipilih!');
        } else {
            console.log('Data yang diverifikasi:', selectedRows);
            alert('Data berhasil diverifikasi!');
        }
        }

    </script>
    
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
    </script>

</body>

</html>
