<?php

$errors = array();
// connect to the database
// $db = mysqli_connect('localhost', 'root', '', 'registeration');

  if (isset($_POST['click'])) {
   $staff_id =  $_POST['staff_id'];
   $password =  $_POST['password'];
   if (empty($staff_id)) {
   array_push($errors, "Staff ID is required");
   }
   if (empty($password)) {
   array_push($errors, "Password is required");
   }
   if (count($errors) == 0) {
  
      //$query = "SELECT * FROM adminbase WHERE Admin_id='Uche1' AND password='Uche01'";
      //$results = mysqli_query($db, $query);
      
         // if (mysqli_num_rows($results) == 1) {
            if ($staff_id == 'Uche1' && $password =='4500'){
            header('location: home.php');    
         }
         // }
         else {
          array_push($errors, "Wrong username/password combination");
   }
   }
  }

  ?>