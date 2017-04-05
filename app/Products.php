<?php
/**
 * Created by PhpStorm.
 * User: Win7
 * Date: 4/4/2017
 * Time: 3:47 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table ='products';
    protected $guarded =[];
    public function category(){
        return $this->belongsTo('App\Category','cat_id');
    }
    public function pro_details(){
        return $this->hasOne('App\Pro_details','pro_id');
    }
    public function detail_img(){
        return $this->hasMany('App\Detail_img','pro_id');

    }
    public function oders_detail(){
        return $this->hasOne('App\Oder_details','pro_id');
    }

}