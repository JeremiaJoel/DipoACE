<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>

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
                            <a class="rounded-md px-3 py-2 text-2xl font-medium text-white"
                                href="{{ url('/dashboard-mahasiswa') }}">DipoACE</a>
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
                                    <img class="h-8 w-8 rounded-full" src="../img/saiful.png" alt="">
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
        <button class="flex-1 py-4 px-6 text-center text-gray-500 hover border-gray-500 border-b-2"
            onclick="window.location.href='/mahasiswa-buatirs'">Buat IRS</button>
        <button class="flex-1 py-4 px-6 text-center text-gray-500 hover border-b-2"
            onclick="window.location.href='/mahasiswa-irs'">IRS</button>
        <button class="flex-1 py-4 px-6 text-center text-gray-500 border-b-2">KHS</button>
    </div>

    <div class="bg-white shadow-md rounded-lg p-8 mx-8">
        <h2 class="text 2-xl font-semibold text-center mb-5">Mengambil IRS</h2>
        <div class="mb-4 max-w-2xl">
            <input type="text" placeholder="Search Bar" id="search-bar"
                class="w-72 p-2 border border-gray-300 rounded-md bg-gray-200">
        </div>
        <div class="mb-4">Total SKS yang Dapat Diambil: <strong>{{ $sksLoad }} SKS</strong></div>
        <table id="jadwal-table" class="w-full text-left border-collapse">
            <thead>
                <tr>
                    <th class="border-b p-2">Kode Mata Kuliah</th>
                    <th class="border-b p-2">MataKuliah</th>
                    <th class="border-b p-2">Ruang</th>
                    <th class="border-b p-2">Hari</th>
                    <th class="border-b p-2">Waktu</th>
                    <th class="border-b p-2">Kelas</th>
                    <th class="border-b p-2">SKS</th>
                    <th class="border-b p-2">Semester</th>
                    <th class="border-b p-2">Status </th>
                    <th class="border-b p-2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jadwals as $jadwal)
                    <tr>
                        <td class="border-b p-2">{{ $jadwal->kodemk }}</td>
                        <td class="border-b p-2">{{ $jadwal->matakuliah->nama ?? 'Tidak ada Mata Kuliah' }}</td>
                        <td class="border-b p-2">{{ $jadwal->ruang }}</td>
                        <td class="border-b p-2">{{ $jadwal->hari }}</td>
                        <td class="border-b p-2">{{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}</td>
                        <td class="border-b p-2">{{ $jadwal->kelas }}</td>
                        <td class="border-b p-2">{{ $jadwal->sks }}</td>
                        <td class="border-b p-2">{{ $jadwal->semester_aktif }}</td>
                        <td class="border-b p-2">{{ $jadwal->matakuliah->jenis_matkul ?? 'Tidak ada Status' }}</td>
                        <td class="border-b p-2 text-right">
                            <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 ambil-btn"
                                data-id="{{ $jadwal->id }}" data-row-id="course-row-{{ $jadwal->id }}"
                                data-kode="{{ $jadwal->kodemk }}" data-hari="{{ $jadwal->hari }}"
                                data-matakuliah="{{ $jadwal->matakuliah->nama ?? 'Tidak ada Mata Kuliah' }}"
                                data-ruang="{{ $jadwal->ruang }}" data-sks="{{ $jadwal->sks }}"
                                data-waktu="{{ $jadwal->jam_mulai }}-{{ $jadwal->jam_selesai }}"
                                data-kelas="{{ $jadwal->kelas }}" data-semester="{{ $jadwal->semester_aktif }}"
                                data-status="{{ $jadwal->matakuliah->jenis_matkul }}">
                                Ambil
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tr>
            </tbody>
        </table>
        <div class="mt-4">
            {{ $jadwals->links() }}
        </div>
    </div>

    <div class="bg-white shadow-md rounded-lg p-8 mt-8 mx-8">
        <h2 class="text 2-xl font-semibold text-center mb-5">IRS Dipilih</h2>
        <table class="w-full text-left border-collapse">
            <thead>
                <tr>
                    <th class="border-b p-2">Kode Mata Kuliah</th>
                    <th class="border-b p-2">MataKuliah</th>
                    <th class="border-b p-2">Ruang</th>
                    <th class="border-b p-2">Hari</th>
                    <th class="border-b p-2">Waktu</th>
                    <th class="border-b p-2">Kelas</th>
                    <th class="border-b p-2">SKS</th>
                    <th class="border-b p-2">Semester</th>
                    <th class="border-b p-2">Status</th>
                    <th class="border-b p-2"></th>
                </tr>
            </thead>
            <tbody id="irs-dipilih">

            </tbody>
        </table>

        <div class="flex justify-between items-center mt-4">
            <div id="total-sks" class="text-gray-700 ml-2 text-xl font-semibold">Total SKS: 0</div>
            <button class="bg-green-500 text-white px-4 py-2 rounded-md mr-14 submit-btn ">Submit</button>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            let currentSKS = 0;
            let jadwalDipilih = [];
            let selectedCourses = new Set();

            // Fungsi untuk memuat IRS dari localStorage dan mengupdate tampilan SKS
            function loadIRSfromStorage() {
                const storedIRS = localStorage.getItem('irsData');
                if (storedIRS) {
                    $('#irs-dipilih').html(storedIRS);
                    updateCurrentSKS();
                    $('#irs-dipilih tr').each(function() {
                        const kode = $(this).find('td:first').text();
                        selectedCourses.add(kode); // Menambahkan kode ke set
                        jadwalDipilih.push($(this).find('td:eq(4)').text()); // Menambahkan waktu ke array
                    });
                }
            }

            // Fungsi untuk menyimpan IRS ke localStorage
            function saveIRStoStorage() {
                const irsData = $('#irs-dipilih').html();
                localStorage.setItem('irsData', irsData);
            }

            // Fungsi untuk mengupdate total SKS yang ditampilkan
            function updateCurrentSKS() {
                let totalSKS = 0;
                $('#irs-dipilih tr').each(function() {
                    const sksText = $(this).find('td:eq(6)')
                .text(); // Ambil teks SKS dari kolom yang benar (kolom ke-6)
                    const sks = parseInt(sksText); // Ubah teks menjadi integer

                    // Jika parseInt menghasilkan NaN, anggap SKSnya 0
                    if (!isNaN(sks)) {
                        totalSKS += sks;
                    }
                });

                currentSKS = totalSKS;
                $('#total-sks').text(`Total SKS: ${currentSKS}`);
            }


            // Memuat IRS saat halaman dimuat
            loadIRSfromStorage();


            // Event handler untuk pencarian mata kuliah
            $('#search-bar').on('keyup', function() {
                const query = $(this).val();
                if (query.length > 0) {
                    $.ajax({
                        url: "{{ route('jadwals.search') }}",
                        type: "GET",
                        data: {
                            query: query
                        },
                        success: function(data) {
                            $('#jadwal-table tbody').empty();
                            $.each(data, function(key, jadwal) {
                                $('#jadwal-table tbody').append(`
                                <tr>
                                    <td>${jadwal.kodemk}</td>
                                    <td>${jadwal.matakuliah.nama}</td>
                                    <td>${jadwal.ruang}</td>
                                    <td>${jadwal.hari}</td>
                                    <td>${jadwal.waktu}</td>
                                    <td>${jadwal.kelas}</td>
                                    <td>${jadwal.sks}</td>
                                    <td>${jadwal.semester_aktif}</td>
                                    <td>${jadwal.matakuliah.jenis_matkul}</td>
                                    <td class="text-right">
                                        <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 ambil-btn"
                                            data-id="${jadwal.id}"
                                            data-kode="${jadwal.kodemk}"
                                            data-matakuliah="${jadwal.matakuliah.nama}"
                                            data-ruang="${jadwal.ruang}"
                                            data-hari="${jadwal.hari}"
                                            data-waktu="${jadwal.mulai}-${jadwal.jam_selesai}"
                                            data-kelas="${jadwal.kelas}"
                                            data-sks="${jadwal.sks}"
                                            data-status="${jadwal.matakuliah.jenis_matkul}"
                                            data-semester="${jadwal.semester_aktif}">
                                            Ambil
                                        </button>
                                    </td>
                                </tr>
                            `);
                            });
                        }
                    });
                } else {
                    location.reload(); // Reload halaman jika pencarian dikosongkan
                }
            });



            // Menggunakan event delegation untuk menangani klik pada tombol Ambil yang dinamis
            $(document).on('click', '.ambil-btn', function() {
                const btn = $(this);
                const courseSKS = parseInt(btn.data('sks'));
                const kode = btn.data('kode');
                const waktu = btn.data('waktu');
                const hari = btn.data('hari');

                if (selectedCourses.has(kode)) {
                    Swal.fire('Error', 'You have already selected this course.', 'error');
                    return;
                }

                if (isWaktuBentrok(waktu, hari)) {
                    Swal.fire('Error', 'Schedule conflict detected! Same time and day.', 'error');
                    return;
                }
                if (currentSKS + courseSKS > {{ $sksLoad }}) {
                    Swal.fire('Error', 'Total SKS would exceed your limit', 'error');
                    return;
                }

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'Do you want to take this course?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, take it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        selectedCourses.add(kode);
                        $('#irs-dipilih').append(`
                        <tr>
                            <td>${btn.data('kode')}</td>
                            <td>${btn.data('matakuliah')}</td>
                            <td>${btn.data('ruang')}</td>
                            <td>${btn.data('hari')}</td>
                            <td>${btn.data('waktu')}</td>
                            <td>${btn.data('kelas')}</td>
                            <td>${courseSKS}</td>
                            <td>${btn.data('semester')}</td>
                            <td>New</td>
                            <td>
                                <button class="bg-red-500 text-white px-4 py-2 rounded-md delete-btn">Delete</button>
                            </td>
                        </tr>
                    `);
                        saveIRStoStorage();
                        currentSKS += courseSKS;
                        $('#total-sks').text(`Total SKS: ${currentSKS}`);
                        Swal.fire('Enrolled!', 'You have successfully enrolled in the course.',
                            'success');
                    }
                });
            });

            $(document).on('click', '.delete-btn', function() {
                const row = $(this).closest('tr');
                const kode = row.find('td:first').text();
                selectedCourses.delete(kode);
                row.remove();

                updateCurrentSKS();
                saveIRStoStorage();
                Swal.fire('Removed!', 'The course has been removed.', 'success');
                location.reload();
            });

            // Fungsi untuk mengecek bentrokan waktu
            function isWaktuBentrok(waktuBaru, hari) {
                return jadwalDipilih.includes(waktuBaru, hari);
            }
        });
    </script>

</body>

</html>
