<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
    public function like(){
        return $this->hasOne(Like::class);
    }
    public function dislike(){
        return $this->hasOne(Dislike::class);
    }
}
