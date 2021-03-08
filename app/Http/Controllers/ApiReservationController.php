<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendMail;
use Illuminate\Http\Response;

class ApiReservationController extends Controller
{
    public function create(Request $request){

        //$informations = new Information("Sunday", 12,18,10);
        $_SESSION['message'] ='';

        $dayOff = Config::get('information.dayOff');
        $openHour = Config::get('information.openHour');
        $closeHour = Config::get('information.closeHour');
        $placeLimit = Config::get('information.placeLimit');
        if(!empty($_POST)){
            if(empty($_POST['email']) || empty($_POST['date']) || empty($_POST['time'])) {
                
                $_SESSION['old_inputs'] = $_POST;
                

                return response()->json(['error' => 'Champs obligatoire'], 422);
                

    
            }
            else{
                
                $today = date('Y-m-d');
                $tab = explode('-', $_POST['date']);
                $timestamp = mktime(0, 0, 0, $tab[1], $tab[2], $tab[0]);
                $nameDay = date('l', $timestamp);
                if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                    if($today < $_POST['date'] ){

                        if($nameDay != $dayOff ){
                            if($openHour <= $_POST['time'] && $_POST['time'] < $closeHour){
                                $result = Reservation::verif($_POST['time'], $_POST['date']);
                                
                                if(count($result) < $placeLimit){
                                    $token = md5(uniqid(true));
                                    Reservation::insert($_POST, $token);
                                    Mail::to($_POST['email'])->send(new sendMail($token, $_POST));
                                    //return back()->with('success','Item created successfully!');
                  


                                    return response()->json(['message' => 'succes'], 201);
      

                                    
                                }
                                else{

                                    //Pas de places dispos

                                    $_SESSION['old_inputs'] = $_POST;

                                    return response()->json(['error' => "Il n'y a plus de place disponible à cette heure ce jour ci"], 400);

                                }


                            }
                            else{
                                //L'établissement est fermé pendant cette horaire
                                $_SESSION['old_inputs'] = $_POST;


                                return response()->json(['error' => "L'établissement est fermé à cette heure"], 400);
                            }
                        }
                        else{
                            //dimanche fermé
                 
                            $_SESSION['old_inputs'] = $_POST;

                            return response()->json(['error' => "L'établissement est fermé le jour que vous avez choisi."], 400);
                        }
                        
                        
                    }
                    else{
                        //date déjà passée

                        $_SESSION['old_inputs'] = $_POST;

                        return response()->json(['error' => "Cette date est déjà passée"], 400);
                    }

                }   
                else{
                    //email non valide
                    $_SESSION['old_inputs'] = $_POST;

                    return response()->json(['error' => "Email non valide"], 422);
                }
                
                
            }
        }
        else{
            return response()->json(['error' => "champs obligatoire"], 422);
        }
       
    }
}
