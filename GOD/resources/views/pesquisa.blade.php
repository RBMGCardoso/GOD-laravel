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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link href="{{ url('/css/pesquisa.css') }}" rel="stylesheet">
    <link href="{{ url('/css/navbar.css') }}" rel="stylesheet">
    
    </head>

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
              <a href="{{ route('dashboardPage') }}" class="nav-link rounded-0 text-light ps-3" id="btn"><i class="fa fa-home"></i> Início</a>
            </li>

            <li class="nav-item w-100">
              <a href="{{ route('ocorrenciaPage') }}" class="nav-link rounded-0 text-light ps-3" id="btn"><i class="fa fa-plus-square"></i> Criar Ocorrência</a>
            </li>

            <li class="nav-item w-100">
              <a href="{{ route('mostrarOcorrencias') }}" class="nav-link rounded-0 text-light ps-3" id="btn"><i class="fa fa-search"></i> Pesquisar</a>
            </li>
            
            <div class="dropdown nav-item w-100" onclick="mudarButton()">
                <a class="dropdown-toggle nav-link rounded-0 text-light ps-3" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  <div class="row me-0">
                    <div class="col">
                      <i class="fas fa-user-plus"></i> 
                      Registar 
                    </div>

                    <div class="col d-flex pt-1 justify-content-end">
                      <i class="fas fa-sort-down w-auto text-right" id="dropdown-button"></i>                
                    </div>
                  </div>
                </a>
              <ul class="dropdown-menu p-0 m-0" aria-labelledby="dropdownMenuButton" style="background-color: transparent;">
                <li>
                  <a href="{{ route('registerPage') }}" class="dropdown-item nav-link rounded-0 text-light ps-3" id="btn"><i class="fas fa-plus-square"></i> Registar Utilizador</a>
                </li>

                <li>
                  <a href="{{ route('registerAlunoPage') }}" class="dropdown-item nav-link rounded-0 text-light ps-3" id="btn"><i class="fas fa-plus-square"></i> Registar Aluno</a>
                </li>
              </ul>
            </div>
          </ul>

        <div class="profile">
          <div class="dropup ms-3">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="https://st2.depositphotos.com/1104517/11967/v/950/depositphotos_119675554-stock-illustration-male-avatar-profile-picture-vector.jpg" alt="mdo" width="32" height="32" class="rounded-circle me-2">
              <strong>{{ session('LoggedUser')->name }}</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
              <li><a class="dropdown-item" href="#">
                @forelse (session('LoggedUser')->cargos as $cargo)
                  {{ $cargo->cargo }}
                @empty
                  Nenhum cargo atribuido
                @endforelse             
              </a></li>
              <li><a class="dropdown-item" href="#">Settings</a></li>
              <li><a class="dropdown-item" href="#">Profile</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="{{ route('logout') }}">Sign out</a></li>
            </ul>
          </div>
        </div>
            <!--      SCRIPTS     -->
            <script src="{{ url('/js/navbar.js') }}"></script>
      </nav>

      <button class="btn text-dark shadow-none" id="menu-btn" style="position:relative;left:250px;width:50px;height:50px" onclick="closeSidebar()">
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

    <div id="content" class="content" style="position:absolute; left:250px;" align="center">
      <table style="height:0px; border: none; box-shadow: none" id="responsive-table">
      </table>

    <div class="form d-flex justify-content-center mt-3">
      <div class="row" id="search">
        <div class="col m-0 p-0">
          <div class="form-outline">
            <input type="search" class="form-control rounded-0" id="pesquisa" placeholder="Pesquisar nome do aluno..."/>
          </div>
        </div>

        <div class="col-auto m-0 p-0">
          <button type="button" class="btn btn-secondary disabled" style="border-radius: 0;">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </div>

    <div class="col d-flex justify-content-center mt-2">
      <div class="row-auto me-4" style="width: 258px">
        <select class="form-select" aria-label="Default select example" name="selectEscola" id="selectEscola">
          <option value="null" selected>Todas as escolas</option>
          @foreach($escolas as $escola)
            <option value="{{ $escola->id }}">{{ $escola->nome }}</option>
          @endforeach
        </select>
      </div>

      <div class="row-auto ms-4" style="width: 258px">
        <select class="form-select" aria-label="Default select example" id="selectTurma" disabled>
            <option selected>Selecione uma escola</option>
        </select>
      </div>
    </div>

    <p id="output"><!--usado para debugging do controller com ajax-->
      
    </p>


        <table class="text-center" id="table-ocorrencias">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome do aluno</th>
              <th>Turma</th>
              <th>Escola</th>
              <th>Link</th>
            </tr>
          </thead>

          <tbody id="table-body">
            @foreach($ocorrencias as $occ)
            <tr style="height:80px">
              <td>Pendente</td> <!--Estado ocorrencia-->
              <td>{{ $occ->aluno->nome }}</td> <!--Nome aluno-->
              @foreach($occ->aluno->turma as $turma)
              <td>{{ $turma->ano }}{{ $turma->codTurma }}</td> <!--Turma-->
              <td>{{ $turma->escola->nome }}</td> <!--Escola-->
              @endforeach
              <td>{{ $occ->data }}</td> <!--Data de ocorrencia-->
            </tr>
            @endforeach
          </tbody>
        </table>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <script>
      $(document).ready(function(){
        atualizarAlunos();
        $("#selectEscola").change(atualizarTurmas);
        $("#pesquisa").keyup(atualizarAlunos);
        $("#selectEscola").change(atualizarAlunos);
        $("#selectTurma").change(atualizarAlunos);
      })

      function atualizarAlunos() {
        $.ajax({
          type:'GET',
          url: '{{ route("atualizarAlunos") }}',
          data: { search: $('#pesquisa').val() },
          success: function(info)
          {
            var vars = JSON.parse(info);
            //$('#output').html(info);
            
            //limpar table
            var tableRow = '';
            $('#table-body').html('');

            
            $.each(vars.idAluno, function(index, value)
            {
              rawTableRow = '<tr style="height:50px"><td>'+vars.idAluno[index]+'</td><td>'+vars.nomeAluno[index]+'</td><td>'+vars.turmaAluno[index]+'</td><td>'+vars.escolaAluno[index]+'</td><td><a href="{{ route("perfilAluno", '+idAluno+') }}" target="_blank"><i class="fas fa-external-link-alt"></i></a></td>></tr>'
              tableRow = rawTableRow.replace('+idAluno+', vars.idAluno[index]);
              
              if($("#selectEscola option:selected").html() != "Todas as escolas") //Verifica se foi selecionada uma escola
              {
                if($("#selectEscola option:selected").html() == vars.escolaAluno[index]) //Verifica se a escola selecionada é igual á do aluno
                {      
                  if($("#selectTurma option:selected").html() != "Todas as turmas") //Verifica se foi selecionada uma turma
                  {
                    if($("#selectTurma option:selected").html() == vars.turmaAluno[index]) //Verifica se a turma selecionada é igual á turma do aluno
                    {
                      $('#table-body').append(tableRow);
                    }
                  } 
                  else
                  {
                    $('#table-body').append(tableRow);
                  }          
                }
              }
              else
              {
                $('#table-body').append(tableRow);
              }
            })
          }
        });
      }

      function atualizarTurmas()
      {
        if($('#selectEscola option:selected').html() != "Todas as escolas")
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
                  $('#selectTurma').append("<option>Todas as turmas</option>")
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
<html>