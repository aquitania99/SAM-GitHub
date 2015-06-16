<?php

class DashboardController {
    public function indexAction()
    {
        return new View('dashboard',['title' => 'Welcome!']);
    }
}