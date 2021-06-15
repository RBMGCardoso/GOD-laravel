<!doctype html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">

    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link href="{{ url('/css/dashboard.css') }}" rel="stylesheet">

    <link href="{{ url('/css/navbar.css') }}" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.2/chart.min.js" integrity="sha512-VCHVc5miKoln972iJPvkQrUYYq7XpxXzvqNfiul1H4aZDwGBGC0lq373KNleaB2LpnC2a/iNfE5zoRYmB4TRDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
      //// Como o nome diz, fecha e abre a sidebar ao clicar no botão
      //
      function closeSidebar()
      {
        var sidebar = document.getElementById("sidebar");
        var button = document.getElementById("menu-btn");
        var content = document.getElementById("content");

        if(sidebar.style.marginLeft == "-250px")
        {        
          //abrir
          sidebar.style.marginLeft = "0px";
          button.style.transform.transitionDuration = "2s";
          button.style.transform = "translateX(0px)";
          content.style.marginLeft = "250px";
          
        }
        else
        {
          //fechar
          sidebar.style.marginLeft = "-250px";
          button.style.transform.transitionDuration = "2s";
          button.style.transform = "translateX(-250px) rotate(180Deg)";
          content.style.marginLeft = "0px";
        }
      }
    </script>
    
  </head>
  <body>
    @if(session()->has('jsPermissionAlert'))
      <script>
          alert("{{ session()->get('jsPermissionAlert') }}");
      </script>
    @endif

    <div class="navbar-div">
      <nav class="navbar navbar-expand d-flex flex-column align-item-start" id="sidebar">
          <a href="{{ route('dashboardPage') }}" class="navbar-brand text-light">
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
              <a href="{{ route('dashboardPage') }}" class="nav-link rounded-0 text-light" id="btn"><i class="fa fa-home fa-fw"></i> Início</a>
            </li>

            <li class="nav-item w-100">
              <a href="{{ route('ocorrenciaPage') }}" class="nav-link rounded-0 text-light" id="btn"><i class="fa fa-plus-square fa-fw"></i> Criar Ocorrência</a>
            </li>

            @if(session('LoggedUser')->cargo == "Diretor de Turma")
              <li class="nav-item w-100">
                <a href="{{ route('minhaTurma') }}" class="nav-link rounded-0 text-light" id="btn"><i class="fas fa-users fa-fw"></i> Direção de turma</a>
              </li>
            @endif

            
            <li class="nav-item w-100">
              <a href="{{ route('minhasOcc') }}" class="nav-link rounded-0 text-light" id="btn"><i class="fas fa-book fa-fw"></i> Minhas Ocorrências</a>
            </li>    
            
            @if(session('LoggedUser')->cargo == "Diretor" || session('LoggedUser')->cargo == "Secretaria")
              <li class="nav-item w-100">
                <a href="{{ route('mostrarOcorrencias') }}" class="nav-link rounded-0 text-light" id="btn"><i class="fa fa-search fa-fw"></i> Pesquisar</a>
              </li>

              <div class="dropdown nav-item w-100 registar-div" onclick="mudarButton()">
                <a class="dropdown-toggle nav-link rounded-0 text-light" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  <div class="row me-0">
                    <div class="col">
                      <i class="fas fa-user-plus fa-fw"></i> 
                      Registar 
                    </div>

                    <div class="col d-flex pt-1 justify-content-end">
                      <i class="fas fa-sort-down w-auto text-right fa-fw" id="dropdown-button"></i>                
                    </div>
                  </div>
                </a>
                

                <ul class="dropdown-menu p-0 m-0" aria-labelledby="dropdownMenuButton" style="background-color: transparent;">
                  <li>
                    <a href="{{ route('registerPage') }}" class="dropdown-item nav-link rounded-0 text-light" id="btn"><i class="fas fa-plus-square fa-fw"></i> Registar Utilizador</a>
                  </li>

                  <li>
                    <a href="{{ route('registerAlunoPage') }}" class="dropdown-item nav-link rounded-0 text-light" id="btn"><i class="fas fa-plus-square fa-fw"></i> Registar Aluno</a>
                  </li>

                  <li>
                    <a href="" class="dropdown-item nav-link rounded-0 text-light" id="btn"><i class="fas fa-plus-square fa-fw"></i> Registar Turma</a>
                  </li>

                  <li>
                    <a href="" class="dropdown-item nav-link rounded-0 text-light" id="btn"><i class="fas fa-plus-square fa-fw"></i> Registar Escola</a>
                  </li>
                </ul>
              </div>
            @endif     
          </ul>

        <div class="profile">
          <div class="dropup ms-3">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="https://st2.depositphotos.com/1104517/11967/v/950/depositphotos_119675554-stock-illustration-male-avatar-profile-picture-vector.jpg" alt="mdo" width="32" height="32" class="rounded-circle me-2">
              <strong>{{ session('LoggedUser')->name }}</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
              <li><a class="dropdown-item">
                    Cargo: {{ session('LoggedUser')->cargo }}     
              </a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Meu perfil</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="{{ route('logout') }}">Terminar Sessão</a></li>
            </ul>
          </div>
        </div>
            <!--      SCRIPTS     -->
            <script src="{{ url('/js/navbar.js') }}"></script>
      </nav>

      <button class="btn text-dark shadow-none" id="menu-btn" style="position:absolute;left:250px;width:50px;height:50px" onclick="closeSidebar()">
        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
          width="30px" height="30px" viewBox="0 0 451.846 451.847" style="enable-background:new 0 0 451.846 451.847;">
          <g>
            <path d="M97.141,225.92c0-8.095,3.091-16.192,9.259-22.366L300.689,9.27c12.359-12.359,32.397-12.359,44.751,0
              c12.354,12.354,12.354,32.388,0,44.748L173.525,225.92l171.903,171.909c12.354,12.354,12.354,32.391,0,44.744
              c-12.354,12.365-32.386,12.365-44.745,0l-194.29-194.281C100.226,242.115,97.141,234.018,97.141,225.92z"/>
          </g>
        </svg>
      </button>
      
      <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
      <script src="./js/sidebars.js"></script>
    </div>

    <div class="row full-content" id="content" style="margin-left: 250px; height:100vh">
        <div class="col ms-2">
          <div class="row" style="margin-top: 50px">
            <div class="alert alert-info d-flex" role="alert">
              <div class="col-auto">Bem vindo(a), {{ session('LoggedUser')->name }}, está aqui a sua dashboard.</div>
              <div class="col text-end">Data: {{ date("d-m-Y")}}</div>
            </div>
          </div>

          <div class="row">
            <div class="card p-0">
              <h5 class="card-header">Ocorrências criadas por mês</h5>

              <div class="card-body justify-content-center d-flex">
                <canvas id="myChart" style="height: 300px; max-width: 100%;"></canvas>
              </div>
            </div>
          </div>
        </div>

        <div class="col-auto d-flex align-items-center me-1 ms-2 ps-0">
          <div class="card text-dark bg-light" style="max-width: 18rem; height: 99vh;">
            <div class="card-header">Estado das Ocorrências</div>
            <div class="card-body pt-2">   
              <div class="col">
                @foreach($arrayOcc as $occ)
                  <a href="{{ route('pagOcc', $occ->id) }}" class="row mb-2 ps-2 pe-2 pb-1 pt-1 alert alert-secondary" id="painelOcc">
                    <div class="col-auto ps-0 ms-0 d-flex align-items-center" style="font-size: 13px">Dia {{ date('d-m-Y', strtotime($occ->data)) }}</div>
                    <div class="col-auto ms-5 align-self-center d-flex justify-content-center" style="font-weight: 600;color:white; background-color: rgb(0,200,0); border: 3px solid rgb(0,200,0);border-radius: 4px; height:20px; width: 75px; font-size: 12px"><span class="align-self-center">Aceite</span></div>
                  </a>
                @endforeach
                <div class="row mb-2 ps-2 pe-2 pb-1 pt-1 alert alert-secondary">
                  <div class="col-auto ps-0 ms-0 d-flex align-items-center" style="font-size: 13px">Dia 12-32-2122</div>
                  <div class="col-auto ms-5 align-self-center d-flex justify-content-center" style="font-weight: 600; color:white; background-color: rgb(255,200,0); border: 3px solid rgb(255,200,0);border-radius: 4px; height:20px; width: 75px; font-size: 12px"><span class="align-self-center">Pendente</span></div>
                </div>

                <div class="row mb-2 ps-2 pe-2 pb-1 pt-1 alert alert-secondary">
                  <div class="col-auto ps-0 ms-0 d-flex align-items-center" style="font-size: 13px">Dia 12-32-2122</div>
                  <div class="col-auto ms-5 align-self-center d-flex justify-content-center" style="font-weight: 600;color:white; background-color: rgb(255,0,0); border: 3px solid rgb(255,0,0);border-radius: 4px; height:20px; width: 75px; font-size: 12px"><span class="align-self-center">Recusada</span></div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script>
      var myChart = document.getElementById("myChart").getContext("2d");

      //Global Options
      Chart.defaults.font.family = "Arial";
      Chart.defaults.font.size = 20;

      $.ajax({
          type:'GET',
          url: '{{ route("grafOcc") }}',
          success: function(info)
          {
            var vars = JSON.parse(info);

            console.log(vars.labels);
            var chartType = new Chart(myChart, {
              type:'line',
              data:{
                labels:vars.labels,
                datasets:[{
                  label: 'Nº de ocorrências',
                  data: vars.quantidade,
                  backgroundColor: "rgb(255,0,0)",
                  borderColor: "rgb(200,0,0)",
                }],
              },
              options:{
                responsive: true,
                maintainAspectRatio: false,
                scale: {
                  ticks: {
                    precision: 0
                  }
                }
              }
            });
          }
        });
    </script>
  </body>
</html>
