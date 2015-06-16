<?php
class ListController {
    public function indexAction()
    {
        $bla = json_encode($_COOKIE);
        
        return new View("list",["title" => "User's Details", "data" => $bla]);   
    }
}