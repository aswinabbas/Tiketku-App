<?php

    include 'includes/user_token.php';
    include 'includes/myfirebase.php';

    //dapatkan username dari URL
    $username_url = $_GET['username'];

    //data detail user
    $path_user_details = 'Users/'.$username_url;
    $checkdata_user_details = $database->getReference($path_user_details)->getValue();

    //data wisata user
    $path_wisata_user_fb = 'MyTickets/'.$username_url.'/wisata';
    $checkdata_wisata = $database->getReference($path_wisata_user_fb)->getValue();

    //data admin
    $reference = 'Admin/'.$_SESSION['username']; 
    $checkdata = $database->getReference($reference)->getValue();
    //cetak data admin
    $nama_admin_f = $checkdata['nama_admin'];

?>

<html>

<head>
    <title>Sales Detail-TiketSaya</title>
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
                    <a href="Dashboard.html">
                        <p class="icon-item-menu">
                            <i class="fab fa-delicious"></i>
                        </p>
                    </a>
                </div>

                <div class="item-menu">
                    <a href="sales.html">
                        <p class="icon-item-menu">
                            <i class="fas fa-ticket-alt"></i>
                        </p>
                    </a>
                </div>

                <div class="item-menu inactive">
                    <a href="wisata.html">
                        <p class="icon-item-menu">
                            <i class="fas fa-globe"></i>
                        </p>
                    </a>
                </div>

                <div class="item-menu inactive">
                    <a href="cutomer.html">
                        <p class="icon-item-menu">
                            <i class="fas fa-users"></i>
                        </p>
                    </a>
                </div>

                <div class="item-menu inactive">
                    <a href="setting.html">
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
                <a href="Dashboard.html">
                    <li>
                        My Dashboard
                    </li>
                </a>

                <a href="sales.html">
                    <li class="active-link">
                        Ticket Sales
                    </li>
                </a>

                <a href="wisata.html">
                    <li>
                        Manage Wisata
                    </li>
                </a>

                <a href="costumer.html">
                    <li>
                        Customers <span class="badge-tiketsaya badge badge-pill badge-primary">87</span>
                    </li>
                </a>

                <a href="setting.html">
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
                    Details
                </p>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb" style="background: none; margin-left: -15px;">
                        <li class="breadcrumb-item"><a style="color: #C7C7C7;" href="sales.php">Sales</a></li>
                        <li style="color: #21272C;" class="breadcrumb-item active" aria-current="page"><?php echo $checkdata_user_details['nama_lengkap']; ?>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>


        <div class="row report-group">
            <div class="col-md-12">

                <div class="item-big-report col-md-12">

                    <div class="row">
                        <div class="col-md-4 user-sales-detail">
                            <img class="user-table-item" src="images/user1.png" alt="">
                        </div>

                        <div class="col-md-4 user-desc">
                            <p class="admin-name">
                                <?php echo $checkdata_user_details['nama_lengkap']; ?>
                            </p>
                            <p class="admin-level">
                                <?php echo $checkdata_user_details['bio']; ?>
                            </p>
                        </div>

                        <div class="col-md-4 total-balance">
                            <p>
                                Total Balance: <span class="title-green">US$ <?php echo $checkdata_user_details['user_balance']; ?></span>
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <p class="col-md-4 title-colom">
                        <?php echo $checkdata_user_details['nama_lengkap']; ?>'s Wisata
                        </p>
                    </div>

                    <?php 
                        foreach($checkdata_wisata as $checkdata_wisata_final => $checkdata_wisata_final_value){
                            
                            //mengambil data dari firebase Wisata dan (.) MyTicket ($check_datawisata_details_final)
                            $path_wisata_details = 'Wisata/'.$checkdata_wisata_final_value['nama_wisata'];
                            $check_datawisata_details = $database->getReference($path_wisata_details)->getValue();

                            foreach($check_datawisata_details as $check_datawisata_details_final => $check_datawisata_details_final_value)
                            {}
                        
                    ?>

                    <div class="row item-wisata">
                        <div class="col-md-4 rincian">
                            <img class="icon-wisata" src="images/img_wisata.png" alt="">
                            <p class="nama-wisata"><?php echo $check_datawisata_details['nama_wisata']; ?></p>
                            <p class="lokasi"><?php echo $check_datawisata_details['lokasi']; ?></p>
                        </div>
                    </div>

                    <?php } ?>

                </div>

            </div>

        </div>



    </div>

    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/main.js"></script>

</body>

</html>