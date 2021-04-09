<!DOCTYPE html>
<html lang="en">
<head>
    <link rel ="stylesheet" type ="text/css" href ="bootstrap.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<div style ="font-size:10px;background:white;color:navy;">
<a href="admin-login.php" style = "text-decoration:none;color:navy;width:50px;">back</a></div>  
<div class = "head">
<p style="color:white;text-align:center;padding-top:30px;font-family:ebrima;">STAFF PUNTUALITY AND AWARD SYSTEM  </p>
</div>

<br>

<style>
body{
    background:#D8D8D8 ;
}
.content{
    
}
h3{
    text-align:center;
    color:white;
    font-family:ebrima;
    text-decoration:underline;
    height:30px;
}
.head{
    background:navy;
    height:90px;
}

</style>
<div class ="content">
<?php

$db = mysqli_connect('localhost', 'root', '', 'registeration');
if(isset($_GET['month'])){
    $month = $_GET['month'];
    $day = '';
    $sql = mysqli_query($db, "select * from staff_record");
    echo "
    <center>
    <table border='0.9px' style ='font-family:ebrima;background-color:#F8F8F8;color:navy;border-collapse:collapse;' width='80%'>
    
    <tr style = 'border:0.9px solid gray'>
    <th style ='text-align:center'>Date</th>
    <th style ='text-align:center'>Staff ID</th>
    <th style ='text-align:center'>Sign in</th>
    <th style ='text-align:center'>Sign out</th>
    </tr>";
    if($sql){
        while($fetch = mysqli_fetch_assoc($sql)){
            $date= $fetch['todays_date'];
            $day = date('m',strtotime($date));
        }

            if($month == $day){
            $query = mysqli_query($db, "select * from staff_record where current_month = $month");
            if($query){
                while($fet = mysqli_fetch_assoc($query)){
                    $today = $fet['todays_date'];
                    $id = $fet['staff_id'];
                    $login = $fet['morning'];
                    $logout = $fet['evening'];

                    echo "
                    <tr style = 'border:0.9px solid gray'>
                    <td align ='center'>$today</td>
                    <td align ='center'>$id</td>
                    <td align ='center'>$login</td>
                    <td align ='center'>$logout</td>
                    </tr>
                    ";
                    
                }
            }
            
        }
        echo"</table>";
    if($month!=$day){
   echo "<p style = color:red> oops! No record found </p>";
    }  
    else {
        echo "
        
<h4>click the current month to see most puntual of the month</h4>
<style>
    a:link{
        color:white;
        text-decoration:none;
    }
    a:hover{
        color:red;
    }
    a:visited{
        color:yellow;
    }
    h4{
        text-align:center;
        color:red;
        font-size:17px;
        font-family:ebrima;
    }
    </style>
<div class='display' style ='background:navy;text-align:center;margin-left:80px;margin-right:80px'>
    
    <a href='statistics.php?month=01'>Jan</a>
    <a href='statistics.php?month=02'>Feb</a>
    <a href='statistics.php?month=03'>Mar</a>
    <a href='statistics.php?month=04'>Apr</a>
    <a href='statistics.php?month=05'>May</a>
    <a href='statistics.php?month=06'>Jun</a>
    <a href='statistics.php?month=07'>Jul</a>
    <a href='statistics.php?month=08'>Aug</a>
    <a href='statistics.php?month=09'>Sep</a>
    <a href='statistics.php?month=10'>Oct</a>
    <a href='statistics.php?month=11'>Nov</a>
    <a href='statistics.php?month=12'>Dec</a>

    
</div>";
    }
        
}    

}
    ?>
</div>

</body>
</html>