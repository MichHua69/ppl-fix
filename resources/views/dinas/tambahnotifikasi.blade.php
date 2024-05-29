<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('title')

</head>

<body class="bg-primary">
    <header class="absolute inset-x-0 top-0 z-50">
        @include ('dinas.navbar')
    </header>
    <section class="h-full">
        <div class="bg-primary pt-20 mt-6 h-full pb-1">
            <div class="px-6 py-10 mx-auto h-full flex justify-center">
                <div class="container bg-secondary rounded-lg shadow-lg min-h-[80vh] p-12">
                    <div class="py-4 font-semibold text-3xl text center flex justify-center">Notifikasi</div>
                    <form action="{{route('dinas.pusher')}}" method="post">
                        @csrf
                        <div class="">
                            <div class="flex flex-col mb-4 w-full justify-between ">
                                <label class="basis-3/12 font-semibold text-xl" for="judul">
                                    Judul
                                </label>
                                <div class="relative basis-9/12 mt-2" data-twe-input-wrapper-init>
                                    <input type="text" name="judul" id="judul" placeholder="Masukkan Judul Notifikasi"
                                        class="peer block w-full p-3 pl-4 border border-gray-300 rounded-md shadow-sm focus:outline:none focus:ring-primary focus:border-primary @error('judul') border-red-500 @enderror"
                                        value="{{old('judul')}}" autocomplete="judul" />
                                    @error('judul')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex flex-col mb-4 w-full justify-between ">
                                <label class="basis-3/12 font-semibold text-xl" for="isi">
                                    Isi
                                </label>
                                <div class="relative basis-9/12 mt-2" data-twe-input-wrapper-init>
                                    <input type="text" name="isi" id="isi" placeholder="Masukkan Isi Notifikasi"
                                        class="peer block w-full p-3 pl-4 border border-gray-300 rounded-md shadow-sm focus:outline:none focus:ring-primary focus:border-primary @error('isi') border-red-500 @enderror"
                                        value="{{old('isi')}}" autocomplete="isi" />
                                    @error('isi')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="py-4 font-semibold text-3xl text center flex justify-center">
                                <button class="inline-block rounded rounded-lg text-center py-2 text-xl font-bold uppercase leading-normal text-white shadow-dark-3 transition duration-150 ease-in-out bg-primary hover:bg-primary-light min-w-32 px-4" type="submit" id="add-profile-button" data-twe-ripple-init data-twe-ripple-color="light">
                                    Kirim Broadcast
                                </button> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

</body>

</html>
