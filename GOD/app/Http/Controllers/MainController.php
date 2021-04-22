<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Aluno;
use App\Models\User;
use App\Models\Ocorrencia;
use App\Models\MotivoOcorrencia;

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

    public function RegisterAlunoPage(Request $request)
    {
        return view('alunoReg');
    }

    public function RegisterAluno(Request $req)
    {
      
        Aluno::insert([
            'ano' =>  $req->ano,
            'turma' =>  $req->turma,
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
    }

    public function OcorrenciaPage()
    {
        return view('ocorrencia');
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
        }

        
        foreach ($motivos as $motivo) {
            MotivoOcorrencia::insert([
                'motivo_id' => $motivo,
                'ocorrencia_id' => Ocorrencia::all()->first()->id
                ]);
        }

        return view('dashboard');

    }

    public function pesquisar(Ocorrencia $ocorrencia)
    {
        $ocorrencias = Ocorrencia::all()->pluck('cod_a');

        foreach($ocorrencias as $occ)
        {
            $nomes[] = Aluno::all()->where('id', $occ)->pluck('nome');

        }

        return view('pesquisa', compact('nomes'));
    }
}
