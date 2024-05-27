<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Konsultasi</title>
</head>

<body>
  <header class="absolute inset-x-0 top-0 z-40">
    @include ('dinas.navbar')
  </header>
  <section class="h-full">
    <div class="bg-primary pt-20 mt-6 h-full pb-1">
      <div class="container px-6 py-10 mx-auto">
        <div class="container bg-secondary rounded-lg shadow-lg overflow-hidden h-full relative p-12">
          @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded absolute top-0 left-0 alert-message" role="alert" style="position: absolute; width: 100%;">
              <strong class="font-bold">Berhasil!</strong>
              <span class="block sm:inline">{{ session('success') }}</span>
              <span id="close-button" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.697z"/></svg>
              </span>
            </div>
          @endif
          <div class="block">
            <h2 class="text-5xl font-bold mb-8 grid grid-row-15 row-span-1">Notifikasi</h2>

            <div class="mx-auto w-full flex gap-4">
              <div class="relative w-full">
                  <input type="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-md text-gray-900 bg-gray-50 rounded-e-lg border-gray-300 border-1 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Cari Notifikasi" required />
                  <button type="submit" class="absolute top-0 right-0 p-2.5 text-sm font-medium border-gray-300 h-full text-white bg-primary rounded-e-lg border hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                      <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                      </svg>
                      <span class="sr-only">Search</span>
                  </button>
              </div>
              <button type="button" class="inline-block rounded rounded-lg text-center py-2 text-xl font-bold uppercase leading-normal text-white shadow-dark-3 transition duration-150 ease-in-out bg-primary hover:bg-primary-light min-w-32"
              type="button"
              id="add-profile-button"
              onclick="window.location='{{route('dinas.tambahnotifikasi')}}'"
              data-twe-ripple-init
              data-twe-ripple-color="light">
              Tambah
              </button>
            </div>
            
            <div class="flex flex-col mt-6">
              <div class="-my-2 overflow-x-auto">
                  <div class="overflow-y-scroll h-[55vh] border border-gray-200 dark:border-gray-700 md:rounded-lg " style="scrollbar-width: none;">
                      <table class="w-full divide-y divide-gray-200 dark:divide-gray-700" >
                          <thead class="bg-gray-50 dark:bg-gray-800" style="position: sticky; top: 0; z-index: 10;">
                              <tr>
                                  <th scope="col" class="py-3.5 px-4 text-lg font-medium text-center w-1/5 p-2">
                                      <span>Judul Notifikasi</span>
                                  </th>
                                  <th scope="col" class="py-3.5 px-4 text-lg font-medium text-center w-2/5 p-2">
                                      <span>Isi Notifikasi</span>
                                  </th>
                              </tr>
                          </thead>
                          <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                            @foreach ($notifikasi as $item)
                                <tr data-id="{{ $item->id }}">
                                  <td class="text-center px-4 judul-column py-4">{{ $item->judul }}</td>
                                  <td class="text-center px-4 isi-column py-4">{{ $item->isi}}</td>
                                </tr>
                            @endforeach      
                          </tbody>
                      </table>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> 

<script>
  const closeButton = document.getElementById('close-button');

  closeButton.addEventListener('click', function() {
    const alertMessage = document.querySelector('.alert-message');
    alertMessage.style.display = 'none';
  });
</script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById('search-dropdown');
    const tableRows = document.querySelectorAll('tbody > tr');

    searchInput.addEventListener('input', function() {
        const searchText = this.value.toLowerCase();

        tableRows.forEach(row => {
            const judul = row.querySelector('.judul-column').textContent.toLowerCase();
            const isi = row.querySelector('.isi-column').textContent.toLowerCase();

            if (judul.includes(searchText) || isi.includes(searchText)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
});
</script>

</body>
</html>
