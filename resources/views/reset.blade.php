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
                         <input type="text" class="form-control" id="email" name="email" placeholder="Ingresa tu Correo" required autofocus>
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
                        <button type="submit" class="btn btn-primary reset" disabled>
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
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
  <script src="{{ url('/js/bootstrap.min.js') }}"></script>
  <script>
    "use strict"

    var validations = {
      email: false
    };

    $('#email').on('keyup', (e) => {
      let value = e.target.value;

      if (!value.match(/([a-zA-Z0-9\.\-]{3,})\@[a-z0-9]+(\.)+[a-z]{2,}$/g)) {
        $('.reset').attr('disabled', true);

        $(e.target).css({
          border: '1px solid red'
        });

        validations.email = false;

        return;
      }

      $(e.target).css({
        border: '1px solid rgba(0, 0, 0, 0.15)'
      });

      validations.email = true;
      canSend();

      return;
    });

    function canSend(){
      if (validations.email) {
        $('.reset').attr('disabled', false);
      }
    }
  </script>
</html>