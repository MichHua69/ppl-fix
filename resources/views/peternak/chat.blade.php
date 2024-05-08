<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat App Template</title>
    <link rel="stylesheet" href="{{ asset("assets/css/chat.css") }}">
</head>
    <header class="">
      @include ('peternak.navbar')
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
                            @foreach($data['friends'] as $friend)
                            @php
                                $avatar = $friend->avatar;
                                if ($avatar != null) {
                                    // Mengatur jalur foto avatar jika ada
                                    $avatar = 'storage/'.$friend->avatar;
                                } else {
                                    // Mengatur jalur foto default jika tidak ada foto avatar
                                    $avatar = '/images/defaultprofile.png';
                                }
                            @endphp
                                <div class="friends" data-id="{{ $friend->id }}" data-name="{{ $friend->nama_pengguna }}" data-avatar=
                                    "{{asset($avatar)}}">
                                    <!-- photo -->
                                    <div class="profile friends-photo border-2 border-white">
                                        <img src="{{ asset($avatar) }}" alt="" >
                                    </div>

                                    <div class="friends-credent">
                                        <!-- name -->
                                        <span class="friends-name">{{ $friend->nama_pengguna }}</span>
                                        <!-- last message -->
                                        {{-- <span class="friends-message friend-status">Offline</span> --}}
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
                            <button id="" type="submit" class="btn-send absolute"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 72 72" id="Mail-Send-Email-Message--Streamline-Plump" height="30" width="30"><desc>Mail Send Email Message Streamline Icon: https://streamlinehq.com</desc><g id="mail-send-email-message--send-email-paper-airplane-deliver"><path id="Union" fill="#538D22" d="M7.4451 0.98895C3.7899000000000003 -0.2808 0.42599999999999993 3.1611000000000002 1.8231000000000002 6.7844999999999995C5.17755 15.483899999999998 9.25755 24.113400000000002 11.18145 28.06935C11.97735 29.696849999999998 13.371299999999998 30.95385 15.072 31.57815L27.011400000000002 36.000299999999996L15.07215 40.423950000000005C13.3716 41.0478 11.97765 42.3042 11.18145 43.9311C9.25755 47.88705 5.17905 56.51655 1.8231000000000002 65.21610000000001C0.42599999999999993 68.8395 3.7899000000000003 72.27975 7.4451 71.0115C19.7265 66.7533 45.63735 56.69160000000001 67.9422 40.90935C71.3529 38.52525 71.3529 33.47535 67.9422 31.09125C45.63735 15.30885 19.7265 5.2488 7.4451 0.98895Z" stroke-width="1"></path></g></svg></button>
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
    </body>
</html>
