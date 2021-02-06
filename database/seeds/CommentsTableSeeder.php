<?php

use App\Models\Comment;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i=0 ; $i<10 ; $i++)
        {
            $array=[
                'comment'=>$faker->paragraph,
                'user_id'=>1,
                'video_id'=>rand(1,9),
            ];
            Comment::create($array);
        }
    }
}
