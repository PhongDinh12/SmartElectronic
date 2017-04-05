<?php
/**
 * Created by PhpStorm.
 * User: Win7
 * Date: 4/4/2017
 * Time: 4:00 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Detail_img extends Model
{
   protected $table ='detail_img';
   protected $guarded=[];
   public  function products(){
       return $this->belongsTo('App\Products','pro_id');
   }
}