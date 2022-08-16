<?php
  $server="localhost";

$username = "root";
$password = "";

$con = mysqli_connect($server,$username,$password);

if (!$con){
  echo "fail";
  die("connection failed ".mysqli_connect_error());
}




$name = $_POST['name'];
$job_designation = strtolower($_POST['job_designation']);
$about = $_POST['about'];
$role = $_POST['role'];
$responsibility = $_POST['responsibility'];
$requirement = $_POST['requirement'];
$size = $_POST['size'];
$type = $_POST['type'];
$sector = $_POST['sector'];
$rating = 0.0;
$website = $_POST['website'];
$city = $_POST['city'];
$temp1 = strtolower($_POST['temp1']);
$dt = date("d/m/Y");
// INSERT INTO `temp1`.`company` (`Company_name`, `Key Points`, `About us`, `Role`, `Responsibility`, `Requirement`, `Size`, `Type`, `Sector`, `City`, `Rating(out of 5)`, `Website`, `Skills`) VALUES ('a', 'ad', 'ae', 'ade', 'sr', 'sdr', 'srg', 'sg', 'srg', 'drg', '4', 'sfe', 'wr');

$sql = "INSERT INTO `temp1`.`company` (`Company_name`, `Key_Points`, `About us`, `Role`, `Responsibility`, `Requirement`, `Size`, `Type`, `Sector`, `City`, `Rating(out of 5)`, `Website`, `Skills`,`Date`) VALUES ('$name', '$job_designation', '$about', '$role', '$responsibility', '$requirement', '$size', '$type', '$sector', '$city', '$rating', '$website', '$temp1','$dt');";
if($con ->query($sql) == true){
  // echo "Successful";
  header("Location: http://localhost/kp/home.html"); 
  exit;
}
else{
  echo $con -> query($sql);
}

?>

 
  <!-- $server="localhost";

  $username = "root";
  $password = "";
  
  $con = mysqli_connect($server,$username,$password,"the_opportunist");
  
  if (!$con){
    echo "fail";
    die("connection failed ".mysqli_connect_error());
  }
  // else{
  //   echo "success";
  // }


$name = $_POST['name'];
$job_designation = $_POST['job_designation'];
$about = $_POST['about'];
$role = $_POST['role'];
$responsibility = $_POST['responsibility'];
$requirement = $_POST['requirement'];
$size = $_POST['size'];
$type = $_POST['type'];
$sector = $_POST['sector'];
$rating = "NA";
$website = $_POST['website'];
$city = $_POST['city'];
$temp1 = $_POST['temp1'];

// echo $name;
// echo $job_designation;
// echo $about;
// echo $role;
// echo $responsibility;
// echo $requirement;
// echo $size;
// echo $sector;
// echo $temp1;
// echo $website;
// echo $city;


$sql = "INSERT INTO company (`Company_name`, `Key Points`, `About us`, `Role`, `Responsibility`, `Requirement`, `Size`, `Type`, `Sector`, `City`, `Rating(out of 5)`, `Website`, `Skills`) VALUES ('$name', '$job_designation', '$about', '$role', '$responsibility', '$requirement', '$size', '$type', '$sector', '$city', '$rating', '$website', '$temp1');";
if(($con ->query($sql) == true)){
  // echo "Successful";
  header("Location: http://localhost/kp/home.html"); 
  exit;
}
else{
  if(($con ->query($sql) == true)){
    // echo "Successful";
    header("Location: http://localhost/kp/home.html"); 
    exit;
  }

}
// $mysqli->close(); -->




