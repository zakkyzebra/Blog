<?php
    use Faker\Factory as Faker;
    class CommentsTableSeeder extends Seeder{
        public function run(){
            $faker = Faker::create();      
            //add these posts
            for($i=0; $i<10; $i++){
                $comment = new Comment();
                $comment->post_id = Post::all()->random(1)->id;
                $comment->user_id = User::all()->random(1)->id;
                $comment->comment  = $faker->text($maxNbChars = 200);
                $comment->save();
            }
        }
    }