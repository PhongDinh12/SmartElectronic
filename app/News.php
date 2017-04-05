<?php
/**
 * Created by PhpStorm.
 * User: Win7
 * Date: 4/4/2017
 * Time: 3:54 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table ='news';
    protected $guarded=[];
    public function  category(){
        return $this->belongsTo('App\Category','cat_id');
    }

}