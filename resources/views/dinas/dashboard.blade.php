<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Dashboard</title>
</head>

<body>
  <header class="absolute inset-x-0 top-0 z-50">
    @include ('dinas.navbar')
    <p></p></p>
  </header>
  <section class="h-full " >
    <div class="flex flex-col justify-center w-screen bg-cover bg-center h-screen m-xl bg-primary px-36 gap-10 relative">
      <h1 class="text-5xl text-secondary mt-10">Sapi Sehat Jember : <br>Solusi Tepat untuk Peternakan Berkelanjutan!</h1>
      <p class="text-xl text-secondary">Kelola kesehatan ternak Anda dengan mudah dan dapatkan laporan riwayat kesehatan yang lengkap</p>
      <div class="flex gap-7">
        <button onclick="location.href='/dinas/layanan'" class="flex flex-col bg-secondary hover:bg-primary hover:text-secondary text-primary items-center justify-center font-bold rounded-xl relative bg-no-repeat w-[13rem] h-[13rem] ">
          <img
              class="h-36"
              src="/images/layanan.png"
              alt="" />
          <p class="text-2xl">Layanan</p>
        </button>
        <button onclick="location.href='/dinas/laporan'" class="flex flex-col bg-secondary hover:bg-primary hover:text-secondary text-primary items-center justify-center font-bold rounded-xl relative bg-no-repeat w-[13rem] h-[13rem] ">
          <img
              class="h-36"
              src="/images/laporan.png"
              alt="" />
          <p class="text-2xl">Laporan</p>
        </button>
        <button onclick="window.location.href='{{ route('dinas.informasiprogram') }}'" class="flex flex-col bg-secondary hover:bg-primary hover:text-secondary text-primary items-center justify-center font-bold rounded-xl relative bg-no-repeat w-[13rem] h-[13rem] ">
          <img
              class="h-36"
              src="/images/informasi.png"
              alt="" />
          <p class="text-md">Informasi Program</p>
        </button>
        <button onclick="location.href='/dinas/konsultasi'" class="flex flex-col bg-secondary hover:bg-primary hover:text-secondary text-primary items-center justify-center font-bold rounded-xl relative bg-no-repeat w-[13rem] h-[13rem] ">
          <img
              class="h-36"
              src="/images/notifikasi.png"
              alt="" />
          <p class="text-2xl">Notifikasi</p>
        </button>
      </div>
        <img class="absolute h-full right-0" src="/images/vector.png" alt="">
        <img class="absolute bottom-0 right-0 w-1/3" src="/images/sapi.png" alt="">        
    </div>
       

        
</section>
</body>

</html>
