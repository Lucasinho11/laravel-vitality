<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendMail;
use Config\Information;
use Illuminate\Support\Facades\Config;

class ReservationController extends Controller
{
    public function show(){
        
        return view('reservation');
    }
    
    public function store(Request $request){

        $dayOff = Config::get('information.dayOff');
        $openHour = Config::get('information.openHour');
        $closeHour = Config::get('information.closeHour');
        $placeLimit = Config::get('information.placeLimit');

        //$informations = new Information("Sunday", 12,18,10);
        $_SESSION['message'] ='';
        if(!empty($_POST)){
            if(empty($_POST['email']) || empty($_POST['date']) || empty($_POST['time'])) {
                
                
                $_SESSION['message'] = 'Veuillez remplir les champs';
                $_SESSION['old_inputs'] = $_POST;
                return view('reservation');

    
            }
            else{
                
                $today = date('Y-m-d');
                $tab = explode('-', $_POST['date']);
                $timestamp = mktime(0, 0, 0, $tab[1], $tab[2], $tab[0]);
                $nameDay = date('l', $timestamp);
                if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                    if($today < $_POST['date'] ){
                        //$informations->dayOff
                        if($nameDay != $dayOff ){
                            if($openHour <= $_POST['time'] && $_POST['time'] < $closeHour){
                                $result = Reservation::verif($_POST['time'], $_POST['date']);
                                
                                if(count($result) < 10){
                                    $token = md5(uniqid(true));
                                    Reservation::insert($_POST, $token);
                                    Mail::to($_POST['email'])->send(new sendMail($token, $_POST));
                                    //return back()->with('success','Item created successfully!');
                                    session()->flash('message', 'success');

                                    return redirect()->to('/reservation');
      

                                    
                                }
                                else{

                                    //Pas de places dispos
                                    $_SESSION['message'] = "Il n'y a plus de place disponible à cette heure ce jour ci";
                                    $_SESSION['old_inputs'] = $_POST;
                                    return view('reservation',compact('dayOff', 'openHour', 'closeHour', 'placeLimit'));
                                }


                            }
                            else{
                                //L'établissement est fermé pendant cette horaire
                                $_SESSION['message'] = "L'établissement est fermé à cette heure";
                                $_SESSION['old_inputs'] = $_POST;
                                return view('reservation', compact('dayOff', 'openHour', 'closeHour', 'placeLimit'));
                                //return redirect('reservation')->withInput();
                            }
                        }
                        else{
                            //dimanche fermé
                            $_SESSION['message'] = "L'établissement est fermé le jour que vous avez choisi.";
                            $_SESSION['old_inputs'] = $_POST;
                            return view('reservation', compact('dayOff', 'openHour', 'closeHour', 'placeLimit'));
                        }
                        
                        
                    }
                    else{
                        //date déjà passée
                        $_SESSION['message'] = "Cette date est déjà passée";
                        $_SESSION['old_inputs'] = $_POST;
                        return view('reservation', compact('dayOff', 'openHour', 'closeHour', 'placeLimit'));
                    }

                }   
                else{
                    //email non valide
                    $_SESSION['message'] = "Email non valide";
                    $_SESSION['old_inputs'] = $_POST;
                    return view('reservation', compact('dayOff', 'openHour', 'closeHour', 'placeLimit'));
                }
                
                
            }
        }
       
    }
}
