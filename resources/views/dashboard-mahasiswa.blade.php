<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sidebar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- <script src="./tailwind3.js"></script> -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>

<body class="bg-white  font-[Poppins]">


    <div
        class="sidebar fixed top-0 bottom-0 lg:left-0 left-[-300px]
    p-2 w-[300px] overflow-y-auto text-center bg-black h-screen">
        <div class="text-white text-xl">
            <div class="flex items-center justify-center">
                <img src="https://tecdn.b-cdn.net/img/new/avatars/2.webp" class="w-24 rounded-full justify-center"
                    alt="Avatar" />
            </div>
            <div class="flex items-center justify-center">
                <span class="text-[15px] ml-4 text-gray-200">{{ Auth::user()->email }}</span>
            </div>

            <div>

                <div
                    class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer  hover:bg-orange-900">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5"
                        stroke="currentColor" class="w-7 h-7">
                        <path strokeLinecap="round" strokeLinejoin="round"
                            d="M5.25 4.5L12.75 12l-7.5 7.5M11.25 4.5L18.75 12l-7.5 7.5" />
                    </svg>

                    <span class="text-[15px] ml-1 text-gray-200">Dashboard</span>
                </div>
                <div
                    class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer  hover:bg-orange-900">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5"
                        stroke="currentColor" class="w-7 h-7">
                        <path strokeLinecap="round" strokeLinejoin="round"
                            d="M5.25 4.5L12.75 12l-7.5 7.5M11.25 4.5L18.75 12l-7.5 7.5" />
                    </svg>
                    <span class="text-[15px] ml-1 text-gray-200">Jadwal Mengajar</span>
                </div>
                <div
                    class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer  hover:bg-orange-900">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5"
                        stroke="currentColor" class="w-7 h-7">
                        <path strokeLinecap="round" strokeLinejoin="round"
                            d="M5.25 4.5L12.75 12l-7.5 7.5M11.25 4.5L18.75 12l-7.5 7.5" />
                    </svg>
                    <span class="text-[15px] ml-1 text-gray-200">Perwalian</span>
                </div>
                <div
                    class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer  hover:bg-orange-900">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5"
                        stroke="currentColor" class="w-7 h-7">
                        <path strokeLinecap="round" strokeLinejoin="round"
                            d="M5.25 4.5L12.75 12l-7.5 7.5M11.25 4.5L18.75 12l-7.5 7.5" />
                    </svg>
                    <span class="text-[15px] ml-1 text-gray-200">Bimbingan</span>
                </div>
                <div
                    class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer  hover:bg-orange-900">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H2.25" />
                    </svg>

                    <a href="logout" class="text-[15px] ml-1 text-gray-200">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <div class="flex-1 font-[Poppins] relative">
        <<hr class="my-5 border-t-2 border-black relative" style="top: 60px">
            <div class="flex relative">
                <div class="absolute left-[320px] top-[-60px]"> <!-- Menggunakan posisi absolut -->
                    <img src="img/logoundip.jpeg" alt="logo undip" class="w-23 h-20 object-contain">
                </div>
            </div>
            <!-- INI BUAT JUDUL DIATAS GARIS DASHBOARD-->
            <span class="absolute text-4xl font-bold text-black size-10" style="top: 30px; left: 420px;">DipoACE</span>
            <span class="absolute text-4xl font-bold text-black size-10"style="top: 30px; left: 80%">DASHBOARD</span>
    </div>
    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <div class="flex justify-center mt-4">
                <div class="bg-slate-400 p-10 rounded-lg shadow-md flex items-center space-x-4">
                    <img alt="Profile Picture" class="h-32 w-24 rounded-lg" height="100"
                        src="../img/icong.jpg" width="100" />
                    <div>
                        <h2 class="text-xl font-bold">Asep Komarudin</h2>
                        <p>24060122140160 | Informatika S1</p>
                        <p>Faculty Of Science and Mathematics</p>
                        <p>Dosen Wali : Bambang Pacul | NIP : 24636475474767311</p>
                        <div class="flex items-center space-x-4 mt-2">
                            <div class="flex items-center space-x-2">
                                <span class="font-bold">Status Akademik</span>
                                <span class="bg-green-500 text-white px-2 py-1 rounded-full">Aktif</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="font-bold">Semester Akademik :</span>
                                <span>2024/2025</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="font-bold">Semester Studi :</span>
                                <span>5</span>
                            </div>
                            <div class="flex items-center space-x-2"></div>
                            <span class="font-bold">IPK :</span>
                            <span>3.67</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-center mt-8 space-x-8">
                <div
                    class="bg-white p-4 rounded-lg shadow-md flex flex-col items-center space-y-2 hover:cursor-pointer hover:text-slate-400">
                    <i class="fas fa-clipboard-list text-4xl"></i>
                    <a href="{{ url('/academic-classpage-dekan') }}">Academic</a>
                </div>
                <div
                    class="bg-white p-4 rounded-lg shadow-md flex flex-col items-center space-y-2 hover:cursor-pointer hover:text-slate-400">
                    <i class="fas fa-calendar-alt text-4xl"></i>
                    <a href="#">Academic Calander</a>
                </div>
                <div
                    class="bg-white p-4 rounded-lg shadow-md flex flex-col items-center space-y-2 hover:cursor-pointer hover:text-slate-400">
                    <i class="fas fa-globe text-4xl"></i>
                    <a href="#">Online Courses</a>
                </div>
                <div
                    class="bg-white p-4 rounded-lg shadow-md flex flex-col items-center space-y-2 hover:cursor-pointer hover:text-slate-400">
                    <i class="fas fa-bell text-4xl"></i>
                    <a href="#">Notification</a>
                </div>
            </div>
        </div>
    </main>
    
<?php

// echo"Halo, Welcome di halaman mahasiswa";
//         echo"<h1>".Auth::user()->email."<h1>";
//         // return view('dashboard');
//         echo "<a href='logout'> Logout </a>";