<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function getImageUrlAttribute($value)
    {

    	$imageUrl = "";

    	if( ! is_null ($this->image))
    	{

    		$imagePath = public_path(). "/blog/img/".$this->image;

    		if(file_exists($imagePath)) $imageUrl = asset("blog/img/".$this->image);
    		

    	}
    	return $imageUrl;
    }
    public function author()
    {
    	# satu post milik dari satu user
    	return $this->belongsTo(User::class);
    }
    // membuat mutator
    
    public function getDateAttribute($value)
    {
    	return $this->created_at->diffForHumans();
    }
    // membuat scope
    public function scopeLatestFirst()
    {
    	return $this->orderBy('created_at','desc');
    }
}
