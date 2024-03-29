<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

//Envio de emails
use App\Mail\MailSender;
use Illuminate\Support\Facades\Mail;

use App\Models\Aluno;
use App\Models\Turma;
use App\Models\Escola;
use App\Models\AlunoTurma;
use App\Models\User;
use App\Models\Ocorrencia;
use App\Models\Motivo;
use App\Models\MotivoOcorrencia;
use App\Models\Notification;
use App\Models\Encarregado;

use Illuminate\Support\Facades\Hash;


class MainController extends Controller
{
    public function LoginPage()
    {
        return view('login');
    }

    public function RegisterPage(Request $req)
    {
        $escolas = Escola::all();

        if(isset($req->idUser))
        {
            $user = User::where('id', $req->idUser)->get()->first();
            return view('register', compact('escolas', 'user'));
        }
        else
        {
            return view('register', compact('escolas'));
        }

    }

    public function RegisterUtilizador(Request $req)
    {
        $utilizador = User::find($req->idUser);

        if($req->cargoUser == "Diretor de Turma")
        {

            $turmas = Turma::all()->where('escola_id', $req->selectEscola)->flatten();
            $dirTurmas = User::where('dirTurma', '!=', 'null')->pluck('dirTurma');
            $idDirTurmas = User::where('dirTurma', '!=', 'null')->pluck('id');

            for ($i=0; $i < count($turmas); $i++) {          
                try {           
                    if($turmas[$i]->ano.$turmas[$i]->codTurma == $req->selectTurma)
                    {
                        $idTurma = $turmas[$i]->id;
                    }
                } catch (\Throwable $th) {
                    $th;
                }
            }  
        }     
        else
        {
            $idTurma = null;
        } 

        if(!isset($idTurma))
        {
            return back()->with('JSAlert', 'Ocorreu um erro ao tentar adicionar/editar um utilizador, certifique-se que preencheu todos os campos corretamente.');
        }

        if(isset($dirTurmas))
        {
            for ($i=0; $i < count($dirTurmas); $i++) { 
                if($dirTurmas[$i] == $idTurma && $idDirTurmas[$i] != $utilizador->id)
                {
                    return back()->with('JSAlert', 'Já existe um professor que é diretor desta turma. Se acha que isto é um erro contacte a administração do site.');
                }
            }
        }

        if($utilizador != null)
        {
            $utilizador->name = $req->nome;
            $utilizador->email = $req->email;
            $utilizador->cargo = $req->cargoUser;

            if($req->password != '')
            {
                $utilizador->password = Hash::make($req->password);
            }

            $utilizador->dirTurma = $idTurma;
            $utilizador->save();

            if($utilizador->id == session('LoggedUser')->id)
            {
                return redirect('logout')->with('jsLoginAlert', 'As suas informações foram atualizadas com sucesso. Por favor, volte a iniciar sessão.');
            }
            else
            {
                return redirect('dashboard')->with('jsPermissionAlert', 'Informações de utilizador atualizadas com sucesso.');
            }
        }
        else
        {
            User::insert([
                'name' => $req->nome,
                'email' => $req->email,
                'password' => Hash::make($req->password),
                'cargo' => $req->cargoUser,
                'dirTurma' => $idTurma
            ]);
            return redirect('dashboard')->with('jsPermissionAlert', 'Utilizador criado com sucesso.');
        }

    }

    public function RegisterAlunoPage(Request $request)
    {
        $escolas = Escola::all();

        return view('alunoReg', ['escolas' => $escolas]);
    }

    public function RegisterAluno(Request $req)
    {    
        parse_str($_POST['form'], $infoform);

        if(!$req->info)
        {
            Encarregado::insert([
                'nome' => $infoform['nomeEE'],
                'parentesco' => $infoform['parentesco'],
                'telemovel' => $infoform['telefEE'],
                'email' => $infoform['emailEE'],
                'morada' => $infoform['moradaEE'],
                'concelho' => $infoform['concelhoEE'],
                'codPost' => $infoform['codPostEE'],
            ]);

            Aluno::insert([
                'nome' => $infoform['nome'],
                'datanasc' =>  $infoform['datanasc'],
                'email' =>  $infoform['email'],
                'nif' =>  $infoform['nif'],
                'telef' =>  $infoform['telef'],
                'morada' => $infoform['morada'],
                'concelho' =>  $infoform['concelho'],
                'codpost' =>  $infoform['codpost'],
                'cc' =>  $infoform['cc'],     
                'eeId' => Encarregado::all()->reverse()->pluck('id')->first(),      
            ]);
        }
        else
        {
            Aluno::insert([
                'nome' => $infoform['nome'],
                'datanasc' =>  $infoform['datanasc'],
                'email' =>  $infoform['email'],
                'nif' =>  $infoform['nif'],
                'telef' =>  $infoform['telef'],
                'morada' => $infoform['morada'],
                'concelho' =>  $infoform['concelho'],
                'codpost' =>  $infoform['codpost'],
                'cc' =>  $infoform['cc'],           
            ]);
        }

        AlunoTurma::insert([
            'aluno_id' => Aluno::all()->reverse()->first()->id,
            'turma_id' => $infoform['escola']
        ]);

        return redirect('dashboard')->with('jsPermissionAlert', 'Aluno criado com sucesso.');
    }

