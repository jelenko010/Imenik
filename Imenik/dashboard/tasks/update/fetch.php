<?php
include('../../../include/db.php');
$telbr = $_POST['telbr'];
//utvrdjujemo dal postoji korisnik tj biramo ga
$res = mysqli_query($con, "SELECT * FROM podaci WHERE telefonski_broj='$telbr' ",$con);
$array = mysqli_fetch_row($res);
echo json_encode($array);
?>