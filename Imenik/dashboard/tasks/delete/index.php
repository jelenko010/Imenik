<?php
include('../../../include/db.php');
$id = trim($_POST['id']);
//delete him Brisanje vrsimo preko id-a!
mysqli_query($con, "DELETE FROM podaci WHERE id='$id' ");
if(mysqli_error($con)==""){
    echo '<p style="color: #4F8A10;font-weight: bold;">Osba je uspesno obrisana!</p>';
}
else{
    echo '<p style="color: #D8000C;font-weight: bold;">Nesto je poslo po zlu, pokusajte ponovo.</p>';
}
?>