<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function show(){
        return view('reservation');
    }
    public function store(){

        if(!empty($_POST)){
            if(empty($_POST['email']) || empty($_POST['date']) || empty($_POST['time'])) {
                return view('reservation');
    
            }
            else{
                
                
                
                $today = date('Y-m-d');
                $tabDate = explode('-', $_POST['date']);
                $timestamp = mktime(0, 0, 0, $tabDate[1], $tabDate[2], $tabDate[0]);
                $nameDay = date('l', $timestamp);
                if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                    if($today < $_POST['date'] ){
                        if($nameDay != 'Sunday'){
                            if(12 < $_POST['time'] && $_POST['time'] < 18){
                                
                                $result = DB::select('select * from reservations where  date = :date AND hour = :hour', ['date' => $_POST['date'], 'hour' => $_POST['time']]);
                                if(count($result) < 10){
                                    Reservation::insert();
                                }
                                else{

                                    //Pas de places dispos
                                }
                                var_dump(count($result));
                                return view('reservation');

                            }
                            else{
                                //L'établissement est fermé pendant cette horaire
                            }
                        }
                        else{
                            //dimanche fermé
                        }
                        
                        
                    }
                    else{
                        //date déjà passée
                        return view('reservation');
                    }

                }   
                else{
                    //email non valide
                }
                
                
            }
        }
       
    }
}
