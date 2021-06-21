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

    public function RegisterPage()
    {
        return view('register');
    }

    public function RegisterUtilizador(Request $req)
    {
        User::insert([
            'name' => $req->nome,
            'email' => $req->email,
            'password' => Hash::make($req->password),
            'cargo' => $req->cargoUser
        ]);
    }

    public function RegisterAlunoPage(Request $request)
    {
        $escolas = Escola::all();

        return view('alunoReg', ['escolas' => $escolas]);
    }

    public function RegisterAluno(Request $req)
    {    
        return json_encode($req->form->parentesco);
        dd();
        if(!$req->info)
        {
            Encarregado::insert([
                'nome' => $req->nomeEE,
                'parentesco' => $req->parentesco,
                'telef' => $req->telefEE,
                'email' => $req->emailEE,
                'morada' => $req->moradaEE,
                'concelho' => $req->concelhoEE,
                'codPost' => $req->codPostEE,
            ]);
        }

        Aluno::insert([
            'nome' =>  $req->nome,
            'datanasc' =>  $req->datanasc,
            'email' =>  $req->email,
            'nif' =>  $req->nif,
            'telef' =>  $req->telef,
            'morada' =>  $req->morada,
            'concelho' =>  $req->concelho,
            'codpost' =>  $req->codpost,
            'cc' =>  $req->cc
        ]);

        if(!$req->info)
        {
            Aluno::all()->reverse()->first()->insert([
                'eeId' => Encarregado::all()->reverse()->pluck('id')->first(),
            ]);
        }

        AlunoTurma::insert([
            'aluno_id' => Aluno::all()->reverse()->first()->id,
            'turma_id' => $req->escola
        ]);
    }

    public function OcorrenciaPage(Aluno $alunos)
    {
        $alunos = Aluno::all();
        return view('ocorrencia', compact('alunos'));
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
                'cod_p' =>  session('LoggedUser')->id,
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

            return redirect('dashboard');
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

    
    public function registerTurmas()
    {
        return view('turmaReg');
    }
}
