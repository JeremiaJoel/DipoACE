<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Document</title>
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
                <span class="rounded-md px-1 py-2 text-xl font-medium text-white">{{ Auth::user()->email }}</span> 
    
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
                      <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                    </button>
                  </div>
    
    
                  <div x-show="isOpen"
                        x-transition:enter="transition ease-out duration-100 transform"
                        x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75 transform"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-95"
                    class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                    <!-- Active: "bg-gray-100", Not Active: "" -->
                    <a href="logout" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
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
        </div>
      </div>

      <div class="container mx-auto mt-10">
        <div class="bg-white shadow-md rounded-lg">
            <div class="flex border-b">
                <button class="flex-1 py-4 px-6 text-center text-gray-500 hover" onclick="window.location.href='nyusunruangkelas'">ARRANGE CLASSROOM</button>
                <button class="flex-1 py-4 px-6 text-center text-orange-500 border-b-2 border-orange-500">ARRANGE QUOTA CLASS</button>
            </div>
            <div class="p-6">
                <h2 class="text-center text-gray-700 font-medium mb-6">Arrange Quota for informatics student</h2>
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b text-left text-gray-600">Mata Kuliah</th>
                            <th class="py-2 px-4 border-b text-left text-gray-600">Kode MK</th>
                            <th class="py-2 px-4 border-b text-left text-gray-600">Ruang</th>
                            <th class="py-2 px-4 border-b text-left text-gray-600">Kelas</th>
                            <th class="py-2 px-4 border-b text-left text-gray-600">Hari</th>
                            <th class="py-2 px-4 border-b text-left text-gray-600">Kuota Kelas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-2 px-4 border-b">Struktur Data</td>
                            <td class="py-2 px-4 border-b">PAIK0287</td>
                            <td class="py-2 px-4 border-b">E101</td>
                            <td class="py-2 px-4 border-b">A</td>
                            <td class="py-2 px-4 border-b">Senin</td>
                            <td class="py-2 px-4 border-b">50</td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b">Matematika</td>
                            <td class="py-2 px-4 border-b">PAIK0247</td>
                            <td class="py-2 px-4 border-b">E102</td>
                            <td class="py-2 px-4 border-b">B</td>
                            <td class="py-2 px-4 border-b">Selasa</td>
                            <td class="py-2 px-4 border-b">50</td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b">Statistika</td>
                            <td class="py-2 px-4 border-b">PAIK0087</td>
                            <td class="py-2 px-4 border-b">E104</td>
                            <td class="py-2 px-4 border-b">A</td>
                            <td class="py-2 px-4 border-b">Rabu</td>
                            <td class="py-2 px-4 border-b">50</td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b">Aljabar Linier</td>
                            <td class="py-2 px-4 border-b">PAIK9277</td>
                            <td class="py-2 px-4 border-b">E103</td>
                            <td class="py-2 px-4 border-b">A</td>
                            <td class="py-2 px-4 border-b">Kamis</td>
                            <td class="py-2 px-4 border-b">50</td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b">Metode Numerik</td>
                            <td class="py-2 px-4 border-b">PAIK3207</td>
                            <td class="py-2 px-4 border-b">E105</td>
                            <td class="py-2 px-4 border-b">B</td>
                            <td class="py-2 px-4 border-b">Jumat</td>
                            <td class="py-2 px-4 border-b">50</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>
