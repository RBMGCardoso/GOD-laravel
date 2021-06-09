<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Envio de emails
use App\Mail\MailSender;
use Illuminate\Support\Facades\Mail;

use App\Models\Aluno;
use App\Models\Turma;
use App\Models\AlunoTurma;
use App\Models\User;
use App\Models\Ocorrencia;
use App\Models\MotivoOcorrencia;

use Illuminate\Support\Facades\Hash;


class MainController extends Controller
{
    public function DashboardPage()
    {
        if(session('LoggedUser') !== null)
        {
            return view('dashboard');
        }
        else
        {
            return redirect('login');
        }
    }

    public function LoginPage()
    {
        return view('login');
    }

    public function RegisterPage()
    {
        if(session('LoggedUser') !== null)
        {
            return view('register');
        }
        else
        {
            return redirect('login');
        }
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

    public function RegisterAlunoPage(Request $request, Turma $turma)
    {
        $turmas = Turma::all();

        return view('alunoReg', ['turmas' => $turmas]);
    }

    public function RegisterAluno(Request $req)
    {
     
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
                'cod_p' =>  session('LoggedUser')->id
            ]);
        
            foreach ($motivos as $motivo) 
            {
                MotivoOcorrencia::insert([
                    'motivo_id' => $motivo,
                    'ocorrencia_id' => Ocorrencia::all()->reverse()->first()->id
                ]);
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
}
