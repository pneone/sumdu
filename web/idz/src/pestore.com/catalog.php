<?php
    include_once('header.php');
  
    require_once 'inc/connect.php';
    $search = $_GET['search'];
    $smartphones = $_GET['smartphones'];
    $smartwatch = $_GET['smartwatch'];
    $laptop = $_GET['laptop'];
    $tablet = $_GET['tablet'];
    $tv = $_GET['tv'];
    $headphones = $_GET['headphones'];
    $acoustics = $_GET['acoustics'];
    $accessories = $_GET['accessories'];
    $consoles = $_GET['consoles'];
?>

    <main>
         <section class="recommendations-section  catalog-section">
            <div class="container products ">
                <div class="sidebar">
                    <form action="inc/search.php" method="post">
                        <div class="settings">

                        <input name="search" <?php echo ($search) ? 'value="' . $search . '"' : '';?> class="form-control catalog-search" type="text" placeholder="Пошук">

                        <div class="settings__title">Категорії:</div>
    
                        <ul class="settings_list">
                            <li>                    
                                <input class="settings-input" <?php echo ($smartphones) ? 'checked' : '';?> type="checkbox" name="smartphones" id="smartphones">
                                <label class="settings-label" for="smartphones">Смартфони</label>
                            </li>
                            <li>                    
                                <input class="settings-input" <?php echo ($headphones) ? 'checked' : '';?> type="checkbox" name="headphones" id="headphones">
                                <label class="settings-label" for="headphones">Навушники</label>
                            </li>
                            <li>                    
                                <input class="settings-input" <?php echo ($smartwatch) ? 'checked' : '';?> type="checkbox" id="smartwatch">
                                <label class="settings-label" for="smartwatch">Смарт-годинники</label>
                            </li>
                            <li>                    
                                <input class="settings-input" <?php echo ($laptop) ? 'checked' : '';?> type="checkbox" name="laptop" id="laptop">
                                <label class="settings-label" for="laptop">Ноутбуки</label>
                            </li>
                            <li>                    
                                <input class="settings-input" <?php echo ($tablet) ? 'checked' : '';?> type="checkbox" name="tablet" id="tablet">
                                <label class="settings-label" for="tablet">Планшети</label>
                            </li>
                            <li>                    
                                <input class="settings-input" <?php echo ($tv) ? 'checked' : '';?> type="checkbox" name="tv" id="tv">
                                <label class="settings-label" for="tv">Телевізори</label>
                            </li>
                            <li>                    
                                <input class="settings-input" <?php echo ($acoustics) ? 'checked' : '';?> type="checkbox" name="acoustics" id="acoustics">
                                <label class="settings-label" for="acoustics">Акустика</label>
                            </li>
                            <li>                    
                                <input class="settings-input" <?php echo ($accessories) ? 'checked' : '';?> type="checkbox" name="accessories" id="accessories">
                                <label class="settings-label" for="accessories">Аксесуари</label>
                            </li>
                            <li>                    
                                <input class="settings-input" <?php echo ($consoles) ? 'checked' : '';?> type="checkbox" name="consoles" id="consoles">
                                <label class="settings-label" for="consoles">Ігрові консолі</label>
                            </li>
                        </ul>
    
                        <a class="btn-more">Розгорнути</a>
                    </div>
                    <div class="settings">


                        <div class="settings__title">Ціна:</div>
    
                        <ul class="settings_list">
                            <li class="price-inputs">
                                <input type="text" class="form-check-input price" id="minPrice" name="minPrice" placeholder="Від">
                                <input type="text" class="form-check-input price" id="maxPrice" name="maxPrice" placeholder="До">
                                
                            </li>
                        </ul>
                    </div>
    
                    <button type="submit" class="btn btn-white btn-apply">Застосувати</button>
                    </form>
                </div>

                <div class="products-list">
                    <ul class="products-list-wrapper">
                        
                        <?php  
                            $sqlQuery = 'SELECT * FROM `products` WHERE ';


                            if ($search) {
                                $search = "(products.product_title = '" . $search . "') ";

                                $sqlQuery = $sqlQuery . $search;
                            }

                            
                            if($smartphones){
                                $smartphones = " (products.product_type = 'smartphone') ";
                                
                                if($search){
                                $sqlQuery = $sqlQuery . ' AND ';
                                }

                                $sqlQuery = $sqlQuery . $smartphones;
                            }


                            if($smartwatch && $smartphones){
                                $product = " OR (products.product_type = 'smartwatch')";
                                $sqlQuery = $sqlQuery . $smartwatch;
                            }elseif($smartwatch){
                                $smartwatch = "(products.product_type = 'smartwatch') ";
                                $sqlQuery = $sqlQuery . $smartwatch;
                            }


                            if(($laptop && $smartwatch) || ($laptop && $smartphones)){
                                $laptop = " OR (products.product_type = 'laptop')";
                                $sqlQuery = $sqlQuery . $laptop;
                            }elseif($laptop){
                                $laptop = "(products.product_type = 'laptop') ";
                                $sqlQuery = $sqlQuery . $laptop;
                            }


                            if(($tablet && $smartwatch) || ($tablet && $smartphones) || ($tablet && $laptop)){
                                $tablet = " OR (products.product_type = 'tablet')";
                                $sqlQuery = $sqlQuery . $tablet;
                            }elseif($tablet){
                                $tablet = "(products.product_type = 'tablet') ";
                                $sqlQuery = $sqlQuery . $tablet;
                            }


                            if(($tv && $smartwatch) || ($tv && $smartphones) || ($tv && $laptop) || ($tv && $tablet)){
                                $tv = " OR (products.product_type = 'tv')";
                                $sqlQuery = $sqlQuery . $tv;
                            }elseif($tv){
                                $tv = "(products.product_type = 'tv') ";
                                $sqlQuery = $sqlQuery . $tv;
                            }


                            if(($headphones && $smartwatch) || ($headphones && $smartphones) || ($headphones && $laptop) || ($headphones && $tablet) || ($headphones && $tv)){
                                $headphones = " OR (products.product_type = 'headphones')";
                                $sqlQuery = $sqlQuery . $headphones;
                            }elseif($headphones){
                                $headphones = "(products.product_type = 'headphones') ";
                                $sqlQuery = $sqlQuery . $headphones;
                            }


                            if(($acoustics && $smartwatch) || ($acoustics && $smartphones) || ($acoustics && $laptop) || ($acoustics && $tablet) || ($acoustics && $tv) || ($acoustics && $headphones)){
                                $acoustics = " OR (products.product_type = 'acoustics')";
                                $sqlQuery = $sqlQuery . $acoustics;
                            }elseif($acoustics){
                                $acoustics = "(products.product_type = 'acoustics') ";
                                $sqlQuery = $sqlQuery . $acoustics;
                            }



                            if(($accessories && $smartwatch) || ($accessories && $smartphones) || ($accessories && $laptop) || ($accessories && $tablet) || ($accessories && $tv) || ($accessories && $headphones) || ($accessories && $acoustics)){
                                $accessories = " OR (products.product_type = 'accessories')";
                                $sqlQuery = $sqlQuery . $accessories;
                            }elseif($accessories){
                                $accessories = "(products.product_type = 'accessories') ";
                                $sqlQuery = $sqlQuery . $accessories;
                            }


                            if(($consoles && $smartwatch) || ($consoles && $smartphones) || ($consoles && $laptop) || ($consoles && $tablet) || ($consoles && $tv) || ($consoles && $headphones) || ($consoles && $acoustics) || ($consoles && $accessories)){
                                $consoles = " OR (products.product_type = 'consoles')";
                                $sqlQuery = $sqlQuery . $consoles;
                            }elseif($consoles){
                                $consoles = "(products.product_type = 'consoles') ";
                                $sqlQuery = $sqlQuery . $consoles;
                            }

                            

                            $minPrice = $_GET['minPrice'];
                            if(!$minPrice){
                                $minPrice = 0;
                            }
                            $maxPrice = $_GET['maxPrice'];
                            if(!$maxPrice){
                                $maxPrice = 999999;
                            }


                            
                            if($search || $smartphones || $smartwatch || $laptop || $tablet || $tv || $headphones || $acoustics || $accessories || $consoles){
                                $sqlQuery = $sqlQuery . ' AND ';
                            }

                            $sqlQuery = $sqlQuery . ' (products.product_price BETWEEN  ' . $minPrice . ' AND ' . $maxPrice . ');';

                            $query = mysqli_query($connect, $sqlQuery);

                            $query = mysqli_fetch_all($query, MYSQLI_ASSOC);

                            $imageUrls = array();
                            
                            foreach($query as $product){
                                $imageBlob = $product['product_image'];
                                $imageType = image_type($imageBlob);
                                $base64Image = base64_encode($imageBlob);
                            
                                ?>
                                <li class="products-list-slide">
                                    <a href="/product.php?id=<?php echo $product['product_id']; ?>">
                                        <div class="wrapper">
                                            <div class="picture">
                                                <img src="data:<?php echo $imageType; ?>;base64,<?php echo $base64Image; ?>" alt="">
                                            </div>
                                            <p class="price sale-price"><?php echo $product['product_price']; ?> UAH</p>
                                            <p class="title"><?php echo $product['product_title']; ?></p>
                                            <p class="description"><?php echo $product['product_info']; ?></p>
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
                </div>
            </div>
        </section>
    </main>

<?php
    include_once('footer.php')
?>
