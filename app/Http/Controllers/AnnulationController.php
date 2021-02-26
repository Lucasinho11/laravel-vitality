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
    // public function show(){
    //     //$result = Annulation::getInfo('token');
        
    //     return view('annulation',compact('annulation'));
    //     //return view('annulation');
    // }
    public function show($token)
{   
    // $token = compact('token');
     $_SESSION['annulation'] = Annulation::getInfo($token);
    // return view('annulation', $result);
    var_dump($_SESSION['annulation']);
    DB::table('reservations')->where('token', '=', $token);
    return view('annulation', compact('token'), ['token'=>$token]);
}
    public function deleteReservation($token){
        DB::table('reservations')->where('token', '=', $token);
        var_dump($token);
        Annulation::supReservation($token);
        session()->flash('message', 'success');
        Mail::to($_POST['email'])->send(new AnnulationMail());
        return view('annulation', compact('token'), ['token'=>$token]);
    }
}
