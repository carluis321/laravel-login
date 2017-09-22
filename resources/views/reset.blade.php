<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Prueba Full Stack</title>
    <meta charset="utf-8" />

    <link rel="stylesheet" href="{{ url('/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ url('/css/main.css') }}">
  </head>
  <body>
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-md-6">
          <div class="panel">
              <div class="panel-heading">
                <h3 class="text-success">
                  Reset Password
                </h3>
              </div>

              <div class="panel-body">
                  @if(session('msg'))
                    <div class="alert alert-{{ session('status') }}">
                      <p>
                        {{ session('msg') }}
                      </p>
                    </div>
                  @endif

                  <form action="{{ url('/reset') }}" method="POST" class="form-horizontal" autocomplete="off">
                      {{ csrf_field() }}

                      <div class="form-group">
                         <input type="text" class="form-control" name="email" placeholder="Ingresa tu Correo" required autofocus>
                      </div>

                      @if(count($errors->all()))
                        <div class="alert alert-danger">
                          @foreach($errors->all() as $error)
                            <p>
                              {{ $error }}
                            </p>
                          @endforeach
                        </div>
                      @endif

                      <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                          Reset Password
                        </button>
                      </div>
                  </form>
              </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>