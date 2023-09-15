<?php
    $page = isset($_GET['page']) ? $_GET['page']: '';
    if($page == "daftarPenyakit"){
        if(file_exists("daftarPenyakit.php")){
            include "daftarPenyakit.php";
        }
        else{
            echo"File penyakit tidak ditemukan!";
        }
    }
    elseif($page == "daftarGejala"){
        if(file_exists("daftarGejala.php")){
            include "daftarGejala.php";
        }
        else{
            echo"file gejala tidak ditemukan!";
        }
    }
    elseif($page == "daftar"){
        if(file_exists("petaniAddFm.php")){
            include "petaniAddFm.php";
        }
        else{
            echo"file data petani tidak ditemukan!";
        }
    }
    elseif($page == "daftarSimpan"){
        if(file_exists("petaniAddSimpan.php")){
            include "petaniAddSimpan.php";
        }
        else{
            echo"file simpan data petani tidak ditemukan!";
        }
    }
    elseif($page == "konsultasi"){
        if(file_exists("konsultasi.php")){
            include "konsultasi.php";
        }
        else{
            echo"file konsultasi tidak ditemukan!";
        }
    }
    elseif($page == "konsultasiCek"){
        if(file_exists("konsultasiCek.php")){
            include "konsultasiCek.php";
        }
        else{
            echo"file cek konsul tidak ditemukan!";
        }
    }
    elseif($page == "cfKonsul"){
        if(file_exists("cfKonsul.php")){
            include "cfKonsul.php";
        }
        else{
            echo"file konsultasi CF tidak ditemukan!";
        }
    }
    elseif($page == "cfCek"){
        if(file_exists("cfCek.php")){
            include "cfCek.php";
        }
        else{
            echo"file cfCek hasil tidak ditemukan!";
        }
    }
    elseif($page == "hasil"){
        if(file_exists("hasil.php")){
            include "hasil.php";
        }
        else{
            echo"file analisa hasil tidak ditemukan!";
        }
    }
    elseif($page == "home"){
        if(file_exists("home.php")){
            include "home.php";
        }
        else{
            echo"file home tidak ditemukan!";
        }
    }
?>