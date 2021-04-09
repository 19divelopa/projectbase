<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
 <title>Registration system PHP and MySQL</title>
 <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="head">
                        <div class="link"><a href="admin-login.php">Admin login</a></div>
                         <div class ="heading">Teachers E-Attendant</div>
                    </div>
 <div class="header">
 <h2>Register</h2>
 </div>
 <form method="post" action="register.php">
 <?php include('errors.php'); ?>
 <?php global $message;
 echo $message;
 ?>
 <div class="input-group">
 <label>Firstname</label>
 <input type="text" name="firstname" >
 </div>
 <div class="input-group">
 <label>lastname</label>
 <input type="text" name="lastname" >
 </div>
 <div class="input-group">
 <label>Email</label>
 <input type="email" name="email" >
 </div>
 <div class="input-group">
 <label>Password</label>
 <input type="password" name="password_1" maxlength = "4">
 </div>
 <div class="input-group">
 <label>Confirm password</label>
 <input type="password" name="password_2"maxlength = "4">
 </div>
 <div class="input-group">
 <button type="submit" class="btn" name="reg_user">Register</button>
 </div>
 <p>
 Already a member? <a href="login.php">Sign in</a>
 </p>
 </form>
 <div class ="footer">Developed by Uche Timothy Copyright 2020 @ 19divelopa Inc.<div>
<style>
.footer{
    text-align: center;
    color:navy;
   
    background:white;    
    font-size:15px;
    margin-top:80px;
    padding-top:5px;
    height:50px;    
    font-family: ebrima;
}
</body>
</html>