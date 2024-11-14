<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Menyusun Ruang Kelas</title>
</head>

<body class="min-h-full">

    <nav class="bg-gray-800" x-data="{ isOpen: false }">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
<<<<<<< HEAD
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
=======
          <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
              <div class="flex-shrink-0">
                <img class="h-8 w-8" src="../img/logoundip.png" alt="Your Company">
                
              </div>
              <div class="hidden md:block">
                <div class="flex items-baseline space-x-4">
                  <span class="rounded-md px-3 py-2 text-2xl font-medium text-white">DipoACE</span>  
>>>>>>> 97c510d96f8fcb640e3751d594e2403ecf24cfeb
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
<<<<<<< HEAD
        </div>
    </nav>

    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <a href="dashboard-akademik" class="text-3xl font-bold tracking-tight text-gray-900">Dashboard</a>
=======
          </div>
        </div>
      </nav>
    
      <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
          <a href="dashboard-akademik" class="text-3xl font-bold tracking-tight text-gray-900">Dashboard</a>
>>>>>>> 97c510d96f8fcb640e3751d594e2403ecf24cfeb
        </div>
    </header>

<<<<<<< HEAD
    <div class="mt-10" x-data="{ open: false }">
        <!-- Button untuk membuka modal -->
        <button @click="open = true" class="ml-72 bg-blue-500 text-white font-bold rounded py-2 px-4 w-20 text-center">
            Buat
        </button>

        <!-- Modal -->
        <div x-show="open" x-transition
            class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50">
            <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
                <h2 class="text-xl font-semibold mb-4">Form Menyusun Jadwal</h2>

                <!-- Form dalam Modal -->
                <form action="{{ route('submit.form') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700" for="name">Nama</label>
                        <input type="text" id="nama" name="nama"
                            class="mt-1 block w-full border-gray-300 shadow-sm" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700" for="name">Ruang</label>
                        <input type="text" id="ruang" name="ruang"
                            class="mt-1 block w-full border-gray-300 shadow-sm" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700" for="name">Hari</label>
                        <input type="text" id="hari" name="hari"
                            class="mt-1 block w-full border-gray-300 shadow-sm" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700" for="name">Jam Mulai</label>
                        <input type="text" id="jam_mulai" name="jam_mulai"
                            class="mt-1 block w-full border-gray-300 shadow-sm" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700" for="name">Jam Selesai</label>
                        <input type="text" id="jam_selesai" name="jam_selesai"
                            class="mt-1 block w-full border-gray-300 shadow-sm" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700" for="name">Semester</label>
                        <input type="text" id="semester" name="semester"
                            class="mt-1 block w-full border-gray-300 shadow-sm" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700" for="name">Jurusan</label>
                        <select name="jurusan" id="jurusan" class="mt-1 block w-full border-gray-300 shadow-sm"
                            required>
                            <option value="">-</option>
                            <option value="Informatika">Informatika</option>
                            <option value="Statistika">Statistika</option>
                            <option value="Fisika">Fisika</option>
                            <option value="Biologi">Biologi</option>
                            <option value="Bioteknologi">Bioteknologi</option>
                            <option value="Kimia">Kimia</option>
                            <option value="Matematika">Matematika</option>
                        </select>
                    </div>

                    <div class="flex justify-end">
                        <button type="button" @click="open = false"
                            class="mr-2 px-4 py-2 bg-gray-500 text-white rounded">Cancel</button>
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Submit</button>
                    </div>
                </form>
            </div>
=======
    <div x-data="{ open: false, selected: 'Pilih Program Studi' }" class="relative">
        {{-- <label id="listbox-label" class="flex text-sm font-medium leading-6 text-gray-900 pl-48">Memilih Program Studi</label> --}}
        <div class="relative mt-8 w-96 pl-48 ">
          <button @click="open = !open" type="button" class="relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 sm:text-sm sm:leading-6" aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label">
            <span class="flex items-center">
              <span class="ml-3 block truncate" x-text="selected">Pilih Program Studi</span>
            </span>
            <span class="pointer-events-none absolute inset-y-0 right-0 ml-3 flex items-center pr-2">
              <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z" clip-rule="evenodd" />
              </svg>
            </span>
          </button>
      
          <ul x-show="open" @click.away="open = false" class="absolute z-10 mt-1 max-h-56 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm" role="listbox" aria-labelledby="listbox-label">
            <li @click="selected = 'Informatika'; open = false" class="relative cursor-default select-none py-2 pl-3 pr-9 text-gray-900" role="option">
              <div class="flex items-center">
                <span class="ml-3 block truncate">Informatika</span>
              </div>
            </li>
            <li @click="selected = 'Biologi'; open = false" class="relative cursor-default select-none py-2 pl-3 pr-9 text-gray-900" role="option">
              <div class="flex items-center">
                <span class="ml-3 block truncate">Biologi</span>
              </div>
            </li>
            <li @click="selected = 'Fisika'; open = false" class="relative cursor-default select-none py-2 pl-3 pr-9 text-gray-900" role="option">
              <div class="flex items-center">
                <span class="ml-3 block truncate">Fisika</span>
              </div>
            </li>
          </ul>
