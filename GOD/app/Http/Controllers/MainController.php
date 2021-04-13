<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
 public function DashboardPage()
 {
     return view('dashboard');
 }

 public function LoginPage()
 {
     return view('login');
 }
}
