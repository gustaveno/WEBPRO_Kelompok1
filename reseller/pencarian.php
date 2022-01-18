<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>webmyshop</title>
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
  

<?php include 'head.php'; ?>

<section class="htc__product__area ptb--130 bg__white">
            <div class="container">
                <div class="htc__product__container">
                <h1 class="bradcaump-title">Hasil pencarian:</h1><br> <br> 
                    <div class="row product__list">

                    <?php
                                    $keyword = $_GET["keyword"];
                                    $koneksi = mysqli_connect("localhost","root", "", "tubes2");
                                    $i;
                                    $ambil = $koneksi->query("SELECT * FROM products WHERE name LIKE '%$keyword%' OR description LIKE '%$keyword%' ");
                                    while($data = mysqli_fetch_array($ambil)){
                                    
                                        ?>
                        <!-- Start Single Product -->
                        <div class="col-md-3 single__pro col-lg-3 col-md-4 col-sm-12 <?php echo $data['kategori_id']; ?>">
                            <div class="product foo">
                                <div class="product__inner">
                                    <div class="pro__thumb">
                                    
                                        <a href="product-details.php?id=<?php echo $data['product_id'] ?>">
                                            <img src="../admin/upload/product/<?php echo $data['image']; ?>" alt="product images">
                                        </a>
                                    </div>
                                    <div class="product__hover__info">
                                        <ul class="product__action">
                                            
                                            <li><a title="Add TO Cart" href="beli.php?id=<?php echo $data['product_id'] ?>"><span class="ti-shopping-cart"></span></a></li>
                                        </ul>
                                    </div>
                                   
                                </div>
                                <div class="product__details">
                                    <h2><a href="product-details.php?id=<?php echo $data['product_id'] ?>"><?php echo $data['name']; ?></a></h2>
                                    <ul class="product__price">
                                    <li>stok[<?php echo $data['stok']; ?>]</li>
                                        <li class="new__price">RP.<?php echo number_format( $data['price'], 0,',','.'); ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <!-- End Single Product -->
                       
                    </div>
                </div>
            </div>
        </section>

<?php include 'Footer.php'; ?>


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