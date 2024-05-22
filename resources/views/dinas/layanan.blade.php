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
            <h2 class="text-5xl font-bold mb-8 grid grid-row-15 row-span-1">Data Layanan</h2>

            <div class="mx-auto w-full flex gap-4">
              <div class="relative w-full">
                  <input type="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-md text-gray-900 bg-gray-50 rounded-e-lg border-gray-300 border-1 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Cari Dokter Hewan" required />
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
              onclick="window.location='{{route('dinas.tambahlayanan')}}'"
              data-twe-ripple-init
              data-twe-ripple-color="light">
              Tambah
              </button>
            </div>
            
            <div class="flex flex-col mt-6">
              <div class="-my-2 overflow-x-auto">
                  <div class="overflow-y-scroll h-[55vh] border border-gray-200 dark:border-gray-700 md:rounded-lg ">
                      <table class="w-full divide-y divide-gray-200 dark:divide-gray-700 ">
                          <thead class="bg-gray-50 dark:bg-gray-800" style="position: sticky; top: 0; z-index: 50;">
                              <tr>
                                  <th scope="col" class="py-3.5 px-4 text-lg font-medium text-center w-1/5 p-2">
                                      <span>Nama PUSKESWAN</span>
                                  </th>
                                  <th scope="col" class="py-3.5 px-4 text-lg font-medium text-center w-2/5 p-2">
                                      <span>Alamat</span>
                                  </th>
                                  <th scope="col" class="py-3.5 px-4 text-lg font-medium text-center w-1/5 p-2">
                                      <span>Telepon</span>
                                  </th>
                                  <th scope="col" class="py-3.5 px-4 text-lg font-medium text-center w-1/5 p-2">
                                      {{-- <span>Kolom Kelima</span> --}}
                                  </th>
                              </tr>
                          </thead>
                          <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                            @foreach ($puskeswan as $item)
                                <tr data-id="{{ $item->id }}">
                                  <td class="text-center px-4 puskeswan-column">{{ $item->puskeswan }}</td>
                                  <td class="text-center px-4 alamat-column">{{ $item->alamat->jalan}}, {{$item->alamat->dusun}}, {{$item->alamat->wilayah->desa->desa}}, Kec. {{$item->alamat->wilayah->kecamatan->kecamatan}}</td>
                                  <td class="text-center px-4 telepon-column">{{ $item->telepon}}</td>
                                  <td class="py-4 px-4 text-center flex justify-center items-center gap-4">
                                    <a class="flex justify-center edit-icon" onclick="openEditModal({{ $item->id }}, '{{ $item->puskeswan }}', '{{ $item->alamat->jalan }}', '{{ $item->alamat->wilayah->kecamatan->id }}', '{{ $item->alamat->wilayah->desa->id }}', '{{ $item->alamat->dusun }}', '{{ $item->telepon }}')" href="javascript:void(0);">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14" height="24" width="24" id="Pencil-Square--Streamline-Flex"><desc>Pencil Square Streamline Icon: https://streamlinehq.com</desc><g id="pencil-square--change-document-edit-modify-paper-pencil-write-writing"><path id="Union" fill="#538D22" fill-rule="evenodd" d="M13.3538 0.636811c-0.7796 -0.779685 -2.051 -0.755563 -2.8006 0.053136L7.23975 4.26493c-0.14524 0.15671 -0.25533 0.34263 -0.32289 0.54533l-0.49931 1.49793c-0.26059 0.78175 0.48315 1.52549 1.26491 1.26491l1.49793 -0.49931c0.20269 -0.06757 0.38862 -0.17766 0.54532 -0.3229L13.3007 3.4374c0.8087 -0.74955 0.8328 -2.0209 0.0531 -2.800589ZM6.32294 3.41522c-0.26627 0.28729 -0.4681 0.62814 -0.59197 0.99975L5.23166 5.9129c-0.58632 1.75896 1.08709 3.43237 2.84605 2.84605l1.49793 -0.49931c0.3716 -0.12386 0.71246 -0.32569 0.99976 -0.59197l1.8541 -1.71847c0.1528 -0.1416 0.4009 -0.04516 0.4148 0.16268 0.031 0.46432 0.0505 0.93774 0.0505 1.41713 0 0.24591 -0.0051 0.49026 -0.0143 0.73262 -0.0007 0.01793 0.0007 0.03586 0.0033 0.0536 0.0097 0.06479 0.0132 0.13149 0.0098 0.19943 -0.0423 0.84309 -0.13 1.66474 -0.2168 2.44154 -0.0983 0.8803 -0.5686 1.6453 -1.2409 2.1401 -0.4258 0.32 -0.9389 0.5342 -1.49714 0.5988 -0.83005 0.096 -1.7147 0.1951 -2.62326 0.2361 -0.05819 0.0026 -0.11543 0.0002 -0.17132 -0.0069 -0.01512 -0.0019 -0.03035 -0.0028 -0.04558 -0.0023 -0.19898 0.0066 -0.39925 0.0102 -0.60057 0.0102 -1.21129 0 -2.38493 -0.1307 -3.46576 -0.2558 -1.42003 -0.1642 -2.55383 -1.2952 -2.713017 -2.7203C0.198834 9.87812 0.0762195 8.71301 0.0762195 7.51038c0 -0.24592 0.0051268 -0.49027 0.0143133 -0.73262 0.0006796 -0.01793 -0.0006639 -0.03587 -0.0033237 -0.05361 -0.0097113 -0.06478 -0.0131669 -0.13148 -0.0097583 -0.19943C0.119747 5.68163 0.207458 4.85995 0.294223 4.08321c0.098343 -0.88039 0.568654 -1.64539 1.240957 -2.14018 0.42579 -0.32 0.93884 -0.53413 1.49709 -0.5987 0.83005 -0.09602 1.7147 -0.1952 2.62327 -0.23612 0.05818 -0.00262 0.11543 -0.00022 0.17131 0.00683 0.01512 0.00191 0.03036 0.00286 0.04559 0.00236 0.19898 -0.0066 0.39925 -0.01021 0.60056 -0.01021 0.47188 0 0.93805 0.01984 1.39525 0.05146 0.20746 0.01434 0.30332 0.26205 0.16196 0.41457l-1.70727 1.842Z" clip-rule="evenodd" stroke-width="1"></path></g></svg>
                                      </a>
                                      <a class="remove-icon" onclick="openRemoveModal('{{ $item->id }}', '{{ $item->puskeswan }}')" href="javascript:void(0);">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 48 48" height="24" width="24" id="Recycle-Bin-1--Streamline-Plump"><desc>Recycle Bin 1 Streamline Icon: https://streamlinehq.com</desc><g id="recycle-bin-1--remove-delete-empty-bin-trash-garbage"><path id="Union" fill="#FF204E" fill-rule="evenodd" d="M5.97 12.386a2.928 2.928 0 0 1 -0.522 -2.793 9.75 9.75 0 0 1 0.482 -1.21c0.67 -1.4 2.09 -2.036 3.424 -2.098 1.487 -0.07 3.941 -0.162 7.35 -0.223l0.258 -1.032A4 4 0 0 1 20.842 2h6.316a4 4 0 0 1 3.88 3.03l0.258 1.032c3.41 0.06 5.864 0.154 7.35 0.223 1.333 0.062 2.754 0.697 3.423 2.097 0.17 0.353 0.338 0.76 0.484 1.212a2.927 2.927 0 0 1 -0.523 2.792c-0.591 0.726 -1.499 1.18 -2.489 1.246 -2.541 0.17 -7.27 0.368 -15.54 0.368s-13 -0.197 -15.541 -0.368c-0.99 -0.066 -1.898 -0.52 -2.49 -1.246Zm33.532 4.519a1.5 1.5 0 0 1 0.415 1.171c-1.144 13.285 -1.98 19.974 -2.421 23.013 -0.258 1.775 -1.311 3.574 -3.343 4.213 -1.892 0.595 -5.061 1.198 -10.154 1.198 -5.092 0 -8.261 -0.603 -10.153 -1.198 -2.032 -0.639 -3.085 -2.438 -3.343 -4.213 -0.441 -3.039 -1.277 -9.727 -2.421 -23.011a1.5 1.5 0 0 1 1.571 -1.627c3.22 0.166 7.837 0.3 14.327 0.3 6.516 0 11.143 -0.135 14.366 -0.302a1.5 1.5 0 0 1 1.156 0.456Z" clip-rule="evenodd" stroke-width="1"></path></g></svg>
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
  <div id="modaleditdata" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50 hidden">
    <div class="bg-white p-8 rounded shadow-lg w-1/3">
        <h3 class="text-lg mb-4 font-bold text-center">Edit Data</h3>
        <form id="formTambah" action="{{route('dinas.editlayanan')}}" method="POST">
          @csrf
            <input type="text" class="hidden" name="id" value="">
            <div class="mb-4">
                <label for="puskeswan" class="block text-sm font-medium text-gray-700">Nama PUSKESWAN</label>
                <input type="text" id="puskeswan" name="puskeswan"
                    class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm @error('puskeswan') border-red-500 @enderror" value="{{old('puskeswan')}}">
                @error('puskeswan')
                <p class="text-red-500 text-xs italic error-message">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="Jalan" class="block text-sm font-medium text-gray-700">Jalan</label>
                <input type="text" id="Jalan" name="Jalan" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm @error('Jalan') border-red-500 @enderror" value="{{old('Jalan')}}">
                @error('Jalan')
                <p class="text-red-500 text-xs italic error-message">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="kecamatan" class="block text-sm font-medium text-gray-700">Kecamatan</label>
                <select id="selectkecamatan" name="kecamatan"
                    class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm @error('kecamatan') border-red-500 @enderror">
                    <option class="selectOption" selected hidden value="">Pilih kecamatan</option>
                    @foreach($kecamatan as $item)
                    <option value="{{ $item->id }}">{{ $item->kecamatan }}</option>
                    @endforeach
                </select>
                @error('kecamatan')
                <p class="text-red-500 text-xs italic error-message">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="desa" class="block text-sm font-medium text-gray-700">Desa</label>
                <select id="selectdesa" name="desa"
                    class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm @error('desa') border-red-500 @enderror">
                    <option class="selectOption" selected hidden value="">Pilih Desa</option>
                    @foreach($desa as $item)
                    <option value="{{ $item->id }}">{{ $item->desa }}</option>
                    @endforeach
                </select>
                @error('desa')
                <p class="text-red-500 text-xs italic error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="dusun" class="block text-sm font-medium text-gray-700">Dusun</label>
                <input type="dusun" id="dusun" name="dusun" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm error-message @error('dusun') border-red-500 @enderror" value="{{old('dusun')}}">
                @error('dusun')
                <p class="text-red-500 text-xs italic error-message">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="telepon" class="block text-sm font-medium text-gray-700">Telepon</label>
                <input type="telepon" id="telepon" name="telepon" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm error-message @error('telepon') border-red-500 @enderror" value="{{old('telepon')}}">
                @error('telepon')
                <p class="text-red-500 text-xs italic error-message">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="flex items-center justify-end">
                <button type="button"
                    class="bg-danger text-white py-2 px-4 rounded hover:bg-primary-light mr-4 " id="batalEditData"
                    onclick="closeModal()">Batal</button>
                <button type="submit" class="bg-primary text-white py-2 px-4 rounded hover:bg-primary-light">Simpan</button>
            </div>
        </form>
    </div>
  </div>
