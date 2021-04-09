<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>


<body>
<div style ="font-size:10px;background:white;color:navy;">
<a href="admin-login.php" style = "text-decoration:none;color:navy;width:50px;">back</a></div>  
<style>
.head{
    background-color:navy;
    height:100px;
    width: 100%;
 
    
}
</style>
<div class = "head">
<p style="color:white;text-align:center;padding-top:30px;">STAFF PUNTUALITY AND AWARD SYSTEM  </p>
</div>
<div class ="record">

<?php
$db = mysqli_connect('localhost', 'root', '', 'registeration');
 $date = date('Y-m-d');
 $month = date('m',strtotime($date));
 $m = (int)$month; 

$query = "SELECT DISTINCT staff_id,counters FROM staff_record WHERE current_month ='$m' AND puntual = '1'";
$execute = mysqli_query($db,$query);
$row = mysqli_num_rows($execute);

if ($row){
    echo "
    <center>
    <table border='0.2px' width = '70%'>
    <tr>
    <th> Staff ID </th>
    <th> Frequency </th>
    <th> Percentage </th>
    <th> Salary </th>
    <tr>
   
    ";
    while($rows = mysqli_fetch_array($execute)){
        $staff_id = $rows['staff_id'];
        $puntual = $rows['counters'];
        $counter = 1;
        $result = $counter+=$puntual;
        $percentage = ($result / 30 ) * 100;
        $converter = (int)$percentage;
        $salary = "";
        $sal ="";
            if ($result >= 15){
                
                $salary = 15000;
            }
            elseif($result >= 10 && $result <=15  ){
                $salary = 14500;
            }
            elseif ($result < 10 && $result >=5  ) {
                $salary= 14250;
            }
            else{
                $salary = 14000;
            }
            if ($converter >= 15){
                
                $sal ="<c style=' color:green'>$converter%<c>"." <div style='text-size:30px;background:green;height:9px;width:50px;'><div>";
            }
            elseif($converter >= 10 && $converter <=15  ){
                $sal = "<c style='red'>$converter%<c>"." <div style='text-size:30px;background:yellow;height:9px;width:42px;'><div>";
            }
            elseif ($converter <= 10 && $converter >=5  ) {
                $sal=  "<c style='red'>$converter%<c>"." <div style='text-size:30px;background:blue;height:9px;width:39px;'><div>";
            }
            else{
                $sal = "<c style='color:black'>$converter%<c>"." <div style='text-size:30px;background:red;height:9px;width:20px;'><div>";
            }
        echo"<tr style ='background:#F8F8F8 ;color:green;border-radius:5px;'>
        <td align= 'center'> $staff_id</td> 
        <td align= 'center'>$result </td>
        <td align= 'center'>$sal </td>
        <td align= 'center'> $salary </td>
            </tr> ";
        
    }

    echo "</table>";
    echo "</center>";
}



?>

</div>

</body>
</html>

