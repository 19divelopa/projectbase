<?php
$db = mysqli_connect('localhost','root','','registeration');
  $query_selct = "SELECT * FROM staff_record WHERE staff_id ='A67' AND puntual = '1'";
  $results = mysqli_query($db, $query_selct);
  $rows = mysqli_num_rows($results);
  echo $rows;


  /*  $puntual ="";
    $query_selct = "SELECT * FROM staff_record ";
    $results = mysqli_query($db, $query_selct);
   //  $row = mysqli_fetch_assoc($results);
   
    while ($rows = mysqli_fetch_array($results)){
       $puntual=$rows['puntual'];
      
   
 $results = mysqli_query($db, $re);
    
}
 }
 */
?>