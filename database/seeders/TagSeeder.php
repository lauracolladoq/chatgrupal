<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            'Animales' => "#FFCCCC", // rosa pastel
            'Arte' => "#FFDAB9", // melocotón pastel
            'Cine' => "#FFFACD", // amarillo pastel
            'Deportes' => "#C1FFC1", // verde pastel
            'Moda' => "#ADD8E6", // azul pastel
            'Tecnología' => "#E6E6FA", // lavanda pastel
            'Videojuegos' => "#FFB6C1" // rosa claro pastel
        ];
        

        foreach ($tags as $n => $c) {
            Tag::create([
                'nombre' => $n,
                'color' => $c
            ]);
        }
    }
}
