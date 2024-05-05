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
        @include ('peternak.navbar')
    </header>
    <section class="h-full">
        <div class="bg-primary pt-20 mt-6 h-full pb-1">
            <div class="px-6 py-10 mx-auto h-full flex justify-center">
                <div class="container bg-secondary rounded-lg shadow-lg min-h-[80vh] p-12">
                    <div class="py-4 font-semibold text-3xl">Program</div>
                    <div class="grid grid-cols-3 gap-6">
                        {{-- Hero card --}}
                        <div class="relative flex flex-col gap-2 bg-gray-200 rounded-lg p-4 overflow-hidden max-h shadow-xl col-span-3 row-span-2 hero-card">

                            <div class="font-semibold text-lg h-8 overflow-hidden">{{$latestProgram->nama_program}}</div>
                            <div class="text-sm h-52 overflow-hidden">{!! $latestProgram->deskripsi !!}</div>
                            <a class="absolute bottom-0 right-0 m-2 py-1 px-6 bg-white rounded-full shadow-md font-semibold" href="{{ route('peternak.lihatprogram', ['id' => $latestProgram->id]) }}">Lihat</a>
                        </div>
            
                        {{-- Program biasa --}}
                        @foreach($program as $program)
                            <div class="relative flex flex-col gap-2 bg-gray-200 rounded-lg p-4 overflow-hidden max-h shadow-xl col-span-1 row-span-1 regular-card">
                                <div class="font-semibold text-lg h-16 overflow-hidden">{{$program->nama_program}}</div>
                                <div class="text-sm h-48 overflow-hidden">{!! $program->deskripsi !!}</div>
                                <a class="absolute bottom-0 right-0 m-2 py-1 px-6 bg-white rounded-full shadow-md font-semibold" href="{{ route('peternak.lihatprogram', ['id' => $program->id]) }}">Lihat</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
    </script>
</body>

</html>
