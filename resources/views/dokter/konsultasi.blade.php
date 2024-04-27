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
  <section class="h-full" >
    @include ('peternak.chat')

  </section>
  <script>
    document.addEventListener("DOMContentLoaded", function(event) { 
      Echo.Channel(`hello-channel`)
      .listen('HelloEvent', (e) => {
          console.log(e);
      });
    });
    
  </script>
</body>

</html>
