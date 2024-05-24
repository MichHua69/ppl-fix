<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Konsultasi</title>
</head>

<body class="">
  <header class="absolute inset-x-0 top-0 z-50">
    @include ('dinas.navbar')
  </header>
  <section class="bg-primary h-full" >
    <div class=" pt-20 mt-8 h-full">
      <div class="container px-6 py-10 mx-auto">
        <div class="container bg-white rounded-lg shadow-lg h-full relative p-12">
          <div class="block">
            <h2 class="text-5xl font-bold mb-4 grid grid-row-15 row-span-1">Buat Akun Dokter Hewan</h2>
            <form action="{{route('dinas.buatakun.store')}}" method="post">
              @csrf
              <div class="p-8">
                <div class="flex flex-col mb-4 w-full justify-between ">
                  <label class="basis-3/12 font-semibold text-xl" for="nama">
                      Nama
                  </label>
                  <div class="relative basis-9/12 mt-2"
                      data-twe-input-wrapper-init>
                      <input type="text" name="nama" id="nama"
                          placeholder="Masukkan Nama"
                          class="peer block w-full p-3 pl-4 border border-gray-300 rounded-md shadow-sm focus:outline:none focus:ring-primary focus:border-primary @error('nama') border-red-500 @enderror"
                          value="{{old('nama')}}" autocomplete="nama" />
                      @error('nama')
                      <p class="text-red-500 text-xs italic">{{ $message }}</p>
                      @enderror
                  </div>
                </div>
                <div class="flex flex-col mb-4 w-full justify-between ">
                  <label class="basis-3/12 font-semibold text-xl" for="nama_pengguna">
                      Nama Pengguna
                  </label>
                  <div class="relative basis-9/12 mt-2"
                      data-twe-input-wrapper-init>
                      <input type="text" name="nama_pengguna" id="nama_pengguna"
                          placeholder="Masukkan Nama Pengguna"
                          class="peer block w-full p-3 pl-4 border border-gray-300 rounded-md shadow-sm focus:outline:none focus:ring-primary focus:border-primary @error('nama_pengguna') border-red-500 @enderror"
                          value="{{old('nama_pengguna')}}" autocomplete="nama_pengguna" />
                      @error('nama_pengguna')
                      <p class="text-red-500 text-xs italic">{{ $message }}</p>
                      @enderror
                  </div>
                </div>
                <div class="flex flex-col mb-4 w-full justify-between ">
                  <label class="basis-3/12 font-semibold text-xl" for="email">
                      Email
                  </label>
                  <div class="relative basis-9/12 mt-2"
                      data-twe-input-wrapper-init>
                      <input type="text" name="email" id="email"
                          placeholder="Masukkan Email"
                          class="peer block w-full p-3 pl-4 border border-gray-300 rounded-md shadow-sm focus:outline:none focus:ring-primary focus:border-primary @error('email') border-red-500 @enderror"
                          value="{{old('email')}}" autocomplete="email" />
                      @error('email')
                      <p class="text-red-500 text-xs italic">{{ $message }}</p>
                      @enderror
                  </div>
                </div>
                <div class="flex flex-col mb-4 w-full justify-between ">
                  <label class="basis-3/12 font-semibold text-xl" for="puskeswan">
                      PUSKESWAN
                  </label>
                  <div class="relative basis-9/12 mt-2"
                      data-twe-input-wrapper-init>
                      <select 
                          class="peer block w-full px-1 py-3 pl-4 border border-gray-300 rounded-md shadow-sm focus:outline:none focus:ring-primary focus:border-primary @error('puskeswan') border-red-500 @enderror"
                          name="puskeswan" id="puskeswan">
                          <option selected hidden value="">Pilih PUSKESWAN</option>
                          @foreach ($puskeswan as $item)
                          <option value={{ $item->id }}>{{ $item->puskeswan }}</option>
                          @endforeach
                      </select>
                      @error('puskeswan')
                      <p class="text-red-500 text-xs italic">{{ $message }}</p>
                      @enderror
                  </div>
                </div>
                <div class="flex flex-col mb-4 w-full justify-between ">
                  <label class="basis-3/12 font-semibold text-xl" for="password">
                      Kata Sandi
                  </label>
                  <div class="relative basis-9/12 mt-2"
                      data-twe-input-wrapper-init>
                      <input type="password" name="password" id="password"
                          placeholder="Masukkan Kata Sandi"
                          class="peer block w-full p-3 pl-4 border border-gray-300 rounded-md shadow-sm focus:outline:none focus:ring-primary focus:border-primary @error('password') border-red-500 @enderror"
                          value="" autocomplete="password" />
                      @error('password')
                      <p class="text-red-500 text-xs italic">{{ $message }}</p>
                      @enderror
                  </div>
                </div>
                <div class="flex justify-end">
                  <div class="flex gap-5">
                    <button type="button" class="inline-block w-full rounded rounded-full px-6 py-2 text-xl font-bold uppercase leading-normal text-white shadow-dark-3 transition duration-150 ease-in-out bg-danger hover:bg-primary-light min-w-32"
                    type="button"
                    onclick="window.location='{{route('dinas.akundokter')}}'"
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
    
  </script>
</body>

</html>
