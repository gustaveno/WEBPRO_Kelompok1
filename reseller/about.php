<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>About || My Shop</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="images/logo/logo1.png">
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
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/bg0.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">About Us</h2>
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.php">Home</a>
                                  <span class="brd-separetor">/</span>
                                  <span class="breadcrumb-item active">About Us</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area --> 
        <!-- Start Our Store Area -->
        <section class="htc__store__area ptb--120 bg__white" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('images/about/1.jpg');">
            <div class="container">
                <div class="row" >
                <?php
                                    $koneksi = mysqli_connect("localhost","root", "", "tubes2");
                                    $i;
                                    $sql = mysqli_query($koneksi, "SELECT * FROM about");
                                    while($data = mysqli_fetch_array($sql)){
                                    
                                        ?>
                    <div class="col-md-12">
                        <div class="section__title section__title--2 text-center">
                            <h2 class="title__line" style="color:white;"><?php echo $data['judul'] ?></h2>
                            <p style="color:white;"><?php echo $data['deskripsi'] ?></p>
                        </div>
                      
                    </div>
                </div>
            </div>
        </section>
        <br>
        <!-- End Our Store Area -->
        <!-- Start Choose Us Area -->
        <section class="htc__choose__us__ares bg__white">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-lg-6 col-sm-12">
                        <div>
                            <div class="video__inner">
                            <!-- <img src="../admin/upload/about/<?php echo $data['gambar']; ?>" alt="logo" > -->
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d472.1235059741349!2d107.63865773802635!3d-6.971527869645244!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e99e2e1d8acd%3A0x5e207c596196c559!2sKost%20Bu%20Ineu!5e0!3m2!1sid!2sid!4v1642426549728!5m2!1sid!2sid" width="600" height="355" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="col-md-12 col-lg-6 col-sm-12">
                        <div class="htc__choose__wrap bg__cat--4">
                            <h2 class="choose__title">Why Choose Us?</h2>
                            <div class="choose__container">
                                <div class="single__chooose">
                                    <div class="choose__us">
                                        <div class="choose__icon">
                                            <span class="ti-heart"></span>
                                        </div>
                                        <div class="choose__details">
                                            <h4>Free Gift Box</h4>
                                            
                                        </div>
                                    </div>
                                    <div class="choose__us">
                                        <div class="choose__icon">
                                            <span class="ti-truck"></span>
                                        </div>
                                        <div class="choose__details">
                                            <h4>Free Delivery</h4>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="single__chooose">
                                    <div class="choose__us">
                                        <div class="choose__icon">
                                            <span class="ti-reload"></span>
                                        </div>
                                        <div class="choose__details">
                                            <h4>Money Back</h4>
                                            
                                        </div>
                                    </div>
                                    <div class="choose__us">
                                        <div class="choose__icon">
                                            <span class="ti-time"></span>
                                        </div>
                                        <div class="choose__details">
                                            <h4>Support 24/7</h4>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Choose Us Area -->
        
        
        
        <!-- Start brand Area -->
       
        <!-- End brand Area -->
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