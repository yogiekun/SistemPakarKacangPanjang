<?php 
include "koneksi.php";

$noID = $_SERVER['REMOTE_ADDR'];
$sql = "SELECT konsultasi.*, penyakit.*
        from konsultasi, penyakit
        where penyakit.id_penyakit = konsultasi.id_penyakit
        and konsultasi.noID='$noID'
        order by konsultasi.id_konsultasi desc limit 1";
$query = mysqli_query($koneksi, $sql);
if (!$query) {
    printf("Error: %s\n", mysqli_error($koneksi));
    exit();
}
$result = mysqli_fetch_array($query);

//----------------------------------------------------------------------------------
    // menghitung cf

    //cf with echo
    /*
    $sql_cf = "SELECT rules_penyakit.* 
	                from rules_penyakit, tmp_cf
	                where rules_penyakit.id_gejala = tmp_cf.id_gejala 
                    and rules_penyakit.id_penyakit = '$result[id_penyakit]'";
    $query_cf = mysqli_query($koneksi, $sql_cf);
    if(mysqli_num_rows($query_cf)<1){
        //jawaban terdeteksi ya
        $sql_cf = "SELECT DISTINCT rules_penyakit.* 
	                from rules_penyakit, tmp_cf
	                where rules_penyakit.id_gejala != tmp_cf.id_gejala 
                    and rules_penyakit.id_penyakit = '$result[id_penyakit]'
                    order by RAND()
                    limit 2";
        $query_cf = mysqli_query($koneksi, $sql_cf);
        $i = 0;
        while ($result_cf = mysqli_fetch_array($query_cf)){
            $i++;                            
            echo "$result_cf[CF]<br>";
            $cfs =  $result_cf['keyakinan'] - $result_cf['ketidakyakinan'];
            if($i == 1){
                $cfh = $cfs;
                echo "////////<br>";
            }
            else{
                $cfh = $cfh + $cfs * (1 - $cfh);
                //echo "<br>----------hasil-----------<br>";
                echo $cfh."<br>-----------<br>";
            }
        }
        //perhitungan jawaban tidak
        $sql_cf2 = "SELECT rules_penyakit.* 
	                from rules_penyakit, tmp_cf
	                where rules_penyakit.id_gejala = tmp_cf.id_gejala 
                    and tmp_cf.ket = 'n'";
        $query_cf2 = mysqli_query($koneksi, $sql_cf2);
        $j = 0;
        $cfh2 = 0;
        while ($result_cf2 = mysqli_fetch_array($query_cf2)){
            $j++;                            
            echo "$result_cf2[ketidakyakinan]<br>";
            $cfs2 = $result_cf2['ketidakyakinan'];
            if($j == 1){
                $cfh2 = $cfs2;
            }
            else{
                $cfh2 = $cfh2 + $cfs2 * (1 - $cfh2);
                //echo "<br>----------hasil-----------<br>";
                echo "$cfh2 <br>----------<br>";
            }
        }
        
        $cfh."<br>";
        //$cft = $cfh - (1 - $cf);
        $cft = $cfh * 100;
        
        echo "**************<br>";
        echo $cfh."<br>";
        echo $cfh2."<br>";
        //$cft = $cfh - (1 - $cf);
        $cft = ($cfh - ($cfh2/100)) * 100;
        echo "$cft <b>%</b>";
    }
    else{
        //ada jawaban yes
        $i = 0;
        while ($result_cf = mysqli_fetch_array($query_cf)){
            $i++;                            
            echo "$result_cf[CF]<br>";
            $cfs =  $result_cf['keyakinan'] - $result_cf['ketidakyakinan'];
            if($i == 1){
                $cfh = $cfs;
                echo "//////////<br>";
            }
            else{
                $cfh = $cfh + $cfs * (1 - $cfh);
                //echo "<br>----------hasil-----------<br>";
                echo "$cfh <br>-------------<br>";
            }
        }
        //perhitungan jawaban tidak
        $sql_cf2 = "SELECT rules_penyakit.* 
	                from rules_penyakit, tmp_cf
	                where rules_penyakit.id_gejala = tmp_cf.id_gejala 
                    and tmp_cf.ket = 'n'";
        $query_cf2 = mysqli_query($koneksi, $sql_cf2);
        $j = 0;
        $cfh2 = 0;
        while ($result_cf2 = mysqli_fetch_array($query_cf2)){
            $j++;                            
            echo "$result_cf2[ketidakyakinan]<br>";
            $cfs2 = $result_cf2['ketidakyakinan'];
            if($j == 1){
                $cfh2 = $cfs2;
            }
            else{
                $cfh2 = $cfh2 + $cfs2 * (1 - $cfh2);
                //echo "<br>----------hasil-----------<br>";
                echo $cfh2 ."<br>----------<br>";
            }
        }

         "**************<br>";
        echo $cfh."<br>";
        echo $cfh2."<br>";
        //$cft = $cfh - (1 - $cf);
        $cft = ($cfh - ($cfh2/100)) * 100;
        echo "$cft <b>%</b>";
    }
    */


    //cf no echo
    
    $sql_cf = "SELECT rules_penyakit.* 
	                from rules_penyakit, tmp_cf
	                where rules_penyakit.id_gejala = tmp_cf.id_gejala 
                    and rules_penyakit.id_penyakit = '$result[id_penyakit]'";
    $query_cf = mysqli_query($koneksi, $sql_cf);
    if(mysqli_num_rows($query_cf)<1){
        //jawaban terdeteksi ya
        $sql_cf = "SELECT DISTINCT rules_penyakit.* 
	                from rules_penyakit, tmp_cf
	                where rules_penyakit.id_gejala != tmp_cf.id_gejala 
                    and rules_penyakit.id_penyakit = '$result[id_penyakit]'
                    order by RAND()
                    limit 2";
        $query_cf = mysqli_query($koneksi, $sql_cf);
        $i = 0;
        while ($result_cf = mysqli_fetch_array($query_cf)){
            $i++;                            
             "$result_cf[CF]<br>";
            $cfs =  $result_cf['keyakinan'] - $result_cf['ketidakyakinan'];
            if($i == 1){
                $cfh = $cfs;
                 "////////<br>";
            }
            else{
                $cfh = $cfh + $cfs * (1 - $cfh);
                //echo "<br>----------hasil-----------<br>";
                 $cfh."<br>-----------<br>";
            }
        }
        //perhitungan jawaban tidak
        $sql_cf2 = "SELECT rules_penyakit.* 
	                from rules_penyakit, tmp_cf
	                where rules_penyakit.id_gejala = tmp_cf.id_gejala 
                    and tmp_cf.ket = 'n'";
        $query_cf2 = mysqli_query($koneksi, $sql_cf2);
        $j = 0;
        $cfh2 = 0;
        while ($result_cf2 = mysqli_fetch_array($query_cf2)){
            $j++;                            
             "$result_cf2[CF]<br>";
            $cfs2 = $result_cf2['ketidakyakinan'];
            if($j == 1){
                $cfh2 = $cfs2;
            }
            else{
                $cfh2 = $cfh2 + $cfs2 * (1 - $cfh2);
                 "<br>----------hasil-----------<br>";
                 "$cfh2 <br>----------<br>";
            }
        }
        
        $cfh."<br>";
        //$cft = $cfh - (1 - $cf);
        $cft = $cfh * 100;
        
         "**************<br>";
         $cfh."<br>";
         $cfh2."<br>";
        //$cft = $cfh - (1 - $cf);
        $cft = ($cfh - ($cfh2/100)) * 100;
         "$cft <b>%</b>";
    }
    else{
        //ada jawaban yes
        $i = 0;
        while ($result_cf = mysqli_fetch_array($query_cf)){
            $i++;                            
             "$result_cf[CF]<br>";
            $cfs =  $result_cf['keyakinan'] - $result_cf['ketidakyakinan'];
            if($i == 1){
                $cfh = $cfs;
                 "//////////<br>";
            }
            else{
                $cfh = $cfh + $cfs * (1 - $cfh);
                //echo "<br>----------hasil-----------<br>";
                 "$cfh <br>-------------<br>";
            }
        }
        //perhitungan jawaban tidak
        $sql_cf2 = "SELECT rules_penyakit.* 
	                from rules_penyakit, tmp_cf
	                where rules_penyakit.id_gejala = tmp_cf.id_gejala 
                    and tmp_cf.ket = 'n'";
        $query_cf2 = mysqli_query($koneksi, $sql_cf2);
        $j = 0;
        $cfh2 = 0;
        while ($result_cf2 = mysqli_fetch_array($query_cf2)){
            $j++;                            
             "$result_cf2[CF]<br>";
            $cfs2 = $result_cf2['ketidakyakinan'];
            if($j == 1){
                $cfh2 = $cfs2;
            }
            else{
                $cfh2 = $cfh2 + $cfs2 * (1 - $cfh2);
                //echo "<br>----------hasil-----------<br>";
                 "$cfh2 <br>----------<br>";
            }
        }

         "**************<br>";
         $cfh."<br>";
         $cfh2."<br>";
        //$cft = $cfh - (1 - $cf);
        $cft = ($cfh - ($cfh2/100)) * 100;
         "$cft <b>%</b>";
    }
