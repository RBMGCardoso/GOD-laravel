<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Mail</title>
</head>
<body>
    <h1>{{ $details['title'] }}</h1>
    <p>{{ $details['nomeAluno'] }}</p>
    <br>
    <label style="margin-left: 2px"><b>Descrição da ocorrência:</b></label>
    <table>
        <tr style="border: 1px solid black">
            <td style="border: 1px solid #ccc; border-radius: 3px; background-color: #f2f2f2; padding: 10px">{{ $details['descricao'] }}</td>
        </tr>
    </table>

    <br>

    <label style="margin-left: 2px"><b>Decisão do professor após a ocorrência:</b></label>
    <table>
        <tr style="border: 1px solid black">
            <td style="border: 1px solid #ccc; border-radius: 3px; background-color: #f2f2f2; padding: 10px">{{ $details['decisao'] }}</td>
        </tr>
    </table>
</body>
</html>