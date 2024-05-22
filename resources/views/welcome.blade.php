<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <div class="bg-white">
        <div class="bg-white">
            <nav class="flex items-center justify-between p-6 lg:px-8 bg-secondary shadow-xl" aria-label="Global">
                <div class="flex lg:flex-1">
                    <a href="#" class="flex flex-row items-center gap-5 -m-1.5 p-1.5">
                        <img class="h-8 w-auto" src="/images/logo-image.png" alt="">
                        <span class="font-bold">Sapi Sehat Jember</span>
                    </a>
                </div>
                <div class="lg:flex lg:gap-x-12">
                    <a href="/" class="text-md font-semibold leading-6 text-gray-900">Home</a>
                    <a href="/" class="text-md font-semibold leading-6 text-gray-900">Layanan</a>
                    <a href="/" class="text-md font-semibold leading-6 text-gray-900">Tentang</a>
                    <a href="/" class="text-md font-semibold leading-6 text-gray-900">Kontak</a>
                </div>
                <div class="lg:flex lg:flex-1 lg:justify-end">
                    <div class="py-2 first:pt-0 last:pb-0">
                        <a href="/login"
                            class="text-md font-semibold text-white hover:bg-gray-700 px-3 py-2 rounded bg-[#6F9F29]">Masuk</a>
                        <a href="/register"
                            class="text-md font-semibold text-white hover:bg-gray-700 px-3 py-2 rounded bg-[#6F9F29]">Daftar</a>
                    </div>
                </div>
        </div>
        </nav>
        <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
        <link rel="stylesheet"
            href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
    </div>
    </nav>


    <section class="relative  bg-blueGray-50">
        <div class="relative pt-16 pb-32 flex content-center items-center justify-center min-h-screen-75">
            <div class="absolute top-0 w-full h-full bg- bg-cover"
                style="
            background-image: url('{{ asset('images/ssj-background.jpg') }}');
          ">
                <span id="blackOverlay" class="w-full h-full absolute opacity-60 bg-black"></span>
            </div>
            <div class="container relative mx-auto">
                <div class="items-center flex flex-wrap">
                    <div class="w-full  px-4 ml-auto mr-auto text-left">
                        <div class="pr-12">
                            <p class="font-bold mt-4 text-lg text-white mb-2">
                                Layanan Kesehatan Sapi Dinas Peternakan Jember
                            </p>
                            <h1 class="text-white font-semibold text-5xl">
                                SAPI SEHAT JEMBER
                            </h1>
                            <h1 class="text-white font-semibold text-5xl">
                                Solusi Tepat Untuk Peternakan Berkelanjutan
                            </h1>
                            <p class="mt-4 text-lg text-white">
                                Nikmati Kemudahan Konsultasi Online Bersama Dokter Hewan
                            </p>
                            <p class="text-lg text-white">dan Dapatkan Informasi Akurat Dinas Peternakan
                                Jember</p>

                            <a href="/register"><button
                                    class="bg-[#6F9F29] text-white font-bold p-3 rounded-[2px] mt-4">
                                    Dapatkan Layanan
                                </button></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden h-70-px"
                style="transform: translateZ(0px)">
                <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                    <polygon class="text-blueGray-200 fill-current" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>
        <section class="pb-10 bg-blueGray-200 -mt-24">
            <div class="container mx-auto px-4">
                <div class="flex flex-wrap shadow-lg">
                    <div class=" w-1/4 text-center">
                        <div class="relative flex flex-col min-w-0 break-words bg-[#6F9F29] w-full">
                            <div class="px-4 py-5 flex-auto">
                                <div
                                    class="text-white p-3 text-center inline-flex items-center justify-center w-20 h-20 rounded-full ">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960"
                                        width="48px" fill="#C2ED47">
                                        <path
                                            d="M240-400h480v-60H240v60Zm0-130h480v-60H240v60Zm0-130h480v-60H240v60ZM880-80 720-240H140q-24 0-42-18t-18-42v-520q0-24 18-42t42-18h680q24 0 42 18t18 42v740ZM140-300h606l74 80v-600H140v520Zm0 0v-520 520Z" />
                                    </svg>
                                </div>
                                <h6 class=" mt-2 text-xl font-semibold text-white">Konsultasi Online</h6>
                                <p class="mt-2 mb-4 text-white">
                                    Konsultasikan kondisi kesehatan sapi secara online bersama Dokter Hewan
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class=" w-1/4 text-center">
                        <div class="relative flex flex-col min-w-0 break-words bg-[#6F9F29] w-full">
                            <div class="px-4 py-5 flex-auto">
                                <div
                                    class="text-white p-3 text-center inline-flex items-center justify-center w-20 h-20 rounded-ful">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960"
                                        width="48px" fill="#C2ED47">
                                        <path
                                            d="M360-640v-60h360v60H360Zm0 120v-60h360v60H360Zm140 380H180h320Zm0 60H225q-43.75 0-74.37-30.63Q120-141.25 120-185v-135h120v-560h600v381q-15-2-30.37-.03-15.38 1.97-29.63 7.03v-328H300v500h292l-60 60H180v75q0 19.12 13 32.06Q206-140 224-140h276v60Zm60 0v-123l221-220q9-9 20-13t22-4q12 0 23 4.5t20 13.5l37 37q9 9 13 20t4 22q0 11-4.5 22.5T902.09-300L683-80H560Zm300-263-37-37 37 37ZM620-140h38l121-122-18-19-19-18-122 121v38Zm141-141-19-18 37 37-18-19Z" />
                                    </svg>
                                </div>
                                <h6 class="mt-2 text-xl font-semibold text-white">Program</h6>
                                <p class="mt-2 mb-4 text-white">
                                    Dapatkan informasi terkini mengenai program atau artikel kesehatan
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class=" w-1/4 text-center">
                        <div class="relative flex flex-col min-w-0 break-words bg-[#6F9F29] w-full">
                            <div class="px-4 py-5 flex-auto">
                                <div
                                    class="text-white p-3 text-center inline-flex items-center justify-center w-20 h-20 rounded-full ">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960"
                                        width="48px" fill="#C2ED47">
                                        <path
                                            d="M440-120v-60h340v-304q0-123.69-87.32-209.84Q605.36-780 480-780q-125.36 0-212.68 86.16Q180-607.69 180-484v244h-20q-33 0-56.5-23.5T80-320v-80q0-21 10.5-39.5T120-469l3-53q8-68 39.5-126t79-101q47.5-43 109-67T480-840q68 0 129 24t109 66.5Q766-707 797-649t40 126l3 52q19 9 29.5 27t10.5 38v92q0 20-10.5 38T840-249v69q0 24.75-17.62 42.37Q804.75-120 780-120H440Zm-80.18-290q-12.82 0-21.32-8.68-8.5-8.67-8.5-21.5 0-12.82 8.68-21.32 8.67-8.5 21.5-8.5 12.82 0 21.32 8.68 8.5 8.67 8.5 21.5 0 12.82-8.68 21.32-8.67 8.5-21.5 8.5Zm240 0q-12.82 0-21.32-8.68-8.5-8.67-8.5-21.5 0-12.82 8.68-21.32 8.67-8.5 21.5-8.5 12.82 0 21.32 8.68 8.5 8.67 8.5 21.5 0 12.82-8.68 21.32-8.67 8.5-21.5 8.5ZM241-462q-7-106 64-182t177-76q87 0 151 57.5T711-519q-89-1-162.5-50T434.72-698Q419-618 367.5-555.5T241-462Z" />
                                    </svg>
                                </div>
                                <h6 class=" mt-2 text-xl font-semibold text-white">Layanan</h6>
                                <p class="mt-2 mb-4 text-white">
                                    Kemudahan akses untuk menemukan Dokter Hewan Terdekat
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class=" w-1/4 text-center">
                        <div class="relative flex flex-col min-w-0 break-words bg-[#6F9F29] w-full">
                            <div class="px-4 py-5 flex-auto">
                                <div
                                    class="text-white p-3 text-center inline-flex items-center justify-center w-20 h-20 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960"
                                        width="48px" fill="#C2ED47">
                                        <path
                                            d="M180-120q-24 0-42-18t-18-42v-600q0-24 18-42t42-18h462l198 198v462q0 24-18 42t-42 18H180Zm0-60h600v-428.57H609V-780H180v600Zm99-111h402v-60H279v60Zm0-318h201v-60H279v60Zm0 159h402v-60H279v60Zm-99-330v171.43V-780v600-600Z" />
                                    </svg>
                                </div>
                                <h6 class="mt-2 text-xl font-semibold text-white">Laporan</h6>
                                <p class="mt-2 mb-4 text-white">
                                    Diagnosis lengkap kondisi kesehatan sapi dalam bentuk laporan terstruktur
                                </p>
                            </div>
                        </div>
                    </div>
        </section>
        <!-- component -->
        <section class="flex justify-center items-center">
            <div class="2xl:mx-auto 2xl:container lg:px-20 lg:py-4 md:py-1 md:px-6 py-9 px-4 w-96 sm:w-auto">
                <div role="main" class="flex flex-col items-center justify-center">
                    <h1 class="text-4xl font-semibold leading-9 text-center text-gray-800">Artikel
                        Kesehatan Sapi</h1>
                    <p
                        class="text-base leading-normal text-center text-gray-600 dark:text-white mt-4 lg:w-1/2 md:w-10/12 w-11/12">
                        Baca artikel tentang kesehatan sapi agar sapi Anda tetap sehat sehingga menghasilkan daging dan
                        susu berkualitas.</p>
                </div>
                <div class="lg:flex items-stretch md:mt-12 mt-8">
                    <div class="lg:w-full">
                        <div class="sm:flex items-center justify-between xl:gap-x-8 gap-x-6">
                            <div class="sm:w-1/3 relative">
                                <div>
                                    <p class="p-6 text-xs font-medium leading-3 text-white absolute top-0 right-0">1
                                        April 2024</p>
                                    <div class="absolute bottom-0 left-0 p-6">
                                        <h2 class="text-xl font-semibold 5 text-white">Pentingnya Vaksinasi untuk Sapi
                                        </h2>
                                        <p class="text-base leading-4 text-white mt-2">Vaksinasi teratur membantu
                                            mencegah penyakit menular pada sapi dan meningkatkan kualitas kesehatan
                                            ternak.</p>
                                        <a href="javascript:void(0)"
                                            class="focus:outline-none focus:underline flex items-center mt-4 cursor-pointer text-white hover:text-gray-200 hover:underline">
                                            <p class="pr-2 text-sm font-medium leading-none">Baca Selengkapnya</p>
                                            <svg class="fill-stroke" width="16" height="16"
                                                viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.75 12.5L10.25 8L5.75 3.5" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <img src="https://kampungkb.bkkbn.go.id/storage/17/1702/170216/1702162011/46605/intervensi/2023/07/27/570619/16904595860.jpeg" class="w-[325px] h-[330px] object-cover" alt="Vaksinasi Sapi" />
                            </div>
                            <div class="sm:w-1/3 sm:mt-0 mt-4 relative">
                                <div>
                                    <p class="p-6 text-xs font-medium leading-3 text-white absolute top-0 right-0">12
                                        April 2024</p>
                                    <div class="absolute bottom-0 left-0 p-6">
                                        <h2 class="text-xl font-semibold 5 text-white">Manfaat Nutrisi Tepat untuk Sapi
                                        </h2>
                                        <p class="text-base leading-4 text-white mt-2">Pemilihan nutrisi yang tepat
                                            esensial untuk kesehatan dan produktivitas sapi.</p>
                                        <a href="javascript:void(0)"
                                            class="focus:outline-none focus:underline flex items-center mt-4 cursor-pointer text-white hover:text-gray-200 hover:underline">
                                            <p class="pr-2 text-sm font-medium leading-none">Baca Selengkapnya</p>
                                            <svg class="fill-stroke" width="16" height="16"
                                                viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.75 12.5L10.25 8L5.75 3.5" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <img src="https://akcdn.detik.net.id/community/media/visual/2022/06/18/vaksinasi-pmk-di-sidoarjo_169.jpeg?w=700&q=90" class="w-[325px] h-[330px] object-cover" alt="Nutrisi Sapi" />
                            </div>
                            <div class="sm:w-1/3 sm:mt-0 mt-4 relative">
                                <div>
                                    <p class="p-6 text-xs font-medium leading-3 text-white absolute top-0 right-0">12
                                        April 2024</p>
                                    <div class="absolute bottom-0 left-0 p-6">
                                        <h2 class="text-xl font-semibold 5 text-white">Manfaat Nutrisi Tepat untuk Sapi
                                        </h2>
                                        <p class="text-base leading-4 text-white mt-2">Pemilihan nutrisi yang tepat
                                            esensial untuk kesehatan dan produktivitas sapi.</p>
                                        <a href="javascript:void(0)"
                                            class="focus:outline-none focus:underline flex items-center mt-4 cursor-pointer text-white hover:text-gray-200 hover:underline">
                                            <p class="pr-2 text-sm font-medium leading-none">Baca Selengkapnya</p>
                                            <svg class="fill-stroke" width="16" height="16"
                                                viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.75 12.5L10.25 8L5.75 3.5" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <img src="https://klikjatim.com/wp-content/uploads/2022/06/IMG-20220628-WA0090.jpg" class="w-[325px] h-[330px] object-cover" alt="Nutrisi Sapi" />
                            </div>
                        </div>
                        <div class="relative w-full flex justify-center">
                            <div class="sm:w-1/3 sm:mt-4 mt-4 relative mx-2">
                                <div>
                                    <p class="p-6 text-xs font-medium leading-3 text-white absolute top-0 right-0">12
                                        April 2024</p>
                                    <div class="absolute bottom-0 left-0 p-6">
                                        <h2 class="text-xl font-semibold 5 text-white">Manfaat Nutrisi Tepat untuk Sapi
                                        </h2>
                                        <p class="text-base leading-4 text-white mt-2">Pemilihan nutrisi yang tepat
                                            esensial untuk kesehatan dan produktivitas sapi.</p>
                                        <a href="javascript:void(0)"
                                            class="focus:outline-none focus:underline flex items-center mt-4 cursor-pointer text-white hover:text-gray-200 hover:underline">
                                            <p class="pr-2 text-sm font-medium leading-none">Baca Selengkapnya</p>
                                            <svg class="fill-stroke" width="16" height="16"
                                                viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.75 12.5L10.25 8L5.75 3.5" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <img src="https://akcdn.detik.net.id/community/media/visual/2022/06/18/vaksinasi-pmk-di-sidoarjo_169.jpeg?w=700&q=90" class="w-[325px] h-[330px] object-cover" alt="Nutrisi Sapi" />
                            </div>
                            <div class="sm:w-1/3 sm:mt-4 mt-4 relative mx-2">
                                <div>
                                    <p class="p-6 text-xs font-medium leading-3 text-white absolute top-0 right-0">12
                                        April 2024</p>
                                    <div class="absolute bottom-0 left-0 p-6">
                                        <h2 class="text-xl font-semibold 5 text-white">Manfaat Nutrisi Tepat untuk Sapi
                                        </h2>
                                        <p class="text-base leading-4 text-white mt-2">Pemilihan nutrisi yang tepat
                                            esensial untuk kesehatan dan produktivitas sapi.</p>
                                        <a href="javascript:void(0)"
                                            class="focus:outline-none focus:underline flex items-center mt-4 cursor-pointer text-white hover:text-gray-200 hover:underline">
                                            <p class="pr-2 text-sm font-medium leading-none">Baca Selengkapnya</p>
                                            <svg class="fill-stroke" width="16" height="16"
                                                viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.75 12.5L10.25 8L5.75 3.5" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <img src="https://akcdn.detik.net.id/community/media/visual/2022/06/18/vaksinasi-pmk-di-sidoarjo_169.jpeg?w=700&q=90" class="w-[325px] h-[330px] object-cover" alt="Nutrisi Sapi" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>

        {{-- Program --}}
        <section>
            <div class="min-h-[500px] flex flex-col p-4 sm:p-4 md:p-4 justify-center bg-[#E2E8F0]">
                <!-- Themes: blue, purple and teal -->
                <div class="mx-auto max-w-6xl">
                    <h2 class="sr-only">Featured case study</h2>
                    <section class="font-sans text-black">
                        <div
                            class="[ lg:flex lg:items-center ] [ fancy-corners fancy-corners--large fancy-corners--top-left fancy-corners--bottom-right ]">
                            <div class="flex-shrink-0 self-stretch sm:flex-basis-40 md:flex-basis-50 xl:flex-basis-60">
                                <div class="h-full">
                                    <article class="h-full">
                                        <div class="h-full">
                                            <img class="h-full object-cover"
                                                src="https://kempalan.com/wp-content/uploads/2023/10/WhatsApp-Image-2023-09-30-at-11.13.37.jpeg"
                                                width="733" height="412" alt='""' typeof="foaf:Image" />
                                        </div>
                                    </article>
                                </div>
                            </div>
                            <div class="p-6 bg-grey">
                                <div class="leading-relaxed">
                                    <h2 class="leading-tight text-4xl font-bold">Program Vaksinasi Penyakit Kuku dan
                                        Mulut</h2>
                                    <p class="mt-4 mb-8">Dapatkan informasi vaksinasi melalui menu program, dapatkan
                                        penangan segera melalui penjadwalan yang telah disediakan oleh Dinas Peternakan
                                        Kota Jember.</p>
                                    <p><a class="mt-4 button bg-[#6F9F29] p-4 text-white font-semibold hover:bg-[#6F9F29]/80 rounded-[2px]"
                                            href="/register">Daftar
                                            Sekarang</a></p>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>
        {{-- Bagian Footer --}}
        <footer>
            <div class="bg-gray-800 py-4 text-gray-400 ">
                <div class="container px-4 mx-auto flex justify-between">
                    <div class="mx-4 flex flex-warp justify-between">
                        <div class="px-4 my-4 w-full">
                            <a href="/" class="block w-56 mb-10">
                                <text class="text-white font-bold text-4xl">
                                    <tspan>Sapi Sehat Jember</tspan>
                                </text>
                            </a>
                            <p class="text-justify">
                                Sapi Sehat Jember merupakan sistem pelayanan kesehatan sapi menuju peternakan
                                berkelanjutan berbasis web yang menyediakan layanan konsultasi antara peternak dan
                                dokter hewan yang mudah diakses di bawah naungan pemerintah.
                            </p>
                        </div>

                        <div class="px-4 my-4 w-full sm:w-auto">
                            <div>
                                <h2 class="inline-block text-2xl pb-4 mb-4 border-b-4 border-blue-600">Company</h2>
                            </div>
                            <ul class="leading-8">
                                <li><a href="#" class="hover:text-blue-400">About Us</a></li>
                                <li><a href="#" class="hover:text-blue-400">Terms &amp; Conditions</a></li>
                                <li><a href="#" class="hover:text-blue-400">Privacy Policy</a></li>
                                <li><a href="#" class="hover:text-blue-400">Contact Us</a></li>
                            </ul>
                        </div>
                        <div class="px-4 my-4 w-full sm:w-auto">
                            <div>
                                <h2 class="inline-block text-2xl pb-4 mb-4 border-b-4 border-blue-600">Connect With Us
                                </h2>
                            </div>
                            <a href="#"
                                class="inline-flex items-center justify-center h-8 w-8 border border-gray-100 rounded-full mr-1 hover:text-blue-400 hover:border-blue-400">
                                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 320 512">
                                    <path
                                        d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z">
                                    </path>
                                </svg>
                            </a>
                            <a href="#"
                                class="inline-flex items-center justify-center h-8 w-8 border border-gray-100 rounded-full mr-1 hover:text-blue-400 hover:border-blue-400">
                                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z">
                                    </path>
                                </svg>
                            </a>
                            <a href="#"
                                class="inline-flex items-center justify-center h-8 w-8 border border-gray-100 rounded-full mr-1 hover:text-blue-400 hover:border-blue-400">
                                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 448 512">
                                    <path
                                        d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z">
                                    </path>
                                </svg>
                            </a>
                            <a href="#"
                                class="inline-flex items-center justify-center h-8 w-8 border border-gray-100 rounded-full mr-1 hover:text-blue-400 hover:border-blue-400">
                                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 496 512">
                                    <path
                                        d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3.3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5.3-6.2 2.3zm44.2-1.7c-2.9.7-4.9 2.6-4.6 4.9.3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3.7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3.3 2.9 2.3 3.9 1.6 1 3.6.7 4.3-.7.7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3.7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3.7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z">
                                    </path>
                                </svg>
                            </a>
                            <a href="#"
                                class="inline-flex items-center justify-center h-8 w-8 border border-gray-100 rounded-full hover:text-blue-400 hover:border-blue-400">
                                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-800 text-white text-center p-4 mt-1">
                Hak Cipta © 2024 Dinas Peternakan Jember
            </div>
</body>

</html>