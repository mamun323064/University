<?php
require_once('functions/function.php');
$id=$_GET['d'];
$del="DELETE FROM cs_offer WHERE offer_id='$id'";

if(mysqli_query($con,$del)){
header('Location:all-offer.php');
}else{
 echo "not delete!";
}
?>