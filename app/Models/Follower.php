<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function creator() {
        return $this->belongsTo(User::class, 'follower_id', 'user_id');
    }

    public static function follow($creator) {
        $follower = self::where('user_id', $creator)
            ->where('follower_id', Auth()->user()->id)->first();
        if (is_object($follower)) return;

        self::create(
            [
                'user_id' => $creator,
                'follower_id' => Auth()->user()->id
            ]
        );
    }

    public static function unfollow($creator) {
        self::where('user_id', $creator)
            ->where('follower_id', Auth()->user()->id)->delete();
    }
}
