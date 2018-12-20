<?php

require_once('../model/connect.php') ;
require_once('../model/query.php');

$theory1 = $theory2 = $lab = $course = $class = $username = " ";
$startTime = $endTime = $time = array();
$cnt = 0;
date_default_timezone_set('Asia/Dhaka');
//$day = date("Y-m-d");
$classList = array();
$availableRoom = array();
if($_SERVER['REQUEST_METHOD']=="POST"){

    if(isset($_POST['theo1'])){

        $theory1 = $_POST['theo1'];

    }else if(isset($_POST['theo2'])){

        $theory2 = $_POST['theo2'];

    }else if(isset($_POST['lab'])){

        $lab = $_POST['lab'];
    }

    $course = $_POST['course'];
    $username = $_POST['id'];
    $class = $_POST['classType'];
    $day =$_POST['date'];

    if($class == "lab"){

        $startTime = $endTime = $classList = $roomList = $availableRoom = array();
        foreach ($lab as $i){

            $time = explode("-",$i);
            $startTime[$cnt] = $time[0];
            $endTime[$cnt] = $time[1];
            $cnt++;

        }

        for($i = 0; $i< $cnt ; $i++){

            $result = checkClassRoom($day, $startTime[$i], $endTime[$i]);

            if(!empty($result))
                $classList[$i] = $result['classid'];

        }
        $classListLastIndex = count($classList);

        for($i = 0; $i< $cnt ; $i ++){

            $result = checkStartTime($day, $startTime[$i]);
            if(!empty($result)){

                foreach ($result as $r){

                    $classList[$classListLastIndex] =$r['classid'];
                    $classListLastIndex++;
                }
            }

        }

        $test = getClassRoom(2);

        $i = 0;
        foreach ($test as $t){

            $roomList[$i] = $t['id'];
            $i++;
        }

        for ($i =0; $i<count($classList); $i++){

            for($j = 0 ; $j< count($roomList); $j++){

                if($classList[$i]==$roomList[$j]){
                    $roomList[$j] = 0;
                }
            }
        }

        $i = 0;
        foreach ($test as $t){

            for($j = 0 ; $j< count($roomList); $j++){

                if($t['id']==$roomList[$j]){

                    $availableRoom[$i]=$t['roomname'];
                    $i++;
                }
            }

        }


    }else if($class == "theory1"){

        $startTime = $endTime = $classList = $roomList = $availableRoom = array();
        foreach ($theory1 as $i){

            $time = explode("-",$i);
            $startTime[$cnt] = $time[0];
            $endTime[$cnt] = $time[1];
            $cnt++;

        }

        for($i = 0; $i< $cnt ; $i++){

            $result = checkClassRoom($day, $startTime[$i], $endTime[$i]);

            if(!empty($result))
            $classList[$i] = $result['classid'];

        }


        $classListLastIndex = count($classList);

        for($i = 0; $i< $cnt ; $i ++){

            $result = checkStartTime($day, $startTime[$i]);
            if(!empty($result)){

                foreach ($result as $r){

                    $classList[$classListLastIndex] =$r['classid'];
                    $classListLastIndex++;
                }
            }

        }


        $test = getClassRoom(1);

        $i = 0;
        foreach ($test as $t){

            $roomList[$i] = $t['id'];
            $i++;
        }

        for ($i =0; $i<count($classList); $i++){

            for($j = 0 ; $j< count($roomList); $j++){

                if($classList[$i]==$roomList[$j]){
                    $roomList[$j] = 0;
                }
            }
        }

        $i = 0;
        foreach ($test as $t){

            for($j = 0 ; $j< count($roomList); $j++){

                if($t['id']==$roomList[$j]){

                    $availableRoom[$i]=$t['roomname'];
                    $i++;
                }
            }

        }


    }else{

        $startTime = $endTime = $classList = $roomList = $availableRoom = array();
        foreach ($theory2 as $i){

            $time = explode("-",$i);
            $startTime[$cnt] = $time[0];
            $endTime[$cnt] = $time[1];
            $cnt++;
        }

        for($i = 0; $i< $cnt ; $i++){

            $result = checkClassRoom($day, $startTime[$i], $endTime[$i]);

            if(!empty($result))
                $classList[$i] = $result['classid'];

        }


        $classListLastIndex = count($classList);

        for($i = 0; $i< $cnt ; $i ++){

            $result = checkStartTime($day, $startTime[$i]);


            if(!empty($result)){

                foreach ($result as $r){

                    $classList[$classListLastIndex] =$r['classid'];
                    $classListLastIndex++;
                }
            }

        }

        $test = getClassRoom(1);

        $i = 0;
        foreach ($test as $t){

            $roomList[$i] = $t['id'];
            $i++;
        }

        for ($i =0; $i<count($classList); $i++){

            for($j = 0 ; $j< count($roomList); $j++){

                if($classList[$i]==$roomList[$j]){
                    $roomList[$j] = 0;
                }
            }
        }

        $i = 0;
        foreach ($test as $t){

            for($j = 0 ; $j< count($roomList); $j++){

                if($t['id']==$roomList[$j]){

                    $availableRoom[$i]=$t['roomname'];
                    $i++;
                }
            }

        }


    }



}

?>

<!DOCTYPE html>
<html class="no-js" lang="en"  >
<head>
    <style >
        a{text-decoration: none;
        }
    </style>
    <meta charset="utf-8">
    <title>CBS</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="../_css/main.css">
    <link rel="stylesheet" href="../_css/base.css">
    <script src="../_js/modernizr.js"></script>
    <link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="../fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <script type="text/javascript" src="../js/selectBookingInfo.js"></script>
</head>

