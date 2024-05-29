<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('title')
    <style>
        body { font-family: Arial, sans-serif; }
        .modal { position: fixed; inset: 0; background: rgba(75, 85, 99, 0.75); display: flex; align-items: center; justify-content: center; z-index: 50; }
        .modal-content { background: white; padding: 2rem; border-radius: 0.5rem; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); width: 50%; height: 75%; overflow-y: auto; scrollbar-width: none;}
        .modal-content h1 { text-align: center; font-size: 2rem; font-weight: bold; margin-bottom: 1rem; }
        .modal-content h2 { margin-top: 1.5rem; font-size: 1.5rem; }
        .modal-content h3 { margin-top: 1rem; font-size: 1.25rem; }
        .modal-content ul { list-style-type: disc; padding-left: 1.5rem; }
        
    </style>
</head>

<body>
    <section class="h-full">
        <div class="flex items-center justify-center w-screen bg-cover bg-center h-screen"
            style="background-image: url('/images/bg-image.png');">
            <div class="container my-auto mx-auto items-center w-5/6 ">
                <div class="flex flex-wrap items-center justify-center w-full ">
                    <div class="w-full">
                        <div class="flex flex-col bg-secondary rounded-lg">
                            <div class="flex items-center rounded-t-lg rounded-b-2xl bg-[#538D22]">
                                <div class="flex w-full text-white p-3 justify-center items-center">
                                    <h1 class="text-2xl font-bold">Registrasi</h1>
                                </div>
                            </div>
                            <div class="text-center">
                                <img class="mx-auto w-48" src="/images/logo-image.png" alt="logo" />
                                <h4 class="mb-15 mt-1 pb-1 text-xl font-semibold">
                                    Sapi Sehat Jember
                                </h4>
                            </div>
                            <form action="{{route('register')}}" method="post">
                                @csrf
                                <div class="container flex flex-row">
                                    <div class="flex flex-col px-7 py-5 basis-1/2">
                                        <div
                                            class="flex flex-row items-center mb-4 w-full justify-between">
                                            <label class="basis-3/12" for="nama">
                                                Nama
                                            </label>
                                            <div class="relative basis-9/12"
                                                data-twe-input-wrapper-init>
                                                <input type="text" name="nama" id="nama"
                                                    placeholder="Masukkan Nama"
                                                    class="peer block w-full p-3 pl-4 border border-gray-300 rounded-md shadow-sm focus:outline:none focus:ring-primary focus:border-primary @error('nama') border-red-500 @enderror"
                                                    value="{{ old('nama') }}"
                                                    autocomplete="name" autofocus />

                                                @error('nama')
                                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div
                                            class="flex flex-row items-center mb-4 w-full justify-between">
                                            <label class="basis-3/12" for="alamat">
                                                Alamat <br>(Masukkan Sesuai KTP)
                                            </label>
                                            <div class="relative basis-9/12"
                                                data-twe-input-wrapper-init>
                                                <input type="text" name="alamat" id="alamat"
                                                    placeholder="Masukkan Jalan"
                                                    class="peer block w-full p-3 pl-4 border border-gray-300 rounded-md shadow-sm focus:outline:none focus:ring-primary focus:border-primary @error('alamat') border-red-500 @enderror"
                                                    value="{{ old('alamat') }}"
                                                    autocomplete="alamat" autofocus />

                                                @error('alamat')
                                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div
                                            class="flex flex-row items-center mb-4 w-full justify-between">
                                            <label class="basis-3/12" for="kecamatan"></label>
                                            <div
                                                class="basis-9/12 flex justify-center gap-x-3">
                                                <select
                                                    class="peer block w-full px-1 py-3 pl-4 border border-gray-300 rounded-md shadow-sm focus:outline:none focus:ring-primary focus:border-primary @error('kecamatan') border-red-500 @enderror"
                                                    name="kecamatan" id="kecamatan">
                                                    <option selected disabled hidden>Kecamatan</option>
                                                    @foreach ($kecamatan as $item)
                                                    <option value="{{ $item->id }}">{{ $item->kecamatan }}</option>
                                                    @endforeach
                                                </select>
                                                @error('kecamatan')
                                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                                @enderror

                                                <select
                                                    class="peer block w-full px-1 py-3 pl-4 border border-gray-300 rounded-md shadow-sm focus:outline:none focus:ring-primary focus:border-primary @error('desa') border-red-500 @enderror"
                                                    name="desa" id="desa">
                                                    <option selected disabled hidden>Desa</option>
                                                    @foreach ($desa as $item)
                                                        <option value="{{ $item->id }}">{{ $item->desa }}</option>
                                                    @endforeach
                                                </select>
                                                @error('desa')
                                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                                @enderror



                                            </div>
                                        </div>

                                        <div class="flex flex-row items-center mb-4 w-full justify-between">
                                            <label class="basis-3/12" for="nik">NIK</label>
                                            <div class="relative basis-9/12" data-twe-input-wrapper-init>
                                                <input type="text" name="nik" id="nik" placeholder="Masukkan NIK" class="peer block w-full p-3 pl-4 border border-gray-300 rounded-md shadow-sm focus:outline:none focus:ring-primary focus:border-primary @error('nik') border-red-500 @enderror"
                                                    value="{{ old('nik') }}"  autocomplete="nik" autofocus />

                                                @error('nik')
                                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="flex flex-row items-center mb-4 w-full justify-between">
                                            <label class="basis-3/12" for="telepon">No. Telepon</label>
                                            <div class="relative basis-9/12" data-twe-input-wrapper-init>
                                                <input type="text" name="telepon" id="telepon" placeholder="Masukkan No. Telepon" class="peer block w-full p-3 pl-4 border border-gray-300 rounded-md shadow-sm focus:outline:none focus:ring-primary focus:border-primary @error('telepon') border-red-500 @enderror"
                                                    value="{{ old('telepon') }}"  autocomplete="telepon" autofocus />

                                                @error('telepon')
                                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex flex-col px-7 py-5 basis-1/2">
                                        <div
                                            class="flex flex-row items-center mb-4 w-full justify-between">
                                            <label class="basis-3/12" for="nama_pengguna">Nama Pengguna</label>
                                            <div class="relative basis-9/12"
                                                data-twe-input-wrapper-init>
                                                <input type="text" name="nama_pengguna" id="nama_pengguna"
                                                    placeholder="Masukkan Nama Pengguna"
                                                    class="peer block w-full p-3 pl-4 border border-gray-300 rounded-md shadow-sm focus:outline:none focus:ring-primary focus:border-primary @error('nama_pengguna') border-red-500 @enderror"
                                                    value="{{ old('nama_pengguna') }}"
                                                    autocomplete="nama_pengguna" autofocus />

                                                @error('nama_pengguna')
                                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div
                                            class="flex flex-row items-center mb-4 w-full justify-between">
                                            <label class="basis-3/12" for="email">Email</label>
                                            <div class="relative basis-9/12"
                                                data-twe-input-wrapper-init>
                                                <input type="email" name="email" id="email"
                                                    placeholder="Masukkan Email"
                                                    class="peer block w-full p-3 pl-4 border border-gray-300 rounded-md shadow-sm focus:outline:none focus:ring-primary focus:border-primary @error('email') border-red-500 @enderror"
                                                    value="{{ old('email') }}"
                                                    autocomplete="email" autofocus />

                                                @error('email')
                                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div
                                            class="flex flex-row items-center mb-4 w-full justify-between">
                                            <label class="basis-3/12" for="password">Kata Sandi</label>
                                            <div class="relative basis-9/12"
                                                data-twe-input-wrapper-init>
                                                <input type="password" name="password" id="password"
                                                    placeholder="Masukkan Kata Sandi"
                                                    class="peer block w-full p-3 pl-4 border border-gray-300 rounded-md shadow-sm focus:outline:none focus:ring-primary focus:border-primary @error('password') border-red-500 @enderror"
                                                     autocomplete="new-password" />
                                                <p class="text-gray-400 text-xs italic">Password minimal 5 karakter</p>

                                                @error('password')
                                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div
                                            class="flex flex-row items-center mb-4 w-full justify-between">
                                            <label class="basis-3/12" for="password_confirmation">
                                                Ulangi Kata Sandi
                                            </label>
                                            <div class="relative basis-9/12"
                                                data-twe-input-wrapper-init>
                                                <input type="password" name="password_confirmation"
                                                    id="password_confirmation"
                                                    placeholder="Ulangi Kata Sandi"
                                                    class="peer block w-full p-3 pl-4 border border-gray-300 rounded-md shadow-sm focus:outline:none focus:ring-primary focus:border-primary @error('password_confirmation') border-red-500 @enderror"
                                                     autocomplete="new-password" />

                                                @error('password_confirmation')
                                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div>
                                          <div class="flex items-center justify-between">
                                                <div
                                                    class="inline-flex items-center">
                                                    <input type="checkbox"
                                                        name="billing_same"
                                                        id="billing_same"
                                                        class="form-checkbox" />
                                                    <label for="billing_same"
                                                        class="ml-2">Saya telah membaca dan menyetujui 
                                                    <a class="underline text-blue-500 ketentuan cursor-pointer">Ketentuan dan Kebijakan</a></label>
                                                </div>
                                                <div>
                                                    <a class="underline text-primary"
                                                        href="/login">Sudah punya akun?</a>
                                                </div>
                                            </div>
                                            <div
                                                class="mb-12 pb-1 pt-1 text-center">
                                                <button class="mb-3 inline-block w-full rounded px-6 pb-2 pt-2.5 text-md font-medium uppercase leading-normal text-white shadow-dark-3 transition duration-150 ease-in-out hover:bg-secondary hover:text-primary bg-primary"
                                                    type="submit"
                                                    data-twe-ripple-init
                                                    data-twe-ripple-color="light">
                                                    Daftar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div id="modalketentuan" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50 hidden">
    <div class="bg-white p-8 rounded shadow-lg w-1/2 h-3/4 overflow-hidden modal-content relative">
        <h1>Kebijakan Privasi</h1>
    
        <h2>I. Pendahuluan</h2>
        <p>Selamat datang di website Sapi Sehat Jember (selanjutnya disebut "Website"), sebuah platform digital yang bertujuan untuk menyediakan layanan kesehatan sapi yang berkelanjutan untuk para peternak di wilayah Jember. Website ini dikelola oleh Dinas Peternakan Jember (selanjutnya disebut "Kami"). Kami berkomitmen untuk melindungi privasi pengguna (selanjutnya disebut "Anda"). Kebijakan Privasi ini menjelaskan bagaimana Kami mengumpulkan, menggunakan, mengungkapkan, dan melindungi informasi pribadi Anda.</p>

        <h2>II. Pengumpulan Informasi</h2>
        <h3>A. Informasi Pribadi</h3>
        <p>Kami dapat mengumpulkan informasi pribadi yang dapat Anda berikan secara langsung saat menggunakan layanan di Website, termasuk tetapi tidak terbatas pada:</p>
        <ul>
            <li>Nama lengkap</li>
            <li>Alamat email</li>
            <li>Nomor telepon</li>
            <li>Alamat rumah/kantor</li>
            <li>Informasi tentang ternak Anda (jumlah, jenis, usia, kesehatan, dsb.)</li>
        </ul>

        <h3>B. Informasi Non-Pribadi</h3>
        <p>Kami juga dapat mengumpulkan informasi non-pribadi yang tidak dapat digunakan untuk mengidentifikasi Anda secara langsung, seperti:</p>
        <ul>
            <li>Informasi tentang perangkat yang Anda gunakan untuk mengakses Website</li>
            <li>Data penggunaan Website (halaman yang dikunjungi, waktu akses, dll.)</li>
            <li>Informasi demografis umum</li>
        </ul>

        <h2>III. Penggunaan Informasi</h2>
        <h3>A. Penggunaan Informasi Pribadi</h3>
        <p>Kami menggunakan informasi pribadi Anda untuk berbagai tujuan yang sah, termasuk tetapi tidak terbatas pada:</p>
        <ul>
            <li>Menyediakan dan meningkatkan layanan kesehatan sapi</li>
            <li>Menghubungi Anda mengenai layanan dan informasi penting terkait kesehatan ternak</li>
            <li>Mengelola akun dan layanan pelanggan Anda</li>
            <li>Melakukan analisis data untuk meningkatkan layanan</li>
            <li>Mematuhi persyaratan hukum dan peraturan yang berlaku</li>
        </ul>

        <h3>B. Penggunaan Informasi Non-Pribadi</h3>
        <p>Informasi non-pribadi dapat digunakan untuk:</p>
        <ul>
            <li>Meningkatkan fungsionalitas dan pengalaman pengguna di Website</li>
            <li>Melakukan analisis statistik dan riset pasar</li>
            <li>Mengelola dan mengoptimalkan layanan teknis</li>
        </ul>

        <h2>IV. Pengungkapan Informasi</h2>
        <p>Kami tidak akan menjual, menyewakan, atau memperdagangkan informasi pribadi Anda kepada pihak ketiga tanpa persetujuan Anda, kecuali dalam situasi berikut:</p>
        <ul>
            <li><strong>Penyedia Layanan Pihak Ketiga:</strong> Kami dapat membagikan informasi pribadi Anda kepada penyedia layanan pihak ketiga yang membantu Kami dalam mengoperasikan Website dan menyediakan layanan kepada Anda, seperti perusahaan hosting, layanan analitik, dan penyedia layanan email.</li>
            <li><strong>Kepatuhan Hukum:</strong> Kami dapat mengungkapkan informasi pribadi Anda jika diwajibkan oleh hukum atau dalam keadaan darurat untuk melindungi keselamatan pribadi Anda atau orang lain.</li>
            <li><strong>Perlindungan Hak:</strong> Kami dapat mengungkapkan informasi untuk melindungi hak, properti, atau keselamatan Kami, pengguna Kami, atau pihak ketiga.</li>
        </ul>

        <h2>V. Keamanan Informasi</h2>
        <p>Kami mengambil langkah-langkah yang wajar untuk melindungi informasi pribadi Anda dari akses yang tidak sah, pengungkapan, perubahan, atau perusakan. Langkah-langkah keamanan ini mencakup penggunaan teknologi enkripsi, firewall, dan prosedur keamanan fisik serta administratif.</p>

        <h2>VI. Penyimpanan Informasi</h2>
        <p>Informasi pribadi Anda akan disimpan selama diperlukan untuk memenuhi tujuan yang dijelaskan dalam Kebijakan Privasi ini, kecuali diperlukan periode penyimpanan yang lebih lama atau diizinkan oleh hukum.</p>

        <h2>VII. Hak Pengguna</h2>
        <p>Anda memiliki hak-hak tertentu terkait dengan informasi pribadi Anda, termasuk:</p>
        <ul>
            <li><strong>Hak Akses:</strong> Anda berhak untuk meminta salinan informasi pribadi yang Kami miliki tentang Anda.</li>
            <li><strong>Hak Koreksi:</strong> Anda berhak untuk meminta perbaikan informasi pribadi yang tidak akurat atau tidak lengkap.</li>
            <li><strong>Hak Penghapusan:</strong> Anda berhak untuk meminta penghapusan informasi pribadi dalam keadaan tertentu.</li>
            <li><strong>Hak Pembatasan Pemrosesan:</strong> Anda berhak untuk meminta pembatasan pemrosesan informasi pribadi dalam keadaan tertentu.</li>
            <li><strong>Hak Portabilitas Data:</strong> Anda berhak untuk menerima informasi pribadi Anda dalam format yang terstruktur dan umum digunakan, serta mentransfer informasi tersebut ke pengendali data lain.</li>
            <li><strong>Hak Keberatan:</strong> Anda berhak untuk menolak pemrosesan informasi pribadi Anda dalam keadaan tertentu, termasuk untuk tujuan pemasaran langsung.</li>
        </ul>
        <p>Untuk menggunakan hak-hak ini, Anda dapat menghubungi Kami melalui kontak yang disediakan di bagian akhir Kebijakan Privasi ini.</p>

        <h2>VIII. Penggunaan Cookie</h2>
        <p>Website Kami menggunakan teknologi cookie untuk meningkatkan pengalaman pengguna. Cookie adalah file kecil yang ditempatkan di perangkat Anda ketika Anda mengunjungi Website. Cookie membantu Kami mengingat preferensi Anda, mengukur efektivitas iklan, dan menganalisis aktivitas Website. Anda dapat mengatur ulang pengaturan browser Anda untuk menolak semua cookie atau untuk memberi tahu Anda ketika cookie dikirimkan. Namun, beberapa fitur Website mungkin tidak berfungsi dengan baik jika cookie dinonaktifkan.</p>

        <h2>IX. Tautan ke Situs Lain</h2>
        <p>Website Kami dapat berisi tautan ke situs web lain yang tidak dioperasikan oleh Kami. Jika Anda mengklik tautan pihak ketiga, Anda akan diarahkan ke situs pihak ketiga tersebut. Kami sangat menyarankan Anda untuk meninjau Kebijakan Privasi dari setiap situs yang Anda kunjungi. Kami tidak memiliki kontrol atas, dan tidak bertanggung jawab atas, konten, kebijakan privasi, atau praktik dari situs atau layanan pihak ketiga mana pun.</p>

        <h2>X. Perubahan pada Kebijakan Privasi</h2>
        <p>Kami dapat memperbarui Kebijakan Privasi ini dari waktu ke waktu. Kami akan memberi tahu Anda tentang perubahan dengan memposting Kebijakan Privasi yang baru di halaman ini. Anda disarankan untuk meninjau Kebijakan Privasi ini secara berkala untuk setiap perubahan. Perubahan pada Kebijakan Privasi ini berlaku efektif ketika diposting di halaman ini.</p>

        <h2>XI. Kontak Kami</h2>
        <p>Jika Anda memiliki pertanyaan tentang Kebijakan Privasi ini, silakan hubungi Kami melalui informasi berikut:</p>
        <p>
            Dinas Peternakan Jember<br>
            Jl. Letjen Suprapto No. XX, Jember, Jawa Timur, Indonesia<br>
            Email: <a href="mailto:info@ssj.go.id">info@ssj.go.id</a><br>
            Telepon: (0331) 11967834
        </p>
        <span id="close-button" class="absolute top-0 bottom-0 left-0 px-3 py-3">
            <svg class="fill-current h-12 w-12 text-gray-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.697z"/></svg>
          </span>

    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#kecamatan').on('change', function() {
            var kecamatanId = $(this).val();
            if (kecamatanId) {
                $.ajax({
                    url: '{{ route("get.desa.by.kecamatan") }}',
                    type: 'GET',
                    data: {
                        id_kecamatan: kecamatanId
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#desa').empty();
                        $.each(data, function(key, value) {
                            $('#desa').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            } else {
                $('#desa').empty();
            }
        });
    });
</script>
<script>
    $('.ketentuan').click(function() {
        document.getElementById('modalketentuan').classList.remove('hidden');
    });

    $('#close-button').click(function() {
        document.getElementById('modalketentuan').classList.add('hidden');
    });
</script>

</body>

</html>
