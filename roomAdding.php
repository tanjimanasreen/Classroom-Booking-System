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
    <link rel="stylesheet" href="_css/main.css">
    <link rel="stylesheet" href="_css/base.css">
    <script src="_js/modernizr.js"></script>
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script type="text/javascript" src="js/validateRoom.js"></script>
    <?php include ("controller/fetchList.php"); ?>
</head>

<body id="top">
<?php
session_start();
if(!isset($_SESSION['username']))
{
    header("location:index.html");
}

?>
<header class="s-header header">

    <div class="header__logo">
        <a class="logo" href="adminhome.php">
            <img src="images/logo.svg" alt="Homepage">
        </a>
    </div>



    <a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>
    <nav class="header__nav-wrap">

        <h2 class="header__nav-heading h6">Navigate to</h2>

        <ul class="header__nav">
            <li class="current"><a href="adminhome.php" title="">Home</a></li>

            <li class="has-children">
                <a href="#0" title="">Booking</a>
                <ul class="sub-menu">
                    <li><a href="adminnewbookings.php">Create Booking</a></li>
                    <li><a href="adminCancelBookings.php">View Booking</a></li>
                </ul>
            </li>


            <li><a href="adminbookinglog.php" title="">Booking Log</a></li>
            <li class="has-children">
                <a href="#0" title="">Adding</a>
                <ul class="sub-menu">
                    <li><a href="departmentAdding.php"">Department</a></li>
                    <li><a href="courseAdding.php">Course</a></li>
                    <li><a href="roomAdding.php">Room</a></li>
                </ul>
            </li>
            <li><a href="adminprofile.php" title="">Profile</a></li>
            <li><a href="controller/logout.php" title="">Log Out</a></li>
        </ul>

        <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

    </nav>

</header>
<section class="s-content s-content--top-padding s-content--narrow" style="background-image: url('images/bg-01.jpg');">

    <div class="limiter">
        <div class="container-login100" >

            <div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					New ROOM
                    <br><br>
				</span>
                <form class="login100-form validate-form p-b-33 p-t-5" action="controller/addRoom.php" onsubmit="return validateFormRoom()" method="post">

                    <p class="input100">Room Type</p>
                    <select id="roomtype" name="roomtype" class="input102">
                        <option value="select">SELECT</option>
                        <?php
                        $typeList = allRoomType();
                        foreach($typeList as $t) {?>
                                <option value="<?php echo $t['typename']?>"><?php echo $t['typename']?></option>
                            <?php }?>
                    </select>
                    <span class="stopp" id="typeSpan"></span>

                    <p class="input100">Room Location</p>
                    <select id="roomlocation" name="roomlocation" class="input102">
                        <option value="select">SELECT</option>
                        <?php
                        $locationList = allRoomLocation();
                        foreach($locationList as $l) {?>
                            <option value="<?php echo $l['name']?>"><?php echo $l['name']?></option>
                        <?php }?>
                    </select>
                    <span class="stopp" id="locationSpan"></span>

                    <div >
                        <input id="room" class="input100" type="text" name="room" placeholder="Room" onkeyup="checkRoomName(this.value)">
                        <span class="stopp" id="roomSpan"></span>
                    </div>

                    <br><br>
                    <div class="container-login100-form-btn m-t-32" >
                        <button class="login100-form-btn" type ="submit" value="submit">
                            CONFIRM
                        </button>
                    </div>
                    <br><br>
                </form>

            </div>
            <div style="overflow: scroll" class="row login102-form">
                <h1> Classroom List</h1>
                <table class="login100-form validate-form p-b-33 p-t-5">
                    <tr>
                        <th>ROOM NO</th>
                        <th>ROOM TYPE</th>
                        <th>LOCATION</th>
                    </tr>
                    <?php
                    $roomList = getAllRoomList();
                    foreach ($roomList as $b){
                        $type = roomType($b['typeid']);
                        $location = roomLocation($b['annexid']);
                        ?>
                        <tr>
                            <td><?php echo $b['roomname'];?></td>
                            <td><?php echo $type['typename'];?></td>
                            <td><?php echo $location['name'];?></td>
                        </tr>
                    <?php }?>
                </table>
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