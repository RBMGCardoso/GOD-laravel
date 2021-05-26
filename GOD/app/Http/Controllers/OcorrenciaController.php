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
        return view('pesquisa', ['ocorrencias' => $ocorrencias], ['escolas' => $escolas]);  
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

        $OccAlunoId = Ocorrencia::all()->reverse()->pluck('aluno_id');
        $OccData = Ocorrencia::all()->reverse()->pluck('data');
 

        $idAluno = Aluno::all()->pluck('nome');

        //Verifica se foram encontrados alunos
        if(count($idAlunoSearch)>0)
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
                            $json_AlunoNome[$idAlunoSearch[$j]] = $idAluno[$OccAlunoId[$i]-1];

                            //For para todas as turmas
                            for ($y=0; $y < count($TurmaId); $y++) { 
                                if($AlunoTurmaId[$json_OccId[$i]-1] == $TurmaId[$y])
                                {
                                    $json_Turma[$idAlunoSearch[$j]] = $TurmaAno[$y].$TurmaCod[$y];
                                    $forTurmaId[$idAlunoSearch[$j]] = $y+1; //$y+1 id turma

                                    //For para todas as escolas
                                    for ($x=0; $x < count($EscolaId); $x++) { 
                                        if($forTurmaId[$json_OccId[$i]] == $EscolaId[$x])
                                        {
                                            $json_EscolaNome[$idAlunoSearch[$j]] = $EscolaNome[$x];
                                        }
                                    }
                                }
                            }       
                        }
                }          
            }    

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


        return json_encode($array);



        

        // $alunos_id = Ocorrencia::all()->reverse()->pluck('aluno_id');
        // $search = $req->name;

        // foreach ($alunos_id as $id) {
        //     $alunos = Aluno::where('nome', 'like', '%' . $search . '%')->pluck('id'); 
        // }  


        // foreach ($alunos as $aluno) {
        //     $json_OccId[] = Ocorrencia::where('aluno_id', $aluno)->pluck('aluno_id')->collect();
        // }

        

        // if($search == null)
        // {
        //     $json_ocorrencias = Ocorrencia::all()->reverse()->pluck('aluno_id');
        // }
        // else
        // {
        //     //Coloca os ids de cada ocorrencia num unico array
        //     if(count($json_OccId) > 1)
        //     {
        //         for ($i=0; $i < count($json_OccId); $i++) { 
        //             $json_ocorrencias = $json_OccId[0]->merge($json_OccId[$i]);                
        //         }
        //     }
        //     else
        //     {
        //         $json_ocorrencias = $json_OccId[0];
        //     }
        // }

        // $json_AlunoId = Aluno::where('nome', 'like', '%' . $search . '%')->pluck('id');

        // foreach($json_AlunoId as $alunoId)
        // {
        //     $json_AlunoNome = Aluno::where('nome', 'like', '%' . $search . '%')->pluck('nome')->reverse();
        //     $json_TurmaId = AlunoTurma::where('aluno_id', $alunoId)->pluck('turma_id');

        //     foreach($json_TurmaId as $turmaId)
        //     {
        //         $json_TurmaAno[] = Turma::where('id', $turmaId)->pluck('ano');
        //         $json_TurmaCod[] = Turma::where('id', $json_TurmaId)->pluck('codTurma');
        //     }                     
        // }
        
        // for ($i=0; $i < count($json_AlunoNome); $i++) { 
        //     $json_nomeAluno[$json_AlunoId[$i]] = $json_AlunoNome[$i];
        // }

        
        
        // $array['occId'] = $json_ocorrencias;
        // $array['nomeAluno'] = $json_nomeAluno;
        // $array['turmaAno'] = $json_TurmaAno;
        // $array['turmaCod'] = $json_TurmaCod;
        // return json_encode($array);
        
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
