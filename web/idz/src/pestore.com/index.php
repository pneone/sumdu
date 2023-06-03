<?php include_once('header.php')?>

    <main>
        <section class="section head-section wow animate__animated animate__fadeIn">
            <div class="container">
                <div class="wrapper">
                    <div class="catalog">
                        
                        <button class="btn"> <i class="fa-solid fa-border-all"></i>Каталог</button>
                        <ul class="wow animate__animated animate__fadeInLeft">
                            <li><a href="catalog.php?smartphones=on">Сматрфони</a></li>
                            <li><a href="catalog.php?smartwatch=on">Смарт-годинники</a></li>
                            <li><a href="catalog.php?laptop=on">Ноутбуки</a></li>
                            <li><a href="catalog.php?tablet=on">Планшети</a></li>
                            <li><a href="catalog.php?tv=on">Телевізори</a></li>
                            <li><a href="catalog.php?headphones=on">Навушники</a></li>
                            <li><a href="catalog.php?acoustics=on">Акустика</a></li>
                            <li><a href="catalog.php?accessories=on">Аксесуари</a></li>
                            <li><a href="catalog.php?consoles=on">Ігрові консолі</a></li>
                        </ul>
                    </div>
                    <div class="slider">
                        <div class="swiper mySwiper wow animate__animated animate__fadeInRight">
                            <div class="swiper-wrapper">
                              <div class="swiper-slide">
                                <div class="slide-img-box">
                                    <img src="img/Frame 11.jpg" alt="review">
                                </div>
                              </div>
                              <div class="swiper-slide">
                                <div class="slide-img-box">
                                    <img src="img/Frame 16.jpg" alt="review">
                                </div>
                              </div>
                              <div class="swiper-slide">
                                <div class="slide-img-box">
                                    <img src="img/Frame 15.jpg" alt="review">
                                </div>
                              </div>
                              <div class="swiper-slide">
                                <div class="slide-img-box">
                                    <img src="img/Frame 12.jpg" alt="review">
                                </div>
                              </div>
                              <div class="swiper-slide">
                                <div class="slide-img-box">
                                    <img src="img/Frame 13.jpg" alt="review">
                                </div>
                              </div>
                              <div class="swiper-slide">
                                <div class="slide-img-box">
                                    <img src="img/Frame 14.jpg" alt="review">
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section popular-categories-section wow animate__animated animate__fadeInUp">
            <div class="container">
                <div class="wrapper">
                    <div class="section-head">
                        <img class="section-head-img1" src="img/popular.jpg" alt="Categories">
                        <img class="section-head-img2" src="img/popular-mob.jpg" alt="Categories">
                        <h2 class="h2">Найпопулярніші категорії товарів</h2>
                    </div>
                    <ul class="category-list">
                        <li>
                            <a href="catalog.php?headphones=on">
                                <h3 class="h3">Навушники</h3>
                                <p>Від 249 UAH</p>
                            </a>
                            <img src="img/02.png" alt="Watch">
                        </li>
                        <li>
                            <a href="catalog.php?laptop=on">
                                <h3 class="h3">Ноутбуки</h3>
                                <p>Від 9 699 UAH</p>
                            </a>
                            <img src="img/04.png" alt="Watch">
                        </li>
                        <li>
                            <a href="catalog.php?tablet=on">
                                <h3 class="h3">Планшети</h3>
                                <p>Від 3 799 UAH</p>
                            </a>
                            <img src="img/07.png" alt="Watch">
                        </li>
                        <li>
                            <a href="catalog.php?smartphones=on">
                                <h3 class="h3">Смартфони</h3>
                                <p>Від 3 499 UAH</p>
                            </a>
                            <img src="img/10.png" alt="Watch">
                        </li>
                        <li>
                            <a href="catalog.php?consoles=on">
                                <h3 class="h3">Ігрові консолі</h3>
                                <p>Від 11 499 UAH</p>
                            </a>
                            <img src="img/image 101.png" alt="Watch">
                        </li>
                        <li>
                            <a href="catalog.php?tv=on">
                                <h3 class="h3">Телевізори</h3>
                                <p>Від 4 999 UAH</p>
                            </a>
                            <img src="img/tv.webp" alt="Watch">
                        </li>

                        <li>
                            <a href="catalog.php?smartwatch=on">
                                <h3 class="h3">Смарт-годинники</h3>
                                <p>Від 1 299 UAH</p>
                            </a>
                            <img src="img/popular-1.png" alt="Watch">
                        </li>
                        <li>
                            <a href="catalog.php?acoustics=on">
                                <h3 class="h3">Акустика</h3>
                                <p>Від 449 UAH</p>
                            </a>
                            <img src="img/jbl.png" alt="Watch">
                        </li>
                    </ul>
                </div>
            </div>
        </section>


        <section class="section recommendations-section wow animate__animated animate__fadeInUp">
            <div class="container">
                <h2 class="h2">Рекомендовані товари</h2>
                <div class="recommendations-slider">
                    <ul class="swiper-wrapper">
                        <?php  
                            $query = mysqli_query($connect, "SELECT * FROM `products`");

                            $query = mysqli_fetch_all($query, MYSQLI_ASSOC);

                            $imageUrls = array();
                            
                            foreach($query as $product){
                            $imageBlob = $product['product_image'];
                            $imageType = image_type($imageBlob);
                            $base64Image = base64_encode($imageBlob);
                        
                            ?>
                                <li class="swiper-slide">
                                    <a href="/product.php?id=<?php echo $product['product_id']; ?>">
                                        <div class="wrapper">
                                            <div class="picture">
                                                <img src="data:<?php echo $imageType; ?>;base64,<?php echo $base64Image; ?>" alt="product">
                                            </div>
                                            <p class="price"><?php echo $product['product_price']; ?> UAH</p>
                                            <p class="title"><?php echo $product['product_title']; ?></p>
                                        </div>
                                    </a>
                                </li>
                            <?php
                            }

                            function image_type($imageBlob)
                            {
                                $signature = substr($imageBlob, 0, 2);
                            
                                switch ($signature) {
                                    case "\xFF\xD8":
                                        return 'image/jpeg';
                                    case "\x89\x50":
                                        return 'image/png';
                                    case "GIF":
                                        return 'image/gif';
                                    default:
                                        return 'image/jpeg';
                                }
                            }
                        ?>
                    </ul>
                  
                    <button class="recommendations-prev recommendations-btn"><i class="fa-solid fa-chevron-left"></i></button>
                    <button class="recommendations-next recommendations-btn"><i class="fa-solid fa-chevron-right"></i></button>
                </div>
                
            </div>
        </section>
    </main>

<?php include_once('footer.php');?>
