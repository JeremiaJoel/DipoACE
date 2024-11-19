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
                        <img class="h-8 w-8" src="../img/undipdashboard.png" alt="Your Company">

                    </div>
                    <div class="hidden md:block">
                        <div class="flex items-baseline space-x-4">
                            <span class="rounded-md px-3 py-2 text-2xl font-medium text-white">DipoACE</span>
                        </div>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6">
                        <span class="rounded-md px-1 py-2 text-xl font-medium text-white"></span>

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
            <a class="text-3xl font-bold tracking-tight text-gray-900">IRS Mahasiswa Perwalian</a>
        </div>
    </header>

    <!-- Isi konten table IRS -->
    <div class="container mx-auto mt-10">
        <div class="bg-white shadow-md rounded-lg">
            <div class="flex border-b">
                <h1 class="text-lg font-bold p-4">Data IRS</h1>
            </div>
            <div class="p-6">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                No
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Kode MK
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Mata Kuliah
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Kelas
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                SKS
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Ruang
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Dosen Pengampu
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <!-- Row 1 -->
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">1</td>
                            <td class="px-6 py-4 whitespace-nowrap">PAIK6105</td>
                            <td class="px-6 py-4 whitespace-nowrap">Struktur Diskrit</td>
                            <td class="px-6 py-4 whitespace-nowrap">A</td>
                            <td class="px-6 py-4 whitespace-nowrap">4</td>
                            <td class="px-6 py-4 whitespace-nowrap">E101</td>
                            <td class="px-6 py-4 whitespace-nowrap">Dr. Budi Santoso, M.T.</td>
                        </tr>
                        <!-- Row 2 -->
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">2</td>
                            <td class="px-6 py-4 whitespace-nowrap">PAIK6103</td>
                            <td class="px-6 py-4 whitespace-nowrap">Dasar Sistem</td>
                            <td class="px-6 py-4 whitespace-nowrap">B</td>
                            <td class="px-6 py-4 whitespace-nowrap">3</td>
                            <td class="px-6 py-4 whitespace-nowrap">E102</td>
                            <td class="px-6 py-4 whitespace-nowrap">Prof. Siti Aminah, Ph.D.</td>
                        </tr>
                        <!-- Row 3 -->
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">3</td>
                            <td class="px-6 py-4 whitespace-nowrap">PAIK6306</td>
                            <td class="px-6 py-4 whitespace-nowrap">Statistika</td>
                            <td class="px-6 py-4 whitespace-nowrap">C</td>
                            <td class="px-6 py-4 whitespace-nowrap">2</td>
                            <td class="px-6 py-4 whitespace-nowrap">E103</td>
                            <td class="px-6 py-4 whitespace-nowrap">Dr. Agus Wijaya, M.Sc.</td>
                        </tr>
                        <!-- Row 4 -->
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">4</td>
                            <td class="px-6 py-4 whitespace-nowrap">PAIK6505</td>
                            <td class="px-6 py-4 whitespace-nowrap">Machine Learning</td>
                            <td class="px-6 py-4 whitespace-nowrap">D</td>
                            <td class="px-6 py-4 whitespace-nowrap">3</td>
                            <td class="px-6 py-4 whitespace-nowrap">E102</td>
                            <td class="px-6 py-4 whitespace-nowrap">Dr. Rina Kurniawati, M.T.</td>
                        </tr>
                        <!-- Row 5 -->
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">5</td>
                            <td class="px-6 py-4 whitespace-nowrap">PAIK6503</td>
                            <td class="px-6 py-4 whitespace-nowrap">Sistem Informasi</td>
                            <td class="px-6 py-4 whitespace-nowrap">E</td>
                            <td class="px-6 py-4 whitespace-nowrap">3</td>
                            <td class="px-6 py-4 whitespace-nowrap">E101</td>
                            <td class="px-6 py-4 whitespace-nowrap">Dr. Ahmad Setiawan, M.Kom.</td>
                        </tr>
                        <!-- Row 6 -->
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">6</td>
                            <td class="px-6 py-4 whitespace-nowrap">PAIK6406</td>
                            <td class="px-6 py-4 whitespace-nowrap">Sistem Cerdas</td>
                            <td class="px-6 py-4 whitespace-nowrap">A</td>
                            <td class="px-6 py-4 whitespace-nowrap">3</td>
                            <td class="px-6 py-4 whitespace-nowrap">E103</td>
                            <td class="px-6 py-4 whitespace-nowrap">Prof. Taufik Hidayat, M.Sc.</td>
                        </tr>
                        <!-- Row 7 -->
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">7</td>
                            <td class="px-6 py-4 whitespace-nowrap">PAIK6404</td>
                            <td class="px-6 py-4 whitespace-nowrap">Grafika dan Komputasi Visual</td>
                            <td class="px-6 py-4 whitespace-nowrap">B</td>
                            <td class="px-6 py-4 whitespace-nowrap">3</td>
                            <td class="px-6 py-4 whitespace-nowrap">E107</td>
                            <td class="px-6 py-4 whitespace-nowrap">Dr. Ida Fauziah, M.Kom.</td>
                        </tr>
                        <!-- Row 8 -->
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">8</td>
                            <td class="px-6 py-4 whitespace-nowrap">PAIK6401</td>
                            <td class="px-6 py-4 whitespace-nowrap">Pemrograman Berorientasi Objek</td>
                            <td class="px-6 py-4 whitespace-nowrap">C</td>
                            <td class="px-6 py-4 whitespace-nowrap">3</td>
                            <td class="px-6 py-4 whitespace-nowrap">E108</td>
                            <td class="px-6 py-4 whitespace-nowrap">Dr. Andi Wijaya, M.T.</td>
                        </tr>
                        <!-- Row 9 -->
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">9</td>
                            <td class="px-6 py-4 whitespace-nowrap">PAIK6402</td>
                            <td class="px-6 py-4 whitespace-nowrap">Data Mining</td>
                            <td class="px-6 py-4 whitespace-nowrap">D</td>
                            <td class="px-6 py-4 whitespace-nowrap">3</td>
                            <td class="px-6 py-4 whitespace-nowrap">E109</td>
                            <td class="px-6 py-4 whitespace-nowrap">Dr. Sri Rahmi, M.Si.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
