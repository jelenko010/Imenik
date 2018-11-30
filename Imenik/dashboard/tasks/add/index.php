<?php
include('../../../include/db.php');
$fn = trim($_POST['fn']);
$ln = trim($_POST['ln']);
//$name = $fn.' '.$ln; Da cita ime ii prezime zajedno zbog baze ali nije potrebno
$telbr = trim($_POST['telbr']);
$grad = trim($_POST['grad']);
$ulica = trim($_POST['ulica']);
$br = trim($_POST['br']);
if(strlen($fn) > 0 && strlen($ln) > 0 && strlen($telbr) > 0 && strlen($grad) > 0 && strlen($ulica) > 0 && strlen($br) > 0){
    //if person is already added // ucitavamo telefonski broj i proveravamo da li uopste  postoji u bazi i samim tim pproveravamo dal neka osoba postoji(moze preko mejla ili preko jmbg)
    $check = mysqli_query($con,"SELECT * FROM podaci WHERE telefonski_broj='$telbr' ");
    // num rows daje broj redova koje nje upit vratio. Kao parametar treba joj proslediti identidfikator rezultata $check
    if(mysqli_num_rows($check)==1){
        echo '<p style="color: #9F6000;font-weight: bold;">Ova osoba je vec dodata</p>';
    }
    else{
        //ako osoba nije vec dodata onda je dodajemo INSETR INTO VALUES
        mysqli_query($con, "INSERT INTO podaci(ime,prezime,telefonski_broj,grad,ulica,br) VALUES('$fn','$ln','$telbr','$grad','$ulica','$br') ");
        if(mysqli_error($con)==""){
            echo '<p style="color: #4F8A10;font-weight: bold;">Osoba je dodata uspesno!</p>';
        }
        else{
            echo '<p style="color: #D8000C;font-weight: bold;">Nesto je krenulo po zlu, pokusajte ponovo.</p>';
        }
    }
}
else{
    echo '<p style="color: #D8000C;font-weight: bold;">Molimo popunute sve detalje.</p>';
}
?>