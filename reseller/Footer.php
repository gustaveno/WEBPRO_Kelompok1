 <!-- Start Footer Area -->
 <footer class="" style="background: rgba(0, 0, 0, 0.1) url(images/bg/bg0.jpg) no-repeat scroll center center / cover ;">
            <div class="container">
                <div class="row footer__container clearfix">
                    <!-- Start Single Footer Widget -->
                    <div class="col-md-6 col-lg-3 col-sm-6">
                        <div class="ft__widget">
                            <div class="ft__logo">
                                <a href="#">
                                <?php
                                    $koneksi = mysqli_connect("localhost","root", "", "tubes2");
                                    $i;
                                    $sql = mysqli_query($koneksi, "SELECT * FROM about");
                                    while($data = mysqli_fetch_array($sql)){
                                    
                                        ?>
                                    <img src="../admin/upload/about/<?php echo $data['gambar']; ?>" alt="footer logo">
                                    <?php } ?>
                                </a>
                            </div>
                            <div class="footer__details">
                                <p>Belanja mudah hanya ada di sini.</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Footer Widget -->
                    <!-- Start Single Footer Widget -->
                    
                    <!-- End Single Footer Widget -->
                    <!-- Start Single Footer Widget -->
                    <div class="col-md-6 col-lg-3 col-sm-6 smt-30 xmt-30">
                        <div class="ft__widget ">
                            <h2 class="ft__title">Contact Us</h2>
                            <div class="footer__inner">
                                <p> Jl. Telekomunikasi, Kab. Bandung, Jawa Barat </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Footer Widget -->
                    <!-- Start Single Footer Widget -->
                    <div class="col-md-6 col-lg-2 lg-offset-1 col-sm-6 smt-30 xmt-30">
                        <div class="ft__widget">
                            <h2 class="ft__title">Follow Us</h2>
                            <ul class="social__icon">
                                <li><a href="https://wa.me/message/ZQ463AOQUZAAL1" target="_blank"><i class="zmdi zmdi-whatsapp"></i></a></li>
                                <li><a href="https://www.instagram.com/myachya_?r=nametag" target="_blank"><i class="zmdi zmdi-instagram"></i></a></li>
                                <li><a href="https://m.facebook.com/myshop-pekalongan-101996407927207/?ref=bookmarks" target="_blank"><i class="zmdi zmdi-facebook"></i></a></li>
                                
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
                                    <p>© 2021 <strong><a href="https://chat.whatsapp.com/E65A7fpeaHnJ57gb816EIZ" target="_blank">Kelompok 1</a></strong>
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