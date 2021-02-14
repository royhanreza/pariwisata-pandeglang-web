<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class VisitorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('visitors')->insert([
            'nama' => Str::random(),
            'email' => Str::random() . '@gg.com',
            'alamat' => Str::random(30),
            'username' => Str::random(10),
            'password' => Str::random(10),
            'foto' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/220px-User_icon_2.svg.png',
        ]);
    }
}
