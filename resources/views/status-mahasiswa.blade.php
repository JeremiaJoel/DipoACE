<html>

<head lang="en" class="h-full bg-gray-100">
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="h-full">

    <div class="min-h-full">
        <nav class="bg-gray-800" x-data="{ isOpen: false }">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            {{-- <img class="h-8 w-8" src="../img/logoundip.png" alt="Logo Undip"> --}}

                        </div>
                        <div class="hidden md:block">
                            <div class="flex items-baseline space-x-4">
                                <a class="ml-2 text-2xl font-bold text-white"
                                    href="{{ url('/dashboard-mahasiswa') }}">DipoACE</a>
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6">
                            <span
                                class="mr-2 text-white">{{ \App\Models\mahasiswa::where('email', Auth::user()->email)->first()->nama }}</span>

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
                                        {{-- <img class="h-8 w-8 rounded-full" src="../img/saiful.png" alt="Foto Profile"> --}}
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
                <a class="text-3xl font-bold tracking-tight text-gray-900">STATUS MAHASISWA</a>
            </div>
        </header>

        <main>
            <div class="max-w-full mx-24 mt-10 p-4">
                <h2 class="text-xl font-semibold mb-4">Pilih Status Akademik</h2>
                <div class="bg-gray-100 p-4 rounded-lg mb-6">
                    <div class="mb-4">
                        <p class="text-sm">Anda akan mengikuti kegiatan perkuliahan pada semester ini serta mengisi
                            Isian Rencana Studi (IRS).</p>
                        <div class="flex items-center justify-between">
                            <a class="text-green-600 font-bold">Aktif</a>
                            <div class="flex space-x-2">
                                <button type="button"
                                    onclick="confirmApprove('{{ route('mahasiswa.status', ['id' => Auth::id()]) }}', 'Aktif')"
                                    class="bg-green-500 hover:bg-green-700 text-white px-3 py-1 rounded mr-2">
                                    Ya
                                </button>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p class="text-sm">Menghentikan kuliah sementara untuk semester ini tanpa kehilangan status
                            sebagai mahasiswa Undip.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-red-600 font-bold">Cuti</span>
                            <div class="flex space-x-2">
                                <button type="button"
                                    onclick="confirmApprove('{{ route('mahasiswa.status', ['id' => Auth::id()]) }}', 'Cuti')"
                                    class="bg-green-500 hover:bg-green-700 text-white px-3 py-1 rounded mr-2">
                                    Ya
                                </button>
                            </div>
                        </div>
                    </div>
                    <script>
                        function confirmApprove(url, status) {
                            Swal.fire({
                                title: "Are you sure?",
                                text: `You will be registered as a ${status} student this semester.`,
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
                                            body: JSON.stringify({
                                                status: status
                                            }) // Send the selected status
                                        })
                                        .then(response => response.json())
                                        .then(data => {
                                            if (data.status) {
                                                Swal.fire({
                                                    title: 'Congratulations!',
                                                    text: `You have been set as a ${status} student.`,
                                                    icon: 'success',
                                                    timer: 3000,
                                                    timerProgressBar: true,
                                                    willClose: () => {
                                                        location.reload();
                                                    }
                                                });
                                            } else {
                                                Swal.fire('Error!', data.message || 'There was a problem setting the status.',
                                                    'error');
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
                <p class="text-sm mb-6">Status akademik Anda: <span
                        class="font-semibold">{{ \App\Models\mahasiswa::where('email', Auth::user()->email)->first()->status }}</span>
                </p>
                <p class="text-xs text-gray-600">
                    Informasi lebih lanjut mengenai her-registrasi, atau mekanisme serta pengajuan perpanjangan
                    penundaan dapat ditanyakan melalui Biro Administrasi Akademik (BAA) atau program studi
                    masing-masing.
                </p>
            </div>


        </main>
