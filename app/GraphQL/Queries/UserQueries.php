<?php

namespace App\GraphQL\Queries;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Services\UserService;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserQueries
{
    private $user_services;
    public function __construct(
      UserService  $user_services
    ){
        $this->user_services = $user_services;
    }
    public function me($_, array $args){
        return $this->user_services->detailUser(Auth::id());
    }
}