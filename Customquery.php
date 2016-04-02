<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta content="utf-8" http-equiv="encoding">

<?php

require_once("lib/database.php");
$sqlString = '';
$db = FALSE;
$connection = FALSE;
$results = FALSE;
$row = FALSE;
$employee=FALSE;

// A variable to create an instance of the database class
$db = new DatabaseAdapter("students");


?>

<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
    <link rel="stylesheet" href="css/admin.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<div id='cssmenu'>
<ul>
   <li ><a href='staffhome.php'><span>Full Listing</span></a></li>
   <li ><a href='findStudent.php'><span>Find a Student</span></a></li>
   <li><a href='addStudent.php'><span>Add A Student</span></a></li>
   <li><a href='EditStudent.php'><span>Edit Student</span></a></li>
   <li ><a href='DeleteStudent.php'><span>Delete a Student</span></a></li>
    <li><a href='addCourse.php'><span>Add Course</span></a></li>
    <li ><a href='DeleteCourse.php'><span>Delete Course</span></a></li>
    <li class='active' ><a href='Customquery.php'><span>Delete Course</span></a></li>


   <li><a href='logout.php'><span>Logout</span></a></li>

</ul>
</div>
<H1 align="center">Custom Query</H1>

<form action="DisplayCourses.php" align="center" method="POST">

<select name='Course_Level' onchange='this.form.submit()'>
  <option selected>Select a Year</option>
  <option value="level 1">Year 1</option>
  <option value="level 2">Year 2</option>
  <option value="level 3">Year 3</option>
  <option value="Elective">Elective</option>
  <option value="All years">All years</option>
  <option value="Foundation Course">Foundation Course</option>
</select>
<noscript><input type="submit" value="Submit"></noscript>
</form>
</body>
<!-- <script src="js/index.js"></script>
    <link rel="stylesheet" href="css/customquery.css" media="screen" type="text/css" /> -->

</html>
