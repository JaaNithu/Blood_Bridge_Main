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
	<title> become_donor</title>
	<link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time(); ?>">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	</head>
	<body>

	
		
	
	<?php include"navbar.php";?>		
	<div class="containerbd"> 
	<div class="fdsection">		
		<br>
    <?php
		if(isset($_POST["submit"]))
		{
            
			$sq="UPDATE user SET isDonor = 1 WHERE ID ='{$_SESSION['id']}'";
			$connect->query($sq);
			header('location:login.php');
		}
		?>
						
					<h3 class="bdh"> if you are healthy Person, <br> you may able to donate person to improve their heath or
						 even save someone elses's life. <br>Ready to take the first step? </h3><br>
					<h4>	 Do you meet the Blood donor requirements? </h4> <br>
						 <p class="fdp"> 
						 Before proceeding with blood donation, you must meet certain basic requirements. In general, blood donors must be in good health,
						 meet age and weight criteria, have acceptable hemoglobin levels, and pass a brief medical screening.
<ul class="bdul">
<li>Be 18 years of age or older </li>
<li>No smoking or drinking habits </li>
<li>Adequate hemoglobin levels </li>
<li>Minimum weight (typically around 50 kilograms or 110 pounds) </li>
<li>Good overall health</li>
</ul>

<p class="fdp"> If you want to become a blood donor, you will undergo medical and psychological tests to 
	ensure you're healthy enough to donate blood. You will also go through a series of medical tests 
	at the blood donation center to determine your eligibility and suitability for donation. Before blood donation, you'll have: </p>
 </p>
<ul class="bdul">
<li> Medical History Review </li>
<li> Hemoglobin Test </li>
<li> Blood Pressure Check</li>
<li> Iron Levels Assessment </li>
<li> Temperature Check </li>
<li> Infectious Disease Screening </li>
 </ul>

 <p class="fdp">
 Both the blood donor's and the potential recipient's health are considered when screening blood donors. 
 There are certain medical conditions that can disqualify you from donating blood, such as high blood pressure, diabetes, cancer, HIV, hepatitis, or severe infection. 
 Whether or not the potential donor is a smoker may also be taken into consideration. </p>

  <p class="stmt"> if you agree & submit, you will add to donor list. if your blood group matched, recipients will contact you in future. </p>


<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
 
  <div class="form-check">
  
    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
    <label class="form-check-label" for="exampleCheck1"> <b>I agree </b> </label> <br> <br>
  </div>
  
  <button type="submit" class="btn btn-primary" name="submit"> Submit  </button>
  <br>
  <br>
</form>
					
			
	</div>		
    </div>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		
		
		<?php include("footer.php"); ?>
	</body>
</html>




