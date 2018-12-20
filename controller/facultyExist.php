<?php

require_once('../model/connect.php') ;
require_once('../model/query.php');

$id = " ";
if(isset($_REQUEST['id'])) $id = htmlentities(trim($_REQUEST['id']), ENT_QUOTES);

if(!empty($id))
{
    if(!isUniqueId($id)){

        echo "User Exists!";
    }
}

?>