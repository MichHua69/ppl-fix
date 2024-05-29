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
      @include('title')
    
</head>

<body class="">
  <header class="absolute inset-x-0 top-0 z-50">
    @include ('dinas.navbar')
  </header>
  <section class="bg-primary h-full" >
    <div class=" pt-20 mt-8 h-full">
      <div class="container px-6 py-10 mx-auto">
        <div class="container bg-white rounded-lg shadow-lg h-full min-h-[75vh] relative p-12 mb-16">
          <div class="block">
            <h2 class="text-5xl font-bold mb-4 grid grid-row-15 row-span-1">Tambah Program</h2>
            <form action="{{route('dinas.storetambahprogram')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="">
                <div class="flex flex-col mb-4 w-full justify-between ">
                  <label class="basis-3/12 font-semibold text-xl" for="nama">
                      Nama Program
                  </label>
                  <div class="relative basis-9/12 mt-2"
                      data-twe-input-wrapper-init>
                      <input type="text" name="nama" id="nama"
                          placeholder="Masukkan Nama Program"
                          class="peer block w-full p-3 pl-4 border border-gray-300 rounded-md shadow-sm focus:outline:none focus:ring-primary focus:border-primary @error('nama') border-red-500 @enderror"
                          value="{{old('nama')}}" autocomplete="nama" />
                      @error('nama')
                      <p class="text-red-500 text-xs italic">{{ $message }}</p>
                      @enderror
                  </div>
                </div>
                <div class="flex flex-col mb-4 w-full justify-between">
                  <label class="basis-3/12 font-semibold text-xl" for="deskripsi">
                    Deskripsi
                  </label>
                  <input id="bodys" type="hidden" name="deskripsi" class="@error('deskripsi') border-red-500 @enderror" value="{{old('deskripsi')}}">
                  <trix-editor input="bodys" class="min-h-96" placeholder="Masukkan Deskripsi Program"></trix-editor>
                  @error('deskripsi')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                  @enderror
                </div>
                <div class="flex flex-col mb-4 w-full justify-between ">
                  <div class="relative flex basis-9/12 mt-2 justify-between items-center" data-twe-input-wrapper-init>
                    <label class="basis-3/12 font-semibold text-xl flex items-center" for="judul">
                        Jadwal
                    </label>
                    <button type="button" class="inline-block rounded rounded-lg text-center py-2 text-xl font-bold uppercase leading-normal text-white shadow-dark-3 transition duration-150 ease-in-out bg-primary hover:bg-primary-light min-w-32"
                    type="button" id="add-button" onclick="" data-twe-ripple-init data-twe-ripple-color="light">
                      Tambah
                    </button>
                  </div>
                  <input type="text" class="hidden" id="numTbodies" name="numTbodies" value="{{ session('numTbodies', 0) }}">
                  <div class="relative basis-9/12 mt-2" data-twe-input-wrapper-init>
                    <div class="relative basis-9/12 mt-2" data-twe-input-wrapper-init>
                      <table id="jadwal_table" class="w-full border-collapse">
                          <thead>
                              <tr>
                                  <th class="border border-gray-300 px-4 py-2">Sesi</th>
                                  <th class="border border-gray-300 px-4 py-2">Tanggal</th>
                                  <th class="border border-gray-300 px-4 py-2">Waktu Mulai</th>
                                  <th class="border border-gray-300 px-4 py-2">Waktu Selesai</th>
                                  <th class="border border-gray-300 px-4 py-2">Puskeswan</th>
                                  <th class="border border-gray-300 px-4 py-2"></th>
                              </tr>
                          </thead>
                          <tbody id="jadwal_body">
                            <!-- Isi jadwal akan ditambahkan di sini -->
                            @for ($i = 0; $i < session('numTbodies', 0); $i++)
                              <tr>
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="text" name="sesi[]" class="w-full border rounded-md px-2 py-1 @error('sesi.'.$i) border-red-500 @enderror" placeholder="Masukkan Nama Sesi" value="{{ old('sesi.'.$i) }}">
                                    @error('sesi.'.$i)
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="date" name="tanggal[]" class="w-full border rounded-md px-2 py-1 @error('tanggal.'.$i) border-red-500 @enderror" value="{{ old('tanggal.'.$i) }}">
                                    @error('tanggal.'.$i)
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="time" name="waktu_mulai[]" class="w-full border rounded-md px-2 py-1 @error('waktu_mulai.'.$i) border-red-500 @enderror" value="{{ old('waktu_mulai.'.$i) }}">
                                    @error('waktu_mulai.'.$i)
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </td>
                                
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="time" name="waktu_selesai[]" class="w-full border rounded-md px-2 py-1 @error('waktu_selesai.'.$i) border-red-500 @enderror" value="{{ old('waktu_selesai.'.$i) }}">
                                    @error('waktu_selesai.'.$i)
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </td>
                                
                                <td class="border border-gray-300 px-4 py-2">
                                    <select name="puskeswan[]" class="w-full border rounded-md px-2 py-1 @error('puskeswan.'.$i) border-red-500 @enderror">
                                        <option value="" selected hidden>Pilih Puskeswan</option>
                                        @foreach($puskeswan as $data)
                                            <option value="{{$data['id']}}" @if(old('puskeswan.'.$i) == $data['id']) selected @endif>{{$data['puskeswan']}}</option>
                                        @endforeach
                                    </select>
                                    @error('puskeswan.'.$i)
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                  <button type="button" class="text-red-500 font-bold" onclick="deleteRow(this)">Hapus</button>
                                </td>                              
                              </tr>
                            @endfor
                          </tbody>
                        
                      </table>
                  </div>
                  
                </div>

                
                <div class="flex justify-end mt-8">
                  <div class="flex gap-5">
                    <button type="button" class="inline-block w-full rounded rounded-full px-6 py-2 text-xl font-bold uppercase leading-normal text-white shadow-dark-3 transition duration-150 ease-in-out bg-danger hover:bg-primary-light min-w-32"
                    type="button"
                    onclick="window.location='{{route('dinas.informasiprogram')}}'"
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

    document.getElementById('add-button').addEventListener('click', function() {
      const jadwalBody = document.getElementById('jadwal_body');
      const newRow = document.createElement('tr');
      newRow.innerHTML = `
      <td class="border border-gray-300 px-4 py-2 @error('sesi.*') border-red-500 @enderror">
          <input type="text" name="sesi[]" class="w-full border rounded-md px-2 py-1" placeholder="Masukkan Nama Sesi" value="{{old('sesi.*')}}">
          @error('sesi.*')
              <p class="text-red-500 text-xs italic">{{ $message }}</p>
          @enderror
      </td>
      <td class="border border-gray-300 px-4 py-2">
          <input type="date" name="tanggal[]" class="w-full border rounded-md px-2 py-1 @error('tanggal.*') border-red-500 @enderror">
          @error('tanggal.*')
              <p class="text-red-500 text-xs italic">{{ $message }}</p>
          @enderror
      </td>
      <td class="border border-gray-300 px-4 py-2">
          <input type="time" name="waktu_mulai[]" class="w-full border rounded-md px-2 py-1 @error('waktu_mulai.*') border-red-500 @enderror">
          @error('waktu_mulai.*')
              <p class="text-red-500 text-xs italic">{{ $message }}</p>
          @enderror
      </td>
      <td class="border border-gray-300 px-4 py-2">
          <input type="time" name="waktu_selesai[]" class="w-full border rounded-md px-2 py-1 @error('waktu_selesai.*') border-red-500 @enderror">
          @error('waktu_selesai.*')
              <p class="text-red-500 text-xs italic">{{ $message }}</p>
          @enderror
      </td>
      <td class="border border-gray-300 px-4 py-2">
          <select name="puskeswan[]" class="w-full border rounded-md px-2 py-1 @error('puskeswan.*') border-red-500 @enderror">
              <option value="" selected hidden>Pilih Puskeswan</option>
              @foreach($puskeswan as $data)
                  <option value="{{$data['id']}}">{{$data['puskeswan']}}</option>
              @endforeach
          </select>
          @error('puskeswan.*')
              <p class="text-red-500 text-xs italic">{{ $message }}</p>
          @enderror
      </td>
      <td class="border border-gray-300 px-4 py-2">
          <button type="button" class="text-red-500 font-bold" onclick="deleteRow(this)">Hapus</button>
      </td>

      `;
      jadwalBody.appendChild(newRow);
      updateNumTbodies(1); // Menambah satu ke jumlah elemen <tbody>
  });

  function updateNumTbodies(change) {
      const numTbodiesInput = document.getElementById('numTbodies');
      let numTbodies = parseInt(numTbodiesInput.value);
      numTbodies += change;
      numTbodiesInput.value = numTbodies;
  }

  function deleteRow(btn) {
      const row = btn.parentNode.parentNode;
      row.parentNode.removeChild(row);
      updateNumTbodies(-1); // Mengurangi satu dari jumlah elemen <tbody>
  }

</script>


</body>

</html>
