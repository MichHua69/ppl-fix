<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('title')

</head>

<body class="bg-primary">
    <header class="absolute inset-x-0 top-0 z-50">
        @include ('peternak.navbar')
    </header>
    <section class="h-full">
        <div class="bg-primary pt-20 mt-6 h-full pb-1">
            <div class="px-6 py-10 mx-auto h-full flex justify-center">
                <div class="container bg-secondary rounded-lg shadow-lg min-h-[80vh] p-12 relative">
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded absolute top-0 left-0 alert-message" role="alert" style="position: absolute; width: 100%;">
                            <strong class="font-bold">Berhasil!</strong>
                            <span class="block sm:inline">{{ session('success') }}</span>
                            <span id="close-button" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.697z"/></svg>
                            </span>
                        </div>
                    @endif
                    <div class="py-4 font-semibold text-3xl">Laporan</div>
                    <div class="mx-auto w-full flex gap-4">
                        <div class="relative w-full">
                            <input type="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-md text-gray-900 bg-gray-50 rounded-e-lg border-gray-300 border-1 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                                placeholder="Cari Laporan" required/>
                            <button type="submit"
                                class="absolute top-0 right-0 p-2.5 text-sm font-medium border-gray-300 h-full text-white bg-primary rounded-e-lg border hover:bg-primary-light focus:ring-4 focus:outline-none focus:ring-primary-light dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                                <span class="sr-only">Search</span>
                            </button>
                        </div>
                        @if($user->role->id == 2)
                        <button type="button" class="inline-block rounded rounded-lg text-center py-2 text-xl font-bold uppercase leading-normal text-white shadow-dark-3 transition duration-150 ease-in-out bg-primary hover:bg-primary-light min-w-32"
                        type="button"
                        id="add-profile-button"
                        onclick="window.location='{{route('dokter.tambahlaporan')}}'"
                        data-twe-ripple-init
                        data-twe-ripple-color="light">
                        Tambah
                        </button>
                        @endif
                    </div>
                    @if(isset($latestlaporan))
                        <div class="grid grid-cols-3 gap-6 mt-4 flex">
                            {{-- Hero card --}}
                            <div class="relative flex flex-col gap-2 bg-gray-200 rounded-lg p-4 overflow-hidden max-h shadow-xl col-span-3 row-span-2 hero-card">
                                <div class="font-semibold text-lg text-center h-8 overflow-hidden">{{$latestlaporan->judul_laporan}}</div>
                                <div class="text-sm h-52 overflow-hidden">{!!$latestlaporan->isi_laporan!!}</div>
                                <a class="absolute bottom-0 right-0 m-2 py-1 px-6 bg-white rounded-full shadow-md font-semibold" href="{{ route('peternak.lihatlaporan', ['id' => $latestlaporan->id]) }}">Lihat</a>
                            </div>
                            {{-- laporan biasa --}}
                            @foreach($laporan ?? [] as $laporan)
                                <div class="relative flex flex-col gap-2 bg-gray-200 rounded-lg p-4 overflow-hidden max-h shadow-xl col-span-1 row-span-1 regular-card">
                                    <div class="font-semibold text-lg h-16 overflow-hidden">{{$laporan->judul_laporan}}</div>
                                    <div class="text-sm h-48 overflow-hidden">{!!$laporan->isi_laporan!!}</div>
                                    <a class="absolute bottom-0 right-0 m-2 py-1 px-6 bg-white rounded-full shadow-md font-semibold" href="{{ route('dokter.lihatlaporan', ['id' => $laporan->id]) }}">Lihat</a>
                                </div>
                            @endforeach
                            
                        </div>
                    @else
                        <div class="flex flex-col justify-center mt-16">
                            <div class="w-full flex justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-1/5" fill="none" viewBox="0 0 24 24" id="New-Document-Layer--Streamline-Cyber"><desc>New Document Layer Streamline Icon: https://streamlinehq.com</desc><path stroke="#538D22" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M14.0452 19.1583H1.7739V0.7513H21.2035V12L14.0452 19.1583Z" stroke-width="1"></path><path stroke="#538D22" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M14.0452 19.1583V12H21.2035" stroke-width="1"></path><path stroke="#538D22" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M1.7739 21.2035H16.0904L21.7148 15.5791" stroke-width="1"></path><path stroke="#538D22" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M2.7965 23.2487H17.6244L22.2261 18.647" stroke-width="1"></path></svg>
                            </div>
                            <p class="text-center font-bold text-primary text-3xl mt-4">Tidak Memiliki Laporan.</p>
                            <p class="text-center font-medium text-primary text-md">Tambahkan Laporan Terlebih Dahulu.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const searchInput = document.getElementById('search-dropdown');
            const artikelCards = document.querySelectorAll('.hero-card, .regular-card');
            let firstFlexIndex = -1; // Variabel untuk menyimpan index pertama kali 'flex' ditemukan
    
            searchInput.addEventListener('input', function() {
                const searchText = this.value.toLowerCase();
                const prevFlexIndex = firstFlexIndex; // Simpan indeks sebelumnya
                firstFlexIndex = -1; // Reset indeks saat event input dipicu
    
                artikelCards.forEach((card, index) => {
                    const judul = card.querySelector('.font-semibold').textContent.toLowerCase();
                    const isi = card.querySelector('.text-sm').textContent.toLowerCase();
    
                    if (judul.includes(searchText) || isi.includes(searchText)) {
                        card.style.display = 'flex';
                        if (firstFlexIndex === -1) {
                            firstFlexIndex = index; // Set index pertama kali 'flex' ditemukan
                            card.classList.add('col-span-3');
                        }
    
                    } else {
                        card.style.display = 'none'; 
                    }
    
                    // Hapus class 'col-span-3' dari kartu dengan indeks 'prevFlexIndex' jika berbeda dari 'firstFlexIndex'
                    if (prevFlexIndex !== -1 && prevFlexIndex !== firstFlexIndex && prevFlexIndex === index) {
                        artikelCards[prevFlexIndex].classList.remove('col-span-3');
                    }
                });
            }); 
        });
    </script>
    <script>
        const closeButton = document.getElementById('close-button');
      
        closeButton.addEventListener('click', function() {
          const alertMessage = document.querySelector('.alert-message');
          alertMessage.style.display = 'none';
        });
    </script>
</body>

</html>
