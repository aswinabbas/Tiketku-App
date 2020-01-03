<?php

    include 'includes/user_token.php';
    include 'includes/myfirebase.php';

    //data admin
    $reference = 'Admin/'.$_SESSION['username']; 
    $checkdata = $database->getReference($reference)->getValue();
    //cetak data admin
    $nama_admin_f = $checkdata['nama_admin'];
    
    //data sales
    $path_sales_fb = 'MyTickets';
    $checkdata_sales = $database->getReference($path_sales_fb)->getValue();

    //data turis
    /*$path_turis_fb = 'Users';
    $checkdata_turis = $database->getReference($path_turis_fb)->getValue();

    //data wisata
    $path_wisata_fb = 'Wisata';
    $checkdata_wisata = $database->getReference($path_wisata_fb)->getValue();
    */

    
?>

<html>

<head>
    <title>Costumers-TiketSaya</title>
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

                <div class="item-menu inactive">
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
                    All Customers
                </p>
                <p class="sub-header-title">
                    They are your lovely users who love travelling
                </p>
            </div>
        </div>

        <div class="row report-group">
            <div class="col-md-4">
                <div class="col-md-12 item-costumer item-unique-costumer">
                    <div class="row">
                        <div class="content col-md-12">
                            <p class="desc">Wanna try to
                                create a customer
                                manually?</p>
                            <a href="add_new_user.php" class="btn btn-view btn-primary">Add New</a>
                        </div>
                    </div>
                </div>
            </div>

            <?php
                    foreach($checkdata_sales as $data_sales_final => $data_print_sales){

                        $path_data_based_on_username = 'Users/'.$data_print_sales['username'];
                        $print_data_user_profile = $database->getReference($path_data_based_on_username)->getValue();

                        foreach($print_data_user_profile as $print_data_user_profile_final => $value_data_user_profile)
                        {} 

                ?>


            <div class="col-md-4">
                <div class="col-md-12 item-costumer">
                    <div class="row">
                        <div class="content col-md-12">
                            <img src="images/user2.png" alt="">
                            <p class="nama-costumer"><?php echo $print_data_user_profile['nama_lengkap']; ?></p>
                            <p class="riwayat-pesanan"><?php echo $print_data_user_profile['bio']; ?></p>
                            <a href="user_detail.php?username=<?php echo $print_data_user_profile['username'];?>" class="btn btn-small-table btn-primary">View Profile</a>
                        </div>
                    </div>
                </div>
            </div>

                        <?php } ?>

        </div>




    </div>

    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/main.js"></script>

</body>

</html>