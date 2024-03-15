<?php
	include"config.php";
	session_start();



$user_id = $_SESSION['id'];

if(!isset($user_id)){
   header('location:login.php');
}
?>



<!DOCTYPE html>
<html lang="en">
  <head>
 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Home </title>
	<link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time(); ?>">
	<script src="https://kit.fontawesome.com/efee1a3566.js" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <?php include"navbar.php";?><br>	
  </head>
  <style>
  
  section {
  padding: 6%;
  height: 90vh;
  display: flex;
  justify-content: center;
  align-items: center;
  background-image: url(./assets/bgnew.jpg);
  background-size: cover;
  background-repeat: no-repeat;
  margin-top: 50px;
}

.content {
  text-align: center;
  position: relative;
}

.content h2 {
  font-size: 40px;
  color: #380000;
  text-transform: capitalize;
  letter-spacing: 1px;
}

.content p {
  line-height: 1.4;
  font-size: 17px;
  color: #380000;
  margin: 20px 30px;
}
section .content .btn {
  background-color: #8b0000;
  color: #ffffff;
  transition: 0.3s ease;
  text-decoration: none;
}
.btn:hover {
  transform: scale(1.1);
}

#services {
  position: relative;
  display: flex;
  align-items: center;
  flex-wrap: wrap;
  margin-top: 0;
  padding: 30px;
}

#services .card-body1 {
  width: 308px;
  position: relative;
  height: 300px;
  background-color: #e8e8e8;
  margin: 30px 10px;
  padding: 20px 10px;
  display: flex;
  flex-direction: column;
  box-shadow: 0.5px 10px #3e3e3e;
  transition: 0.3s ease-in-out;
  color: #380000;
  text-align: center;
}
.col{
  margin: 40px;
  color: #380000;
}
@media screen and (max-width: 767px) {
  #services .card-body1 {
    flex-direction: column;
    width: 100%;
    margin: 10px 0;
    
  }

}
@media screen and (max-width: 992px) {
  #services .card-body1 {
    flex-direction: column;
    width: 100%;
    margin: 10px 10px;
    
  }
}
@media screen and (max-width: 1200px) {
  #services .card-body1 {
    flex-direction: column;
    width: 100%;
    margin: 10px 20px;
  }
}
@media (max-width: 676px) {
  .box {
    width: 100%;
  }
  .inner-box-top {
    text-align: start;
  }
  .inner-box-top a {
    display: block;
    margin: 1rem 0;
  }
  .box-top {
    width: 100%;
  }
}

#services1 {
  padding: 6%;
  background-image: url(./assets/handshake.jpg);

  background-repeat: no-repeat;
  background-size: cover;
}

.content {
  text-align: center;
  position: relative;
}
.content img {
  max-width: 15%;
  align-items: center;
  justify-content: center;
}

.content h2 {
  font-size: 40px;
  color: #380000;
  text-transform: capitalize;
  letter-spacing: 1px;
  text-align: center;
  align-items: center;
}

.content p {
  line-height: 1.4;
  font-size: 20px;
  color: #8b0000;
  margin: 20px 30px;
  align-items: center;
}

.partnership-container {
  display: flex;
  justify-content: space-between;
  justify-content: center;
  width: 100%;
  margin: auto;
  align-items: center;
}

.partner-logo {
  max-width: 100px;
  height: auto;
  margin: 0 10px;
}
</style>
  <body>
 

    <section>
      <div class="content">
        <h2>Connecting Communities, Improving Healthcare, Changing Lives</h2>
        <p>
          Srilanka's Blood Centers is the national association of independent,
          community. Blood centers dedicated to proving a safe and available
          blood supply for every patient in need.
        </p>
        <a href="/BloodBridge/aboutus.php" class="btn">More about Blood Bridge</a>
      </div>
    </section>

    
      <div class="row" id="services">
        <div class="col align-self-lg-start">
          <div class="card-body1">
            <h1 class="card-title text-center">60%</h1>
            <h3 class="card-title text-center">of Blood collection</h3>
            <p>
              independent blood centers collect more than half of the U.S and 25%
              of the Canadian blood supply, serving more than 150 million people.
            </p>
          </div>
        </div>
        <div class="col align-self-lg-center">
          <div class="card-body1">
            <h1 class="card-title text-center">3000</h1>
            <h3 class="card-title text-center">Daily Donation Needed</h3>
            <p>
              our members are working to help bring in the 30000 blood donations
              that are needed every day to meet patient needs. These life saving
              donations support everything.
            </p>
          </div>
        </div>
        <div class="col align-self-lg-end">
          <div class="card-body1">
            <h1 class="card-title text-center">60+</h1>
            <h3 class="card-title text-center">donar facilities</h3>
            <p>
              independent blood centers collect more than half of the Srilanka,
              serving more than 150 million people and 3,500 hospitals and
              healthcare facilities.
            </p>
          </div>
        </div>
      </div>
    

    <div class="content" id="services1">
      <h2>Partnerships</h2>
      <img
        src="./assets/AdobeStock_428807419_Preview-removebg-preview.png"
        alt=" "
      />
      <p>
        <strong>
          We collaborate with many organizations who help strengthen the blood
          supply and promote blood donation including. Srilanka's Blood Centers
          collaborates with organizations who help strengthen our nation’s blood
          supply and promote the importance of blood donation. Below are just
          some of ABC’s partners in this important work</strong
        >
      </p>
      <div class="partnership-container">
        <img
          src="./assets/Hospital-Logo-removebg-preview.png"
          alt="Brand 1"
          class="partner-logo"
        />
        <img src="./assets/partners.png" alt="Brand 2" class="partner-logo" />
        <img src="./assets/sponsors.png" alt="Brand 3" class="partner-logo" />
        <img
          src="./assets/CBS_Logo_descriptors_RGB-WhiteBG.svg"
          alt="Brand 3"
          class="partner-logo"
        />
        <img
          src="./assets/HOSA-logo.jpg-ezgif.com-webp-to-png-converter.png"
          alt="Brand 3"
          class="partner-logo"
        />
      </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
  </body>
</html>
<?php 
include('footer.php')
?>






