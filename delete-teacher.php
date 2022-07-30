<?php
require_once('functions/function.php');
$id=$_GET['d'];
$del="DELETE FROM cs_banner WHERE banner_id='$id'";

if(mysqli_query($con,$del)){
header('Location:all-banner.php');
}else{
 echo "not delete!";
}
?>