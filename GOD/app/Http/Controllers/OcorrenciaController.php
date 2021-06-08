<?php

namespace App\Http\Controllers;

use App\Models\Ocorrencia;
use App\Models\Aluno;
use App\Models\AlunoTurma;
use App\Models\Turma;
use App\Models\Escola;
use Illuminate\Http\Request;

class OcorrenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Ocorrencia $ocorrencia, Escola $escola)
    {
        $ocorrencias = Ocorrencia::all()->reverse();
        $escolas = Escola::all();
        $turmas = Turma::all();
        $alunos = Aluno::all();;

        return view('pesquisa', compact('ocorrencias', 'escolas', 'turmas', 'alunos'));  
    }

    public function AtualizarTurmas()
    {
        $TurmaAno = Turma::all()->pluck('ano');
        $TurmaCod = Turma::all()->pluck('codTurma');
        $TurmaEscolaId = Turma::all()->pluck('escola_id');

        $EscolaId = Escola::all()->pluck('id');
        $EscolaNome = Escola::all()->pluck('nome');

        $array['nomeEscolaSemOcc'] = $EscolaNome;
        $array['turmaId'] = $TurmaEscolaId;
        $array['turmaEscolaAno'] = $TurmaAno;
        $array['turmaEscolaCod'] = $TurmaCod;
        $array['escolaId'] = $EscolaId;

        return json_encode($array);        
    }

    public function AtualizarAlunos(Request $req)
    {
        $search = $req->search;

        $idAlunoSearch = Aluno::where('nome', 'like', '%' . $search . '%')->pluck('id'); 
        $nomeAlunos = Aluno::where('nome', 'like', '%' . $search . '%')->pluck('nome');

        $alunoIdAlunoTurma = AlunoTurma::all()->pluck('aluno_id');
        $turmaIdAlunoTurma =  AlunoTurma::all()->pluck('turma_id');

        $idTurma = Turma::all()->pluck('id');
        $anoTurma = Turma::all()->pluck('ano');
        $codTurma = Turma::all()->pluck('codTurma');
        $escolaIdTurma = Turma::all()->pluck('escola_id');

        $escolaId = Escola::all()->pluck('id');
        $escolaNome = Escola::all()->pluck('nome');


        //Associa o ano e código ao id da turma
        for ($i=0; $i < count($idTurma); $i++) { 
            $turma[$idTurma[$i]] = $anoTurma[$i].$codTurma[$i];

            for ($e=0; $e < count($escolaNome); $e++) { 
                if ($escolaId[$e] == $escolaIdTurma[$i]) {
                    $idEscola[$idTurma[$i]] = $escolaId[$e];
                    $turmaEscolaNome[$idTurma[$i]] = $escolaNome[$e];
                }                
            }
        }

        //// Obtém o ID da turma de cada aluno
        //
        for ($i=0; $i < count($idAlunoSearch); $i++) { 
            for ($t=0; $t < count($alunoIdAlunoTurma); $t++) { 
                if($alunoIdAlunoTurma[$t] == $idAlunoSearch[$i])
                {
                    $turmaAluno[$i] = $turma[$turmaIdAlunoTurma[$t]]; //Cria um array com as turmas onde o index é igual ao index no foreach do ajax

                    for ($e=0; $e < count($escolaNome); $e++) {  
                        $nomeEscola[$i] = $turmaEscolaNome[$turmaIdAlunoTurma[$t]];
                    }
                }
            }
        }

        $array['idAluno'] = $idAlunoSearch; //Id dos alunos com nome parecido ao que foi pesquisado
        $array['nomeAluno'] = $nomeAlunos; //Nome dos alunos com nome parecido ao que foi pesquisado
        $array['turmaAluno'] = $turmaAluno; //Turma dos alunos com nome parecido ao que foi pesquisado
        $array['escolaAluno'] = $nomeEscola; //Turma dos alunos com nome parecido ao que foi pesquisado

        return json_encode($array);
    }

    public function perfilAluno(Aluno $idAluno)
    {
        //$descricao = Ocorrencia::find($idOcc)->pluck('aluno_id');
        dd($idAluno->datanasc);
        //return view('dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ocorrencia  $ocorrencia
     * @return \Illuminate\Http\Response
     */
    public function show(Ocorrencia $ocorrencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ocorrencia  $ocorrencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Ocorrencia $ocorrencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ocorrencia  $ocorrencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, Ocorrencia $ocorrencia)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ocorrencia  $ocorrencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ocorrencia $ocorrencia)
    {
        //
    }
}
