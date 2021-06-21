<!doctype html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Dashboard</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono&display=swap" rel="stylesheet">

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
                    <a href="{{ route('registerTurmas') }}" class="dropdown-item nav-link rounded-0 text-light" id="btn"><i class="fas fa-plus-square fa-fw"></i> Registar Turma</a>
                  </li>

                  <li>
                    <a href="{{ route('registerEscolas') }}" class="dropdown-item nav-link rounded-0 text-light" id="btn"><i class="fas fa-plus-square fa-fw"></i> Registar Escola</a>
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

          <div class="row mb-3">
            <div class="card p-0">
              <h5 class="card-header">Ocorrências criadas por mês</h5>

              <div class="card-body justify-content-center d-flex">
                <canvas id="myChart" style="height: 300px; max-width: 100%;"></canvas>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="card p-0">
              <h5 class="card-header">Notificações</h5>

              <div class="card-body">
                @if ($arrayNot != null)
                  <div class="pt-1 pb-1 ps-3 pe-3 mb-1 alert alert-secondary d-flex" id="noNotifs" role="alert" style="display: none !important;">
                    <div class="col-auto">Não foram encontradas notificações<br></div>
                  </div>  

                  @foreach ($arrayNot as $not)
                    <a href="{{ route('pagOcc', $not->cod_occ) }}" target="_blank" class="pt-1 pb-1 ps-3 pe-3 mb-1 alert alert-secondary alert-dismissible d-flex" class="notifications" id="notification" role="alert">
                      <div class="col-auto">{{ $not->texto }} <br></div>
                      <div class="col align-items-center justify-content-end d-flex"><button type="button" class="btn-close p-0 d-flex " id="buttonCloseNotif" style="position:relative" data-bs-dismiss="alert" aria-label="Close" onclick="apagarNotification('{{ $not->id }}')"></button></div>               
                    </a>            
                  @endforeach
                @else
                  <div class="pt-1 pb-1 ps-3 pe-3 mb-1 alert alert-secondary d-flex" role="alert">
                    <div class="col-auto">Não foram encontradas notificações<br></div>
                  </div>  
                @endif
              </div>
            </div>
          </div>
        </div>

        <div class="col-auto d-flex align-items-center me-1 ms-2 ps-0">
          <div class="card text-dark bg-light" style="max-width: 18rem; height: 99vh;">
            <div class="card-header">Estado das Ocorrências</div>
            <div class="card-body pt-2">   
              <div class="col h-100">
                <div class="row-auto p-0 m-0">
                  <div class="progress" id="progress" style="height: 10px;" title="Sem ocorrências">
                    <div class="progress-bar" role="progressbar" title="Clique para visualizar apenas ocorrências aceites" style="background-color: rgb(0,200,0); width: {{ $percentagem['Aceites'] }};" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100" id="progBarVerde"><span class="textoProgBar" hidden>Aceites: {{ $qtdOccs['Aceites'] }}</span></div>
                    <div class="progress-bar" role="progressbar" title="Clique para visualizar apenas ocorrências pendentes" style="background-color: rgb(255,200,0); width: {{ $percentagem['Pendentes'] }};" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" id="progBarAmarelo"><span class="textoProgBar" hidden>Pendentes: {{ $qtdOccs['Pendentes'] }}</span></div>
                    <div class="progress-bar" role="progressbar" title="Clique para visualizar apenas ocorrências recusadas" style="background-color: rgb(255,0,0); width: {{ $percentagem['Recusadas'] }};" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" id="progBarVermelho"><span class="textoProgBar" hidden>Recusadas: {{ $qtdOccs['Recusadas'] }}</span></div>
                  </div>      
                </div>

                <hr class="mt-2 mb-2">

                <div class="row-auto p-0 m-0" id="sidebarOccs">
                </div>
               
                <a href="{{ route('minhasOcc') }}" class="row p-0 m-0 justify-content-center text-center" id="avisoOccs" style="position: absolute; bottom: 10px;left: 5%; right: 5%;font-size: 10px; word-wrap: break-word;">
                  <hr class="w-75">
                  Está a ver apenas as suas últimas ocorrências.
                  Clique aqui se deseja ver todas as suas ocorrências.
                </a>
              </div>
            </div>
          </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    
    <script>
      var filtered = false;
      $(document).ready(function()
      {
        filtrarOcorrencias(0);
        $("#progBarVerde").mouseover(function()
        {
          expandirProgBar(1);
        });

        $("#progBarAmarelo").mouseover(function()
        {
          expandirProgBar(2);
        });

        $("#progBarVermelho").mouseover(function()
        {
          expandirProgBar(3);
        });

        $(".progress-bar").mouseleave(function()
        {
          reduzirProgBar();
        });

        $("#progBarVerde").click(function()
        {
          filtrarOcorrencias(1);
        });

        $("#progBarAmarelo").click(function()
        {
          filtrarOcorrencias(2);
        });

        $("#progBarVermelho").click(function()
        {
          filtrarOcorrencias(3);
        });

      });

      function filtrarOcorrencias(estadoOcc) {
        if(!filtered)
        {
          estadoOcc = 0;
        }

        $.ajax({
          type:'GET',
          url: '{{ route("filtrarOccs") }}',
          data: { estadoOcc: estadoOcc },
          success: function(occs)
          {
            var vars = JSON.parse(occs);

            $("#sidebarOccs").empty();

            $.each(vars, function(i,v){
              var d = new Date(vars[i].data);
              var dia = d.getDate();
              var mes = d.getMonth() + 1;
              var ano = d.getFullYear();

              if(dia < 10)
              {
                dia = '0'+dia;
              }

              if(mes < 10)
              {
                mes = '0'+mes;
              }

              switch (vars[i].estado) {
                case 'Aceite':
                  var tempRow = '<a href="{{ route("pagOcc",'+idOcc+') }}" title="ID de Ocorrência: '+vars[i].id+'" class="row mb-2 ps-2 pe-2 pb-1 pt-1 alert alert-secondary" id="painelOcc"><div class="col-auto ps-0 ms-0 d-flex align-items-center" id="dataOccPainel" style="font-size: 13px">Dia '+dia+'-'+mes+'-'+ano+'</div><div class="col-auto ms-5 align-self-center d-flex justify-content-center" style="font-weight: 600;color:white; background-color: rgb(0,200,0); border: 3px solid rgb(0,200,0);border-radius: 4px; height:20px; width: 75px; font-size: 12px"><span class="align-self-center">Aceite</span></div></a>'; 
                  var row = tempRow.replace('+idOcc+', vars[i].id);
                    $("#sidebarOccs").prepend(row);
                  break;

                case 'Pendente':
                  var tempRow = '<a href="{{ route("pagOcc",'+idOcc+') }}" title="ID de Ocorrência: '+vars[i].id+'" class="row mb-2 ps-2 pe-2 pb-1 pt-1 alert alert-secondary" id="painelOcc"><div class="col-auto ps-0 ms-0 d-flex align-items-center" id="dataOccPainel" style="font-size: 13px">Dia '+dia+'-'+mes+'-'+ano+'</div><div class="col-auto ms-5 align-self-center d-flex justify-content-center" style="font-weight: 600; color:white; background-color: rgb(255,200,0); border: 3px solid rgb(255,200,0);border-radius: 4px; height:20px; width: 75px; font-size: 12px"><span class="align-self-center">Pendente</span></div></a>';
                  var row = tempRow.replace('+idOcc+', vars[i].id);
                  
                  $("#sidebarOccs").prepend(row);
                break;

                case 'Recusada':
                  var tempRow = '<a href="{{ route("pagOcc",'+idOcc+') }}" title="ID de Ocorrência: '+vars[i].id+'" class="row mb-2 ps-2 pe-2 pb-1 pt-1 alert alert-secondary" id="painelOcc"><div class="col-auto ps-0 ms-0 d-flex align-items-center" id="dataOccPainel" style="font-size: 13px">Dia '+dia+'-'+mes+'-'+ano+'</div><div class="col-auto ms-5 align-self-center d-flex justify-content-center" style="font-weight: 600;color:white; background-color: rgb(255,0,0); border: 3px solid rgb(255,0,0);border-radius: 4px; height:20px; width: 75px; font-size: 12px"><span class="align-self-center">Recusada</span></div></a>';
                  var row = tempRow.replace('+idOcc+', vars[i].id);
                  $("#sidebarOccs").prepend(row);
                break;
              }
              
            })

            if(vars == '0')
            {
              var row = '<a class="row mb-2 ps-2 pe-2 pb-1 pt-1 alert alert-secondary justify-content-center" id="painelOcc">Sem ocorrências</a>';
              $("#sidebarOccs").prepend(row);
            }
            
          }
        });

        filtered = !filtered;

        //$('#sidebarOccs').prepend('<p>aaa</p>');
      }

      function expandirProgBar(numCor) {
        document.getElementById('progress').style.height = "20px";

        switch (numCor) {
          case 1:
          document.getElementsByClassName('textoProgBar')[0].removeAttribute('hidden');
          document.getElementById('progBarVerde').style.width = "100%";
          document.getElementById('progBarAmarelo').style.width = "0%";
          document.getElementById('progBarVermelho').style.width = "0%";
            break;

            case 2:
            document.getElementsByClassName('textoProgBar')[1].removeAttribute('hidden');
            document.getElementById('progBarVerde').style.width = "0%";
            document.getElementById('progBarAmarelo').style.width = "100%";
            document.getElementById('progBarVermelho').style.width = "0%";
            break;

            case 3:
            document.getElementsByClassName('textoProgBar')[2].removeAttribute('hidden');
            document.getElementById('progBarVerde').style.width = "0%";
            document.getElementById('progBarAmarelo').style.width = "0%";
            document.getElementById('progBarVermelho').style.width = "100%";
            break;
        }

      }

      function reduzirProgBar() {
        if(filtered)
        {
          for (let i = 0; i < document.getElementsByClassName('textoProgBar').length; i++) {
          document.getElementsByClassName('textoProgBar')[i].setAttribute('hidden', 0);     
          }

            document.getElementById('progress').style.height = "10px";
            document.getElementById('progBarVerde').style.width = "{{ $percentagem['Aceites'] }}";
            document.getElementById('progBarAmarelo').style.width = "{{ $percentagem['Pendentes'] }}";
            document.getElementById('progBarVermelho').style.width = "{{ $percentagem['Recusadas'] }}";
          }
      }

      function apagarNotification(idNotif) {
        $.ajax({
          type:'POST',
          url: '{{ route("eliminarNotif") }}',
          data: { idNotif: idNotif },
          success: function(qtdNotifs)
          {
            if (qtdNotifs == 0) {
              document.getElementById('noNotifs').style.display = "flex";
            }
          }
        });
      }


      var myChart = document.getElementById("myChart").getContext("2d");

      //Global Options
      Chart.defaults.font.family = "Arial";
      Chart.defaults.font.size = 20;

      var gradient = myChart.createLinearGradient(0, 0, 0, 400);
      gradient.addColorStop(0, 'rgba(255,0,0,1)');   
      gradient.addColorStop(1, 'rgba(250,174,50,0)');

      $.ajax({
          type:'GET',
          url: '{{ route("grafOcc") }}',
          success: function(info)
          {
            var vars = JSON.parse(info);

            var chartType = new Chart(myChart, {
              type:'line',
              data:{
                labels:vars.labels,
                datasets:[{
                  label: 'Nº de ocorrências',
                  data: vars.quantidade,
                  backgroundColor: gradient,
                  borderColor: "rgb(200,0,0)",
                }],
              },
              options:{
                tension: 0.4,
                bezierCurve: true,
                fill: true,
                responsive: true,
                maintainAspectRatio: false,
                scale: {
                  ticks: {
                    precision: 0,
                  }
                },
                scales:{
                  y:{
                    beginAtZero: true,
                  }
                }
              }
            });
          }
        });
    </script>
  </body>
</html>
