<?php
session_start();
if(isset($_SESSION['UID'])){
    header("Location:dashboard/");
}
?>
<html>
<head>
    <title>Address Book</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhaina" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6 text-center">
            <h1 class="title">Imenik</h1>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">Dobrodosli</h1>
                </div>
                <div class="panel-body">
                    <div class="conatiner">
                        <div class="row" style="font-family: 'Baloo Bhaina', cursive;">
                            <div class="col-sm-6">
                                <button id="login" class="btn btn-lg btn-info" data-toggle="modal" data-target="#loginPop">Prijavite se</button>
                            </div>
                            <div class="col-sm-6">
                                <button id="register" class="btn btn-lg btn-warning" data-toggle="modal" data-target="#registerPop">Registrujte se</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="button1">
                <button class="button" id="myBtn">Promeni boju pozadine!</button>
            </div>
        </div>
    </div>
</div>

<!-- Login Modal -->
<div class="modal fade" id="loginPop" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h3>Login</h3>
                <p id="res"></p>
            </div>
            <div class="modal-body">
                <form class="form-vertical" role="form" id="loginForm">
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="form-group col-sm-6">
                            <label>Korisnicko ime</label>
                            <input type="text" class="form-control" name="username" id="username" autocomplete="off" />
                        </div>
                        <div class="col-sm-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="form-group col-sm-6">
                            <label>Lozinka</label>
                            <input type="password" class="form-control" name="password" id="password" autocomplete="off" />
                        </div>
                        <div class="col-sm-3"></div>
                    </div>

                    <div class="modal-footer">
                        <div class="col-sm-6">
                            <input type="submit" value="Ulogujte se" name="submit" class="btn btn-success" id="loginBtn" />
                        </div>
                        <div class="col-sm-6">
                            <input type="reset" value="Reset" class="btn btn-danger" id="resetBtn" />
                        </div>
                </form>
            </div>
        </div>

    </div>
</div>
</div>

<!-- Registration Modal -->
<div class="modal fade" id="registerPop" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h3>Kreirajte novi nalog</h3>
                <p id="resRegister"></p>
            </div>
            <div class="modal-body">
                <form class="form-vertical" role="form" id="registerForm">
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="form-group col-sm-6">
                            <label>Ime</label>
                            <input type="text" class="form-control" name="fn" id="fn" autocomplete="off" />
                        </div>
                        <div class="col-sm-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="form-group col-sm-6">
                            <label>Prezime</label>
                            <input type="text" class="form-control" name="ln" id="ln" autocomplete="off" />
                        </div>
                        <div class="col-sm-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="form-group col-sm-6">
                            <label>Korisnicko ime</label>
                            <input type="text" class="form-control" name="username" id="username" autocomplete="off" />
                        </div>
                        <div class="col-sm-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="form-group col-sm-6">
                            <label>Lozinka</label>
                            <input type="password" class="form-control" name="password" id="password" autocomplete="off" />
                        </div>
                        <div class="col-sm-3"></div>
                    </div>

                    <div class="modal-footer">
                        <div class="col-sm-6">
                            <input type="submit" value="Registrujte se" name="submit" class="btn btn-success" id="regBtn" />
                        </div>
                        <div class="col-sm-6">
                            <input type="reset" value="Reset" class="btn btn-danger" id="resetBtn" />
                        </div>
                </form>
            </div>
        </div>

    </div>
</div>
</div>
<script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        //reset btn
        $('.btn-danger').click(function(){
            $('#res').text('');
            $('#resRegister').text('');
        });
        //submit login form
        $('#loginForm').submit(function(){
            var formData = new FormData($(this)[0]);
            $.ajax({
                url: 'login/',
                type: 'POST',
                data: formData,
                async: true,
                success: function (data){
                    $('#res').html(data);
                    if($('#res').text()=="Login Successful. Redirecting..."){
                        window.location.href = 'dashboard/';
                    }
                },
                cache: false,
                contentType: false,
                processData: false
            });
            $(this)[0].reset();
            return false;
        });
        //Background color
        $("#myBtn").click(function() {
            var r = Math.floor(Math.random() * 256);
            var g = Math.floor(Math.random() * 256);
            var b = Math.floor(Math.random() * 256);
            console.log(r, g, b);
            var color = "rgb" + "(" + r + "," + g + "," + b + ")";
            console.log(color);
            $('body').css('background-color', color);
        });
        //submit registration form
        $('#registerForm').submit(function(){
            var formData = new FormData($(this)[0]);
            $.ajax({
                url: 'register/',
                type: 'POST',
                data: formData,
                async: true,
                success: function (data) {
                    $('#resRegister').html(data);
                },
                cache: false,
                contentType: false,
                processData: false
            });
            $(this)[0].reset();
            return false;
        });
    });
</script>
</body>
</html>