<?php
session_start();
$errors = array();
$b ="";
$early="";
// connect to the database
$db = mysqli_connect('localhost', 'root1', '', 'registeration');
$message ="";        
$login_message="";
$logout_message="";
$success ="";
$success_message ="";
$daily_result ="";
// REGISTER USER
if (isset($_POST['reg_user'])) {
// receive all input values from the form
 $fname = mysqli_real_escape_string($db, $_POST['firstname']);
 $lname = mysqli_real_escape_string($db, $_POST['lastname']);
 $email = mysqli_real_escape_string($db, $_POST['email']);
 $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
 $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
// form validation: ensure that the form is correctly filled ...
// by adding (array_push()) corresponding error unto $errors array
 if (empty($fname)) { array_push($errors, "firstname is required"); }
 if (empty($lname)) { array_push($errors, "lastname is required"); }
 if (empty($email)) { array_push($errors, "Email is required"); }
 if (empty($password_1)) { array_push($errors, "Password is required"); }
 if ($password_1 != $password_2) {
    array_push($errors, "The two passwords do not match");
 }
 $user_check_query = "SELECT * FROM staff_reg WHERE email ='$email'";
 $result = mysqli_query($db, $user_check_query);
 $user = mysqli_fetch_assoc($result);
 
 if ($user) { // if user exists
 if ($user['email'] === $email) {
   array_push($errors, "email already exists");
}
}
 if (count($errors) == 0) {
    $password = $password_1;
    $random = mt_rand(1, 100);
    $staff_id = 'A'.$random;
    $query = "INSERT INTO staff_reg(staff_id,firstname,lastname, email, password)
    VALUES('$staff_id','$fname','$lname', '$email', '$password')";
    mysqli_query($db, $query);
    $message ="     <div id='message'style='color:green;text-align:center;border:3px solid green;border-radius:9px;
    background-color:#ccc'>
    you have successfully registered your Staff Id is $staff_id 
    please click the sign in link to login using your staff id </div>";

    }
}

// LOGIN USER
if (isset($_POST['login'])) {
   $staff_id = mysqli_real_escape_string($db, $_POST['staff_id']);
   $password = mysqli_real_escape_string($db, $_POST['password']);
  
   if (empty($staff_id)) {
   array_push($errors, "Staff ID is required");
   }
   if (empty($password)) {
   array_push($errors, "Password is required");
   }
   if (count($errors) == 0) {
  
      $query_selct = "SELECT * FROM staff_reg WHERE staff_id='$staff_id' AND password='$password'";
      $results = mysqli_query($db, $query_selct);
      $row = mysqli_fetch_assoc($results);
      $status = $row['statuss'];
      
      $daily_counter = $row['daily_counter'];
         if (mysqli_num_rows($results) == 1) {
            $d=date('Y-m-d');
            $m=date('H:i:s');
            $month=date('m');
            $time_stamp =strtotime($m);
            $e="";
            if($daily_counter == 1){
               $daily_result =  "<h5 style='color:red'>you can't log in and out twice a day please come tomorrow</h5>";
               $query_selct = "SELECT * FROM staff_record WHERE staff_id ='$staff_id'";
               $results = mysqli_query($db, $query_selct);
               $row = mysqli_fetch_assoc($results);
               $status = $row['todays_date'];
               $current_date = date('Y-m-d');           
               if($status != $current_date ){
               $sql_update = mysqli_query($db, "UPDATE `staff_reg` SET `daily_counter`= 0 WHERE `Staff_id` = '$staff_id'");
            }
            }
            else{
               
            if($status==1){
               
               $login_message ="<h5 style ='color:red'>you have logged in before, kindly log out</h5>";
            }
            else{
            $sql_update = mysqli_query($db, "UPDATE `staff_reg` SET `statuss`= 1 WHERE `Staff_id` = '$staff_id'");
            


            $query =  "INSERT INTO `staff_record` (todays_date,current_month,staff_id, morning, evening,time_stamp) 
            VALUES ('$d','$month','$staff_id', '$m','$e','$time_stamp')";
            $run_query = mysqli_query($db, $query);
            $_date = date('H:i:s');
            $date_function =strtotime($_date);
            $mor =strtotime('12:00:00');

            $count =0;
               if($date_function <= $mor ){
               $a = date('H:i:s');
               $b = strtotime('07:00:00');
               $early = strtotime($a);
         
               $success_message ="<h5 style ='color:green;'>good morning  ! </h5>"; 
               } else{
                  $success= "<h5 style = 'color:green'>good day dude !</h5>";
   
               }
            $query_selct = "SELECT * FROM staff_record WHERE staff_id ='$staff_id' AND puntual = '1'";
            $results = mysqli_query($db, $query_selct);
            $rows = mysqli_num_rows($results);
            
            if( $rows >= 1 ){
               $mi = $rows;  
               $num = (int)$mi;   
            
            $query =  "UPDATE staff_record SET counters =$num WHERE staff_id='$staff_id'AND todays_date ='$d'";
            $run_query = mysqli_query($db, $query);
         }
          if ($early <= $b){              
            $query =  "UPDATE staff_record SET puntual ='1' WHERE staff_id='$staff_id'AND todays_date ='$d'";
            $run_query = mysqli_query($db, $query);
         }
         else{              
            $query =  "UPDATE staff_record SET puntual ='0' WHERE staff_id='$staff_id'AND todays_date ='$d'";
            $run_query = mysqli_query($db, $query);
         }
           

            }
           
                     
         }
      }
      else {
         array_push($errors, "Wrong username/password combination");
     }
   }

}
        
          
          
               

   
 
  //LOGOUT BUTTON
  if (isset($_POST['logout'])) {
   $staff_id = mysqli_real_escape_string($db, $_POST['staff_id']);
   $password = mysqli_real_escape_string($db, $_POST['password']);
   if (empty($staff_id)) {
   array_push($errors, "Staff ID is required");
   }
   if (empty($password)) {
   array_push($errors, "Password is required");
   }
   if (count($errors) == 0) {
  
      $query = "SELECT * FROM staff_reg WHERE staff_id='$staff_id' AND password='$password'";
      $results = mysqli_query($db, $query);
         if (mysqli_num_rows($results) == 1) {
           
            $e=date('H:i:s');
            $query =  "UPDATE staff_record SET evening='$e' WHERE staff_id='$staff_id'";
            $run_query = mysqli_query($db, $query);
            $sql_update = mysqli_query($db, "UPDATE `staff_reg` SET `statuss`= 0 WHERE `Staff_id` = '$staff_id'");
            $logout_message= "<h5 style = 'color:green'>good bye!</h5>";
            $sql_update = mysqli_query($db, "UPDATE `staff_reg` SET `daily_counter`= 1 WHERE `Staff_id` = '$staff_id'");
            
         }
         else {
          array_push($errors, "Wrong username/password combination");
   }
   }
  }


  if (isset($_POST['click'])) {
   $staff_id = mysqli_real_escape_string($db, $_POST['staff_id']);
   $password = mysqli_real_escape_string($db, $_POST['password']);
   if (empty($staff_id)) {
   array_push($errors, "Staff ID is required");
   }
   if (empty($password)) {
   array_push($errors, "Password is required");
   }
   if (count($errors) == 0) {
  
      $query = "SELECT * FROM adminbase WHERE Admin_id='Uche1' AND password='Uche01'";
      $results = mysqli_query($db, $query);
         if (mysqli_num_rows($results) == 1) {
            header('location: home.php');    
         }
         else {
          array_push($errors, "Wrong username/password combination");
   }
   }
  }
  ?>