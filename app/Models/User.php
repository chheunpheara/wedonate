<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Crypt;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
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

    public function projects() {
        return $this->hasMany(Project::class);
    }

    public function profilephoto() {
        return $this->hasOne(UserProfilePhoto::class);
    }

    public function followers() {
        return $this->hasMany(Follower::class, 'follower_id', 'user_id');
    }

    public static function isFollowing($creatorID) {
        $creator = Follower::where('user_id', $creatorID)->where('follower_id', Auth()->user()->id)->first();
        return is_object($creator);
    }

    public static function cryptit($string) {
        return Crypt::encryptString($string);
    }

    public static function decryptit($encrypted) {
        return Crypt::decryptString($encrypted);
    }
}
