<?php

include_once('link/config.php');

if(!$link){
    die("ERROR: Could not connect to database.");
}

$stid=intval($_GET['stid']);




$sql="DELETE FROM disease_tb WHERE id=$stid ";

if(mysqli_query($link, $sql)){
    echo "Selected disease were deleted successfully.";

    header("refresh:1;url=show_disease.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);

?>