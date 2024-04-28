<nav class="flex items-center justify-between p-6 lg:px-8 bg-secondary shadow-xl" aria-label="Global">
  <div class="flex lg:flex-1">
    <a href="#" class="flex flex-row items-center gap-5 -m-1.5 p-1.5">
      <img class="h-8 w-auto" src="/images/logo-image.png" alt="">
      <span class="font-bold">Sapi Sehat Jember</span>
    </a>
  </div>
  {{-- <div class="flex lg:hidden">
    <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
      <span class="sr-only">Open main menu</span>
      <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
      </svg>
    </button>
  </div> --}}
  <div class="lg:flex lg:gap-x-12">
    <a href="/dinas/dashboard" class="text-md font-semibold leading-6 text-gray-900">Dashboard</a>
    <a href="/dinas/layanan" class="text-md font-semibold leading-6 text-gray-900">Layanan</a>
    <a href="/dinas/laporan" class="text-md font-semibold leading-6 text-gray-900">Laporan</a>
    <a href="/dinas/informasidanprogram" class="text-md font-semibold leading-6 text-gray-900">Informasi dan Program</a>
    <a href="/dinas/notifikasi" class="text-md font-semibold leading-6 text-gray-900">Notifikasi</a>
  </div>
  <div class="lg:flex lg:flex-1 lg:justify-end gap-2 items-center"> 
    <div class="hs-dropdown relative inline-flex">
      <button id="hs-dropdown-custom-trigger" type="button" class="hs-dropdown-toggle py-1 ps-3 pe-3 inline-flex items-center gap-x-4 text-sm font-semibold bg-white text-gray-800  hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800">
        <div>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14" height="36" width="36" id="User-Add-Plus--Streamline-Flex"><desc>User Add Plus Streamline Icon: https://streamlinehq.com</desc><g id="user-add-plus--actions-add-close-geometric-human-person-plus-single-up-user"><path id="Union" fill="#69CF3A" fill-rule="evenodd" d="M11.5005 8.25116c0 -0.41421 -0.3358 -0.75 -0.75 -0.75s-0.75 0.33579 -0.75 0.75v1.74944H8.25122c-0.41421 0 -0.75 0.3357 -0.75 0.75 0 0.4142 0.33579 0.75 0.75 0.75h1.74928V13.25c0 0.4142 0.3358 0.75 0.75 0.75s0.75 -0.3358 0.75 -0.75v-1.7494H13.25c0.4143 0 0.75 -0.3358 0.75 -0.75 0 -0.4143 -0.3357 -0.75 -0.75 -0.75h-1.7495V8.25116Z" clip-rule="evenodd" stroke-width="1"></path><path id="Subtract" fill="#538D22" fill-rule="evenodd" d="M2.82455 0.822551C3.38563 0.261468 4.17824 0 5.1024 0c0.92416 0 1.71677 0.261468 2.27785 0.822551 0.56108 0.561079 0.82255 1.353689 0.82255 2.277849 0 0.92417 -0.26147 1.71677 -0.82255 2.27785 -0.56108 0.56109 -1.35369 0.82256 -2.27785 0.82256 -0.92416 0 -1.71677 -0.26147 -2.27785 -0.82256C2.26346 4.81717 2.002 4.02457 2.002 3.1004c0 -0.92416 0.26146 -1.71677 0.82255 -2.277849ZM0.838772 8.43766c1.220468 -0.81287 2.686618 -1.2866 4.261898 -1.2866 1.32315 0 2.56932 0.33423 3.65758 0.92292 -0.00513 0.05838 -0.00775 0.11747 -0.00775 0.17718v0.4994h-0.49928c-1.10457 0 -2 0.89543 -2 2.00004 0 0.3996 0.11723 0.7719 0.31918 1.0843H2.23113c-0.94173 0 -1.722349 -0.5059 -2.058492 -1.2066 -0.16930077 -0.3529 -0.2260175 -0.75999 -0.1162645 -1.16132C0.166897 9.06283 0.434516 8.7069 0.838772 8.43766Z" clip-rule="evenodd" stroke-width="1"></path></g></svg>
        </div> 
      </button>

      <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg p-2 mt-2 divide-y divide-gray-200 dark:bg-gray-800 dark:border dark:border-gray-700 dark:divide-gray-700 " aria-labelledby="hs-dropdown-with-dividers">
        <div class="py-2 first:pt-0 last:pb-0 mt-2">
            <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:bg-gray-700" href="{{route('dinas.buatakun')}}">
                Buat Akun Dokter Hewan
            </a>
        </div>
        <div class="py-2 first:pt-0 last:pb-0">
            <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:bg-gray-700" href="{{route('dinas.akundokter')}}">Lihat Akun Dokter Hewan</a>
        </div>
        <div class="py-2 first:pt-0 last:pb-0">
            <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:bg-gray-700" href="{{route('dinas.akunpeternak')}}">Lihat Akun Peternak</a>
        </div>
      </div>
    </div>
    <div class="hs-dropdown relative inline-flex">
      <button id="hs-dropdown-custom-trigger" type="button" class="hs-dropdown-toggle py-1 ps-3 pe-3 inline-flex items-center gap-x-4 text-sm font-semibold rounded-full border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800">
        <span class="text-gray-600 font-medium truncate max-w-[7.5rem] dark:text-gray-400">
          {{$user->nama_pengguna}}
        </span>
        <img class="w-8 h-auto rounded-full" src="{{asset($photo)}}" alt="profil">
      </button>
    
      <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg p-2 mt-2 divide-y divide-gray-200 dark:bg-gray-800 dark:border dark:border-gray-700 dark:divide-gray-700" aria-labelledby="hs-dropdown-with-dividers">
        
        <div class="py-3 px-5 -m-2 bg-gray-100 rounded-t-lg dark:bg-gray-700">
          <p class="text-sm text-gray-500 dark:text-gray-400">Log in as</p>
          <p class="text-sm font-medium text-gray-800 dark:text-gray-300">
            {{$user->email}}
          </p>
        </div>
        <div class="py-2 first:pt-0 last:pb-0 mt-2">
          <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:bg-gray-700" href="{{route('dinas.profil')}}">
            Profil
          </a>
        </div>
        <div class="py-2 first:pt-0 last:pb-0">
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="flex w-full items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:bg-gray-700">
              Log Out
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</nav>
@vite('public/assets/js/dropdown.js')