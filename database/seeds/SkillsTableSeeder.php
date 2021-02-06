<?php

use App\Models\Skill;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class SkillsTableSeeder extends Seeder
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
                'name'=>$faker->word,
            ];
            Skill::create($array);
        }
    }
}
