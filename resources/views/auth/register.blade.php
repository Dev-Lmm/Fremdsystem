<form method="POST" action="{{ route('register') }}">
  @csrf
  <div class="input-boxes">
    <div class="input-box">
      <i class="fas fa-user"></i>
      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Ingresa tu Nombre" required />
      @error('name')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
    <div class="input-box">
      <i class="fas fa-envelope"></i>
      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Ingresa tu Email" />
      @error('email')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
    <div class="input-box">
      <i class="fas fa-lock"></i>
      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Ingresa tu Contraseña" />
      @error('password')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
    <div class="input-box">
      <i class="fas fa-lock"></i>
      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirma tu Contraseña">
    </div>
    <div class="button input-box">
      <button type="submit" class="w-100 btn btn-lg btn-primary">
        {{ __('Registrar') }}
      </button>
    </div>
    <div class="text sign-up-text">
      Ya tienes Cuenta? <label for="flip">Inicia Sesión</label>
    </div>
  </div>
</form>