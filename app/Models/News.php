<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Str;

class News extends Model
{
	protected $table = 'mncl_news';

	public function setSlugEnAttribute($slug_en){ 
		return $this->attributes['slug_en'] = Str::slug($slug_en,'-'); 
	}
	public function setSlugIdAttribute($slug_id){ 
		return $this->attributes['slug_id'] = Str::slug($slug_id,'-'); 
	}
}
