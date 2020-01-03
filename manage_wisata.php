<?php

    include 'includes/user_token.php';
    include 'includes/myfirebase.php';

    //dapatkan username dari URL
    $nama_wisata_url = $_GET['nama_wisata'];

    //data detail wisata
    $path_wisata_details = 'Wisata/'.$nama_wisata_url; 
    $checkdata_datawisata_details = $database->getReference($path_wisata_details)->getValue();

    //data admin
    $reference = 'Admin/'.$_SESSION['username']; 
    $checkdata = $database->getReference($reference)->getValue();
    //cetak data admin
    $nama_admin_f = $checkdata['nama_admin'];

?>

<html>

<head>
    <title>Manage Wisata Details-TiketSaya</title>
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

                <div class="item-menu">
                    <a href="wisata.php">
                        <p class="icon-item-menu">
                            <i class="fas fa-globe"></i>
                        </p>
                    </a>
                </div>

                <div class="item-menu inactive">
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
                    <li class="active-link">
                        Manage Wisata
                    </li>
                </a>

                <a href="costumer.php">
                    <li>
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
                    <?php echo $checkdata_datawisata_details['nama_wisata']; ?>
                </p>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb" style="background: none; margin-left: -15px;">
                        <li class="breadcrumb-item"><a style="color: #C7C7C7;" href="wisata.php">Wisata</a></li>
                        <li style="color: #21272C;" class="breadcrumb-item active" aria-current="page"><?php echo $checkdata_datawisata_details['nama_wisata']; ?>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>


        <div class="row report-group">
            <div class="col-md-12">

                <div class="item-big-report col-md-12">

                    <div class="row">

                        <div class="overlay-box col-md-4">
                            <a href="#" id="open_file" class="btn btn-primary btn-secondary-tiketsaya">Replace</a>
                            <div style="visibility: hidden;" class="form-group conten-sign-in">
                                <input id="image_file" type="file">
                            </div>
                        </div>

                        <div style="padding-left: 30px;" class="thumbnail-box col-md-4">
                            <p class="lable-thumbnail">Thumbnail-wisata</p>
                            <img class="thumbnail-wisata" src="images/user1.png" alt="">
                        </div>

                        <div class="col-md-5">
                            <form method="POST" action="includes/data_model.php">

                                <div class="form-group conten-sign-in">
                                    <label class="title-input-type-tiketsaya" for="exampleInputEmail1">Nama
                                        Wisata</label>
                                    <input disabled name="nama_wisata" value="<?php echo $checkdata_datawisata_details['nama_wisata']; ?>" type="text" class="form-control input-type-primary-tiketsaya"
                                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Wisata">
                                </div>

                                <div class="form-group">
                                    <label class="title-input-type-tiketsaya" for="exampleInputPassword1">Lokasi
                                        Wisata</label>
                                    <input name="lokasi" value="<?php echo $checkdata_datawisata_details['lokasi']; ?>" type="text" class="form-control input-type-primary-tiketsaya"
                                        id="exampleInputPassword1" placeholder="Lokasi">
                                </div>

                                <div class="form-group">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="title-input-type-tiketsaya" for="exampleInputPassword1">Harga
                                                Tiket (US$)</label>
                                            <input name="harga_tiket" value="<?php echo $checkdata_datawisata_details['harga_tiket']; ?>" type="number" class="form-control input-type-primary-tiketsaya"
                                                id="exampleInputPassword1" placeholder="Harga">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="title-input-type-tiketsaya"
                                                for="exampleInputPassword1">Tanggal</label>
                                            <input name="date_wisata" value="<?php echo $checkdata_datawisata_details['date_wisata']; ?>" type="date" class="form-control input-type-primary-tiketsaya"
                                                id="exampleInputPassword1">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Ketentuan</label>
                                        <textarea name="ketentuan" value="<?php echo $checkdata_datawisata_details['ketentuan']; ?>" class="form-control" id="exampleFormControlTextarea1"
                                            rows="3"></textarea>
                                    </div>

                                    <div class="form-group2">
                                        <label for="exampleFormControlTextarea1">Deskripsi Wisata</label>
                                        <textarea name="short_desc" value="<?php echo $checkdata_datawisata_details['short_desc']; ?>" class="form-control" id="exampleFormControlTextarea1"
                                            rows="3"></textarea>
                                    </div>

                                    <div class="row" style="margin-top: 20px;">
                                        <div class="col-md-4">
                                            <label class="title-input-type-tiketsaya" for="exampleInputPassword1">Has
                                                WiFi?</label>
                                            <input name="is_wfi" value="<?php echo $checkdata_datawisata_details['is_wifi']; ?>" type="text" class="form-control input-type-primary-tiketsaya"
                                                id="exampleInputPassword1" placeholder="yes">
                                        </div>

                                        <div class="col-md-4">
                                            <label class="title-input-type-tiketsaya" for="exampleInputPassword1">Has
                                                Spot?</label>
                                            <input name="is_photo_spot" value="<?php echo $checkdata_datawisata_details['is_photo_spot']; ?>" type="text" class="form-control input-type-primary-tiketsaya"
                                                id="exampleInputPassword1">
                                        </div>

                                        <div class="col-md-4">
                                            <label class="title-input-type-tiketsaya" for="exampleInputPassword1">Has
                                                Festival</label>
                                            <input name="is_festival" value="<?php echo $checkdata_datawisata_details['is_festival']; ?>" type="text" class="form-control input-type-primary-tiketsaya"
                                                id="exampleInputPassword1" placeholder="yes">
                                        </div>
                                    </div>


                                </div>

                                <div class="row" style="margin-top: 25px; margin-left: 3px;">
                                    <input type="hidden" name="nama_wisata_url" value="<?php echo $nama_wisata_url;?>"/>
                                    <button name="updateWisata" type="submit" class="btn btn-primary btn-primary-tiketsaya">Update</button>
                                    <button type="reset" class="btn btn-primary btn-cancel">Cancel</button>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>

            </div>

        </div>



    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/main.js"></script>

</body>

</html>