<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Config;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;
class InfoController extends Controller
{
    public function show(){

        $adress = Config::get('information.adress');
        $dayOff = Config::get('information.dayOff');
        $openHour = Config::get('information.openHour');
        $closeHour = Config::get('information.closeHour');
        $placeLimit = Config::get('information.placeLimit');
        return response()->json(['infos' => ['adresse' => $adress,'fermeture' =>  $dayOff,"ouverture" => $openHour,"fermeture" => $closeHour,"place" => $placeLimit]], 200);
    }
    
}
