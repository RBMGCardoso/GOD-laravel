<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

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
}
