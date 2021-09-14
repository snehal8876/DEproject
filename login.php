<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registetion for clinet here..</title>
  <!-- <link rel="icon" href="/main.jpg"> -->
  <link rel="stylesheet" href="login.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
  <?php
     include 'registation.php';
     if(isset($_POST['submit'])){
       $email = $_POST['login_email'];
       $password =  $_POST['login_passwrod'];
       $email_search ="select * from registation where email=' $email'";
       $query =mysqli_query($con,$email_search);
       $email_count =mysqli_num_rows($query);
       if( $email_count){
         $email_pass = mysqli_fetch_assoc($query);
         $db_pass =$email_pass['password'];


         $pass_decode = password_verify($password ,$db_pass);
         if($pass_decode){
                  echo "login successfully";
                  ?>
<script>
  location.replace("dashboard.html");
</script>

                  <?php
         }
         else{
       ?>
       <script>
alert("password incorrect");
</script>
       <?php
         }
        }else{
           echo "Invalid Email";
         }
     }
  ?>
  <nav>
    <input type="checkbox" id="nav-toggle">
    <div class="logo">Home Maintances Services</div>
    <ul class="links">

      <li><a href="homepage.html"> Home</a></li>
      <li><a href="services.html">Our Services</a></li>
      <li><a href="registationpage.php">Registation</a></li>
      <li><a href="#Blogs">Blogs</a></li>
      <li><a href="contact.html">Contact Us</a></li>
    </ul>
    <label for="nav-toggle" class="icon-burger">

      <div class="line"></div>
      <div class="line"></div>
      <div class="line"></div>
    </label>
  </nav>
  <div class="box">
  <div class="box-center">
  <h1>Login</h1>
  <form action="<?php htmlentities($_SERVER['PHP_SELF']); ?>"  class="input-group "  method="POST">
    <i class="fa fa-envelope"></i>
    <input type="email"  class="input-field"  name="login_email" id="" placeholder="Email ID">
    <i class="fa fa-lock"></i>
    <input type="password" class="input-field" name="login_passwrod" id="" placeholder="Password">
         <div class="passwordf">
           Forgot Password?
         </div>
     <button type="submit" name="submit" class="submit-btn">Login</button>
    </form>
    <h4>you have not account? <a href="registationpage.php">Registration</a></h4>
  </div>
</div>


<div class="footer">
  <p>hdshsdfkjdfsjkdfsjkdjk</p>
</div>
</body>
</html>