    public function OcorrenciaPage(Aluno $alunos)
    {
        $alunos = Aluno::all();
        $escolas = Escola::all();
        return view('ocorrencia', compact('alunos', 'escolas'));
    }

    public function OcorrenciaAtualizarAlunos(Request $req)
    {
        $escola = Escola::where('id', $req->escola)->pluck('id');

        $turmaAno = Turma::all()->pluck('ano');
        $turmaCod = Turma::all()->pluck('codTurma');

        for ($i=0; $i < count($turmaAno); $i++) { 
            if($turmaAno[$i].$turmaCod[$i] == $req->turma)
            {
                $turma = Turma::where('id', $i+1)->pluck('id');
            }
        }

        $alunoTurma = AlunoTurma::where('turma_id', $turma)->pluck('aluno_id');

        for ($i=0; $i < count($alunoTurma); $i++) { 
            $alunos[] = Aluno::where('id', $alunoTurma[$i])->pluck('nome');
        }

        if (isset($alunos)) {
            $array['alunos'] = $alunos;
        }
        else
        {
            $array['alunos'] = '';
        }
        return json_encode($array);
    }

    public function criarOcorrencia(Request $req, Ocorrencia $ocorrencia, MotivoOcorrencia $motivoOcorrencia)
    {   
        $motivos = $req->input('motivos');
        
        if(Aluno::where('nome', '=', $req->input('nome'))->first() !== null)
        {
            Ocorrencia::insert([
                'data' =>  $req->data,
                'descricao' =>  $req->textADesc,
                'decisao' =>  $req->textADec,
                'frequencia' =>  $req->frequenciaComport,
                'comport_inc' =>  $req->quantidadeComport,
                'aluno_id' =>  Aluno::where('nome', '=', $req->input('nome'))->first()->id,
                'cod_p' =>  User::where('id', '=', session('LoggedUser')->id)->first()->id,
                'estado' => "Pendente"
            ]);
        
            foreach ($motivos as $motivo) 
            {
                MotivoOcorrencia::insert([
                    'motivo_id' => $motivo,
                    'ocorrencia_id' => Ocorrencia::all()->reverse()->first()->id
                ]);
            }
             
            $usersDirTurma = User::all()->pluck('dirTurma');
            $alunoDirTurma = AlunoTurma::where('aluno_id', Aluno::where('nome', '=', $req->input('nome'))->first()->id)->pluck('turma_id')->first();

            for ($i=0; $i < count($usersDirTurma); $i++) { 
                if($usersDirTurma[$i] == $alunoDirTurma)
                {
                    Notification::insert([
                        'cod_p' => User::where('dirTurma', $alunoDirTurma)->pluck('id')->first(),
                        'texto' => 'O(A) aluno(a), '.Aluno::where('nome', '=', $req->input('nome'))->first()->nome.', da sua direção de turma recebeu uma ocorrência no dia '.Carbon::now()->format("d-m-Y"),
                        'data' => Carbon::now(),
                        'cod_occ' => Ocorrencia::all()->reverse()->pluck('id')->first()
                    ]);
                }
            }
            /*
            $details = [
                'title' => 'Ocorrência criada por '.session('LoggedUser')->name.' a '.date('d/m/Y', strtotime($req->data)).' ás '.date('H', strtotime($req->data)).'h:'.date('i', strtotime($req->data)).'m',
                'nomeAluno' => 'Foi criada uma ocorrência envolvendo o aluno '.Aluno::where('id', Ocorrencia::all()->reverse()->first()->aluno_id)->pluck('nome')->first().' da turma '.Turma::where('id', AlunoTurma::where('aluno_id', Aluno::where('id', Ocorrencia::all()->reverse()->first()->aluno_id)->pluck('id')->first())->pluck('turma_id')->first())->pluck('ano')->first().Turma::where('id', AlunoTurma::where('aluno_id', Aluno::where('id', Ocorrencia::all()->reverse()->first()->aluno_id)->pluck('id')->first())->pluck('turma_id')->first())->pluck('codTurma')->first(),
                'descricao' =>  $req->textADesc,
                'decisao' => $req->textADec
            ];

            Mail::to("")->send(new MailSender($details));*/

            return redirect('dashboard')->with('jsPermissionAlert', 'Ocorrência criada com sucesso. Irá receber uma notificação quando um utilizador superior altere o estado da ocorrência.');
        }
        else
        {
            return back();
        }
    }

