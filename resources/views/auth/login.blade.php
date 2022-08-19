<!DOCTYPE html>
<!-- saved from url=(0051)https://getbootstrap.com/docs/5.2/examples/sign-in/ -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <!-- Icon -->
    <link rel="icon" href="assets/img/logos/logo-icon.png">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/signin.css">
    <!-- Scripts -->
</head>

<body>
    <div class="container-log-sig">
        <input type="checkbox" id="flip" />
        <div class="cover">
            <div class="front">
                <img src="assets/img/login/login.jpg" alt="" />
                <div class="text">
                    <span class="text-1">El conocimiento a un click</span>
                    <span class="text-2">Siempre Conectado</span>
                </div>
            </div>
            <div class="back">
                <img class="backImg" src="assets/img/login/register.jpg" alt="" />
                <div class="text">
                    <span class="text-1">Siempre Contigo <br />
                        a un paso</span>
                    <span class="text-2">Empezemos</span>
                </div>
            </div>
        </div>
        <div class="forms">
            <div class="form-content">
                <div class="login-form">
                    <div class="title">Iniciar Sesión</div>
                    <form method="POST" action="{{ route('login') }}" class="pt-3">
                        @csrf
                        <div class="input-boxes">
                            <div class="input-box">
                                <i class="fas fa-envelope"></i>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus
                                    placeholder="Ingresa tu Email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <b>{{ $message }}</b>
                                    </span>
                                @enderror
                            </div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>

                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password" placeholder="Ingresa tu contraseña"
                                    required />

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="text"><a href="#">Olvidaste tu Contraseña?</a></div>
                            <div class="button input-box">
                                <button type="submit" class="w-100 btn btn-lg btn-primary">
                                    {{ __('ENTRAR') }}
                                </button>
                            </div>
                            <div class="text sign-up-text">
                                No tienes cuenta? <label for="flip">Registrarse</label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="signup-form">
                    <div class="title">Registrate</div>
                    @include('auth.register')
                </div>
            </div>
        </div>
    </div>
</body>

</html>
