<?php include('admin_backend.php') ?>
<!DOCTYPE html>
<html>
<head>
 <title>Registration system PHP and MySQL</title>
 <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="head">
                        <div class="link"><a href="login.php">HomePage</a></div>
                         <div class ="heading">Admin login</div>
 </div>
 <div class="header">
 
 </div>
 <form method="post" action="admin-login.php">
 <?php include('errors.php'); ?>
 <div class="input-group">
 <label>Admin ID</label>
 <input type="text" name="staff_id" >
 </div>
 <div class="input-group">
 <label>Password</label>
 <input type="password" name="password">
 </div>
 <div class="input-group">
 <button type="submit" class="btn" name="click">Login</button>
 </div>

 </form><br><br><br>
 
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
</style>
</body>
</html>