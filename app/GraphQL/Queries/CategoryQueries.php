<?php

namespace App\GraphQL\Queries;

use App\Services\CategoryService;

class CategoryQueries
{
    private $category_service;
    public function __construct(CategoryService $category_service)
    {
        $this->category_service = $category_service;
    }
    public function allCategory($_, array $args){
        return $this->category_service
                    ->getCategory("name like '%%'")
                    ->get();
    }
}