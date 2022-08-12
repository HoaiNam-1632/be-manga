<?php

namespace App\GraphQL\Mutations;

use App\Services\CategoryService;
use App\Services\ChapterService;

class ChapterMutations
{
    private $chapter_service;
    private $category_service;

    public function __construct(
        ChapterService $chapter_service,
        CategoryService $category_service
        )
    {
        $this->category_service = $category_service;
        $this->chapter_service = $chapter_service;
    }
    public function createChapter($_, array $args){
        return $this->chapter_service->create($args);
    }
    public function updateChapter($_, array $args){
        return $this->chapter_service->update($args);
    }
    public function deleteChapter($_, array $args)
    {
        return @$this->chapter_service->delete($args["id"]);
    }
}