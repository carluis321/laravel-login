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
        <div class="col-md-6 login">
          <div class="panel rounded-top">
            <div class="panel-heading">
              <h3 class="text-success">
                EnchanceTV Account
              </h3>
            </div>
            <div class="panel-body">
              <form action="{{ url('/login') }}" autocomplete="off" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                  <input type="text" name="email" placeholder="Correo" class="form-control" autofocus required />
                </div>

                <div class="form-group">
                  <input type="password" name="password" placeholder="Contraseña" class="form-control" required />
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

                @if(session('msg'))
                  <div class="alert alert-warning">
                    <p>
                      {{ session('msg') }}
                    </p>
                  </div>
                @endif

                <div class="row">
                  <div class="col">
                    <a href="{{ url('/reset-password') }}" class="text-success">
                      Forgot your password?
                    </a>
                  </div>
                  <div class="col">
                    <label>
                      <input type="checkbox" name="remember" />
                      Remember me
                    </label>
                  </div>
                  <div class="col">
                    <button class="btn btn-primary">
                      Login
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>

  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
  <script src="{{ url('/js/bootstrap.min.js') }}"></script>
</html>