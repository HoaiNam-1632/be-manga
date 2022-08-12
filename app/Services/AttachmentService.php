<?php

namespace App\Services;

use App\Models\Attachment;
use phpDocumentor\Reflection\Types\Boolean;

class AttachmentService
{
    // mutations
    public function create($data){
        return Attachment::create($data);
    }
    public function update($data){
        return  tap(Attachment::findOrFail($data["id"]))
                ->update($data);
    }
    public function delete($id): Boolean
    {
        return  Attachment::find($id)->delete();
    }

    // queries
    public function detail($id){
        return Attachment::find($id);
    }
    public function where($colum, $data){
        return Attachment::where($colum, $data);
    }
    public function whereLike($colum, $data){
        return Attachment::where($colum, "like", $data);
    }
    public function whereIn($colum , $data){
        return Attachment::whereIn($colum , $data);
    }
}