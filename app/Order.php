<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user(){
        //a order is belong to one user
        //one to many relation
        return $this->belongsTo('App\User');
    }
}
