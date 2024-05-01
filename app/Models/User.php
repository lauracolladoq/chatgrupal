<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar'
    ];

    //-------------------------- FUNCIONES DE RELACIONES -------------------

    //Relación N:M con Post porque un user puede publicar muchos post
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    //Relación N:M con Comment porque un user puede comentar en varios post
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    //Relación N:M con Post porque un user puede darle like a muchos post
    public function postsLike(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    /*
    //Relación N:M con User porque un user puede ser seguido a otros users
    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'following_id', 'follower_id');
    }

    //Relación N:M con User porque un user seguir a otros users
    public function following()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'following_id');
    }
    */
    
    //Obtención con los id de los post a los que el usuario le ha dado like
    public function getPostsLikesId()
    {
        $ids = [];
        foreach ($this->postsLikes as $post) {
            $ids[] = $post->id;
        }
        return $ids;
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
