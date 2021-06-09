<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Plate;

class PlatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 4; $i++) { 
            
            $newPlate = new Plate();
            $newPlate-> name = 'hamburger';
            $newPlate-> price = 20;
            $newPlate-> available = rand(0,1);
            $newPlate-> description = $faker->text();
            $newPlate-> user_id = 1;
            $newPlate->save();
        }
    }
}
