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
	<title> Find_Donor </title>
	<link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time(); ?>">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<?php include"navbar.php";?>
	</head>
	<style>
	body{
		background-image:url('images/k12.jpg');
		background-repeat:no-repeat;
		background-attachment:fixed;
		background-size:100% 100%;		
	}
</style>
	<body>			
	<div class="containerfd">
		<div class="fdsection">
			<form  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
<br>
<h2> We Help You To Find The Best - Matched Blood Donors. </h2> <br>
<p class="fdp"> You can select the blood group type what you need from the list and can find donors from the same blood group.  </h2>

<p class= "fdh"> In living donation, <br>
<ul class="fdul">
<li>Recipients with blood type O can receive a Blood from blood type O only </li>
<li>Recipients with blood type A can receive a Blood from blood types A and O </li>
<li>Recipients with blood type B can receive a Blood from blood types B and O </li>
<li>Recipients with blood type AB can receive a Blood from blood types A, B, AB and O <br>
 (AB is the universal recipient: recipients with AB blood are compatible with any other blood type) </li> </ul> </p> <br>
				<p class= "fdh"> select the Blood Group you need: </<p> <br> <br>
					<select name="blood" required class="fdbg"> 		
					<?php 
						 $sql="SELECT DISTINCT(Blood_G) FROM blood";
						 $re=$connect->query($sql);
							if($re->num_rows>0)
								{
									echo"<option value='' hidden>  select </option>";
									while($r=$re->fetch_assoc())
									{
										echo "<option value='{$r["Blood_G"]}'>{$r["Blood_G"]}</option>";
									}
								}
					?>	
					
					
				
				</select>
				<button type="submit" class="fdbtn" name="view"> Click Here To View about the Donor Details</button>
				
				<br><br>
				
			</form>			
					
		
			<?php
							if(isset($_POST["view"]))
							{

								echo "<h4>Donor Details</h4><br>";
								$sl="SELECT DISTINCT(Blood_ID) FROM blood  WHERE Blood_G ='{$_POST['blood']}'";
								$r=$connect->query($sl);
								$ro=$r->fetch_assoc();
							
								$sql="select * from user where Blood_ID='{$ro["Blood_ID"]}' AND isDonor=1";
								$re=$connect->query($sql);
								if($re->num_rows>0)
								{
									echo"<table  class='table table-striped mb-5'>
									<thead>
										<tr>
										<th >D.No</th>
										<th >Name</th>
										<th >Gender</th>
										<th >Blood Group</th>
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
										<td>{$row["Name"]}</td>
										<td>{$row["Gender"]}</td>
										<td>{$_POST['blood']}</td>
										<td><a href='donor_view.php?id={$row["ID"]}' class='btnv'>View</a></td>
										</tr>
								</tbody>
							";			
						}
					}
				else
				{
					
					echo "No records Found";
					
				}
					echo "</table>";
				}


			?>
    	</div>
    </div>

		
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		
	<br><?php include("footer.php"); ?>
	</body>
</html>




