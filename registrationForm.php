<!DOCTYPE html>
<html lang="en">
<head>
	<style >
		a{text-decoration: none;
			}
	</style>
	<title>CBS-Registration</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>

	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">

	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script type="text/javascript" src="js/validateRegistration.js"></script>
	<noscript>
		<META HTTP-EQUIV="Refresh" CONTENT="0;URL=noJS.html">
	</noscript>
</head>
<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					REGISTRATION
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" action="controller/validRegistration.php" onsubmit="return validateForm()" method="post">

					<div class="wrap-input100 validate-input">
						<input id="id" class="input100" type="text" name="id" placeholder="Username" onblur="checkUserID(this.value)">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
						<span  class="stop"id="idSpan"></span>
					</div>
					<div class="wrap-input100 validate-input">
						<input id="name" class="input100" type="text" name="name" placeholder="Full name" onkeyup="checkUserName(this)">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
						<span class="stop" id="nameSpan"></span>
					</div>
					<div class="wrap-input100 validate-input">
						<span class="focus-input100" data-placeholder="&#xe88e;"></span>
						<p class="input100">Department</p>

                        <select id="dept" name="department" class="inputstop">
                            <option value="select">SELECT</option>
                            <?php
                            include('controller/fetchList.php');
                            $dept = getDeptName();
                            foreach($dept as $d) {
                                if($d['deptname']!="admin"){?>
                                <option value="<?php echo $d['deptname']?>"><?php echo $d['deptname']?></option>
                            <?php }}?>
                        </select>

						<span class="stop" id="deptSpan"></span>

					</div>
					<div class="wrap-input100 validate-input" >
						<input id="email" class="input100" type="Email" name="email" placeholder="Email" onblur="checkEmail(this.value)">
						<span class="focus-input100" data-placeholder="&#xe818;"></span>
						<span class="stop" id="emailSpan"></span>
					</div>
                    
					<div class="wrap-input100 validate-input" >
						<input id="phone" class="input100" type="text" name="phone" placeholder="Phone">
						<span class="focus-input100" data-placeholder="&#xe830;"></span>
						<span class="stop" id="phoneSpan"></span>
					</div>

					<div class="wrap-input200 validate-input">
						<input id="password" class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
						<span class="stop" id="passSpan"></span>
					</div>
					<div class="wrap-input100 validate-input">
						<input id="repassword" class="input100" type="password" name="repassword" placeholder="Confirm Password" onkeyup="test(this)">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
						<span class="stop" id="repassSpan"></span>
					</div>
					<div class="container-login100-form-btn m-t-32">
						<input class="login100-form-btn" type="submit" value="Submit">
					</div>
					<div class="container-login100-form-btn m-t-32">
						<input class="login100-form-btn" type="RESET" value="RESET">
					</div>
					<br>
					<hr>
					<div class="container-login100-form-btn m-t-32">

							<a class="login100-form-btn" href ="index.html">Go Back</a>

					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>

	<script src="js/main.js"></script>

</body>
</html>