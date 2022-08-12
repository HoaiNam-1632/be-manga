<?php

namespace App\GraphQL\Queries;

use Illuminate\Support\Facades\Auth;
use App\Services\UserService;
use GraphQL\Error\Error;
use Illuminate\Support\Facades\Hash;

class AuthQueries
{
    private $user_service;
    public function __construct(
      UserService  $user_service
    ){
        $this->user_service = $user_service;
    }
    public function logIn($_, array $args){
        $user = $this->user_service
                    ->getUser("email", $args["email"])
                    ->first();
        if($user){
            if(Hash::check($args["password"], $user->password)){
                $token = $user->createToken('authToken')->accessToken;
                return [
                    "user" => $user,
                    "token" => $token
                ];
            }
        }           
        throw new Error("Wrong email or password!");
    }
}