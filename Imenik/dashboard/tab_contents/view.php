<p class="text-center" id="deleteRes"></p>
<table class="table table-condensed table-responsive">
    <thead>
    <tr>
        <th>Ime</th>
        <th>Prezime</th>
        <th>Telefonski_broj</th>
        <th>Grad</th>
        <th>Ulica</th>
        <th>Br</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $res = mysqli_query($con,"SELECT * FROM podaci");
    while($row = mysqli_fetch_array($res,MYSQLI_ASSOC)){
        echo '<tr id="'.$row['id'].'">
						<td>'.$row['ime'].'</td>
						<td>'.$row['prezime'].'</td>
						<td>'.$row['telefonski_broj'].'</td>
						<td style="word-wrap:break-word;">'.$row['grad'].'</td>
						<td>'.$row['ulica'].'</td>
						<td>'.$row['br'].'</td>
						<td><button class="btn btn-danger" id="'.$row['id'].'">Ukloni</button></td>
					  </tr>';
    }
    ?>
    </tbody>
</table>