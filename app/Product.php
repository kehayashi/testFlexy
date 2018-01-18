<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	protected $table = 'product';

	protected $primaryKey = 'id_product';

	public $timestamps = false;

	protected $fillable = array(
        'title',
        'description',
        'image',
        'stock',
  );

	public function tag(){
		return $this->belongsToMany('App\Tag', 'product_tag', 'id_product', 'id_tag');
	}

}
