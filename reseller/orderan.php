<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>My shop</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    
    <!-- Bootstrap Fremwork Main Css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- All Plugins css -->
    <link rel="stylesheet" href="css/plugins.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="css/custom.css">

    <!-- Modernizr JS -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
<?php
session_start();
$koneksi = mysqli_connect("localhost","root", "", "tubes2");



?>
<?php include 'head.php'; ?>
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/bg0.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">belum di bayar</h2>
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.php">Home</a>
                                  <span class="brd-separetor">/</span>
                                  <span class="breadcrumb-item active">orderan</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="cart-main-area ptb--120 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12">
                        <form action="#">        
                               
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">nama</th>
                                            <th class="product-name">alamat</th>
                                            <th class="product-price">tanggal pembelian</th>
                                            <th class="product-quantity">total bayar</th>
                                            <th class="product-quantity">status</th>
                                            <th colspan="2" class="product-remove">aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    
                                         
                                         <?php
                                        $id = $_SESSION['reseller']['reseller_id'];

                                        $ambil = $koneksi->query("SELECT * FROM pembelian  WHERE id_pelanggan = '$id'");
                                        
                                        
                                        if (empty($ambil) or !isset($ambil)) {
                                            echo "<script>alert('Keranjang Kosong Silahkan Belanja Terlebih Dahulu')</script>";
                                            echo "<script>location='index.php';</script>";
                                        }
                                        while($pecah = mysqli_fetch_array($ambil)){
                                        ?>
                                        <tr>
                                            <td class="product-name"><?php echo $_SESSION['reseller']['username']; ?></td>
                                            <td class="product-name"><?php echo $_SESSION['reseller']['alamat']; ?></td>
                                            <td class="product-name"><?php echo $pecah['tanggal_pembelian']; ?></td>
                                            <td class="product-subtotal">RP.<?php echo number_format( $pecah['total_pembelian'], 0,',','.'); ?></td>
                                            <td class="product-name">Belum di bayar</td>
                                            <td class="product-remove" ><a href="detail_orderan.php?id=<?php echo $pecah['id_pembelian']; ?>">Detail</a></td>
                                            <td class="product-remove" onclick="return confirm('apakah anda yakin ingin membatalkan ?')"><a href="crud/order/hapus_order.php?id=<?php echo $pecah['id_pembelian']; ?>">X</a></td>
                                        </tr>
                                        
                                        <?php } ?>
                                    </tbody>
                                    
                                </table>
                            </div>
                            
                        </form> 
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-main-area end -->
        <?php include 'Footer.php'; ?>
    </div>
    <!-- Body main wrapper end -->
    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!-- Bootstrap Framework js -->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- All js plugins included in this file. -->
    <script src="js/plugins.js"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="js/main.js"></script>

</body>

</html>