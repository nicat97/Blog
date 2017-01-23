<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sən də bil! | Daxil ol</title>

    <!-- Bootstrap Core CSS && JS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Custom CSS -->
    <style>
        <?php include 'css/login.css'; ?>
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="Ana_Səhifə">Sən də bil!</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="#">Mövzular</a>
                </li>
                <li>
                    <a href="Bilən">Yazarlar</a>
                </li>
                <li>
                    <a href="Kitablar">Kitablar</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<?php

if(isset($_ERROR) && !empty($_ERROR)){
    echo '
    <!-- Errors -->
    <div class="modal fade" id="errorMessages" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">XƏTA</h4>
                </div>
                <div class="modal-body">
                    <p>'. $_ERROR .'</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Bağla</button>
                </div>
            </div>

        </div>
    </div>
    ';
}

?>

<!-- Page Content -->
<div class="container">

    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-12">
            <h1 id="loginTitle" class="page-header text-center">
                Hesaba daxil ol
            </h1>
            <h1 id="registerTitle" style="display: none;" class="page-header text-center">
                Qeydiyyatdan keç
            </h1>
        </div>
        <hr>
    </div>
    <div class="row">
        <div class="col-lg-4">
        </div>
        <div id="form" class="col-lg-4 well">
            <!-- tabs -->
            <ul class="nav nav-tabs nav-justified">
                <li class="active" id="loginTab"><a>Daxil ol</a></li>
                <li id="registerTab"><a >Üzv ol</a></li>
            </ul>
            <!-- login form -->
            <form id="loginForm" method="post">
                <div class="input-group">
                    <input id="loginEmail" type="text" class="form-control" name="email" placeholder="E-poçt">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                </div>
                <div class="input-group">
                    <input id="loginPassword" type="password" class="form-control" name="password" placeholder="Şifrə">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                </div>
                <a id="reset" href="Şifrəmi_Unutdum">Şifrəni unutmusan?</a>
                <button id="login" type="submit" class="btn btn-default">Daxil ol</button>
            </form>
            <!-- register form -->
            <form id="registerForm" style="display: none;" method="post">
                <div class="input-group">
                    <input id="name" type="text" class="form-control" name="fullName" placeholder="Ad və Soyad">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                </div>
                <div class="input-group">
                    <input id="email" type="text" class="form-control" name="regEmail" placeholder="E-poçt">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                </div>
                <div class="input-group">
                    <input id="password" type="password" class="form-control" name="regPassword" placeholder="Şifrə">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock" id="passIcon"></i></span>
                </div>
                <div class="input-group">
                    <input id="re-password" type="password" class="form-control" name="re-password" placeholder="Şifrə (təkrar):">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-question-sign" id="re-passIcon"></i></span>
                </div>
                <button id="registerSubmit" type="submit" class="btn btn-default">Təsdiqlə</button>
            </form>
        </div>
        <div class="col-lg-4">
        </div>
    </div>

    <footer>
        <div class="row">
            <div class="col-md-12">
                <hr>
                <p>Bütün hüquqlar qorunur &copy; Sən də bil! 2017</p>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </footer>
    <!-- /.container -->
</div>
<!-- jQuery -->
<script>
    <?php include 'js/jquery.js'; ?>
</script>

<script>

    <?php
    if(isset($_ERROR) && !empty($_ERROR)){
      echo "
      $(window).load(function(){
        $('#errorMessages').modal('show');
      });";
    }
    ?>

    $('#loginTab').on('click', function () {
        $('#registerTab').removeClass("active");
        $('#loginTab').addClass("active");
        $('#registerForm').hide();
        $('#loginForm').show();
        $('#registerTitle').hide();
        $('#loginTitle').show();
    });

    $('#registerTab').on('click', function () {
        $('#loginTab').removeClass("active");
        $('#registerTab').addClass("active");
        $('#loginForm').hide();
        $('#registerForm').show();
        $('#loginTitle').hide();
        $('#registerTitle').show();
    });

    function passwordMatch() {
        var pass = $('#password').val();
        var repass = $('#re-password').val();

        if(pass != repass){
            $('#passIcon, #re-passIcon').css("color", "red");
            $('#registerSubmit').addClass("disabled");
        }else{
            $('#passIcon, #re-passIcon').css("color", "green");
        }
    }

    $(document).ready(function () {
        $('#password, #re-password').keyup(passwordMatch);
    });

</script>

</body>

</html>