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
        ///foreach($student as $key => $val){
         // for($i=0;$i<count($student);$i++){
           if($student[$course]==4||$student[$course]==6){
            $SID=$student['StudentID'];

              if (!isset($data[$SID]))
              $data[$SID] = array();

              //$data[$SID]['Grade']=$student[$course];
              $data[$SID]=$student[$course];






            // $pass['StudentID']=array();
            // $pass['Grade']=array();

            // $pass['StudentID']=$student['StudentID'];
            // $pass['Grade']=$student[$course];


            //echo '<br>Pass<br>';
            //$pass_var++;
            //echo $pass_var;
            //array_push($pass,'Pass');
            //$data[$i]='Pass';
            //print_r($data);
            //$val=count($data);
            //$data[$student++];
            //echo "<br> $val <br>";
            //break;
          }else{
            //echo '<br>Fail<br>';

            //$fail_var++;
            //echo $fail_var;
            //array_push($fail,'Fail');

           // $data[$i++]='Fail';
           // print_r($data);
            //$val=count($data);
            //echo '<br>fail<br>';
            //break;
          }
       // }

         
           // $data[$student]['FirstName']
  
            //$data[$count]['StudentID']= $student['StudentID'];
            //$data['StudentID'][$course]=$student["StudentID"];
            //$data['StudentID']=$student["StudentID"];

            //$data['StudentID']=$student[$course];
            //$count++;
        //echo $student['StudentID'];
        //echo $student[$course];
        //echo $student['FirstName'];
        //echo $student['LastName'];
        //echo $student[$course];

        //print_r( $student);



             //$data['StudentID']= $student['StudentID'];
            //$data['Grade']=$student['$value'];

        //$student=$student["FirstName"];
        //print_r($student) ;
        //echo ($student["FirstName"]);
        CreateTable($student,$coursy['Course_Name']);
        //echo json_encode($student);
       //print_r($student);
       // echo"data array:<br>";
       // print_r($data);
       // echo"<br>Count:$count<br>";
     }


     //$pass[]=$pass_var;
     //$fail[]=$fail_var;
     //echo json_encode($pass);
     //echo "the data array<br>";
     //print_r($data);
     //echo"<br>";
     echo json_encode($data);
    //  echo"<br>";

    //  echo "the pass array<br>";
    //  print_r($pass);
    //  //echo json_encode($pass);
    //  echo"<br>";
    //  echo "the fail array<br>";
    //  print_r($fail);
    //  echo"<br>";
    //  echo "the merged array<br>";
    //  $result=array_merge($pass,$fail);
    //  print_r($result);
    //  echo"<br>";
    //  echo"Json ecncode<br>";
    // // echo json_encode($result);



    }
}

?>

