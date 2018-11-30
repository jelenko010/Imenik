<?php
session_start();
include('../include/db.php');
if(! (isset($_SESSION['UID']))){
    header("Location:../");
}
$check = mysqli_query($con, "SELECT count(*) FROM podaci"); //vraca broj zapisa koje je vratio upit za odabir
$row = mysqli_fetch_array($check, MYSQLI_NUM);
$podaciCount =  $row[0];

?>
<html>
<head>
    <title>Dashboard - Address Book</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/custom.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhaina" rel="stylesheet">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-1">
        </div>
        <div class="col-sm-10">
            <h1 class="title text-center">Imenik</h1>
            <div class="card">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Pocetna</a></li>
                    <li role="presentation"><a href="#add" aria-controls="add" role="tab" data-toggle="tab">Dodaj</a></li>
                    <li role="presentation"><a href="#update" aria-controls="update" role="tab" data-toggle="tab">Azuriraj</a></li>
                    <li role="presentation"><a href="#view" aria-controls="view" role="tab" data-toggle="tab">Pogledaj sve</a></li>
                    <li role="presentation"><a href="logout/" aria-controls="logout">Odjavi se</a></li>
                </ul>
                <div class="tab-content">
                    <!-- Home -->
                    <div role="tabpanel" class="tab-pane active" id="home">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-5">
                                    <h4 class="font">Dobrodosli u Vas imenik , <?php echo $_SESSION['first_name'].' '.$_SESSION['last_name']; ?>!</h4>
                                    <table class="table borderless">
                                        <tr>
                                            <td>Ime</td>
                                            <td>:</td>
                                            <td><?php echo $_SESSION['first_name'].' '.$_SESSION['last_name']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Korisnicko ime</td>
                                            <td>:</td>
                                            <td><?php echo $_SESSION['username']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Last Login</td>
                                            <td>:</td>
                                            <td><?php echo $_SESSION['last_login']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Persons in Address Book</td>
                                            <td>:</td>
                                            <td><?php echo $podaciCount; ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-sm-2"></div>

                            </div>
                        </div>

                    </div>
                    <!-- Add -->
                    <div role="tabpanel" class="tab-pane" id="add">
                        <?php include('tab_contents/add.php'); ?>
                    </div>
                    <!-- Update -->
                    <div role="tabpanel" class="tab-pane" id="update">
                        <?php include('tab_contents/update.php'); ?>
                    </div>
                    <!-- View -->
                    <div role="tabpanel" class="tab-pane" id="view">
                        <?php include('tab_contents/view.php'); ?>
                    </div>
                    <!-- search-->
                    <div class="input-group">
                        <span class="input-group-addon">Search</span>
                        <input type="text" name="search_text" id="search_text" placeholder="Pretraga" class="form-control" />
                    </div>
                </div>
                <br />
                <div id="result"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="../js/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        //reset btn
        $('.btn-danger').click(function(){
            $('#res').text('');
            $('#updateRes').text('');
        });
        //add
        $('#addPersonForm').submit(function(){
            var formData = new FormData($(this)[0]);
            $.ajax({
                url: 'tasks/add/',
                type: 'POST',
                data: formData,
                async: true,
                success: function (data){
                    $('#res').html(data);
                },
                cache: false,
                contentType: false,
                processData: false
            });
            $(this)[0].reset();
            return false;
        });
        //update
        //get previous data
        $('#pemail').change(function(){
            var pemail = $(this).val();
            if(pemail!=0){
                var dataString = 'email='+pemail;
                $.ajax({
                    url: 'tasks/update/fetch.php',
                    type: 'POST',
                    dataType: 'json',
                    data: dataString,
                    async: false,
                    success: function (data){
                        var name = data[1].split(' ');
                        var mobile = data[2];
                        var permanant = data[4];
                        var temporary = data[5];
                        $('#updatefn').val(name[0]);
                        $('#updateln').val(name[1]);
                        $('#updatemobile').val(mobile);
                        $('#updatepermanant').val(permanant);
                        $('#updatetemporary').val(temporary);
                    },
                });
            }
            return false;
        });
        //update the data
        $('#updatePersonForm').submit(function(){
            var formData = new FormData($(this)[0]);
            $.ajax({
                url: 'tasks/update/',
                type: 'POST',
                data: formData,
                async: true,
                success: function (data){
                    $('#updateRes').html(data);
                },
                cache: false,
                contentType: false,
                processData: false
            });
            $(this)[0].reset();
            return false;
        });
        //delete a person
        $("button").click(function(event){
            var id = event.target.id;
            if($.isNumeric(id)){
                if(confirm("Da li ste sigurni da zelite da obriste ovu osobu?")){
                    $.ajax({
                        url: 'tasks/delete/',
                        type: 'POST',
                        data: 'id='+id,
                        async: false,
                        success: function (data){
                            var objID = '#' + id;
                            $('#deleteRes').html(data);
                            $(objID).hide(500);
                            setTimeout(function(){ $('#deleteRes').text(''); }, 2000);
                        },
                    });
                }
            }
            return false;
        });
        $(document).ready(function(){

            load_data();

            function load_data(query)
            {
                $.ajax({
                    url:"tasks/search/",
                    method:"POST",
                    data:{query:query},
                    success:function(data)
                    {
                        $('#result').html(data);
                    }
                });
            }
            $('#search_text').keyup(function(){
                var search = $(this).val();
                if(search != '')
                {
                    load_data(search);
                }
                else
                {
                    load_data();
                }
            });
        });

    });
</script>
</body>
</html>