    public function OcorrenciaNomeCheck(Request $req)
    {
        $alunosNomes = Aluno::all()->pluck('nome');

        for ($i=0; $i < count($alunosNomes); $i++) { 
            if($alunosNomes[$i] == $req->nome)
            {
                $alunoEncontrado[] = $alunosNomes[$i];           
            }
        }
        
        if(isset($alunoEncontrado))
        {
            if(count($alunoEncontrado) == 1){
                return json_encode("Aluno encontrado");
            }else if(count($alunoEncontrado) > 1){
                return json_encode("Vários alunos encontrados");
            }
        }
        else
        {
            return json_encode("Nenhum aluno encontrado");
        }
    }

    public function dirTurma()
    {
        $alunosId = AlunoTurma::where('turma_id', session('LoggedUser')->dirTurma)->pluck('aluno_id');
        $alunos = Aluno::all();
        $anoTurma = Turma::where('id', session('LoggedUser')->dirTurma)->pluck('ano')->first();
        $codTurma = Turma::where('id', session('LoggedUser')->dirTurma)->pluck('codTurma')->first();
        $designTurma = $anoTurma.$codTurma;

        for ($i=0; $i < count($alunosId); $i++) { 
            for ($j=0; $j < count($alunos); $j++) { 
                if($alunos[$j]->id == $alunosId[$i])
                {
                    $alunosModel[$i] = $alunos[$j];
                }
            }
        }

        if(!isset($alunosModel))
        {
            $alunosModel = null;
        }
        
        return view('dirTurma', compact('alunosModel', 'designTurma'));
    }

    public function minhasOcc()
    {
        $ocorrencias = Ocorrencia::all()->pluck('cod_p');
        $ocorrenciasId = Ocorrencia::all();

        for ($i=count($ocorrencias)-1; $i >= 0; $i--) { 
            if(session('LoggedUser')->cargo == "Diretor" || session('LoggedUser')->cargo == "Secretaria")
            {
                $arrayOcc[] = $ocorrenciasId[$i];
            }
            else
            {
                if($ocorrencias[$i] == session('LoggedUser')->id)
                {
                    $arrayOcc[] = $ocorrenciasId[$i];
                }
            }
        }
        
        if(!isset($arrayOcc))
        {
           $arrayOcc = null; 
        }

        return view('minhaOccs', compact('arrayOcc'));
    }

    public function pagOcc(Ocorrencia $idOcc)
    {
        $motivos = MotivoOcorrencia::where('ocorrencia_id', $idOcc->id)->pluck('motivo_id');
        $motivosId = Motivo::all()->pluck('id');
        $motivosMot = Motivo::all()->pluck('motivo');
        
        for ($i=0; $i < count($motivos); $i++) { 
            for ($t=0; $t < count($motivosId); $t++) { 
                if($motivos[$i] == $motivosId[$t])
                {
                    $motivosOcc[] = $motivosMot[$t];
                }
            }
        }


        $turmaAlunoId = AlunoTurma::where('aluno_id', $idOcc->aluno->id)->pluck('turma_id');

        $turmaId = Turma::where('id', $turmaAlunoId)->pluck('id')->first();
        $turmaAno = Turma::find($turmaAlunoId)->pluck('ano')->first();
        $turmaCod = Turma::find($turmaAlunoId)->pluck('codTurma')->first();

        for ($i=0; $i < count($turmaAlunoId); $i++) { 
            if($turmaAlunoId[$i] == $turmaId)
            {
                $turma = $turmaAno.$turmaCod;
            }
        }
        
        return view('pagOcc', compact('idOcc', 'motivosOcc', 'turma'));


    }

