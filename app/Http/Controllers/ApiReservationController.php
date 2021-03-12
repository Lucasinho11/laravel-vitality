<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Mail;
use App\Mail\apiMail;
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
        $email = $request->input('email');
        $date = $request->input('date');
        $time = $request->input('time');
        if(!empty($email) || !empty($date) || !empty($time)){
            if(empty($email) || empty($date) || empty($time)) {
                
                //$_SESSION['old_inputs'] = $_POST;
                

                return response()->json(['error' => 'Champs obligatoire'], 422);
                

    
            }
            else{
                
                $today = date('Y-m-d');
                $tab = explode('-', $date);
                $timestamp = mktime(0, 0, 0, $tab[1], $tab[2], $tab[0]);
                $nameDay = date('l', $timestamp);
                if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                    if($today < $date ){

                        if($nameDay != $dayOff ){
                            if($openHour <= $time && $time < $closeHour){
                                $result = Reservation::verif($time, $date);
                                
                                if(count($result) < $placeLimit){
                                    $token = md5(uniqid(true));
                                    Reservation::insertApi($email, $date, $time, $token);
                                    Mail::to($email)->send(new apiMail($token, $time, $date));
                                    //return back()->with('success','Item created successfully!');
                  


                                    return response()->json(['success' => 'Votre réservation a bien été enregistrée!'], 201);
      

                                    
                                }
                                else{

                                    //Pas de places dispos

                                    //$_SESSION['old_inputs'] = $_POST;

                                    return response()->json(['error' => "Il n'y a plus de place disponible à cette heure ce jour ci"], 400);
                                    
                                }


                            }
                            else{
                                //L'établissement est fermé pendant cette horaire
                                //$_SESSION['old_inputs'] = $_POST;


                                return response()->json(['error' => "L'établissement est fermé à cette heure"], 400);
                            }
                        }
                        else{
                            //dimanche fermé
                 
                            //$_SESSION['old_inputs'] = $_POST;

                            return response()->json(['error' => "L'établissement est fermé le jour que vous avez choisi."], 400);
                        }
                        
                        
                    }
                    else{
                        //date déjà passée

                        //$_SESSION['old_inputs'] = $_POST;

                        return response()->json(['error' => "Cette date est déjà passée"], 400);
                    }

                }   
                else{
                    //email non valide
                    //$_SESSION['old_inputs'] = $_POST;

                    return response()->json(['error' => "Email non valide"], 422);
                }
                
                
            }
        }
        else{
            return response()->json(['error' => "champs obligatoire"], 422);
        }
       
    }
}
