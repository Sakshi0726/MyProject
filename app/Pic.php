<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pic extends Model
{
	protected $uploads='/code_hacking/public/images/';
	
    protected $fillable=['file'];
	
	public function getFileAttribute($photo){
		return $this->uploads.$photo;
	}
}
