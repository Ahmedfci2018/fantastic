<?php

use App\Models\Video;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class VideosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $youtube=[
            'https://www.youtube.com/watch?v=ZyyYQoXr6PQ',
            'https://www.youtube.com/watch?v=5SIhlWFAJWk',
            'https://www.youtube.com/watch?v=CUS2w4y2Qj4',
            'https://www.youtube.com/watch?v=DHi1DC9Fnhw',
            'https://www.youtube.com/watch?v=OznNHfJ9P_k',
        ];

        $images=[
            '1.jpg',
            '2.jpg',
            '3.jpg',
            '4.jpg',
            '5.jpg',
            '6.jpg',
            '7.jpg',
            '8.jpg',
            '9.jpg',
            '1.jpg',
        ];
        $ids=[1,2,3,4,5,6,7,8,9];
        for ($i=0 ; $i<10 ; $i++)
        {
            $array=[
                'name'=>$faker->word,
                'meta_keywords'=>$faker->name,
                'meta_desc'=>$faker->paragraph,
                'description'=>$faker->paragraph,
                'youtube'=>$youtube[rand(0,4)],
                'image'=>$images[$i],
                'published'=>rand(0,1),
                'user_id'=>1,
                'category_id'=>rand(1,10),
            ];
            $video=Video::create($array);
            $video->skills()->sync(array_rand($ids, 3));
            $video->tags()->sync(array_rand($ids, 3));
        }
    }//  end of run
} // end of seeder
