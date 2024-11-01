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
                                <span class="rounded-md px-3 py-2 text-2xl font-medium text-white">DipoACE</span>
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6">
                            <span
                                class="rounded-md px-1 py-2 text-xl font-medium text-white">{{ Auth::user()->email }}</span>

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
                                            src="../img/saiful.png"
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
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">Dashboard</h1>
            </div>
        </header>
        
        <main>
            <div class="max-w-full mx-24 mt-10 p-4">

                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <div class="bg-blue-700 p-4 flex items-center">
                        <img
                            src="../img/saiful.png" alt="Profile picture of a student"
                            class="w-24 h-24 rounded-full border-4 border-white w-100 h-100"/>
                        <div class="ml-4 text-white">
                            <h1 class="text-2xl font-bold">pinsen</h1>
                            <p class="mt-1">NIM: 24060122120001 | Informatika S1</p>
                        </div>
                    </div>
                </div>
                
                <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white shadow rounded-lg p-4">
                        <div class="mt-4 text-center">
                            <p class="text-gray-600 font-semibold">Dosen Wali : Sandy Kurniawan, S.Kom., M.Kom.</p>
                            <p class="text-gray-600 font-semibold">(NIP: 199603032024061003)</p>
                        </div>
                        <div class="mt-4 grid grid-cols-3 gap-4 text-center">
                            <div>
                                <p class="text-gray-600">Semester Akademik</p>
                                <p class="text-2xl">2024/2025 Ganjil</p>
                            </div>
                            <div>
                                <p class="text-gray-600">Semester Studi</p>
                                <p class="text-2xl">5</p>
                            </div>
                            <div>
                                <p class="text-gray-600">Status Akademik</p>
                                <p class="mt-2 ml-14 bg-green-500 text-white font-bold rounded py-2 px-4 w-20 text-center">Aktif</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white shadow rounded-lg p-4">
                        <h2 class="text-xl font-semibold flex items-center">Prestasi Akademik</h2>
                        <div class="mt-4 grid grid-cols-2 gap-4 text-center">
                            <div>
                                <p class="text-gray-600 mt-8">IPK</p>
                                <p class="text-2xl">3.73</p>
                            </div>
                            <div>
                                <p class="text-gray-600 mt-8">SKSk</p>
                                <p class="text-2xl">84</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="bg-white shadow rounded-lg p-4 h-20">
                        <h2 class="text-xl font-semibold">Buat IRS</h2>
                    </div>
                    <div class="bg-white shadow rounded-lg p-4">
                        <h2 class="text-xl font-semibold">IRS</h2>
                    </div>
                    <div class="bg-white shadow rounded-lg p-4">
                        <h2 class="text-xl font-semibold">KHS</h2>
                    </div>
                    <div class="bg-white shadow rounded-lg p-4">
                        <h2 class="text-xl font-semibold">Status</h2>
                    </div>
                </div>
            </div>
        </main>
