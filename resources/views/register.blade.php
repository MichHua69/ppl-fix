<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Register</title>
</head>

<body>
    <section class="h-full">
        <div class="flex items-center justify-center w-screen bg-cover bg-center h-screen"
            style="background-image: url('/images/bg-image.png');">
            <div class="container my-auto mx-auto items-center w-5/6 ">
                <div class="flex flex-wrap items-center justify-center w-full ">
                    <div class="w-full">
                        <div class="flex flex-col bg-secondary rounded-lg">
                            <div class="flex items-center rounded-t-lg rounded-b-2xl bg-[#538D22]">
                                <div class="flex w-full text-white p-3 justify-center items-center">
                                    <h1 class="text-2xl font-bold">Registrasi</h1>
                                </div>
                            </div>
                            <div class="text-center">
                                <img class="mx-auto w-48" src="/images/logo-image.png" alt="logo" />
                                <h4 class="mb-15 mt-1 pb-1 text-xl font-semibold">
                                    Sapi Sehat Jember
                                </h4>
                            </div>
                            <form action="{{route('register')}}" method="post">
                                @csrf
                                <div class="container flex flex-row">
                                    <div class="flex flex-col px-7 py-5 basis-1/2">
                                        <div
                                            class="flex flex-row items-center mb-4 w-full justify-between">
                                            <label class="basis-3/12" for="nama">
                                                Nama
                                            </label>
                                            <div class="relative basis-9/12"
                                                data-twe-input-wrapper-init>
                                                <input type="text" name="nama" id="nama"
                                                    placeholder="Masukkan Nama"
                                                    class="peer block w-full p-3 pl-4 border border-gray-300 rounded-md shadow-sm focus:outline:none focus:ring-primary focus:border-primary @error('nama') border-red-500 @enderror"
                                                    value="{{ old('nama') }}" 
                                                    autocomplete="name" autofocus />

                                                @error('nama')
                                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div
                                            class="flex flex-row items-center mb-4 w-full justify-between">
                                            <label class="basis-3/12" for="alamat">
                                                Alamat <br>(Masukkan Sesuai KTP)
                                            </label>
                                            <div class="relative basis-9/12"
                                                data-twe-input-wrapper-init>
                                                <input type="text" name="alamat" id="alamat"
                                                    placeholder="Masukkan Jalan"
                                                    class="peer block w-full p-3 pl-4 border border-gray-300 rounded-md shadow-sm focus:outline:none focus:ring-primary focus:border-primary @error('alamat') border-red-500 @enderror"
                                                    value="{{ old('alamat') }}" 
                                                    autocomplete="alamat" autofocus />

                                                @error('alamat')
                                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div
                                            class="flex flex-row items-center mb-4 w-full justify-between">
                                            <label class="basis-3/12" for="kecamatan"></label>
                                            <div
                                                class="basis-9/12 flex justify-center gap-x-3">
                                                <select
                                                    class="peer block w-full px-1 py-3 pl-4 border border-gray-300 rounded-md shadow-sm focus:outline:none focus:ring-primary focus:border-primary @error('kecamatan') border-red-500 @enderror"
                                                    name="kecamatan" id="kecamatan">
                                                    <option selected disabled hidden>Kecamatan</option>
                                                    @foreach ($kecamatan as $item)
                                                    <option value="{{ $item->id }}">{{ $item->kecamatan }}</option>
                                                    @endforeach
                                                </select>
                                                @error('kecamatan')
                                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                                @enderror

                                                <select
                                                    class="peer block w-full px-1 py-3 pl-4 border border-gray-300 rounded-md shadow-sm focus:outline:none focus:ring-primary focus:border-primary @error('desa') border-red-500 @enderror"
                                                    name="desa" id="desa">
                                                    <option selected disabled hidden>Desa</option>
                                                    @foreach ($desa as $item)
                                                        <option value="{{ $item->id }}">{{ $item->desa }}</option>
                                                    @endforeach
                                                </select>
                                                @error('desa')
                                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                                @enderror



                                            </div>
                                        </div>
                                        <div class="flex flex-row items-center mb-4 w-full justify-between">
                                            <label class="basis-3/12" for="nik">Dusun</label>
                                            <div class="relative basis-9/12" data-twe-input-wrapper-init>
                                                <input type="text" name="dusun" id="dusun" placeholder="Masukkan Nama Dusun" class="peer block w-full p-3 pl-4 border border-gray-300 rounded-md shadow-sm focus:outline:none focus:ring-primary focus:border-primary @error('dusun') border-red-500 @enderror"
                                                    value="{{ old('nik') }}"  autocomplete="dusun" autofocus />

                                                @error('dusun')
                                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="flex flex-row items-center mb-4 w-full justify-between">
                                            <label class="basis-3/12" for="nik">NIK</label>
                                            <div class="relative basis-9/12" data-twe-input-wrapper-init>
                                                <input type="text" name="nik" id="nik" placeholder="Masukkan NIK" class="peer block w-full p-3 pl-4 border border-gray-300 rounded-md shadow-sm focus:outline:none focus:ring-primary focus:border-primary @error('nik') border-red-500 @enderror"
                                                    value="{{ old('nik') }}"  autocomplete="nik" autofocus />

                                                @error('nik')
                                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="flex flex-row items-center mb-4 w-full justify-between">
                                            <label class="basis-3/12" for="telepon">No. Telepon</label>
                                            <div class="relative basis-9/12" data-twe-input-wrapper-init>
                                                <input type="text" name="telepon" id="telepon" placeholder="Masukkan No. Telepon" class="peer block w-full p-3 pl-4 border border-gray-300 rounded-md shadow-sm focus:outline:none focus:ring-primary focus:border-primary @error('telepon') border-red-500 @enderror"
                                                    value="{{ old('telepon') }}"  autocomplete="telepon" autofocus />

                                                @error('telepon')
                                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex flex-col px-7 py-5 basis-1/2">
                                        <div
                                            class="flex flex-row items-center mb-4 w-full justify-between">
                                            <label class="basis-3/12" for="nama_pengguna">Nama Pengguna</label>
                                            <div class="relative basis-9/12"
                                                data-twe-input-wrapper-init>
                                                <input type="text" name="nama_pengguna" id="nama_pengguna"
                                                    placeholder="Masukkan Nama Pengguna"
                                                    class="peer block w-full p-3 pl-4 border border-gray-300 rounded-md shadow-sm focus:outline:none focus:ring-primary focus:border-primary @error('nama_pengguna') border-red-500 @enderror"
                                                    value="{{ old('nama_pengguna') }}" 
                                                    autocomplete="nama_pengguna" autofocus />

                                                @error('nama_pengguna')
                                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div
                                            class="flex flex-row items-center mb-4 w-full justify-between">
                                            <label class="basis-3/12" for="email">Email</label>
                                            <div class="relative basis-9/12"
                                                data-twe-input-wrapper-init>
                                                <input type="email" name="email" id="email"
                                                    placeholder="Masukkan Email"
                                                    class="peer block w-full p-3 pl-4 border border-gray-300 rounded-md shadow-sm focus:outline:none focus:ring-primary focus:border-primary @error('email') border-red-500 @enderror"
                                                    value="{{ old('email') }}" 
                                                    autocomplete="email" autofocus />

                                                @error('email')
                                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div
                                            class="flex flex-row items-center mb-4 w-full justify-between">
                                            <label class="basis-3/12" for="password">Kata Sandi</label>
                                            <div class="relative basis-9/12"
                                                data-twe-input-wrapper-init>
                                                <input type="password" name="password" id="password"
                                                    placeholder="Masukkan Kata Sandi"
                                                    class="peer block w-full p-3 pl-4 border border-gray-300 rounded-md shadow-sm focus:outline:none focus:ring-primary focus:border-primary @error('password') border-red-500 @enderror"
                                                     autocomplete="new-password" />

                                                @error('password')
                                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div
                                            class="flex flex-row items-center mb-4 w-full justify-between">
                                            <label class="basis-3/12" for="password_confirmation">
                                                Ulangi Kata Sandi
                                            </label>
                                            <div class="relative basis-9/12"
                                                data-twe-input-wrapper-init>
                                                <input type="password" name="password_confirmation"
                                                    id="password_confirmation"
                                                    placeholder="Ulangi Kata Sandi"
                                                    class="peer block w-full p-3 pl-4 border border-gray-300 rounded-md shadow-sm focus:outline:none focus:ring-primary focus:border-primary @error('password_confirmation') border-red-500 @enderror"
                                                     autocomplete="new-password" />

                                                @error('password_confirmation')
                                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div>
                                          <div class="flex items-center justify-between">
                                                <div
                                                    class="inline-flex items-center">
                                                    <input type="checkbox"
                                                        name="billing_same"
                                                        id="billing_same"
                                                        class="form-checkbox" />
                                                    <label for="billing_same"
                                                        class="ml-2">Saya telah membaca dan menyetujui <a
                                                            class="underline text-blue-500"
                                                            href="#">Ketentuan dan Kebijakan</a></label>
                                                </div>
                                                <div>
                                                    <a class="underline text-primary"
                                                        href="/login">Sudah punya akun?</a>
                                                </div>
                                            </div>
                                            <div
                                                class="mb-12 pb-1 pt-1 text-center">
                                                <button class="mb-3 inline-block w-full rounded px-6 pb-2 pt-2.5 text-md font-medium uppercase leading-normal text-white shadow-dark-3 transition duration-150 ease-in-out hover:bg-secondary hover:text-primary bg-primary"
                                                    type="submit"
                                                    data-twe-ripple-init
                                                    data-twe-ripple-color="light">
                                                    Daftar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    
</script>
</body>

</html>