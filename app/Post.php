<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Post extends Model
{
	protected $dates = ['published_at'];
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
    	return is_null($this->published_at) ? '' : $this->published_at->diffForHumans();
    }
    // membuat scope
    public function scopeLatestFirst()
    {
    	return $this->orderBy('published_at','desc');
    }
    public function scopePublished()
    {
    	return $this->where("published_at","<=",Carbon::now());
    }
}
