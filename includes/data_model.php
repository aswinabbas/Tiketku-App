<?php

    //include 'user_token.php';
    include 'myfirebase.php';

    if(isset($_POST['signin'])){
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
    }

    if($username != null){
        if($password != null){
            $reference = 'Admin/'. $username; // atur lokasi data di Firebase
            $checkdata =$database->getReference($reference)->getValue();
            if($checkdata != null){
                if($password != null){
                    
                    //ambil data
                    $password_admin_saatini = $checkdata['password'];

                    if($password == $password_admin_saatini){
                        //login berhasil
                        session_start();
                        $_SESSION['username'] = $username;
                        header('location: ../Dashboard.php');
                    }
                    else{
                        echo 'ulangi password Anda!';
                    }

                }else{
                    echo 'password salah';
                }
            }else{
                echo 'data tidak ada';
            }
        }
    }

    //update wisata ketika tekan tombol udate pada manage_wisata.php
    if(isset($_POST['updateWisata'])){
        //variable                                     name di php
        $nama_wisata_url    = htmlspecialchars($_POST['nama_wisata_url']);
        $nama_wisata        = htmlspecialchars($_POST['nama_wisata_url']);
        $lokasi             = htmlspecialchars($_POST['lokasi']);
        $date_wisata        = htmlspecialchars($_POST['date_wisata']);
        $harga_tiket        = htmlspecialchars($_POST['harga_tiket']);
        $ketentuan          = htmlspecialchars($_POST['ketentuan']);
        $short_desc         = htmlspecialchars($_POST['short_desc']);
        $is_wifi            = htmlspecialchars($_POST['is_wifi']);
        $is_photo_spot      = htmlspecialchars($_POST['is_photo_spot']);
        $is_festival        = htmlspecialchars($_POST['is_festival']);

        $reference = 'Wisata/'.$nama_wisata_url;

        $data = [
            'nama_wisata' => $nama_wisata,
            'lokasi' => $lokasi,
            'date_wisata' => $date_wisata,
            'harga_tiket' => $harga_tiket,
            'ketentuan' => $ketentuan,
            'short_desc' => $short_desc,
            'is_wifi' => $is_wifi,
            'is_photo_shot' => $is_photo_spot,
            'is_festival' => $is_festival
        ];

        //upload to server
        $pushData = $database->getReference($reference)->update($data);

        header('location: ../wisata.php');

    }

     //update admin ketika tekan tombol udate pada setting.php
     if(isset($_POST['updateAdmin'])){

        $nama_admin           = htmlspecialchars($_POST['nama_admin']);
        $email_admin          = htmlspecialchars($_POST['email_admin']);
        $password             = htmlspecialchars($_POST['password']);
        $username_admin_url   = htmlspecialchars($_POST['username_admin_url']);

        $reference = 'Admin/'.$username_admin_url;

        $data = [
            'username' => $username_admin_url,
            'nama_admin' => $nama_admin,
            'email_admin' => $email_admin,
            'password' => $password
        ];

        //upload to server
        $pushData = $database->getReference($reference)->update($data);

        header('location: ../Dashboard.php');

    }

    //delete user ketika tekan tombol delete pada user_detail.php
    if(isset($_POST['deleteUser'])){

        $username_url    = htmlspecialchars($_POST['username']);

        $reference = 'Users/'.$username_url;
        $reference_tiket = 'MyTickets/'.$username_url;


        //delete from server
        $pushData = $database->getReference($reference)->remove();
        $removeticket = $database->getReference($reference_tiket)->remove();

        header('location: ../costumer.php');

    }

    //membuat data user baru  pada add_new_user.php
    if(isset($_POST['addUser'])){

        $username       = htmlspecialchars($_POST['username']);
        $password       = htmlspecialchars($_POST['password']);
        $nama_lengkap   = htmlspecialchars($_POST['nama_lengkap']);
        $email_address  = htmlspecialchars($_POST['email_address']);
        $bio            = htmlspecialchars($_POST['bio']);
        $user_balance   = htmlspecialchars($_POST['user_balance']);

        $reference = 'Users/'.$username;

        $data = [
            'username' => $username,
            'password' => $password,
            'nama_lengkap' => $nama_lengkap,
            'email_address' => $email_address,
            'bio' => $bio,
            'user_balance' => $user_balance
        ];

        //upload to server
        $pushData = $database->getReference($reference)->set($data);

        header('location: ../costumer.php');

    }



?>