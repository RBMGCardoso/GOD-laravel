<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ocorrencia;
use App\Models\Notification;

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
        

        if(isset($mesDataOcc))
        {
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
                            $quantidade["Dez"." ".date("Y")]++;
                            break;  
                    }
                }
            }
        }

        $array['quantidade'] = $quantidade;
        //$array['labels'] = ["Jan","Fev","Mar","Abr","Mai","Jun","Jul","Ago","Set","Out","Nov","Dez"];
        return json_encode($array);
    }

    public function DashboardPage()
    {   
        $notifications = Notification::all()->pluck('cod_p');
        $notificationsId = Notification::all();

        $ocorrencias = Ocorrencia::all()->pluck('cod_p');
        $ocorrenciasId = Ocorrencia::all();
        $ocorrenciasEstado = Ocorrencia::all()->pluck('estado');

        $qtdOccs['Aceites'] = 0;
        $qtdOccs['Pendentes'] = 0;
        $qtdOccs['Recusadas'] = 0;

        for ($i=0; $i < count($ocorrencias); $i++) { 
            if($ocorrencias[$i] == session('LoggedUser')->id)
            {
                $arrayOcc[] = $ocorrenciasId[$i];

                switch ($ocorrenciasEstado[$i]) {
                    case 'Aceite':
                        $qtdOccs['Aceites']++;
                        break;

                    case 'Pendente':
                        $qtdOccs['Pendentes']++;
                        break;

                    case 'Recusada':
                        $qtdOccs['Recusadas']++;
                        break;              
                }
            }
        }
        
        $totalOccs = $qtdOccs['Aceites'] + $qtdOccs['Pendentes'] + $qtdOccs['Recusadas'];
        if($totalOccs > 0)
        {
            $percentagem['Aceites'] = round(($qtdOccs['Aceites']*100)/$totalOccs,5)."%";
            $percentagem['Pendentes'] = round(($qtdOccs['Pendentes']*100)/$totalOccs,5)."%";
            $percentagem['Recusadas'] = round(($qtdOccs['Recusadas']*100)/$totalOccs,5)."%";
        }
        else
        {
            $percentagem['Aceites'] = '0'."%";
            $percentagem['Pendentes'] = '0'."%";
            $percentagem['Recusadas'] = '0'."%";
        }

        if(!isset($arrayOcc))
        {
           $arrayOcc = null; 
        }
        else
        {
            $arrayOcc = array_slice($arrayOcc, 0, 20);
        }


        for ($i=0; $i < count($notifications); $i++) { 
            if($notifications[$i] == session('LoggedUser')->id)
            {
                $arrayNot[] = $notificationsId[$i];
            }
        }
        
        if(!isset($arrayNot))
        {
           $arrayNot = null; 
        }

        return view('dashboard', compact('arrayOcc', 'arrayNot', 'percentagem', 'qtdOccs'));
    }

    public function FiltrarOccs(Request $req)
    {
        $estados = ['Aceite','Pendente', 'Recusada'];
        $ocorrenciasId = Ocorrencia::all()->pluck('id')->reverse();
        $ocorrenciasEstado = Ocorrencia::all()->pluck('estado')->reverse();
        $ocorrenciasCodP = Ocorrencia::all()->pluck('cod_p')->reverse();
        $ocorrencia = Ocorrencia::all()->reverse();

        for ($i=0; $i < count($ocorrenciasId); $i++) { 
            if ($ocorrenciasCodP[$i] == session('LoggedUser')->id) 
            {
                if($req->estadoOcc != 0)
                {
                    if($ocorrenciasEstado[$i] == $estados[$req->estadoOcc-1])
                    {
                        $ocorrencias[] = $ocorrencia[$i];
                    } 
                }else
                {
                    $ocorrencias[] = $ocorrencia[$i];
                }
            }
        }

         
        if(isset($ocorrencias))
        {
            $ocorrencias = array_slice($ocorrencias, 0, 20);
            return json_encode($ocorrencias);
        }
        else
        {
            return json_encode(0);
        }
    }

    public function EliminarNotification(Request $req)
    {      
        $notif = Notification::find($req->idNotif);
        $notif->delete();
        
        $qtdNotifs = count(Notification::where('cod_p','=',session('LoggedUser')->id)->pluck('id'));

        return json_encode($qtdNotifs);
    }
}
