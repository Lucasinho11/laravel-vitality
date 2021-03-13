<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Annulation;
use Illuminate\Support\Facades\Mail;
use App\Mail\AnnulationMail;

class ApiAnnulationController extends Controller
{
    public function show($token)
    {   
        $verif = Annulation::verifToken($token);
        if($verif){
            $email = Annulation::getInfo($token);
            Annulation::supReservation($token);
     
     
            Mail::to($email[0]->email)->send(new AnnulationMail());
            return response()->json(['success' => 'Réservation annulée'], 201);
        }
        else{
            return response()->json(['error' => 'Token inexistant'], 400);
        }
       
       
    }

}
