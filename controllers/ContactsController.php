<?php

class ContactsController {

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
        return new View('contacts',['title' => 'Our Location!']);
    }
    
    public function send()
    {
        $this->myinputs = filter_input_array(INPUT_POST);
        var_dump($this->myinputs);
        if (!empty(INPUT_POST))
        {
            $this->data = $this->myinputs;
            if (!$this->data['inputNewsletter'])
            {
                $newsLetter = 'Yes';
            }
            else 
            {
                $newsLetter = 'No';
            }
            
            require 'vendor/autoload.php';
            
            $MailChimp = new \Drewm\MailChimp('e941d9f47526550496247cba89683daf-us2');
            $result = $MailChimp->call('lists/subscribe', array(
                            'id'                => 'e1c89807fb',
                            'email'             => array('email'=>$this->data['inputEmail']),
                            'merge_vars'        => array('FNAME'=>$this->data['inputName'], 'LNAME'=>$this->data['inputLastName'], 
                                                        'COMMENTS'=>$this->data['inputComments'], 'NEWSLETTER'=>$newsLetter),
                            'double_optin'      => false,
                            'update_existing'   => true,
                            'replace_interests' => false,
                            'send_welcome'      => false,
                        ));
            return new View('thanks',['title' => 'Thank you for your feedback '. $this->data['inputName'].'!', 'email' => $this->data['inputEmail'], 'data' => $result]);
        }
        else 
        {
            return new View('contacts', ['title' => 'Sorry! Can\'t submit an empty Form.']);
        }
    }
    
}