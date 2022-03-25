<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Address;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function createUser(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->dt_birth = $request->dt_birth;
        $user->save();
        
        return response()->json([
            "message" => "usuario criado com sucesso"
        ], 201);
    }

    public function getUsers(){
        $user = User::get()->toJson(JSON_PRETTY_PRINT);
        return response($user, 200);
    }

    public function getUserbyId($user){
        return User::getUserbyId($user);
    }

    public function createAddress(Request $request, $user){
        if(User::where('id', $user)->exists()){
            $address = new Address();
            $address->street = $request->street;
            $address->ad_number = $request->ad_number;
            $address->district = $request->district;
            $address->city = $request->city;
            $address->state = $request->state;
            $address->user = $user;
            $address->save();

            return response()->json([
                "message" => "Endereço cadastrado com sucesso."
            ], 201);
        }
        else{
            return response()->json([
                "message" => "Usuário não encontrado."
            ], 400);
        }
    }

    public function updateUser(Request $request, $id){
        if(User::where('id', $id)->exists()){
            $user = User::find($id);

            $user->name = is_null($request->name) ? $user->name : $request->name;
            $user->dt_birth = is_null($request->dt_birth) ? $user->dt_birth : $request->dt_birth;
            $user->save();
            
            return response()->json([
                "message" => "Usuário atualizado com sucesso."
            ], 201);
        }
        else{
            return response()->json([
                "message" => "Usuário não encontrado."
            ], 404);
        }

    }

    public function updateAddress(Request $request, $user, $id){
        if(Address::where('user', $user)->exists() && Address::where('id', $id)->exists()){
            $address = Address::find($id);

            $address->street = is_null($request->street) ? $address->street : $request->street;
            $address->ad_number = is_null($request->ad_number) ? $address->ad_number : $request->ad_number;
            $address->district = is_null($request->district) ? $address->district : $request->district;
            $address->city = is_null($request->city) ? $address->city : $request->city;
            $address->state = is_null($request->state) ? $address->state : $request->state;
            $address->save();
            
            return response()->json([
                "message" => "Endereço atualizado com sucesso."
            ], 201);
        }
        else{
            return response()->json([
                "message" => "Dados não encontrados."
            ], 404);
        }
    }

    public function deleteAddress($id){
        if(Address::where('id', $id)->exists()){
            $address = Address::find($id);
            $address->delete();

            return response()->json([
                "message" => "Endereço excluído com sucesso."
            ], 202);

        } 
        else {
            return response()->json([
                "message" => "Dados não encontrados."
            ], 404);
        }
    }

    public function deleteUser($id){
        if(User::where('id', $id)->exists()){
            $address = Address::where('user', $id);
            $address->delete();

            $user = User::find($id);
            $user->delete();

            return response()->json([
                "message" => "Usuário excluído com sucesso."
            ], 202);
        }
        else{
            return response()->json([
                "message" => "Dados não encontrados."
            ], 404);
        }
    }
}
