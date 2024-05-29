<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
      <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
      <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
      @include('title')
  
</head>

<body class="">
  <header class="absolute inset-x-0 top-0 z-50">
    @include ('dokter.navbar')
  </header>
  <section class="bg-primary h-full" >
    <div class=" pt-20 mt-8 h-full">
      <div class="container px-6 py-10 mx-auto">
        <div class="container bg-white rounded-lg shadow-lg h-full min-h-[75vh] relative p-12 mb-16">
          <div class="block">
            <h2 class="text-5xl font-bold mb-4 grid grid-row-15 row-span-1">Tambah Laporan</h2>
            <form action="{{route('dokter.storetambahlaporan')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="">
                <div class="flex flex-col mb-4 w-full justify-between ">
                  <label class="basis-3/12 font-semibold text-xl" for="judul">
                      Judul
                  </label>
                  <div class="relative basis-9/12 mt-2"
                      data-twe-input-wrapper-init>
                      <input type="text" name="judul" id="judul"
                          placeholder="Masukkan Judul"
                          class="peer block w-full p-3 pl-4 border border-gray-300 rounded-md shadow-sm focus:outline:none focus:ring-primary focus:border-primary @error('judul') border-red-500 @enderror"
                          value="{{old('judul')}}" autocomplete="judul" />
                      @error('judul')
                      <p class="text-red-500 text-xs italic">{{ $message }}</p>
                      @enderror
                  </div>
                </div>
                <div class="flex flex-col mb-4 w-full justify-between ">
                  <label class="basis-3/12 font-semibold text-xl" for="peternak">
                      Peternak
                  </label>
                  <div class="relative basis-9/12 mt-2"
                      data-twe-input-wrapper-init>
                      <select 
                          class="peer block w-full px-1 py-3 pl-4 border border-gray-300 rounded-md shadow-sm focus:outline:none focus:ring-primary focus:border-primary @error('peternak') border-red-500 @enderror"
                          name="peternak" id="peternak">
                          <option selected hidden value="{{old('peternak')}}">Pilih peternak</option>
                          @foreach ($peternak as $item)
                          <option value="{{ $item->id_pengguna }}" {{ old('peternak') == $item->id_pengguna ? 'selected' : '' }}>{{ $item->nama }}</option>
                          @endforeach
                      </select>
                      @error('peternak')
                      <p class="text-red-500 text-xs italic">{{ $message }}</p>
                      @enderror
                  </div>
                </div>

                <div class="flex flex-col mb-4 w-full justify-between">
                  <label class="basis-3/12 font-semibold text-xl" for="bodys">
                    Isi
                  </label>
                  <input id="bodys" type="hidden" name="isi" class="@error('isi') border-red-500 @enderror" value="{{old('isi')}}">
                  <trix-editor input="bodys" class="min-h-96"></trix-editor>
                  @error('isi')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                  @enderror
                </div>
                
                <div class="flex justify-end mt-8">
                  <div class="flex gap-5">
                    <button type="button" class="inline-block w-full rounded rounded-full px-6 py-2 text-xl font-bold uppercase leading-normal text-white shadow-dark-3 transition duration-150 ease-in-out bg-danger hover:bg-primary-light min-w-32"
                    type="button"
                    onclick="window.location='{{route('dokter.laporan')}}'"
                    id="cancel-profile-button"
                    data-twe-ripple-init
                    data-twe-ripple-color="light">
                    Batal
                    </button> 
                    <button type="submit" class="inline-block w-full rounded rounded-full px-6 py-2 text-xl font-bold uppercase leading-normal text-white shadow-dark-3 transition duration-150 ease-in-out bg-primary hover:bg-primary-light min-w-32"
                    type="submit"
                    id="save-profile-button"
                    data-twe-ripple-init
                    data-twe-ripple-color="light">
                    Simpan
                   </button> 
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    
  </section>


  <script>
    const fileInput = document.getElementById('gambar');
    const previewImage = document.getElementById('preview_image');
    const divpreviewImage = document.getElementById('div_preview_image');
    const fileNameElement = document.getElementById('file_name');

    fileInput.addEventListener('change', function() {
        const file = fileInput.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewImage.classList.remove('hidden');
                divpreviewImage.classList.remove('hidden');
                fileNameElement.textContent = file.name; // Menampilkan nama file di samping pilihan gambar
            }
            reader.readAsDataURL(file);
        } else {
            previewImage.src = '';
            previewImage.classList.add('hidden');
            fileNameElement.textContent = '';
        }
    });
  </script>

</body>

</html>
