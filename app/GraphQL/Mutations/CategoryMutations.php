<?php

namespace App\GraphQL\Mutations;

use App\Models\Category;
use App\Services\CategoryService;
use phpDocumentor\Reflection\Types\Boolean;

class CategoryMutations
{
    private $category_service;
    public function __construct(CategoryService $category_service)
    {
        $this->category_service = $category_service;
    }
    public function createCategory($_, array $args){
        return $this->category_service->create($args);
    }
    public function updateCategory($_, array $args){
        return $this->category_service->update($args);
    }
    public function deleteCategory($_, array $args)
    {
        return @$this->category_service->delete($args["id"]);
    }
}