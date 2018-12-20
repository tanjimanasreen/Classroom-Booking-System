<?php

require_once('../model/connect.php') ;
require_once('../model/query.php');

$email = $id = "";

if(isset($_REQUEST['email'])) $email = htmlentities(trim($_REQUEST['email']), ENT_QUOTES);
if(isset($_REQUEST['id'])) $id = htmlentities(trim($_REQUEST['id']), ENT_QUOTES);

if(!empty($email))
{
    if(!isUniqueEmail($email)){

        echo "Email Exists!";
    }

}

if(!empty($id))
{
    if(!isUniqueId($id)){

        echo "User Exists!";
    }
}

?>