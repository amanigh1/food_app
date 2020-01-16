<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Menu extends Model
{
    protected $table = 'menu';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'description',
        'price',
        'img',
        'category_id'
    ];

  // make a relation between items and its categories
    public function category(){

        return $this->belongsTo('App\Category');
    }

}
