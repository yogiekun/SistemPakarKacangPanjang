<?php 
include "../session.php";
include "../koneksi.php";

$kdubah = isset($_GET['kdubah']) ? $_GET['kdubah'] : '';

//tampil data yang mau diedit
$sql = "SELECT rules_penyakit.*, penyakit.nama_penyakit, gejala.nama_gejala 
            from rules_penyakit, gejala, penyakit 
            where gejala.id_gejala = rules_penyakit.id_gejala
            and  penyakit.id_penyakit = rules_penyakit.id_penyakit
            and id_rules = '$kdubah'
            order by id_penyakit, id_gejala";
$query = mysqli_query($koneksi, $sql);
$result = mysqli_fetch_array($query);

//masukan ke form
$txtKode = isset($_POST['txtKode']) ? $_POST['txtKode'] : $result['id_rules'];
$txtKodeG = isset($_POST['txtKodeG']) ? $_POST['txtKodeG'] : $result['id_gejala'];
$txtKodeP = isset($_POST['txtKodeP']) ? $_POST['txtKodeP'] : $result['id_penyakit'];
$txtGejala = isset($_POST['txtGejala']) ? $_POST['txtGejala'] : $result['nama_gejala'];
$txtPenyakit = isset($_POST['txtPenyakit']) ? $_POST['txtPenyakit'] : $result['nama_penyakit'];
$txtYakin = isset($_POST['txtYakin']) ? $_POST['txtYakin'] : $result['keyakinan'];
$txtTakYakin = isset($_POST['txtTakYakin']) ? $_POST['txtTakYakin'] : $result['ketidakyakinan'];
$txtCF = isset($_POST['txtCF']) ? $_POST['txtCF'] : $result['CF'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Sispakacang</title>
  <!-- SCRIPT -->
  <script src="../js/vue.js"></script>
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="../js/materialize.js"></script>
  <script src="../js/init.js"></script>
  <script type="../text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="../text/javascript" src="js/bootstrap.min.js"></script>
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!-- CSS  -->
  <link href="../css/bootstrap.css" type="text/css" rel="stylesheet" media="screen, projection"/>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
    <nav class="blue" role="navigation">
        <div class="nav-wrapper container "><a id="logo-container" href="index.php" class="brand-logo">ADMIN</a>
            <ul class="right hide-on-med-and-down">
                <li><a href="penyakitTampil.php">Data Penyakit</a></li>
                <li><a href="gejalaTampil.php">Data Gejala</a></li>
                <li><a href="rulesTampil.php">Data Rules</a></li>
                <li><a href="logout.php" onclick="return confirm('Yakin Mau Logout..?');" target="_self">Logout</a></li>
            </ul>

            <ul id="nav-mobile" class="sidenav">
                <li><a href="penyakitTampil.php">Data Penyakit</a></li>
                <li><a href="gejalaTampil.php">Data Gejala</a></li>
                <li><a href="rulesTampil.php">Data Rules</a></li>
                <li><a href="logout.php" onclick="return confirm('Yakin Mau Logout..?');" target="_self">Logout</a></li>
            </ul>
            <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav>

    <!--isi-->
    <div class="col-md-12 blue lighten-5">
        <div class="section no-pad-bot container" id="index-banner">
            <div>
                <h3 class="header center orange-text">Edit Data Rules</h3>
            </div>
        </div>
    </div>
    <div class="col-md-12 #e3f2fd blue lighten-5">
        <div class="col-md-8 col-md-offset-2 content">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <b>Data Rules</b>
                </div>
                <div class="panel-body">
                  <form name="form1" method="post" action="rulesEditFungsi.php">
                    <table class="table">
                        <tr>
                            <td>Kode Rules</td>
                            <td>
                                <input name="txtKode" type="hidden" maxlength="3" size="6" value="<?php echo $txtKode; ?>" placeholder="format 'G00' G lalu nomor urut tanpa spasi">
                                <label><?php echo $txtKode ;?></label>
                                <!--<textarea name="txtKode" type="text" maxlength="3" disabled="disabled" style="border: none" value="<?php //echo $txtKode; ?>"><?php //echo $txtKode; ?></textarea>-->
                                <!--<input name="txtKodeH" type="hidden" value="<?php //echo $txtKode; ?>">-->
                            </td>
                        </tr>
                        <tr>
                            <td>Kode Penyakit</td>
                            <td>
                                <input name="txtKodeP" type="hidden" maxlength="3" size="6" value="<?php echo $txtKodeP; ?>" placeholder="format 'P00' P lalu nomor urut tanpa spasi">
                                <label><?php echo $txtKodeP;?></label>
                            </td>
                        </tr>
                        <tr>
                            <td>Kode Gejala</td>
                            <td>
                                <input name="txtKodeG" type="hidden" maxlength="3" size="6" value="<?php echo $txtKodeG; ?>" placeholder="format 'G00' G lalu nomor urut tanpa spasi">
                                <label><?php echo $txtKodeG;?></label>
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Penyakit</td>
                            <td>
                                <input name="txtPenyakit" type="hidden" maxlength="3" size="6" value="<?php echo $txtPenyakit; ?>" placeholder="">
                                <label><?php echo $txtPenyakit;?></label>
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Gejala</td>
                            <td>
                                <input name="txtGejala" type="hidden" maxlength="3" size="6" value="<?php echo $txtGejala; ?>" placeholder="">
                                <label><?php echo $txtGejala;?></label>
                            </td>
                        </tr>
                        <tr>
                            <td width="135">Keyakinan</td>
                            <td width="450">
                                <input name="txtYakin" type="text" value="<?php echo $txtYakin; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td width="135">Ketidakyakinan</td>
                            <td width="450">
                                <input name="txtTakYakin" type="text" value="<?php echo $txtTakYakin; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>CF</td>
                            <td>
                                <input name="txtCF" type="hidden" maxlength="3" size="6" value="<?php echo $txtCF; ?>" placeholder="">
                                <label><?php echo $txtCF;?></label>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td class="right">
                            <input class="btn-sx btn-success raised" type="submit" name="Submit" value="Edit">
                            <a class="btn-sm btn-danger raised" href="rulesTampil.php">Kembali</a>
                            </td>
                        </tr>
                    </table>
                  </form>
                </div>
            </div>
        </div>
    </div>
    <footer class="page-footer blue">
      <div class="container"> 
        <div class="row">
          <div class="col l6 s12">
            <h5 class="white-text">Yogie Chandra Wangsa</h5>
            <p class="grey-text text-lighten-4">Saya adalah mahasiswa prodi teknik informatika semester 8 yang sedang mengambil skripsi dan aplikasi ini adalah judul yang saya angkat sebagai tugas akhir.</p>
          </div>
          <div class="col l3 s12">
            <h5 class="white-text"></h5>
            <ul>
              <li><a class="white-text" href="#!"></a></li>
              <li><a class="white-text" href="#!"></a></li>
            </ul>
          </div>
          <div class="col l3 s12">
            <h5 class="white-text">Contact</h5>
            <ul>
              <li><a class="white-text" href="#!">0896 9950 7592</a></li>
              <li><a class="white-text" href="#!">0851 5533 1928</a></li>
              <li><a class="white-text" href="http://Yogie.chandra@matanauniversity.ac.id">Email</a></li>
              <li><a class="white-text" href="http://github.com/yogiekun">Github</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="footer-copyright">
        <div class="container">
        Powered by <a class="orange-text text-lighten-3" href="http://materializecss.com">Materialize</a>
        </div>
      </div>
    </footer>
  </body>
</html>