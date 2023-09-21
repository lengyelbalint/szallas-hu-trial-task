<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $path = public_path('sql/companies.sql');
        DB::unprepared(file_get_contents($path));
    }
}
