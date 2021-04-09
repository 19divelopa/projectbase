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
<?php date('H:i:s'); ?>
 </div>
 <form method="post" action="login.php">
 <?php include('errors.php'); ?>
 <?php global $login_message;
 
 global $success;
 echo $success;
 global $success_message;
 
 echo $success_message;
  global $logout_message;
 echo $logout_message;
 echo $login_message;

 global $daily_result;
 echo $daily_result;

 ?>
 <div class="input-group">
 <label>Staff ID</label>
 <input type="text" name="staff_id" maxlength="4">
 </div>
 <div class="input-group">
 <label>Password</label>
 <input type="password" name="password" maxlength="4">
 </div>
 <div class="input-group">
 <button type="submit" class="btn" name="login">Sign in</button>
 </div>
 <div class="input-group">
 <button type="submit" class="ltn" name="logout">Sign out</button>
 </div>
 <p>
 New staff? <a href="register.php">click to register</a>
 </p>
 </form><br>
 <div class ="footer">Developed by Uche Timothy  Copyright 2020 @ 19divelopa Inc.<div>
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
</style>

</body>
</html>