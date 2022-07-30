<?php
require_once('functions/function.php');
$id=$_GET['d'];
$del="DELETE FROM cs_courses WHERE courses_id='$id'";

if(mysqli_query($con,$del)){
header('Location:all-courses.php');
}else{
 echo "not delete!";
}
?>