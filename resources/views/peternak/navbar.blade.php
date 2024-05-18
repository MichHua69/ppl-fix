<nav class="flex items-center justify-between p-6 lg:px-8 bg-secondary shadow-xl" aria-label="Global">
    <div class="flex lg:flex-1">
      <a href="#" class="flex flex-row items-center gap-5 -m-1.5 p-1.5">
        <img class="h-8 w-auto" src="/images/logo-image.png" alt="">
        <span class="font-bold">Sapi Sehat Jember</span>
      </a>
    </div>
    <div class="lg:flex lg:gap-x-12">
      <a href="/peternak/dashboard" class="text-md font-semibold leading-6 text-gray-900">Dashboard</a>
      <a href="/peternak/konsultasi" class="text-md font-semibold leading-6 text-gray-900">Konsultasi</a>
      <a href="/peternak/layanan" class="text-md font-semibold leading-6 text-gray-900">Layanan</a>
      <a href="/peternak/laporan" class="text-md font-semibold leading-6 text-gray-900">Laporan</a>
      <a href="/peternak/informasiprogram" class="text-md font-semibold leading-6 text-gray-900">Informasi Program</a>
    </div>
    <div class="flex flex-1 justify-end gap-2 items-center">
      <div class="flex justify-end h-full ">
        <div x-data="{ dropdownOpen: false }" class="relative">
            <button @click="dropdownOpen = !dropdownOpen" class="relative z-10 block rounded-md p-2 focus:outline-none">
              {{-- <div class="w-3 h-3 rounded-full absolute top-1 right-2 bg-danger"></div> --}}
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 30 30" id="Bell-Notification--Streamline-Flex" height="30" width="30"><desc>Bell Notification Streamline Icon: https://streamlinehq.com</desc><g id="bell-notification--alert-bell-ring-notification-alarm"><path id="Union" fill="#538D22" fill-rule="evenodd" d="M15 0.5357142857142857a9.368571428571428 9.368571428571428 0 0 0 -9.368571428571428 9.368571428571428c0 1.7678571428571428 -0.31071428571428567 3.1135714285714284 -0.7457142857142857 4.133571428571429 -0.12 0.28500000000000003 -0.3642857142857143 0.5314285714285714 -0.8357142857142857 0.8357142857142857a18.115714285714287 18.115714285714287 0 0 1 -0.5892857142857143 0.34714285714285714l-0.1992857142857143 0.11571428571428571a9.642857142857142 9.642857142857142 0 0 0 -0.9128571428571428 0.5850000000000001l0.6364285714285713 0.8592857142857143 -0.6364285714285713 -0.8592857142857143c-1.11 0.8207142857142857 -1.5171428571428571 2.085 -1.4614285714285715 3.2249999999999996 0.053571428571428575 1.1078571428571429 0.5507142857142857 2.2649999999999997 1.4785714285714284 2.9635714285714285a1.6285714285714286 1.6285714285714286 0 0 0 0.18642857142857142 0.12857142857142856 3.857142857142857 3.857142857142857 0 0 0 0.48428571428571426 0.26785714285714285c0.42 0.20142857142857143 1.0564285714285715 0.4457142857142857 1.9885714285714287 0.6814285714285714 1.8642857142857143 0.4714285714285714 4.9521428571428565 0.9192857142857143 9.975 0.9192857142857143 5.022857142857142 0 8.110714285714286 -0.44785714285714284 9.975 -0.9192857142857143 0.9321428571428572 -0.2357142857142857 1.5685714285714285 -0.48 1.9885714285714287 -0.6814285714285714a4.435714285714285 4.435714285714285 0 0 0 0.6278571428571428 -0.3642857142857143 1.637142857142857 1.637142857142857 0 0 0 0.04285714285714286 -0.03214285714285714c0.9278571428571428 -0.6985714285714286 1.425 -1.8557142857142856 1.4785714285714284 -2.9635714285714285 0.05571428571428571 -1.1400000000000001 -0.3514285714285714 -2.4042857142857144 -1.4614285714285715 -3.2249999999999996a9.664285714285713 9.664285714285713 0 0 0 -0.9128571428571428 -0.5850000000000001l-0.1992857142857143 -0.11571428571428571a14.329285714285714 14.329285714285714 0 0 1 -0.5871428571428572 -0.3492857142857143c-0.4714285714285714 -0.30000000000000004 -0.7178571428571429 -0.5485714285714286 -0.84 -0.8335714285714285a8.1 8.1 0 0 1 -0.2507142857142857 -0.6771428571428572c-0.30428571428571427 -1.1785714285714286 -0.4928571428571429 -2.2928571428571427 -0.4928571428571429 -3.4564285714285714A9.366428571428573 9.366428571428573 0 0 0 15 0.5357142857142857Z" clip-rule="evenodd" stroke-width="1"></path><path id="Ellipse 86 (Stroke)" fill="#69CF3A" fill-rule="evenodd" d="M11.348571428571429 26.003571428571426a1.0714285714285714 1.0714285714285714 0 0 1 1.1614285714285715 -0.3214285714285714c0.5442857142857143 0.18428571428571427 1.3457142857142856 0.3257142857142857 2.4899999999999998 0.3257142857142857 1.1442857142857144 0 1.9457142857142857 -0.14142857142857143 2.4899999999999998 -0.3257142857142857a1.0714285714285714 1.0714285714285714 0 0 1 1.2878571428571428 1.5214285714285714 4.285714285714286 4.285714285714286 0 0 1 -7.555714285714285 0 1.0714285714285714 1.0714285714285714 0 0 1 0.12642857142857142 -1.2000000000000002Z" clip-rule="evenodd" stroke-width="1"></path></g></svg>
            </button>
    
            <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>
    
            <div x-show="dropdownOpen" class="absolute right-0 mt-2 bg-white rounded-md shadow-lg overflow-hidden z-20" style="width:20rem;">
                <div class="py-2 min-h-64 max-h-64 overflow-y-scroll scroll-smooth" style="width: calc(100% + 0.5rem)">

                  <input type="hidden" id="load-notification-url" value="{{route('peternak.notifikasi.load')}}"> <!-- Sesuaikan URL sesuai kebutuhan Anda -->
                  <div id="notifications"></div> 


                 
                </div>
                
            </div>
        </div>
      </div>
      <div class="hs-dropdown relative inline-flex">
        <button id="hs-dropdown-custom-trigger" type="button" class="hs-dropdown-toggle py-1 ps-3 pe-3 inline-flex items-center gap-x-4 text-sm font-semibold rounded-full border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800">
          <span class="text-gray-600 font-medium truncate max-w-[7.5rem] dark:text-gray-400">
            {{$user->nama_pengguna}}
          </span>
          <img class="w-8 h-8 rounded-full object-cover" src="{{asset($photo)}}" alt="profil">
          {{-- <svg class="hs-dropdown-open:rotate-180 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg> --}}
        </button>
        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg p-2 mt-2 divide-y divide-gray-200 dark:bg-gray-800 dark:border dark:border-gray-700 dark:divide-gray-700" aria-labelledby="hs-dropdown-with-dividers">
          
          <div class="py-3 px-5 -m-2 bg-gray-100 rounded-t-lg dark:bg-gray-700">
            <p class="text-sm text-gray-500 dark:text-gray-400">Log in as</p>
            <p class="text-sm font-medium text-gray-800 dark:text-gray-300">
              {{$user->email}}
            </p>
          </div>
          <div class="py-2 first:pt-0 last:pb-0 mt-2">
            <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:bg-gray-700" href="
            {{route('peternak.profil')}}
            ">
              Profil
            </a>
          </div>
          <div class="py-2 first:pt-0 last:pb-0">
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button type="submit" class="flex w-full items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:bg-gray-700">
                Log Out
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </nav>
  @vite('public/assets/js/dropdown.js')


  {{-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        window.Echo.channel('my-channel')
            .listen('.notifikasi', (e) => {
                console.log(e.data);
                renderNotificationpusher(e.data.judul, e.data.isi);
            });
    });

    function renderNotificationpusher(judul, isi) {
        const notificationsContainer = document.getElementById("notifications");

        // Menghapus notifikasi duplikat
        const existingNotifications = notificationsContainer.getElementsByClassName('notification');
        for (let i = 0; i < existingNotifications.length; i++) {
            const titleElement = existingNotifications[i].querySelector('span.font-bold');
            const messageElement = existingNotifications[i].querySelector('span.font-sm');
            if (titleElement && messageElement && titleElement.innerText === judul && messageElement.innerText === isi) {
                notificationsContainer.removeChild(existingNotifications[i]);
                break; // Asumsikan hanya satu duplikat yang perlu dihapus
            }
        }

        // Membuat elemen notifikasi baru
        const notificationElement = document.createElement("div");
        notificationElement.className = "notification flex items-center px-4 py-3 border-b mx-2";
        notificationElement.style.width = "calc(100% - 1rem)";

        const contentContainer = document.createElement("div");
        contentContainer.className = "text-gray-600 text-sm mx-2 flex flex-col justify-between w-full";

        const titleElement = document.createElement("span");
        titleElement.className = "font-bold text-lg";
        titleElement.innerText = judul;

        const messageElement = document.createElement("span");
        messageElement.className = "font-sm";
        messageElement.innerText = isi;

        const timeElement = document.createElement("p");
        timeElement.className = "text-right font-sm";
        timeElement.innerText = "Baru saja"; // Waktu dapat disesuaikan sesuai kebutuhan

        contentContainer.appendChild(titleElement);
        contentContainer.appendChild(messageElement);
        contentContainer.appendChild(timeElement);

        notificationElement.appendChild(contentContainer);

        // Menambahkan elemen notifikasi baru ke bagian atas kontainer
        notificationsContainer.insertBefore(notificationElement, notificationsContainer.firstChild);
    }

    async function loadNotif() {
        const url = document.getElementById("load-notification-url").value;

        try {
            const res = await axios.get(url); // Ganti dengan endpoint yang sesuai di server Anda
            const notifications = res.data.data;
            console.log(res.data.data);
            renderNotifications(notifications);
        } catch (error) {
            console.error('Error fetching notifications:', error);
        }
    }

    function renderNotifications(notifications) {
        const notificationsContainer = document.getElementById("notifications");
        notificationsContainer.innerHTML = ""; // Kosongkan kontainer sebelum menambahkan notifikasi baru

        if (Array.isArray(notifications)) {
            notifications.forEach(notification => {
                const notificationElement = document.createElement("div");
                notificationElement.className = "notification flex items-center px-4 py-3 border-b mx-2";
                notificationElement.style.width = "calc(100% - 1rem)";

                const contentContainer = document.createElement("div");
                contentContainer.className = "text-gray-600 text-sm mx-2 flex flex-col justify-between w-full";

                const titleElement = document.createElement("span");
                titleElement.className = "font-bold text-lg";
                titleElement.innerText = notification.judul; // Mengambil judul notifikasi

                const messageElement = document.createElement("span");
                messageElement.className = "font-sm";
                messageElement.innerText = notification.isi; // Mengambil isi notifikasi

                const timeElement = document.createElement("p");
                timeElement.className = "text-right font-sm";
                timeElement.innerText = "2 hari yang lalu"; // Waktu dapat disesuaikan sesuai kebutuhan

                contentContainer.appendChild(titleElement);
                contentContainer.appendChild(messageElement);
                contentContainer.appendChild(timeElement);

                notificationElement.appendChild(contentContainer);

                // Menambahkan elemen notifikasi ke kontainer
                notificationsContainer.appendChild(notificationElement);
            });
        } else {
            console.error('Expected an array of notifications but received:', notifications);
        }
    }

    // Panggil loadNotif saat halaman selesai dimuat
    document.addEventListener('DOMContentLoaded', loadNotif);
</script> --}}


