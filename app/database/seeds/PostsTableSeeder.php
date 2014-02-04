<?php

use Acme\Post\Post;

class PostsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('posts')->truncate();
        for($i = 1; $i < 13; $i++) {
            $data = array(
                'title'     => 'Post #'.$i,
                'slug'      => 'post-'.$i,
                'author_id' => ($i%4)+1,
                'body'      => 'This is post #' .$i,
                'status'    => $i%2 ? 1 : 2
            );
            Post::create($data);
        }
    }
}