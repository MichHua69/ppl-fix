<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Konsultasi</title>
</head>

<body class="bg-primary">
    <header class="absolute inset-x-0 top-0 z-50">
        @include ('dokter.navbar')
    </header>
    <section class="h-full">
        <div class="bg-primary pt-20 mt-6 h-full pb-1">
            <div class="px-6 py-10 mx-auto h-full flex justify-center">
                <div class="container bg-secondary rounded-lg shadow-lg min-h-[80vh] p-12 relative">
                    <button onclick="window.location.href='{{route('dokter.informasiprogram')}}'" id="back" class="cursor-pointer flex gap-2 items-center"><svg style="transform: rotate(-90deg);" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14" id="Arrow-Up-1--Streamline-Core" height="24" width="24"><desc>Arrow Up 1 Streamline Icon: https://streamlinehq.com</desc><g id="arrow-up-1--arrow-up-keyboard"><path id="Union" fill="#000000" fill-rule="evenodd" d="M6.64645 0.146447c0.19526 -0.1952625 0.51184 -0.1952625 0.7071 0L10.8536 3.64645c0.143 0.143 0.1857 0.35805 0.1083 0.54489 -0.0774 0.18684 -0.2597 0.30866 -0.4619 0.30866H8V13c0 0.5523 -0.44772 1 -1 1 -0.55229 0 -1 -0.4477 -1 -1V4.5H3.5c-0.20223 0 -0.38455 -0.12182 -0.46194 -0.30866 -0.07739 -0.18684 -0.03461 -0.40189 0.10839 -0.54489l3.5 -3.500003Z" clip-rule="evenodd" stroke-width="1"></path></g></svg> Kembali</button>
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded absolute top-0 left-0 alert-message" role="alert" style="position: absolute; width: 100%;">
                        <strong class="font-bold">Berhasil!</strong>
                        <span class="block sm:inline">{{session('success')}}</span>
                        <span id="close-button" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.697z"/></svg>
                        </span>
                        </div>
                    @endif  
                    <div class="py-4 font-semibold text-3xl text-center">Artikel</div>
                    <div class="mx-auto w-full flex gap-4">
                        <div class="relative w-full">
                            <input type="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-md text-gray-900 bg-gray-50 rounded-e-lg border-gray-300 border-1 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                                placeholder="Cari Artikel" required/>
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
                        <button type="button" class="inline-block rounded rounded-lg text-center py-2 text-xl font-bold uppercase leading-normal text-white shadow-dark-3 transition duration-150 ease-in-out bg-primary hover:bg-primary-light min-w-32"
                        type="button"
                        id="add-profile-button"
                        onclick="window.location='{{route('dokter.tambahartikel')}}'"
                        data-twe-ripple-init
                        data-twe-ripple-color="light">
                        Tambah
                        </button>
                    </div>
                    <div class="grid grid-cols-3 gap-6 mt-4">
                        {{-- Hero card --}}
                        <div class="relative flex flex-col gap-2 bg-gray-200 rounded-lg p-4 overflow-hidden max-h shadow-xl col-span-3 row-span-2 hero-card">
                            @if($latestArticle->gambar)
                                <img class="h-36 object-cover rounded-lg" src="/artikel/{{$latestArticle->gambar}}" alt="">
                            @endif
                            <div class="font-semibold text-lg h-8 overflow-hidden">{{$latestArticle->judul_artikel}}</div>
                            <div class="text-sm h-52 overflow-hidden">{!! $latestArticle->isi_artikel !!}</div>
                            <a class="absolute bottom-0 right-0 m-2 py-1 px-6 bg-white rounded-full shadow-md font-semibold" href="{{ route('dokter.lihatartikel', ['id' => $latestArticle->id]) }}">Lihat</a>
                        </div>
            
                        {{-- Artikel biasa --}}
                        @foreach($artikel as $artikel)
                            <div class="relative flex flex-col gap-2 bg-gray-200 rounded-lg p-4 overflow-hidden max-h shadow-xl col-span-1 row-span-1 regular-card">
                                @if($artikel->gambar)
                                    <img class="h-36 object-cover rounded-lg" src="/artikel/{{$artikel->gambar}}" alt="">                                <div class="font-semibold text-lg h-8 overflow-hidden">{{$artikel->judul_artikel}}</div>
                                    <div class="text-sm h-20 overflow-hidden">{!! $artikel->isi_artikel !!}</div>
                                    <a class="absolute bottom-0 right-0 m-2 py-1 px-6 bg-white rounded-full shadow-md font-semibold" href="{{ route('dokter.lihatartikel', ['id' => $artikel->id]) }}">Lihat</a>
                                @else
                                <div class="font-semibold text-lg h-16 overflow-hidden">{{$artikel->judul_artikel}}</div>
                                <div class="text-sm h-48 overflow-hidden">{!! $artikel->isi_artikel !!}</div>
                                <a class="absolute bottom-0 right-0 m-2 py-1 px-6 bg-white rounded-full shadow-md font-semibold" href="{{ route('dokter.lihatartikel', ['id' => $artikel->id]) }}">Lihat</a>
                                @endif
                            </div>
                        @endforeach
                    </div>
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
