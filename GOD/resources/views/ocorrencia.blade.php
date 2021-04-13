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

    <body>
        <form>
            <div class="container">
                <h1>Registo de Ocorrências / Participação Disciplinar</h1>
                    <div class="info">
                        <input type="text" name="nomeProf" placeholder="Nome do Professor">
                        <input type="text" name="nomeA" placeholder="Nome do Aluno">
                        <input type="text" name="numA" placeholder="Numero do Aluno">
                        <input type="text" name="turmaA" placeholder="Turma do Aluno">
                        <input type="text" name="disciplina" placeholder="Disciplina">
                        <input type="datetime-local" id="data" placeholder="Data da Ocorrência">
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
                        <p>Descrição da Ocorrência:</p>
                        <textarea maxlength="350" id="textAdec" style="font-size: 20px"></textarea>
                        <span id="" style="color: red; font-size: 14px">Caracteres restantes: 350</span>
                    </div>
                </div>
            </div>
        </form>
    </body>
<html>