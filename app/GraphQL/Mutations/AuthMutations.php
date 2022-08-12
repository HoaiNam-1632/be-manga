<?php

namespace App\GraphQL\Mutations;

use GraphQL\Error\Error;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Services\UserService;

class AuthMutations
{   
    private $user_service;
    public function __construct(
      UserService  $user_service
    ){
        $this->user_service = $user_service;
    }
    public function signUp($_, array $args){
        if($args['password'] !== $args["password_confirmation"] ){
            throw new Error("password doesn't match");
        }
        $checkEmail = $this->user_service
                            ->getUser("email", $args['email'])
                            ->first();
        if(isset($checkEmail)){
            throw new Error("email already exits");
        }
        $password = Hash::make($args['password']);
        $user = $this->user_service->create([
            "name" =>  $args["name"],
            "email" => $args["email"],
            "password" => $password
        ]);
        $access_token = $user->createToken('authToken')->accessToken;
        return ["user" => $user, "token" => $access_token];
    }
}