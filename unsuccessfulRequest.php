<!DOCTYPE html>
<html lang="en">
<head>
    <style >
        a{text-decoration: none;
        }
    </style>
    <title>CBS-ApproveRegistration</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>

    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">

    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body>
<?php
session_start();
if(!isset($_SESSION['username']))
{
    header("location:index.html");
}

?>
<div class="limiter">
    <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
        <div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Something Went Wrong!! Please Try Again.
				</span>
            <div class="container-login100-form-btn m-t-32">
                <?php if($_SESSION['userType']==1) {

                    echo '<button class="login100-form-btn">';
                    echo '<a href="adminhome.php">Go Back</a>';
                    echo '</button>';
                }else if($_SESSION['userType']==2){
                    echo '<button class="login100-form-btn">';
                    echo '<a href="facultyhome.php">Go Back</a>';
                    echo '</button>';
                }else{
                    echo '<button class="login100-form-btn">';
                    echo '<a href="index.html">Go Back</a>';
                    echo '</button>';
                }?>
            </div>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>

<script src="js/main.js"></script>

</body>
</html>