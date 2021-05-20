<?php

namespace App\Http\Controllers;

use App\Models\Ocorrencia;
use App\Models\Aluno;
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
            $ocorrencias = Ocorrencia::where('aluno_id', $aluno)->get();
        }

        return json_encode($ocorrencias);

        
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
