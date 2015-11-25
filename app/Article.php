<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
   protected $fillable =[
        'title',
        'body',
        'published_at'
    ];

    public function setPublishedAtAttribute($date){
    	$this->attributes['published_at'] = Carbon::parse($date);
    }
}
