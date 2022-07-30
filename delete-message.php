<?php
require_once('functions/function.php');
$id=$_GET['d'];
$del="DELETE FROM cs_contact WHERE con_id='$id'";

if(mysqli_query($con,$del)){
header('Location:all-message.php');
}else{
 echo "not delete!";
}
?>