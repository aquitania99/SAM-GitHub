<?php
//
$post = filter_input_array(INPUT_POST);
//
$errors = array();    // array to hold validation errors
$data   = array();    // array to pass back data
if ($post['submit'] == 'login') //Admin Login
{
    require 'DB_Conn.php';
    $user = $post['inputEmail'];
    $passwd = $post['inputPassword'];
    //
    $location = login($user,$passwd);
    // show a message of success and provide a true success variable
    if ($location != 'NA')
    {
        $data['success'] = true;
        $data['message'] = 'Success!';
        $data['location'] = $location;
    }
    else
    {
        $data['success'] = false;
        $data['location'] = 'NA';
    }
}
elseif ($post['submit'] == 'contact') // Contact Form
{
    require 'DB_Conn.php';
    $firstName = $post['inputName'];
    $lastName = $post['inputLastName'];
    $email = $post['inputEmail'];
    $comments = $post['inputComments'];
    $newsletter = $post['inputNewsletter'];
    //
    $location = addUser($firstName, $lastName, $email, $comments, $newsletter);
    //
    // show a message of success and provide a true success variable
    if ($location != 'NA')
    {
        $data['success'] = true;
        $data['message'] = 'Success!';
        $data['location'] = $location;
    }
    else
    {
        $data['success'] = false;
        $data['location'] = 'NA';
    }
}
elseif ($post['adminAction'] == 'getUser') // List Users
{
    require 'DB_Conn.php';
    //
    $usrs = listUser();
    $result = json_decode($usrs,true);
    if ($result != '')
    {
        $data['success'] = true;
        $data['message'] = 'Users Grabbed - Success!';
        foreach ($result as $item => $user)
        {
            foreach ($user as $client => $value) 
            {
                $data["$client"] = $value; 
            }
        }
    }
    else
    {
        $data['success'] = false;
        $data['location'] = 'NA';
    }
}
// return all our data to an AJAX call
echo json_encode($data);