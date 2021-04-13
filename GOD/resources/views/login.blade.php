<!DOCTYPE html>
<meta charset="UTF-8">
<html>
    <head>
     <title>LOGIN || GOD</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
     <link rel="stylesheet" href="./style.css">
    </head>
    <body>
      <div class="container">
        <div class="left">
          <div class="header">
            <img class="logo" src="img/logo_login.png">
              <br>
            <h2 class="animation a1">AUTENTICAÇÃO</h2>
          </div>
          <div>
            <form method="post" class="form" action="">
              <input type="text" name="name" class="form-field animation a3" placeholder="Endereço de Email">
              <span class="error"></span>
              <input type="password" name="password" class="form-field animation a4" placeholder="Palavra-passe">
              <span class="error"></span>
              <p class="animation a5"><a href="#">Esqueceu-se da palavra-passe?</a></p>
              <button value="submit" class="animation a6">ENTRAR</button>
              <span class="error" align="center"></span>
            </form>
          </div>
        </div>
        <div class="right"></div>
      </div>  
    </body>

    <style>
            @import url("https://fonts.googleapis.com/css?family=Rubik:400,500&display=swap");
        * {
        box-sizing: border-box;
        }

        body {
        font-family: "Rubik", sans-serif;
            user-select: none;
        }

        .container {
        display: flex;
        height: 100vh;
        }

        .left {
        overflow: hidden;
        display: flex;
        
        flex-direction: column;
        justify-content: center;
        -webkit-animation-name: left;
                animation-name: left;
        -webkit-animation-duration: 1s;
                animation-duration: 1s;
        -webkit-animation-fill-mode: both;
                animation-fill-mode: both;
        -webkit-animation-delay: 1s;
                animation-delay: 1s;
        }

        .right {
        flex: 1;
        background-color: black;
        transition: 1s;
        background-image: {{ asset('imgs/background.jpg') }};
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        }

        .header > h1 {
        margin: 0;
        color: #79fdff;
        }

        .logo{
        width: 50%;
        height: auto;
        }

        .header > h2 {
        margin-top: 20px;
        margin: 0;
        color: #79fdff;
        }

        .header > h4 {
        margin-top: 10px;
        font-weight: normal;
        font-size: 15px;
        color: rgba(0, 0, 0, 0.4);
        }

        .form {
        max-width: 80%;
        display: flex;
        flex-direction: column;
        }

        .form > p {
        text-align: center;
        }

        .form > p > a {
        color: #000;
        font-size: 14px;
        }

        .form-field {
        height: 46px;
        padding: 0 16px;
        border: 2px solid #ddd;
        border-radius: 10px;
        font-family: "Rubik", sans-serif;
        outline: 0;
        transition: 0.2s;
        margin-top: 20px;
        }

        .form-field:focus {
        border-color: #79fdff;
        }

        .form > button {
        padding: 12px 10px;
        border: 0;
        background: #2f323a;
        border-radius: 20px;
        margin-top: 10px;
        color: #fff;
        letter-spacing: 1px;
        font-family: "Rubik", sans-serif;
        outline:none;
        }

        .form > button:hover{
        background: #79fdff;
        }

        .animation {
        -webkit-animation-name: move;
                animation-name: move;
        -webkit-animation-duration: 0.4s;
                animation-duration: 0.4s;
        -webkit-animation-fill-mode: both;
                animation-fill-mode: both;
        -webkit-animation-delay: 2s;
                animation-delay: 2s;
        }

        .atitle {
        -webkit-animation-delay: 2s;
                animation-delay: 2s;
        }

        .a1 {
        -webkit-animation-delay: 2s;
                animation-delay: 2s;
        }

        .a2 {
        -webkit-animation-delay: 2.1s;
                animation-delay: 2.1s;
        }

        .a3 {
        -webkit-animation-delay: 2.2s;
                animation-delay: 2.2s;
        }

        .a4 {
        -webkit-animation-delay: 2.3s;
                animation-delay: 2.3s;
        }

        .a5 {
        -webkit-animation-delay: 2.4s;
                animation-delay: 2.4s;
        }

        .a6 {
        -webkit-animation-delay: 2.5s;
                animation-delay: 2.5s;
        }

        @-webkit-keyframes move {
        0% {
            opacity: 0;
            visibility: hidden;
            transform: translateY(-40px);
        }
        100% {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        }

        @keyframes move {
        0% {
            opacity: 0;
            visibility: hidden;
            transform: translateY(-40px);
        }
        100% {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        }
        @-webkit-keyframes left {
        0% {
            opacity: 0;
            width: 0;
        }
        100% {
            opacity: 1;
            padding: 20px 40px;
            width: 440px;
        }
        }
        @keyframes left {
        0% {
            opacity: 0;
            width: 0;
        }
        100% {
            opacity: 1;
            padding: 20px 40px;
            width: 440px;
        }
        }
    </style>
</html>