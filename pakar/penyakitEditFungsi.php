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
             include "penyakitEdit.php";
    }
    elseif(trim($txtPenyakit)==""){
        echo '<div class="container">
                <div class="alert alert-danger role=alert">
                    <b>Nama penyakit masih kosong, isi terlebih dahulu</b>
                </div>
             </div>';
             include "penyakitEdit.php";
    }
    elseif(trim($txtInfoPenyakit)==""){
        echo '<div class="container">
                <div class="alert alert-danger role=alert">
                    <b>Info penyakit masih kosong, isi terlebih dahulu</b>
                </div>
             </div>';
             include "penyakitEdit.php";
    }
    elseif(trim($txtPenanganan)==""){
        echo '<div class="container">
                <div class="alert alert-danger role=alert">
                    <b>Penanganan penyakit masih kosong, isi terlebih dahulu</b>
                </div>
             </div>';
             include "penyakitEdit.php";
    }
    elseif(trim($txtGambar)==""){
        echo '<div class="container">
                <div class="alert alert-danger role=alert">
                    <b>Url Gambar penyakit masih kosong, isi terlebih dahulu</b>
                </div>
             </div>';
             include "penyakitEdit.php";
    }
    else{
        //update ke table
        $sql = "UPDATE penyakit set
                            id_penyakit = '$txtKode',
                            nama_penyakit = '$txtPenyakit',
                            info_penyakit = '$txtInfoPenyakit',
                            penanganan = '$txtPenanganan',
                            gambar = '$txtGambar'
                            where id_penyakit = '$txtKode'";
        mysqli_query($koneksi, $sql) or die("sql in error".mysqli_error($koneksi));

        echo '<div class="container">
                <div class="alert alert-success role=alert">
                    <b>DATA BERHASIL DIEDIT</b>
                </div>
             </div>';
             include "penyakitTampil.php"; 
    }
?>