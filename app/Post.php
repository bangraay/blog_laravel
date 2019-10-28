<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

	public function author(){
		//masih dalam 1 namespace makan tidak perlu pakai (App\User::class)
		return $this->belongsTo(User::class);
	}


	//fungsi ini untuk pengecekan image pada view  index.blade.php
    public function getImageUrlAttribute($value)
    {
        $imageUrl = "";

        if ( ! is_null($this->image))
        {
            $imagePath = public_path() . "/img/" . $this->image;
            if (file_exists($imagePath)) $imageUrl = asset("img/" . $this->image);
        }

        return $imageUrl;
    }

    public function getDateAttribute($value){
    	return $this->created_at->diffForHumans();
    }

    public function scopeLatestFirst(){
    	return $this->orderBy('created_at', 'desc');
    }
}
