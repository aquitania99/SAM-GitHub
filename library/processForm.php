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
        foreach ($result as $item => $user){
//            echo $item. " --//-- " .$user."\n";
            foreach ($user as $client => $value) {
//                echo "$client. <code>".$value."</code>\n\n";
                $data["$client"] = $value; 
            }
        }
    }
//    if ($data != '')
//    {
//        user_id":"1","
//        . ""usr_firstName":"Sergio","
//                usr_lastName":"Medina","
//                usr_email":"aquitania99@gmail.com","
//                usr_comments":"Fish and Ships","
//                usr_newsLetter":"on","
//                usr_date_added":"2015-06-16 17:15:24"
//        $data['success'] = true;
//        $data['message'] = 'Users Grabbed - Success!';
//        $data['location'] = $location;
//    }
    else
    {
        $data['success'] = false;
        $data['location'] = 'NA';
    }
}
// return all our data to an AJAX call
echo json_encode($data);