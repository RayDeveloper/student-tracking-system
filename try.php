<?php
$con=mysql_connect("localhost","root","usbw") or die("Could not connect");
mysql_select_db("try") or die("Could not find db!");
$text=$_POST["mytext[]"];

$sql="INSERT INTO info (Data) VALUES ('$text')";
echo "$text";
echo $sql;

if(mysql_query($sql,$con)){
	header('Location:staffhome.php');
}else{
	echo "not inserted";
}
//mysql_close($con);
?>