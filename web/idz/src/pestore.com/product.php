<?php
    include_once('header.php');
    require_once 'inc/connect.php';

    $id = $_GET['id'];
    $query = mysqli_query($connect, "SELECT * FROM `products` WHERE `product_id` = '$id';");

    $query = mysqli_fetch_all($query, MYSQLI_ASSOC);

    $imageUrls = array();

    foreach($query as $product){
        $imageBlob = $product['product_image'];
        $imageType = image_type($imageBlob);
        $base64Image = base64_encode($imageBlob);
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

    <main>
        <section class="section product-item-section">
            <div class="container">
                <div class="wrapper">
                    
                    <div class="wrapper thumbnail">
                    <img src="data:<?php echo $imageType; ?>;base64,<?php echo $base64Image; ?>" alt="">
                    </div>

                    <div class="content">
                        <h1 class="title"><?php echo $product['product_title']; ?></h1>

                        <div class="descr">
                            <?php echo $product['product_info']; ?>
                        </div>

                        <p class="price"><?php echo $product['product_price']; ?> UAH</p>

                        <button  class="btn-green">Замовити</button>
                    </div>

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
                        ?>
                    </ul>
                  
                    <button class="recommendations-prev recommendations-btn"><i class="fa-solid fa-chevron-left"></i></button>
                    <button class="recommendations-next recommendations-btn"><i class="fa-solid fa-chevron-right"></i></button>
                </div>
                
            </div>
        </section>
    </main>

<?php
    include_once('footer.php')
?>
