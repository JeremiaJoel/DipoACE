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
            <a href="dashboard-akademik" class="text-3xl font-bold tracking-tight text-gray-900">Dashboard</a>
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
    <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
        <h2 class="text-xl font-semibold mb-4">Form Menyusun Ruangan</h2>

        <!-- Form dalam Modal -->
        <form action="{{ route('submit.form') }}" method="POST">
            @csrf

            <!-- Kode Ruang -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700" for="gedung">Gedung</label>
                <input type="text" id="gedung" name="gedung"
                    class="mt-1 block w-full border-gray-300 shadow-sm" required>
            </div>
            
            <!-- Kode Ruang -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700" for="kode_ruang">Kode Ruang</label>
                <div class="grid grid-cols-3 gap-4 mt-1">
                    <!-- Kode Ruang E -->
                    <label class="flex items-center">
                        <input type="checkbox" id="kode_ruang_e101" name="kode_ruang[]" value="E101" class="mr-2">
                        E101
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" id="kode_ruang_e102" name="kode_ruang[]" value="E102" class="mr-2">
                        E102
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" id="kode_ruang_e103" name="kode_ruang[]" value="E103" class="mr-2">
                        E103
                    </label>
                    
                    <!-- Kode Ruang A -->
                    <label class="flex items-center">
                        <input type="checkbox" id="kode_ruang_a101" name="kode_ruang[]" value="A101" class="mr-2">
                        A101
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" id="kode_ruang_a102" name="kode_ruang[]" value="A102" class="mr-2">
                        A102
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" id="kode_ruang_a103" name="kode_ruang[]" value="A103" class="mr-2">
                        A103
                    </label>
                    
                    <!-- Kode Ruang B -->
                    <label class="flex items-center">
                        <input type="checkbox" id="kode_ruang_b101" name="kode_ruang[]" value="B101" class="mr-2">
                        B101
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" id="kode_ruang_b102" name="kode_ruang[]" value="B102" class="mr-2">
                        B102
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" id="kode_ruang_b103" name="kode_ruang[]" value="B103" class="mr-2">
                        B103
                    </label>
                    
                    <!-- Kode Ruang C -->
                    <label class="flex items-center">
                        <input type="checkbox" id="kode_ruang_c101" name="kode_ruang[]" value="C101" class="mr-2">
                        C101
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" id="kode_ruang_c102" name="kode_ruang[]" value="C102" class="mr-2">
                        C102
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" id="kode_ruang_c103" name="kode_ruang[]" value="C103" class="mr-2">
                        C103
                    </label>
                    
                    <!-- Kode Ruang D -->
                    <label class="flex items-center">
                        <input type="checkbox" id="kode_ruang_d101" name="kode_ruang[]" value="D101" class="mr-2">
                        D101
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" id="kode_ruang_d102" name="kode_ruang[]" value="D102" class="mr-2">
                        D102
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" id="kode_ruang_d103" name="kode_ruang[]" value="D103" class="mr-2">
                        D103
                    </label>
                </div>
            </div>

            <!-- Kapasitas -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700" for="kapasitas">Kapasitas</label>
                <input type="number" id="kapasitas" name="kapasitas"
                    class="mt-1 block w-full border-gray-300 shadow-sm" required>
            </div>

            <!-- Status -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700" for="status">Status</label>
                <input type="text" id="status" name="status"
                    class="mt-1 block w-full border-gray-300 shadow-sm" value="Belum Disetujui" readonly>
            </div>

            <!-- Jurusan -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700" for="jurusan">Jurusan</label>
                <select name="jurusan" id="jurusan" class="mt-1 block w-full border-gray-300 shadow-sm" required>
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
                            <th class="py-2 px-4 border-b text-left text-gray-600">Kode Ruang</th>
                            <th class="py-2 px-4 border-b text-left text-gray-600">Gedung</th>
                            <th class="py-2 px-4 border-b text-left text-gray-600">Kapasitas</th>
                            <th class="py-2 px-4 border-b text-left text-gray-600">Jurusan</th>
                            <th class="py-2 px-4 border-b text-left text-gray-600">Status</th>
                            <th class="py-2 px-4 border-b text-left text-gray-600">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($classrooms as $classroom)
                            <tr>
                                <td class="py-2 px-4 border-b">{{ $classroom->kode_ruang }}</td>
                                <td class="py-2 px-4 border-b">{{ $classroom->gedung }}</td>
                                <td class="py-2 px-4 border-b">{{ $classroom->kapasitas }}</td>
                                <td class="py-2 px-4 border-b">{{ $classroom->jurusan }}</td>
                                <td class="py-2 px-4 border-b">
                                    @if ($classroom->status === 'Sudah Disetujui')
                                        <span class="text-green-500 font-bold">Sudah Disetujui</span>
                                    @else
                                        <span class="text-red-500 font-bold">Belum Disetujui</span>
                                    @endif
                                </td>
                                <td>
                                    <!-- Tombol Edit -->
                                    <button onclick="openEditModal({{ json_encode($classroom) }})"
                                        class="font-bold rounded bg-blue-500 text-white hover:text-white w-20 py-2 px-4">Edit</button>

                                    <!-- Form Hapus -->
                                    <form action="{{ route('classrooms.destroy', $classroom->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus data ini?');" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="font-bold rounded bg-red-500 text-white hover:text-white w-20 py-2 px-4">Hapus</button>
                                    </form>

                                    <!-- Form Ajukan -->
                                    @if ($classroom->status === 'Belum Disetujui') <!-- Ajukan hanya jika belum disetujui -->
                                    <form action="{{ route('approveclassrooms.submit', $classroom->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin mengajukan jadwal ini ke dekan?');" class="inline-block">
                                        @csrf
                                        <button type="submit"
                                            class="font-bold rounded bg-yellow-500 text-white hover:text-white w-20 py-2 px-4">Ajukan</button>
                                    </form>
                                    @endif
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

                <!-- Gedung -->
                <div class="mb-4">
                    <label for="editGedung" class="block text-sm font-medium text-gray-700">Gedung</label>
                    <input type="text" id="editGedung" name="gedung" class="w-full p-2 border rounded" required>
                </div>

                <!-- Kode Ruang -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Kode Ruang</label>
                    <div class="grid grid-cols-3 gap-4">
                        @foreach (['E101', 'E102', 'E103', 'A101', 'A102', 'A103', 'B101', 'B102', 'B103', 'C101', 'C102', 'C103', 'D101', 'D102', 'D103'] as $kodeRuang)
                            <label class="flex items-center">
                                <input type="checkbox" name="kode_ruang[]" value="{{ $kodeRuang }}" class="mr-2"
                                    id="kode_ruang_{{ $kodeRuang }}">
                                {{ $kodeRuang }}
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Kapasitas -->
                <div class="mb-4">
                    <label for="editKapasitas" class="block text-sm font-medium text-gray-700">Kapasitas</label>
                    <input type="number" id="editKapasitas" name="kapasitas" class="w-full p-2 border rounded" required>
                </div>

                <!-- Status -->
                <div class="mb-4">
                    <label for="editStatus" class="block text-sm font-medium text-gray-700">Status</label>
                    <input type="text" id="editStatus" name="status" class="w-full p-2 border rounded" readonly>
                </div>

                <!-- Jurusan -->
                <div class="mb-4">
                    <label for="editJurusan" class="block text-sm font-medium text-gray-700">Jurusan</label>
                    <select name="jurusan" id="editJurusan" class="w-full p-2 border rounded" required>
                        <option value="">Pilih Jurusan</option>
                        <option value="Informatika">Informatika</option>
                        <option value="Statistika">Statistika</option>
                        <option value="Fisika">Fisika</option>
                        <option value="Biologi">Biologi</option>
                        <option value="Bioteknologi">Bioteknologi</option>
                        <option value="Kimia">Kimia</option>
                        <option value="Matematika">Matematika</option>
                    </select>
                </div>

                <!-- Tombol -->
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Submit</button>
                    <button type="button" onclick="closeEditModal()" class="bg-gray-500 text-white py-2 px-4 rounded ml-2">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>





    <script>
            function openEditModal(classroom) {
            // Tampilkan modal
            document.getElementById('editModal').classList.remove('hidden');

            // Atur action form dengan URL ID
            document.getElementById('editForm').action = `/classrooms/${classroom.id}`;

            // Isi input dengan data yang diterima
            document.getElementById('editGedung').value = classroom.gedung;
            document.getElementById('editKapasitas').value = classroom.kapasitas;
            document.getElementById('editStatus').value = classroom.status;
            document.getElementById('editJurusan').value = classroom.jurusan;

            // Checkbox Kode Ruang
            const kodeRuangCheckboxes = document.querySelectorAll('input[name="kode_ruang[]"]');
            kodeRuangCheckboxes.forEach(checkbox => {
                checkbox.checked = classroom.kode_ruang.includes(checkbox.value);
                });
            }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
        }

    </script>

</body>

</html>
