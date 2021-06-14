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
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link href="{{ url('/css/ocorrencia.css') }}" rel="stylesheet">
    <link href="{{ url('/css/navbar.css') }}" rel="stylesheet">
  </head>

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
          var charsQt = 500 - descText.value.length;
          
          var alertText = document.getElementById('charsRemainDesc');
          alertText.textContent = "Caracteres restantes: " + charsQt;       
      }

      function CharsCounterDec()
      {
          var decText = document.getElementById('textADec');
          var charsQt = 350 - decText.value.length;
          
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
              <a href="" class="nav-link rounded-0 text-light" id="btn"><i class="fas fa-book fa-fw"></i> Minhas Ocorrências</a>
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
                    {{ session('LoggedUser')->cargo }}     
              </a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Meu perfil</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="{{ route('logout') }}">Sign out</a></li>
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
            <h1 class="w-auto">Registo de Ocorrência / Participação Disciplinar</h1>
          </div>

          <div class="row justify-content-center">
            <div class="col-auto">
              <div class="row m-0 justify-content-center p-0 mt-3" style="width: 60vw; height: 30px; background-color: rgba(121, 255, 255, 1);">
                <span class="separador w-auto m-0" style="line-height:30px">Dados do Aluno</span>
              </div>

              <form method="POST" action="{{ route('ocorrencia.criar') }}" id="myForm">
                <div class="row-auto identification d-flex mt-3">
                  <div class="col">
                    <div class="row m-0" style="width: 60vw;">
                      <div class="col-9 p-0">
                        <input class="input-box form-control" list="nomes" name="nome" id="fname" autocomplete="off" placeholder="Nome do Aluno">
      
                        <datalist id="nomes" style="width:100% !important">   
                          @foreach($alunos as $aluno)
                            <option value="{{ $aluno->nome }}">
                          @endforeach
                        </datalist>
                      </div>   
                      
                      <div class="col-1 p-0">
                        <input class="input-box form-control" type="text" id="num" name="numero" placeholder="Nº. Aluno">
                      </div>
                      <div class="col-2 p-0">
                        <input class="input-box form-control" type="text" id="anoturma" name="anoturma" placeholder="Ano e Turma">
                      </div>
                    </div>

                    <div class="row p-0 m-0 mt-2 pt-2" style="width: 60vw;">
                      <div class="col-4 p-0">
                        <input class="input-box form-control" type="text" id="disciplina" name="disciplina" placeholder="Disciplina">
                      </div>

                      <div class="col-4 p-0">
                        <!-- ESPAÇO BRANCO -->
                      </div>

                      <div class="col-4 p-0">
                        <input class="input-box form-control" type="datetime-local" name="data" id="data" placeholder="Data da Ocorrência">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row m-0 justify-content-center p-0 mt-4" style="width: 60vw; height: 30px; background-color: rgba(121, 255, 255, 1);">
                  <span class="separador w-auto m-0" style="line-height:30px">Motivos</span>
                </div>

                <div class="row m-0 mt-3 checkbox-group" style="width: 60vw;">
                  <table>
                    <tr>
                      <td>
                        <input type="checkbox" name="motivos[]" value="1" id="Opc1" class="checkmark" onchange="checkedBoxes()">
                        <label for="Opc1">Desobedeceu a uma ordem</label>
                      </td>
                    </tr>
      
                    <tr>
                      <td>
                        <input type="checkbox" name="motivos[]" value="2" id="Opc2" class="checkmark" onchange="checkedBoxes()">
                        <label for="Opc2">Recusou participar nas atividades da aula</label>
                      </td>
                    </tr>
      
                    <tr>             
                      <td>
                        <input type="checkbox" name="motivos[]" value="3" id="Opc3" class="checkmark" onchange="checkedBoxes()">
                        <label for="Opc3">Fez gestos impróprios ao professor</label>
                      </td>
                    </tr>
      
                    <tr>        
                      <td>
                        <input type="checkbox" name="motivos[]" value="4" id="Opc4" class="checkmark" onchange="checkedBoxes()">
                        <label for="Opc4">Fez comentários inadequados e desrespeitadores</label>
                      </td>
                    </tr>
      
                    <tr>      
                      <td>
                        <input type="checkbox" name="motivos[]" value="5" id="Opc5" class="checkmark" onchange="checkedBoxes()">
                        <label for="Opc5">Perturbou a realização dos trabalhos dos seus colegas</label>
                      </td>
                    </tr>
      
                    <tr>     
                      <td>
                        <input type="checkbox" name="motivos[]" value="6" id="Opc6" class="checkmark" onchange="checkedBoxes()">
                        <label for="Opc6">Continuou a conversar com colegas, mesmo depois da chamada de atenção do professor</label>
                      </td>
                    </tr>
      
                    <tr>              
                      <td>
                        <input type="checkbox" name="motivos[]" value="7" id="Opc7" class="checkmark" onchange="checkedBoxes()">
                        <label for="Opc7">Pôs em causa a autoridade do professor</label>
                      </td>
                    </tr>
                    
                    <tr>              
                      <td>
                        <input type="checkbox" name="motivos[]" value="8" id="Opc8" class="checkmark" onchange="checkedBoxes()">  
                        <label for="Opc8">Falou muito alto, emitiu sons e/ou provocou ruídos</label>
                      </td>
                    </tr>
      
                    <tr>              
                      <td>
                        <input type="checkbox" name="motivos[]" value="9" id="Opc9" class="checkmark" onchange="checkedBoxes()">
                        <label for="Opc9">Ausentou-se do seu lugar sem autorização</label>
                      </td>
                    </tr>
      
                    <tr>              
                      <td>
                        <input type="checkbox" name="motivos[]" value="10" id="Opc10" class="checkmark" onchange="checkedBoxes()">
                        <label for="Opc10">Interrompeu, de forma persistente e inadequada, a comunicação professor/alunos</label>
                      </td>
                    </tr>
      
                    <tr>             
                      <td>
                        <input type="checkbox" name="motivos[]" value="11" id="Opc11" class="checkmark" onchange="checkedBoxes()">
                        <label for="Opc11">Fez gestos impróprios a colegas</label>
                      </td>
                    </tr>
      
                    <tr>            
                      <td>
                        <input type="checkbox" name="motivos[]" value="12" id="Opc12" class="checkmark" onchange="checkedBoxes()">
                        <label for="Opc12">Agrediu fisicamente um colega</label>
                      </td>
                    </tr>
      
                    <tr>              
                      <td>
                        <input type="checkbox" name="motivos[]" value="13" id="Opc13" class="checkmark" onchange="checkedBoxes()">
                        <label for="Opc13">Insultou colega(s)</label>
                      </td>
                    </tr>
      
                    <tr>              
                      <td>
                        <input type="checkbox" name="motivos[]" value="14" id="Opc14" class="checkmark" onchange="checkedBoxes()">
                        <label for="Opc14">Tirou objeto(s) a colega(s) sem a sua autorização</label>
                      </td>
                    </tr>
      
                    <tr>             
                      <td>
                        <input type="checkbox" name="motivos[]" value="15" id="Opc15" class="checkmark" onchange="checkedBoxes()">
                        <label for="Opc15">Usou, indevidamente, telemóvel ou outro aparelho eletrónico</label>
                      </td>
                    </tr>
      
                    <tr>             
                      <td>
                        <input type="checkbox" name="motivos[]" value="16" id="Opc16" class="checkmark" onchange="checkedBoxes()">
                        <label for="Opc16">Danificou materiais e/ou espaços escolares</label>
                      </td>
                    </tr>
      
                    <tr>             
                      <td>
                        <input type="checkbox" name="motivos[]" value="17" id="Opc17" class="checkmark" onchange="checkedBoxes()">
                        <label for="Opc17">Outros</label>
                      </td>
                    </tr>
                  </table>
                </div>

                <div class="row m-0 justify-content-center p-0 mt-4" style="width: 60vw; height: 30px; background-color: rgba(121, 255, 255, 1);">
                  <span class="separador w-auto m-0" style="line-height:30px">Descrição de Ocorrência</span>
                </div>

                <div class="row m-0 mt-3" style="width: 60vw;">
                  <textarea maxlength="500" oninput="CharsCounterDesc()" name="textADesc" id="textADesc" style="font-size: 20px; width:100%" placeholder="Descrição de Ocorrência..."></textarea>
                  <span id="charsRemainDesc" style="color:red; font-size: 14px; float: right">Caracteres restantes: 500</span>
                </div>
                
                <div class="row m-0 justify-content-center p-0 mt-4" style="width: 60vw; height: 30px; background-color: rgba(121, 255, 255, 1);">
                  <span class="separador w-auto m-0" style="line-height:30px">Decisão Tomada</span>
                </div>

                <div class="row m-0 mt-3" style="width: 60vw;">
                  <label></label>
                  <textarea maxlength="350" oninput="CharsCounterDec()" name="textADec" id="textADec" style="font-size: 20px; width:100%" placeholder="Em consequência disso, tomei a seguinte decisão..."></textarea>
                  <span id="charsRemainDec" style="color:red; font-size: 14px; float: right">Caracteres restantes: 350</span>
                </div>

                <div class="row m-0 justify-content-center p-0 mt-4 mb-3" style="width: 60vw; height: 30px; background-color: rgba(121, 255, 255, 1);">
                  <span class="w-auto m-0 separador" style="line-height:30px">Regularidade dos comportamentos</span>
                </div>

                <div class="row m-0" style="width: 60vw;">
                  <div class="col" style="width: 50%; padding: 0px;">
                      <p>O comportamento observou-se neste aluno:</p>

                      <div class="row-auto m-0 mb-2">                 
                        <input type="radio" id="Opc18" name="frequenciaComport" style="margin-right: 20px;" class="frequenciaComport" value="Primeira Vez">
                        <label for="Opc18">Pela 1ª vez</label>
                      </div>

                      <div class="row-auto m-0 mb-2">
                        <input type="radio" id="Opc19" name="frequenciaComport" style="margin-right: 20px;" class="frequenciaComport" value="Reincidente">
                        <label for="Opc19">De forma reincidente (pouco frequente)</label>
                      </div>
                      
                      <div class="row-auto m-0 mb-2">
                        <input type="radio" id="Opc20" name="frequenciaComport" style="margin-right: 20px;" class="frequenciaComport" value="Com frequência">
                        <label for="Opc20">Com frequência</label>
                      </div>
                  </div>

                  <div class="col" style="width: 50%; padding: 0px;">
                    <p>O aluno já demonstrou outros comportamentos incorretos?</p>

                    <div class="row-auto m-0 mb-2" style="width: 60vw;">
                      <input type="radio" id="Opc21" name="quantidadeComport" style="margin-right: 20px;" class="quantidadeComport" value="Sim" required>
                      <label for="Opc21">Sim</label>
                    </div>

                    <div class="row-auto m-0 mb-2" style="width: 60vw;">
                      <input type="radio" id="Opc22" name="quantidadeComport" style="margin-right: 20px;" class="quantidadeComport" value="Não" required>
                      <label for="Opc22">Não</label>
                    </div>

                    <div class="row-auto m-0 mb-2" style="width: 60vw;">
                      <input type="radio" id="Opc23" name="quantidadeComport" style="margin-right: 20px;" class="quantidadeComport" value="Poucas vezes" required>
                      <label for="Opc23">Poucas vezes</label>
                    </div>

                    <div class="row-auto m-0 mb-2" style="width: 60vw;">
                      <input type="radio" id="Opc24" name="quantidadeComport" style="margin-right: 20px;" value="Com frequência" required>
                      <label for="Opc24">Com frequência</label>
                    </div>
                  </div>
                </div>

                <div class="row m-0 justify-content-end pt-4">
                  <button class="btn-sub mt-5 mb-5" onclick="verificarNome()" type="button" id="submitButton">SUBMETER</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

      <script>

      function checkedBoxes() {
        var boxes = document.getElementsByClassName("checkmark");

        var checked = 0;
        for (let i = 0; i < boxes.length; i++) {
          if(boxes[i].checked)
          checked++;       
        }  
        return checked;   
      }

      function checkboxRequired() {
        var form = document.getElementById("myForm");

        if(checkedBoxes()>0)
        {
          form.submit();
        }
        else
        {
          alert('É necessário selecionar pelo menos um motivo.');
        }
      }

      function verificarNome()
      {
        if($("#fname").val() != "" && $("#num").val() != "" && //"Required" que tem de ser feito com ifs, já que o form.submit() é chamado pelo AJAX
          $("#anoturma").val() != ""  && $("#disciplina").val() != ""  && 
          $("#data").val() != "" && $("#textADesc").val() != "" && 
          $("#textADec").val() != "" && $(".frequenciaComport:checked").val() != undefined &&
          $(".quantidadeComport:checked").val() != undefined)
          {
            if($("#fname").val() != "")
            {
              $.ajax({
                type: 'GET',
                url: '{{ route("ocorrenciaNomeCheck") }}',
                data: { nome: $('#fname').val() },
                success: function(value)
                {
                  var valor = JSON.parse(value);
                  if(valor == "Aluno encontrado"){
                    checkboxRequired();
                  }else if(valor == "Nenhum aluno encontrado"){
                    alert("Não foi encontrado nenhum aluno com o nome inserido, certifique-se que escreveu o nome corretamente, e que tem os devidos acentos. Caso o erro persista utilize as sugestões de nomes para encontrar o aluno desejado.");
                  }
                }        
              });
            }
          }
          else
          {
            alert("Certifique-se que preenche os campos todos.");
          }
      }
      
      </script>
  </body>
<html>