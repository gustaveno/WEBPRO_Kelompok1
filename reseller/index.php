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
        <!-- Start Slider Area -->
        <?php include 'promo.php'; ?>
        <!-- Start Slider Area -->
        <!-- Start Our Product Area -->
        <section class="htc__product__area ptb--130 bg__white">
            <div class="container">
                <div class="htc__product__container">
                    <!-- Start Product MEnu -->
                    <?php include 'kategori_mini.php'; ?>
                    <!-- End Product MEnu -->
                    <div class="row product__list">

                    <?php
                                    $koneksi = mysqli_connect("localhost","root", "", "tubes2");
                                    $i;
                                    $sql = mysqli_query($koneksi, "SELECT * FROM products");
                                    while($data = mysqli_fetch_array($sql)){
                                    
                                        ?>
                        <!-- Start Single Product -->
                        <div class="col-md-3 single__pro col-lg-3 col-md-4 col-sm-12 <?php echo $data['kategori_id']; ?>">
                            <div class="product foo">
                                <div class="product__inner">
                                    <div class="pro__thumb">
                                    
                                    <?php if($data['stok'] < 1){?>
                                        <img src="../reseller/images/product/habis.png" alt="product images">
                                         <?php }else{ ?>
                                        <a href="product-details.php?id=<?php echo $data['product_id'] ?>">
                                            <img src="../admin/upload/product/<?php echo $data['image']; ?>" alt="product images">
                                        </a>
                                        <div class="product__hover__info">
                                        <ul class="product__action">
                                            
                                            <li><a title="Add TO Cart" href="beli.php?id=<?php echo $data['product_id'] ?>"><span class="ti-shopping-cart"></span></a></li>
                                        </ul>
                                    </div>
                                   
                                        <?php } ?>
                                       
                                    </div>
                                    
                                </div>
                                <div class="product__details">
                                <?php if($data['stok'] < 1){?>
                                    <h2><a href="#>"><?php echo $data['name']; ?></a></h2>
                                         <?php }else{ ?>
                                            <h2><a href="product-details.php?id=<?php echo $data['product_id'] ?>"><?php echo $data['name']; ?></a></h2>
                                   
                                        <?php } ?>
                                   
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
        <!-- End Our Product Area -->
        <?php include 'Footer.php'; ?>
    </div>
    <!-- Body main wrapper end -->
    <!-- QUICKVIEW PRODUCT -->
    <!-- <div id="quickview-wrapper">
        
        <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal__container" role="document">
                <div class="modal-content">
                    <div class="modal-header modal__header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-product">
                            
                            <div class="product-images">
                                <div class="main-image images">
                                    <img alt="big images" src=img src="../admin/upload/images/product/big-img/1.jpg">
                                </div>
                            </div>
                            
                            <div class="product-info">
                                <h1>Simple Fabric Bags</h1>
                               
                                <div class="price-box-3">
                                    <div class="s-price-box">
                                        <span class="new-price">$17.20</span>
                                        <span class="old-price">$45.00</span>
                                    </div>
                                </div>
                                <div class="quick-desc">
                                    Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations creates a modern look.
                                </div>
                                <div class="select__color">
                                    <h2>Select color</h2>
                                    <ul class="color__list">
                                        <li class="red"><a title="Red" href="#">Red</a></li>
                                        <li class="gold"><a title="Gold" href="#">Gold</a></li>
                                        <li class="orange"><a title="Orange" href="#">Orange</a></li>
                                        <li class="orange"><a title="Orange" href="#">Orange</a></li>
                                    </ul>
                                </div>
                                <div class="select__size">
                                    <h2>Select size</h2>
                                    <ul class="color__list">
                                        <li class="l__size"><a title="L" href="#">L</a></li>
                                        <li class="m__size"><a title="M" href="#">M</a></li>
                                        <li class="s__size"><a title="S" href="#">S</a></li>
                                        <li class="xl__size"><a title="XL" href="#">XL</a></li>
                                        <li class="xxl__size"><a title="XXL" href="#">XXL</a></li>
                                    </ul>
                                </div>
                                
                                <div class="addtocart-btn">
                                    <a href="#">Add to cart</a>
                                </div>-->
                            <!-- </div>.product-info -->
                        <!--</div> .modal-product -->
                    <!--</div> --><!-- .modal-body -->
                <!--</div> --><!-- .modal-content -->
            <!--</div> --><!-- .modal-dialog -->
        <!--</div> -->
        <!-- END Modal
    </div> -->
    <!-- END QUICKVIEW PRODUCT -->
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