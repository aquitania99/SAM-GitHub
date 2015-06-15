<?php

class AboutController {

    public function indexAction()
    {
        return new View('about',['title' => 'Some About Us!']);
    }

    public function ciudadAction($city)
    {
//        exit('contacts ' . $city);
        print_r('about' . $city);
    }

}