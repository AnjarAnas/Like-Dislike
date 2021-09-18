<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtikelTags extends Model
{
    use HasFactory;
    protected $fillable=['tag_id','content_id'];
    public function tag(){
        return $this->belongsTo(tags::class);
    }
    public function content(){
        return $this->belongsTo(Content::class);
    }
}
