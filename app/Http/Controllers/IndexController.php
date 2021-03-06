<?php

namespace App\Http\Controllers;
session_start();
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;


class IndexController extends Controller
{
    public function index()
    {
        $adress = Config::get('information.adress');
        $dayOff = Config::get('information.dayOff');
        $openHour = Config::get('information.openHour');
        $closeHour = Config::get('information.closeHour');
        $placeLimit = Config::get('information.placeLimit');
        return view('index', compact('adress','dayOff', 'openHour', 'closeHour', 'placeLimit'));
    }
}
