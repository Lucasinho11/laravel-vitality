<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    public static function insert(){
        $token = md5(uniqid(true));
        DB::insert('insert into reservations (email, date, hour, token) values (?, ?, ?, ?)', [$_POST['email'], $_POST['date'], $_POST['time'], $token]);
    }
    public static function verif($hour, $date){
        $results = DB::select('select * from reservations where  date = :date AND hour = :hour', ['date' => $date, 'hour' => $hour]);
        return $results;
    } 
}