<body id="top">
<?php
session_start();
if(!isset($_SESSION['username']))
{
    header("location:../index.html");
}

?>

<header class="s-header header">
            <?php
            if($_SESSION['userType']==1){?>
                <div class="header__logo">
                    <a class="logo" href="../adminhome.php">
                        <img src="../images/logo.svg" alt="Homepage">
                    </a>
                </div>


                <a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>
                <nav class="header__nav-wrap">

                    <h2 class="header__nav-heading h6">Navigate to</h2>

                    <ul class="header__nav">
                        <li class="current"><a href="../adminhome.php" title="">Home</a></li>

                        <li><a href="../adminnewbookings.php">New Booking</a></li>
                        <li><a href="../adminbookinglog.php" title="">Booking Log</a></li>
                        <li class="has-children">
                            <a href="#0" title="">Adding</a>
                            <ul class="sub-menu">
                                <li><a href="../departmentAdding.php"">Department</a></li>
                                <li><a href="../courseAdding.php">Course</a></li>
                            </ul>
                        </li>
                        <li><a href="../adminprofile.php" title="">Profile</a></li>
                        <li><a href="../controller/logout.php" title="">Log Out</a></li>
                    </ul>

                    <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

                </nav>
            <?php}
            else{?>
                <div class="header__logo">
                    <a class="logo" href="../facultyhome.php">
                        <img src="../images/logo.svg" alt="Homepage">
                    </a>
                </div>

                <a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>
                <nav class="header__nav-wrap">

                    <h2 class="header__nav-heading h6">Navigate to</h2>

                    <ul class="header__nav">
                        <li class="current"><a href="../facultyhome.php" title="">Home</a></li>
                        <li class="has-children">
                            <a href="#0" title="">Bookings</a>
                            <ul class="sub-menu">
                                <li><a href="../facultynewbookings.php">New Booking</a></li>
                                <li><a href="../facultyCancelBookings.php">Cancel Booking</a></li>
                            </ul>
                        </li>
                        <li><a href="../facultybookinglog.php" title="">Booking Log</a></li>
                        <li><a href="../facultyprofile.php" title="">Profile</a></li>
                        <li><a href="../controller/logout.php" title="">Log Out</a></li>
                    </ul>

                    <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

                </nav>
            <?php }?>
</header>
<section class="s-content s-content--top-padding s-content--narrow" style="background-image: url('../images/bg-01.jpg');">

    <div class="limiter">
        <div class="container-login100" >
            <div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					New Bookings
					<br><br>
				</span>
                <form class="login100-form validate-form p-b-33 p-t-5" action="confirmBooking.php" onsubmit="return checkRoom()" method="post">
                    <div>
                        <p style="font-size: 18px">Username: </p>
                        <input class="input100" type="text" name="id"
                               value="<?php echo $username;?>" readonly>
                    </div>
                    <div>
                        <p style="font-size: 18px">Date: </p>
                        <input class="input100" type="text" name="date"
                               value="<?php echo $day;?>" readonly>
                    </div>
                    <div >
                        <p style="font-size: 18px">Class Type: </p>
                        <input class="input100" type="text" name = "classType" value="<?php
                            if($class=="lab"){
                                echo "Lab";
                            }else{
                                echo "Theory";
                            }
                        ?>" readonly>
                    </div>
                    <div class="input104">
                        <p style="font-size: 18px">Class Time: </p>
                            <?php
                            echo "<ul>";
                            for($i = 0; $i < count($startTime); $i++)
                            {
                                echo "<li>".$startTime[$i]."-".$endTime[$i]."</li>";
                            }
                            echo "</ul>";

                            $_SESSION['startTime']=$startTime;
                            $_SESSION['endTime']=$endTime;
                            ?>

                    </div>
                    <div >
                        <p style="font-size: 18px">Course Name: </p>
                        <input class="input100" type="text" name="course"
                               value="<?php echo $course;?>" readonly>

                    </div>
                    <div >
                        <p style="font-size: 18px">Available Room: </p>
                        <?php

                        if(!empty($availableRoom)) {

                            for ($i = 0; $i < count($availableRoom); $i++) {
                                ?>
                                <input type="radio" name="class"
                                       value="<?php echo $availableRoom[$i]; ?>"><?php echo $availableRoom[$i]; ?><br>
                            <?php }

                        }else{

                            echo "<p style='font-size: 18px'>Sorry! No Class Available</p>";
                        }
                        ?>
                        <span id="roomNumSpan"></span>
                    </div>
                    <hr>
                    <div class="container-login100-form-btn m-t-32" >
                        <button class="login100-form-btn" type="submit" value="submit">
                            CONFIRM
                        </button>
                        <hr>
                        <button class="login100-form-btn">
                            <?php if($_SESSION['userType']==1){?>
                            <a href="../adminnewbookings.php">Go Back!</a>
                            <?php }else{?>
                            <a href="../facultynewbookings.php">Go Back!</a>
                            <?php }?>
                        </button>
                        <br><br>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>
<footer class="s-footer">

    <div class="row">
        <div class="col-six tab-full s-footer__about">

            <h4>ABOUT CBS</h4>

            <p style="color: #58905f">It is a class booking system</p>

        </div>
        <div class="col-six tab-full s-footer__subscribe ">

            <h4>DEVOLOPED BY</h4>

            <p ><h5 style="color: #58905f">TANJIMA NASREEN JENIA(16-31237-1)</h5></p>
            <p><h5 style="color: #58905f">MD. TAREQ(16-31181-1)<h5> </p>
        </div>
    </div>
</footer>

<script src="_js/jquery-3.2.1.min.js"></script>
<script src="_js/main.js"></script>
</body>

</html>
