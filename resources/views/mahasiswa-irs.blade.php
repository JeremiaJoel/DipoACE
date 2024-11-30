<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.2/html2pdf.bundle.min.js"></script>
    <title>Menyusun Ruang Kelas</title>
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
                                <!-- Active: "bg-gray-100", Not Active: "" -->
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
            <a href="dashboard-mahasiswa" class="text-3xl font-bold tracking-tight text-gray-900">Dashboard</a>
        </div>
    </header>

    <div class="flex border-b p-8">
        <button class="flex-1 py-4 px-6 text-center text-gray-500 hover"
            onclick="window.location.href='/mahasiswa-buatirs'">Buat IRS</button>
        <button
            class="flex-1 py-4 px-6 text-center text-gray-500 hover border-b-2 border-gray-500"
            onclick="window.location.href='/mahasiswa-irs'">IRS</button>
        <button
            class="flex-1 py-4 px-6 text-center text-gray-500 border-b-2">KHS</button>
    </div>

    <div id="irs" class="bg-white shadow-md rounded-lg p-4 mt-8 mx-8">
        <h2 class="text-xl font-semibold mb-8 text-center">IRS Mahasiswa</h2>
        <table class="w-full text-left border-collapse">
            <thead>
                <tr>
                    <th class="border-b p-2">Kode Mata Kuliah</th>
                    <th class="border-b p-2">MataKuliah</th>
                    <th class="border-b p-2">Ruang</th>
                    <th class="border-b p-2">SKS</th>
                    <th class="border-b p-2">Waktu</th>
                    <th class="border-b p-2">Kelas</th>
                    <th class="border-b p-2">Semester</th>
                    <th class="border-b p-2">Status</th>
                    <th class="border-b p-2"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border-b p-2">PAIK 6105</td>
                    <td class="border-b p-2">BASIS DATA</td>
                    <td class="border-b p-2">E101</td>
                    <td class="border-b p-2">4</td>
                    <td class="border-b p-2">07:00 - 09:30</td>
                    <td class="border-b p-2">A</td>
                    <td class="border-b p-2">3</td>
                    <td class="border-b p-2">Baru</td>
                </tr>
            </tbody>
        </table>
        
        <div id="buttom-download" class="flex justify-between items-center mt-4">
            <div class="text-gray-700">Total SKS : 10</div>
            <button id="download" class="bg-red-500 text-white px-4 py-2 rounded-md">Download</button>
        </div>
    </div>
    
    <script>
        window.onload = function () {
            document.getElementById("download").addEventListener("click", function () {
                const invoice = document.getElementById("irs");  // Mengambil elemen IRS
                console.log(invoice);  // Debugging: Memastikan elemen ditemukan
    
                // Menyembunyikan tombol download untuk PDF menggunakan Tailwind CSS class hidden
                document.getElementById("download").classList.add("hidden");
    
                var opt = {
                    margin: 1,
                    filename: 'irs.pdf',
                    image: { type: 'jpeg', quality: 0.98 },
                    html2canvas: { scale: 2 },
                    jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
                };
    
                // Mengonversi ke PDF dan menyimpan
                html2pdf().from(invoice).set(opt).save().then(() => {
                    // Menampilkan tombol download kembali setelah PDF selesai diunduh
                    document.getElementById("download").classList.remove("hidden");
                });
            });
        };
    </script>
    

</body>

</html>
