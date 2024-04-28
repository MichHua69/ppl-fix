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
    <section class="h-full" >
      <div class="bg-primary pt-20 mt-6 h-full pb-1">
        <div class="container px-6 py-10 mx-auto">
          <div class="container bg-secondary rounded-lg shadow-lg overflow-hidden h-[80vh] relative p-12">
            <div class="block">
              <h2 class="text-5xl font-bold mb-8 grid grid-row-15 row-span-1">Data Akun Dokter Hewan</h2>

              <div class="mx-auto w-full">
                <div class="relative w-full">
                    <input type="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-md text-gray-900 bg-gray-50 rounded-e-lg border-gray-300 border-1 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Cari Dokter Hewan" required />
                    <button type="submit" class="absolute top-0 right-0 p-2.5 text-sm font-medium border-gray-300 h-full text-white bg-primary rounded-e-lg border hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </div>
              </div>
            
              <div class="flex flex-col mt-6">
                <div class="-my-2 overflow-x-auto">
                    <div class="overflow-y-scroll h-[50vh] border border-gray-200 dark:border-gray-700 md:rounded-lg">
                        <table class="w-full divide-y divide-gray-200 dark:divide-gray-700 shadow-lg">
                            <thead class="bg-gray-50 dark:bg-gray-800" style="position: sticky; top: 0; z-index: 50;">
                                <tr>
                                    <th scope="col" class="py-3.5 px-4 text-lg font-medium text-center w-1/5 p-2">
                                        <span>Nama</span>
                                    </th>
                                    <th scope="col" class="py-3.5 px-4 text-lg font-medium text-center w-1/5 p-2">
                                        <span>Nama Pengguna</span>
                                    </th>
                                    <th scope="col" class="py-3.5 px-4 text-lg font-medium text-center w-1/5 p-2">
                                        <span>Email</span>
                                    </th>
                                    <th scope="col" class="py-3.5 px-4 text-lg font-medium text-center w-1/5 p-2">
                                        <span>Puskeswan</span>
                                    </th>
                                    <th scope="col" class="py-3.5 px-4 text-lg font-medium text-center w-1/5 p-2">
                                        {{-- <span>Kolom Kelima</span> --}}
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                              @foreach ($aktor as $item)
                                  <tr data-id="{{ $item->id }}">
                                    <td class="text-center px-4 nama-column">{{ $item->nama }}</td>
                                    <td class="text-center px-4 namapengguna-column">{{ $item->pengguna->nama_pengguna}}</td>
                                    <td class="text-center px-4 email-column">{{ $item->pengguna->email }}</td>
                                    <td class="text-center px-4 puskeswan-column">
                                    {{$item->puskeswan->puskeswan}}</td>
                                    <td class="hidden idpuskeswan-column">{{$item->puskeswan->id}}</td>
                                    <td class="py-4 px-4 text-center">
                                      <a class="flex justify-center edit-icon" href="">
                                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14" height="20" width="20" id="Pencil-Square--Streamline-Flex"><desc>Pencil Square Streamline Icon: https://streamlinehq.com</desc><g id="pencil-square--change-document-edit-modify-paper-pencil-write-writing"><path id="Union" fill="#538D22" fill-rule="evenodd" d="M13.3538 0.636811c-0.7796 -0.779685 -2.051 -0.755563 -2.8006 0.053136L7.23975 4.26493c-0.14524 0.15671 -0.25533 0.34263 -0.32289 0.54533l-0.49931 1.49793c-0.26059 0.78175 0.48315 1.52549 1.26491 1.26491l1.49793 -0.49931c0.20269 -0.06757 0.38862 -0.17766 0.54532 -0.3229L13.3007 3.4374c0.8087 -0.74955 0.8328 -2.0209 0.0531 -2.800589ZM6.32294 3.41522c-0.26627 0.28729 -0.4681 0.62814 -0.59197 0.99975L5.23166 5.9129c-0.58632 1.75896 1.08709 3.43237 2.84605 2.84605l1.49793 -0.49931c0.3716 -0.12386 0.71246 -0.32569 0.99976 -0.59197l1.8541 -1.71847c0.1528 -0.1416 0.4009 -0.04516 0.4148 0.16268 0.031 0.46432 0.0505 0.93774 0.0505 1.41713 0 0.24591 -0.0051 0.49026 -0.0143 0.73262 -0.0007 0.01793 0.0007 0.03586 0.0033 0.0536 0.0097 0.06479 0.0132 0.13149 0.0098 0.19943 -0.0423 0.84309 -0.13 1.66474 -0.2168 2.44154 -0.0983 0.8803 -0.5686 1.6453 -1.2409 2.1401 -0.4258 0.32 -0.9389 0.5342 -1.49714 0.5988 -0.83005 0.096 -1.7147 0.1951 -2.62326 0.2361 -0.05819 0.0026 -0.11543 0.0002 -0.17132 -0.0069 -0.01512 -0.0019 -0.03035 -0.0028 -0.04558 -0.0023 -0.19898 0.0066 -0.39925 0.0102 -0.60057 0.0102 -1.21129 0 -2.38493 -0.1307 -3.46576 -0.2558 -1.42003 -0.1642 -2.55383 -1.2952 -2.713017 -2.7203C0.198834 9.87812 0.0762195 8.71301 0.0762195 7.51038c0 -0.24592 0.0051268 -0.49027 0.0143133 -0.73262 0.0006796 -0.01793 -0.0006639 -0.03587 -0.0033237 -0.05361 -0.0097113 -0.06478 -0.0131669 -0.13148 -0.0097583 -0.19943C0.119747 5.68163 0.207458 4.85995 0.294223 4.08321c0.098343 -0.88039 0.568654 -1.64539 1.240957 -2.14018 0.42579 -0.32 0.93884 -0.53413 1.49709 -0.5987 0.83005 -0.09602 1.7147 -0.1952 2.62327 -0.23612 0.05818 -0.00262 0.11543 -0.00022 0.17131 0.00683 0.01512 0.00191 0.03036 0.00286 0.04559 0.00236 0.19898 -0.0066 0.39925 -0.01021 0.60056 -0.01021 0.47188 0 0.93805 0.01984 1.39525 0.05146 0.20746 0.01434 0.30332 0.26205 0.16196 0.41457l-1.70727 1.842Z" clip-rule="evenodd" stroke-width="1"></path></g></svg>
                                        </a>
                                    </td>
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
    <div id="modalTambahData" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50 hidden">
        <div class="bg-white p-8 rounded shadow-lg w-1/3">
            <h3 class="text-lg mb-4 font-bold text-center">Edit Data</h3>
            <form id="formTambah" method="POST">
                <input type="hidden" name="action" value="update">
                <div class="mb-4">
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" id="nama" name="nama"
                        class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="mb-4">
                    <label for="nama_pengguna" class="block text-sm font-medium text-gray-700">Nama Pengguna</label>
                    <input type="text" id="nama_pengguna" name="nama_pengguna"
                        class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email"
                        class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="mb-4">
                    <label for="puskeswan" class="block text-sm font-medium text-gray-700">Puskeswan</label>
                    <select id="selectPuskeswan" name="puskeswan"
                        class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm">
                        <option class="selectOption" selected hidden value="">Pilih Puskeswan</option>
                        @foreach($puskeswan as $item)
                        <option value="{{ $item->id }}">{{ $item->puskeswan }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex items-center justify-end">
                    <button type="button"
                        class="bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600 mr-4"
                        onclick="closeModal()">Batal</button>
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Simpan
                        Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
      // Event listener untuk tombol edit
      document.querySelectorAll('.edit-icon').forEach(item => {
          item.addEventListener('click', event => {
              event.preventDefault();
              const id = item.getAttribute('data-id');

              // Ambil nilai-nilai dari baris tabel yang sesuai dengan tombol edit yang diklik
              const row = item.closest('tr');
              const nama = row.querySelector('.nama-column').innerText;
              const namapengguna = row.querySelector('.namapengguna-column').innerText;
              const email = row.querySelector('.email-column').innerText;
              const puskeswan = row.querySelector('.puskeswan-column').innerText;
              const idpuskeswan = row.querySelector('.idpuskeswan-column').innerText;
              // Simpan nilai-nilai dalam window.selectedData
              window.selectedData = {
                  id,
                  nama,
                  namapengguna,
                  email,
                  puskeswan
              };

              // Isi nilai-nilai ke dalam elemen input pada modal
              document.getElementById('nama').value = nama;
              document.getElementById('nama_pengguna').value = namapengguna;
              document.getElementById('email').value = email;

              // Setelah membersihkan semua opsi, tambahkan opsi "Pilih Puskeswan"
              const selectPuskeswan = document.getElementById('selectPuskeswan');
              selectPuskeswan.innerHTML = ''; // Bersihkan opsi sebelum menambahkan yang baru

              // Buat opsi "Pilih Puskeswan"
              const defaultOption = document.createElement('option');
              defaultOption.text = puskeswan;
              defaultOption.value = idpuskeswan;
              defaultOption.hidden = true;
              selectPuskeswan.appendChild(defaultOption);

              // Tambahkan opsi-opsi baru dari data puskeswan yang Anda miliki
              @foreach($puskeswan as $item)
              const option{{$loop->index}} = document.createElement('option');
              option{{$loop->index}}.value = "{{ $item->id }}";
              option{{$loop->index}}.text = "{{ $item->puskeswan }}";
              selectPuskeswan.appendChild(option{{$loop->index}});
              @endforeach


              const modal = document.getElementById('modalTambahData');
              modal.classList.remove('hidden');
          });
      });

  
      // Fungsi untuk menutup modal
      function closeModal() {
          const modal = document.getElementById('modalTambahData');
          modal.classList.add('hidden');
      }
    </script>
  
    

  </body>

  </html>
