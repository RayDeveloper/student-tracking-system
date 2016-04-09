<?php
session_start();
require_once("lib/database.php");



$sqlString = '';
$db = FALSE;
$connection = FALSE;
$results = FALSE;
$row = FALSE;
$employee=FALSE;
$data= array();
$fail_var=0;
$pass_var=0;
$records=FALSE;
$student=FALSE;
$studentas=array();
$student_grade=array();
     $pass=array();
     $fail=array();
     $data=array();

$value;
$student=array();
// A variable to create an instance of the database class
$db = new DatabaseAdapter("students");


?>

<!doctype html>
<html>

<head>
  <title>Display Results</title>
  <meta charset="UTF-8">
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <!-- // <script src="script.js"></script> -->
    <link rel="stylesheet" href="css/admin.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>

</head>
<!-- <body> -->
<body onload="startReportPageSetup();">
  <div id="wrapper">
  <div id="navmenu">

  <ul>
  <li><a href="#">Student</a>

  <ul>
  <li><a href="staffhome.php">Student List</a></li>
  <li><a href="findstudent.php">Find Student</a></li>
  <li><a href="addStudent.php">Add Student</a></li>
  <li><a href="EditStudent.php">Edit Student</a></li>
  <li><a href="DeleteStudent.php">Delete Student</a></li>

  </ul>
  </li>

  <li><a href="#">Course</a>
  <ul>
    <li><a href="allCourses.php">Course Listing</a></li>
  <li><a href="addCourse.php">Add Course</a></li>
  <li><a href="editCourse.php">Edit Course</a></li>
  <li><a href="DeleteCourse.php">Delete Course</a></li>
  </ul>
  </li>

  <li class='active'><a href="Customquery.php">Custom Report</a>
  </li>

  <li><a href="logout.php">Log out</a>

  </li>

  </ul>
  </div>
  </div>
<H1 align="center">Custom Report</H1>
<h3 align="center"> Results of query</h3>

<?php


if ( isset($_POST['course']) && is_array($_POST['course']) ) {


  $course_name;
$course;
$coursy;

    foreach ( $_POST['course'] as $v => $value ) {
    	//echo "Value:$value <br>";
      if (strpos($value, 'FOUN') !== false) {
        $nospace= str_replace("FOUN","S",$value);
        //echo "<br>";
        $course = str_replace(' ', '', $nospace);
        $sql="SELECT FirstName,LastName,StudentID,$course FROM uwi ";
        $sql_courseName="SELECT Course_Name,Course_Code From Courses where Course_Code LIKE '$value' ";
        //echo $sql_courseName;
        $records=$db->doQuery($sql);
        //print_r($records);
        $course_name=$db->doQuery($sql_courseName);
        // echo("<br>CourseName below<br>");
        //print_r($course_name);
        $coursy=$course_name->fetch_assoc();

         while($student=$records->fetch_assoc()){
           $studentas[]=$student;
            $student_grade[]=$student[$course];
         }
         CreateTable($studentas,$course,$student_grade,$coursy['Course_Name'],$coursy['Course_Code']);
         unset($studentas);


}else{
  $nospace= str_replace("INFO","S",$value);
  //echo "<br>";
  $course = str_replace(' ', '', $nospace);
  $sql="SELECT FirstName,LastName,StudentID,$course FROM uwi ";
  $sql_courseName="SELECT Course_Name,Course_Code From Courses where Course_Code LIKE '$value' ";
  $records=$db->doQuery($sql);
  // $records2=$db->doQuery($sql);

  $course_name=$db->doQuery($sql_courseName);
  $coursy=$course_name->fetch_assoc();
  // while($recs=$records2->fetch_assoc()){
  //   echo $recs[$course];
  // }
   while($student=$records->fetch_assoc()){
     $studentas[]=$student;
      $student_grade[]=$student[$course];
     //CreateTable($student,$coursy['Course_Name'],$student[$course],$course);

   }
   CreateTable($studentas,$course,$student_grade,$coursy['Course_Name'],$coursy['Course_Code']);
   unset($studentas);
   //print_r($studentas);


}
}
}


