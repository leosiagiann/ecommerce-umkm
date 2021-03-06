<?php
    require_once 'koneksi.php';
    if($_SESSION['status'] != "masuk"){
        print "
            <script>
                alert('Anda harus melakukan login terlebih dahulu!!!');
                document.location.href = 'login.php'
            </script>
        ";
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Detail Produk</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="lib/nivo-slider/css/nivo-slider.css" rel="stylesheet">
    <link href="lib/owlcarousel/owl.carousel.css" rel="stylesheet">
    <link href="lib/owlcarousel/owl.transitions.css" rel="stylesheet">
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/venobox/venobox.css" rel="stylesheet">

    <!-- Nivo Slider Theme -->
    <link href="css/nivo-slider-theme.css" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Responsive Stylesheet File -->
    <link href="css/responsive.css" rel="stylesheet">
</head>

<body data-spy="scroll" data-target="#navbar-example" style="background : url(img/1.jpg) ;background-repeat: relative; background-size: cover;">
    <div id="preloader"></div>
    <!-- header-area start -->
    <header>
        <div id="sticker" class="header-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">

                        <!-- Navigation -->
                        <nav class="navbar navbar-default">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand page-scroll sticky-logo">
                                <h1>
                                    <span>
                                        E
                                    </span>
                                    -Commerce UMKM
                                </h1>
                            </a>
                        </div>
                        <!-- Brand -->

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a class="page-scroll" href="dashboard.php">Dashboard</a>
                                </li>
                                <li>
                                    <?php 
                                        if($_SESSION['admin']) { ?>
                                            <a class="page-scroll" href="beli.php">Daftar Penjualan</a><?php
                                        }
                                        else{?> 
                                            <a class="page-scroll" href="beli.php">Beli</a><?php
                                        }
                                    ?>
                                </li>
                                <li class="active">
                                    <?php 
                                        if($_SESSION['admin']) { ?>
                                            <a class="page-scroll" href="produk.php">Produk & Pesanan</a><?php
                                        }
                                        else{?> 
                                            <a class="page-scroll" href="keranjang.php">Keranjang</a><?php
                                        }
                                    ?>
                                </li>
                                <li>
                                    <a class="page-scroll" href="pengumuman.php">Pengumuman</a>
                                </li>
                                <li>
                                    <a class="page-scroll" href="logout.php">
                                        Logout
                                        <?php $_SESSION['username'] ?>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <!-- END: Navigation -->
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-area end -->

    <br><br><br><br><br>

    <section class="content" style="background-color: ; margin: 10px; border-radius: 10px;">
    <div class="row">
        <div class="col-sm-12">
             <div class="box box-primary">               
                <div class="box-body">                   
                    <a href="produk.php" style="margin:20px;" class="btn btn-success"><i class='fa fa-backward'> Kembali</i></a>
                    <?php
                        $produk = GetDaftarProduk($_GET['id']);
                    ?>
                    <center>
                        <table class="table text-left" style="width: 50%;">
                            <tr>
                                <th style="color: black; font-weight: bold">Kode Produk</th>
                                <th>:</th>
                                <td style="color: black ; font-weight: bold; font-family: 'Arial Black';"><?= $produk['kode_produk']; ?></td>
                            </tr>
                            <tr>
                                <th style="color: black; font-weight: bold">Nama Produk</th>
                                <th>:</th>
                                <td style="color: black ; font-weight: bold; font-family: 'Arial Black';"><?= $produk['nama_produk']; ?></td>
                            </tr>
                            <tr>
                                <th style="color: black; font-weight: bold">Kategori</th>
                                <th>:</th>
                                <td style="color: black ; font-weight: bold; font-family: 'Arial Black';"><?= $produk['kategori']; ?></td>
                            </tr>
                            <tr>
                                <th style="color: black; font-weight: bold">Stok</th>
                                <th>:</th>
                                <td style="color: black ; font-weight: bold; font-family: 'Arial Black';"><?= $produk['stok']; ?></td>
                            </tr>
                            <tr>
                                <th style="color: black; font-weight: bold">Harga</th>
                                <th>:</th>
                                <td style="color: black ; font-weight: bold; font-family: 'Arial Black';"><?= $produk['harga']; ?></td>
                            </tr>
                            <tr>
                                <th style="color: black; font-weight: bold">Harga</th>
                                <th>:</th>
                                <td><a class="venobox" data-gall="myGallery" href="img/d_produk/<?= $produk['kode_produk'] ?>.jpg"><img src="img/d_produk/<?= $produk['kode_produk'] ?>.jpg" style="height: 150px"></a></td>
                            </tr>
                        </table>
                    </center>
                    </div>                  
                </div>
            </div>
        </div>
    </div>
</section>

    <br><br><br><br>

    <!-- Start Footer bottom Area -->
    <footer style="position: absolute; bottom: 0px; text-align: center; width: 100%;">
        <div class="footer-area-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="copyright text-center">
                            <p>
                                &copy; Copyright
                                <strong>
                                    E-commerce UMKM
                                </strong>
                            </p>
                        </div>
                        <div class="credits">
                            Designed by Kelompok PSW-IX</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Ende Footer bottom Area -->

    <!-- Start Top Menu -->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    <!-- End Top Menu -->

    <!-- JavaScript Libraries -->
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/venobox/venobox.min.js"></script>
    <script src="lib/knob/jquery.knob.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/parallax/parallax.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/nivo-slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
    <script src="lib/appear/jquery.appear.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="contactform/contactform.js"></script>
    <script src="js/main.js"></script>
</body>
</html>