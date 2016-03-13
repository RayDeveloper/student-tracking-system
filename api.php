<?php 
require_once("lib/database.php");
$sqlString = '';
$db = FALSE;
$connection = FALSE;
$results = FALSE;
$row = FALSE;
$employee=FALSE;
$count=0;
$data=[];
$issues='';
$the_array = [];
    $index = 0; // array index

// A variable to create an instance of the database class
$db = new DatabaseAdapter("students");

if ( isset($_POST['course']) && is_array($_POST['course']) ) {
  $course_name;

    foreach ( $_POST['course'] as $v => $value ) {
      //echo "Value: $value<br>";
      $nospace= str_replace("INFO","S",$value);
      //echo "<br>";
      $course = str_replace(' ', '', $nospace);
      //echo "<br>";
      //echo $course;
      //echo "<br>";

      $sql="SELECT FirstName,LastName,StudentID,$course FROM uwi ";
      $sql_courseName="SELECT Course_Name From Courses where Course_Code LIKE '$value' ";
      //$sql_courseName="SELECT * From Courses ";
      //$sql "SELECT 's.FirstName','s.LastName','s.StudentID','c.Course_Name','c.Course_Code' FROM uwi AS s INNER JOIN Courses AS c" ;

      //echo($sql);
       //echo("<br>");
      //echo("$sql_courseName<br>");
      $records=$db->doQuery($sql);
      //print_r($records);
      $course_name=$db->doQuery($sql_courseName);
      // echo("<br>CourseName below<br>");
      //print_r($course_name);
      $coursy=$course_name->fetch_assoc();

       while($student=$records->fetch_assoc()){
            $data[$count]['StudentID']= $student['StudentID'];
            $data[$count]['Grade']=$student[$course];
            $count++;
                  // if($student=='4'){
            // $data['StudentID']= $student['StudentID'];
            // $data['Grade']=$student[$course];
            //$count++;
          // }else{
          //   $data['StudentID']= $student['StudentID'];
          //   $data['Grade']=0;
          //   $count++;
          echo json_encode($data[$count]);


          }
           

        //$student=$student["FirstName"];
        //print_r($student) ;
        //echo ($student["FirstName"]);       
     }





}

//$issues= implode(" ",$data);
//var_dump($data);
//echo json_encode($data);

?>

