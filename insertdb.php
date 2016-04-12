<html>
<head>
	<meta charset="UTF-8">
	 <meta charset='utf-8'>
	 <meta http-equiv="X-UA-Compatible" content="IE=edge">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	 <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	 <script src="js/main.js"></script>

</head>
</html>
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
$sql="SELECT * FROM uwi ";
$results=$db->doQuery($sql);
$ID=$_POST['ID'];
$sql2="SELECT * FROM uwi where StudentID= '$ID' ";
$cursor=$db->doQuery($sql2);
if($cursor->num_rows!=0){
	echo "<script type='text/javascript'>alert('Student ID number already exists in the system.'); </script>";
	//header('Location:addStudent.php');
	//exit();
	//echo "<script type='text/javascript'>location.reload();</script>";
header("Refresh:0; url=addStudent.php");
}else{
//$con=mysql_connect("localhost","root","usbw") or die("Could not connect");
//mysql_select_db("students") or die("Could not find db!");
$fname=sanitize($_POST['fname']);
$lname=sanitize($_POST['lname']);
$ID=IDsanitize($_POST['ID']);
// $_1400=$_POST['1400'];
$_1500=sanitize($_POST['1500']);
$_1506=sanitize($_POST['1506']);
// $_1405=$_POST['1405'];
$_1501=sanitize($_POST['1501']);
$_1502=sanitize($_POST['1502']);
// $_1415=$_POST['1415'];
$_1503=sanitize($_POST['1503']);
$_1507=sanitize($_POST['1507']);
// $_1420=$_POST['1420'];
// $_1502_=$_POST['1502_'];
$_1504=sanitize($_POST['1504']);
// $_1410=$_POST['1410'];
$_1505=sanitize($_POST['1505']);
// $_1507_=$_POST['1507_'];
// $_1425=$_POST['1425'];
// $_1505_=$_POST['1505_'];
// $_1506_=$_POST['1506_'];
$_2415=sanitize($_POST['2415']);
$_2420=sanitize($_POST['2420']);
$_2425=sanitize($_POST['2425']);
$_2430=sanitize($_POST['2430']);
$_2400=sanitize($_POST['2400']);
$_2405=sanitize($_POST['2405']);
$_2410=sanitize($_POST['2410']);
$_3400=sanitize($_POST['3400']);
$_3405=sanitize($_POST['3405']);
$_2500=sanitize($_POST['2500']);
$_3415=sanitize($_POST['3415']);
$_3440=sanitize($_POST['3440']);
$_3410=sanitize($_POST['3410']);
$_3420=sanitize($_POST['3420']);
$_3435=sanitize($_POST['3435']);
$_3490=sanitize($_POST['3490']);
$_3425=sanitize($_POST['3425']);
$_3430=sanitize($_POST['3430']);
$_3500=sanitize($_POST['3500']);
$_3520=sanitize($_POST['3520']);
$_3510=sanitize($_POST['3510']);
$_1101=sanitize($_POST['1101']);
$_1301=sanitize($_POST['1301']);
$_1102=sanitize($_POST['1102']);
$_1105=sanitize($_POST['1105']);
$L1_Core=sanitize($_POST['L1_Core']);
$L1_Electives=sanitize($_POST['L1_Electives']);
$ADV_Core=sanitize($_POST['ADV_Core']);
$ADV_Electives=sanitize($_POST['ADV_Electives']);
$FOUN=sanitize($_POST['FOUN']);
$Total_Credits=sanitize($_POST['Total_Credits']);
$Additional_Courses=sanitize($_POST['Additional_Courses']);
$Completed=sanitize($_POST['Completed']);

//echo $L1_Core;
//echo $L1_Electives;
//echo $Completed;

/*
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$ID=$_POST['ID'];
$_1400=$_POST['1400'];
*/

$sql="INSERT INTO uwi (FirstName,LastName,StudentID,S1500,S1506,S1501,S1502,S1503,S1507,S1504,S1505,S2415,S2420,S2425,S2430,S2400,S2405,S2410,S3400,S3405,S2500,S3415,S3440,S3410,S3420,S3435,S3490,S3425,S3430,S3500,S3520,S3510,S1101,S1301,S1102,S1105,L1_Core,L1_Electives,ADV_Core,ADV_Electives,FOUN,Total_Credits,Additional_Courses,Completed) VALUES ('$fname','$lname','$ID','$_1500','$_1506','$_1501','$_1502','$_1503','$_1507','$_1504','$_1505','$_2415','$_2420','$_2425','$_2430','$_2400','$_2405','$_2410','$_3400','$_3405','$_2500','$_3415','$_3440','$_3410','$_3420','$_3435','$_3490','$_3425','$_3430','$_3500','$_3520','$_3510','$_1101','$_1301','$_1102','$_1105','$L1_Core','$L1_Electives','$ADV_Core','$ADV_Electives','$FOUN','$Total_Credits','$Additional_Courses','$Completed')";
$results=$db->doQuery($sql);
echo "<script type='text/javascript'>alert('Student added successfully.');</script>";
//header('Location:addStudent.php');
header("Refresh:0; url=addStudent.php");



//echo $results;
//$sql="INSERT INTO uwi (FirstName,LastName,StudentID,S1400,S1500,S1506,S1405,S1501,S1502,S1415,S1503,S1507,S1420,S1502_,S1504,S1410,S1505,S1507_,S1425,S1505_,S1506_,S2415,S2420,S2425,S2430,S2400,S2405,S2410,S3400,S3405,S2500,S3415,S3440,S3410,S3420,S3435,S3490,S3425,S3430,S3500,S3520,S3510,S1101,S1301,S1102,S1105,L1_Core,L1_Electives,ADV_Core_48,ADV_Electives,FOUN_9,Total Credits,Additional Courses,Completed)
//VALUES ('$fname','$lname','$ID','$_1400','$_1500','$_1506','$_1405','$_1501','$_1506','$_1502','$_1415','$_1503','$_1507','$_1420','$_1502_','$_1504','$_1410','$_1505','$_1507_','$_1425','$_1505_','$_1506','$_2415','$_2420','$_2425','$_2430','$_2400','$_2405','$_2410','$_3400','$_3405','$_2400','$_3405','$_3415','$_3440','$_3405$','_3410','$_3420','$_3435','$_3490','$_3425','$_3430','$_3500','$_3520','$_3510','$_1101','$_1301','$_1102','$1105','$L1_Core','$L1_Electives','$ADV_Core','$ADV_Electives','$FOUN','$Total_Credits','$Additional_Courses','$Completed')";
//echo "finiish inserting";


// if($results){
// 	header('Location:addStudent.php');
// }else{
// 	echo "not inserted";
// }

}
//mysql_close($con);

function sanitize($input) {
    if (is_array($input)) {
        foreach($input as $var=>$val) {
            $output[$var] = sanitize($val);
        }
    }
    else {
        if (get_magic_quotes_gpc()) {
            $input = stripslashes($input);
        }
        $input  = cleanInput($input);
        $output = mysql_real_escape_string($input);
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
function IDsanitize($str){
	if(strlen($str)!=9){
		echo "<script type='text/javascript'>alert('The ID number you entered is to short.');</script>";

	}
	return $str;
}
?>
