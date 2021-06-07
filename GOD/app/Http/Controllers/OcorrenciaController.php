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

        return view('pesquisa', compact('ocorrencias', 'escolas', 'turmas'));  
    }

    public function AtualizarInfo(Request $req)
    {
        $search = $req->name;

        $AlunoTurmaAlunoId = AlunoTurma::all()->pluck('aluno_id');
        $AlunoTurmaId = AlunoTurma::all()->pluck('turma_id');

        $TurmaId = Turma::all()->pluck('id');
        $TurmaAno = Turma::all()->pluck('ano');
        $TurmaCod = Turma::all()->pluck('codTurma');
        $TurmaEscolaId = Turma::all()->pluck('escola_id');

        $EscolaId = Escola::all()->pluck('id');
        $EscolaNome = Escola::all()->pluck('nome');

        $idAlunoSearch = Aluno::where('nome', 'like', '%' . $search . '%')->pluck('id');

        $IdOcorrencia = Ocorrencia::all()->reverse()->pluck('id');
        $OccAlunoId = Ocorrencia::all()->reverse()->pluck('aluno_id');
        $OccData = Ocorrencia::all()->reverse()->pluck('data');
 
        //indice de idaluno precisa de ser igual ao id do aluno
        //
        //solução: for loop onde nomeAluno[$idAluno] = Aluno::where('id', $idAluno)->pluck(nome);
        $idAluno = Aluno::all()->pluck('nome');

        //Verifica se foram encontrados alunos
        if(count($idAlunoSearch)>0 && count($IdOcorrencia)>0)
        {
            //For para todas as ocorrencias
            for ($i=0; $i < count($OccAlunoId); $i++) { 

                //For para todos os alunos
                for ($j=0; $j < count($idAlunoSearch); $j++) { 

                        //$i = aluno_id em ocorrencias || $j = id em alunos
                        if($idAlunoSearch[$j] == $OccAlunoId[$i])
                        {
                            $json_OccId[$i] = $OccAlunoId[$i];
                            $json_OccData[$i] = $OccData[$i];
                            $json_IdOcorrencia[$i] = $IdOcorrencia[$i];

                            $json_AlunoNome[$idAlunoSearch[$j]] = $idAluno[$OccAlunoId[$i]-1];

                            //For para todas as turmas
                            for ($y=0; $y < count($TurmaId); $y++) { 
                                if($AlunoTurmaId[$json_OccId[$i]-1] == $TurmaId[$y])
                                {
                                    $json_Turma[$idAlunoSearch[$j]] = $TurmaAno[$y].$TurmaCod[$y];
                                    $forTurmaId[$idAlunoSearch[$j]] = $y+1; //$y+1 id turma
                                                                      
                                    if($forTurmaId[$json_OccId[$i]] == $TurmaId[$y])
                                    {
                                        $escolaId[$idAlunoSearch[$j]] = $TurmaEscolaId[$y];
                                    }

                                    //For para todas as escolas
                                    for ($x=0; $x < count($EscolaId); $x++) { 
                                        if($escolaId[$idAlunoSearch[$j]] == $EscolaId[$x])
                                        {
                                            $json_EscolaNome[$idAlunoSearch[$j]] = $EscolaNome[$x];
                                        }
                                    }
                                }
                            }       
                        }
                }          
            }    

            $array['idOcorrencia'] = $json_IdOcorrencia;
            $array['occId'] = $json_OccId;
            $array['nomeAluno'] = $json_AlunoNome;
            $array['turmaAluno'] = $json_Turma;
            $array['nomeEscola'] = $json_EscolaNome;
            $array['dataOcorrencia'] = $json_OccData;
        }
        else
        {
            //Retorna 0 que não é um ID válido para uma ocorrência
            //caso não sejam encontrados alunos
            //mostrando assim a mensagem "Não foram encontrados resultados"
            $array['occId'] = 0;
        }

        $array['nomeEscolaSemOcc'] = $EscolaNome;
        $array['turmaId'] = $TurmaEscolaId;
        $array['turmaEscolaAno'] = $TurmaAno;
        $array['turmaEscolaCod'] = $TurmaCod;
        $array['escolaId'] = $EscolaId;

        return json_encode($array);        
    }

    public function redirectOcc(Ocorrencia $idOcc)
    {
        $descricao = Ocorrencia::find($idOcc)->pluck('aluno_id');
        $nome_aluno = Aluno::where('id', $descricao)->pluck('nome');
        dd($nome_aluno);
        //return view('');
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
