<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registar</title>
      
      <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <!-- Script de overlay de confirmações/avisos -->
    <script src="{{ asset('js/overlay.js') }}" type="text/javascript"></script>
    <link href="{{ url('/css/overlay.css') }}" rel="stylesheet">

    <link href="{{ url('/css/pagOcc.css') }}" rel="stylesheet">
    <link href="{{ url('/css/navbar.css') }}" rel="stylesheet">

    <script>
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
          <div class="largeScreenButtons">
            <ul class="nav-pills navbar-nav d-flex flex-column w-100">
              <li class="nav-item w-100">
                <a href="{{ route('dashboardPage') }}" class="nav-link rounded-0 text-light" id="btn" title="Início"><i class="fa fa-home fa-fw"></i> <span>Início</span></a>
              </li>

              <li class="nav-item w-100">
                <a href="{{ route('ocorrenciaPage') }}" class="nav-link rounded-0 text-light" id="btn" title="Criar Ocorrência"><i class="fa fa-plus-square fa-fw"></i> <span>Criar Ocorrência</span></a>
              </li>

              @if(session('LoggedUser')->cargo == "Diretor de Turma")
                <li class="nav-item w-100">
                  <a href="{{ route('minhaTurma') }}" class="nav-link rounded-0 text-light" id="btn" title="Direação de turma"><i class="fas fa-users fa-fw"></i> <span>Direção de turma</span></a>
                </li>
              @endif

              
              <li class="nav-item w-100">
                <a href="{{ route('minhasOcc') }}" class="nav-link rounded-0 text-light" id="btn" title="Minhas Ocorrências"><i class="fas fa-book fa-fw"></i> <span>Minhas Ocorrências</span></a>
              </li>    
              
              @if(session('LoggedUser')->cargo == "Diretor" || session('LoggedUser')->cargo == "Secretaria")
                <li class="nav-item w-100">
                  <a href="{{ route('mostrarOcorrencias') }}" class="nav-link rounded-0 text-light" id="btn" title="Pesquisar"><i class="fa fa-search fa-fw"></i> <span>Pesquisar</span></a>
                </li>

                <li class="nav-item w-100">
                  <a href="{{ route('pesquisaUser') }}" class="nav-link rounded-0 text-light" id="btn" title="Pesquisar Utilizador"><i class="fas fa-users"></i> <span>Pesquisar Utilizador</span></a>
                </li>


                <div class="dropdown nav-item w-100 registar-div" onclick="mudarButton()">
                  <a class="dropdown-toggle nav-link rounded-0 text-light" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="row me-0">
                      <div class="col">
                        <i class="fas fa-user-plus fa-fw" title="Registar"></i> 
                        <span> Registar </span>
                      </div>

                      <div class="col d-flex pt-1 justify-content-end">
                        <i class="fas fa-sort-down w-auto text-right fa-fw" id="dropdown-button"></i>                
                      </div>
                    </div>
                  </a>
                  

                  <ul class="dropdown-menu p-0 m-0 border-0" aria-labelledby="dropdownMenuButton" style="background-color: transparent;">
                    <li title="Registar Utilizador">
                      <a href="{{ route('registerPage') }}" class="dropdown-item nav-link rounded-0 text-light" id="btn"><i class="fas fa-plus-square fa-fw"></i> <span>Registar Utilizador</span></a>
                    </li>

                    <li title="Registar Aluno">
                      <a href="{{ route('registerAlunoPage') }}" class="dropdown-item nav-link rounded-0 text-light" id="btn"><i class="fas fa-plus-square fa-fw"></i> <span>Registar Aluno</span></a>
                    </li>

                    <li title="Registar Turma">
                      <a href="{{ route('registerTurmas') }}" class="dropdown-item nav-link rounded-0 text-light" id="btn"><i class="fas fa-plus-square fa-fw"></i> <span>Registar Turma</span></a>
                    </li>

                    <li title="Registar Escola">
                      <a href="{{ route('registerEscolas') }}" class="dropdown-item nav-link rounded-0 text-light" id="btn"><i class="fas fa-plus-square fa-fw"></i> <span>Registar Escola</span></a>
                    </li>
                  </ul>
                </div>
              @endif     
            </ul>
          </div>

        <div class="profile">
          <div class="dropup ms-2">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="https://st2.depositphotos.com/1104517/11967/v/950/depositphotos_119675554-stock-illustration-male-avatar-profile-picture-vector.jpg" alt="mdo" width="32" height="32" class="rounded-circle me-2">
              <strong id="userDetails">{{ session('LoggedUser')->name }}</strong>
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

    <div id="overlay" class="justify-content-center align-items-center">
        <div class="card w-25" id="cardConfirm">
          <div class="card-header" id="headerCard"></div>
          <div class="card-body p-1" style="height: auto !important;">
            <div class="col d-flex flex-column p-1">
              <div class="row-auto p-1">
                <span id="mensagem"></span>
              </div>

              <div class="row w-100 m-0 mt-2 mb-2 d-flex flex-row justify-content-center text-center" >
                <div class="col ps-1">
                  <div id="buttonSim" onclick="">Confirmar</div>
                </div>

                <div class="col pe-1">
                  <div id="buttonCancelar" onclick="closeOverlayCard()">Cancelar</div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

    <div class="row full-content" id="content" style="margin-left: 250px;">
      <div class="col p-0">
        <div class="row title d-flex justify-content-center align-items-center">
          <h1 class="w-auto">Minhas Ocorrências</h1>
        </div>

        <div class="row justify-content-center">
          <div class="col-auto">
            <div class="card" id="cardOcc" style="width: 60vw;">
              <div class="card-header">
                <div class="row">
                  <div class="col">
                    <div class="row">
                      <span>Nome do Aluno: {{ $idOcc->aluno->nome }} <a href="{{ route('perfilAluno', $idOcc->aluno->id) }}"><i class="fas fa-external-link-alt"></i></a></span>
                    </div>
                    <span>Ano e Turma: {{ $turma }}</span>
                  </div>

                  <div class="col d-flex justify-content-end">
                    <div class="text-end pe-2">
                      <div class="row mt-1">
                        <span class="p-0">Data: {{ $idOcc->data }}</span>
                      </div>
                      <div class="row mt-1">
                        <span class="p-0">Criado por: {{ $idOcc->user->name }}</span>
                      </div>

                      <div class="row justify-content-end mt-1">
                        @if($idOcc->estado == 'Pendente' && (session('LoggedUser')->cargo != 'Diretor' && session('LoggedUser')->cargo != 'Secretaria'))
                        <div class="col-auto align-self-center d-flex justify-content-center" style="font-weight: 600; color:white; background-color: rgb(255,200,0); border: 3px solid rgb(255,200,0);border-radius: 4px; height:20px; width: 75px; font-size: 12px"><span class="align-self-center">Pendente</span></div>      
                        @endif
                      </div>
                    </div>
                  </div>
                    
                </div>
              </div>

              <div class="card-body pt-2 pb-2">
                <div class="col">
                  <div class="row">
                    <span>Motivos:</span>
                    
                    <ul style="list-style-position:inside">
                      @foreach ($motivosOcc as $motivo)
                        <li>
                            {{ $motivo }}
                        </li>
                      @endforeach
                    </ul>
                  </div>

                  <hr style="width: 100%;">

                  <div class="row">
                    <span>Descrição da Ocorrência:</span>
                    <span>{{ $idOcc->descricao }}</span>
                  </div>

                  <hr class="w-100">

                  <div class="row">
                    <span>Decisão Tomada:</span>
                    <span>{{ $idOcc->decisao }}</span>
                  </div>

                  <hr class="w-100">

                  <div class="row">
                    <div class="col">
                      <div class="row">
                        <span>O comportamento observou-se neste aluno:</span>
                      </div>
                      <span>{{ $idOcc->frequencia }}</span>
                    </div>
                    
                    <div class="col">
                      <div class="row">
                        <span>O aluno já demonstrou outros comportamento incorretos?</span>
                      </div>
                      <span>{{ $idOcc->comport_inc }}</span>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>

          @if(session('LoggedUser')->cargo == 'Diretor' || session('LoggedUser')->cargo == 'Secretaria' || $idOcc->estado != 'Pendente')
            <div class="col-auto">
              <div class="card" id="cardEstado">
                <div class="card-header">
                  <div class="row">
                    @if($idOcc->estado == 'Pendente')
                      <div class="col-auto">Mudar estado</div>
                    @else
                      <div class="col-auto">Estado</div>
                    @endif
                    <div class="col m-0 d-flex justify-content-end">               
                      @switch($idOcc->estado)
                        @case('Aceite')
                          <div class="col-auto align-self-center d-flex justify-content-center" style="font-weight: 600;color:white; background-color: rgb(0,200,0); border: 3px solid rgb(0,200,0);border-radius: 4px; height:20px; width: 75px; font-size: 12px"><span class="align-self-center">Aceite</span></div> 
                        @break;
          
                        @case('Pendente')       
                          <div class="col-auto align-self-center d-flex justify-content-center" style="font-weight: 600; color:white; background-color: rgb(255,200,0); border: 3px solid rgb(255,200,0);border-radius: 4px; height:20px; width: 75px; font-size: 12px"><span class="align-self-center">Pendente</span></div>      
                        @break;
          
                        @case('Recusada')              
                          <div class="col-auto  align-self-center d-flex justify-content-center" style="font-weight: 600;color:white; background-color: rgb(255,0,0); border: 3px solid rgb(255,0,0);border-radius: 4px; height:20px; width: 75px; font-size: 12px"><span class="align-self-center">Recusada</span></div>
                        @break;
                      @endswitch  
                    </div>
                  </div>
                </div>

                <div class="card-body">
                  @if($idOcc->estado == 'Pendente')
                    <div class="row-auto d-flex">
                        <div class="col w-50 d-flex justify-content-center rounded-start" id="buttonStatAceitar">Aceitar</div>
                        <div class="col w-50 d-flex justify-content-center rounded-end"id="buttonStatRecusar">Recusar</div>
                    </div>
                    <hr>
                  @endif

                  <div class="card">
                    <div class="card-header">
                      Motivo:
                    </div>

                    <div class="card-body p-0 ">
                      @if($idOcc->estado == 'Pendente')
                        <textarea class="p-2" name="motivo_est" id="motivo_est" cols="30" rows="10" style="border: 0px; resize: none;"></textarea>
                      @else
                        <textarea class="p-2" name="motivo_est" id="motivo_est" cols="30" rows="10" disabled style="border: 0px; resize: none;">@if($idOcc->motivo != null){{ $idOcc->motivo }}@endif</textarea>
                      @endif
                    </div>
                  </div>

                  <div class="row m-0 justify-content-center">
                    @if($idOcc->estado == 'Pendente')              
                      <button class="btn-sub mt-3 w-50" onclick="alterarEstado('{{ $idOcc->id }}')" type="button" id="submitButton">SUBMETER</button>
                    @endif
                  </div>
                </div>
              </div>
            
              <!-- <div class="card">
                <div class="card-header ">
                  <div class="row">
                    <div class="col-auto">a</div>
                    <div class="col m-0 d-flex justify-content-end">               
                      @switch($idOcc->estado)
                        @case('Aceite')
                          <div class="col-auto align-self-center d-flex justify-content-center" style="font-weight: 600;color:white; background-color: rgb(0,200,0); border: 3px solid rgb(0,200,0);border-radius: 4px; height:20px; width: 75px; font-size: 12px"><span class="align-self-center">Aceite</span></div> 
                        @break;
          
                        @case('Pendente')       
                          <div class="col-auto align-self-center d-flex justify-content-center" style="font-weight: 600; color:white; background-color: rgb(255,200,0); border: 3px solid rgb(255,200,0);border-radius: 4px; height:20px; width: 75px; font-size: 12px"><span class="align-self-center">Pendente</span></div>      
                        @break;
          
                        @case('Recusada')              
                          <div class="col-auto  align-self-center d-flex justify-content-center" style="font-weight: 600;color:white; background-color: rgb(255,0,0); border: 3px solid rgb(255,0,0);border-radius: 4px; height:20px; width: 75px; font-size: 12px"><span class="align-self-center">Recusada</span></div>
                        @break;
                      @endswitch  
                    </div>
                  </div>
                </div>

                <div class="card-body">
                  <div class="card">
                    <div class="card-header">
                      Motivo:
                    </div>

                    <div class="card-body p-0">
                      <textarea disabled name="motivo_est" id="motivo_est" cols="30"style="border: 0px; resize: none;"></textarea>
                    </div>
                  </div>
                </div>
              </div> -->
            </div>
          @endif
        </div>
      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <script>
      var estado = 0;

      $(document).ready(function()
      {
        $('#buttonStatAceitar').click(function(){
          estado = 1;
          document.getElementById('buttonStatAceitar').style.backgroundColor= "rgb(0,200,0)";
          document.getElementById('buttonStatAceitar').style.color= "rgb(255,255,255)";

          document.getElementById('buttonStatRecusar').style.backgroundColor= "rgba(0,0,0,0)";
          document.getElementById('buttonStatRecusar').style.color= "rgb(255,0,0)";
        });

        $('#buttonStatRecusar').click(function(){
          estado = 2;
          document.getElementById('buttonStatRecusar').style.backgroundColor= "rgb(255,0,0)";
          document.getElementById('buttonStatRecusar').style.color= "rgb(255,255,255)";

          document.getElementById('buttonStatAceitar').style.backgroundColor= "rgba(0,0,0,0)";
          document.getElementById('buttonStatAceitar').style.color= "rgb(0,200,0)";
        });
      });

      function alterarEstado(idOcc) { 
        if(estado != 0 && $('#motivo_est').val() != '')
        {   
          $.ajax({
            type:'POST',
            url: '{{ route("alterarEstado") }}',
            data: { idOcc : idOcc, estado : estado, motivo :  $('#motivo_est').val()},
            success: function(redirect)
            {
              window.location.replace(redirect)
            }
          });
        }
        else
        {
          if(estado == 0)
          {
            overlayCard('Aviso','Aviso','Por favor selecione se pretende Aceitar ou Recusar a ocorrência.');
          }else if($('#motivo_est').val() == '')
          {
            overlayCard('Aviso','Aviso','Por favor escreva um motivo para a sua escolha.');
          }
          
        }
      }
    </script>
  </body>
</html>