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
        @include ('dinas.navbar')
    </header>
    <section class="h-full">
      <div class="bg-primary pt-20 mt-6 h-full pb-1">
        <div class="px-6 py-10 mx-auto h-full flex justify-center">
          <div class="container bg-secondary rounded-lg shadow-lg h-full relative p-12">
            <div class="relative flex items-center w-full justify-center">
              <div class="flex items-center">
                <span class="px-2 py-4 bg-primary rounded-lg mx-auto text-3xl text-secondary font-semibold">Informasi dan Program Dinas Ketahanan Pangan dan Peternakan Kabupaten Jember</span>
              </div>
              <div class="absolute top-0 right-0">
                <div class="hs-dropdown relative inline-flex">
                  <button id="hs-dropdown-custom-trigger" type="button" class="hs-dropdown-toggle inline-flex items-center gap-x-4 text-sm font-semibold text-gray-800 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800">
                    <div>
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="rounded-full" viewBox="0 0 72 72" id="Add-Circle--Streamline-Core" height="65" width="65">
                        <desc>Add Circle Streamline Icon: https://streamlinehq.com</desc>
                        <g id="add-circle--button-remove-cross-add-buttons-plus-circle-+-mathematics-math">
                          <path id="Ellipse 638" fill="#538D22" d="M0 36a36 36 0 1 0 72 0A36 36 0 1 0 0 36" stroke-width="1"></path>
                          <path id="Union" fill="#ffffff" fill-rule="evenodd" d="M39.85714285714286 20.571428571428573c0 -2.1302228571428574 -1.72692 -3.8571428571428577 -3.8571428571428577 -3.8571428571428577s-3.8571428571428577 1.72692 -3.8571428571428577 3.8571428571428577v11.571428571428573H20.571428571428573c-2.1302228571428574 0 -3.8571428571428577 1.72692 -3.8571428571428577 3.8571428571428577s1.72692 3.8571428571428577 3.8571428571428577 3.8571428571428577h11.571428571428573V51.42857142857143c0 2.130171428571429 1.72692 3.8571428571428577 3.8571428571428577 3.8571428571428577s3.8571428571428577 -1.7269714285714286 3.8571428571428577 -3.8571428571428577V39.85714285714286H51.42857142857143c2.130171428571429 0 3.8571428571428577 -1.72692 3.8571428571428577 -3.8571428571428577s-1.7269714285714286 -3.8571428571428577 -3.8571428571428577 -3.8571428571428577H39.85714285714286V20.571428571428573Z" clip-rule="evenodd" stroke-width="1"></path>
                        </g>
                      </svg>
                    </div>
                  </button>
                  
            
                  <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg p-2 mt-2 divide-y divide-gray-200 dark:bg-gray-800 dark:border dark:border-gray-700 dark:divide-gray-700 z-50" aria-labelledby="hs-dropdown-with-dividers">
                    <div class="py-2 first:pt-0 last:pb-0 mt-2">
                        <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:bg-gray-700" href="{{route('dinas.tambahartikel')}}">
                            Artikel
                        </a>
                    </div>
                    <div class="py-2 first:pt-0 last:pb-0">
                        <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:bg-gray-700" href="{{route('dinas.akundokter')}}">Program</a>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <div class="py-4 font-semibold text-3xl">Artikel</div>
              <div class="flex gap-4 justify-between">
                <div class="relative flex flex-col w-1/5 gap-2 bg-gray-200 rounded-lg p-4 overflow-hidden h-full max-h shadow-xl">
                  <img class="h-36 object-cover rounded-lg" src="/images/logo2-image.png" alt="">
                  <div class="font-semibold text-lg h-8 overflow-hidden">
                    Strategi Pencegahan Penyakit Pada Sapi: Peran Vaksinasi dan Manajemen Lingkungan
                  </div>                            
                  <div class="text-sm h-20 overflow-hidden">
                      Lorem ipsum dolor sit, amet consectetur adipisicing elit. Non voluptates provident quis repellendus quam ullam rem soluta. Voluptate libero molestiae provident sapiente animi deserunt eum cupiditate aliquam, voluptatem velit similique. 
                  </div>
                  <a class="absolute bottom-0 right-0 m-2 py-1 px-6 bg-white rounded-full shadow-md font-semibold" href="">Lihat</a>
                </div>
                <div class="relative flex flex-col w-1/5 gap-2 bg-gray-200 rounded-lg p-4 overflow-hidden h-full max-h shadow-xl">
                  <img class="h-36 object-cover rounded-lg" src="/images/logo2-image.png" alt="">
                  <div class="font-semibold text-lg h-8 overflow-hidden">
                    Strategi Pencegahan Penyakit Pada Sapi: Peran Vaksinasi dan Manajemen Lingkungan
                  </div>                            
                  <div class="text-sm h-20 overflow-hidden">
                      Lorem ipsum dolor sit, amet consectetur adipisicing elit. Non voluptates provident quis repellendus quam ullam rem soluta. Voluptate libero molestiae provident sapiente animi deserunt eum cupiditate aliquam, voluptatem velit similique. 
                  </div>
                  <a class="absolute bottom-0 right-0 m-2 py-1 px-6 bg-white rounded-full shadow-md" href="">Lihat</a>
                </div>
                <div class="relative flex flex-col w-1/5 gap-2 bg-gray-200 rounded-lg p-4 overflow-hidden h-full max-h shadow-xl">
                  <img class="h-36 object-cover rounded-lg" src="/images/logo2-image.png" alt="">
                  <div class="font-semibold text-lg h-8 overflow-hidden">
                    Strategi Pencegahan Penyakit Pada Sapi: Peran Vaksinasi dan Manajemen Lingkungan
                  </div>                            
                  <div class="text-sm h-20 overflow-hidden">
                      Lorem ipsum dolor sit, amet consectetur adipisicing elit. Non voluptates provident quis repellendus quam ullam rem soluta. Voluptate libero molestiae provident sapiente animi deserunt eum cupiditate aliquam, voluptatem velit similique. 
                  </div>
                  <a class="absolute bottom-0 right-0 m-2 py-1 px-6 bg-white rounded-full shadow-md" href="">Lihat</a>
                </div>
                <div class="relative flex flex-col w-1/5 gap-2 bg-gray-200 rounded-lg p-4 overflow-hidden h-full max-h shadow-xl">
                  <img class="h-36 object-cover rounded-lg" src="/images/logo2-image.png" alt="">
                  <div class="font-semibold text-lg h-8 overflow-hidden">
                    Strategi Pencegahan Penyakit Pada Sapi: Peran Vaksinasi dan Manajemen Lingkungan
                  </div>                            
                  <div class="text-sm h-20 overflow-hidden">
                      Lorem ipsum dolor sit, amet consectetur adipisicing elit. Non voluptates provident quis repellendus quam ullam rem soluta. Voluptate libero molestiae provident sapiente animi deserunt eum cupiditate aliquam, voluptatem velit similique. 
                  </div>
                  <a class="absolute bottom-0 right-0 m-2 py-1 px-6 bg-white rounded-full shadow-md" href="">Lihat</a>
                </div>
            </div>
            <div class="mt-6 flex justify-end">
              <button class="shadow-md p-4 rounded-full font-medium hover:text-secondary hover:bg-primary">Lihat Selengkapnya >
              </button>
            </div>
            <div class="py-4 font-semibold text-3xl">Program</div>
            <div class="flex gap-8 justify-center">
              <div class="flex flex-col w-1/5 gap-2 bg-gray-200 rounded-lg p-4 overflow-hidden h-full max-h">
                  <img class="h-36 object-cover" src="/images/divo.png" alt="">
                  <span class="font-semibold text-xl">Vaksin Gratis 2024</span>
                  <div class="text-sm h-20 overflow-hidden">
                      Lorem ipsum dolor sit, amet consectetur adipisicing elit. Non voluptates provident quis repellendus quam ullam rem soluta. Voluptate libero molestiae provident sapiente animi deserunt eum cupiditate aliquam, voluptatem velit similique.
                  </div>
              </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script>
        // your script here
    </script>
</body>

</html>
