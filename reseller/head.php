  <!-- Body main wrapper start -->
  <div class="wrapper fixed__footer">
        <!-- Start Header Style -->
        <header id="header" class="htc-header">
            <!-- Start Mainmenu Area -->
            <div id="sticky-header-with-topbar" class="mainmenu__area sticky__header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2 col-lg-2 col-6">
                            <div class="logo">
                                <a href="index.php">
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
                        </div>
                        <!-- Start MAinmenu Ares -->
                        <div class="col-md-6 col-lg-8 col-6">  
                            <ul class="menu-extra">
                                <li class="search search__open d-none d-sm-block"><span class="ti-search"></span></li>
                                <li><a href="user.php"><span class="ti-user"></span></a></li>
                                <li><a href="cart.php"><span class="ti-shopping-cart"></span></a></li>
                                
                            </ul>
                        </div>
                        <div class="col-md-2 col-lg-1 d-none d-md-block">
                            <nav class="mainmenu__nav  d-none d-lg-block">
                                <ul class="main__menu">
                                    <li class="drop " ><a href="#">Menu</a>
                                        <ul class="dropdown">
                                            <li><a href="about.php">about</a></li>
                                            <li><a href="orderan.php">orderan</a></li>
                                            <li><a href="riwayat.php">riwayat</a></li>
                                            <li><a href="logout.php">keluar</a></li>
                                        </ul>
                                    </li>
                                    
                                    <!--<li><a href="kategori.php">Kategori</a></li>-->
                                </ul>
                                
                            </nav>
                            
                            
                        </div>
                        <!-- End MAinmenu Ares -->
                        
                    </div>
                   
                </div>
            </div>
            <!-- End Mainmenu Area -->
        </header>
        <!-- End Header Style -->
        
        <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">
            <!-- Start Search Popap -->
            <div class="search__area">
                <div class="container" >
                    <div class="row" >
                        <div class="col-md-12" >
                            <div class="search__inner">
                                <form action="pencarian.php" method="get">
                                    <input placeholder="Search here... " type="text" name="keyword">
                                    <button type="submit"></button>
                                </form>
                                <div class="search__close__btn">
                                    <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Search Popap -->
            <!-- Start Offset MEnu -->
            
            <!-- End Offset MEnu -->
            
        </div>
        <!-- End Offset Wrapper -->