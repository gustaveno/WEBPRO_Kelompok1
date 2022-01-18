<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>MY shop</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    
    <!-- Bootstrap Fremwork Main Css -->
    <link rel="stylesheet" href="reseller/css/bootstrap.min.css">
    <!-- All Plugins css -->
    <link rel="stylesheet" href="reseller/css/plugins.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="reseller/css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="reseller/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="reseller/css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="reseller/css/custom.css">

    <!-- Modernizr JS -->
    <script src="reseller/js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<?php
session_start();
$koneksi = mysqli_connect("localhost","root", "", "tubes2");

?>
<body>

        <!-- Start Login Register Area -->
        <div class="htc__login__register bg__white ptb--130" style="background: rgba(0, 0, 0, 0) url(reseller/images/bg/bg4.jpg) no-repeat scroll center center / cover ;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <ul class="login__register__menu nav justify-contend-center" role="tablist">
                            <li role="presentation" class="login active"><a class="active" href="#login" role="tab" data-toggle="tab">Login</a></li>
                        
                        </ul>
                    </div>
                </div>
                <!-- Start Login Register Content -->
                <div class="row tab-content">
                    <div class="col-md-6  ml-auto mr-auto">
                        <div class="htc__login__register__wrap">
                            <!-- Start Single Content -->
                            <div id="login" role="tabpanel" class="single__tabs__panel tab-pane active">
                                <form class="login" method="post">
                                    <input type="email" class="form-control" name="email"  placeholder="User Name">
                                    <input type="password" class="form-control" name="password"  placeholder="Password">
                               
                                
                                <button class="btn btn-lg btn-primary btn-block" name="login">
                                  Login  
                                </button>
                                </form>
                                
                            </div>
                            <!-- End Single Content -->
                            <?php
                           if(isset($_POST['login'])) {
                               $email = $_POST['email'];
                               $password = $_POST['password'];

                              $ambil = $koneksi->query("SELECT * FROM reseller  WHERE email = '$email'
                               AND password ='$password'");
                               $akun_cocok = $ambil->num_rows;

                               if ($akun_cocok == 1) {
                                   $akun = $ambil->fetch_assoc();

                                   $_SESSION['reseller'] = $akun;
                                   echo "<div class='alert alert-success text-center'>Login berhasil</div>";
                                   echo "<meta http-equiv='refresh' content='1;url=reseller/index.php'>";
                               }else{
                                    echo "<div class='alert alert-danger text-center'>silahkan priksa akun anda</div>";
                                    echo "<meta http-equiv='refresh' content='1;url=index.php'>";
                               }
                           }
                           ?>
                        </div>
                    </div>
                </div>
                <!-- End Login Register Content -->
            </div>
        </div>
        <!-- End Login Register Area -->
        <!-- Start Footer Area -->
         <!-- Start Footer Area -->
        <footer class="htc__foooter__area" style="background: rgba(0, 0, 0, 0) url(reseller/images/bg/bg0.jpg) no-repeat scroll center center / cover ;">
            <div class="container">
                <div class="row footer__container clearfix">
                    <!-- Start Single Footer Widget -->
                    <div class="col-md-6 col-lg-3 col-sm-6">
                        <div class="ft__widget">
                            <div class="ft__logo">
                                <a href="index.php">
                                    <img src="reseller/images/logo/logo1.png" alt="footer logo">
                                </a>
                            </div>
                            <div class="footer__details">
                                <p>Get 10% discount with notified about the latest news and updates.</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Footer Widget -->
                    <!-- Start Single Footer Widget -->
                    
                    <!-- End Single Footer Widget -->
                    <!-- Start Single Footer Widget -->
                    <div class="col-md-6 col-lg-3 col-sm-6 smt-30 xmt-30">
                        <div class="ft__widget contact__us">
                            <h2 class="ft__title">Contact Us</h2>
                            <div class="footer__inner">
                                <p> kedungwuni </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Footer Widget -->
                    <!-- Start Single Footer Widget -->
                    <div class="col-md-6 col-lg-2 lg-offset-1 col-sm-6 smt-30 xmt-30">
                        <div class="ft__widget">
                            <h2 class="ft__title">Follow Us</h2>
                            <ul class="social__icon">
                                <li><a href="admin/index.php/admin/login" target="_blank"><i class="zmdi zmdi-twitter"></i></a></li>
                                <li><a href="https://www.instagram.com/devitems/" target="_blank"><i class="zmdi zmdi-instagram"></i></a></li>
                                <li><a href="https://www.facebook.com/devitems/?ref=bookmarks" target="_blank"><i class="zmdi zmdi-facebook"></i></a></li>
                                <li><a href="https://plus.google.com/" target="_blank"><i class="zmdi zmdi-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Single Footer Widget -->
                </div>
                <!-- Start Copyright Area -->
                <div class="htc__copyright__area">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="copyright__inner">
                                <div class="copyright">
                                    <p>© 2020 <a href="https://freethemescloud.com/" target="_blank">AKN KAJEN</a>
                                    All Right Reserved.</p>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Copyright Area -->
            </div>
        </footer>
        <!-- End Footer Area -->
        <!-- End Footer Area -->
    </div>
    <!-- Body main wrapper end -->
    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
    <script src="reseller/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- Bootstrap Framework js -->
    <script src="reseller/js/popper.min.js"></script>
    <script src="reseller/js/bootstrap.min.js"></script>
    <!-- All js plugins included in this file. -->
    <script src="reseller/js/plugins.js"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="reseller/js/main.js"></script>

</body>

</html>