<script>
  document.addEventListener('DOMContentLoaded', function () {
      window.Echo.channel('my-channel')
          .listen('.notifikasi', (e) => {
              console.log(e.data);
              renderNotificationpusher(e.data.judul, e.data.isi);
          });
  });

  function renderNotificationpusher(judul, isi) {
      const notificationsContainer = document.getElementById("notifications");
      
      // Menghapus notifikasi duplikat
      const existingNotifications = notificationsContainer.getElementsByClassName('notification');
      for (let i = 0; i < existingNotifications.length; i++) {
          const titleElement = existingNotifications[i].querySelector('h3');
          const messageElement = existingNotifications[i].querySelector('p');
          if (titleElement && messageElement && titleElement.innerText === judul && messageElement.innerText === isi) {
              notificationsContainer.removeChild(existingNotifications[i]);
              break; // Asumsikan hanya satu duplikat yang perlu dihapus
          }
      }

      // Membuat elemen notifikasi baru
      const notificationElement = document.createElement("div");
      notificationElement.className = "notification flex items-center px-4 py-3 border-b mx-2";
      notificationElement.style.width = "calc(100% - 1rem)";

      const contentContainer = document.createElement("div");
      contentContainer.className = "text-gray-600 text-sm mx-2 flex flex-col justify-between w-full";

      const titleElement = document.createElement("span");
      titleElement.className = "font-bold text-lg overflow-hidden";
      titleElement.innerText = judul;

      const messageElement = document.createElement("span");
      messageElement.className = "font-sm overflow-hidden";
      messageElement.innerText = isi;

      const timeElement = document.createElement("p");
      timeElement.className = "text-right font-sm";
      timeElement.innerText = "Baru saja"; // Waktu dapat disesuaikan sesuai kebutuhan

      contentContainer.appendChild(titleElement);
      contentContainer.appendChild(messageElement);
      contentContainer.appendChild(timeElement);

      notificationElement.appendChild(contentContainer);

      // Menambahkan elemen notifikasi baru ke bagian atas kontainer
      notificationsContainer.insertBefore(notificationElement, notificationsContainer.firstChild);
  }

  async function loadNotif() {
      const url = document.getElementById("load-notification-url").value;

      try {
          const res = await axios.get(url); // Ganti dengan endpoint yang sesuai di server Anda
          const notifications = res.data.data;
          console.log(res.data.data);
          renderNotifications(notifications);
      } catch (error) {
          console.error('Error fetching notifications:', error);
      }
  }

  function renderNotifications(notifications) {
      const notificationsContainer = document.getElementById("notifications");
      notificationsContainer.innerHTML = ""; // Kosongkan kontainer sebelum menambahkan notifikasi baru

      if (Array.isArray(notifications)) {
          notifications.forEach(notification => {
              const notificationElement = document.createElement("div");
              notificationElement.className = "notification flex items-center px-4 py-3 border-b mx-2";
              notificationElement.style.width = "calc(100% - 1rem)";

              const contentContainer = document.createElement("div");
              contentContainer.className = "text-gray-600 text-sm mx-2 flex flex-col justify-between w-full";

              const titleElement = document.createElement("span");
              titleElement.className = "font-bold text-lg overflow-hidden";
              titleElement.innerText = notification.judul; // Mengambil judul notifikasi

              const messageElement = document.createElement("span");
              messageElement.className = "font-sm overflow-hidden";
              messageElement.innerText = notification.isi; // Mengambil isi notifikasi

              const timeElement = document.createElement("p");
              timeElement.className = "text-right font-sm";
              timeElement.innerText = notification.time || "Waktu tidak tersedia"; // Mengambil waktu notifikasi

              contentContainer.appendChild(titleElement);
              contentContainer.appendChild(messageElement);
              contentContainer.appendChild(timeElement);

              notificationElement.appendChild(contentContainer);

              // Menambahkan elemen notifikasi ke kontainer
              notificationsContainer.appendChild(notificationElement);
          });
      } else {
          console.error('Expected an array of notifications but received:', notifications);
      }
  }

  // Panggil loadNotif saat halaman selesai dimuat
  document.addEventListener('DOMContentLoaded', loadNotif);
