<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <title>Document</title>
</head>

<body class="h-full">
    <div class="min-h-full">
        <nav class="bg-gray-800" x-data="{ isOpen: false }">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img class="h-8 w-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500"
                                alt="Your Company">
                        </div>
                        <a class="ml-2 text-2xl font-bold text-white" href="{{ url('/dashboard-dekan') }}">DipoACE</a>
                        <div class="hidden md:block">
                            {{-- <div class="ml-10 flex items-baseline space-x-4">
                  </div> --}}
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6">
                            <!-- Profile dropdown -->
                            <span
                                class="mr-2 text-white">{{ \App\Models\dosen::where('email', Auth::user()->email)->first()->nama }}</span>
                            <div class="relative ml-3">
                                <div>
                                    <button type="button" @click="isOpen = !isOpen"
                                        class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
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
            <div x-show="isOpen" class="md:hidden" id="mobile-menu">
                <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                </div>
                <div class="border-t border-gray-700 pb-3 pt-4">
                    <div class="flex items-center px-5">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full"
                                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                alt="">
                        </div>
                        <div class="ml-3">
                            <div class="text-sm font-medium leading-none text-gray-400">
                                {{ \App\Models\dosen::where('email', Auth::user()->email)->first()->nama }}</div>
                        </div>
                    </div>
                    <div class="mt-3 space-y-1 px-2">
                        <a href="logout"
                            class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Sign
                            out</a>
                    </div>
                </div>
            </div>
        </nav>

        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">Academic</h1>
            </div>
        </header>
        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <!-- Your content -->
                <div class="container mx-auto mt-5">
                    <div class="row justify-center">
                        <div class="col-sm-6">
                            <div class="card bg-white rounded-lg shadow-md">
                                <div class="flex border-b">
                                    <button
                                        class="flex-1 py-4 px-6 text-center text-gray-500 border-b-2 border-gray-500">Approve
                                        Schedule</button>
                                    <button class="flex-1 py-4 px-6 text-center text-gray-500 hover"
                                        onclick="window.location.href='academic-classpage-dekan'">Approve
                                        Classroom</button>

                                </div>
                                <div class="card-body p-4">
                                    <h4 class="card-title mb-3 text-lg font-bold">Persetujuan Jadwal</h4>
                                    {{-- Form filter --}}
                                    <form action="{{ route('jadwal.filter') }}" method="get"
                                        class="flex flex-wrap justify-center">
                                        @csrf
                                        <div class="w-full md:w-1/2 xl:w-1/3 p-2 ml-0">
                                            <label for="jurusan" class="form-label text-sm">Jurusan</label>
                                            <select name="jurusan"
                                                class="form-select block w-full p-2 pl-10 text-sm text-gray-700 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:border-transparent">
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
                                        <div class="w-full md:w-1/2 xl:w-1/3 p-2 ml-0">
                                            <label for="kelas" class="form-label text-sm">Kelas</label>
                                            <select name="kelas"
                                                class="form-select block w-full p-2 pl-10 text-sm text-gray-700 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:border-transparent">
                                                <option value="">-</option>
                                                <option value="A">Kelas A</option>
                                                <option value="B">Kelas B</option>
                                                <option value="C">Kelas C</option>
                                                <option value="D">Kelas D</option>
                                                <option value="E">Kelas E</option>
                                            </select>
                                        </div>
                                        <div class="flex flex-wrap justify-between w-full p-2 mt-4">
                                            <!-- Tombol Search -->
                                            <button type="submit"
                                                class="btn btn-primary w-60 p-2 text-sm text-white rounded-lg bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                                                Search
                                            </button>
                                        </div>
                                    </form>
                                    <div class="w-full p-2 flex justify-end">
                                        <!-- Tombol Setujui Semua -->
                                        <button type="submit"
                                            class="btn btn-primary w-60 p-2 text-sm text-white rounded-lg bg-green-500 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent">
                                            Setujui Semua
                                        </button>
                                    </div>
                                    @foreach ($jadwal as $item)
                                        <div class="bg-white rounded-lg shadow-md p-4 mb-4">
                                            <div class="flex items-center justify-between">
                                                <div>
                                                    <h2 class="text-lg font-semibold">{{ $item->matakuliah }}</h2>
                                                    <button onclick="openModal('{{ json_encode($item) }}')"
                                                        class="text-blue-500 hover:text-blue-700">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <div id="modalDetail"
                                                        class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden">
                                                        <div class="flex items-center justify-center min-h-screen">
                                                            <div
                                                                class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
                                                                <button onclick="closeModal()"
                                                                    class="text-red-500 float-right">&times;</button>
                                                                <h2 class="text-xl font-bold mb-4">Detail Matakuliah
                                                                </h2>
                                                                <p><strong>Matakuliah:</strong> <span
                                                                        id="modalMatakuliah"></span></p>
                                                                <p><strong>Kelas:</strong> <span
                                                                        id="modalKelas"></span></p>
                                                                <p><strong>Ruang:</strong> <span
                                                                        id="modalRuang"></span></p>
                                                                <p><strong>Waktu:</strong> <span
                                                                        id="modalWaktu"></span></p>
                                                                <p><strong>Pengampu:</strong></p>
                                                                <ul id="modalPengampu" class="list-disc pl-6"></ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p class="text-gray-600">
                                                        Ruang: {{ $item->ruang }} |
                                                        Kelas: {{ $item->kelas }} |
                                                        Semester: {{ $item->semester_aktif }} |
                                                        Waktu: {{ $item->waktu }}
                                                    </p>
                                                </div>

                                                <div>
                                                    <button type="button"
                                                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-2"
                                                        onclick="confirmApprove('{{ route('jadwal.approve', $item->id) }}')">
                                                        Setuju
                                                    </button>
                                                    <script>
                                                        function confirmApprove(url) {
                                                            Swal.fire({
                                                                title: "Are you sure?",
                                                                text: "You won't be able to revert this!",
                                                                icon: "warning",
                                                                showCancelButton: true,
                                                                confirmButtonColor: "#3085d6",
                                                                cancelButtonColor: "#d33",
                                                                confirmButtonText: "Yes, Approve it!"
                                                            }).then((result) => {
                                                                if (result.isConfirmed) {
                                                                    // Send a POST request using Fetch API
                                                                    fetch(url, {
                                                                            method: 'POST',
                                                                            headers: {
                                                                                'Content-Type': 'application/json',
                                                                                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token for security
                                                                            },
                                                                            body: JSON.stringify({}) // You can send additional data if needed
                                                                        })
                                                                        .then(response => {
                                                                            if (response.ok) {
                                                                                Swal.fire({
                                                                                    title: 'Approved!',
                                                                                    text: 'Your approval has been recorded.',
                                                                                    icon: 'success',
                                                                                    timer: 3000, // Alert will stay for 3 seconds
                                                                                    timerProgressBar: true, // Optional: shows a progress bar
                                                                                    willClose: () => {
                                                                                        location.reload();
                                                                                    }
                                                                                });
                                                                            } else {
                                                                                // Handle errors
                                                                                Swal.fire('Error!', 'There was a problem approving the schedule.', 'error');
                                                                            }
                                                                        })
                                                                        .catch(error => {
                                                                            console.error('Error:', error);
                                                                            Swal.fire('Error!', 'There was a problem with your request.', 'error');
                                                                        });
                                                                }
                                                            });
                                                        }
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>
        <script>
            function openModal(data) {
                console.log('Data received:', data); // Debugging
                const mk = JSON.parse(data);

                document.getElementById('modalMatakuliah').textContent = mk.matakuliah;
                document.getElementById('modalKelas').textContent = mk.kelas;
                document.getElementById('modalRuang').textContent = mk.ruang;
                document.getElementById('modalWaktu').textContent = mk.waktu;

                const pengampuList = document.getElementById('modalPengampu');
                pengampuList.innerHTML = '';
                if (mk.pengampu_1) pengampuList.innerHTML += `<li>${mk.pengampu_1}</li>`;
                if (mk.pengampu_2) pengampuList.innerHTML += `<li>${mk.pengampu_2}</li>`;
                if (mk.pengampu_3) pengampuList.innerHTML += `<li>${mk.pengampu_3}</li>`;

                document.getElementById('modalDetail').classList.remove('hidden');
            }

            function closeModal() {
                document.getElementById('modalDetail').classList.add('hidden');
            }
        </script>
    </div>
</body>

</html>
