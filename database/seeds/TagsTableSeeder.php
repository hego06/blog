<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['tag1', 'tag2', 'tag3','tag4'];

        foreach ($tags as $tag) {
            Tag::create(['name' => $tag]);
        }
    }
}
