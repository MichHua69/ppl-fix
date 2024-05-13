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
      <a href="/dokter/dashboard" class="text-md font-semibold leading-6 text-gray-900">Dashboard</a>
      <a href="/dokter/konsultasi" class="text-md font-semibold leading-6 text-gray-900">Konsultasi</a>
      <a href="/dokter/laporan" class="text-md font-semibold leading-6 text-gray-900">Laporan</a>
      <a href="/dokter/informasiprogram" class="text-md font-semibold leading-6 text-gray-900">Informasi Program</a>
    </div>
    <div class="lg:flex lg:flex-1 lg:justify-end">
        
      <div class="hs-dropdown relative inline-flex">
        <button id="hs-dropdown-custom-trigger" type="button" class="hs-dropdown-toggle py-1 ps-3 pe-3 inline-flex items-center gap-x-4 text-sm font-semibold rounded-full border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800">
          <span class="text-gray-600 font-medium truncate max-w-[7.5rem] dark:text-gray-400">
            {{$user->nama_pengguna}}
          </span>
          <img class="w-8 h-8 rounded-full object-cover" src="{{asset($photo)}}" alt="profil">
          {{-- <svg class="hs-dropdown-open:rotate-180 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg> --}}
        </button>
      
        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg p-2 mt-2 divide-y divide-gray-200 dark:bg-gray-800 dark:border dark:border-gray-700 dark:divide-gray-700" aria-labelledby="hs-dropdown-with-dividers">
          
          <div class="py-3 px-5 -m-2 bg-gray-100 rounded-t-lg dark:bg-gray-700">
            <p class="text-sm text-gray-500 dark:text-gray-400">Log in as</p>
            <p class="text-sm font-medium text-gray-800 dark:text-gray-300">
              {{$user->email}}
            </p>
          </div>
          <div class="py-2 first:pt-0 last:pb-0 mt-2">
            <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:bg-gray-700" href="{{route('dokter.profil')}}">
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
  
        {{-- <form action="{{ route('logout') }}" method="post">
          @csrf
          <button type="submit">Logout</button>
        </form> --}}
    </div>
  </nav>
  @vite('public/assets/js/dropdown.js')