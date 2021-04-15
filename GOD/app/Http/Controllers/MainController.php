<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    $cod_a = $request->input('nome');
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
}
