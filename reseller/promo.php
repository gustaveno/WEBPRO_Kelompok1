
<div class="slider__container slider--one">
            <div class="slider__activation__wrap owl-carousel owl-theme">
            <?php
                      $koneksi = mysqli_connect("localhost","root", "", "tubes2");
                      $i;
                      $sql = mysqli_query($koneksi, "SELECT * FROM promo");
                      while($data = mysqli_fetch_array($sql)){
                    
                        ?>
                <!-- Start Single Slide -->
                <div class="slide slider__full--screen" style="background: rgba(0, 0, 0, 0) url(../admin/upload/promo/<?php echo $data['image_prm']; ?> ) no-repeat scroll center center / cover ;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-4 col-sm-12 col-xs-12">
                                <div class="slider__inner">
                                    <h1>New <span class="text--theme">Promo</span></h1>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Slide -->
                <?php } ?>
            </div>
        </div>
       