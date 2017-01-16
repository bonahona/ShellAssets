<?php

class HomeController extends Controller
{
    public function Index()
    {
        $this->Title = "Index";
        return $this->View();
    }

    public function NotFound()
    {
        $this->Title = 'Not Found';

        return $this->View();
    }
}