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
                                <div class="friends tes" data-id="{{ $friend->id }}" data-name="{{ $friend->dokterhewan->nama }}" data-avatar="{{ asset($avatar) }}">
                                    <div class="profile friends-photo border-2 border-white">
                                        <img class="w-10 h-10 rounded-full object-cover" src="{{ asset($avatar) }}" alt="">
                                    </div>
                                    <div class="friends-credent">
                                        <span class="friends-name">{{ $friend->dokterhewan->nama }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>



                    <!-- RIGHT SECTION -->
                    <section id="main-empty" class="main-right-empty">
                        <div class="flex items-center justify-center">
                            <p class="text-center text-3xl">Mitra resmi dari Dinas Ketahanan Pangan dan Peternakan Kabupaten Jember</p>
                        </div>
                        <div class="flex items-center px-8">
                            <div class="mx-auto w-full">
                                <div class="relative w-full">
                                    <input type="search" id="search-dropdown"
                                        class="block p-2.5 w-full z-20 text-md text-gray-900 bg-gray-50 rounded-e-lg border-gray-300 border-1 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                                        placeholder="Cari Dokter" required />
                                    <button type="submit"
                                        class="absolute top-0 right-0 p-2.5 text-sm font-medium border-gray-300 h-full text-white bg-primary rounded-e-lg border hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                        </svg>
                                        <span class="sr-only">Search</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="justify-center overflow-y-scroll px-8 mt-2 h-full" style="scrollbar-width: none">
                            <!-- user lists for unrelated users -->
                            @foreach($friendsWithoutId as $friend)
                                @php
                                    $avatar = $friend->avatar ? 'profil/'.$friend->avatar : '/images/defaultprofile.png';
                                @endphp
                                <div data-id="{{ $friend->id }}" data-name="{{ $friend->dokterhewan->nama }}" data-avatar="{{ asset($avatar) }}" class="rooms w-full mb-4 border border-gray-400 cursor-pointer bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col leading-normal friends kanan h-36" style="grid-template-columns: none">
                                    <div class="flex items-center px-5 w-full">
                                        <img class="w-10 h-10 rounded-full object-cover mr-4" src="{{ asset($avatar) }}" alt="Avatar of {{ $friend->dokterhewan->nama }}">
                                        <span class="text-gray-900 leading-none">{{ $friend->dokterhewan->nama }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{-- <div class="flex flex-wrap justify-center overflow-y-scroll px-8 mt-2" style="scrollbar-width: none">
                            <!-- user lists for unrelated users -->
                            @foreach($friendsWithoutId as $friend)
                                @php
                                    $avatar = $friend->avatar ? 'profil/'.$friend->avatar : '/images/defaultprofile.png';
                                @endphp
                                <div data-id="{{ $friend->id }}" data-name="{{ $friend->dokterhewan->nama }}" data-avatar="{{ asset($avatar) }}" class="rooms w-full mb-4 border border-gray-400 cursor-pointer bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col leading-normal friends kanan h-36" style="grid-template-columns: none">
                                    <div class="flex items-center px-5 w-full">
                                        <img class="w-10 h-10 rounded-full object-cover mr-4" src="{{ asset($avatar) }}" alt="Avatar of {{ $friend->dokterhewan->nama }}">
                                        <span class="text-gray-900 leading-none">{{ $friend->dokterhewan->nama }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div> --}}
                    </section>

                    <section id="main-right" class="main-right hidden">
                        <!-- header -->
                        <div id="header-right" class="header-right ">
                            <!-- profile pict -->
                            <div id="back" class="cursor-pointer flex gap-2 items-center"><svg style="transform: rotate(-90deg);" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14" id="Arrow-Up-1--Streamline-Core" height="24" width="24"><desc>Arrow Up 1 Streamline Icon: https://streamlinehq.com</desc><g id="arrow-up-1--arrow-up-keyboard"><path id="Union" fill="#000000" fill-rule="evenodd" d="M6.64645 0.146447c0.19526 -0.1952625 0.51184 -0.1952625 0.7071 0L10.8536 3.64645c0.143 0.143 0.1857 0.35805 0.1083 0.54489 -0.0774 0.18684 -0.2597 0.30866 -0.4619 0.30866H8V13c0 0.5523 -0.44772 1 -1 1 -0.55229 0 -1 -0.4477 -1 -1V4.5H3.5c-0.20223 0 -0.38455 -0.12182 -0.46194 -0.30866 -0.07739 -0.18684 -0.03461 -0.40189 0.10839 -0.54489l3.5 -3.500003Z" clip-rule="evenodd" stroke-width="1"></path></g></svg> Kembali</div>
                            <div id="header-img" class="profile header-img friends-photo border-2 border-white">
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
    <input type="hidden" name="" id="room-url" value="{{route('room.create')}}">
    <input type="hidden" name="" id="messsage-url" value="{{route('chat.save')}}">
    <input type="hidden" name="" id="load-chat-url" value="{{route('chat.load',["roomId" => ":roomId"])}}">


    @vite('resources/js/bootstrap.js')
    @vite('resources/js/app.js')
    <script src="{{ asset("assets/js/chat.js") }}"></script>

    <script>
        // Function to handle sending message
        function handleSendMessage() {
            let message = document.getElementById("type-area").value;
            let roomId = previousRoomId; // Get the current room ID
            if (message.trim() !== "") {
                sendMessage(message, roomId);
                document.getElementById("type-area").value = ""; // Clear the input field after sending
            }
        }

        // Add event listener to send button
        document.getElementById("send-button").addEventListener("click", handleSendMessage);

        // Add event listener to input field to send message on pressing Enter
        document.getElementById("type-area").addEventListener("keydown", function(event) {
            if (event.key === "Enter") {
                handleSendMessage();
            }
        });
    </script>

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search-dropdown');
    const friends = document.querySelectorAll('.rooms');

    searchInput.addEventListener('input', function() {
        const query = searchInput.value.toLowerCase();

        friends.forEach(friend => {
            const name = friend.getAttribute('data-name').toLowerCase();
            if (name.includes(query)) {
                // friend.style.display = 'grid';
                friend.classList.remove("hidden");
            } else {
                friend.classList.add("hidden");
                // friend.style.display = 'none';
            }
        });
    });
});

    </script> --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('search-dropdown');
            const friends = document.querySelectorAll('.rooms');

            searchInput.addEventListener('input', function() {
                const query = searchInput.value.toLowerCase();

                friends.forEach(friend => {
                    const name = friend.getAttribute('data-name').toLowerCase();
                    if (name.includes(query)) {
                        // friend.classList.remove('hidden');
                        friend.style.display = 'grid';

                    } else {
                        // friend.classList.add('hidden');
                        friend.style.display = 'none';

                    }
                });
            });
        });
    </script>




    </body>
</html>
