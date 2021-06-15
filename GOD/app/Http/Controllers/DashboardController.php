<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ocorrencia;

class DashboardController extends Controller
{
    public function GraficoOcorrencias()
    {
        $datasOcc = Ocorrencia::all()->pluck('data');
        $meses = ["Jan","Fev","Mar","Abr","Mai","Jun","Jul","Ago","Set","Out","Nov","Dez"];

        for ($i=0; $i < count($datasOcc); $i++) { 
            $anoDataOcc[$i] = substr($datasOcc[$i], 0, 4);
            $mesDataOcc[$i] = substr($datasOcc[$i], 5, 2);
        }     
        

        foreach ($meses as $mes) {
            $quantidade[$mes." ".date("Y")] = 0;
        }
        

        for ($i=0; $i < count($mesDataOcc); $i++) { 
            if($anoDataOcc[$i] == date("Y"))
            {
                switch ($mesDataOcc[$i]) {
                    case '01':
                        $quantidade["Jan"." ".date("Y")]++;
                        break;  

                    case '02':
                        $quantidade["Fev"." ".date("Y")]++;
                        break;  

                    case '03':
                        $quantidade["Mar"." ".date("Y")]++;
                        break;  

                    case '04':
                        $quantidade["Abr"." ".date("Y")]++;
                        break;  

                    case '05':
                        $quantidade["Mai"." ".date("Y")]++;
                        break;  

                    case '06':
                        $quantidade["Jun"." ".date("Y")]++;
                        break;  

                    case '07':
                        $quantidade["Jul"." ".date("Y")]++;
                        break;  

                    case '08':
                        $quantidade["Ago"." ".date("Y")]++;
                        break;  

                    case '09':
                        $quantidade["Set"." ".date("Y")]++;
                        break;  

                    case '10':
                        $quantidade["Out"." ".date("Y")]++;
                        break;  

                    case '11':
                        $quantidade["Nov"." ".date("Y")]++;
                        break;  

                    case '12':
                        $quantidade["Dec"." ".date("Y")]++;
                        break;  
                }
            }

        }

        $array['quantidade'] = $quantidade;
        //$array['labels'] = ["Jan","Fev","Mar","Abr","Mai","Jun","Jul","Ago","Set","Out","Nov","Dez"];
        return json_encode($array);
    }

    public function DashboardPage()
    {   
        $ocorrencias = Ocorrencia::all()->pluck('cod_p');
        $ocorrenciasId = Ocorrencia::all();

        for ($i=0; $i < count($ocorrencias); $i++) { 
            if($ocorrencias[$i] == session('LoggedUser')->id)
            {
                $arrayOcc[] = $ocorrenciasId[$i];
            }
        }
        
        if(!isset($arrayOcc))
        {
           $arrayOcc = null; 
        }

        return view('dashboard', compact('arrayOcc'));
    }
}
