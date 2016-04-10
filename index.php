<?php
require_once("lib/database.php");
$sqlString = '';
$db = FALSE;
$connection = FALSE;
$results = FALSE;
$row = FALSE;
$employee=FALSE;

// A variable to create an instance of the database class
$db = new DatabaseAdapter("loginusers");


if(isset($_POST['submit'])){




  $username=$_POST['username'];
  $clean_username=sanitize($username);
  $password=$_POST['password'];
  $hased_pass=sha1($password);
$sql="SELECT *FROM users WHERE Username='".$clean_username."'AND Password='".$hased_pass."' LIMIT 1";


$results=$db->doQuery($sql);
$count=($results);
//$admin_check=mysql_fetch_assoc($res);
$admin_check=$results->fetch_assoc();
//$count=count($admin_check);

//$role='Role';

 $test= $admin_check['Role'];

if($count==1){
session_start();
$_SESSION['sess_user']=$username;
 isAdmin($test);
  exit();
}else{
  echo"invalid login";
  exit();
}

}
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

 function isAdmin($test){
  if($test=='admin'){
      header('Location: staffhome.php');
    }else{
      header('Location: studenthome.php');
    }
 }

?>

<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Login Form</title>

    <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />

</head>
<header>
  <img src="images/uwi.jpg" alt="uwiLogo" style="float:right;width:150px;height:150px;">
      <img src="images/uwi.jpg" alt="uwiLogo" style="float:left;width:150px;height:150px;">
  <div class="full-width">
  <div class="wrap">
    <h2>DCIT Student Tracking System</h2>
  </div>
</div>

</header>

<body>

 <span href="#" class="button" id="toggle-login">login</span>

<div id="login">
  <div id="triangle"></div>
  <h1>log in</h1>
  <form action="index.php" method="post"/>
    <input type="username" name="username" placeholder="Username" />
    <input type="password" name="password" placeholder="Password" />
    <input type="submit" name="submit" value="Login" />
  </form>
</div>
  <script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>

  <script src="js/index.js"></script>

</body>

</html>
