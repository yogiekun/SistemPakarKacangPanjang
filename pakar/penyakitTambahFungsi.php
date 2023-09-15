<?php
    include "../koneksi.php";

    //get variable dari form
    $txtKode= $_POST['txtKode'];
    $txtPenyakit= $_POST['txtPenyakit'];
    $txtInfoPenyakit= $_POST['txtInfoPenyakit'];
    $txtPenanganan= $_POST['txtPenanganan'];
    $txtGambar= $_POST['txtGambar'];

    //validasi
    if(trim($txtKode)==""){
        echo '<div class="container">
                <div class="alert alert-danger role=alert">
                    <b>Kode masih kosong, Ulangi Kembali</b>
                </div>
             </div>';
             include "penyakitTambah.php";
    }
    elseif(trim($txtPenyakit)==""){
        echo '<div class="container">
                <div class="alert alert-danger role=alert">
                    <b>Nama penyakit masih kosong, isi terlebih dahulu</b>
                </div>
             </div>';
             include "penyakitTambah.php";
    }
    elseif(trim($txtInfoPenyakit)==""){
        echo '<div class="container">
                <div class="alert alert-danger role=alert">
                    <b>Info penyakit masih kosong, isi terlebih dahulu</b>
                </div>
             </div>';
             include "penyakitTambah.php";
    }
    elseif(trim($txtPenanganan)==""){
        echo '<div class="container">
                <div class="alert alert-danger role=alert">
                    <b>Penanganan penyakit masih kosong, isi terlebih dahulu</b>
                </div>
             </div>';
             include "penyakitTambah.php";
    }
    elseif(trim($txtGambar)==""){
        echo '<div class="container">
                <div class="alert alert-danger role=alert">
                    <b>Url Gambar penyakit masih kosong, isi terlebih dahulu</b>
                </div>
             </div>';
             include "penyakitTambah.php";
    }
    else{
        //insert ke table
        $sql = "INSERT into penyakit (id_penyakit, nama_penyakit, info_penyakit, penanganan, gambar)";
        $sql.= "VALUES ('$txtKode', '$txtPenyakit', '$txtInfoPenyakit', '$txtPenanganan', '$txtGambar')";
        mysqli_query($koneksi, $sql);

        echo '<div class="container">
                <div class="alert alert-success role=alert">
                    <b>DATA BERHASIL DISIMPAN</b>
                </div>
             </div>';
             include "penyakitTampil.php"; 
    }
?>