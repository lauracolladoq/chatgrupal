<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $users = User::factory(10)->create();

        User::factory()->create([
            'name' => "admin",
            'email' => "admin@email.es",
            'password' => "password",
            'is_admin' => "SI"
        ]);

        User::factory()->create([
            'name' => "admin2",
            'email' => "admin2@email.es",
            'password' => "password",
            'is_admin' => "SI"
        ]);
        
        User::factory()->create([
            'name' => "admin3",
            'email' => "admin3@email.es",
            'password' => "password",
            'is_admin' => "SI"
        ]);

        /*
        foreach ($users as $item) {
            $item->following()->attach($this->followUsers());
        }
        */

        $this->call(TagSeeder::class);

        Storage::deleteDirectory('posts');
        Storage::makeDirectory('posts');

        $this->call(PostSeeder::class);
        Comment::factory(30)->create();
    }

    /*
    private function followUsers(): array
    {

        $following = [];
        $usersId = User::pluck('id')->toArray();
        $indices = array_rand($usersId, random_int(1, count($usersId)));

        if (!is_array($indices)) {
            return [$usersId[$indices]];
        }

        foreach ($indices as $indice) {
            $follwoinf[] = $usersId[$indice];
        }

        return $following;
    }
    */
}
