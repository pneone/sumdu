<?php 
  require_once 'inc/connect.php';
    
  $query = mysqli_query($connect, "SELECT * FROM `global_options`");
  $query = mysqli_fetch_assoc($query);
?>

<footer class="footer ">
        <div class="container wow animate__animated animate__fadeInUp">
            <div class="text">
                <div class="logo">
                    <a href="/">
                        <img src="img/Logotype.svg" alt="PEstore">
                    </a>
                    
                </div>
                <h1>
                    <p><?php echo $query['about_info'];?></p>
                </h1>

                <ul class="links">
                    <li><a href="<?php echo $query['facebook'];?>">
                        <i class="fa-brands fa-facebook"></i>
                    </a></li>
                    <li><a href="<?php echo $query['twitter'];?>">
                        <i class="fa-brands fa-twitter"></i>
                    </a></li>
                    <li><a href="<?php echo $query['linkedin'];?>">
                        <i class="fa-brands fa-linkedin"></i>
                    </a></li>
                    <li><a href="<?php echo $query['instagram'];?>">
                        <i class="fa-brands fa-instagram"></i>
                    </a></li>
                    <li><a href="<?php echo $query['youtube'];?>">
                        <i class="fa-brands fa-youtube"></i>
                    </a></li>
                </ul>
            </div>
            <a href="#header" class="arrow-btn">
                <img src="img/footer-arrow.svg" alt="Arrow">
            </a>
            <ul class="links">
                <li>
                    <a href="/catalog.php">Каталог</a>
                    <ul>
                        <li><a href="catalog.php?smartphone=on">Сматрфони</a></li>
                        <li><a href="catalog.php?smartwatch=on">Смарт-годинники</a></li>
                        <li><a href="catalog.php?laptop=on">Ноутбуки</a></li>
                        <li><a href="catalog.php?tablet=on">Планшети</a></li>
                        <li><a href="catalog.php?tv=on">Телевізори</a></li>
                        <li><a href="catalog.php?headphones=on">Навушники</a></li>
                        <li><a href="catalog.php?acoustics=on">Акустика</a></li>
                        <li><a href="catalog.php?accessories=on">Аксесуари</a></li>
                        <li><a href="catalog.php?consoles=on">Ігрові консолі</a></li>
                    </ul>
                </li>
                <li>
                    <a>Контакти</a>
                    <ul>
                        <li><a href="tel::<?php echo $query['phone'];?>"><?php echo $query['phone'];?></a></li>
                        <li><a href="mailto::<?php echo $query['email'];?>"><?php echo $query['email'];?></a></li>
                    </ul>
                </li>
            </ul>

            
        </div>
    </footer>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.js" integrity="sha512-Rd5Gf5A6chsunOJte+gKWyECMqkG8MgBYD1u80LOOJBfl6ka9CtatRrD4P0P5Q5V/z/ecvOCSYC8tLoWNrCpPg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="js/index.js"></script>
</body>
</html>
