<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class reservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reservations')->insert([
            'email' => Str::random(10).'@gmail.com',
            'date' => Carbon::create('2021', '10', '10'),
            'hour'=>Carbon::createFromFormat('H:i', '16:00'),
            'token'=> md5(uniqid(true)),

        ]);
    }
}
