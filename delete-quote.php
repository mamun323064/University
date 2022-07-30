<?php
require_once('functions/function.php');
$id=$_GET['d'];
$del="DELETE FROM cs_quote WHERE quote_id='$id'";

if(mysqli_query($con,$del)){
header('Location:all-request-quote.php');
}else{
 echo "not delete!";
}
?>