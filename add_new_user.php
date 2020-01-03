<?php

    include 'includes/user_token.php';
    include 'includes/myfirebase.php';

    //data admin
    $reference = 'Admin/'.$_SESSION['username']; 
    $checkdata = $database->getReference($reference)->getValue();
    //cetak data admin
    $nama_admin_f = $checkdata['nama_admin'];
?>

<html>

<head>
    <title>Add New User-TiketSaya</title>
    <meta charset="UTF-8">
    <meta name="description" content="Login TiketSaya Admin">
    <meta name="keywords" content="TiketSaya, Web Dashboard TiketSaya, Login TiketSaya">
    <meta name="author" content="BWA Team">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <script src="https://kit.fontawesome.com/dfd3029a70.js" crossorigin="anonymous"></script>
</head>

<body>


    <div class="side-left">
        <div class="shortcut" onmouseover="showAdminProfile()">
            <div class="emblemapp">
                <img src="images/emblem_app.png" height="29" alt="">
            </div>
            <div class="menus">

                <div class="item-menu  inactive">
                    <a href="Dashboard.php">
                        <p class="icon-item-menu">
                            <i class="fab fa-delicious"></i>
                        </p>
                    </a>
                </div>

                <div class="item-menu inactive">
                    <a href="sales.php">
                        <p class="icon-item-menu">
                            <i class="fas fa-ticket-alt"></i>
                        </p>
                    </a>
                </div>

                <div class="item-menu inactive">
                    <a href="wisata.php">
                        <p class="icon-item-menu">
                            <i class="fas fa-globe"></i>
                        </p>
                    </a>
                </div>

                <div class="item-menu">
                    <a href="cutomer.php">
                        <p class="icon-item-menu">
                            <i class="fas fa-users"></i>
                        </p>
                    </a>
                </div>

                <div class="item-menu inactive">
                    <a href="setting.php">
                        <p class="icon-item-menu">
                            <i class="fas fa-cog"></i>
                        </p>
                    </a>
                </div>

                <div class="item-menu inactive">
                    <a href="#">
                        <p class="icon-item-menu">
                            <i class="fas fa-power-off"></i>
                        </p>
                    </a>
                </div>

            </div>
        </div>
        <div class="admin-profile" id="sl_ap" onmouseover="showAdminProfile()" onmouseout="hiddenAdminProfile()">
            <div class="admin-picture">
                <img src="images/admin-picture.png" alt="">
            </div>
            <p class="admin-name">
                <?php echo $nama_admin_f; ?>
            </p>
            <p class="admin-level">
                Super Admin
            </p>

            <ul class="admin-menus">
                <a href="Dashboard.php">
                    <li>
                        My Dashboard
                    </li>
                </a>

                <a href="sales.php">
                    <li>
                        Ticket Sales
                    </li>
                </a>

                <a href="wisata.php">
                    <li>
                        Manage Wisata
                    </li>
                </a>

                <a href="costumer.php">
                    <li class="active-link">
                        Customers <span class="badge-tiketsaya badge badge-pill badge-primary">87</span>
                    </li>
                </a>

                <a href="setting.php">
                    <li>
                        Account Setting
                    </li>
                </a>

                <a href="#">
                    <li style="padding-top: 90px;">
                        Log Out
                    </li>
                </a>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <div class="header row">
            <div class="col-md-12">
                <p class="header-title">
                    Add New Customer
                </p>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb" style="background: none; margin-left: -15px;">
                        <li class="breadcrumb-item"><a style="color: #C7C7C7;" href="costumer.php">Costumers</a></li>
                        <li style="color: #21272C;" class="breadcrumb-item active" aria-current="page">Create
                        </li>
                    </ol>
                </nav>
            </div>
        </div>


        <div class="row report-group">
            <div class="col-md-12">

                <div class="item-big-report col-md-9">


                    <div class="col-md-8 user-new">
                        <img class="user-table-item" src="images/icon_nopic.png" alt="">
                        <form method="POST" action="includes/data_model.php">
                            <div class="input-new-user">
                                <label class="title-input-type-tiketsaya" for="exampleInputEmail1">Username</label>
                                <input name="username" type="text" class="form-control input-type-primary-tiketsaya" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Ketik Nama">
                            </div>

                            <div class="input-new-user">
                                <label class="title-input-type-tiketsaya" for="exampleInputEmail1">Nama
                                    Pengguna</label>
                                <input name="nama_lengkap" type="text" class="form-control input-type-primary-tiketsaya" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Ketik Nama">
                            </div>

                            <div class="input-new-user">
                                <label class="title-input-type-tiketsaya" for="exampleInputEmail1">Alamat
                                    Email</label>
                                <input name="email_address" type="email" class="form-control input-type-primary-tiketsaya"
                                    id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ketik Email">
                            </div>

                            <div class="input-new-user">
                                <label class="title-input-type-tiketsaya" for="exampleInputEmail1">Password</label>
                                <input name="password" type="password" class="form-control input-type-primary-tiketsaya"
                                    id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ketik Password">
                            </div>

                            <div class="row">
                                <div class="col-md-6 bio">
                                    <label class="title-input-type-tiketsaya" for="exampleInputEmail1">Bio</label>
                                    <input name="bio" type="text" class="form-control input-type-primary-tiketsaya"
                                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ketik Bio">
                                </div>

                                <div class="col-md-6 balance">
                                    <label class="title-input-type-tiketsaya" for="exampleInputEmail1">Balance
                                        (US$)</label>
                                    <input name="user_balance" type="text" class="form-control input-type-primary-tiketsaya"
                                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Balance">
                                </div>
                            </div>

                            <div class="row" style="margin-top: 25px; margin-left: 3px;">
                                <button name="addUser" type="submit" class="btn btn-primary btn-primary-tiketsaya">Save Now</button>
                                <button type="reset" class="btn btn-primary btn-cancel">Cancel</button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>



        </div>

        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/main.js"></script>

</body>

</html>