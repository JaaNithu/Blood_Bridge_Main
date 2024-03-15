<?php
    include "config.php";
    session_start();
    
    $user_id = $_SESSION['id'];

    if (!isset($user_id)) {
        header('location:login.php');
    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Add_blood_center </title>
	<link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time(); ?>">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
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


<!-- Include navbar -->
<?php include "navbar.php"; ?>

<div class="container-fluid mt-5">
    <h3>Add Blood Center</h3><br>
    <div class="section2">
        <?php
            if (isset($_POST["submit"])) {
                $center_name = mysqli_real_escape_string($connect, $_POST['center_name']);
                $address = mysqli_real_escape_string($connect, $_POST['address']);
				$city = mysqli_real_escape_string($connect, $_POST['city']);
				$phone = mysqli_real_escape_string($connect, $_POST['phone']);
                $email = mysqli_real_escape_string($connect, $_POST['email']);
				$A_positive = (float)$_POST['A_positive'];
                $A_negative = (float)$_POST['A_negative'];
                $B_positive = (float)$_POST['B_positive'];
                $B_negative = (float)$_POST['B_negative'];
                $AB_positive = (float)$_POST['AB_positive'];
                $AB_negative = (float)$_POST['AB_negative'];
                $O_positive = (float)$_POST['O_positive'];
                $O_negative = (float)$_POST['O_negative'];

                $insert_query = "INSERT INTO blood_centers (id,center_name, address,city, phone, email, A_positive, A_negative, B_positive, B_negative, AB_positive, AB_negative, O_positive, O_negative) 
                        VALUES ('" . mysqli_real_escape_string($connect, $_SESSION['id']) . "','$center_name', '$address', '$city', '$phone', '$email', $A_positive, $A_negative, $B_positive, $B_negative, $AB_positive, $AB_negative, $O_positive, $O_negative)";
                if (mysqli_query($connect, $insert_query)) {
                    echo '<script> alert("Blood center added successfully!"); </script>';
                } else {
                    echo '<script> alert("Error: ' . mysqli_error($connect) . '"); </script>';
                }
            }
        ?>

        <form id="register-form" action="" method="post" role="form">
            <div class="form-group">
                <label>Enter Center Name</label>
                <input type="text" name="center_name" class="form-control" required>
            </div><br>

            <div class="form-group">
                <label>Enter Address</label>
                <input type="text" name="address" class="form-control" required>
            </div><br>
			<div class="form-group">
                <label>Enter City</label>
                <input type="text" name="city" class="form-control" required>
            </div><br>
            <div class="form-group">
                <label>Phone</label>
                <input type="tel" name="phone" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
			<div class="form-group">
                <label>A+ Quantity</label>
                <input type="number" step="0.01" name="A_positive" class="form-control" required>
            </div>

			<div class="form-group">
                <label>A- Quantity</label>
                <input type="number" step="0.01" name="A_negative" class="form-control" required>
            </div>
			<div class="form-group">
    <label>B+ Quantity</label>
    <input type="number" step="0.01" name="B_positive" class="form-control" required>
</div>

<div class="form-group">
    <label>B- Quantity</label>
    <input type="number" step="0.01" name="B_negative" class="form-control" required>
</div>

<div class="form-group">
    <label>AB+ Quantity</label>
    <input type="number" step="0.01" name="AB_positive" class="form-control" required>
</div>

<div class="form-group">
    <label>AB- Quantity</label>
    <input type="number" step="0.01" name="AB_negative" class="form-control" required>
</div>

<div class="form-group">
    <label>O+ Quantity</label>
    <input type="number" step="0.01" name="O_positive" class="form-control" required>
</div>

<div class="form-group">
    <label>O- Quantity</label>
    <input type="number" step="0.01" name="O_negative" class="form-control" required>
</div>
            <div class="form-group m-3">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <input type="submit" name="submit" class="babtn" value="Add Blood Center">
                    </div>
                </div>
            </div>
        </form>

      
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<?php include("footer.php"); ?>
	</body>
</html>