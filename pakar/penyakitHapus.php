<?php
    include "../koneksi.php";

    $kdhapus = isset($_GET['kdhapus']) ? $_GET['kdhapus'] : '';

    if(isset($_GET['kdhapus'])){
        $sql = "DELETE from penyakit where id_penyakit = '$kdhapus'";
        mysqli_query($koneksi, $sql)  or die("sql in error".mysqli_error($koneksi));

        $sql2 = "DELETE from rules_penyakit where id_penyakit='$kdhapus'";
        mysqli_query($koneksi, $sql2)  or die("sql in error".mysqli_error($koneksi));

        echo 
            '<script type="text/javascript">
			//<![CDATA[
			window.location="penyakitTampil.php"
			//]]>
		</script>';
    }
?>