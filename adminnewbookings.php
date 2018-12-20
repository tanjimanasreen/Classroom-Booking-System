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
    <script type="text/javascript" src="js/selectBookingInfo.js"></script>

    <?php
    include('controller/fetchList.php');
    ?>
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
            <!--    <a class="logo" href="adminhome.html">-->
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
					New Bookings
					<br><br>
				</span>
                <form class="login100-form validate-form p-b-33 p-t-5" action= "controller/addBooking.php" onsubmit="return validateBookingAdmin()" method="post">
                    <div >
                        <input class="input100" type="text" name="user"
                               value="<?php
                               $user = getUserInfo($_SESSION['username']);
                               echo "Username: ".$user['username']?>" readonly>
                    </div>
                    <div>
                        <input class="input100" type="text" name="id" id ="facul" placeholder="Faculty ID" onkeyup="checkUserID(this.value)">
                        <span class="stopp" id="faculSpan"></span>
                    </div>
                    <div >
                        <input class="input102" type="date" name="date" id="selectDate">
                        <span class="stopp" id="dateSpan"></span>
                    </div>
                    <div  >
                        <select id="classType" name="classType" class="input102" onchange="showTime(this)">
                            <option value="classType">Class Type</option>
                            <option value="lab">Lab (3 hrs)</option>
                            <option value="theory1">Theory (1.5hrs)</option>
                            <option value="theory2">Theory (2 hrs)</option>
                        </select>
                        <span class="stopp" id="classSpan"></span>
                    </div>
                    <div class="input104">
                        <p style="font-size: 18px">Class Time</p>
                        <div id="th1" style="display: none">
                            <p>Theory (1.5 hrs)</p>
                            <input name="theo1[]" id = "th11" type="checkbox" value="8:00-9:30">8:00-9:30<br>
                            <input name="theo1[]" id = "th12" type="checkbox" value="9:30-11:00">9:30-11:00<br>
                            <input name="theo1[]" id = "th13" type="checkbox" value="11:00-12:30">11:00-12:30<br>
                            <input name="theo1[]" id = "th14" type="checkbox" value="12:30-2:00">12:30-2:00<br>
                            <input name="theo1[]" id = "th15" type="checkbox" value="2:00-3:30">2:00-3:30<br>
                            <input name="theo1[]" id = "th16" type="checkbox" value="3:30-5:00">3:30-5:00<br>
                        </div>
                        <div id="th2" style="display: none">
                            <p>Theory (2 hrs)</p>
                            <input name="theo2[]" id = "th21" type="checkbox" value="8:00-10:00">8:00-10:00<br>
                            <input name="theo2[]" id = "th22" type="checkbox" value="10:00-12:00">10:00-12:00<br>
                            <input name="theo2[]" id = "th23" type="checkbox" value="12:00-2:00">12:00-2:00<br>
                            <input name="theo2[]" id = "th24" type="checkbox" value="2:00-4:00">2:00-4:00<br>
                            <input name="theo2[]" id = "th25" type="checkbox" value="4:00-6:00">4:00-6:00<br>
                        </div>
                        <div id="lb" style="display: none">
                            <p>Lab (3 hrs)</p>
                            <input name="lab[]" id = "lb1" type="checkbox" value="8:00-11:00">8:00-11:00<br>
                            <input name="lab[]" id = "lb2" type="checkbox" value="11:00-2:00">11:00-2:00<br>
                            <input name="lab[]" id = "lb3" type="checkbox" value="2:00-5:00">2:00-5:00<br>
                        </div>
                        <span class="stopp" id="timeSpan"></span>
                    </div>
                    <div >
                        <select id="course" name="course" class="input102">
                            <option value="course">Course Name</option>
                            <?php
                            $course = getALLCourseName();
                            foreach ($course as $c){?>
                                <option value="<?php echo $c['coursename'];?>"><?php echo $c['coursename'];?></option>
                            <?php }?>
                        </select>
                        <span class="stopp" id="courseSpan"></span>
                    </div>
                    <div class="container-login100-form-btn m-t-32" >
                        <button class="login100-form-btn" type="submit" value="submit">
                            CONFIRM
                        </button>
                    </div>
                    <br><br>
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