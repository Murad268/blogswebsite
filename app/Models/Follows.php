<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follows extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function followers() {
        return $this->hasMany(User::class, 'id', 'follower');
    }

    public function follows() {
        return $this->hasMany(User::class, 'id', 'follow');
    }
}
