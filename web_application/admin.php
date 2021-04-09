
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