    public function AlterarEstado(Request $req)
    {
        switch ($req->estado) {
            case '1':
                    Ocorrencia::where('id', $req->idOcc)->update(['estado' => 'Aceite']);
                    Ocorrencia::where('id', $req->idOcc)->update(['motivo' => $req->motivo]);
                    
                    Notification::insert([
                        'cod_p' => User::where('id', Ocorrencia::where('id', $req->idOcc)->pluck('cod_p')->first())->pluck('id')->first(),
                        'texto' => 'A sua ocorrência de dia '.Ocorrencia::where('id', $req->idOcc)->pluck('data')->first().', foi aceite.',
                        'data' => Carbon::now(),
                        'cod_occ' => $req->idOcc
                    ]);
                break;

            case '2':
                    Ocorrencia::where('id', $req->idOcc)->update(['estado' => 'Recusada']);
                    Ocorrencia::where('id', $req->idOcc)->update(['motivo' => $req->motivo]);

                    Notification::insert([
                        'cod_p' => User::where('id', Ocorrencia::where('id', $req->idOcc)->pluck('cod_p')->first())->pluck('id')->first(),
                        'texto' => 'A sua ocorrência de dia '.Ocorrencia::where('id', $req->idOcc)->pluck('data')->first().', foi recusada.',
                        'data' => Carbon::now(),
                        'cod_occ' => $req->idOcc
                    ]);
                break;
        }
        return route('pagOcc', $req->idOcc);
        //return back();
    }

    public function registerEscolas()
    {
        return view('escolaReg');
    }

    public function registerEscolasPost(Request $req)
    {
        Escola::insert([
            'nome' => $req->nome,
            'representante' => $req->representante,
            'email' => $req->email,
            'telef' => $req->telef,
            'fax' => $req->fax,
            'concelho' => $req->concelho,
            'morada' => $req->morada,
            'codPost' => $req->codpost
        ]);

        return redirect('dashboard')->with('jsPermissionAlert', 'Escola adicionada com sucesso.');
    }

    
    public function registerTurmas()
    {
        $escolas = Escola::all();
        return view('turmaReg', compact('escolas'));
    }

    public function registerTurmasPost(Request $req)
    {
        if(mb_substr($req->ano, -1) == 'º')
        {
            $ano = $req->ano;
        }
        else
        {
            $ano = $req->ano.'º';
        }

        if($req->escola != 'null')
        {
            Turma::insert([
            'ano' => $ano,
            'codTurma' => $req->codTurma,
            'escola_id' => $req->escola
            ]);
        }

        return redirect('dashboard')->with('jsPermissionAlert', 'Turma adicionada com sucesso.');
    }

    public function pesquisaUser()
    {
        $users = User::all();
        return view('pesquisaUser', compact('users'));
    }

    public function AtualizarUsers(Request $req)
    {
        $search = $req->search;

        $idUserSearch = User::where('name', 'like', '%' . $search . '%')->orderBy('id', 'ASC')->pluck('id');
        $nomeUserSearch = User::where('name', 'like', '%' . $search . '%')->orderBy('id', 'ASC')->pluck('name');
        $cargoUserSearch = User::where('name', 'like', '%' . $search . '%')->orderBy('id', 'ASC')->pluck('cargo');
        $dirTurmaUserSearch = User::where('name', 'like', '%' . $search . '%')->orderBy('id', 'ASC')->pluck('dirTurma');

        for ($i=0; $i < count($dirTurmaUserSearch); $i++) { 
            $turmaAno = Turma::where('id', $dirTurmaUserSearch[$i])->pluck('ano')->first();
            $turmaCod = Turma::where('id', $dirTurmaUserSearch[$i])->pluck('codTurma')->first();
            $turma[] = $turmaAno.$turmaCod;
        }


        $array['idUser'] = $idUserSearch;
        $array['nomeUser'] = $nomeUserSearch;
        $array['cargoUser'] = $cargoUserSearch;

        $array['dirTurma'] = $turma;


        return json_encode($array);
    }

    public function EliminarUser(User $user)
    {
        $notifications = Notification::where('cod_p', $user->id)->delete();
        $motivoOcorrencia = MotivoOcorrencia::where('ocorrencia_id')->delete();
        $ocorrencias = Ocorrencia::where('cod_p', $user->id)->get();

        for ($i=0; $i < count($ocorrencias); $i++) { 
            $motivoOcorrencia = MotivoOcorrencia::where('ocorrencia_id', $ocorrencias[$i]->id)->delete();
            $ocorrencias[$i]->delete();
        }

        $user->delete();
        return redirect('pesquisa-user');
    }
}
