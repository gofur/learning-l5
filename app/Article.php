<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
    	'title',
    	'body',
    	'published_at',

    ];

    protected $dates = ['published_at'];

    public function scopePublished($query)
    {
    	$query->where('published_at', '<=', Carbon::now());
    }


    public function setPublishedAtAttribute($date)
    {
    	$this->attributes['published_at'] = Carbon::parse($dates);
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
