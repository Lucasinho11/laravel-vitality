<?php

namespace App\Http\Controllers;
session_start();
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('index');
    }
}
