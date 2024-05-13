    <!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Konsultasi</title>
</head>

<body>
<header class="absolute inset-x-0 top-0 z-50">
    @include ('peternak.navbar')
</header>
<section class="h-full" >
    <form action="{{route('peternak.profil.save')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="bg-primary pt-20 mt-6 h-full pb-1">
            <div class="container px-6 py-10 mx-auto">
                <div class="container grid grid grid-cols-3 bg-white rounded-lg shadow-lg overflow-hidden min-h-[80vh] relative">
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded absolute top-0 left-0 right-0 alert-message" role="alert">
                            <strong class="font-bold">Berhasil!</strong>
                            <span class="block sm:inline">{{ 'Profil berhasil diperbarui.' }}</span>
                            <span id="close-button" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.697z"/></svg>
                            </span>
                        </div>
                    @endif
                    <div class="flex flex-col items-center justify-center gap-10 py-4 p-6 border-primary">
                    
                <div class="relative w-72 h-72">
                    <button type="button" class="absolute inset-0 flex items-center justify-center opacity-0 hover:opacity-100 transition duration-300" id='camera'>
                    <img class="w-20 h-20" src="/images/camera.png" alt="camera">
                    </button>
                    <img class="w-full h-full object-cover border-4 rounded-full border-primary hover:border-grey-400 transition duration-100" src="{{asset($photo)}}" id="profile-image" alt="profil">
                </div>
                <span class="hidden" id="filename">ini nama file</span>
                <label class="hidden inline-block w-1/2 rounded px-6 pb-2 pt-2.5 text-xl font-bold uppercase leading-normal text-white shadow-dark-3 transition duration-150 ease-in-out bg-primary hover:bg-primary-light rounded text-center" id="editImage" name="editImage" for="file_input">
                    Choose file
                    <input class="hidden bg-white @error('file_input') border-red-500 @enderror" id="file_input" type="file" name="file_input" accept="image/*">
                </label>
                @error('file_input')
                <p class="text-red-500 text-xs italic">{{$message}}</p>
                @enderror
    
                <button type="button"
                    class="inline-block w-full rounded px-6 pb-2 pt-2.5 text-xl font-bold uppercase leading-normal text-white shadow-dark-3 transition duration-150 ease-in-out bg-primary hover:bg-primary-light"
                    type="submit"
                    id="edit-profile-button"
                    data-twe-ripple-init
                    data-twe-ripple-color="light">
                    Edit
                </button>
    
                </div>
                
                <div class="col-span-2 p-6 grid border-l-2 w-full">
                <div class="container h-full ">
                    <h2 class="text-5xl font-bold mb-4 grid grid-row-15 row-span-1">Profil</h2>
                    <div class="container flex flex-row text-xl">
                        <div class="flex flex-col px-7 py-5 basis-1/2">
                            <div
                                class="flex flex-col mb-8 w-full justify-between">
                                <label class="basis-3/12 font-semibold" for="nama">
                                    Nama
                                </label>
                                <p class="peer block w-full py-3 rounded-md" id="nama-p">{{$aktor->nama}}</p>
                            </div>
    
                            <div
                                class="flex flex-col mb-4 w-full justify-between ">
                                <label class="basis-3/12 font-semibold" for="alamat">
                                    Alamat
                                </label>
                                <p class="peer block w-full py-3 rounded-md" id="alamat-p">{{$aktor->alamat->jalan}}</p>
                                <div class="relative basis-9/12"
                                    data-twe-input-wrapper-init>
                                    <input type="text" name="alamat" id="alamat"
                                        placeholder="Masukkan Alamat"
                                        class="hidden peer block w-full p-3 pl-4 border border-gray-300 rounded-md shadow-sm focus:outline:none focus:ring-primary focus:border-primary @error('alamat') border-red-500 @enderror"
                                        value="{{ $aktor->alamat->jalan }}" autocomplete="alamat" />
    
                                    @error('alamat')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
    
                            <div
                                class="flex flex-col mb-8 w-full justify-between">
                                <label class="basis-3/12 font-semibold" for="kecamatan"></label>
                                <div
                                    class="basis-9/12 flex justify-center gap-x-3 font-semibold">
                                    <p class="peer block w-full py-3 rounded-md" id="kecamatan-p">Kecamatan</p>
                                    <p class="peer block w-full py-3 rounded-md" id="desa-p">Desa</p>
                                </div>
                                <div
                                    class="basis-9/12 flex justify-center gap-x-3">
                                    <p class="peer block w-full py-3 rounded-md" id="kecamatans-p">{{$aktor->alamat->wilayah->kecamatan->kecamatan}}</p>
                                    <p class="peer block w-full py-3 rounded-md" id="desas-p">{{$aktor->alamat->wilayah->desa->desa}}</p>
                                </div>
                                <div
                                    class="basis-9/12 flex justify-center gap-x-3">
                                    <select 
                                        class="hidden peer block w-full px-1 py-3 pl-4 border border-gray-300 rounded-md shadow-sm focus:outline:none focus:ring-primary focus:border-primary @error('kecamatan') border-red-500 @enderror"
                                        name="kecamatan" id="kecamatan">
                                        <option selected hidden value="{{ $aktor->alamat->wilayah->kecamatan->id }}">{{$aktor->alamat->wilayah->kecamatan->kecamatan}}</option>
                                        @foreach ($kecamatan as $item)
                                        <option value="{{ $item->id }}">{{ $item->kecamatan }}</option>
                                        @endforeach
                                    </select>
                                    @error('kecamatan')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
    
                                    <select
                                        class="hidden peer block w-full px-1 py-3 pl-4 border border-gray-300 rounded-md shadow-sm focus:outline:none focus:ring-primary focus:border-primary @error('desa') border-red-500 @enderror"
                                        name="desa" id="desa">
                                        <option selected hidden value="{{ $aktor->alamat->wilayah->desa->id }}">{{$aktor->alamat->wilayah->desa->desa}}</option>
                                        @foreach ($desa as $item)
                                            <option value="{{ $item->id }}">{{ $item->desa }}</option>
                                        @endforeach
                                    </select>
                                    @error('desa')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
    
                                </div>
                            </div>
    
                            <div class="flex flex-col mb-8 w-full justify-between">
                                <label class="basis-3/12 font-semibold" for="dusun">Dusun</label>
                                <p class="peer block w-full py-3 rounded-md" id="dusun-p">{{$aktor->alamat->dusun}}</p>
                                <div class="relative basis-9/12" data-twe-input-wrapper-init>
                                    <input type="text" name="dusun" id="dusun" placeholder="Masukkan Dusun" class="hidden peer block w-full p-3 pl-4 border border-gray-300 rounded-md shadow-sm focus:outline:none focus:ring-primary focus:border-primary @error('dusun') border-red-500 @enderror"
                                        value="{{$aktor->alamat->dusun}}" autocomplete="dusun"/>
                                    @error('dusun')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex flex-col mb-8 w-full justify-between">
                                <label class="basis-3/12 font-semibold" for="nik">NIK</label>
                                <p class="peer block w-full py-3 rounded-md" id="nik-p">{{$aktor->nik}}</p>
                            </div>
    
                            
                        </div>
                        <div class="flex flex-col px-7 py-5 basis-1/2">
                            <div class="flex flex-col mb-8 w-full justify-between">
                                <label class="basis-3/12 font-semibold" for="telepon">No. Telepon</label>
                                <p class="peer block w-full py-3 rounded-md" id="telepon-p">{{$aktor->telepon}}</p>
                                <div class="relative basis-9/12" data-twe-input-wrapper-init>
                                    <input type="text" name="telepon" id="telepon" placeholder="Masukkan No. Telepon" class="hidden peer block w-full p-3 pl-4 border border-gray-300 rounded-md shadow-sm focus:outline:none focus:ring-primary focus:border-primary @error('telepon') border-red-500 @enderror"
                                        value="{{$aktor->telepon}}" autocomplete="telepon"/>
    
                                    @error('telepon')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div
                                class="flex flex-col mb-8 w-full justify-between">
                                <label class="basis-3/12 font-semibold" for="nama_pengguna">Nama Pengguna</label>
                                <p class="peer block w-full py-3 rounded-md" id="nama_pengguna-p">{{$aktor->Pengguna->nama_pengguna}}</p>
                                <div class="relative basis-9/12"
                                    data-twe-input-wrapper-init>
                                    <input type="text" name="nama_pengguna" id="nama_pengguna"
                                        placeholder="Masukkan Nama Pengguna"
                                        class="hidden peer block w-full p-3 pl-4 border border-gray-300 rounded-md shadow-sm focus:outline:none focus:ring-primary focus:border-primary @error('nama_pengguna') border-red-500 @enderror"
                                        value="{{$aktor->Pengguna->nama_pengguna}}"
                                        autocomplete="nama_pengguna"/>
    
                                    @error('nama_pengguna')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
    
                            <div
                                class="flex flex-col mb-8 w-full justify-between">
                                <label class="basis-3/12 font-semibold" for="email">Email</label>
                                <p class="peer block w-full py-3 rounded-md" id="email-p">
                                    {{{$aktor->Pengguna->email}}}
                                </p>
                            </div>
    
                            <div
                                class="flex flex-col mb-8 w-full justify-between">
                                <label class="basis-3/12 font-semibold" for="password">Kata Sandi</label>
                                <p class="peer block w-full py-3 rounded-md" id="password-p">********</p>
                                <div class="relative basis-9/12"
                                    data-twe-input-wrapper-init>
                                    <input type="password" name="password" id="password"
                                        placeholder="Masukkan Kata Sandi"
                                        class="hidden peer block w-full p-3 pl-4 border border-gray-300 rounded-md shadow-sm focus:outline:none focus:ring-primary focus:border-primary @error('password') border-red-500 @enderror"
                                        autocomplete="new-password" />
    
                                    @error('password')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex gap-5">
                                <button type="button"
                                class=" hidden inline-block w-full rounded rounded-full px-6 py-2 text-xl font-bold uppercase leading-normal text-white shadow-dark-3 transition duration-150 ease-in-out bg-danger hover:bg-primary-light"
                                type="button"
                                id="cancel-profile-button"
                                data-twe-ripple-init
                                data-twe-ripple-color="light">
                                Batal
                                </button> 
                                <button type="submit"
                                class=" hidden inline-block w-full rounded rounded-full px-6 py-2 text-xl font-bold uppercase leading-normal text-white shadow-dark-3 transition duration-150 ease-in-out bg-primary hover:bg-primary-light"
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
<script>
    const editProfileButton = document.getElementById('edit-profile-button');
    const saveProfileButton = document.getElementById('save-profile-button');
    const cancelProfileButton = document.getElementById('cancel-profile-button');
    const alamatP = document.getElementById('alamat-p');
    const alamatInput = document.getElementById('alamat');
    const kecamatansP = document.getElementById('kecamatans-p');
    const kecamatanInput = document.getElementById('kecamatan');
    const desasP = document.getElementById('desas-p');
    const desaInput = document.getElementById('desa');
    const dusunP = document.getElementById('dusun-p');
    const dusunInput = document.getElementById('dusun');
    const teleponP = document.getElementById('telepon-p');
    const teleponInput = document.getElementById('telepon');
    const namaPenggunaP = document.getElementById('nama_pengguna-p');
    const namaPenggunaInput = document.getElementById('nama_pengguna');
    const passwordP = document.getElementById('password-p');
    const passwordInput = document.getElementById('password');
    
    editProfileButton.addEventListener('click', () => {
        editImage.classList.remove('hidden');
        saveProfileButton.classList.remove('hidden');
        cancelProfileButton.classList.remove('hidden');
        editProfileButton.classList.add('hidden');
        alamatP.classList.add('hidden');
        alamatInput.classList.remove('hidden');
        kecamatansP.classList.add('hidden');
        kecamatanInput.classList.remove('hidden');
        desasP.classList.add('hidden');
        desaInput.classList.remove('hidden');
        dusunP.classList.add('hidden');
        dusunInput.classList.remove('hidden');
        teleponP.classList.add('hidden');
        teleponInput.classList.remove('hidden');
        namaPenggunaP.classList.add('hidden');
        namaPenggunaInput.classList.remove('hidden');
        passwordP.classList.add('hidden');
        passwordInput.classList.remove('hidden');
        editImageButton.classList.remove('hidden');
    });
    cancelProfileButton.addEventListener('click', () => {
        editImage.classList.add('hidden');
        saveProfileButton.classList.add('hidden');
        cancelProfileButton.classList.add('hidden');
        editProfileButton.classList.remove('hidden');
        editImage.classList.add('hidden');
        saveProfileButton.classList.add('hidden');
        cancelProfileButton.classList.add('hidden');
        alamatP.classList.remove('hidden');
        alamatInput.classList.add('hidden');
        kecamatansP.classList.remove('hidden');
        kecamatanInput.classList.add('hidden');
        desasP.classList.remove('hidden');
        desaInput.classList.add('hidden');
        dusunP.classList.remove('hidden');
        dusunInput.classList.add('hidden');
        teleponP.classList.remove('hidden');
        teleponInput.classList.add('hidden');
        namaPenggunaP.classList.remove('hidden');
        namaPenggunaInput.classList.add('hidden');
        passwordP.classList.remove('hidden');
        passwordInput.classList.add('hidden');
        editImageButton.classList.add('hidden');
        });

    const cameraButton = document.getElementById('camera');
    const editImage = document.getElementById('editImage');

    cameraButton.addEventListener('click', function() {
        editImage.classList.remove('hidden');
        saveProfileButton.classList.remove('hidden');
        cancelProfileButton.classList.remove('hidden');
        editProfileButton.classList.add('hidden');
        alamatP.classList.add('hidden');
        alamatInput.classList.remove('hidden');
        kecamatansP.classList.add('hidden');
        kecamatanInput.classList.remove('hidden');
        desasP.classList.add('hidden');
        desaInput.classList.remove('hidden');
        dusunP.classList.add('hidden');
        dusunInput.classList.remove('hidden');
        teleponP.classList.add('hidden');
        teleponInput.classList.remove('hidden');
        namaPenggunaP.classList.add('hidden');
        namaPenggunaInput.classList.remove('hidden');
        passwordP.classList.add('hidden');
        passwordInput.classList.remove('hidden');
        editImageButton.classList.remove('hidden');
    });

    const fileInput = document.getElementById('file_input');
    const fileNameElement = document.getElementById('filename'); 
    const profileImage = document.getElementById('profile-image');

    fileInput.addEventListener('change', function() {
    const file = fileInput.files.item(0);
    const fileName = file.name;
    fileNameElement.classList.remove('hidden');
    fileNameElement.textContent = fileName;

    profileImage.src = URL.createObjectURL(file);
    
    });
    
    const closeButton = document.getElementById('close-button');

    closeButton.addEventListener('click', function() {
        const alertMessage = document.querySelector('.alert-message');
        alertMessage.style.display = 'none';
    });

    
</script>

</body>

</html>
