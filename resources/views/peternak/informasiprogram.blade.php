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
        @include ('peternak.navbar')
    </header>
    <section class="h-full">
      <div class="bg-primary pt-20 mt-6 h-full pb-1">
        <div class="px-6 py-10 mx-auto h-full flex justify-center">
          <div class="container bg-secondary rounded-lg shadow-lg h-full relative p-12">
            <div class="relative flex items-center w-full justify-center">
              <div class="flex items-center">
                <span class="px-2 py-4 bg-primary rounded-lg mx-auto text-3xl text-secondary font-semibold">Informasi dan Program Dinas Ketahanan Pangan dan Peternakan Kabupaten Jember</span>
              </div>

            </div>
            <div class="py-4 font-semibold text-3xl">Artikel</div>
            <div class="grid grid-cols-4 gap-4">
                @foreach($latestArticles as $article)
                    @if($article->gambar)
                      <div class="relative flex flex-col gap-2 bg-gray-200 rounded-lg p-4 overflow-hidden h-full max-h shadow-xl">
                        <img class="h-36 object-cover rounded-lg" src="/artikel/{{$article->gambar}}" alt="">
                        <div class="font-semibold text-lg h-8 overflow-hidden">{{$article->judul_artikel}}</div>
                        <div class="text-sm h-20 overflow-hidden">{!! $article->isi_artikel !!}</div>
                        <a class="absolute bottom-0 right-0 m-2 py-1 px-6 bg-white rounded-full shadow-md" href="{{ route('peternak.lihatartikel', ['id' => $article->id]) }}">Lihat</a>
                    </div>
                    @else
                    <div class="relative flex flex-col gap-2 bg-gray-200 rounded-lg p-4 overflow-hidden h-full max-h shadow-xl">
                      <div class="font-semibold text-lg h-16 overflow-hidden">{{$article->judul_artikel}}</div>
                      <div class="text-sm h-48 overflow-hidden">{!! $article->isi_artikel !!}</div>
                      <a class="absolute bottom-0 right-0 m-2 py-1 px-6 bg-white rounded-full shadow-md" href="{{ route('peternak.lihatartikel', ['id' => $article->id]) }}">Lihat</a>
                  </div>
                  @endif
                @endforeach
            </div>            
            <div class="mt-6 flex justify-end">
              <button class="shadow-md p-4 rounded-full font-medium hover:text-secondary hover:bg-primary" onclick="window.location.href='{{ route('peternak.artikel') }}'">Lihat Selengkapnya ></button>
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
