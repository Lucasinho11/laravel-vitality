<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Annulation;


class ApiAnnulationController extends Controller
{
    public function show($token)
    {   
       Annulation::supReservation($token);
       return response()->json(['success' => 'Réservation annulée'], 201);
       
    }

}
