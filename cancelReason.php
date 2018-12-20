
<?php
session_start();
if(!isset($_SESSION['username']))
{
    header("location:index.html");
}
?>
<?php

require_once('model/connect.php') ;
require_once('model/query.php');


if($_SERVER["REQUEST_METHOD"]=="POST"){

    $bookId = $_POST['bookId'];

    $bookDetails = getBookingDetails($bookId);


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style >
        a{text-decoration: none;
        }
    </style>
    <title>Reason</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>

    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">

    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body>

<div class="limiter">
    <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
        <div class="wrap-login100 p-t-30 p-b-50">
            <span class="login100-form-title p-b-41">
					Reason of Cancel:
            </span>
            <span class="login100-form-title p-b-41">
					<?php echo $bookDetails['description'] ?>
            </span>
            <span class="login100-form-title p-b-41">
					Cancelled By:
            </span>
            <span class="login100-form-title p-b-41">
					<?php echo $bookDetails['cancelledby'] ?>
            </span>
            <div class="container-login100-form-btn m-t-32">
                <button class="login100-form-btn">
                    <a href="adminbookinglog.php">Go Back</a>
                </button>
            </div>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>

<script src="js/main.js"></script>

</body>
</html>

