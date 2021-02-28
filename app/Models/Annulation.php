<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annulation extends Model
{
    use HasFactory;
    public static function getInfo($token){
        $results = DB::select('select * from reservations where  token = :token', ['token' => $token]);
        return $results;
    }
    public static function supReservation($token){
        $result =  DB::table('reservations')->where('token', '=', $token)->delete();
        //$results = DB::delete('delete from reservations where  token = :token', ['token' => $token]);
        return $result;
    }
}
