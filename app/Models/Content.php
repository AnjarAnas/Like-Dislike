<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
    protected $fillable=['judul','body'];
    public function like(){
        return $this->hasOne(Like::class);
    }
    public function dislike(){
        return $this->hasOne(Dislike::class);
    }
    public function artikeltag(){
        return $this->hasMany(ArtikelTags::class);
    }
    public function view(){
        return $this->hasMany(View::class);
    }
    public function answer(){
        return $this->hasMany(Answer::class);
    }
}
