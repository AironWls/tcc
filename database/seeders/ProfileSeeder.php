<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('profiles')->insert([
            ['name' => 'Administrador', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Usuario', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
