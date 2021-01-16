<?php

use App\Models\Video;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class Videos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $youtube = [
            'https://www.youtube.com/watch?v=_PuYwVB_bQI&ab_channel=%D8%B2%D9%8A%D8%A7%D9%84%D9%83%D8%AA%D8%A7%D8%A8%D9%85%D8%A7%D8%A8%D9%8A%D9%82%D9%88%D9%84',
            'https://www.youtube.com/watch?v=hEgL-CRt4Pc&ab_channel=%D9%82%D8%B9%D8%AF%D8%A9%D8%AA%D8%A7%D8%B1%D9%8A%D8%AE',
            'https://www.youtube.com/watch?v=IbTXD9Zx8Ow&ab_channel=AhmedEbrahim-%D8%A3%D8%AD%D9%85%D8%AF%D8%A5%D8%A8%D8%B1%D8%A7%D9%87%D9%8A%D9%85',
            'https://www.youtube.com/watch?v=j42Ju3XeqxQ&ab_channel=ZAMAKAN%D8%B2%D9%85%D9%83%D8%A7%D9%86',
        ];

        $id = [1,2,3,4,5,6,7,8,9];
        for($i=0; $i<10; $i++) {
            $array = [
                'name' => $faker->word,
                'meta_keywords' =>  $faker->name,
                'meta_desc' => $faker->name,
                'youtube' =>   $youtube[rand(0,3)],
                 'published' => rand(0,1),
                'image' =>  '1609963115QlQq1.jpg',
                'desc' => $faker->paragraph,
                'cat_id' => rand(1,9),
                'user_id'=> 1,
            ];

            $video = Video::create($array);
            $video->skills()->sync(array_rand($id , 2));
            $video->tags()->sync(array_rand($id , 2));

        }
    }
}
