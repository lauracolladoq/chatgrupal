<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    //Guardo todos los posts creados para así asignarles tags random y likes random
    public function run(): void
    {
        $posts = Post::factory(30)->create();

        foreach ($posts as $item) {
            $item->tags()->attach($this->getIdTagsRandom());
            $item->usersLikes()->attach(self::getArrayLikes());
        }
    }
    private function getIdTagsRandom(): array
    {
        $tags = [];

        $arrayTags = Tag::pluck('id')->toArray();
        $indices = (array) array_rand($arrayTags, random_int(1, count($arrayTags)));
        foreach ($indices as $indice) {
            $tags[] = $arrayTags[$indice];
        }
        return $tags;
    }
    
    private static function getArrayLikes(): array
    {
        $likes = [];
        $usersId = User::pluck('id')->toArray();
        $indices = array_rand($usersId, random_int(1, count($usersId)));

        if (!is_array($indices)) {
            return [$usersId[$indices]];
        }

        foreach ($indices as $indice) {
            $likes[] = $usersId[$indice];
        }

        return $likes;
    }




}
