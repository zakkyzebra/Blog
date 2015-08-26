<?php
    use Faker\Factory as Faker;
    class PostsTableSeeder extends Seeder{
        public function run(){
            $faker = Faker::create();


            //add these posts
            for($i=0; $i<30; $i++){
                $post1 = new Post();
                $post1->title = strtoupper($faker->bs);
                $post1->body  = $faker->text(2000);
                $post1->description  = $faker->text(100);
                $post1->user_id = User::all()->random(1)->id;
                $post1->save();
            }
        }
    }
?>