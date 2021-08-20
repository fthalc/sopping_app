<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SepetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sepets')->insert([
            'urun_id'=>8,
            'urun_adet'=>2,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
    }
}
