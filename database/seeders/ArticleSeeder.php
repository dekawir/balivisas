<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $art = [
            'title' => 'B211A',
            'description'=>'testtest',
            'status'=>'1',
            'img'=>'balivisas.png',
            'created_by'=>'1',
        ];
        Article::create($art);
    }
}
