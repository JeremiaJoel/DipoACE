<!DOCTYPE html>
<html>
<head>
    <title>Daftar Kelas</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-4">

    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-4">Daftar Kelas</h1>

        <!-- Form Filter -->
        <form action="{{ route('kelas.filter') }}" method="GET" class="mb-4">
            <select name="semester" class="border border-gray-300 rounded p-2 mr-2">
                <option value="">Pilih Semester</option>
                <option value="1">Semester 1</option>
                <option value="2">Semester 2</option>
                <option value="3">Semester 3</option>
                <option value="4">Semester 4</option>
                <option value="5">Semester 5</option>
                <option value="6">Semester 6</option>
                <option value="7">Semester 7</option>
                <option value="8">Semester 8</option>
            </select>

            <select name="jurusan" class="border border-gray-300 rounded p-2 mr-2">
                <option value="">Pilih Jurusan</option>
                <option value="Informatika">Informatika</option>
                <option value="Sistem Informasi">Sistem Informasi</option>
                <!-- Tambahkan jurusan lainnya sesuai kebutuhan -->
            </select>

            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Tampilkan Kelas</button>
        </form>

        <!-- Tampilkan kelas -->
        @foreach ($kelas as $item)
            <div class="bg-white rounded-lg shadow-md p-4 mb-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-lg font-semibold">{{ $item->nama }}</h2>
                        <p class="text-gray-600">
                            Ruang: {{ $item->ruang }} | 
                            Hari: {{ $item->hari }} | 
                            Pukul: {{ date('H:i', strtotime($item->jam_mulai)) }} - {{ date('H:i', strtotime($item->jam_selesai)) }} 
                        </p>
                    </div>
                    <div>
                        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-2">
                            Setuju
                        </button>
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            Tidak
                        </button>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

</body>
</html>
