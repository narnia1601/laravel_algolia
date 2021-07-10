<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use HasFactory, Searchable;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function toSearchableArray(){
        $array = $this->toArray();
        $array = $this->transform($array);
        $array['user'] = $this->user->name;
        return $array;
    }
}