</script>

{{-- <script>
  document.addEventListener('DOMContentLoaded', function () {
       window.Echo.channel('my-channel')
           .listen('.notifikasi', (e) => {
               console.log(e.data);
               renderNotificationpusher(e.data.judul, e.data.isi);
           });
   });

   function renderNotificationpusher(judul, isi) {
       const notificationsContainer = document.getElementById("notifications");
       
       // Menghapus notifikasi duplikat
       const existingNotifications = notificationsContainer.getElementsByClassName('notification');
       for (let i = 0; i < existingNotifications.length; i++) {
           const titleElement = existingNotifications[i].querySelector('h3');
           const messageElement = existingNotifications[i].querySelector('p');
           if (titleElement && messageElement && titleElement.innerText === judul && messageElement.innerText === isi) {
               notificationsContainer.removeChild(existingNotifications[i]);
               break; // Asumsikan hanya satu duplikat yang perlu dihapus
           }
       }

       // Membuat elemen notifikasi baru
       const notificationElement = document.createElement("div");
       notificationElement.className = "notification";

       const titleElement = document.createElement("h3");
       titleElement.innerText = judul;

       const messageElement = document.createElement("p");
       messageElement.innerText = isi;

       notificationElement.appendChild(titleElement);
       notificationElement.appendChild(messageElement);

       // Menambahkan elemen notifikasi baru ke bagian atas kontainer
       notificationsContainer.insertBefore(notificationElement, notificationsContainer.firstChild);
   }
   
   async function loadNotif() {
       const url = document.getElementById("load-notification-url").value;

       try {
           const res = await axios.get(url); // Ganti dengan endpoint yang sesuai di server Anda
           const notifications = res.data.data;
           console.log(res.data.data);
           renderNotifications(notifications);
       } catch (error) {
           console.error('Error fetching notifications:', error);
       }
   }

   function renderNotifications(notifications) {
       const notificationsContainer = document.getElementById("notifications");
       notificationsContainer.innerHTML = ""; // Kosongkan kontainer sebelum menambahkan notifikasi baru

       if (Array.isArray(notifications)) {
           notifications.forEach(notification => {
               const notificationElement = document.createElement("div");
               notificationElement.className = "notification";

               const titleElement = document.createElement("h3");
               titleElement.innerText = notification.judul; // Mengambil judul notifikasi

               const messageElement = document.createElement("p");
               messageElement.innerText = notification.isi; // Mengambil isi notifikasi

               notificationElement.appendChild(titleElement);
               notificationElement.appendChild(messageElement);

               // Menambahkan elemen notifikasi ke kontainer
               notificationsContainer.appendChild(notificationElement);
           });
       } else {
           console.error('Expected an array of notifications but received:', notifications);
       }
   }

   // Panggil loadNotif saat halaman selesai dimuat
   document.addEventListener('DOMContentLoaded', loadNotif);
</script> --}}





  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>



  