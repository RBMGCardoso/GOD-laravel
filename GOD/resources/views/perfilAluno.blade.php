<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minhas Ocorrências</title>
      
      <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link href="{{ url('/css/perfilAluno.css') }}" rel="stylesheet">
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

    <div class="row full-content" id="content" style="margin-left: 250px;">
      <div class="col p-0">
        <div class="row title d-flex justify-content-center align-items-center">
          <h1 class="w-auto">Informações sobre o Aluno</h1>
        </div>

        <div class="row justify-content-center">
          <div class="col-auto">
            <div class="card mb-4" style="width: 60vw;">
              <div class="card-header">
                <div class="row">
                  <div class="col">
                    Nome do Aluno: <b> {{ $idAluno->nome }} </b>
                  </div>

                  <div class="col-auto justify-content-end">
                    Nº. Turma:
                  </div>

                  <div class="col-auto justify-content-end">
                    Ano e Turma: {{ $turma->ano }}{{ $turma->codTurma }}
                  </div>
                </div>
              </div>

              <div class="card-body pt-2 pb-2">
                <div class="col">
                  <div class="row">
                    <div class="col">
                      Escola: {{ $escola->nome }}
                    </div>

                    <div class="col">
                      Email: {{ $idAluno->email }}
                    </div>

                    <div class="col-auto justify-content-end">
                      Telemóvel: {{ $idAluno->telef }}
                    </div>
                  </div>

                  <div class="row">
                    <div class="col">
                      Morada: {{ $idAluno->morada }}
                    </div>

                    <div class="col">
                      Concelho: {{ $idAluno->concelho }}
                    </div>

                    <div class="col-auto justify-content-end">
                      Codigo Postal: {{ $idAluno->codpost }}
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="card mb-4" style="width: 60vw;">
              <div class="card-header">
                @if (isset($encarregado))
                  <div class="row">
                    <div class="col">
                      Nome do Encarregado de Educação: {{ $encarregado->nome }}
                    </div>

                    <div class="col-auto justify-content-end">
                      Parentesco: {{ $encarregado->parentesco }}
                    </div>
                  </div>
                @else
                  Encarregado de Educação
                @endif
              </div>

              <div class="card-body pt-2 pb-2">
                @if (isset($encarregado))
                  <div class="col">
                    <div class="row">
                      <div class="col">
                        Email: {{ $encarregado->email }}
                      </div>

                      <div class="col">
                        Telemóvel: {{ $encarregado->telemovel }}
                      </div>
                    </div>

                    <div class="row">
                      <div class="col">
                        Morada: {{ $encarregado->morada }}
                      </div>

                      <div class="col">
                        Concelho: {{ $encarregado->concelho }}
                      </div>

                      <div class="col-auto justify-content-end">
                        Codigo Postal: {{ $encarregado->codpost }}
                      </div>
                    </div>
                  </div>
                @else
                  Este aluno não possui um encarregado de educação atribuido.
                @endif
              </div>
            </div>

            <div class="card" style="width: 60vw;">
              <div class="card-header">
                Lista de Ocorrências
              </div>

              <div class="card-body pt-2 pb-2">
                @forelse($ocorrencias as $occ)
                  <a href="{{ route('pagOcc', $occ) }}">
                    <div class="row mb-2 mt-2 alert alert-secondary" id="occCard">
                      <div class="col-auto d-flex align-self-center" style="border-radius:5px; border: 1px solid #555;">
                        <span style="line-height:160%;"><b>ID: {{ $occ->id }}</b></span>
                      </div>

                      <div class="col-auto align-self-center">
                        <div class="row-auto d-flex"><span style="line-height:160%;">{{ $occ->aluno->nome }}</span></div>
                        <div class="row-auto d-flex"><span style="line-height:160%;">Criado por: {{ $occ->user->name }}</span></div>
                      </div>

                      <div class="col d-flex justify-content-end">
                        <div class="justify-content-center">
                          <div class="row justify-content-center">
                            @switch($occ->estado)
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

                          <div class="row justify-content-center mt-1" style="font-size: 13.6px">
                            {{ date('d-m-Y', strtotime($occ->data)) }}
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                @empty
                    Este aluno não tem ocorrências.
                @endforelse
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>

<!--
                    <div class="row">
                      <span>Escola:</span>
                      <span>Email:</span>
                      <span>Telemovel:</span>
                    </div>

                    <div class="row">
                      <span>Data de Nascimento:</span>
                      <span>NIF:</span>
                      <span>N.º CC:</span>
                    </div>

                    <div class="row">
                      <span>Morada:</span>
                      <span>Concelho:</span>
                      <span>Codigo Postal</span>
                    </div>
-->