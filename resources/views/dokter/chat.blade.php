<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat App Template</title>
    <link rel="stylesheet" href="{{ asset("assets/css/chat.css") }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        .sends:hover path {
    fill: #69CF3A; /* Ganti dengan warna yang diinginkan */
}
    </style>
</head>
    <header class="">
      @include ('dokter.navbar')
    </header>
    <body>
        <div class="relative h-full">
            <div id="app" class="app">
                        <!-- LEFT SECTION -->

                    <section id="main-left" class="main-left">
                        <!-- header -->

                        <div id="header-left" class="header-left place-items-center text-3xl text-bold">
                                Konsultasi
                        </div>

                        <!-- chat list -->
                        <div id="chat-list" class="chat-list">
                            <!-- user lists -->
                            @foreach($friendsWithId as $friend)
                            @php
                                $avatar = $friend->avatar ? 'storage/'.$friend->avatar : '/images/defaultprofile.png';
                            @endphp
                            <div class="friends tes" data-id="{{ $friend->id }}" data-name="{{ $friend->nama_pengguna }}" data-avatar="{{ asset($avatar) }}">
                                <div class="profile friends-photo border-2 border-white">
                                    <img src="{{ asset($avatar) }}" alt="">
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
                        {{-- <div class="flex">

                            <div>
                                <a href="#" class="flex items-center gap-5 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 ">
                                    <img class="w-24 h-24 rounded-full " src="{{asset($photo)}}" alt="">
                                    <div>
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$aktor->nama}}</h5>
                                        <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                                    </div>
                                </a>
                            </div>
                        </div> --}}
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
                            <button id="send-button" type="button" class="btn-send absolute">
                                <svg class="sends" xmlns="http://www.w3.org/2000/svg" fill="#538D22" viewBox="0 0 72 72" id="Mail-Send-Email-Message--Streamline-Core" height="30" width="30">
                                    <desc>Mail Send Email Message Streamline Icon: https://streamlinehq.com</desc><g id="mail-send-email-message--send-email-paper-airplane-deliver"><path id="Subtract" fill="#538D22" fill-rule="evenodd" d="M71.24708571428572 0.7532280000000001c0.7184571428571429 0.7185600000000001 0.9462857142857143 1.7928977142857145 0.581657142857143 2.7413640000000004L46.11430285714286 70.3517142857143c-0.3719314285714286 0.966857142857143 -1.2879257142857143 1.6164000000000003 -2.323594285714286 1.6472571428571428 -1.0356685714285716 0.03085714285714286 -1.9885885714285716 -0.5631428571428572 -2.4173485714285716 -1.5063428571428572L30.61985142857143 46.83497142857143l15.821845714285717 -15.821845714285717c1.5062914285714286 -1.5062914285714286 1.5062914285714286 -3.9485314285714286 0 -5.454822857142857s-3.9485314285714286 -1.5062914285714286 -5.454822857142857 0L25.164977142857143 41.38020000000001 1.5073714285714288 30.626742857142858c-0.9432462857142857 -0.42876000000000003 -1.5370241657142858 -1.3817314285714288 -1.5062284440000002 -2.4174C0.03193889142857143 27.173725714285716 0.6812948571428572 26.257680000000004 1.6483474285714288 25.88574857142857L68.50542857142857 0.1714710857142857c0.9483428571428573 -0.36479417142857146 2.022685714285714 -0.13680437142857144 2.741657142857143 0.5817569142857143Z" clip-rule="evenodd" stroke-width="1"></path></g>
                                </svg>
                            </button>
                        </div>
                    </section>
                {{-- </div> --}}

            </div>
        </div>
    <input type="hidden" name="" id="room-url" value="{{route('dokter.room.create')}}">
    <input type="hidden" name="" id="messsage-url" value="{{route('dokter.chat.save')}}">
    <input type="hidden" name="" id="load-chat-url" value="{{route('dokter.chat.load',["roomId" => ":roomId"])}}">


    @vite('resources/js/bootstrap.js')
    @vite('resources/js/app.js')


    <script src="{{ asset("assets/js/chat.js") }}"></script>
    </body>
</html>
