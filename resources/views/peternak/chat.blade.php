<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat App Template</title>
    <link rel="stylesheet" href="{{ asset("assets/css/chat.css") }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
    <header class="">
      @include ('peternak.navbar')
    </header>
    <body>
        <div class="relative h-full">
            <div id="app" class="app">
                     <!-- LEFT SECTION -->
                    <section id="main-left" class="main-left">
                        <div id="header-left" class="header-left place-items-center text-3xl font-bold">
                            Konsultasi
                        </div>
                        <div id="chat-list" class="chat-list" data-load-url="{{ route('load.kirian') }}">
                            <!-- user lists for related users -->
                            @foreach($friendsWithId as $friend)
                                @php
                                    $avatar = $friend->avatar ? 'profil/'.$friend->avatar : '/images/defaultprofile.png';
                                @endphp
                                <div class="friends tes" data-id="{{ $friend->id }}" data-name="{{ $friend->nama_pengguna }}" data-avatar="{{ asset($avatar) }}">
                                    <div class="profile friends-photo border-2 border-white">
                                        <img class="w-10 h-10 rounded-full object-cover" src="{{ asset($avatar) }}" alt="">
                                    </div>
                                    <div class="friends-credent">
                                        <span class="friends-name">{{ $friend->nama_pengguna }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>



                    <!-- RIGHT SECTION -->
                    <section id="main-empty" class="main-right place-items-center">
                        <div>
                            <p style="text-align: center; font-size: 30px">Mitra resmi dari Dinas Ketahanan Pangan dan Peternakan Kabupaten Jember</p>
                        </div>
                        <div class="flex flex-wrap justify-center" >
                            <!-- user lists for unrelated users -->
                            @foreach($friendsWithoutId as $friend)
                                @php
                                    $avatar = $friend->avatar ? 'profil/'.$friend->avatar : '/images/defaultprofile.png';
                                @endphp
                                <div id='kanan' id data-id="{{ $friend->id }}" data-name="{{ $friend->nama_pengguna }}" data-avatar="{{ asset($avatar) }}" class="rooms w-1/5 mb-4 border border-gray-400 cursor-pointer bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal ml-5 friends right">
                                    <div class="flex items-center">
                                        <img class="w-10 h-10 rounded-full object-cover mr-4" src="{{ asset($avatar) }}" alt="Avatar of Jonathan Reinink">
                                        <div class="text-sm ">
                                            <p class="text-gray-900 leading-none ">{{ $friend->nama_pengguna }}</p>
                                            <p class="text-gray-600">Offline</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                    <section id="main-right" class="main-right hidden">
                        <!-- header -->
                        <div id="header-right" class="header-right ">
                            <!-- profile pict -->
                            <div id="back" class="cursor-pointer">Kembali</div>
                            <div id="header-img" class="profile header-img">
                                {{-- <img src="{{ asset("assets/images/ava2.jpg") }}" alt=""> --}}
                            </div>

                            <!-- name -->
                            <h4 class="name friend-name">Mario Gomez</h4>
                        </div>

                        <!-- chat area -->
                        <div id="chat-area" class="chat-area">
                            <!-- chat content -->

                        </div>

                        <!-- typing area -->
                        <div id="typing-area" class="typing-area">
                            <!-- input form -->
                            <input id="type-area" class="type-area" placeholder="Type something...">
                            <!-- send button -->
                        </div>
                    </section>
                {{-- </div> --}}

            </div>
        </div>
    <input type="hidden" name="" id="room-url" value="{{route('room.create')}}">
    <input type="hidden" name="" id="messsage-url" value="{{route('chat.save')}}">
    <input type="hidden" name="" id="load-chat-url" value="{{route('chat.load',["roomId" => ":roomId"])}}">


    @vite('resources/js/bootstrap.js')
    @vite('resources/js/app.js')
    <script src="{{ asset("assets/js/chat.js") }}"></script>

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <script>
        // Fungsi untuk merefresh daftar teman dengan ID yang diberikan

    </script>




    </body>
</html>

