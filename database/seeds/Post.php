<?php

use Illuminate\Database\Seeder;
use App\User;

class Post extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'user_id' 1,
            'title' =>'First Post Title',
            'description' => 'Lorem ipsum description',
            'summary' => 'Lorem ipsum summary',
            'is_deleted' => 0
        ]);

        DB::table('posts')->insert([
            'user_id' 2,
            'title' =>'Second Post Title',
            'description' => 'Lorem ipsum description 2',
            'summary' => 'Lorem ipsum summary 2',
            'is_deleted' => 0
        ]);
    }
}
