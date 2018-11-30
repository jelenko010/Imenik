<?php
$con = mysqli_connect("localhost","root","", "imenik");
if($con==NULL){
    echo "ERROR!";
}
else{
    mysqli_select_db($con,"imenik");
}
?>