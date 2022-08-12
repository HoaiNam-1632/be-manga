<?php

namespace App\Http\Controllers;

use App\Services\AttachmentService;
use Illuminate\Http\Request;

class AttachmentController extends Controller
{
    private $attachment_service;
    public function __construct(AttachmentService $attachment_service)
    {
        $this->attachment_service = $attachment_service;
    }
    public function uploadFile(Request $request){
        $path = $request->file();
        $result = [];
        foreach($path as $file){
            $nameRoot = $file->getClientOriginalName();
            $type = $file->getClientMimeType();
            $size = $file->getSize();

            $nameFile = date("Y-m-d-") . time() . "-".  rand() ."." . $file->extension();
            $upload = $file->storeAs('public/images', $nameFile);
            $link = "https://manga.test/storage/".substr($upload, strlen('public/'));
            $data = [ 
                "type" => $type,
                "size" => $size,
                "name_root" => $nameRoot,
                "file" => $upload,
                "thumb" =>$link
            ];
            $result[] = $this->attachment_service
                            ->create($data)
                            ->toArray();
        }
        
        return $result;
    }
}
