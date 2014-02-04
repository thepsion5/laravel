<?php

use Acme\Author\Author;

class AuthorsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('authors')->truncate();
        for($i = 1; $i < 5; $i++) {
            $data = array(
                'username'      => 'Author' . $i,
                'first_name'    => 'Author',
                'last_name'     => '#' . $i,
                'password'      => ''
            );
            Author::create($data);
        }
    }
}