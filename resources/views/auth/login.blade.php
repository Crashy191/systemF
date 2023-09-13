<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .gradient-custom-2 {
      background: #ee7724;
      background: -webkit-linear-gradient(to right, #ee7724, #ee7724, #ee7724, #ee7724);
      background: linear-gradient(to right, #ee7724, #ee7724, #ee7724, #ee7724);
    }
    .gradient-form {
      height: 100vh !important;
    }
  </style>
</head>
<body>
  <section class="h-100 gradient-form" style="background-color: #eee;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-10">
          <div class="card rounded-3 text-black">
            <div class="row g-0">
              <div class="col-lg-6">
                <div class="card-body p-md-5 mx-md-4">

                  <div class="text-center">
                    <img src="{{ asset('frontend/img/logo.ico') }}"
                      style="width: 185px;" alt="logo">
                    <h4 class="mt-3 mb-5 pb-1">Drogueria la Economia</h4>
                  </div>

                  <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <p>Por favor, inicia sesion con tu cuenta</p>

                    <div class="form-outline mb-4 ">
                      <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"
                        placeholder="example@gmail.com" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                      <label class="form-label mt-2" for="email">Email</label>
                      @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="form-outline mb-4">
                      <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" />
                      <label class="form-label mt-2" for="password">Contraseña</label>
                      @error('password')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="text-center pt-1 mb-5 pb-1">
                      <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Iniciar
                        Sesion</button>
                      <a class="text-muted" href="{{ route('password.request') }}">Olvidaste tu contraseña?</a>
                    </div>

                    <div class="d-flex align-items-center justify-content-center pb-4 ">
                      <p class="mb-0 me-2 mx-2">No tienes una cuenta? </p>
                      <a href="{{ route('register.form') }}" class="btn btn-outline-primary">Registrate</a>
                    </div>

                  </form>

                </div>
              </div>
              <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                  <h4 class="mb-4">Acerca de Nosotros</h4>
                  <p class="small mb-0 text-justify">En Droguería La Economía, estamos dedicados a proporcionarte productos farmacéuticos de calidad y un servicio excepcional. Nuestra misión es ser tu aliado confiable para mantener y mejorar tu bienestar.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
