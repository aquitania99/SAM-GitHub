<?php

class AdminController {
    public function indexAction()
    {
        return new View('admin',['title' => 'Admin Section']);
    }
}
    