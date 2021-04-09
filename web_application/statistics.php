<!DOCTYPE html>
<html lang="en">
<head>
    <link rel ="stylesheet" type ="text/css" href ="bootstrap.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
    
<body style ='background-color:#ccc'>
<div class = "head">
<P >MOST PUNTUAL STAFF OF THE MONTH </P><div>
<div><br>
<style>
.head{
    background:navy;
    height:90px;
    
}
 a:link{
     color:red;
     text-decoration:none;
     font-family:ebrima;
 }
 a:hover{
     background-color:white;
 }
 a:visited{
     background-color:white;
 }
 P{
     padding-top:30px;
     color:white;
     font-family:ebrima;    
     text-align:center;
    
 }
 </style>

<?php
$day ="";
$db = mysqli_connect('localhost', 'root', '', 'registeration');
if(isset($_GET['month'])){
    $month = $_GET['month'];
    $sql = mysqli_query($db, "select * from staff_record");
    echo "
    <center>
    <table border='0px' style ='font-family:ebrima;background-color:white; border:5px; border-collapse:collapse;' width='30%'>
    
    <tr style='border-bottom:1px solid navy;color:navy '>
    <th style = 'text-align:center;border-right:1px solid navy'>FIRST NAME</th>
    <th style = 'text-align:center'>LAST NAME</th>

    </tr>";
    if($sql){
        while($fetch = mysqli_fetch_assoc($sql)){
            $date= $fetch['todays_date'];
            $day = date('m',strtotime($date));
        }
            if($month == $day){
            $query = mysqli_query($db, "select * from staff_record where puntual ='1'");
            $row = mysqli_num_rows($query);
            
            if($query ){
                if($row >= 1){
                    echo "<i style =color:red>$row records found</i>";
                while($fet = mysqli_fetch_assoc($query)){
                global $id;
                    $id = $fet['staff_id'];
                   
                  
                    $querys = mysqli_query($db, "select * from staff_reg where staff_id = '$id' ");
                    while($fets = mysqli_fetch_assoc($querys)){
                       
                        $sname = $fets['firstname'];
                        $lname = $fets['lastname'];
                        echo "
                    <tr style ='border-right:1px solid white;border-left:1px solid white'>
                   
                  
                    <td align ='center'style='color:navy;border-right:1px solid navy;border-bottom:1px solid navy;'>$sname</td>
                    <td align ='center'style='color:navy;border-bottom:1px solid navy;'>$lname</td>
                  
               
                    </tr>
                    "; 
                    }
                    
                   
                } 
            }else{
                    echo "<i style =color:red>no record found</i>";
                }
               
               
                // if ($t<1583820000){
                 
                // }
                //               // }
            }
            
           }
           else{
            echo "<h style='color:red'>no record for this month yet ! <h>";
           }
        
    
        }
        
echo"</table>";
    
}
?>
</div>
</body>
</html>