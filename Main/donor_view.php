<?php
	include"config.php";
	session_start();
    $user_id = $_SESSION['id'];

    if(!isset($user_id)){
       header('location:login.php');
    }
    
	if(!isset($_SESSION["id"]))
	{
		echo"<script>window.open('login.php?mes=Access Denied...','_self');</script>";
		
	}
        $sql="SELECT u.Name,
                    u.Email,
                    u.ID,
                    u.Gender,
                    u.Age,
                    u.Mobile,
                    u.Address,
                    b.Blood_G FROM user u JOIN blood AS b ON u.Blood_ID=b.Blood_ID WHERE u.ID={$_GET["id"]}";
		$res=$connect->query($sql);

		if($res->num_rows>0)
		{
			$row=$res->fetch_assoc();
		}	
  
        if(isset($_POST["submit"]))
        {
            
            $sqr="INSERT INTO `request`(User_ID,Donor_ID,R_msg) VALUES('{$_SESSION["id"]}', '{$row["ID"]}', '{$_POST["request"]}')";
            $connect->query($sqr);
            header('location:findDonor.php');       
       

            
        }
        
        
?>

<!DOCTYPE html>
<html>
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Donor_view</title>
	<link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time(); ?>">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	</head>
	<body>

	
		
	
	<?php include"navbar.php";?><br>
		
   
	<div class="containerdv"> <br> <br> <br>
    <h2 class="dvh">Donor Details</h2><br>
        <div class="section1">
		                       
            <table  class='table table-striped mb-5'>
                                
                <thead>
                    <tr>	
                        <th class="dvth">Name</th>
                    </tr>
                </thead>						
                <tbody>
                    <tr>
                        <td><?php echo $row["Name"] ?> </td>
                    </tr>							
                </tbody>	
                <thead>
                    <tr>	
                        <th>Gender</th>
                    </tr>
                </thead>						
                <tbody>
                    <tr>
                        <td><?php echo $row["Gender"] ?> </td>
                    </tr>							
                </tbody>	
                <thead>
                    <tr>	
                        <th>Age</th>
                    </tr>
                </thead>						
                <tbody>
                    <tr>
                        <td><?php echo $row["Age"] ?> </td>
                    </tr>							
                </tbody>	
                <thead>
                    <tr>	
                        <th>Email </th>
                    </tr>
                </thead>						
                <tbody>
                    <tr>
                        <td><?php echo $row["Email"] ?>  </td>
                    </tr>							
                </tbody>	
                <thead>
                    <tr>	
                        <th>Address</th>
                    </tr>
                </thead>						
                <tbody>
                    <tr>
                        <td><?php echo $row["Address"] ?>  </td>
                    </tr>							
                </tbody>	
                <thead>
                    <tr>	
                        <th>Mobile No</th>
                    </tr>
                </thead>						
                <tbody>
                    <tr>
                        <td><?php echo $row["Mobile"] ?>  </td>
                    </tr>							
                </tbody>	
                <thead>
                    <tr>	
                        <th>Blood Group</th>
                    </tr>
                </thead>						
                <tbody>
                    <tr>
                        <td><?php echo $row["Blood_G"] ?>  </td>
                    </tr>							
                </tbody>	
                
            </table>

           

            <form id="request" action="" method="post" role="form" style="display: block;">
                <div class="form-group">
                                            
                    <div class="form-group">
                      
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <div class="row">
                      
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




