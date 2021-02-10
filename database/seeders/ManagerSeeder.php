<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('managers')->insert([
            'nama' => Str::random(),
            'email' => Str::random() . '@gg.com',
            'alamat' => Str::random(255),
            'telepon' => Str::random(11),
        ]);
    }
}
