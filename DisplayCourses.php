<?php
require_once("lib/database.php");
$sqlString = '';
$db = FALSE;
$connection = FALSE;
$results = FALSE;
$row = FALSE;
$employee=FALSE;
$level=FALSE;
$value=FALSE;
$hidden_level=FALSE;
// A variable to create an instance of the database class
$db = new DatabaseAdapter("uwi_courses");


$level = isset($_POST['level']) ? $_POST['level'] : '';
echo $_POST['level'];

 $sql="SELECT * FROM Courses WHERE Course_Level like '".$level."' ";
echo($sql);


?>
