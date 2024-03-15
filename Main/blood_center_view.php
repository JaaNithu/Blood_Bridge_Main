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
        $sql="SELECT center_name,
                    address,
                    city,
                    phone,
                    email,
                    A_positive,
                    A_negative,
                    B_positive,
                    B_negative,
                    AB_positive,
                    AB_negative,
                    O_positive	,
                    O_negative  FROM blood_centers WHERE id={$_GET["id"]}";
		$res=$connect->query($sql);

		if($res->num_rows>0)
		{
			$row=$res->fetch_assoc();
		}	
     
        if(isset($_POST["submit"]))
        {
            
            $sqr="DELETE FROM `blood_centers` WHERE id='{$row["ID"]}'";
            
            $connect->query($sqr);
            $connect->query($sq);
            header('location:login.php');
            
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
    <h3 > Blood Center Details</h3><br>
        <div class="section1">
		
					
           
                        
            <table  class='table table-striped mb-5'>
                                
                <thead>
                    <tr>	
                        <th>Name</th>
                    </tr>
                </thead>						
                <tbody>
                    <tr>
                        <td><?php echo $row["center_name"] ?> </td>
                    </tr>							
                </tbody>	
                <thead>
                    <tr>	
                        <th>Address</th>
                    </tr>
                </thead>						
                <tbody>
                    <tr>
                        <td><?php echo $row["address"] ?> </td>
                    </tr>							
                </tbody>	
                <thead>
                    <tr>	
                        <th>City</th>
                    </tr>
                </thead>						
                <tbody>
                    <tr>
                        <td><?php echo $row["city"] ?> </td>
                    </tr>							
                </tbody>	
                <thead>
                    <tr>	
                        <th>Email </th>
                    </tr>
                </thead>						
                <tbody>
                    <tr>
                        <td><?php echo $row["email"] ?>  </td>
                    </tr>							
                </tbody>	
                <thead>
                    <tr>	
                        <th>Phone</th>
                    </tr>
                </thead>						
                <tbody>
                    <tr>
                        <td><?php echo $row["phone"] ?>  </td>
                    </tr>							
                </tbody>	
                <thead>
                    <tr>	
                        <th>A_positive Quantity</th>
                    </tr>
                </thead>						
                <tbody>
                    <tr>
                        <td><?php echo $row["A_positive"] ?>  </td>
                    </tr>							
                </tbody>	
                <thead>
                    <tr>	
                        <th>A_negative Quantity</th>
                    </tr>
                </thead>						
                <tbody>
                    <tr>
                        <td><?php echo $row["A_negative"] ?>  </td>
                    </tr>							
                </tbody>	
                <thead>
                    <tr>	
                        <th>B_positive Quantity</th>
                    </tr>
                </thead>						
                <tbody>
                    <tr>
                        <td><?php echo $row["B_positive"] ?>  </td>
                    </tr>							
                </tbody>	
                <thead>
                    <tr>	
                        <th>B_negative Quantity</th>
                    </tr>
                </thead>						
                <tbody>
                    <tr>
                        <td><?php echo $row["B_negative"] ?>  </td>
                    </tr>							
                </tbody>	
                <thead>
                    <tr>	
                        <th>AB_positive Quantity</th>
                    </tr>
                </thead>						
                <tbody>
                    <tr>
                        <td><?php echo $row["AB_positive"] ?>  </td>
                    </tr>							
                </tbody>	
                <thead>
                    <tr>	
                        <th>AB_negative Quantity</th>
                    </tr>
                </thead>						
                <tbody>
                    <tr>
                        <td><?php echo $row["AB_negative"] ?>  </td>
                    </tr>							
                </tbody>	
                <thead>
                    <tr>	
                        <th>O_positive Quantity</th>
                    </tr>
                </thead>						
                <tbody>
                    <tr>
                        <td><?php echo $row["O_positive"] ?>  </td>
                    </tr>							
                </tbody>	
                <thead>
                    <tr>	
                        <th>O_negative Quantity</th>
                    </tr>
                </thead>						
                <tbody>
                    <tr>
                        <td><?php echo $row["O_negative"] ?>  </td>
                    </tr>							
                </tbody>	
            </table>

           
        </div>	
    </div> <br>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<?php include("footer.php"); ?>
	</body>
</html>



