<?php

include('../../../include/db.php');
$output = '';
if(isset($_POST["query"]))
{
    $search = mysqli_real_escape_string($con, $_POST["query"]);
    $query = "
  SELECT * FROM podaci
  WHERE ime LIKE '%".$search."%'
  OR prezime LIKE '%".$search."%' 
  OR telefonski_broj LIKE '%".$search."%' 
  OR grad LIKE '%".$search."%' 
  OR ulica LIKE '%".$search."%'
  OR br LIKE '%".$search."%'
 ";
}
else
{
    $query = "
  SELECT * FROM podaci ORDER BY id
 ";
}
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result) > 0)
{
    $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Ime</th>
     <th>Prezime</th>
     <th>Telefonski broj</th>
     <th>Grad</th>
     <th>Ulica</th>
     <th>Br</th>
    </tr>
 ';
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))// funkcija dobija rezultat niza kkao asociativni niz
    {
        $output .= '
   <tr>
    <td>'.$row["ime"].'</td>
    <td>'.$row["prezime"].'</td>
    <td>'.$row["telefonski_broj"].'</td>
    <td>'.$row["grad"].'</td>
    <td>'.$row["ulica"].'</td>
    <td>'.$row["br"].'</td>
   </tr>
  ';
    }
    echo $output;
}
else
{
    echo 'Nije pronadjen';
}

?>