>>>>>>> 97c510d96f8fcb640e3751d594e2403ecf24cfeb
        </div>
    </div>

    <div class="container mx-auto mt-10">
        <div class="bg-white shadow-md rounded-lg">
            <div class="flex border-b">
                <button class="flex-1 py-4 px-6 text-center text-blue-500 border-b-2 border-blue-500">ARRANGE
                    CLASSROOM</button>
                <button class="flex-1 py-4 px-6 text-center text-gray-500 hover"
                    onclick="window.location.href='nyusunkuotakelas'">ARRANGE QUOTA CLASS</button>
            </div>
            <div class="p-6">
                <h2 class="text-center text-gray-700 font-medium mb-6">Menyusun Ruangan</h2>
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b text-left text-gray-600">Nama</th>
                            <th class="py-2 px-4 border-b text-left text-gray-600">Ruang</th>
                            <th class="py-2 px-4 border-b text-left text-gray-600">Hari</th>
                            <th class="py-2 px-4 border-b text-left text-gray-600">Jam Mulai</th>
                            <th class="py-2 px-4 border-b text-left text-gray-600">Jam Selesai</th>
                            <th class="py-2 px-4 border-b text-left text-gray-600">Semester</th>
                            <th class="py-2 px-4 border-b text-left text-gray-600">Jurusan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($submissions as $submission)
                            <tr>
                                <td class="py-2 px-4 border-b">{{ $submission->nama }}</td>
                                <td class="py-2 px-4 border-b">{{ $submission->ruang }}</td>
                                <td class="py-2 px-4 border-b">{{ $submission->hari }}</td>
                                <td class="py-2 px-4 border-b">{{ $submission->jam_mulai }}</td>
                                <td class="py-2 px-4 border-b">{{ $submission->jam_selesai }}</td>
                                <td class="py-2 px-4 border-b">{{ $submission->semester }}</td>
                                <td class="py-2 px-4 border-b">{{ $submission->jurusan }}</td>
                                <td>
                                    <!-- Tombol Edit -->
                                    <button action="{{ route('classrooms.update', $submission->id) }}" method="POST"
                                        onclick="openEditModal({{ json_encode($submission) }})"
                                        class="font-bold rounded bg-blue-500 text-white hover:text-white w-20 py-2 px-4">Edit</button>

                                    <form action="{{ route('classrooms.destroy', $submission->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                        @csrf

                                        @method('DELETE')
                                        <button type="submit"
                                            class="font-bold rounded bg-red-500 text-white hover:text-white w-20 py-2 px-4">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal untuk Edit -->
    <div id="editModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
                <h2 class="text-lg font-medium text-gray-800 mb-4">Edit Ruang Kelas</h2>

                <form id="editForm" method="POST">
                    @csrf
                    @method('PATCH')

                    <label>Nama</label>
                    <input type="text" id="editNama" name="nama" class="w-full p-2 border rounded mb-2">

                    <label>Ruang</label>
                    <input type="text" id="editRuang" name="ruang" class="w-full p-2 border rounded mb-2">

                    <label>Hari</label>
                    <input type="text" id="editHari" name="hari" class="w-full p-2 border rounded mb-2">

                    <label>Jam Mulai</label>
                    <input type="text" id="editJamMulai" name="jam_mulai" class="w-full p-2 border rounded mb-2">

                    <label>Jam Selesai</label>
                    <input type="text" id="editJamSelesai" name="jam_selesai"
                        class="w-full p-2 border rounded mb-2">

                    <label>Semester</label>
                    <input type="text" id="editSemester" name="semester" class="w-full p-2 border rounded mb-2">

                    <label>Jurusan</label>
                    <select name="jurusan" id="jurusan" class="w-full p-2 border rounded mb-2">
                        <option value="">-</option>
                        <option value="Informatika">Informatika</option>
                        <option value="Statistika">Statistika</option>
                        <option value="Fisika">Fisika</option>
                        <option value="Biologi">Biologi</option>
                        <option value="Bioteknologi">Bioteknologi</option>
                        <option value="Kimia">Kimia</option>
                        <option value="Matematika">Matematika</option>
                    </select>

                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded mt-2">Submit</button>
                    <button type="button" onclick="closeEditModal()"
                        class="bg-gray-500 text-white py-2 px-4 rounded mt-2">Cancel</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openEditModal(submission) {
            // Tampilkan modal edit
            document.getElementById('editModal').classList.remove('hidden');
            document.getElementById('editModal').classList.add('block');

            // Setel action URL pada form dengan ID yang benar
            document.getElementById('editForm').action = `/classrooms/${submission.id}`;

            // Setel nilai pada setiap field input berdasarkan data submission
            document.getElementById('editNama').value = submission.nama;
            document.getElementById('editRuang').value = submission.ruang;
            document.getElementById('editHari').value = submission.hari;
            document.getElementById('editJamMulai').value = submission.jam_mulai;
            document.getElementById('editJamSelesai').value = submission.jam_selesai;
            document.getElementById('editSemester').value = submission.semester;
            document.getElementById('jurusan').value = submission.jurusan;
        }

        function closeEditModal() {
            // Sembunyikan modal edit
            document.getElementById('editModal').classList.add('hidden');
            document.getElementById('editModal').classList.remove('block');
        }
    </script>

</body>

</html>
