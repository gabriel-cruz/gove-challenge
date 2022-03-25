<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    protected $table = 'users';

    protected $fillable = ['name', 'dt_birth'];

    public function getUserbyId($user){
        $user = DB::table('users')
        ->join('addresses', 'users.id', '=', 'addresses.user')
        ->select('users.name', 'addresses.state')
        ->where('users.id', '=', $user)
        ->get();

        return $user;
    }

    public function addresses(){
        return $this->hasMany(Address::class, 'user', 'id');
    }
}
