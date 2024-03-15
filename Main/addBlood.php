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
	<title> Add_blood </title>
	<link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time(); ?>">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
			
         <h3 >Add Blood Group</h3><br>
		 <div class="section2">
			<?php
				if(isset($_POST["submit"])) {
				$filter_bgroup = filter_var($_POST['blood'], FILTER_SANITIZE_STRING);
				$bgroup = mysqli_real_escape_string($connect, $filter_bgroup);
				{
					$select_bgroup = mysqli_query($connect, "SELECT * FROM `blood` WHERE Blood_G = '$bgroup'") or die('query failed');

					if(mysqli_num_rows($select_bgroup) > 0){
					  echo'<script> alert ("Blood group already exist!")</script>';
					}else{
					$sqr="INSERT INTO `blood` (Blood_G) VALUES('{$_POST['blood']}')";
					$connect->query($sqr);}
					
				}
			}
            ?>
		 	<form id="register-form" action="" method="post" role="form" >
			 	<div class="form-group">
					<label>Enter Blood Group</label>
					<input type="text" name="blood" id="blood" tabindex="2" class="form-control" required>
				</div> <br>
				<div class="form-group">
					<div class="row">
						<div class="col-sm-6 col-sm-offset-3">
							<input type="submit" name="submit" id="register-submit" tabindex="4" class="babtn" value="Add Blood Group">
						</div>
					</div>
				</div>
			</form>	
			</br>
			</br>
			</br>

			<?php
				$sql="SELECT * FROM blood";
				$re=$connect->query($sql);
				if($re->num_rows>0)
						{
						echo"<table  class='table table-striped mb-5'>
							<thead>
								<tr>
									<th >B.No</th>
									<th >Blood Group</th>
									<th >Action</th>
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
										<td>{$row["Blood_G"]}</td>
										<td><a href='blood_delete.php?id={$row["Blood_ID"]}' class='btnrb'>Remove</a></td>
										</tr>
								</tbody>
							";			
						}
					}
				else
				{
					echo "No record Found";
				}
					echo "</table>";
				


			?>


			


    	</div>	
    </div>	
			
			

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<?php include("footer.php"); ?>
	</body>
</html>




