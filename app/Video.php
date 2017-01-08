<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $primaryKey='vId';


        protected $fillable=['vName','vDisc','youtubeLink','appearInHome'];


        public function unit(){



        	return $this->belongsTo('App\Unit');
        }
}
