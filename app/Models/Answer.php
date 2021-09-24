<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function vote(){
        return $this->hasMany(Vote::class);
    }
    public function content()
    {
        return $this->belongsTo(Content::class);
    }
}
