<?php
	include"config.php";
	session_start();
	$user_id = $_SESSION['id'];

if(!isset($user_id)){
   header('location:login.php');
}
?>

<!DOCTYPE html>
<html>
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Blood Centers Details </title>
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
	
		
	
	<?php include"navbar.php";?> <br> <br>
		
			
	<div class="container-fluid mt-5">
	<h3>Blood Centers Details</h3><br>
		<div class="section">
			<?php
							
				

				$sql="SELECT id,center_name,address,city,
							phone,
							email
							 FROM blood_centers ";

				$re=$connect->query($sql);

					if($re->num_rows>0)
						{
							echo"<table  class='table table-striped mb-5'>
									<thead>
										<tr>
										<th ></th>
										<th >Center Name</th>
										<th >Address</th>
                                        <th >City</th>
										<th >Phone</th>
										<th >Email</th>
										<th >View</th>
										</tr>
									</thead>
													";
				$i=0;
				while($row=$re->fetch_assoc())
				{
					$i++;
						echo  	"<tbody>
										<tr>
										<th >{$i}</th>
										<td>{$row["center_name"]}</td>
										<td>{$row["address"]}</td>
										<td>{$row['city']}</td>
                                        <td>{$row["phone"]}</td>
										<td>{$row['email']}</td>
										<td><a href='blood_center_view.php?id={$row["id"]}' class='btnv'>View</a></td>
										</tr>
								</tbody>
							";			
						}
					}
				else
				{
					echo "No RecordS Found";
				}
					echo "</table>";
				


			?>
    </div>
 </div> <br>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<?php include("footer.php"); ?>
	</body>
</html>




