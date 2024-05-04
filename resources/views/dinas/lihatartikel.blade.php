<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Konsultasi</title>
</head>

<body class="bg-primary">
    <header class="absolute inset-x-0 top-0 z-50">
        @include ('dinas.navbar')
    </header>
    <section class="h-full">
        <div class="bg-primary pt-20 mt-6 h-full pb-1">
            <div class="px-6 py-10 mx-auto h-full flex justify-center">
                <div class="container bg-secondary rounded-lg shadow-lg min-h-[80vh] p-24 relative">
                    @if($artikel->id_pengguna==$user->id)
                        <button type="button" class="inline-block rounded rounded-lg text-center py-2 text-xl font-bold uppercase leading-normal text-white shadow-dark-3 transition duration-150 ease-in-out bg-primary hover:bg-primary-light min-w-32 absolute right-4 top-4" type="button"
                        id="add-profile-button"
                        onclick="window.location='{{route('dinas.editartikel',['id' => $artikel->id])}}'"
                        data-twe-ripple-init
                        data-twe-ripple-color="light">
                        EDIT
                        </button> 
                    @endif
                    {{-- Tampilkan data artikel --}}
                    @if ($artikel->gambar)
                        <div class="grid grid-cols-2 gap-6 mb-4">
                            <div class="w-full">
                                <img class="rounded-lg w-full" src="/artikel/{{ $artikel->gambar }}" alt="">
                            </div>
                            <div class="">
                                
                                <div class="font-semibold text-4xl">{{ $artikel->judul_artikel }}</div>
                                <div class="flex gap-2 my-4 text-lg">
                                    <div class="">{{ $artikel->created_at->format('d/m/Y H:i T') }}</div>
                                    <div class="">Penulis : {{$penulis->nama}}</div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="">
                            <div class="font-semibold text-4xl">{{ $artikel->judul_artikel }}</div>
                            <div class="flex gap-2 my-4 text-lg">
                                <div class="">{{ $artikel->created_at->format('d/m/Y H:i T') }}</div>
                                <div class="">Penulis : {{$penulis->nama}}</div>
                            </div>
                        </div>
                    @endif

                    <div class="text-sm">{!! $artikel->isi_artikel !!}</div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
