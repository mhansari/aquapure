<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Counter_Sales extends Model
{
	protected $table ="counter_sales";
	public function bottleSizes()
    {
    	return $this->hasMany('App\Sizes','id','size_id');
       
    }
}
