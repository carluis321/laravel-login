<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Prueba Full Stack</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="{{ url('/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ url('/css/main.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.9.1/sweetalert2.css" />
  </head>

  <body>
    <div class="container">
      <div class="row justify-content-md-center">
        <div id="app"></div>
      </div>
    </div>
  </body>

  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
  <script src="{{ url('/js/bootstrap.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.9.1/sweetalert2.js"></script>
  <script src="{{ url('/js/app.js') }}"></script>
</html>