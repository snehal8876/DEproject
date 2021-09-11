<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registation | Here</title>
    <link rel="stylesheet" href="registation.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
<?php
  include 'registation.php';
if(isset($_POST['submit']))
{
  $username=mysqli_real_escape_string($con,$_POST['Rusername']);
  $email=mysqli_real_escape_string($con,$_POST['Remail']);
  $moblie=mysqli_real_escape_string($con,$_POST['Rnumber']);
  $password=mysqli_real_escape_string($con,$_POST['Rpassword']);
  $pass=password_hash($password,PASSWORD_BCRYPT);
  $emailquery="select * from registation where email=' $email'";
  $query=mysqli_query($con,$emailquery);
  $emailcount=mysqli_num_rows($query);
 if( $emailcount>0)
{
  ?>
  <script>
      alert("Email is already Exist ");
  </script>
  <?php
}
else
{
  if($password)
  {
$insertquery="insert into registation(username, email, moblie, password) values('$username',' $email','$moblie','$pass') ";
$iquery=mysqli_query($con,$insertquery);
if($iquery){
  ?>
  <script>
      alert("succesfully");
  </script>
  <?php
}
else
{
  ?>
  <script>
      alert("no succesfully ");
  </script>
  <?php
}
  }
}
}
?>
 <nav>
    <input type="checkbox" id="nav-toggle">
    <div class="logo">Home Maintances Services</div>
    <ul class="links">

      <li><a href="homepage.html"> Home</a></li>
      <li><a href="services.html">Our Services</a></li>
      <li><a href="login.php">Sign In</a></li>
      <li><a href="#Blogs">Blogs</a></li>
      <li><a href="contact.html">Contact Us</a></li>
    </ul>
    <label for="nav-toggle" class="icon-burger">

      <div class="line"></div>
      <div class="line"></div>
      <div class="line"></div>

    </label>
  </nav>
  <Section id="main-contain">
<div class="box">
  <div class="box-2">
    <h1>registration Account </h1>
    <h4 class="text-heading">Get Started with your free account</h4>
<form id="register" class="input-group " action="<?php htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">

<i class="fa fa-user"></i> <input type="text" class="input-field" id="rname" name="Rusername" placeholder= " User Name" required>
    <i class="fa fa-envelope"></i>
    <input type="email" class="input-field " id="remail" name="Remail" placeholder="Enter Your Email-ID" required>
    <i class="fa fa-phone-alt"></i>
   <input type="text" class="input-field"  id="rnumber"name="Rnumber" placeholder="Enter You Phone Number"required>
    <i class="fa fa-lock"></i>
 <input type="password" class="input-field" id="rpassword" name="Rpassword" placeholder="Enter Your Password"required >
   <input type="checkbox" class="check-box"><span>I agree to The Terms & Conditions.</span>
    <button type="submit" name="submit" class="submit-btn">Register</button>
    <h4>Have an account? <a href="login.php">Log In</a></h4>
    
      </form>
       
     
</div>

      </section>
</body>
</html>