<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    // mutations
    public function create($data){
        return User::create($data);
    }
    public function update($data){
        return tap(User::findOrFail($data["id"]))
                ->update($data);
    }
    // queries
    public function detailUser($id){
        return User::find($id);
    }
    public function getUser($colum, $data){
        return User::where($colum, $data);
    }
}