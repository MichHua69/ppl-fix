<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
    <style>
        #body .ck-editor__editable {
            min-height: 300px; /* Atur tinggi minimum */
            /* Atau gunakan max-height atau height sesuai kebutuhan */
        }
    </style>
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    <title>Konsultasi</title>
</head>

<body class="">
    <header class="absolute inset-x-0 top-0 z-50">
        @include ('dokter.navbar')
    </header>
    <section class="bg-primary h-full">
        <div class=" pt-20 mt-8 h-full">
            <div class="container px-6 py-10 mx-auto">
                <div class="container bg-white rounded-lg shadow-lg h-full min-h-[75vh] relative p-12 mb-16">
                    <div class="block">
                        <h2 class="text-5xl font-bold mb-4 grid grid-row-15 row-span-1">Edit Artikel</h2>
                        <form action="{{ route('dokter.storeeditartikel', ['id' => $artikel->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="">
                                <div class="flex flex-col mb-4 w-full justify-between ">
                                    <input type="hidden" name="id_pengguna" value="{{$user->id}}">
                                    <label class="basis-3/12 font-semibold text-xl" for="judul">
                                        Judul
                                    </label>
                                    <div class="relative basis-9/12 mt-2" data-twe-input-wrapper-init>
                                        <input type="text" name="judul" id="judul" placeholder="Masukkan Judul"
                                            class="peer block w-full p-3 pl-4 border border-gray-300 rounded-md shadow-sm focus:outline:none focus:ring-primary focus:border-primary @error('judul') border-red-500 @enderror"
                                            value="{{old('judul', $artikel->judul_artikel ?? '')}}" autocomplete="judul" />
                                        @error('judul')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="flex flex-col mb-4 w-full justify-between">
                                    <label class="basis-3/12 font-semibold text-xl" for="gambar">
                                        Gambar
                                    </label>
                                    <div class="my-4 mx-4 overflow-y-scroll w-1/2 h-48">
                                      <img id="preview_image"
                                          class="w-full object-cover object-top rounded-md"
                                          src="{{ asset('artikel/' . $artikel->gambar) }}"
                                          alt="Preview Image">
                                    </div>                    
                                        <div class="peer block w-full p-3 pl-4 border border-gray-300 rounded-md shadow-sm focus:outline:none focus:ring-primary focus:border-primary flex gap-4">
                                          <label for="gambar" class="cursor-pointer flex items-center gap-4">
                                              <input class="hidden" id="gambar" type="file" name="gambar" onchange="updateFileName()">
                                              <span class="py-2 px-4 text-center bg-primary text-white rounded-md cursor-pointer hover:bg-primary-light">
                                                  Pilih Gambar
                                              </span>
                                              <span id="file_name" class="block text-sm mt-1 text-gray-600">
                                                  @if($artikel->gambar)
                                                      {{ $artikel->gambar }}
                                                  @else
                                                      Pilih file gambar
                                                  @endif
                                              </span>
                                          </label>
                                      </div>
                                </div>
                                <div class="flex flex-col mb-4 w-full justify-between">
                                    <label class="basis-3/12 font-semibold text-xl" for="bodys">
                                        Isi
                                    </label>
                                    <input id="bodys" type="hidden" name="isi"
                                        class="@error('isi') border-red-500 @enderror"
                                        value="{{old('isi', $artikel->isi_artikel ?? '')}}">
                                    <trix-editor input="bodys" class="min-h-96"></trix-editor>
                                    @error('isi')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="flex justify-end mt-8">
                                    <div class="flex gap-5">
                                        <button type="button"
                                            class="inline-block w-full rounded rounded-full px-6 py-2 text-xl font-bold uppercase leading-normal text-white shadow-dark-3 transition duration-150 ease-in-out bg-danger hover:bg-primary-light min-w-32"
                                            type="button" onclick="window.location='{{route('dokter.lihatartikel',['id'=>$artikel->id])}}'"
                                            id="cancel-profile-button" data-twe-ripple-init
                                            data-twe-ripple-color="light">
                                            Batal
                                        </button>
                                        <button type="submit"
                                            class="inline-block w-full rounded rounded-full px-6 py-2 text-xl font-bold uppercase leading-normal text-white shadow-dark-3 transition duration-150 ease-in-out bg-primary hover:bg-primary-light min-w-32"
                                            type="submit" id="save-profile-button" data-twe-ripple-init
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
        const fileNameElement = document.getElementById('file_name');

        fileInput.addEventListener('change', function () {
            const file = fileInput.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    previewImage.src = e.target.result;
                    previewImage.classList.remove('hidden');
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
