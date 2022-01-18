<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Checkout || Uniqlo-Minimalist eCommerce Bootstrap 4 Template</title>
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
if(!isset($_SESSION['reseller'])){
    echo "<script>alert('silahkan login terlebih dahulu')</script>";
    echo "<script>location='login.php';</script>";

}
?>
<body>
<?php include 'head.php'; ?>
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/bg0.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">Checkout</h2>
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.php">Home</a>
                                  <span class="brd-separetor">/</span>
                                  <span class="breadcrumb-item active">Checkout</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Checkout Area -->
        <section class="our-checkout-area ptb--120 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-lg-8">
                        <div class="ckeckout-left-sidebar">
                        <form method="post">
                            <!-- Start Checkbox Area -->
                            
                            <div class="checkout-form">
                                <h2 class="section-title-3">Order Barang</h2>
                               <!-- <pre><?php print_r($_SESSION['reseller']); ?></pre> -->
                                <div class="checkout-form-inner">
                               
                                    <div class="single-checkout-box">
                                    <p> Nama : <br></p>
                                       
                                        <input type="text" placeholder="<?php echo $_SESSION['reseller']['username'] ?>">
                                    </div>
                                    <div class="single-checkout-box">
                                    <p> kontak :<br></p>
                                        <input type="email" placeholder="<?php echo $_SESSION['reseller']['email'] ?>">
                                        
                                        <input type="text" placeholder="<?php echo $_SESSION['reseller']['phone'] ?>">
                                    </div>
                                    <div class="single-checkout-box">
                                    <p> alamat : <br></p>
                                        <textarea name="message" placeholder="<?php echo $_SESSION['reseller']['alamat'] ?>"></textarea>
                                    </div>
                                    <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">Gambar</th>
                                            <th class="product-name">Produk</th>
                                            <th class="product-price">harga</th>
                                            <th class="product-quantity">jumlah</th>
                                            <th class="product-subtotal">Total</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <?php $total_belanja =0;?>
                                         <?php foreach ($_SESSION['cart'] as $product_id => $jumlah): ?>
                                         <?php
                                        

                                        $ambil = $koneksi->query("SELECT * FROM products  WHERE product_id = '$product_id'");
                                        $pecah = $ambil->fetch_assoc();
                                        $subharga = $pecah['price'] * $jumlah;
                                        
                    
                                        ?>
                                        <tr>
                                            <td class="product-thumbnail"><a href="#"><img src="../admin/upload/product/<?php echo $pecah['image']; ?>" alt="product img" /></a></td>
                                            <td class="product-name"><a href="#"><?php echo $pecah['name']; ?></a></td>
                                            <td class="product-price"><span class="amount">RP.<?php echo number_format( $pecah['price'], 0,',','.'); ?></span></td>
                                            <td class="product-quantity"><?php echo $jumlah; ?></td>
                                            <td class="product-subtotal">RP.<?php echo number_format( $subharga, 0,',','.'); ?></td>
                                            
                                        </tr>
                                        <?php $total_belanja+=$subharga;?>
                                        <?php endforeach ?>
                                    </tbody>
                                    <tfoot>
                                    <th class="text-center" colspan="4">Total</th>
                                    <th class="text-center">RP.<?php echo number_format( $total_belanja, 0,',','.'); ?></th>
                                    </tfoot>
                                </table>
                            </div>
                                    
                                </div>
                            </div>
                            <!-- End Checkbox Area -->
                            <!-- Start Payment Box -->
                            
                            <!-- End Payment Box -->
                            <!-- Start Payment Way -->
                            
                            <!-- End Payment Way -->
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <div class="checkout-right-sidebar">
                            <div class="our-important-note">
                                <h2 class="section-title-3">perhatian :</h2>
                                <p class="note-desc">Sebelum anda memesan alangkah lebih baiknya kalian membaca peraturan terlebih dahulu.</p>
                                <ul class="important-note">
                                    <li><a href="#"><i class="zmdi zmdi-caret-right-circle"></i>Order di atas jam 16.00 WIB akan dikirim keesokan harinya (Senin-Jum'at).</a></li>
                                    <li><a href="#"><i class="zmdi zmdi-caret-right-circle"></i> Order di hari sabtu di atas jam 14.30 WIB akan di kirim Senin.</a></li>
                                    <li><a href="#"><i class="zmdi zmdi-caret-right-circle"></i>Produk yang tampil di Official Store ini berarti Produk Ready Stok.</a></li>
                                    <li><a href="#"><i class="zmdi zmdi-caret-right-circle"></i> DIATAS JAM 17.00 / HARI LIBUR , KAMI OFFLINE, Chat anda akan LANGSUNG kami balas saat online.</a></li>
                                    <li><a href="#"><i class="zmdi zmdi-caret-right-circle"></i> kalian boleh melakukan pengecekan sepuasnya saat COD.</a></li>
                                    <li><a href="#"><i class="zmdi zmdi-caret-right-circle"></i> 8. Tidak melayani pengembalian produk dengan alasan :<br>

                                                                                                a. Tidak jadi beli<br>

                                                                                                b. tidak suka barangnya<br>

                                                                                                c. kesalahan buyer dalam memilih barang<br>

                                                                                                d. Buyer berubah pikiran.</a></li>
                                    <li><a href="#"><i class="zmdi zmdi-caret-right-circle"></i> info lebih lanjut hubungi no dibawah.</a></li>
                                </ul>
                            </div>
                            <div class="puick-contact-area mt--60">
                                <h2 class="section-title-3">KONTAK WA</h2>
                                <a href="phone:+8801722889963">+62 01900 939 500</a>
                            </div>
                            <div class="contact-btn puick-contact-area mt--60">
                                        <button class="fv-btn" name="checkout">Order</button>
                                    </div>
                </form>
                <?php
                if(isset($_POST['checkout'])) {
                    $reseller_id = $_SESSION['reseller']['reseller_id'];
                    
                    $id_pembelian = uniqid();
                    $tanggal_pembelian = date("y-m-d");

                    //menyimpan data ketabel pembelian
                   $koneksi->query("INSERT INTO pembelian(id_pembelian, id_pelanggan, tanggal_pembelian, 
                    total_pembelian) VALUES('$id_pembelian', '$reseller_id', '$tanggal_pembelian', '$total_belanja')"); 

                    //$koneksi->query("INSERT INTO order(id_reseller, username, email, phone, alamat, date_time, 
                    //order_total)VALUES('$reseller_id', '$name', '$email', '$phone', '$alamat', '$tanggal_pembelian', '$total_belanja')"); 
                   
            $id_pembelian_barusan = $id_pembelian;

            foreach ($_SESSION['cart'] as $product_id => $jumlah) {
                $ambil = $koneksi->query("SELECT * FROM products  WHERE product_id = '$product_id'");
                $pecah = $ambil->fetch_assoc();
                $id_pembelian_produk = uniqid();
                $name = $pecah['name'];
                $foto = $pecah['image'];
                $harga = $pecah['price'];
                $koneksi->query("INSERT INTO pembelian_produk(id_pembelian_produk, id_pembelian, id_produk, 
                jumlah, nama, foto, harga) VALUES('$id_pembelian_produk', '$id_pembelian', '$product_id', '$jumlah', '$name', '$foto', '$harga')"); 
            }
            
            //mengkosongkan keranjang
            unset($_SESSION['cart']);


            echo "<script>alert('Pembelian berhasil')</script>";
            echo "<script>location='index.php';</script>";
            }

                ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Checkout Area -->
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