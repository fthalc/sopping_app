<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i=0;$i<8;$i++){
            $name = $faker->sentence(3);
            DB::table('products')->insert([
                'category_id'=>rand(1,5),
                'price'=>$faker->numberBetween(10, 1000),
                'name'=>$name,
                'image'=>$faker->imageUrl(500,400,'cats'),
                'description'=>$faker->sentence(rand(10,20)),
                'slug'=>Str::slug($name),
                'created_at'=>$faker->dateTimeBetween('-1 week', now()),
                'updated_at'=>now(),
            ]);
        }
    }
}
