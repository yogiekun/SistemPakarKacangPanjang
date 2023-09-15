<?php
    include "koneksi.php";
    //baca data dari konsultasi.php
    $rbPilih = $_REQUEST['rbPilih'];
    $txtIdGejala = $_REQUEST['txtIdGejala'];
    //get noID
    $noID = $_SERVER['REMOTE_ADDR'];

    //insert tmp_analisa
    function AddTmpAnalisa($id_gejala, $noID){
        include "koneksi.php";
        $sql_sakit = "SELECT rules_penyakit.* from rules_penyakit, tmp_penyakit
                        where rules_penyakit.id_penyakit = tmp_penyakit.id_penyakit
                        and noID='$noID' order by rules_penyakit.id_penyakit, rules_penyakit.id_gejala";
        $query_sakit = mysqli_query($koneksi, $sql_sakit);
        /*if (!$query_sakit) {
            printf("Error: %s\n", mysqli_error($koneksi));
            exit();
        }*/ //untuk cek query
        while ($result_sakit = mysqli_fetch_array($query_sakit)){
            $sqltmp = "INSERT into tmp_analisa (noID, id_penyakit, id_gejala)
                        values ('$noID', '$result_sakit[id_penyakit]', '$result_sakit[id_gejala]')";
            mysqli_query($koneksi, $sqltmp);
        }
    }

    //insert tmp_gejala
    function AddTmpGejala($id_gejala, $noID){
        include "koneksi.php";
        $sql_gejala = "INSERT into tmp_gejala (id_gejala, noID) 
                        values ('$id_gejala', $noID')";
        mysqli_query($koneksi, $sql_gejala);
    }
    function AddCfYGejala($id_gejala, $noID){
        include "koneksi.php";
        $sql_cf = "INSERT INTO tmp_cf (id_gejala,noID,ket) 
                        VALUES ('$id_gejala','$noID','y')";
        mysqli_query($koneksi, $sql_cf);    
    }
    function AddCfNGejala($id_gejala, $noID){
        include "koneksi.php";
        $sql_cf = "INSERT INTO tmp_cf (id_gejala,noID,ket) 
                        VALUES ('$id_gejala','$noID','n')";
        mysqli_query($koneksi, $sql_cf);    
    }
    //delete tmp_penyakit
    function DelTmpPenyakit($noID){
        include "koneksi.php";
        $sql_del = "DELETE from tmp_penyakit where noID='$noID'";
        mysqli_query($koneksi, $sql_del);
    }
    //delete tmp_analisa
    function DelTmpAnalisa($noID){
        include "koneksi.php";
        $sql_del = "DELETE from tmp_analisa where noID='$noID'";
        mysqli_query($koneksi, $sql_del);
    }


    //----------------------------------------------------------------------------------------------------------


    //penalaran pertanyaan
    if ($rbPilih == "ya"){
        $sql_analisa = "SELECT * from tmp_analisa where noID='$noID'";
        $query_analisa = mysqli_query($koneksi, $sql_analisa);
        $result_analisa = mysqli_num_rows($query_analisa);
        //pada saat tmp_anasisa ada isi
        if($result_analisa >= 1){
            //penalaran pertanyaan lanjut
            DelTmpPenyakit($noID);
            $sql_tmp = "SELECT * from tmp_analisa
                        where id_gejala = '$txtIdGejala'
                        and noID = '$noID'";
            $query_tmp = mysqli_query($koneksi, $sql_tmp);
            while ($result_tmp = mysqli_fetch_array($query_tmp)){
                $sql_rsakit = "SELECT * FROM rules_penyakit
                                where id_penyakit = '$result_tmp[id_penyakit]'
                                group by id_penyakit";
                $query_rsakit = mysqli_query($koneksi, $sql_rsakit);
                            if (!$query_rsakit) {
                            printf("Error: %s\n", mysqli_error($koneksi));
                            exit();
                            } //untuk cek query
                while ($result_rsakit = mysqli_fetch_array($query_rsakit)){
                    //data penyakit yang mungkin menjangkit dimasukan ke tmp
                    $sql_input = "INSERT into tmp_penyakit (noID, id_penyakit)
                                    values ('$noID', '$result_rsakit[id_penyakit]')";
                    mysqli_query($koneksi, $sql_input);
                }
            }
            DelTmpAnalisa($noID);
            AddTmpAnalisa($txtIdGejala, $noID);
            AddTmpGejala($txtIdGejala, $noID);
            AddCfYGejala($txtIdGejala, $noID);
        }
        else{
            //kode saat tmp_analisa kosong
            $sql_rgejala = "SELECT * from rules_penyakit where id_gejala = '$txtIdGejala'";
            $query_rgejala = mysqli_query($koneksi, $sql_rgejala);
            while($result_rgejala = mysqli_fetch_array($query_rgejala)){
                $sql_rsakit = "SELECT * from rules_penyakit 
                                where id_penyakit = '$result_rgejala[id_penyakit]'
                                group by id_penyakit";
                $query_rsakit = mysqli_query($koneksi, $sql_rsakit);
                while ($result_rsakit = mysqli_fetch_array($query_rsakit)){
                    //data penyakit yang mungkin menjangkit di masukan ke tmp
                    $sql_input = "INSERT into tmp_penyakit(noID, id_penyakit)
                                    values ('$noID', '$result_rsakit[id_penyakit]')";
                    mysqli_query($koneksi, $sql_input);
                }
            }
            AddTmpAnalisa($txtIdGejala, $noID);
            AddTmpGejala($txtIdGejala, $noID);
            AddCfYGejala($txtIdGejala, $noID);
        }
        echo "<meta http-equiv='refresh' content='0; url=index.php?page=konsultasi'>";
    }
    if ($rbPilih == "tidak"){
        $sql_analisa = "SELECT * from tmp_analisa where noID='$noID'";
        $query_analisa = mysqli_query($koneksi, $sql_analisa);
        $result_analisa = mysqli_num_rows($query_analisa);
        if($result_analisa >= 1){
            AddCfNGejala($txtIdGejala, $noID);
            //kode saat tmp_analisa tidak kosong
            $sql_analisa2 = "SELECT * from tmp_analisa where id_gejala='$txtIdGejala'";
            $query_analisa2 = mysqli_query($koneksi, $sql_analisa2);
            while($result_analisa2 = mysqli_fetch_array($query_analisa2)){
                //hapus daftar rules_penyakit yang tidak mungkin karena tidak dipilih
                $sql_deltmp = "DELETE from tmp_analisa
                                where id_penyakit = '$result_analisa2[id_penyakit]'
                                and noID='$noID'";
                mysqli_query($koneksi, $sql_deltmp);

                //hapus dafrar penyakit yang sudah tidak mungkin menjangkit
                $sql_deltmp2 = "DELETE from tmp_penyakit
                                where id_penyakit = '$result_analisa2[id_penyakit]'
                                and noID='$noID'";
                mysqli_query($koneksi, $sql_deltmp2);
            }
        }
        else {
            //pindahkan data rules_penyakit ke tmp_analisa
            AddCfNGejala($txtIdGejala, $noID);
            $sql_rules = "SELECT * from rules_penyakit order by id_penyakit, id_gejala";
            $query_rules = mysqli_query($koneksi,$sql_rules);
            while($result_rules = mysqli_fetch_array($query_rules)){
                $sql_intmp = "INSERT into tmp_analisa (noID, id_penyakit, id_gejala)
                                values ('$noID', '$result_rules[id_penyakit]', '$result_rules[id_gejala]')";
                mysqli_query($koneksi, $sql_intmp);
                
                //masukan data penyakit yang mungkin terjangkit
                $sql_intmp2 = "INSERT into tmp_penyakit(noID, id_penyakit)
                                values ('$noID', '$result_rules[id_penyakit]')";
                mysqli_query($koneksi, $sql_intmp2);
            }

            //hapus tmp_analisa yang tidak sesuai
            $sql_rules2 = "SELECT * from rules_penyakit where id_gejala='$txtIdGejala'";
            $query_rules2 = mysqli_query($koneksi, $sql_rules2);
            while($result_rules2 = mysqli_fetch_array($query_rules2)){
                $sql_deltmp = "DELETE from tmp_analisa
                                where id_penyakit = '$result_rules2[id_penyakit]'
                                and noID='$noID'";
                mysqli_query($koneksi, $sql_deltmp);

                //hapus penyakit yang tidak mungkin menjangkit
                $sql_deltmp2 = "DELETE from tmp_penyakit
                                where id_penyakit = '$result_rules2[id_penyakit]'
                                and noID = '$noID'";
                mysqli_query($koneksi, $sql_deltmp2);
            }
        }
        echo "<meta http-equiv='refresh' content='0; url=index.php?page=konsultasi'>";
    }
?>