<?php

namespace App\GraphQL\Mutations;

use App\Models\MangaStory;
use App\Services\CategoryService;
use App\Services\MangaStoryService;
use phpDocumentor\Reflection\Types\Boolean;

class MangaStoryMutations
{
    private $manga_story_service;
    private $category_service;

    public function __construct(
        MangaStoryService $manga_story_service,
        CategoryService $category_service
        )
    {
        $this->category_service = $category_service;
        $this->manga_story_service = $manga_story_service;
    }
    public function createMangaStory($_, array $args){
        $manga =  $this->manga_story_service->create($args);
        $manga->categories = $this->category_service
                                ->whereIn("id", $manga->category_ids)
                                ->get();
        return $manga;
    }
    public function updateMangaStory($_, array $args){
        return $this->mangaStory_service->update($args);
    }
    public function deleteMangaStory($_, array $args)
    {
        return @$this->mangaStory_service->delete($args["id"]);
    }
}