<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Menyusun Jadwal</title>
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
                            class="rounded-md px-1 py-2 text-xl font-medium text-white">nama</span>

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
            </div>

        </div>
    </nav>

    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <a href= "{{ route('dashboard-kaprodi') }}" class="text-3xl font-bold tracking-tight text-gray-900">Menyusun Jadwal</a>
        </div>
    </header>


    <div class="mt-10" x-data="{ open: false }">
        <!-- Button untuk membuka modal -->
        <button @click="open = true" class="ml-72 bg-blue-500 text-white font-bold rounded py-2 px-4 w-20 text-center">
            Buat
        </button>

        <!-- Modal -->
        <div x-show="open" x-transition
            class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50">
            <div class="bg-white p-6 rounded-lg shadow-lg w-1/3 max-h-screen overflow-y-auto">
                <h2 class="text-xl font-semibold mb-4">Form Menyusun Jadwal</h2>
                    
                <!-- Form dalam Modal -->
                <form action="{{ route('simpan.jadwal') }}" method="POST">
                    @csrf

                    <!-- Ruang -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700" for="ruang">Ruang</label>
                        <select name="ruang" id="ruang" class="mt-1 block w-full border-gray-300 shadow-sm" required>
                            <option value="">-</option>
                            @foreach ($ruangDisetujui as $ruang)
                                <option value="{{ $ruang->kode_ruang }}">{{ $ruang->kode_ruang }}</option>
                            @endforeach
                        </select>
                    </div>


                    <!-- Kelas -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700" for="kelas">Kelas</label>
                        <select name="kelas" id="kelas" class="mt-1 block w-full border-gray-300 shadow-sm" required>
                            <option value="">-</option>
                            @foreach (range('A', 'D') as $kelas)
                                <option value="{{ $kelas }}">{{ $kelas }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Semester Aktif -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700" for="semester_aktif">Semester Aktif</label>
                        <select name="semester_aktif" id="semester_aktif" class="mt-1 block w-full border-gray-300 shadow-sm" required>
                            <option value="">-</option>
                            @foreach (range(1, 14) as $semester)
                                <option value="{{ $semester }}">{{ $semester }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Jurusan -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700" for="jurusan">Jurusan</label>
                        <input type="text" id="jurusan" name="jurusan" class="mt-1 block w-full border-gray-300 shadow-sm" 
                        value="{{ \App\Models\dosen::where('email', Auth::user()->email)->first()->jurusan }}" readonly>
                    </div>

                    <!-- Kode MK -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700" for="kodemk">Kode MK</label>
                        <select name="kodemk" id="kodemk" class="mt-1 block w-full border-gray-300 shadow-sm" required onchange="setSKSFromKodeMK('kodemk', 'sks')">
                            <option value="">-</option>
                            @foreach ($matakuliahList as $matakuliah)
                                
                                    <option value="{{ $matakuliah->kodemk }}" data-sks="{{ $matakuliah->sks }}">
                                        {{ $matakuliah->kodemk }} - {{ $matakuliah->nama }}
                                    </option>
                                
                            @endforeach
                        </select>
                    </div>

                    <!-- SKS -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700" for="sks">SKS</label>
                        <input type="number" id="sks" name="sks" class="mt-1 block w-full border-gray-300 shadow-sm" readonly>
                    </div>

                    <!-- Hari -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700" for="hari">Hari</label>
                        <select name="hari" id="hari" class="mt-1 block w-full border-gray-300 shadow-sm" required>
                            <option value="">-</option>
                            @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $hari)
                                <option value="{{ $hari }}">{{ $hari }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Pengampu 1 -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700" for="pengampu_1">Pengampu 1</label>
                        <select name="pengampu_1" id="pengampu_1" class="mt-1 block w-full border-gray-300 shadow-sm" required>
                            <option value="">-</option>
                            @foreach (\App\Models\dosen::all() as $dosen)
                                <option value="{{ $dosen->nama }}">{{ $dosen->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Pengampu 2 -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700" for="pengampu_2">Pengampu 2</label>
                        <select name="pengampu_2" id="pengampu_2" class="mt-1 block w-full border-gray-300 shadow-sm" required>
                            <option value="">-</option>
                            @foreach (\App\Models\dosen::all() as $dosen)
                                <option value="{{ $dosen->nama }}">{{ $dosen->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Pengampu 3 -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700" for="pengampu_3">Pengampu 3</label>
                        <select name="pengampu_3" id="pengampu_3" class="mt-1 block w-full border-gray-300 shadow-sm">
                            <option value="">-</option>
                            @foreach (\App\Models\dosen::all() as $dosen)
                                <option value="{{ $dosen->nama }}">{{ $dosen->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Jam Mulai -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700" for="jam_mulai">Jam Mulai</label>
                        <input type="text" id="jam_mulai" name="jam_mulai"
                            class="mt-1 block w-full border-gray-300 shadow-sm" required>
                    </div>

                    <!-- Jam Selesai -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700" for="jam_selesai">Jam Selesai</label>
                        <input type="text" id="jam_selesai" name="jam_selesai"
                            class="mt-1 block w-full border-gray-300 shadow-sm" required>
                    </div>


                    <!-- Submit Buttons -->
                    <div class="flex justify-end">
                        <button type="button" @click="open = false" class="mr-2 px-4 py-2 bg-gray-500 text-white rounded">Cancel</button>
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Submit</button>
                    </div> 
                </form>
            </div>
        </div>
                    

        <div class="container mx-auto mt-10">
            <div class="bg-white shadow-md rounded-lg">
                <!-- Konten -->
                <div class="p-6">
                    <h2 class="text-center text-gray-700 font-medium mb-6">Jadwal</h2>
                    <table class="min-w-full bg-white border">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b text-left text-gray-600">Ruang</th>
                                <th class="py-2 px-4 border-b text-left text-gray-600">Kelas</th>
                                <th class="py-2 px-4 border-b text-left text-gray-600">Semester Aktif</th>
                                <th class="py-2 px-4 border-b text-left text-gray-600">Jurusan</th>
                                <th class="py-2 px-4 border-b text-left text-gray-600">Kode MK</th>
                                <th class="py-2 px-4 border-b text-left text-gray-600">SKS</th>
                                <th class="py-2 px-4 border-b text-left text-gray-600">Hari</th>
                                <th class="py-2 px-4 border-b text-left text-gray-600">Pengampu 1</th>
                                <th class="py-2 px-4 border-b text-left text-gray-600">Pengampu 2</th>
                                <th class="py-2 px-4 border-b text-left text-gray-600">Pengampu 3</th>
                                <th class="py-2 px-4 border-b text-left text-gray-600">Jam Mulai</th>
                                <th class="py-2 px-4 border-b text-left text-gray-600">Jam Selesai</th>
                                <th class="py-2 px-4 border-b text-left text-gray-600">Status</th>
                                <th class="py-2 px-4 border-b text-left text-gray-600">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($submissions as $submission)
                                <tr>
                                    <td class="py-2 px-4 border-b">{{ $submission->ruang }}</td>
                                    <td class="py-2 px-4 border-b">{{ $submission->kelas }}</td>
                                    <td class="py-2 px-4 border-b">{{ $submission->semester_aktif }}</td>
                                    <td class="py-2 px-4 border-b">{{ $submission->jurusan }}</td>
                                    <td class="py-2 px-4 border-b">{{ $submission->kodemk }}</td>
                                    <td class="py-2 px-4 border-b">{{ $submission->sks }}</td>
                                    <td class="py-2 px-4 border-b">{{ $submission->hari }}</td>
                                    <td class="py-2 px-4 border-b">{{ $submission->pengampu_1 }}</td>
                                    <td class="py-2 px-4 border-b">{{ $submission->pengampu_2 }}</td>
                                    <td class="py-2 px-4 border-b">{{ $submission->pengampu_3 }}</td>
                                    <td class="py-2 px-4 border-b">{{ $submission->jam_mulai }}</td>
                                    <td class="py-2 px-4 border-b">{{ $submission->jam_selesai }}</td>
                                    <td class="py-2 px-4 border-b">
                                        @if ($submission->status === 'Sudah Disetujui')
                                            <span class="text-green-500 font-bold">Sudah Disetujui</span>
                                        @else
                                            <span class="text-red-500 font-bold">Belum Disetujui</span>
                                        @endif
                                    </td>
                                    <td class="py-2 px-4 border-b text-center">
                                        <!-- Tombol Edit -->
                                        <button 
                                            type="button"
                                            onclick="openEditModal({{ json_encode($submission) }})"
                                            class="font-bold rounded bg-blue-500 text-white hover:bg-blue-600 w-20 py-2 px-4">
                                            Edit    
                                        </button>
        
                                        <!-- Tombol Hapus -->
                                        <form action="{{ route('kaprodi.hapusJadwal', $submission->id) }}" method="POST" class="inline-block"
                                            onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="font-bold rounded bg-red-500 text-white hover:bg-red-600 w-20 py-2 px-4">
                                                Hapus
                                            </button>
                                        </form>                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
        
                    <!-- Jika tidak ada data -->
                    @if ($submissions->isEmpty())
                        <p class="text-center text-gray-500 mt-4">Tidak ada data yang tersedia.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>    

   <!-- Modal untuk Edit -->
<div id="editModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
            <h2 class="text-lg font-medium text-gray-800 mb-4">Edit Jadwal Kuliah</h2>

            <form id="editForm" action="{{ route('jadwal.update', $jadwal->id) }}" method="POST">
                @csrf
                @method('PATCH')

                <!-- Ruang -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700" for="editRuang">Ruang</label>
                    <select name="ruang" id="editRuang" class="mt-1 block w-full border-gray-300 shadow-sm" required>
                        <option value="">- Pilih Ruang -</option>
                        @foreach ($ruangDisetujui as $ruang)
                            <option value="{{ $ruang->kode_ruang }}" 
                                    {{ $ruang->kode_ruang == $jadwal->ruang ? 'selected' : '' }}>
                                {{ $ruang->kode_ruang }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Kelas -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700" for="editKelas">Kelas</label>
                    <select name="kelas" id="editKelas" class="mt-1 block w-full border-gray-300 shadow-sm" required>
                        <option value="">- Pilih Kelas -</option>
                        @foreach (range('A', 'D') as $kelas)
                            <option value="{{ $kelas }}" {{ $kelas == $jadwal->kelas ? 'selected' : '' }}>
                                {{ $kelas }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Semester Aktif -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700" for="editSemesterAktif">Semester Aktif</label>
                    <select name="semester_aktif" id="editSemesterAktif" class="mt-1 block w-full border-gray-300 shadow-sm" required>
                        <option value="">- Pilih Semester -</option>
                        @foreach (range(1, 14) as $semester)
                            <option value="{{ $semester }}" {{ $semester == $jadwal->semester_aktif ? 'selected' : '' }}>
                                {{ $semester }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Jurusan -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700" for="editJurusan">Jurusan</label>
                    <input type="text" id="editJurusan" name="jurusan"
                        value="{{ \App\Models\dosen::where('email', Auth::user()->email)->first()->jurusan }}"
                        class="mt-1 block w-full border-gray-300 shadow-sm" readonly>
                </div>

                <!-- Kode MK -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700" for="editKodeMK">Kode MK</label>
                    <select name="kodemk" id="editKodeMK" class="mt-1 block w-full border-gray-300 shadow-sm" required>
                        <option value="">- Pilih Mata Kuliah -</option>
                        @foreach ($matakuliahList as $matakuliah)
                            <option value="{{ $matakuliah->kodemk }}" 
                                    {{ $matakuliah->kodemk == $jadwal->kodemk ? 'selected' : '' }} 
                                    data-sks="{{ $matakuliah->sks }}">
                                {{ $matakuliah->kodemk }} - {{ $matakuliah->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- SKS -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700" for="editSKS">SKS</label>
                    <input type="number" id="editSKS" name="sks" value="{{ $jadwal->sks }}" class="mt-1 block w-full border-gray-300 shadow-sm" readonly>
                </div>

                <!-- Hari -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700" for="editHari">Hari</label>
                    <select name="hari" id="editHari" class="mt-1 block w-full border-gray-300 shadow-sm" required>
                        <option value="">- Pilih Hari -</option>
                        @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $hari)
                            <option value="{{ $hari }}" {{ $hari == $jadwal->hari ? 'selected' : '' }}>
                                {{ $hari }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Pengampu 1 -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700" for="editPengampu1">Pengampu 1</label>
                    <select name="pengampu_1" id="editPengampu1" class="mt-1 block w-full border-gray-300 shadow-sm" required>
                        <option value="">- Pilih Pengampu 1 -</option>
                        @foreach (\App\Models\dosen::all() as $dosen)
                            <option value="{{ $dosen->nama }}" {{ $dosen->nama == $jadwal->pengampu_1 ? 'selected' : '' }}>
                                {{ $dosen->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Pengampu 2 -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700" for="editPengampu2">Pengampu 2</label>
                    <select name="pengampu_2" id="editPengampu2" class="mt-1 block w-full border-gray-300 shadow-sm" required>
                        <option value="">- Pilih Pengampu 2 -</option>
                        @foreach (\App\Models\dosen::all() as $dosen)
                            <option value="{{ $dosen->nama }}" {{ $dosen->nama == $jadwal->pengampu_2 ? 'selected' : '' }}>
                                {{ $dosen->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Pengampu 3 -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700" for="editPengampu3">Pengampu 3</label>
                    <select name="pengampu_3" id="editPengampu3" class="mt-1 block w-full border-gray-300 shadow-sm">
                        <option value="">- Pilih Pengampu 3 -</option>
                        @foreach (\App\Models\dosen::all() as $dosen)
                            <option value="{{ $dosen->nama }}" {{ $dosen->nama == $jadwal->pengampu_3 ? 'selected' : '' }}>
                                {{ $dosen->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Jam Mulai -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700" for="editJamMulai">Jam Mulai</label>
                    <input type="text" id="editJamMulai" name="jam_mulai" value="{{ $jadwal->jam_mulai }}" class="mt-1 block w-full border-gray-300 shadow-sm" required>
                </div>

                <!-- Jam Selesai -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700" for="editJamSelesai">Jam Selesai</label>
                    <input type="text" id="editJamSelesai" name="jam_selesai" value="{{ $jadwal->jam_selesai }}" class="mt-1 block w-full border-gray-300 shadow-sm" required>
                </div>

                <!-- Tombol Submit dan Cancel -->
                <div class="flex justify-end">
                    <button type="button" onclick="closeEditModal()" class="mr-2 px-4 py-2 bg-gray-500 text-white rounded">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


    <script>
        // Fungsi untuk mengisi SKS berdasarkan kode MK yang dipilih
        function setSKSFromKodeMK(kodemkId, sksId) {
            const kodeMKDropdown = document.getElementById(kodemkId); // Dropdown Kode MK
            const sksInput = document.getElementById(sksId); // Input SKS

            // Cari opsi yang dipilih di dropdown
            const selectedOption = kodeMKDropdown.options[kodeMKDropdown.selectedIndex];
            
            console.log("Selected option:", selectedOption);
            
            // Cek jika ada opsi yang dipilih dan memiliki atribut data-sks
            if (selectedOption && selectedOption.getAttribute('data-sks')) {
                // Set nilai SKS sesuai dengan data-sks
                sksInput.value = selectedOption.getAttribute('data-sks');
                console.log("SKS set to:", selectedOption.getAttribute('data-sks'));
            } else {
                // Jika tidak ada yang dipilih, kosongkan input SKS
                sksInput.value = '';
            }
        }


        function openEditModal(submission) {
            // Tampilkan modal edit
            document.getElementById('editModal').classList.remove('hidden');
            
    
            // Setel action URL pada form dengan ID yang benar
            document.getElementById('editForm').action = `/kaprodi/jadwal/${submission.id}`;
            

    
            // Isi data ke field form berdasarkan data submission
            document.getElementById('editRuang').value = submission.ruang;
            document.getElementById('editKelas').value = submission.kelas;
            document.getElementById('editSemesterAktif').value = submission.semester_aktif;
            document.getElementById('editJurusan').value = submission.jurusan;
            document.getElementById('editKodeMK').value = submission.kodemk;
            document.getElementById('editSKS').value = submission.sks;
            document.getElementById('editHari').value = submission.hari;
            document.getElementById('editPengampu1').value = submission.pengampu_1;
            document.getElementById('editPengampu2').value = submission.pengampu_2;
            document.getElementById('editPengampu3').value = submission.pengampu_3;
            document.getElementById('editJamMulai').value = submission.jam_mulai;
            document.getElementById('editJamSelesai').value = submission.jam_selesai;
    
            // Pastikan dropdown memiliki nilai default jika data kosong
            const jurusanDropdown = document.getElementById('editJurusan');
            if (!submission.jurusan) {
                jurusanDropdown.value = ''; // Set ke default jika jurusan kosong
            }
        }
    
        function closeEditModal() {
            // Sembunyikan modal edit
            document.getElementById('editModal').classList.add('hidden');
        }
    </script>
    

</body>

</html>