<div id="modalremove" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50 hidden">
    <div class="bg-white p-8 rounded shadow-lg w-1/3">
        <h3 class="text-lg mb-4 font-bold text-center">Hapus Akun</h3>
        <form id="formremove" action="{{route('dinas.removelayanan')}}" method="POST">
            @csrf
            <input type="text" class="hidden" name="id" value="">
            <p class="m-4 text-center " id="text-remove">Apa anda yakin menghapus PUSKESWAN?</p>
            <div class="flex items-center justify-center">
                <button type="button"
                    class="bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-700 mr-4" id="batalRemove"
                    onclick="closeModal()">Batal</button>
                <button type="submit" class="bg-danger text-white py-2 px-4 rounded hover:bg-red-700">Hapus</button>
            </div>
        </form>
    </div>
</div>
@if ($errors->any() && session('error_modal') === 'modaleditdata')
          <script>
              // Tampilkan modal edit data jika terjadi kesalahan validasi pada modal edit data
              document.getElementById('modaleditdata').classList.remove('hidden');
          </script>
      @endif
      @if ($errors->any() && session('error_modal') === 'modalresetpassword')
          <script>
              // Tampilkan modal reset password jika terjadi kesalahan validasi pada modal reset password
              document.getElementById('modalresetpassword').classList.remove('hidden');
          </script>
      @endif
      @if ($errors->any() && session('error_modal') === 'modalremove')
          <script>
              // Tampilkan modal remove jika terjadi kesalahan validasi pada modal remove
              document.getElementById('modalremove').classList.remove('hidden');
          </script>
      @endif
