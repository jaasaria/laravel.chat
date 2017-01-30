<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class NotificationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $limit = 50;
        for ($i = 0; $i < $limit; $i++) {
            
            DB::table('tbl_notifications')->insert([
                'title' => $faker->name,
	            'slug' => str_slug($faker->name),
	            'description' => $faker->text($maxNbChars = 200),
                'avatar' => 'default.jpg',
	            'stat' => '0',
                'created_at' => Carbon::now(),
	        ]);
        }


    }
}
