<?php

include"config.php";
	session_start();
	
$user_id = $_SESSION['id'];

if(!isset($user_id)){
   header('location:login.php');
}


if(isset($_POST['update'])){

  $update_p_id = $_SESSION["id"];

  $name=mysqli_real_escape_string($connect, $_POST['name']);
  $email=mysqli_real_escape_string($connect, $_POST['email']);


  $sl="SELECT *  FROM blood_centers  WHERE id ='{$_POST['blood_center_id']}'";
	$r=$connect->query($sl);
	$ro=$r->fetch_assoc();
	$id=$ro["blood_center_id"];

 
 


  $otpassword = mysqli_real_escape_string($connect, md5($_POST['opassword']));
  
  if( $otpassword==$_SESSION['password'] ){
	if($_POST['cpassword']=='' && $_POST['password']==''){
		mysqli_query($connect, "UPDATE `user` SET  Name = '$name', Email='$email', Gender='$gender', Age='$age', Mobile='$mobile', Address='$address',Blood_ID='$blood_ID' WHERE ID= '$update_p_id'") or die('query failed');
	}else{
		if($password != $cpassword){
			echo'<script> alert("confirm password not matched!")</script>';
		  }else{
			mysqli_query($connect, "UPDATE `user` SET  Name = '$name', Email='$email', Gender='$gender', Age='$age', Mobile='$mobile', Address='$address',Blood_ID='$blood_ID',Password='$password' WHERE ID= '$update_p_id'") or die('query failed');
		  } 
	}
	
  }else{
   echo'<script> alert ("incorrect password")</script>';
  }
} 
?>
<!DOCTYPE html>
<html>
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>profile</title>
	<link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time(); ?>">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	</head>
	<body>

	
		
	
	<?php include"navbar.php";?>
		
   		
	<div class="containerbd"> <br> 
	<div class="fdsection">	
    <h3 class="dvh"> Update Details </h3> <br>


<section class="update-profile">

<?php

 $update_id = $_SESSION["id"];
   $select_users = mysqli_query($connect, "SELECT u.Name,
   u.Email,
   u.ID,
   u.Gender,
   u.Age,
   u.Mobile,
   u.Address,
   b.Blood_G FROM user u JOIN blood AS b ON u.Blood_ID=b.Blood_ID WHERE u.ID = '$update_id' ") or die('query failed');
                                           
    if(mysqli_num_rows($select_users) > 0){
      while($fetch_users = mysqli_fetch_assoc($select_users)){
?>

<div class="pContainer">
    <div class="pucontainer">
    <form action="" method="post">
 
									<div class="form-group">
										<input type="text" name="name" id="username" tabindex="1" class="form-control" placeholder="Username" value="<?php echo $fetch_users['Name'];?>" required>
									</div>
									<div class="form-group">
										<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email ID" value="<?php echo $fetch_users['Email'];?>" required>
									</div>
									<div class="form-group" >
										<select name="gender" id="gender" required>
										<option value="<?php echo $fetch_users['Gender']; ?>"></option>
											<option value="Male">Male</option>
											<option value="female"> Female </option>
                                    </div>
									<div class="form-group">
										<input type="number" name="age" id="age" tabindex="1" class="form-control" placeholder="Age" value="<?php echo $fetch_users['Age']; ?>" required>
									</div>
									<div class="form-group">
										<input type="tel" name="mobile" id="phoneno" tabindex="1" class="form-control" pattern="[0-9]{3}-[0-9]{7}" maxlength="11"  placeholder="Mobile Number XXX-XXXXXXX" value="<?php echo $fetch_users['Mobile']; ?>" required>
									</div>
                                    <div class="form-group">
										<textarea name="address" id="address" tabindex="1" class="form-control" rows="4" placeholder="Address"><?php echo htmlspecialchars($fetch_users['Address']);?></textarea>
										<!-- <textarea name="details" class="box"> <?php echo htmlspecialchars($fetch_products['Product_Details']);?>  </textarea> -->
  
									</div>
									
									<div class="form-group" >
										<select name="blood" id="blood" required>
										<option value="<?php echo $fetch_users['Blood_G']; ?>" selected hidden> <?php echo $fetch_users['Blood_G']; ?>  </option>
										<?php 
											 $sl="SELECT DISTINCT(Blood_G) FROM blood";
											$r=$connect->query($sl);
												if($r->num_rows>0)
																{
																	echo"<option value=' '>Select</option>";
																	while($ro=$r->fetch_assoc())
																	{
																		echo "<option value='{$ro["Blood_G"]}'>{$ro["Blood_G"]}</option>";
																	}
																}
										?>
                                    </div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="New Password">
									</div>
									<div class="form-group">
										<input type="password" name="cpassword" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm New Password">
									</div> 
									<div class="form-group">
										<input type="password" name="opassword" id="opassword" tabindex="2" class="form-control" placeholder="Old Password" required>
									</div>  <br> 
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="update" id="register-submit" tabindex="4" class="btn-update" value="Update Now"> <br> <br>
											</div>
										</div>
									</div>
								</form>
		
</div>
</div>


<?php
      }
   }else{
      echo 'no profile!! </p>';
   }
?>

</section>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<?php include("footer.php"); ?>
	</body>
</html>