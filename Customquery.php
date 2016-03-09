<?php 
require_once("lib/database.php");
$sqlString = '';
$db = FALSE;
$connection = FALSE;
$results = FALSE;
$row = FALSE;
$employee=FALSE;

// A variable to create an instance of the database class
$db = new DatabaseAdapter("uwi_courses");


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
   <li ><a href='#'><span>Day Students</span></a></li>
   <li><a href='#'><span>Evening Students</span></a></li>
   <li><a href='#'><span>Add A Student</span></a></li>
   <li><a href='EditStudent.php'><span>Edit Student</span></a></li>
   <li ><a href='DeleteStudent.php'><span>Delete a Student</span></a></li>
   <li><a href='#'><span>Add A Student</span></a></li>
    <li><a href='addCourse.php'><span>Add Course</span></a></li>
    <li ><a href='DeleteCourse.php'><span>Delete Course</span></a></li>
    <li class='active' ><a href='Customquery.php'><span>Delete Course</span></a></li>

   <li><a href='logout.php'><span>Logout</span></a></li>
 
</ul>
</div>
<H1 align="center">Add a Course</H1>

<form action="DisplayCourses.php" align="center" method="post">

<select >
  <option value="default">Select a Year</option>
  <option value="level">Year 1</option>
  <option value="level">Year 2</option>
  <option value="level">Year 3</option>
  <option value="level">All years</option>
  <option value="level">Foundation Courses</option>
</select><br>
<input type="hidden" name="submit" value="level"><br>
<input type="submit" name="submit" value="Submit Query"><br>
            <!-- <select id="sc"> -->
            <?php

              //$_CourseLevel = isset($_POST['level']) ? $_POST['level'] : '';
              //echo  $_POST['level'];

        //     if(isset($_POST['submit'])){
        //      $_CourseLevel = isset($_POST['level']) ? $_POST['level'] : '';
        //       $sql="SELECT * FROM courses where Course_Level= '$_CourseLevel' ";
        //       $results=$db->doQuery($sql);
        //       print_r($results);
        //       $employee=$results->fetch_assoc();
        //       //echo "Employee";
        //       print_r($employee);
        // while($employee=$results->fetch_assoc()){
        //   echo "inside while loop";
        //   echo"employee['Course_Name']";
        //   echo $employee["Course_Level"]." <input type='checkbox' name='employee['Course_Level']' value='". $employee['Course_Level'] ."'> ";
        //   }

        // }


             ?>

  
</form>


</body>
<?php




?>

<!-- <script src="js/index.js"></script>
    <link rel="stylesheet" href="css/customquery.css" media="screen" type="text/css" /> -->



</html>
