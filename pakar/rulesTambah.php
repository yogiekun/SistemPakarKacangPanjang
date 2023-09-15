<?php 
    include "../session.php";
    include "../koneksi.php";

    $kdsakit = isset($_GET['kdsakit']) ? $_GET['kdsakit'] : '';
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
  <script language="JavaScript" type="text/JavaScript">
        function MM_jumpMenu(targ,selObj,restore){ //v3.0
        eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
        if (restore) selObj.selectedIndex=0;
        }
  </script>
  <!--<script type="text/javascript">
        $(document).ready(function(){
        $('select').formSelect();
        });
  </script>-->
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
                <h3 class="header center orange-text">Buat Rules Gejala Penyakit</h3>
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
                  <form name="form1" method="post" action="rulesTambahFungsi.php">
                    <table class="table">
                        <tr>
                            <th colspan = "4"><b>Nama Penyakit :</b></th>
                        </tr>
                        <tr>
                            <td colspan = "4">
                            
                                <select name="cmbPenyakit" onChange="MM_jumpMenu('parent', this, 0)">
                                    <option disabled selected value="<?php echo $_SERVER['PHP_SELF'];?>">[DAFTAR PENYAKIT ]</option>
                                        <?php
                                        $sqlp = "SELECT * from penyakit order by id_penyakit";
                                        $queryp = mysqli_query($koneksi, $sqlp);
                                        while($resultp = mysqli_fetch_array($queryp)){
                                            //selected
                                            if($resultp['id_penyakit']==$kdsakit){
                                                $cek = 'selected';
                                            }
                                            else{
                                                $cek = "";
                                            }
                                               //kode select daftar
                                            echo "<option value='rulesTambah.php?kdsakit=$resultp[id_penyakit]' $cek>
                                                      $resultp[id_penyakit] | $resultp[nama_penyakit]
                                                  </option>";
                                        }
                                        ?>
                                </select>
                                <input name="txtKode" type="hidden" value="<?php echo $kdsakit; ?>">
                            
                            </td>
                        </tr>
                        <tr>
                            <th colspan="4"><b>Daftar Gejala : </b></th>
                        </tr>
                        <?php
                            $sql = "SELECT * from gejala order by id_gejala";
                            $query = mysqli_query($koneksi, $sql);
                            $no = 0;
                            while ($result = mysqli_fetch_array($query)){
                                $no++;
                                $sqlr = "SELECT * from rules_penyakit 
                                            where id_penyakit='$kdsakit'
                                            and id_gejala='$result[id_gejala]'";
                                $queryr = mysqli_query($koneksi, $sqlr) or die("sql in error".mysqli_error($koneksi));

                                $rowr = mysqli_num_rows($queryr);

                                //kode untuk nilai gejala terpilih + memberi warna
                                if($rowr == 1){
                                    $cek = "checked";
                                    $bg = "#CCFF00";
                                }
                                else{
                                    $cek = "";
                                    $bg = "#ffffff";
                                }
                        ?>
                        <tr style="background-color: #FFFFFF">
                            <td width="18" class="center"><?php echo $no; ?></td>
                            <td width="28" style="background-color: <?php echo $bg; ?>">
                                <label>
                                    <input name="cekGejala[]" type="checkbox" value="<?php echo $result['id_gejala']; ?>" <?php echo $cek; ?>><span></span>
                                </label>
                            </td>
                            <td width="50"><?php echo $result['id_gejala']; ?></td>
                            <td width="490"><?php echo $result['nama_gejala']; ?></td>
                        </tr>
                        <?php
                            }
                        ?>
                        <tr>
                            <td colspan="4" class="center">
                                <input class="btn-sm btn-success raised" type="submit" name="Submit" value="Simpan">
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