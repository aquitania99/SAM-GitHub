<?php

class ContactsController {
    public function indexAction()
    {
        return new View('contacts',['title' => 'Our Location!']);
    }
}