<script>
  // Fungsi untuk membuka modal edit data
  function openEditModal(id, puskeswan, jalan, kecamatan, desa, dusun, telepon) {
      document.getElementById("modaleditdata").classList.remove("hidden");
      document.querySelector("#modaleditdata [name='id']").value = id;
      document.querySelector("#modaleditdata [name='puskeswan']").value = puskeswan;
      document.querySelector("#modaleditdata [name='Jalan']").value = jalan;
      document.querySelector("#modaleditdata [name='kecamatan']").value = kecamatan;
      document.querySelector("#modaleditdata [name='desa']").value = desa;
      document.querySelector("#modaleditdata [name='dusun']").value = dusun;
      document.querySelector("#modaleditdata [name='telepon']").value = telepon;
  }

  // Fungsi untuk menutup modal
  function closeModal() {
      document.getElementById("modaleditdata").classList.add("hidden");
      document.getElementById("modalremove").classList.add("hidden");
  }

  // Fungsi untuk membuka modal konfirmasi penghapusan akun
  function openRemoveModal(id, nama) {
    document.getElementById("modalremove").classList.remove("hidden");
    document.querySelector("#modalremove [name='id']").value = id;
    document.getElementById('text-remove').innerText = 'Apa anda yakin ingin menghapus PUSKESWAN ' + nama + '?';
  }


  // Event listener untuk tombol batal pada modal edit data
  document.getElementById("batalEditData").addEventListener("click", function() {
      closeModal();
  });

  // Event listener untuk tombol batal pada modal konfirmasi penghapusan akun
  document.getElementById("batalRemove").addEventListener("click", function() {
      closeModal();
  });
  

</script>  
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
            const nama = row.querySelector('.puskeswan-column').textContent.toLowerCase();
            const alamat = row.querySelector('.alamat-column').textContent.toLowerCase();
            const telepon = row.querySelector('.telepon-column').textContent.toLowerCase();

            if (nama.includes(searchText) || alamat.includes(searchText) || telepon.includes(searchText)) {
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
