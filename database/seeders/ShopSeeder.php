<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::inRandomOrder()->first();
        $profile = Profile::where('user_id', $user->id)->first();
        DB::table('shops')->insert([
            'name' => 'Shop de ' . $profile->firstname . ' ' . $profile->lastname,
            'user_id' => $user->id,
            'public' => true
        ]);
    }
}
