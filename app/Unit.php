<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
   public $timestamps = false;

   protected $primaryKey="uId";
       protected $fillable=['uCode','uFirstImage','uType','uNRooms','uAreaSQM','uLandArea','uFurnished','uParking','uPriceType','uPrice','uNBedRooms','uNBathRooms','uYearlyServiceCharge','uDescription','uCountry','uTypeStatus','uCategory','uCity','uRegion' ,'uProject','uDate'];


       public function video(){


return $this->hasOne('App\Video','videoId');

       }
}
