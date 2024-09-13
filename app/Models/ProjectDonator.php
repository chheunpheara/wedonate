<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectDonator extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function projects() {
        return $this->hasMany(Project::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function donators() {
        return $this->belongsTo(Project::class);
    }
}
