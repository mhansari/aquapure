<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Customer extends Model
{
	protected $table ="customers";

	public function scopeKeywords($query, $searchTerm) {
        return $query
            ->where('customer_name', 'like', "%" . $searchTerm . "%")
            ->orWhere('company', 'like', "%" . $searchTerm . "%")
            ->orWhere('mobile_number', 'like', "%" . $searchTerm . "%")
            ->orWhere('mobile_number_2', 'like', "%" . $searchTerm . "%")
            ->orWhere('mobile_number_3', 'like', "%" . $searchTerm . "%")
            ->orWhere('address', 'like', "%" . $searchTerm . "%")
            ->orWhere('near_by', 'like', "%" . $searchTerm . "%");
            
    }
    public function scopeArea($query, $area_id) {
        return $query
            ->where('area', '=', $area_id);
            
    }
    public function scopeBlock($query, $block) {
        return $query
            ->where('block', 'like',"%" . $block . "%");
            
    }
}
