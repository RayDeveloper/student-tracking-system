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
  <title>Add Course</title>

  <meta charset="UTF-8">
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <!-- <script src="script.js"></script> -->
    <link rel="stylesheet" href="css/admin.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<!-- <div id='cssmenu'> -->
<div id="wrapper">
<div id="navmenu">

<ul>
<li><a href="">Student</a>

<ul>
<li><a href="staffhome.php">Student List</a></li>
<li><a href="findstudent.php">Find Student</a></li>
<li><a href="addStudent.php">Add Student</a></li>
<li><a href="EditStudent.php">Edit Student</a></li>
<li><a href="DeleteStudent.php">Delete Student</a></li>

</ul>
</li>

<li class='active'><a href="">Course</a>
<ul>
<li><a href="allCourses.php">Course Listing</a></li>
<li><a class='active' href="addCourse.php">Add Course</a></li>
<li><a href="editCourse.php">Edit Course</a></li>
<li><a href="DeleteCourse.php">Delete Course</a></li>
</ul>
</li>

<li><a href="Customquery.php">Custom Report</a>
</li>

<li><a href="logout.php">Log out</a>

</li>

</ul>
</div>
</div>






<!-- </div> -->
<H1 align="center">Add a Course</H1>
<H3>Add a Course to the system.</H3>

<form action="addCourse.php" align="center" method="post">
  Course Name: <input type="text" required name="coursename"><br>
  Course Code: <input type="text" required name="coursecode"><br>
   <label >Choose Course Level</label></br>
  <input type="radio" name="level" required value="Level 1">Level 1<br>
  <input type="radio" name="level" value="Level 2" >Level 2<br>
  <input type="radio" name="level" value="Level 3" >Level 3<br>
  <input type="radio" name="level" value="Elective" >Elective<br>
  <input type="radio" name="level" value="Foundation Course" >Foundation Course<br>
  <br>
  <input type="submit" name="submit" value="Add Course">
</form>


</body>
<?php
//keeps taking in blank values..update solved
if(isset($_POST['submit'])){

  $_CourseName = isset($_POST['coursename']) ? $_POST['coursename'] : '';
  $_CourseCode = isset($_POST['coursecode']) ? $_POST['coursecode'] : '';
  $_CourseLevel = isset($_POST['level']) ? $_POST['level'] : '';

$_CourseName_sanitzied=sanitize($_CourseName);
$_CourseCode_sanitzied=sanitize($_CourseCode);


if($_CourseLevel=="Level 1")
$_CourseCredits="3";

if($_CourseLevel=="Level 2")
$_CourseCredits="4";

if($_CourseLevel=="Level 3")
$_CourseCredits="4";

if($_CourseLevel=="Foundation Course")
$_CourseCredits="3";

if($_CourseLevel=="Elective")
$_CourseCredits="4";

$sql2="SELECT Course_Level from Courses where Course_Level= '$_CourseCode_sanitzied' ";
$res=$db->doQuery($sql2);
if($res->num_rows!=0){
  echo "<script type='text/javascript'>alert('Course code already in the system.'); </script>";
  header("Refresh:0; url=addCourse.php");
}else{
  $sql="INSERT INTO Courses (Course_Name,Course_Code,Course_Level,Course_Credits) Values ('$_CourseName_sanitzied','$_CourseCode_sanitzied','$_CourseLevel','$_CourseCredits')";
  $db->doQuery($sql);
  echo "<script type='text/javascript'>alert('Course added successfully.');</script>";
  $new_code= str_replace("INFO ","S",$_CourseCode);
  $place_code= str_replace("S","",$new_code);
  //echo "new code: $new_code<br>";
  //echo "place code: $place_code<br>";
  // if(strstr($place_code, '1')){
  //   $sql2="ALTER TABLE uwi ADD $new_code VARCHAR( 255 ) after S1425";
  //   $db->doQuery($sql2);
  // }else if(strstr($place_code, '2')){
  //   $sql2="ALTER TABLE uwi ADD $new_code VARCHAR( 255 ) after S2410";
  //   $db->doQuery($sql2);
  // }else if(strstr($place_code, '3')){
  //   $sql2="ALTER TABLE uwi ADD $new_code VARCHAR( 255 ) after S3510";
  //   $db->doQuery($sql2);
  // }else{
  //   $sql2="ALTER TABLE uwi ADD $new_code VARCHAR( 255 ) after S1105";
  //   $db->doQuery($sql2);
  // }
}

}
function sanitize($input) {
    if (is_array($input)) {
        foreach($input as $var=>$val) {
            $output[$var] = sanitize($val);
        }
    }
    else {
        // if (get_magic_quotes_gpc()) {
        //     $input = stripslashes($input);
        // }
        $input  = cleanInput($input);
        $output = mysqli_real_escape_string($input);
    }
    return $output;
}

function cleanInput($input) {

  $search = array(
    '@<script[^>]*?>.*?</script>@si',   // Strip out javascript
    '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
    '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
    '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
  );

    $output = preg_replace($search, '', $input);
    return $output;
  }









?>

</html>
