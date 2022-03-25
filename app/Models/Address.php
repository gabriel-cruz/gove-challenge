<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Address extends Model
{
    protected $table = 'addresses';

    protected $fillable = ['street', 'ad_number', 'district', 'city', 'state', 'user'];

    public function user(){
        return $this->belongsTo(User::class, 'user', 'id');
    }
}
