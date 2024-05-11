<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Login</title>
    
</head>

<body>
<section class="h-full" >
  <div class="flex items-center justify-center w-screen bg-cover bg-center h-screen" style="background-image: url('/images/bg-image.png');">
    <div class="container my-auto mx-auto items-center w-5/6 ">
      <div class="flex flex-wrap items-center justify-center w-full ">
        <div class=" w-full">
          <div class="relative rounded-lg bg-white shadow-">
            @if(session('success'))
              <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative alert-message" role="alert" style="position: absolute; width: 100%;">
                <strong class="font-bold">Berhasil!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
                <span id="close-button" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                  <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.697z"/></svg>
                </span>
              </div>
            @endif
            @if(session('loginError'))
              <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative alert-message" role="alert" style="position: absolute; width: 100%;">
                <strong class="font-bold">Gagal!</strong>
                <span class="block sm:inline">{{ session('loginError') }}</span>
                <span id="close-button" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                  <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.697z"/></svg>
                </span>
              </div>
            @endif
            <div class="g-0 lg:flex lg:flex">
              <!-- Left column container-->
              <div class="px-4 md:px-0 lg:w-6/12">
                <div class="md:mx-6 md:p-12">
                  <!--Logo-->
                  <div class="text-center">
                    <img
                      class="mx-auto w-48"
                      src="/images/logo-image.png"
                      alt="logo" />
                    <h4 class="mb-12 mt-1 pb-1 text-xl font-semibold">
                      Sapi Sehat Jember
                    </h4>
                  </div>
                  <form action="{{ route('login') }}" method="post">
                    @csrf
                    <label>Nama Pengguna / Email</label>
                    <!--Username input-->
                    <div class="relative mb-4" data-twe-input-wrapper-init>
                      <input type="text" name="nama_pengguna" id="nama_pengguna" placeholder="Masukkan Nama Pengguna / Email" class="peer block w-full p-3 pl-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('nama_pengguna') border-red-500 @enderror" autofocus/>
                      @error('nama_pengguna')
                      <p class="text-red-500 text-xs italic">{{ $message }}</p>
                      @enderror
                    </div>
                    
                    <label>Kata Sandi</label>
                    <!--Password input-->
                    <div class="relative mb-4" data-twe-input-wrapper-init>                
                      <div class="flex items-center text-lg mb-6 md:mb-8">
                        <input type="password" name="password" id="password" class="peer block w-full p-3 pl-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('password') border-red-500 @enderror" placeholder="Kata Sandi"/>
                      </div>
                      @error('password')
                      <p class="text-red-500 text-xs italic">{{ $message }}</p>
                      @enderror
                    </div>
                      <!--Submit button-->
                      <div class="mb-12 pb-1 pt-1 text-center">
                        <button
                          class="mb-3 inline-block w-full rounded px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-dark-3 transition duration-150 ease-in-out hover:bg-secondary hover:text-primary bg-primary"
                          type="submit"
                          data-twe-ripple-init
                          data-twe-ripple-color="light">
                          Masuk
                        </button>
                      </div>
                  </form>
                </div>
              </div>
  
              <!-- Right column container with background and description-->
              <div 
                class="flex items-center rounded-b-lg lg:w-6/12 lg:rounded-e-lg lg:rounded-bl-none w-30px bg-[#538D22]">
                
                <div class="flex w-full px-4 py-6 text-white md:mx-6 md:p-12 flex-col gap-3 items-center">
                  <h2 class="mb-6 text-5xl font-bold">Selamat Datang</h2>
                  <p class="text-lg mb-8 text-center">
                    "Ternak Sehat, Peternak Bahagia: Solusi Kesehatan Ternak Terpercaya dari Sapi Sehat Jember!"
                  </p>
                  <p class="text-sm">
                    Belum punya akun?
                  </p>
                  <button
                    type="button"
                    class="inline-block rounded-full border-2 border-secondary px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-secondary transition duration-150 ease-in-out hover:bg-secondary hover:text-primary"
                    data-twe-ripple-init
                    data-twe-ripple-color="light">
                    <a href="/register">Daftar</a>
                  </button>              
                </div>
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
</body>

</html>
