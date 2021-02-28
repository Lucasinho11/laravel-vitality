<?php

namespace App\Http\Controllers;
use App\Models\Annulation;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\AnnulationMail;

class AnnulationController extends Controller
{

    public function show($token)
{   

   Annulation::supReservation($token);
    return view('annulation', compact('token'), ['token'=>$token]);
}
    public function deleteReservation(){
        //$_SESSION['annulation'] = Annulation::getInfo($token);
        //Mail::to($_SESSION['annulation']['email'])->send(new AnnulationMail());
        //Annulation::supReservation($token);
        session()->flash('message', 'success');

        return view('annulation');
    }
}
