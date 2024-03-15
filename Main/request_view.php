<?php
    include "config.php";
    session_start();
    
    $user_id = $_SESSION['id'];

    if (!isset($user_id)) {
        header('location:login.php');
    }

    if (!isset($_SESSION["id"])) {
        echo "<script>window.open('login.php?mes=Access Denied...','_self');</script>";
    }

    $sql = "SELECT u.Name,
                    u.Email,
                    u.ID,
                    u.Gender,
                    u.Age,
                    u.Mobile,
                    u.Address,
                    b.Blood_G,
                    r.R_msg  
            FROM request r 
            JOIN (user u JOIN blood AS b ON u.Blood_ID=b.Blood_ID) ON r.User_ID=u.ID 
            WHERE r.R_ID={$_GET["id"]}";

    $res = $connect->query($sql);

    if ($res->num_rows > 0) {
        $row = $res->fetch_assoc();
    }   

    if (isset($_POST["submit"])) {
        $user_id = $row["ID"];

        $update_query = "UPDATE user SET isBloodcenter = 1 WHERE ID = '{$user_id}'";

        if ($connect->query($update_query)) {
            // // Successfully updated the isBloodcenter status
            $delete_request_query = "DELETE FROM `request` WHERE User_ID = '{$row["ID"]}'";

            if ($connect->query($delete_request_query)) {
                // Successfully deleted the request
                header('location: login.php');
            } else {
                // Error deleting the request
                echo "Error deleting request: " . $connect->error;
            }
        } else {
            // Error updating isBloodcenter status
            echo "Error updating isBloodcenter status: " . $connect->error;
        }
    }
?>      


<!DOCTYPE html>
<html>
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Request_View</title>
	<link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time(); ?>">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	</head>
	<body>

	<style>
	body{
		background-image:url('images/k12.jpg');
		background-repeat:no-repeat;
		background-attachment:fixed;
		background-size:100% 100%;		
	}
</style>
		
	
	<?php include"navbar.php";?><br> <br>
		
   
	<div class="container-fluid mt-5">
    <h3 > Recipient Details</h3><br>
        <div class="section1">
		
					
           
                        
            <table  class='table table-striped mb-5'>
                                
                <thead>
                    <tr>	
                        <th>Name</th>
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
                <thead>
                    <tr>	
                        <th>Request</th>
                    </tr>
                </thead>						
                <tbody>
                    <tr>
                        <td><?php echo $row["R_msg"] ?>  </td>
                    </tr>							
                </tbody>	
                
            </table>

           

            <form id="request" action="" method="post" role="form" style="text-align:right;">
                
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <input type="submit" name="submit" id="register-submit" tabindex="4" class="Accbtn" value="Accept"> <br>
                        </div>
                    </div>
                </div>						
            </form>

        </div>	
    </div> <br>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<?php include("footer.php"); ?>
	</body>
</html>



