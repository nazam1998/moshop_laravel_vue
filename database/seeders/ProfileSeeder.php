<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;
class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $user = User::inRandomOrder()->first();
        DB::table('profiles')->insert([
            'firstname'=>$faker->firstName(),
            'lastname'=>$faker->lastName(),
            'picture_path'=>'profile/IMG_20220102_125938.jpg',
            'user_id'=>$user->id
        ]);
    }
}
