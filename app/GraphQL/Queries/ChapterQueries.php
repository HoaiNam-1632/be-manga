<?php

namespace App\GraphQL\Queries;

use App\Services\CategoryService;
use App\Services\ChapterService;
use App\Services\MangaStoryService;

class ChapterQueries
{
    private $chapter_service;
    private $category_service;
    private $manga_story_service;
    public function __construct(
        ChapterService $chapter_service,
        CategoryService  $category_service,
        MangaStoryService $manga_story_service
    )
    {
        $this->chapter_service = $chapter_service;
        $this->category_service = $category_service;
        $this->manga_story_service = $manga_story_service;
    }
    public function getChapter($_, array $args){
        return $this->chapter_service
                    ->where("manga_story_id", $args["manga_id"])
                    ->get();
    }
}