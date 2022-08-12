<?php

namespace App\GraphQL\Queries;

use App\Services\CategoryService;
use App\Services\MangaStoryService;

class MangaStoryQueries
{
    private $mangaStory_service;
    private $category_service;
    public function __construct(
        MangaStoryService $mangaStory_service,
        CategoryService  $category_service
    )
    {
        $this->mangaStory_service = $mangaStory_service;
        $this->category_service = $category_service;
    }
    public function allMangaStory($_, array $args){
        $mangaStories = $this->mangaStory_service
                    ->findManyManga("name","%%")
                    ->get();
        return $mangaStories->map(function($manga)
        {
            $manga->categories = $this->category_service
                                        ->whereIn("id", @$manga->category_ids ?? [])
                                        ->get();
            return $manga;
        }); 
    }
}