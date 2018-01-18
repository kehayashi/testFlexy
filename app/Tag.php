<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

	protected $table = 'tag';

	protected $primaryKey = 'id_tag';

	public $timestamps = false;

	protected $fillable = array(
        'name',
  );

	public function product(){
		return $this->belongsToMany('App\Product', 'product_tag', 'id_product', 'id_tag');
	}

}
