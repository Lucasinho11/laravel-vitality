<?php

namespace App\Http\Controllers;
session_start();
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class IndexController extends Controller
{
    public function index()
    {
        return view('index');
    }
}
