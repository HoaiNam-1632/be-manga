<?php

namespace App\Services;

use App\Models\Chapter;
use phpDocumentor\Reflection\Types\Boolean;

class ChapterService
{
    // mutations
    public function create($data){
        return Chapter::create($data);
    }
    public function update($data){
        return  tap(Chapter::findOrFail($data["id"]))
                ->update($data);
    }
    public function delete($id): Boolean
    {
        return  Chapter::find($id)->delete();
    }

    // queries
    public function where($colum, $data){
        return Chapter::where($colum, $data);
    }
    public function whereLike($colum, $data){
        return Chapter::where($colum, "like", $data);
    }
    public function whereIn($colum , $data){
        return Chapter::whereIn($colum , $data);
    }
}