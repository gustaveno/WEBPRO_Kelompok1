<?php
session_start();
$koneksi = mysqli_connect("localhost","root", "", "tubes2");

?>
<!-- Start Cart Panel -->
<div class="shopping__cart">
                <div class="shopping__cart__inner">
                    <div class="offsetmenu__close__btn">
                        <a href="#"><i class="zmdi zmdi-close"></i></a>
                    </div>
                    <div class="shp__cart__wrap">
                    <?php $total_belanja =0;?>
                                         <?php foreach ($_SESSION['cart'] as $product_id => $jumlah): ?>
                                         <?php
                                        

                                        $ambil = $koneksi->query("SELECT * FROM products  WHERE product_id = '$product_id'");
                                        $pecah = $ambil->fetch_assoc();
                                        $subharga = $pecah['price'] * $jumlah;
                                        
                    
                                        ?>
                        <div class="shp__single__product">
                            <div class="shp__pro__thumb">
                                <a href="#">
                                    <img src=<img src=img src="../admin/upload/images/product/<?php echo $pecah['image']; ?>" alt="product images">
                                </a>
                            </div>
                            <div class="shp__pro__details">
                                <h2><a href="product-details.php"><?php echo $pecah['name']; ?></a></h2>
                                <span class="quantity">jumlah: <?php echo $jumlah; ?></span>
                                <span class="shp__price">RP.<?php echo number_format( $pecah['price'], 0,',','.'); ?></span>
                            </div>
                            <div class="remove__btn">
                                <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                            </div>
                        </div>
                        <?php $total_belanja+=$subharga;?>
                         <?php endforeach ?>
                    </div>
                    <ul class="shoping__total">
                        <li class="subtotal">total:</li>
                        <li class="total__price">RP. <?php echo number_format( $total_belanja, 0,',','.'); ?></li>
                    </ul>
                    <ul class="shopping__btn">
                        <li><a href="cart.php">View Cart</a></li>
                        <li class="shp__checkout"><a href="checkout.php">Checkout</a></li>
                    </ul>
                </div>
            </div>
            <!-- End Cart Panel -->