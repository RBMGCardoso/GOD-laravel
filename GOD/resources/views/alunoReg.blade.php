<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Registar Aluno</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
      <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">      
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link href="{{ url('/css/alunoReg.css') }}" rel="stylesheet">

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

    <div class="row-auto full-content" id="content" style="margin-left: 250px;">
      <div class="col">
        <div class="row title d-flex justify-content-center align-items-center">
          <h1 class="w-auto">Registar Aluno</h1>
        </div>

        <div class="row justify-content-center">
          <div class="col-auto">
            <div class="row m-0 justify-content-center p-0 mt-3" style="width: 60vw; height: 30px; background-color: rgba(121, 255, 255, 1);">
              <span class="separador w-auto m-0" style="line-height:30px">Dados do Aluno</span>
            </div>
  
            <form method="POST" action="{{ route('register.aluno') }}" id="myform">
              <div class="row-auto identification d-flex mt-3">
                <div class="col">
                  <div class="row m-0" style="width: 60vw;">
                    <div class="col-10 p-0">
                      <input class="input-box form-control" list="nomes" name="nome" id="fname" autocomplete="off" placeholder="Nome do Aluno">
                    </div>   
                    
                    <div class="col-2 p-0">
                      <input class="input-box form-control" type="text" id="num" name="numero" placeholder="Nº. Aluno">
                    </div>
                  </div>
    
                  <div class="row p-0 m-0 mt-2 pt-2" style="width: 60vw;">
                    <div class="col-3 p-0">
                      <select class="input-box form-control" id="selectEscola" name="escola">
                        <option selected>- Escola -</option>

                        @foreach($escolas as $escola)
                          <option value="{{ $escola->id }}">{{ $escola->nome }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="col-3 p-0">
                      <select class="input-box form-control" type="text" id="selectTurma" name="anoturma" disabled>
                        <option selected>Selecione uma escola</option>
                      </select>
                    </div>

                    <div class="col-3 p-0">
                      <input class="input-box form-control" type="text" id="email" name="email" placeholder="Email">
                    </div>

                    <div class="col-3 p-0">
                      <input class="input-box form-control" type="text" id="telef" name="telef" placeholder="Telemóvel">
                    </div>
                  </div>

                  <div class="row p-0 m-0 mt-2 pt-2" style="width: 60vw;">
                    <div class="col-4 p-0">
                      <input class="input-box form-control" type="datetime-local" name="datanasc" id="datanasc" placeholder="Data de Nascimento">

                      <div class="d-flex justify-content-end">
                        <label class="justify-content-end" style="color: red;font-size: 12px">Data de Nascimento* </label>
                      </div>
                    </div>

                    <div class="col-4 p-0">
                      <input class="input-box form-control" type="text" id="nif" name="nif" placeholder="NIF">
                    </div> 

                    <div class="col-4 p-0">
                      <input class="input-box form-control" type="text" id="cc" name="cc" placeholder="Nº. Cartão de Cidadão">
                    </div> 
                  </div>

                  <div class="row p-0 m-0 mt-2 pt-2" style="width: 60vw;">
                    <div class="col-3 p-0">
                      <input class="input-box form-control" type="text" id="concelho" name="concelho" placeholder="Concelho">
                    </div>

                    <div class="col-7 p-0">
                      <input class="input-box form-control" type="text" id="morada" name="morada" placeholder="Morada">
                    </div>

                    <div class="col-2 p-0">
                      <input class="input-box form-control" type="text" id="codpost" name="codpost" placeholder="Código Postal">
                    </div>
                  </div>
                </div>
              </div>

              <div class="row m-0 justify-content-center p-0 mt-3" style="width: 60vw; height: 30px; background-color: rgba(121, 255, 255, 1);">
                <span class="separador w-auto m-0" style="line-height:30px">Dados do Encarregado de Educação</span>
              </div>

              <div class="row-auto identification d-flex mt-3">
                <div class="col">
                  <div class="row m-0" style="width: 60vw;">
                    <div class="col-9 p-0">
                      <input class="input-box form-control" id="nomeEE" placeholder="Nome do Encarregado de Educação">
                    </div>   

                    <div class="col-3 p-0">
                      <input class="input-box form-control" type="text" id="parentesco" name="parentesco" placeholder="Parentesco">
                    </div>
                  </div>
    
                  <div class="row p-0 m-0 mt-2 pt-2" style="width: 60vw;">
                    <div class="col-3 p-0">
                      <input class="input-box form-control" id="telefEE" type="text" placeholder="Telemóvel/Telefone">
                    </div>

                    <div class="col-4 p-0">
                      <input class="input-box form-control" id="emailEE" type="text" placeholder="Email">
                    </div>

                  </div>

                  <div class="row p-0 m-0 mt-2 pt-2" style="width: 60vw;">
                    <div class="col-7 p-0">
                      <input class="input-box form-control" id="moradaEE" type="text" placeholder="Morada">
                    </div>

                    <div class="col-3 p-0">
                      <input class="input-box form-control" id="concelhoEE" type="text" placeholder="Concelho">
                    </div>

                    <div class="col-2 p-0">
                      <input class="input-box form-control" id="ccEE" type="text" placeholder="Código Postal">
                    </div>
                  </div>

                  <div class="row m-0 justify-content-end pt-4">
                    <button class="btn-sub mt-5 mb-5" onclick="verificarCampos()" type="button">SUBMETER</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <script>
      function verificarCampos()
      {
        if($("#fname").val() != "" && $("#num").val() != "" && $("#selectTurma").val() != "Selecione uma escola" &&
        $("#email").val() != "" && $("#telef").val() != "" && $("#datanasc").val() != "" && $("#nif").val() != "" &&
        $("#cc").val() != "" && $("#morada").val() != "" && $("#concelho").val() != "" && $("#codpost").val() != "")
        {
          if($("#nomeEE").val() != "" && $("#parentesco").val() != "" && $("#telefEE").val() != "" && $("#emailEE").val() != "" &&
          $("#moradaEE").val() != "" && $("#concelhoEE").val() != "" && $("#ccEE").val() != "")
          {
            $("#myform").submit();
          }
          else
          {
            if($("#nomeEE").val() == "" && $("#parentesco").val() == "" && $("#telefEE").val() == "" && $("#emailEE").val() == "" &&
            $("#moradaEE").val() == "" && $("#concelhoEE").val() == "" && $("#ccEE").val() == "")
            {
              var r = confirm("Tem a certeza que deseja adicionar um aluno sem encarregado de educação?");

              if(r)
              {
                $("#myform").submit();
              }
            }
            else
            {
              alert("Certifique-se que preenche todos os campos do encarregado de educação.");
            }
          }
        }
        else
        {
          alert("Certifique-se que preenche os campos todos.");
        }
      }


      $(document).ready(function(){
        $("#selectEscola").change(atualizarTurmas);
      });

      function atualizarTurmas() {
        if($('#selectEscola option:selected').html() != "- Escola -")
        {
          $("#selectTurma").removeAttr("disabled");

          $.ajax({
            type:'GET',
            url: '{{ route("atualizarTurmas") }}',
            success: function(occ)
            {
              var vars = JSON.parse(occ);

              $('#selectTurma').html("");


              $.each(vars.escolaId, function(index, value)
              {
                if($('#selectEscola option:selected').html() == vars.nomeEscolaSemOcc[index])
                {
                  $.each(vars.turmaId, function(i, v){
                    if(vars.turmaId[i] == $('#selectEscola option:selected').val())
                    {
                      $('#selectTurma').append("<option value="+vars.turmaEscolaAno[i]+vars.turmaEscolaCod[i]+">"+vars.turmaEscolaAno[i]+vars.turmaEscolaCod[i]+"</option>");
                    }
                  })
                }
              })

            }
          });
        }
        else
        {
          $('#selectTurma').html("");
          $('#selectTurma').append("<option>Selecione uma escola</option>");
          
          $("#selectTurma").attr("disabled", "disabled");
        }
      }
    </script>
  </body>
</html>