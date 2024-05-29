<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('title')

</head>

<body>
    <header class="absolute inset-x-0 top-0 z-50">
        @include ('peternak.navbar')
    </header>
    <section class="h-full">
        <div class="bg-primary pt-20 mt-6 h-full pb-1">
            <div class="px-6 py-10 mx-auto h-[90vh] flex justify-center">
                <div class="container bg-secondary rounded-lg shadow-lg h-full relative p-12">
                    <div class="">
                        <h2 class="text-5xl font-bold mb-8 grid grid-row-15 row-span-1">Layanan</h2>

                        <div class="mx-auto w-full">
                            <div class="relative w-full">
                                <input type="search" id="search-dropdown"
                                    class="block p-2.5 w-full z-20 text-md text-gray-900 bg-gray-50 rounded-e-lg border-gray-300 border-1 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                                    placeholder="Cari Puskeswan" required />
                                <button type="submit"
                                    class="absolute top-0 right-0 p-2.5 text-sm font-medium border-gray-300 h-full text-white bg-primary rounded-e-lg border hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                    <span class="sr-only">Search</span>
                                </button>
                            </div>
                        </div>
                        <div class="mt-8">
                            <div class="-my-2">
                                <div class="px-4">
                                    <div
                                        class="overflow-y-scroll border-gray-200 dark:border-gray-700 md:rounded-lg max-h-[55vh] grid grid-cols-2 justify-center gap-4 flex-wrap" 
                                        id="table-body" style="scrollbar-width: none;">
                                        @foreach($puskeswan as $puskeswan)
                                        <div class="flex gap-8 items-center justify-center my-4">
                                            <div class="p-4 bg-white shadow-xl rounded-lg">
                                                <img class="w-28" src="/images/layanan.png" alt="">
                                            </div>
                                            <div
                                                class="flex flex-col gap-2 bg-primary p-4 rounded-lg text-secondary text-md shadow-2xl min-w-96 max-w-96">
                                                <span>Nama : {{ $puskeswan->puskeswan}}</span>
                                                <span>Alamat : {{ $puskeswan->alamat->jalan }}, Desa
                                                    {{$puskeswan->alamat->wilayah->kecamatan->kecamatan}}, Kec.
                                                    {{$puskeswan->alamat->wilayah->desa->desa}} </span>
                                                <span>Telepon : {{ $puskeswan->telepon }}</span>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const searchInput = document.getElementById('search-dropdown');
            const tableRows = document.querySelectorAll('#table-body > div');

            searchInput.addEventListener('input', function() {
                const searchText = this.value.toLowerCase();

                tableRows.forEach(row => {
                    const nama = row.querySelector('span:nth-child(1)').textContent.toLowerCase();
                    const alamat = row.querySelector('span:nth-child(2)').textContent.toLowerCase();
                    const telepon = row.querySelector('span:nth-child(3)').textContent.toLowerCase();

                    if (nama.includes(searchText) || alamat.includes(searchText) || telepon.includes(searchText)) {
                        row.style.display = 'flex';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        });
    </script>
</body>

</html>
