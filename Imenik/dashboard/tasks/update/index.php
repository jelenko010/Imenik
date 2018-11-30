<?php
include('../../../include/db.php');
$fn = trim($_POST['updatefn']);
$ln = trim($_POST['updateln']);
//$name = $fn.' '.$ln;
$telbr = trim($_POST['updatetelbr']);
$grad = trim($_POST['updategrad']);
$ulica = trim($_POST['updateulica']);
$br = trim($_POST['updatebr']);
if (strlen($fn) > 0 && strlen($ln) > 0 && strlen($telbr) > 0 && strlen($grad) > 0 && strlen($ulica) > 0 && strlen($br) > 0){
    mysqli_query($con, "UPDATE podaci SET ime='$fn', prezime='$ln',grad='$grad',ulica='$ulica', br='$br' WHERE  telefonski_broj='$telbr'");
    if(mysqli_error($con)==""){
        echo '<p style="color: #4F8A10;font-weight: bold;">Uspesno azauriran!</p>';
    }
    else{
        echo '<p style="color: #D8000C;font-weight: bold;">Nesto je poslo po zlu, pokusajete ponovo .</p>';
    }
}
else{
    echo '<p style="color: #D8000C;font-weight: bold;">Molimo Vas popunite sve detalje.</p>';
}
?>