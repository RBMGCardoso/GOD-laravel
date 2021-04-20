<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Aluno;
use App\Models\User;
use App\Models\Ocorrencia;

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

    public function RegisterAluno(Request $request)
    {
        $ano = $request->input('ano');
        $turma = $request->input('turma');
        $nome = $request->input('nome');
        $datanasc = $request->input('datanasc');
        $email = $request->input('email');
        $nif = $request->input('nif');
        $telef = $request->input('telef');
        $morada = $request->input('morada');
        $concelho = $request->input('concelho');
        $codpost = $request->input('codpost');
        $cc = $request->input('cc');


        \DB::insert("INSERT INTO alunos (ano, turma, nome, datanasc, email, nif, telef, morada, concelho, codpost, cc)
        VALUES (
            '$ano',
            '$turma',
            '$nome',
            '$datanasc',
            '$email',
            '$nif',
            '$telef',
            '$morada',
            '$concelho',
            '$codpost',
            '$cc'
        )");

    }

    public function OcorrenciaPage()
    {
        return view('ocorrencia');
    }

    public function criarOcorrencia(Request $request)
    {    
        $data = $request->input('data');
        $descricao = $request->input('textADesc');
        $decisao = $request->input('textADec');
        $frequencia = $request->input('frequenciaComport');
        $comport_inc = $request->input('quantidadeComport');
        $cod_a = Aluno::where('nome', '=', $request->input('nome'))->first()->id;
        $cod_p = session('LoggedUser')->id;
        
        \DB::insert("INSERT INTO ocorrencias (data, descricao, decisao, frequencia, comport_inc, cod_a, cod_p) 
        VALUES (
            '$data',
            '$descricao',
            '$decisao',
            '$frequencia',
            '$comport_inc',
            '$cod_a',
            '$cod_p'
            )");
    }

    public function pesquisar()
    {
        $ocorrencias = Ocorrencia::all()->pluck('cod_a');

        foreach($ocorrencias as $occ)
        {
            $nomes[] = Aluno::all()->where('id', $occ)->pluck('nome');

        }

        return view('pesquisa', compact('nomes'));
    }
}
