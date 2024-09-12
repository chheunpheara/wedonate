<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // protected $appends = ['total_donator', 'top_donators'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function donators() {
        return $this->hasMany(ProjectDonator::class);
    }

    public function getTotalDonatorAttribute() {
        $total = $this->donators->count();
        $return = '';
        if ($total > 0) {
            $return = $total . ($total == 1 ? ' Supporter' : ' Supporters');
            if ($total > 1000) {
                if ($total < 10000) {
                    $newTotal = $total/1000;
                    $flag = 'K';
                } else {
                    $newTotal = $total/1000000;
                    $flag = 'M';
                }
                $return = number_format($newTotal, 1) . $flag . ' Supporters';
            }
        }
        return $return;
    }

    public function getTopDonatorsAttribute() {
        return $this->donators()->where('amount', '>', 500)->orderBy('amount', 'desc')->limit(20)->get();
    }
}
