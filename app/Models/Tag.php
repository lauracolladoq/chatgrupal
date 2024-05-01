<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'color'];

    //Relación N:M con Post porque un tag pertenece a varios posts
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    //Accessors y mutattors
    public function nombre(): Attribute
    {
        return Attribute::make(
            get: fn ($v) => "#" . $v,
            set: fn ($v) => strtolower($v)
        );
    }
}
