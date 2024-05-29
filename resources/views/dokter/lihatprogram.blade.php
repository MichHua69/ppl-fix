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
        @include ('dokter.navbar')
    </header>
    <section class="h-full">
        <div class="bg-primary pt-20 mt-6 h-full pb-1">
            <div class="px-6 py-10 mx-auto h-full flex justify-center">
                <div class="container bg-secondary rounded-lg shadow-lg min-h-[80vh] p-12 relative">
                    <button onclick="window.location.href='{{route('peternak.laporan')}}'" id="back" class="cursor-pointer flex gap-2 items-center"><svg style="transform: rotate(-90deg);" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14" id="Arrow-Up-1--Streamline-Core" height="24" width="24"><desc>Arrow Up 1 Streamline Icon: https://streamlinehq.com</desc><g id="arrow-up-1--arrow-up-keyboard"><path id="Union" fill="#000000" fill-rule="evenodd" d="M6.64645 0.146447c0.19526 -0.1952625 0.51184 -0.1952625 0.7071 0L10.8536 3.64645c0.143 0.143 0.1857 0.35805 0.1083 0.54489 -0.0774 0.18684 -0.2597 0.30866 -0.4619 0.30866H8V13c0 0.5523 -0.44772 1 -1 1 -0.55229 0 -1 -0.4477 -1 -1V4.5H3.5c-0.20223 0 -0.38455 -0.12182 -0.46194 -0.30866 -0.07739 -0.18684 -0.03461 -0.40189 0.10839 -0.54489l3.5 -3.500003Z" clip-rule="evenodd" stroke-width="1"></path></g></svg> Kembali</button>
                    @if($user->role->id==1)
                        <button type="button" class="inline-block rounded rounded-lg text-center py-2 text-xl font-bold uppercase leading-normal text-white shadow-dark-3 transition duration-150 ease-in-out bg-primary hover:bg-primary-light min-w-32 absolute right-4 top-4" type="button"
                        id="add-profile-button"
                        onclick="window.location='{{route('dokter.editprogram',['id' => $program->id])}}'"
                        data-twe-ripple-init
                        data-twe-ripple-color="light">
                        EDIT
                        </button> 
                    @endif
                        <div class="">
                            <div class="font-semibold text-4xl text-center">{{ $program->nama_program }}</div>
                            <div class="flex gap-2 my-4 text-lg justify-center">
                                <div class="">{{ $program->created_at->format('d/m/Y H:i T') }}</div>
                            </div>
                        </div>
                        <div class="">
                            <table class="w-full mt-8 border-collapse">
                                <thead>
                                    <tr>
                                        <th class="border border-gray-300 px-4 py-2">Sesi</th>
                                        <th class="border border-gray-300 px-4 py-2">Tanggal</th>
                                        <th class="border border-gray-300 px-4 py-2">Waktu Mulai</th>
                                        <th class="border border-gray-300 px-4 py-2">Waktu Selesai</th>
                                        <th class="border border-gray-300 px-4 py-2">Puskeswan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($jadwalprogram as $jadwal)
                                    <tr class="text-center">
                                        <td class="border border-gray-300 px-4 py-2">{{ $jadwal->sesi }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $jadwal->tanggal }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $jadwal->waktu_mulai }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $jadwal->waktu_selesai }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $jadwal->puskeswan->puskeswan }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    <div class=" mt-2">{!! $program->deskripsi !!}</div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
