<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Sispakacang</title>
  <!-- SCRIPT -->
  <script src="js/vue.js"></script>
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <div id="app">
    <nav class="green" role="navigation">
      <div class="nav-wrapper container "><a id="logo-container" href="index.php?page=daftar" class="brand-logo">SISPAKAJANG</a>
      <ul class="right hide-on-med-and-down">
          <li><a href="index.php?page=daftar" class="noatt white-text">Konsultasi</a></li>
          <!--<li><a href="?page=daftarPenyakit.php" class="noatt white-text">Daftar Penyakit</a></li>-->
          <li><a href="info.php" class="noatt white-text">Info Penyakit</a></li>
          <li><a onclick="myFunction()" class="noatt white-text">ADMIN??</a></li>
        </ul>

        <ul id="nav-mobile" class="sidenav">
          <li><a href="index.php?page=daftar">Konsultasi</a></li>
          <!--<li><a href="?page=daftarPenyakit.php">Daftar Penyakit</a></li>-->
          <li><a href="info.php">Info Penyakit</a></li>
          <li><a onclick="myFunction()">ADMIN??</a></li>
        </ul>
        <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      </div>
    </nav>
    <div class="section no-pad-bot" id="index-banner" v-if="mulai">
        <div class="container">
            <br><br>
            <h3 class="header center orange-text">Daftar Penyakit</h3>
            <div class="row">
                <?php include 'koneksi.php';
                    $query = "SELECT*FROM  penyakit where id_penyakit != '000' ORDER BY id_penyakit ASC";
                    $result = mysqli_query ($koneksi, $query);
                    if(mysqli_num_rows($result)>0)
                    {
                      while($row = mysqli_fetch_array($result))
                      {
                ?>
                      <div class="col-md-6">
                          <div class="text-justify">
                            <form method="POST" action="info.php?action=add&id=<?php echo $row["id"]; ?>">
                                <div style="border:1px solid #000; border-radius:5px; margin-bottom:10px; padding:0px 10px 0px 10px">
                                    <img src="<?php echo $row ["gambar"];?>" class="col-md-12" style="height:300px; margin:15px 0px"><br>
                                    <h5 class="center"><?php echo $row ["nama_penyakit"];?></h5>
                                    <p><b>Informasi Penyakit:</b></p>
                                    <p class="text-danger"><?php echo $row ["info_penyakit"];?></p><br>
                                    <p><b>Pengendalian Penyakit:</b></p>
                                    <p class="text-info"><?php echo $row ["penanganan"];?></p><br>
                                    <p><b>Gejala:</b></p>
                                      <ul>
                                        <?php include 'koneksi.php';
                                        $idpenyakit = $row['id_penyakit'];
                                        $gejalaQue = "SELECT DISTINCT nama_gejala
                                        FROM rules_penyakit
                                        JOIN gejala ON rules_penyakit.id_gejala = gejala.id_gejala
                                        JOIN penyakit ON rules_penyakit.id_penyakit = penyakit.id_penyakit
                                        WHERE rules_penyakit.id_penyakit = '$idpenyakit'";
                                        $gejalaRes = mysqli_query ($koneksi, $gejalaQue);
                                        if(mysqli_num_rows($gejalaRes)>0)
                                        {
                                          while($gejalaRow = mysqli_fetch_array($gejalaRes))
                                          {?>
                                            <!-- <p class="text-danger"><?php echo $gejalaRow ["nama_gejala"];?></p><br> -->
                                            <li> - <?php echo $gejalaRow ["nama_gejala"];?></li>
                                            <?php
                                          }
                                        }
                                        ?>
                                        
                                      </ul>
                                </div>
                            </form>
                          </div>
                      </div>
                <?php            
                        }
                    }
                ?>
            </div>
            <br><br>
        </div>
    </div>

    <footer class="page-footer green">
      <div class="footer-copyright">
        <div class="container">
        Powered by <a class="orange-text text-lighten-3" href="http://materializecss.com">Materialize</a>
        </div>
      </div>
    </footer>
  </div>  
</body>
</html>
