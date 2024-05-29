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
        <div class="container bg-white rounded-lg shadow-lg h-full min-h-[80vh] relative p-12 mb-8">
          <div class="block">
            <h2 class="text-5xl font-bold mb-4 grid grid-row-15 row-span-1">Tambah PUSKESWAN</h2>
            <form action="{{route('dinas.storetambahlayanan')}}" method="post">
              @csrf
              <div class="py-8">
                <div class="flex flex-col mb-4 w-full justify-between ">
                  <label class="basis-3/12 font-semibold text-xl" for="puskeswan">
                      Nama PUSKESWAN
                  </label>
                  <div class="relative basis-9/12 mt-2"
                      data-twe-input-wrapper-init>
                      <input type="text" name="puskeswan" id="puskeswan"
                          placeholder="Masukkan Nama PUSKESWAN"
                          class="peer block w-full p-3 pl-4 border border-gray-300 rounded-md shadow-sm focus:outline:none focus:ring-primary focus:border-primary @error('puskeswan') border-red-500 @enderror"
                          value="{{old('puskeswan')}}" autocomplete="puskeswan"/>
                      @error('puskeswan')
                      <p class="text-red-500 text-xs italic">{{ $message }}</p>
                      @enderror
                  </div>
                </div>
                <div class="flex flex-col mb-4 w-full justify-between ">
                  <label class="basis-3/12 font-semibold text-xl" for="Jalan">
                      Jalan
                  </label>
                  <div class="relative basis-9/12 mt-2"
                      data-twe-input-wrapper-init>
                      <input type="text" name="Jalan" id="Jalan"
                          placeholder="Masukkan Jalan"
                          class="peer block w-full p-3 pl-4 border border-gray-300 rounded-md shadow-sm focus:outline:none focus:ring-primary focus:border-primary @error('Jalan') border-red-500 @enderror"
                          value="{{old('Jalan')}}" autocomplete="Jalan" />
                      @error('Jalan')
                      <p class="text-red-500 text-xs italic">{{ $message }}</p>
                      @enderror
                  </div>
                </div>
                <div class="flex flex-col mb-4 w-full justify-between ">
                  <label class="basis-3/12 font-semibold text-xl" for="kecamatan">
                      Kecamatan
                  </label>
                  <div class="relative basis-9/12 mt-2"
                      data-twe-input-wrapper-init>
                      <select 
                          class="peer block w-full px-1 py-3 pl-4 border border-gray-300 rounded-md shadow-sm focus:outline:none focus:ring-primary focus:border-primary @error('kecamatan') border-red-500 @enderror"
                          name="kecamatan" id="kecamatan">
                          <option selected hidden value="">Pilih Kecamatan</option>
                          @foreach ($kecamatan as $item)
                          <option value="{{ $item->id }}" {{ old('kecamatan') == $item->id ? 'selected' : '' }}>{{ $item->kecamatan }}</option>
                          @endforeach
                      </select>
                      {{-- <select
                          class="peer block w-full px-1 py-3 pl-4 border border-gray-300 rounded-md shadow-sm focus:outline:none focus:ring-primary focus:border-primary @error('kecamatan') border-red-500 @enderror"
                          name="kecamatan" id="kecamatan">
                          <option selected disabled hidden>Kecamatan</option>
                          @foreach ($kecamatan as $item)
                          <option value="{{ $item->id }}">{{ $item->kecamatan }}</option>
                          @endforeach
                      </select> --}}
                      @error('kecamatan')
                      <p class="text-red-500 text-xs italic">{{ $message }}</p>
                      @enderror
                  </div>
                </div>
                <div class="flex flex-col mb-4 w-full justify-between ">
                  <label class="basis-3/12 font-semibold text-xl" for="desa">
                      Desa
                  </label>
                  <div class="relative basis-9/12 mt-2"
                      data-twe-input-wrapper-init>
                      <select 
                          class="peer block w-full px-1 py-3 pl-4 border border-gray-300 rounded-md shadow-sm focus:outline:none focus:ring-primary focus:border-primary @error('desa') border-red-500 @enderror"
                          name="desa" id="desa">
                          <option selected hidden value="">Pilih Desa</option>
                          @foreach ($desa as $item)
                          <option value="{{ $item->id }}" {{ old('desa') == $item->id ? 'selected' : '' }}>{{ $item->desa }}</option>
                          @endforeach
                      </select>
                      {{-- <select
                        class="peer block w-full px-1 py-3 pl-4 border border-gray-300 rounded-md shadow-sm focus:outline:none focus:ring-primary focus:border-primary @error('desa') border-red-500 @enderror"
                        name="desa" id="desa">
                        <option selected disabled hidden>Desa</option>
                        @foreach ($desa as $item)
                            <option value="{{ $item->id }}">{{ $item->desa }}</option>
                        @endforeach
                    </select> --}}
                      @error('desa')
                      <p class="text-red-500 text-xs italic">{{ $message }}</p>
                      @enderror
                  </div>
                </div>
                <div class="flex flex-col mb-4 w-full justify-between ">
                  <label class="basis-3/12 font-semibold text-xl" for="telepon">
                      No. Telepon 
                  </label>
                  <div class="relative basis-9/12 mt-2"
                      data-twe-input-wrapper-init>
                      <input type="text" name="telepon" id="telepon"
                          placeholder="Masukkan telepon"
                          class="peer block w-full p-3 pl-4 border border-gray-300 rounded-md shadow-sm focus:outline:none focus:ring-primary focus:border-primary @error('telepon') border-red-500 @enderror"
                          value="{{old('telepon')}}" autocomplete="telepon" />
                      @error('telepon')
                      <p class="text-red-500 text-xs italic">{{ $message }}</p>
                      @enderror
                  </div>
                </div>

                <div class="flex justify-end">
                  <div class="flex gap-5">
                    <button type="button" class="inline-block w-full rounded rounded-full px-6 py-2 text-xl font-bold uppercase leading-normal text-white shadow-dark-3 transition duration-150 ease-in-out bg-danger hover:bg-primary-light min-w-32"
                    type="button"
                    onclick="window.location='{{route('dinas.layanan')}}'"
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script>
      $(document).ready(function() {
          $('#kecamatan').on('change', function() {
              var kecamatanId = $(this).val();
              if (kecamatanId) {
                  $.ajax({
                      url: '{{ route("get.desa.by.kecamatan") }}',
                      type: 'GET',
                      data: {
                          id_kecamatan: kecamatanId
                      },
                      dataType: 'json',
                      success: function(data) {
                          $('#desa').empty();
                          $.each(data, function(key, value) {
                              $('#desa').append('<option value="' + key + '">' + value + '</option>');
                          });
                      }
                  });
              } else {
                  $('#desa').empty();
              }
          });
      });
  </script>

</body>

</html>
