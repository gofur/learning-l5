<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
    	'title',
    	'body',
    	'user_id' //temporary 
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
