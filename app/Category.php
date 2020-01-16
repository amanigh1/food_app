<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name',
        'description',
        'card_img',
        'title_img'
    ];

    // make a relation between items and its categories
    public function menu(){

        return $this->hasMany('App\Menu');
    }
}
