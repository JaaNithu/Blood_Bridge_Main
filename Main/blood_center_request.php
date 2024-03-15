<?php

include"config.php";
	session_start();
	
$user_id = $_SESSION['id'];

if(!isset($user_id)){
   header('location:login.php');
}


  
        if(isset($_POST["submit"]))
        {
            
            $sqr="INSERT INTO `request`(User_ID,Donor_ID,R_msg) VALUES('{$_SESSION["id"]}', 67, '{$_POST["request"]}')";
            $connect->query($sqr);
            header('location:findDonor.php');       
       

            
        }
        
        
?>

<!DOCTYPE html>
<html>
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Blood center Request</title>
	<link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time(); ?>">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	</head>
	<body>

	
		
	
	<?php include"navbar.php";?><br>
		
   
	<div class="containerdv"> <br> <br> <br>
    <h2 class="dvh">Request for a blood center</h2><br>
        <div class="section1">
		                       

            <form id="request" action="" method="post" role="form" style="display: block;">
                <div class="form-group">
                                            
                    <div class="form-group">
                        <label> <b> Request </b> </label>
                        <textarea name="request" id="request" tabindex="1" class="form-control" rows="4" placeholder="Type Your Request message here." value="" required></textarea>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <input type="submit" name="submit" id="register-submit" tabindex="4" class="btn-request" value="Send Request">
                        </div>
                    </div>
                </div>	
                <br>					
            </form>


        </div>	
    </div>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
        <?php include("footer.php"); ?>
	</body>
</html>




