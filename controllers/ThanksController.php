<?php

class ThanksController {

//    protected $name;
//    protected $lastName;
//    protected $email;
//    protected $comments;
//    protected $newsletter;
    protected $data;
    protected $results;
    private $myinputs;
    public function indexAction()
    {
        return new View('thanks');
    }
}