<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
 public function LoginPage()
 {
     return view('login');
 }

 public function OcorrenciaPage()
 {
     return view('ocorrencia');
 }
}
