<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <script>
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

    <style>
        body{
    overflow-x: hidden;
    font-family: "Arial";
    user-select: none;
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

button{
    width: 15vw;
    min-width: 100px;
    height: 30px;
    border: 0;
    background: #2f323a;
    border-radius: 10px;
    color: #fff;
    outline:none;
}

button:hover{
    background: #79fdff;
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
    </style>
    <body>
    <div class="container">
        <h1>Registo de Ocorrência / Participação Disciplinar</h1>
        <form method="POST">
          <div class="info">
            <input type="text" id="fname" name="nome" placeholder="Nome do Aluno">
            <input type="text" id="num" name="numero" placeholder="Nmr aluno">
            <input type="text" id="anoturma" name="numero" placeholder="Ano e Turma">
            <br>
            <input type="text" id="disciplina" name="disciplina" placeholder="Disciplina">
            <input type="datetime-local" id="data" placeholder="Data da Ocorrência">
          </div>
          <br/>
          <br/>
          <div class="opc_in">
            <table>
            <tr>
              <td>
                <input type="checkbox" id="Opc1" class="checkmark">
                <label for="Opc1">Desobedeceu a uma ordem</label>
              </td>
            </tr>

            <tr>
              <td>
                <input type="checkbox" id="Opc2" class="checkmark">
                <label for="Opc2">Recusou participar nas atividades da aula</label>
              </td>
            </tr>

            <tr>             
              <td>
                <input type="checkbox" id="Opc3" class="checkmark">
                <label for="Opc3">Fez gestos impróprios ao professor</label>
              </td>
            </tr>

            <tr>        
              <td>
                <input type="checkbox" id="Opc4" class="checkmark">
                <label for="Opc4">Fez comentários inadequados e desrespeitadores</label>
              </td>
            </tr>

            <tr>      
              <td>
                <input type="checkbox" id="Opc5" class="checkmark">
                <label for="Opc5">Perturbou a realização dos trabalhos dos seus colegas</label>
              </td>
            </tr>

            <tr>     
              <td>
                <input type="checkbox" id="Opc6" class="checkmark">
                <label for="Opc6">Continuou a conversar com colegas, mesmo depois da chamada de atenção do professor</label>
              </td>
            </tr>

            <tr>              
              <td>
                <input type="checkbox" id="Opc7" class="checkmark">
                <label for="Opc7">Pôs em causa a autoridade do professor</label>
              </td>
            </tr>
            
            <tr>              
              <td>
                <input type="checkbox" id="Opc8" class="checkmark">  
                <label for="Opc8">Falou muito alto, emitiu sons e/ou provocou ruídos</label>
              </td>
            </tr>

            <tr>              
              <td>
                <input type="checkbox" id="Opc9" class="checkmark">
                <label for="Opc9">Ausentou-se do seu lugar sem autorização</label>
              </td>
            </tr>

            <tr>              
              <td>
                <input type="checkbox" id="Opc10" class="checkmark">
                <label for="Opc10">Interrompeu, de forma persistente e inadequada, a comunicação professor/alunos</label>
              </td>
            </tr>

            <tr>             
              <td>
                <input type="checkbox" id="Opc11" class="checkmark">
                <label for="Opc11">Fez gestos impróprios a colegas</label>
              </td>
            </tr>

            <tr>            
              <td>
                <input type="checkbox" id="Opc12" class="checkmark">
                <label for="Opc12">Agrediu fisicamente um colega</label>
              </td>
            </tr>

            <tr>              
              <td>
                <input type="checkbox" id="Opc13" class="checkmark">
                <label for="Opc13">Insultou colega(s)</label>
              </td>
            </tr>

            <tr>              
              <td>
                <input type="checkbox" id="Opc14" class="checkmark">
                <label for="Opc14">Tirou objeto(s) a colega(s) sem a sua autorização</label>
              </td>
            </tr>

            <tr>             
              <td>
                <input type="checkbox" id="Opc15" class="checkmark">
                <label for="Opc15">Usou, indevidamente, telemóvel ou outro aparelho eletrónico</label>
              </td>
            </tr>

            <tr>             
              <td>
                <input type="checkbox" id="Opc16" class="checkmark">
                <label for="Opc16">Danificou materiais e/ou espaços escolares</label>
              </td>
            </tr>

            <tr>             
              <td>
                <input type="checkbox" id="Opc17" class="checkmark">
                <label for="Opc17">Outros</label>
              </td>
            </tr>
            </table>
          <br/>
          <br/>
          <p>Descrição da Ocorrência:</p>
          <textarea maxlength="350" oninput="CharsCounterDesc()" id="textADesc" style="font-size: 20px"></textarea>
          <br/>
          <span id="charsRemainDesc" style="color:red; font-size: 14px">Caracteres restantes: 350</span>
          </div>
          <br/>
          <br/>
          <p>Em consequência disso, tomei a seguinte decisão:</p>
          <textarea maxlength="350" oninput="CharsCounterDec()" id="textADec" style="font-size: 20px"></textarea>
          <br/>
          <span id="charsRemainDec" style="color:red; font-size: 14px">Caracteres restantes: 350</span>
          <br/>

          <div class="info">
            <p>O comportamento observou-se neste aluno:</p>
            <input type="radio" id="Opc18" name="frequenciaComport"><label for="Opc18">Pela 1ª vez</label>
            <input type="radio" id="Opc19" name="frequenciaComport"><label for="Opc19">De forma reincidente (pouco frequente)</label>
            <input type="radio" id="Opc20" name="frequenciaComport"><label for="Opc20">Com frequência</label>
            <br/>
            <br/>
            <p>O aluno já demonstrou outros comportamentos incorretos?</p>
            <input type="radio" id="Opc21" name="quantidadeComport"><label for="Opc21">Sim</label>
            <input type="radio" id="Opc22" name="quantidadeComport"><label for="Opc22">Não</label>
            <input type="radio" id="Opc23" name="quantidadeComport"><label for="Opc23">Poucas vezes</label>
            <input type="radio" id="Opc24" name="quantidadeComport"><label for="Opc24">Com frequência</label>
          </div>

          <br/>
          <br/>
          <br/>
          <button class="bt_sub" value="submit">SUBMETER</button>
          <br/>
          <br/>
          <br/>
          </div>
        </form>
      </div>
    </body>
<html>