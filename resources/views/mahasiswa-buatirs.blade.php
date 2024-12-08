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
            <a href="dashboard-mahasiswa" class="text-3xl font-bold tracking-tight text-gray-900">Buat IRS</a>
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
                    <th class="border-b p-2">SKS</th>
                    <th class="border-b p-2">Hari</th>
                    <th class="border-b p-2">Waktu</th>
                    <th class="border-b p-2">Kelas</th>
                    <th class="border-b p-2">Semester</th>
                    <th class="border-b p-2">Sifat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jadwals as $jadwal)
                    <tr>
                        <td class="border-b p-2">{{ $jadwal->kodemk }}</td>
                        <td class="border-b p-2">{{ $jadwal->matakuliah->nama ?? 'Tidak ada Mata Kuliah' }}</td>
                        <td class="border-b p-2">{{ $jadwal->ruang }}</td>
                        <td class="border-b p-2">{{ $jadwal->sks }}</td>
                        <td class="border-b p-2">{{ $jadwal->hari }}</td>
                        <td class="border-b p-2">{{ substr($jadwal->jam_mulai, 0, 5) }} - {{ substr($jadwal->jam_selesai, 0, 5) }}</td>
                        <td class="border-b p-2">{{ $jadwal->kelas }}</td>
                        <td class="border-b p-2">{{ $jadwal->semester_aktif }}</td>
                        <td class="border-b p-2">{{ $jadwal->matakuliah->jenis_matkul ?? 'Tidak ada Status' }}</td>
                        <td class="border-b p-2 text-right">
                            <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 ambil-btn"
                                data-id="{{ $jadwal->id }}" data-row-id="course-row-{{ $jadwal->id }}"
                                data-kode="{{ $jadwal->kodemk }}" data-hari="{{ $jadwal->hari }}"
                                data-matakuliah="{{ $jadwal->matakuliah->nama ?? 'Tidak ada Mata Kuliah' }}"
                                data-hari="{{ $jadwal->hari }}" data-ruang="{{ $jadwal->ruang }}"
                                data-sks="{{ $jadwal->sks }}"
                                data-waktu="{{ substr($jadwal->jam_mulai, 0, 5) }} - {{ substr($jadwal->jam_selesai, 0, 5) }}"
                                data-kelas="{{ $jadwal->kelas }}" data-semester="{{ $jadwal->semester_aktif }}">
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
                    <th class="border-b p-2">SKS</th>
                    <th class="border-b p-2">Hari</th>
                    <th class="border-b p-2">Waktu</th>
                    <th class="border-b p-2">Kelas</th>
                    <th class="border-b p-2">Semester</th>
                </tr>
            </thead>
            <tbody id="irs-dipilih">

            </tbody>
        </table>

        <div class="flex justify-between items-center mt-4">
            <div id="total-sks" class="text-gray-700 ml-2 text-xl font-semibold">Total SKS: 0</div>
            <button id="submit-irs-btn" class="bg-green-500 text-white px-4 py-2 rounded-md mr-14">Submit</button>
        </div>
        <form id="submit-irs-form" action="{{ route('mahasiswa.submitIRS') }}" method="POST"
            style="display: none;">
            @csrf
            <input type="hidden" name="sks" id="input-sks">
            <input type="hidden" name="courses" id="input-courses">
            <input type="hidden" name="student_id" value="{{ Auth::user()->id }}">
        </form>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            console.log("JavaScript is running!");
        });

        $(document).ready(function() {
            let currentSKS = 0;
            let jadwalDipilih = [];
            let selectedCourses = new Set();
            let isSubmitted = false; // Flag untuk memeriksa apakah IRS sudah disubmit

            // Fungsi untuk memuat data IRS dari localStorage
            function loadIRSfromStorage() {
                const storedIRS = localStorage.getItem('irsData');
                if (storedIRS) {
                    $('#irs-dipilih').html(storedIRS);
                    updateCurrentSKS();
                    $('#irs-dipilih tr').each(function() {
                        const kode = $(this).find('td:first').text();
                        selectedCourses.add(kode);
                        jadwalDipilih.push($(this).find('td:eq(4)').text());
                    });
                }
            }

            // Fungsi untuk menyimpan data IRS ke localStorage
            function saveIRStoStorage() {
                const irsData = $('#irs-dipilih').html();
                localStorage.setItem('irsData', irsData);
            }

            // Fungsi untuk memperbarui total SKS
            function updateCurrentSKS() {
                let totalSKS = 0;
                $('#irs-dipilih tr').each(function() {
                    const sks = parseInt($(this).find('td:eq(3)').text(), 10);
                    totalSKS += sks;
                });
                currentSKS = totalSKS;
                $('#total-sks').text(`Total SKS: ${currentSKS}`);
            }

            // Load data IRS saat halaman dimuat
            loadIRSfromStorage();

            // Memuat status isSubmitted dari localStorage
            const storedIsSubmitted = localStorage.getItem('isSubmitted');
            if (storedIsSubmitted === 'true') {
                isSubmitted = true;
                $('#submit-irs-btn').text('Cancel') // Ubah tombol menjadi 'Cancel'
                    .removeClass('btn-primary')
                    .addClass('btn-danger'); // Tombol cancel menjadi merah
                $('.delete-btn').hide(); // Sembunyikan tombol delete
            } else {
                isSubmitted = false;
                $('#submit-irs-btn').text('Submit') // Tombol default
                    .removeClass('btn-danger')
                    .addClass('btn-primary'); // Tombol submit normal
            }

            // Pencarian jadwal berdasarkan query
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
                                        <td>${jadwal.sks}</td>
                                        <td>${jadwal.hari}</td>
                                        <td>${jadwal.jam_mulai}-${jadwal.jam_selesai}</td>
                                        <td>${jadwal.kelas}</td>
                                        <td>${jadwal.semester_aktif}</td>
                                        <td>${jadwal.matakuliah.jenis_matkul}</td>
                                        <td class="text-right">
                                            <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 ambil-btn"
                                                data-id="${jadwal.id}"
                                                data-kode="${jadwal.kodemk}"
                                                data-matakuliah="${jadwal.matakuliah.nama}"
                                                data-ruang="${jadwal.ruang}"
                                                data-sks="${jadwal.sks}"
                                                data-hari="${jadwal.hari}"
                                                data-waktu="${jadwal.jam_mulai}-${jadwal.jam_selesai}"
                                                data-kelas="${jadwal.kelas}"
                                                data-semester="${jadwal.semester_aktif}"
                                                data-sifat="${jadwal.matakuliah.jenis_matkul}">
                                                Ambil
                                            </button>
                                        </td>
                                    </tr>
                                `);
                            });
                        }
                    });
                } else {
                    location.reload();
                }
            });

            let sksLoad = {{ $sksLoad ?? 0 }}; // Pastikan $sksLoad didefinisikan di controller atau view

            // Mengambil mata kuliah yang dipilih
            $(document).on('click', '.ambil-btn', function() {
                const btn = $(this);
                const courseSKS = parseInt(btn.data('sks'), 10);
                const kode = btn.data('kode');
                const waktu = btn.data('waktu');
                const hari = btn.data('hari');

                if (selectedCourses.has(kode)) {
                    Swal.fire('Error', 'You have already selected this course.', 'error');
                    return;
                }

                if (isWaktuBentrok(waktu, hari)) {
                    Swal.fire('Error', 'Schedule conflict detected!', 'error');
                    return;
                }

                if (currentSKS + courseSKS > sksLoad) {
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
                                <td>${courseSKS}</td>
                                <td>${btn.data('hari')}</td>
                                <td>${btn.data('waktu')}</td>
                                <td>${btn.data('kelas')}</td>
                                <td>${btn.data('semester')}</td>
                                
                                <td>
                                    <button class="bg-red-500 text-white px-4 py-2 rounded-md delete-btn">Delete</button>
                                </td>
                            </tr>
                        `);
                        saveIRStoStorage();
                        currentSKS += courseSKS;
                        jadwalDipilih.push(waktu); // Tambahkan waktu ke array
                        $('#total-sks').text(`Total SKS: ${currentSKS}`);
                        Swal.fire('Enrolled!', 'You have successfully enrolled in the course.',
                            'success');
                    }
                });
            });

            // Menghapus mata kuliah dari IRS yang sudah dipilih
            $(document).on('click', '.delete-btn', function() {
                const row = $(this).closest('tr');
                const kode = row.find('td:first').text();
                selectedCourses.delete(kode);
                row.remove();
                updateCurrentSKS();
                saveIRStoStorage();
                Swal.fire('Removed!', 'The course has been removed.', 'success');
            });

            function isWaktuBentrok(waktuBaru, hariBaru) {
                console.log('Mengecek bentrokan untuk:', hariBaru, waktuBaru); // Tambahkan untuk debugging
                const waktuMulaiBaru = moment(waktuBaru.split('-')[0], 'HH:mm');
                const waktuSelesaiBaru = moment(waktuBaru.split('-')[1], 'HH:mm');

                for (let i = 0; i < jadwalDipilih.length; i++) {
                    const [hariTersimpan, waktuMulaiTersimpanStr, waktuSelesaiTersimpanStr] = jadwalDipilih[i]
                        .split('-');
                    console.log('Jadwal Tersimpan:', hariTersimpan, waktuMulaiTersimpanStr,
                        waktuSelesaiTersimpanStr); // Debug
                    const waktuMulaiTersimpan = moment(waktuMulaiTersimpanStr, 'HH:mm');
                    const waktuSelesaiTersimpan = moment(waktuSelesaiTersimpanStr, 'HH:mm');

                    if (hariBaru === hariTersimpan) {
                        console.log('Membandingkan dengan:', hariTersimpan, waktuMulaiTersimpan.format('HH:mm'),
                            waktuSelesaiTersimpan.format('HH:mm')); // Debug
                        if (!waktuSelesaiBaru.isBefore(waktuMulaiTersimpan) && !waktuMulaiBaru.isAfter(
                                waktuSelesaiTersimpan)) {
                            console.log('Bentrokan ditemukan');
                            return true; // Ada bentrokan
                        }
                    }
                }
                console.log('Tidak ada bentrokan ditemukan');
                return false; // Tidak ada bentrokan
            }




            // Fungsi untuk mengumpulkan data IRS yang dipilih
            function collectSelectedIRS() {
                let courses = [];
                $('#irs-dipilih tr').each(function() {
                    let course = {
                        kodemk: $(this).find('td:eq(0)').text(),
                        mata_kuliah: $(this).find('td:eq(1)').text(),
                        ruang: $(this).find('td:eq(2)').text(),
                        sks: $(this).find('td:eq(3)').text(),
                        hari: $(this).find('td:eq(4)').text(),
                        waktu: $(this).find('td:eq(5)').text(),
                        kelas: $(this).find('td:eq(6)').text(),
                        semester: $(this).find('td:eq(7)').text(),
                        status: $(this).find('td:eq(8)').text(), // Status IRS
                    };
                    courses.push(course);
                });
                return courses;
            }

            // Menangani klik pada tombol submit
            $('#submit-irs-btn').on('click', function() {
                if (isSubmitted) {
                    // Jika sudah disubmit, tombol Cancel akan menghapus data IRS di database saja
                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'Do you want to cancel your IRS submission?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, cancel it!',
                        cancelButtonText: 'No, keep it',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Hapus data IRS yang sudah disubmit dari database
                            $.ajax({
                                url: "{{ route('mahasiswa.cancelIRS') }}",
                                type: 'POST',
                                data: {
                                    _token: '{{ csrf_token() }}',
                                    courses: collectSelectedIRS(),
                                    student_id: '{{ Auth::user()->id }}'
                                },
                                success: function(response) {
                                    if (response.success) {
                                        Swal.fire('Cancelled!',
                                            'Your IRS submission has been cancelled.',
                                            'success');
                                        $('#submit-irs-btn').text(
                                                'Submit'
                                            ) // Ubah tombol kembali ke 'Submit'
                                            .removeClass('btn-danger')
                                            .addClass(
                                                'btn-primary'
                                            ); // Ubah warna tombol Cancel menjadi normal
                                        isSubmitted =
                                            false; // Update status isSubmitted
                                        localStorage.setItem('isSubmitted',
                                            'false'); // Simpan status di localStorage
                                        $('.delete-btn')
                                            .show(); // Sembunyikan tombol delete
                                    } else {
                                        Swal.fire('Error', response.message, 'error');
                                    }
                                },
                                error: function(error) {
                                    Swal.fire('Error', 'Terjadi kesalahan pada server!',
                                        'error');
                                }
                            });
                        }
                    });
                } else {
                    // Submit data IRS jika belum disubmit
                    const selectedIRS = collectSelectedIRS();
                    if (selectedIRS.length === 0) {
                        Swal.fire('Error', 'Tidak ada mata kuliah yang dipilih', 'error');
                        return;
                    }

                    // Kirim data melalui AJAX
                    $.ajax({
                        url: "{{ route('mahasiswa.submitIRS') }}",
                        type: "POST",
                        data: {
                            _token: '{{ csrf_token() }}',
                            courses: selectedIRS,
                            sks: currentSKS,
                            student_id: '{{ Auth::user()->id }}'
                        },
                        success: function(response) {
                            if (response.success) {
                                isSubmitted = true;
                                $('#submit-irs-btn').text(
                                        'Cancel') // Ubah tombol menjadi 'Cancel'
                                    .removeClass('btn-primary')
                                    .addClass('btn-danger'); // Tombol cancel menjadi merah
                                Swal.fire('Success', 'IRS berhasil disubmit!', 'success');
                                $('.delete-btn').hide(); // Tombol delete disembunyikan
                                localStorage.setItem('isSubmitted',
                                    'true'); // Simpan status di localStorage
                            } else {
                                Swal.fire('Error', response.message, 'error');
                            }
                        },
                        error: function(error) {
                            Swal.fire('Error', 'Terjadi kesalahan pada server!', 'error');
                        }
                    });
                }
            });

            // Menghapus mata kuliah dari IRS yang sudah dipilih
            $(document).on('click', '.delete-btn', function() {
                const row = $(this).closest('tr');
                row.remove(); // Hapus baris di tampilan
                updateCurrentSKS(); // Update total SKS
            });
        });
    </script>

</body>

</html>
