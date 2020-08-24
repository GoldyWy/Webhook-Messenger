<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {

    protected $fillable = ['id','category_id','title','short_description','full_description','thumbnail','created_at','updated_at'];

	public function category() {
	    return $this->belongsTo('App\Category');
    }
}