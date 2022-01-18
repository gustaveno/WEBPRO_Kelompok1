<center><h1 class="bradcaump-title">Kategori</h1></center><br> <br> 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="product__menu">
                                <button data-filter="*"  class="is-checked">All</button>
                                <?php
                                    $koneksi = mysqli_connect("localhost","root", "", "tubes2");
                                    $i;
                                    $sql = mysqli_query($koneksi, "SELECT * FROM kategori");
                                    while($data = mysqli_fetch_array($sql)){
                                    
                                        ?>
                                <button data-filter=".<?php echo $data['kategori_id']; ?>"><img src="../admin/upload/kategori/<?php echo $data['image_ktg']; ?>"  width="50px" height="50px" ><br><?php echo $data['kategori_name']; ?></button>
                                
                                <?php } ?>
                                <!--<a href="kategori.php">
                                More
                                </a>-->

                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->