function countRate($pass_val,$fail_val){
  $total=$pass_val+$fail_val;
  $per_pass=$pass_val/$total*100;
  $per_fail=$fail_val/$total*100;
  $round_pass=round($per_pass);
  $round_fail=round($per_fail);
  $json_send=array();
  $json_send=array(array("Name"=>"Not Completed","Students"=>$fail_val),array("Name"=>"Completed","Students"=>$pass_val));
  // $json_send=array("Name"=>'Completed',"Students"=>$pass_val);



  //array_push($json_send,$pass_val);
  //array_push($json_send,$fail_val);
//print_r($json_send);
  echo "<H3 >Total Number of Students: $total </H3>";
echo "<H3 id='pass'>Students passed: $pass_val </H3>";
echo "<H3 id='pass'>Percentage of passsed students: $round_pass% </H3>";
echo "<H3 id='fail'>Students to complete: $fail_val </H3>";
echo "<H3 id='fail'>Percentage of students to complete: $round_fail% </H3>";
$_SESSION['data'] = $json_send;

}

function CreateTable($tableData,$course,$student_grade,$course_name,$course_code){
  $y=1;
  $val=0;
$pass_val=0;
$fail_val=0;
echo "<h3 align='center' > $course_name </h3>";
echo "<h3 align='center' > $course_code </h3>";

echo "<br>";
  for($x=0;$x<$y;$x++){
   echo "<table class='table table-bordered'>";
    echo "<tr>";
    echo "<th>First Name</th> ";
    echo "<th>Last Name</th> ";
    echo "<th>Student ID</th> ";
    echo "<th>Grade</th> ";
  echo "</tr>";
}
  // echo "<tr>";
  foreach($tableData as $key1 => $row){
    echo "<tr>";
     echo "<td>$row[FirstName]</td> ";
     echo "<td>$row[LastName]</td> ";
     echo "<td>$row[StudentID]</td> ";
     if($row[$course]=="NO"||$row[$course]=="no"){
       echo "<td id='fail' >NO</td> ";
       $fail_val++;
     }
    //  if($row[$course]==3){
    //    echo "<td id='pass' >PASS</td> ";
    //    $pass_val++;
    //  }
     if($row[$course]== null){
       echo "<td id='fail'>NO</td> ";
       $fail_val++;

     }
     if($row[$course]== "PASS"||$row[$course]== "pass" ){
       echo "<td id='pass'>PASS</td> ";
       $pass_val++;

     }

echo "</tr>";

  }

  // echo "</tr>";
    echo "</table>";
  countRate($pass_val,$fail_val);

  }



// function CreateTable($tableData,$course_name,$course_grade,$course_code){
// //display data better than this
//   //Remove the S and put the INFO in
//
//   echo "<table class='table table-bordered'>";
//   // echo '<tr>
//   // <th>Word</th>
//   // <th>Score</th>
//   // </tr>';
//   foreach ($tableData as $key1 => $row) {
//     if($course_grade==$row && $course_grade==4){
//       echo "<tr> <th>$course_code</th><td>PASS</td> </tr>";
// break;
//        }
//        if($course_grade==$row && $course_grade==3){
//          echo "<tr> <th>$course_code</th><td>PASS</td> </tr>";
//    break;
//           }
//        if($course_grade==$row && $course_grade==NULL){
//          echo "<tr> <th>$course_code</th><td>FAIL</td> </tr>";
//    break;
//           }
//       echo "<tr> <th>$key1</th><td>$row</td> </tr>";
//   }
//   echo "<tr><th>$course_name</th></tr>";
//   echo "</tbody>";
//   echo '</table>';
//
// }


?>

<div  id="chart_container">
    <div id"chart_sec"></div>
</div>
<div class="col-md-4">
<h4>Chart Options</h4>
<div class="form-group">
<h5>Chart Types</h5>
<select class="form-control"  id="select_graph">
<option>select chart</option>
<option>Pie Chart</option>
<option>Bar Chart</option>
</select>
</div>
<div class="form-group">
<h5>Data Sources</h5>
<!-- <label class="radio-inline">
<input type="radio" name="datasrc" checked value="json"  class="datasrc">JSON File
</label>
 --><label class="radio-inline">
<input type="radio" name="datasrc" checked value="php" class="datasrc"> PHP API
</label>
</div>
</div>
 </div> <!-- /container -->        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="jslibs/jquery/dist/jquery.min.js"></script>
        <script src="jslibs/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="jslibs/highcharts/highcharts.js"></script>
        <script src="js/main.js"></script>
</body>
</html>
