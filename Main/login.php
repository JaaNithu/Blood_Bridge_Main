<?php

@include 'config.php';

session_start();

if(isset($_POST['log'])){

   $filter_email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
   $email = mysqli_real_escape_string($connect, $filter_email);
   $filter_password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
   $password = mysqli_real_escape_string($connect, md5($filter_password));

   $select_users = mysqli_query($connect, "SELECT * FROM `user` WHERE Email = '$email' AND Password = '$password'") or die('query failed');


   if(mysqli_num_rows($select_users) > 0){
	$row = mysqli_fetch_assoc($select_users);
      if($row['isAdmin']==1){
		

		$_SESSION['isAdmin'] = $row['isAdmin'];
		$_SESSION['isDonor'] = $row['isDonor'];
		$_SESSION['isBloodcenter'] = $row['isBloodcenter'];
		$_SESSION['id'] = $row['ID'];
		$_SESSION['email'] = $row['Email'];
		$_SESSION['password'] = $row['Password'];
		header('location:user.php');
	  }else{
    

         $_SESSION['isAdmin'] = $row['isAdmin'];
         $_SESSION['isDonor'] = $row['isDonor'];
		 $_SESSION['isBloodcenter'] = $row['isBloodcenter'];
         $_SESSION['id'] = $row['ID'];
         $_SESSION['email'] = $row['Email'];
         $_SESSION['password'] = $row['Password'];
         header('location:home.php');
	}
      
   }else{
	echo'<script> alert ("incorrect email or password")</script>';
   }

}



if(isset($_POST['regsubmit'])){

   $filter_name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
   $name = mysqli_real_escape_string($connect, $filter_name);

   $filter_email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
   $email = mysqli_real_escape_string($connect, $filter_email);

   $filter_gender = filter_var($_POST['gender'], FILTER_SANITIZE_STRING);
   $gender = mysqli_real_escape_string($connect, $filter_gender);

   $filter_age = filter_var($_POST['age'], FILTER_SANITIZE_STRING);
   $age = mysqli_real_escape_string($connect, $filter_age);

   $filter_mobile = filter_var($_POST['mobile'], FILTER_SANITIZE_STRING);
   $mobile = mysqli_real_escape_string($connect, $filter_mobile);

   $filter_address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
   $address = mysqli_real_escape_string($connect, $filter_address);

   $filter_password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
   $password = mysqli_real_escape_string($connect, md5($filter_password));

   $filter_cpassword = filter_var($_POST['cpassword'], FILTER_SANITIZE_STRING);
   $cpassword = mysqli_real_escape_string($connect, md5($filter_cpassword));

   $sl="SELECT DISTINCT(Blood_ID) FROM blood  WHERE Blood_G ='{$_POST['blood']}'";
	$r=$connect->query($sl);
	$ro=$r->fetch_assoc();
	$blood_ID=$ro["Blood_ID"];

   $select_users = mysqli_query($connect, "SELECT * FROM `user` WHERE email = '$email'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){
     echo'<script> alert ("user already exist!")</script>';
	  
   }else{
      if($password != $cpassword){
        echo'<script> alert("confirm password not matched!")</script>';
      }else{
         mysqli_query($connect, "INSERT INTO `user`(Name,Email,Gender,Age,Mobile,Address,Password,Blood_ID) VALUES('$name', '$email', '$gender','$age','$mobile','$address','$password','$blood_ID')") or die('query failed');
         echo'<script> alert("registered successfully!")</script>';
      
      }
   }

}



?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login & Register </title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
<script src="js/login.js"></script>

<style>
	body{
		background-image:url('images/log.jpg');
		background-repeat:no-repeat;
		background-attachment:fixed;
		background-size:100% 100%;
	
		
	}
</style>
    
</head>
<body>



<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<!-- <div class="rm">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
										<label for="remember"> Remember Me</label>
									</div> -->
									<br>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="log" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
									<!-- <div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="https://phpoll.com/recover" tabindex="5" class="forgot-password">Forgot Password?</a>
												</div>
											</div>
										</div>
									</div> -->
								</form>
								<form id="register-form" action="" method="post" role="form" style="display: none;">
									<div class="form-group">
										<input type="text" name="name" id="username" tabindex="1" class="form-control" placeholder="Username" value="" required>
									</div>
									<div class="form-group">
										<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email ID" value="" required>
									</div>
									
									
									<div class="form-group" >
										<select name="gender" id="gender" tabindex="1"required>
										<option value="" selected hidden> Gender  </option>
											<option value="Male">Male</option>
											<option value="female"> Female </option>
                                    </div>
									<div class="form-group">
										<input type="number" name="age" id="age" tabindex="1" class="form-control" placeholder="Age" value="" required>
									</div>
                                    <div class="form-group">
										<input type="tel" name="mobile" id="phoneno" tabindex="1" class="form-control" pattern="[0-9]{3}-[0-9]{7}" maxlength="11"  placeholder="Mobile Number XXX-XXXXXXX" value="" required>
									</div>
									<div class="form-group">
									<textarea name="address" id="address" tabindex="1" class="form-control" rows="4" placeholder="Address" value="" required></textarea> <!-- to make placeholder work dont give space between opening and closing tag -->
									</div>
									<div class="form-group" >
										<select name="blood" id="blood" required>
										<option value="" selected hidden> Blood Group  </option>
										<?php 
											 $sl="SELECT DISTINCT(Blood_G) FROM blood";
											$r=$connect->query($sl);
												if($r->num_rows>0)
																{
																	echo"<option value=''>Select</option>";
																	while($ro=$r->fetch_assoc())
																	{
																		echo "<option value='{$ro["Blood_G"]}'>{$ro["Blood_G"]}</option>";
																	}
																}
										?>
                                    </div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" required>
									</div>
									<div class="form-group">
										<input type="password" name="cpassword" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password" required>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="regsubmit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> 
</body>
</html>