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
<?php
session_start();
$koneksi = mysqli_connect("localhost","root", "", "tubes2");

?>
<body>

        <!-- Start Login Register Area -->
        <div class="htc__login__register bg__white ptb--130" style="background: rgba(0, 0, 0, 0) url(images/bg/my2.jpg) no-repeat scroll center center / cover ;">
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
                                   echo "<meta http-equiv='refresh' content='1;url=index.php'>";
                               }else{
                                    echo "<div class='alert alert-danger text-center'>silahkan priksa akun anda</div>";
                                    echo "<meta http-equiv='refresh' content='1;url=login.php'>";
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
        <?php include 'Footer.php'; ?>
        <!-- End Footer Area -->
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