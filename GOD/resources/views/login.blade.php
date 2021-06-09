<!DOCTYPE html>
<meta charset="UTF-8">
<html>
  <head>
     <title>LOGIN || GOD</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
     <link rel="stylesheet" href="./style.css">
     <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">

     <link href="{{ url('/css/login.css') }}" rel="stylesheet">

  </head>

  <body>
    @if(session()->has('jsLoginAlert'))
      <script>
          alert("{{ session()->get('jsLoginAlert') }}");
      </script>
    @endif

    <div class="container">
      <div class="left">
        <div class="header">
          <img class="logo" src="/imgs/login/logo_login.png">
            <br>
          <h2 class="animation a1">AUTENTICAÇÃO</h2>
        </div>
        <div>
          <form method="post" class="form" action="{{ route('auth.check') }}">
            @csrf
            <input type="text" name="email" class="form-field animation a3" placeholder="Endereço de Email" value="{{ old('email') }}">
            <span class="text-danger">@error('email') {{ $message }} @enderror</span>
            <input type="password" name="password" class="form-field animation a4" placeholder="Palavra-passe">
            <span class="text-danger">@error('password') {{ $message }} @enderror</span>
            <p class="animation a5"><a href="#">Esqueceu-se da palavra-passe?</a></p>
            <button value="submit" class="animation a6">ENTRAR</button>
            <span class="error" align="center"></span>
          </form>
        </div>
      </div>
      <div class="right"></div>
    </div>  
  </body>
</html>