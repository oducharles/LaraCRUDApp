<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    //
    protected $fillable = ['p_name', 'p_type', 'p_price', 'p_detail','user_id'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

}
