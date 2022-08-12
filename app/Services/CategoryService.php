<?php

namespace App\Services;

use App\Models\Category;
use phpDocumentor\Reflection\Types\Boolean;

class CategoryService
{
    // mutations
    public function create($data){
        return Category::create($data);
    }
    public function update($data){
        return  tap(Category::findOrFail($data["id"]))
                ->update($data);
    }
    public function delete($id): Boolean
    {
        return  Category::find($id)->delete();
    }

    // queries
    public function detailCategory($id){
        return Category::find($id);
    }
    public function getCategory($data){
        return Category::whereRaw($data);
    }
    public function whereIn($collum, $data){
        return Category::whereIn($collum, $data);
    }
}