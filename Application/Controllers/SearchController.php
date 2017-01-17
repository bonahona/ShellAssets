<?php
class SearchController extends Controller
{
    public function Index()
    {
        $searchQuery = $this->Data['keywords'];
        $this->Set('SearchQuery', $searchQuery);

        $this->Title = 'Search';
        return $this->View();
    }
}
