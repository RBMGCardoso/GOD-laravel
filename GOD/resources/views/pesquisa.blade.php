<!doctype html>
<html>
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

            <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <style>
      body
      {
        min-height: 100vh;
      }

      #btn
      {
        position: relative;
        z-index: 0;
        color: #000;
      }

      .profile
      {
        position: relative;
        height: 100vh;
        width: 250px;
      }

      .dropup
      {
        position: absolute;
        bottom:0px;
      }

      .navbar
      {
        width:250px;
        height:100vh;
        position: fixed;
        background-color: #222;
        transition: 0.4s;
      }

      .nav-item
      {
        border-bottom: 1px solid #555;
      }

       .nav-link
      {
        font-size: 1.25em;
        width:250px;
        height: 48px;
        position: relative;
      }

      .nav-link:active,
      .nav-link:focus,
      .nav-link:hover
      {
        background-color: rgb(121,253,255);
        -webkit-text-fill-color: #333;
        font-weight: 500;
      }

      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      #menu-btn
      {
        position: fixed;
        transition: 0.4s;    
        fill: #222;
      }
   
      .active-nav
      {
        margin-left:0;
      }

      .active-cont
      {
        margin-left: 250px;
      }


      #menu-btn:hover
      {
        fill: rgba(121, 255, 255, 1);
      }

      #sidebar2
      {
        margin-left: -180px;
        transition-delay: 0.2s;
        transition: 0.2s;
      }

          .info
          {
              width: 61%;
          }

          .container{
              position: relative;
              top: 2%;
              left: 20%;
          }

          /* Table */
          table{
              table-layout: fixed;
              width: 61%;
              height: 600px;
              border-collapse: collapse;
              border-radius: 2px;
              border-style: hidden; /* hide standard table (collapsed) border */
              box-shadow: 0 0 0 2px #ccc; /* this draws the table border  */ 
          }

          td{
              border: 2px solid #ccc;
              border-collapse: collapse;
              padding-left: 10px;
              padding-right: 10px;
          }

          .checkmark{ /* Tirar a borda da checkbox*/
              position: relative;
              width: 25px;
              height: 35px;
              vertical-align: middle;
          }

          /* Descrição */
          textarea {
              width: 61%;
              height: 150px;
              padding: 12px 20px;
              box-sizing: border-box;
              border: 2px solid #ccc;
              border-radius: 4px;
              background-color: #f8f8f8;
              resize: none;
              word-break: break-word;
              font-family: "Arial";
          }

          .bt_sub{
              width: 15vw;
              min-width: 100px;
              height: 30px;
              border: 0;
              background: #2f323a;
              border-radius: 10px;
              color: #fff;
              outline:none;
          }

          .bt_sub:hover
          {
            background-color: rgba(121, 255, 255, 1);
          }

          #fname
          {
              width: 71%;
              min-width: 31%;
              height: 20px;
              padding: 12px;
              border: 1px solid #ccc;
              border-radius: 4px;
          }

          #num
          {
              width: calc(calc(100% - 75%) / 2);
              min-width: 100px;
              height: 20px;
              padding: 12px;
              border: 1px solid #ccc;
              border-radius: 4px;
          }

          #anoturma
          {
              width: calc(calc(100% - 75%) / 2);
              min-width: 100px;
              height: 20px;
              padding: 12px;
              border: 1px solid #ccc;
              border-radius: 4px;
          }

          #disciplina
          {
              width: 20vw;
              height: 20px;
              padding: 12px;
              margin-top: 5px;
              border: 1px solid #ccc;
              border-radius: 4px;
          }

          #data
          {
              width: 15vw;
              height: 20px;
              padding: 12px;
              border: 1px solid #ccc;
              border-radius: 4px;
          }

          .content
          {
            transition:0.4s;
          }
    </style>

    <script>
      function closeSidebar()
        {
          var sidebar = document.getElementById("sidebar");
          var sidebar2 = document.getElementById("sidebar2");
          var button = document.getElementById("menu-btn");
          var content = document.getElementById("content");

          if(sidebar.style.marginLeft == "-250px")
          {        
            //abrir
            sidebar.style.marginLeft = "0px";
            button.style.transform.transitionDuration = "2s";
            button.style.transform = "translateX(0px)";
            content.style.left = "250px";
            
          }
          else
          {
            //fechar
            sidebar.style.marginLeft = "-250px";
            button.style.transform.transitionDuration = "2s";
            button.style.transform = "translateX(-250px) rotate(180Deg)";
            content.style.left = "0px";
          }
        }


      function CharsCounterDesc()
      {
          var descText = document.getElementById('textADesc');
          var charsQt = 350 - descText.value.length;
          
          var alertText = document.getElementById('charsRemainDesc');
          alertText.textContent = "Caracteres restantes: " + charsQt;       
      }

      function CharsCounterDec()
      {
          var descText = document.getElementById('textADec');
          var charsQt = 350 - descText.value.length;
          
          var alertText = document.getElementById('charsRemainDec');
          alertText.textContent = "Caracteres restantes: " + charsQt;       
      }
    </script>
    <body>

    <nav class="navbar navbar-expand d-flex flex-column align-item-start" id="sidebar">
          <a href="#" class="navbar-brand text-light">
            <div class="display-5 font-weight-bold">
              <div class="row">
                <div class="col">
                GOD
                </div>
              </div>       
            </div>
          </a>
          <hr style="width:100%;text-align:left;margin-left:0;margin-bottom:0;color:#fff">
          <ul class="nav-pills navbar-nav d-flex flex-column w-100">
            <li class="nav-item w-100">
              <a href="#" class="nav-link rounded-0 text-light ps-3" id="btn">Início</a>
            </li>

            <li class="nav-item w-100">
              <a href="{{ route('ocorrenciaPage') }}" class="nav-link rounded-0 text-light ps-3" id="btn">Criar Ocorrência</a>
            </li>

            <li class="nav-item w-100">
              <a href="#" class="nav-link rounded-0 text-light ps-3" id="btn">Pesquisar</a>
            </li>

            <li class="nav-item w-100">
              <a href="{{ route('registerPage') }}" class="nav-link rounded-0 text-light ps-3" id="btn">Registar</a>
            </li>

            <li class="nav-item w-100">
                <a href="{{ route('registerAlunoPage') }}" class="nav-link rounded-0 text-light ps-3" id="btn">Registar aluno</a>
                </li>
          </ul>

        <div class="profile">
          <div class="dropup ms-3">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle me-2">
              <strong>{{ session('LoggedUser')->name }}</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
              <li><a class="dropdown-item" href="#">New project...</a></li>
              <li><a class="dropdown-item" href="#">Settings</a></li>
              <li><a class="dropdown-item" href="#">Profile</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="{{ route('logout') }}">Sign out</a></li>
            </ul>
          </div>
        </div>
      </nav>

    <button class="btn text-dark shadow-none" id="menu-btn" style="position:fixed;left:250px;width:50px;height:50px;z-index:9999" onclick="closeSidebar()">
    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	    width="30px" height="30px" viewBox="0 0 451.846 451.847" style="enable-background:new 0 0 451.846 451.847;">
      <g>
        <path d="M97.141,225.92c0-8.095,3.091-16.192,9.259-22.366L300.689,9.27c12.359-12.359,32.397-12.359,44.751,0
          c12.354,12.354,12.354,32.388,0,44.748L173.525,225.92l171.903,171.909c12.354,12.354,12.354,32.391,0,44.744
          c-12.354,12.365-32.386,12.365-44.745,0l-194.29-194.281C100.226,242.115,97.141,234.018,97.141,225.92z"/>
      </g>
    </svg>
    </button>

    <div id="content" class="content" style="position:absolute; left:250px;" align="center">
    <table style="height:0px; border: none; box-shadow: none">
    </table>
    <div class="input-group d-flex justify-content-center mt-3">
      <div class="form-outline w-50">
        <input type="text" id="form1" class="form-control" placeholder="Pesquisa"/>
      </div>
      <button type="button" class="btn btn-primary">
        <i class="fa fa-search"></i>
      </button>
    </div>
      @foreach($ocorrencias as $occ)
          <div class="card w-75 mt-5 mb-5" style="background-color: #ddd">
            <div class="card-body">
              <h5 class="card-title">{{ $occ->aluno->nome }}</h5>
              <p class="card-text">{{ $occ->descricao }}</p>
                <div class="d-flex justify-content-start">
                  <ul>
                    @forelse ($occ->motivos as $motivo)
                      <li>{{ $motivo->motivo }}</li>
                    @empty
                      
                    @endforelse
                  </ul>
                </div>
              <a href="#" class="btn btn-primary">Ver ocorrência</a>
            </div>
          </div>
      @endforeach
    </div>
    </body>
<html>