?>   

<html>
<head>
    <title>Hasil Diagnosa</title>
</head>
<body>
    <div class="container">
        <h4> Hasil Kemungkinan Diagnosa Penyakit Kacang Panjang</h4>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div>
                    <h5><b>Data Petani</b></h5>
                    <p>Nama Petani : <?php  echo $result['nama_petani']; ?></p>
                    <p>Keluhan : <?php  echo $result['alamat']; ?></p>
                </div>

                <div>
                    <h5><b>Hasil Analisa :</b></h5>
                    <p>Penyakit : <b class="red-text"><?php echo $result['nama_penyakit']; ?></b></p>
                    <p>Kemungkinan : <b class="red-text"><?php echo $cft;?>&nbsp; &percnt;</b></p>
                </div>

                <div>
                    <p>Gejala :</p>
                    <ul>
                        <li>
                            <?php
                                $sql_gejala = "SELECT gejala.* from gejala, rules_penyakit
                                                where gejala.id_gejala = rules_penyakit.id_gejala
                                                and rules_penyakit.id_penyakit = '$result[id_penyakit]'";
                                $query_gejala = mysqli_query($koneksi, $sql_gejala);
                                $i = 0;
                                while ($result_gejala = mysqli_fetch_array($query_gejala)){
                                    $i++;
                                    echo "$i. $result_gejala[nama_gejala] <br>";
                                }
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div>
                    <h5><b>Gambar Penyakit :</b></h5>
                    <img src="<?php echo $result['gambar']; ?>" style="height:250px; margin:15px 0px">
                </div>
            </div>
        </div>
    </div>
    
    <div class="container">
    <div class="row">                
        <div class="col-md-6">
            <h5><b>Keterangan</b></h5>
            <p class="text-justify"> <?php echo $result['info_penyakit']; ?> </p>
        </div>

        <div class="col-md-6">
            <div>
                <h5><b>Penanganan</b></h5>
                <p class="text-justify"> <?php echo $result['penanganan']; ?> </p>
            </div>
        </div>
    </div>
    </div>

    <div class="row center">
          <a href="index.php?page=home" id="diagnosa" class="btn-lg waves-effect waves-light red noatt white-text">Selesai</a>
    </div>
</body>
</html>