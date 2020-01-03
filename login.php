<html>

<head>
    <title>Sign In Admin TiketSaya</title>
    <meta charset="UTF-8">
    <meta name="description" content="Login TiketSaya Admin">
    <meta name="keywords" content="TiketSaya, Web Dashboard TiketSaya, Login TiketSaya">
    <meta name="author" content="BWA Team">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <script src="https://kit.fontawesome.com/dfd3029a70.js" crossorigin="anonymous"></script>
</head>

<body>


    <div class="container">
        <div class="row header-sign-in">
            <div class="col-md-12">
                <img class="logo-header" height="80" src="images/applogocolored.png" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 offset-md-1 form-sign-in">
                <div class="row">
                    <div class="col-md-6 d-none d-sm-block">
                        <img class="icon-header" src="images/illustration_login.png" height="276" alt="">
                    </div>
                    <div class="col-md-4">
                        <p class="title-form">
                            Sig In
                        </p>
                        <p class="subtitle-form">
                            Let's make a report today
                        </p>

                        <form method="POST" action="includes/data_model.php">
                            <div class="form-group conten-sign-in">
                                <label class="title-input-type-tiketsaya" for="exampleInputEmail1">Username</label>
                                <input name="username" type="text" class="form-control input-type-primary-tiketsaya" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label class="title-input-type-tiketsaya" for="exampleInputPassword1">Password</label>
                                <input name="password" type="password" class="form-control input-type-primary-tiketsaya" id="exampleInputPassword1">
                            </div>
                            <button type="submit" name="signin" class="btn btn-primary btn-primary-tiketsaya">Sign In</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/main.js"></script>

</body>

</html>