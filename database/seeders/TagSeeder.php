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
            'Animales' => "#FF0000",
            'Arte' => "#FF6200",
            'Cine' => "#FFC300",
            'Comida' => "#BFE100",
            'Deportes' => "#7FFF00",
            'Música' => "#55CF7F",
            'Moda' => "#1E90FF",
            'Naturaleza' => "#5530D0",
            'Tecnología' => "#8A2BE2",
            'Viajes' => "#B75F8D",
            'Videojuegos' => "#FF1493"
        ];

        foreach ($tags as $n => $c) {
            Tag::create([
                'nombre' => $n,
                'color' => $c
            ]);
        }
    }
}
