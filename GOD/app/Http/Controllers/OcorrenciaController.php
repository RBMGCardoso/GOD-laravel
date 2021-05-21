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
        $alunos_id = Ocorrencia::all()->reverse()->pluck('aluno_id');
        $search = $req->name;

        foreach ($alunos_id as $id) {
            $alunos = Aluno::where('nome', 'like', '%' . $search . '%')->pluck('id'); 
        }  


        foreach ($alunos as $aluno) {
            $json_OccId[] = Ocorrencia::where('aluno_id', $aluno)->pluck('aluno_id')->collect();
        }

        

        //Coloca os ids de cada ocorrencia num unico array
        if(count($json_OccId) > 1)
        {
            for ($i=0; $i < count($json_OccId); $i++) { 
                $json_ocorrencias = $json_OccId[0]->merge($json_OccId[$i]);                
            }
        }
        else
        {
            $json_ocorrencias = $json_OccId[0];
        }

        $json_AlunoId = Aluno::where('nome', 'like', '%' . $search . '%')->pluck('id');

        foreach($json_AlunoId as $alunoId)
        {
            $json_AlunoNome = Aluno::where('nome', 'like', '%' . $search . '%')->pluck('nome')->reverse();
            $json_TurmaId = AlunoTurma::where('aluno_id', $alunoId)->pluck('turma_id');

            foreach($json_TurmaId as $turmaId)
            {
                $json_TurmaAno[] = Turma::where('id', $turmaId)->pluck('ano');
                $json_TurmaCod[] = Turma::where('id', $json_TurmaId)->pluck('codTurma');
            }                     
        }
        
        for ($i=0; $i < count($json_AlunoNome); $i++) { 
            $json_nomeAluno[$json_AlunoId[$i]] = $json_AlunoNome[$i];
        }

        //dd($json_ocorrencias));
        
        $array['occId'] = $json_ocorrencias;
        $array['nomeAluno'] = $json_nomeAluno;
        $array['turmaAno'] = $json_TurmaAno;
        $array['turmaCod'] = $json_TurmaCod;
        return json_encode($array);
        
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
