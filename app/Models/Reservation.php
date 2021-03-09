<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    public static function insert($info, $token){
        
        DB::insert('insert into reservations (email, date, hour, token) values (?, ?, ?, ?)', [$info['email'], $info['date'], $info['time'], $token]);
    }
    public static function verif($hour, $date){
        $results = DB::select('select * from reservations where  date = :date AND hour = :hour', ['date' => $date, 'hour' => $hour]);
        return $results;
    } 
    public static function insertApi($email, $date, $time, $token){
        DB::insert('insert into reservations (email, date, hour, token) values (?, ?, ?, ?)', [$email, $date, $time, $token]);

    }
}
