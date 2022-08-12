<?php

namespace App\Services;

use App\Models\MangaStory;
use phpDocumentor\Reflection\Types\Boolean;

class MangaStoryService
{
    // mutations
    public function create($data){
        return MangaStory::create($data);
    }
    public function update($data){
        return  tap(MangaStory::findOrFail($data["id"]))
                ->update($data);
    }
    public function delete($id): Boolean
    {
        return  MangaStory::find($id)->delete();
    }

    // queries
    public function detail($id){
        return MangaStory::find($id);
    }
    public function where($colum, $data){
        return MangaStory::where($colum, $data);
    }
    public function findManyManga($colum, $data){
        return MangaStory::where($colum, "like", $data);
    }
    public function whereIn($colum , $data){
        return MangaStory::whereIn($colum , $data);
    }
}