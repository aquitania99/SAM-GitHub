<?php
require './config.inc.php';
////
function login($user, $passwd ) 
{
//    require './config.inc.php';	
    $db = new PDO('mysql:host=' . CONF_DB_HOST . ';dbname=' . CONF_DB_NAME . ';charset=utf8', CONF_DB_USR, CONF_DB_PWD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $username = $user;
    $password = $passwd;
    // query
    $sql = "SELECT * FROM admin
    WHERE adminEmail = ? AND adminPassword = MD5(?)";
    //
    $q = $db->prepare($sql);
    $loginData = array($username, $password);
    $q->execute($loginData);
    $r = $q->fetch(PDO::FETCH_ASSOC);
    if (!empty($r)) {
        $_SESSION['phplogin'] = true;
        $location = 'dashboard';
        return $location;
    } 
    else
    {
        $location = '';
        return $location;
    }
}

function addUser($firstName, $lastName, $email, $comments='', $newsletter='') 
{
    try {
        $db = new PDO('mysql:host=' . CONF_DB_HOST . ';dbname=' . CONF_DB_NAME . ';charset=utf8', CONF_DB_USR, CONF_DB_PWD);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // query
        $sql = "INSERT INTO user (usr_firstName, usr_lastName, usr_email, usr_comments, usr_newsLetter, usr_date_added)
        VALUES (?,?,?,?,?,NOW())";
        //
        $q = $db->prepare($sql);
        $insertArray = array($firstName, $lastName, $email, $comments, $newsletter);
        $q->execute($insertArray); // Returns boolean TRUE/FALSE
        // Errors?
        //echo $q->errorCode().'<br><br>'; // Five zeros are good like this 00000 but HY001 is a common error
        $inserted = $q->rowCount();
        if($inserted == 1)
        {
            require '../vendor/autoload.php';
            
            $MailChimp = new \Drewm\MailChimp('e941d9f47526550496247cba89683daf-us2');
            $result = $MailChimp->call('lists/subscribe', array(
                            'id'                => 'e1c89807fb',
                            'email'             => array('email'=>$email),
                            'merge_vars'        => array('FNAME'=>$firstName, 'LNAME'=>$lastName, 
                                                        'COMMENTS'=>$comments, 'NEWSLETTER'=>$newsletter),
                            'double_optin'      => false,
                            'update_existing'   => true,
                            'replace_interests' => false,
                            'send_welcome'      => true,
                        ));
            $location = 'thanks';
            return $location;
        }
        else
        {
            $location = '';
            return $location;
        }
    }
    catch(PDOException $e) 
    {
        trigger_error('Error occured while trying to insert into the DB:' . $e->getMessage(), E_USER_ERROR);
    }
}

function listUser() 
{
    $db = new PDO('mysql:host=' . CONF_DB_HOST . ';dbname=' . CONF_DB_NAME . ';charset=utf8', CONF_DB_USR, CONF_DB_PWD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // query
    $sql = "SELECT * FROM user";
    $q = $db->prepare($sql);
    $q->execute();
    //$r = $q->fetch(PDO::FETCH_ASSOC);
    $count=$q->rowCount();
    $users=array();
    $i=0;
    for($i; $i < $count; $i++)
    {
        $users[] = $q->fetch(PDO::FETCH_ASSOC);
    }
    return json_encode($users); 
}