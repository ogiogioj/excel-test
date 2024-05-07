<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 30; $i++) {
            DB::table('comments')->insert([
                'body' => $faker->text,
                'user_id' => $faker->numberBetween(1, 10000),
                'created_at' => $faker->dateTimeThisYear->format('Y-m-d H:i:s'),
                'updated_at' => $faker->dateTimeThisYear->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
