<?php 

$b = strtotime('07:00:00');
echo $b;

$date_function = date('H:i:s');
$c=strtotime($date_function);
echo "<p></p>";
echo $c;

         
echo "<p></p>";
echo $date_function;

echo "<p></p>";
$a = date('H:i:s');
$b = strtotime('07:00:00');
$early = strtotime($a);
echo "<p></p>";
echo $early;
echo "<p></p>";
echo $b;
echo "<p></p>";
$y=date('H:i:s');
$z=strtotime($y);
$o=strtotime('12:54:00');
if($z<=$o){
    echo "good morning";

}
else
    echo"good day";

?>
