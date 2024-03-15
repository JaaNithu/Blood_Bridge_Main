<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Footer</title>
    <link rel="stylesheet" href="styles.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    />
    <link
      href="//cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    />
  </head>
  <style>
    footer {
  background-color: #8b0000;
  padding: 4rem 1 rem 0 1rem;
  width: 100%;
  display: flex;

  margin-top: 10px;
}
/* .container {
  width: 90%;
  margin: 0 auto;
} */
.container #con1{
  width: 100%;
  margin-left: center;
  color: black;

}

.link:hover {
  color: #380000;
  transition: 0.3s;

}
.link{
  color: #fff;
  text-align: center
  ;

}
#services2 {
  display: flex;
  align-items: center;
  margin-top: 0;
  margin-left: 150px;
  padding: 10px;
}
.col {
  width: 25%;
  height: 100%;
}
.col h1 {
  color: #380000;
  font-family: sans-serif;
  font-size: 2.5rem;
  padding: 2rem;
  margin: 0;
  padding-top: 1rem;
}
.col a {
  text-decoration: none;
  color: #fff;
  display: block;
  font-size: 1.2rem;
  padding-bottom: 1rem;
}
.col p {
  text-decoration: none;
  color: #380000;
  display: block;
  font-size: 1.2rem;
  padding-bottom: 1rem;
}
.card-body h1{
  margin: 0;
  color: #fff;
  text-align: center;
  font-size: 2rem;
}
.card-body p{
  margin: 0;
  color: #fff;
  text-align: justify;
}
@media screen and (max-width: 1200px) {
  .card-body {
    flex-direction: column;
    width: 100%;
    margin: 0;
  }
}

.copyright {
  display: block;
  padding: 2rem 0;
  background-color: #380000;
  text-align: center;
  font-size: 1.2rem;
  color: #fff;
  clip-path: polygon(10% 0%, 94% 0%, 100% 100%, 0% 100%);
  text-decoration: none;
}
.card-title{
  color: #380000;
}
#card {
  text-align: left;
  display: flex;
    flex-direction: column;
}


  </style>
  <body>
    <footer>
      <div class="container align-items-center" id="con1">
        <div class="row" id="services2">
          <div class="col align-self-lg-start">
            <div class="card-body">
              <h1>About us</h1>
              <p>
                Empowering lives, ensuring Hope: Our Blood Banking Management
                System- Your trusted partner in saving lives through efficient
                blood donation and distribution. Together, let's make a
                lifesaving difference.
              </p>
            </div>
          </div>
          
          <div class="col align-self-lg-center">
          <div class="card-body">
            <h1>Follow us</h1>
            <a href="" class="link">Instagram</a>
            <a href="" class="link">Facebook</a>
            <a href="" class="link">Twitter</a>
            <a href="" class="link">Youtube</a>
          </div>
          </div>
          
          <div class="col align-self-lg-end" >
          <div class="card-body" id="card">
            <h1>Address</h1>
            <a href="" class="link" id="card">UWU,Passara, Badulla, Uva, Srilanka</a>
            <a href="" class="link" id="card">bloodbridge99@gmail.com</a>
            <a href="" class="link" id="card">+94 0770521678</a>
          </div>
          </div>

        </div>
        <a href="" class="copyright">&copy; 2024 | Design by Group no.15</a>
      </div>
    </footer>




    <script src="script.js"></script>
  </body>
</html>
