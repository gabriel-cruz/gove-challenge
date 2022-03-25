<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    protected $fillable = ['name', 'dt_birth'];

    public function addresses(){
        return $this->hasMany(Address::class, 'user', 'id');
    }
}
