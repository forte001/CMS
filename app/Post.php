<?php

namespace App;
// use App\User;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    protected $guarded = [];
    

    public function user(){
        return $this->belongsTo(User::class);
    }


    // Mutator
    public function setPostImageAttribute($value){
        $this->attributes['post_image'] = asset($value);
    }

    //Accessor
    public function getPostImageAttribute($value){
        return asset($value);
    }
}
