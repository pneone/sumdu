<?php 
  session_start();
  require_once 'inc/connect.php';
    
  $query = mysqli_query($connect, "SELECT * FROM `global_options`");
  $query = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        
        .preloader-box {
          position: fixed;
          z-index: 999;
          width: 100%;
          height: 100%;
          display: flex;
          justify-content: center;
          align-items: center;
          background: #F5F5F5;
        }
        
        .lds-roller {
          display: inline-block;
          position: relative;
          width: 80px;
          height: 80px;
        }
        
        .lds-roller div {
          -webkit-animation: lds-roller 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
                  animation: lds-roller 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
          transform-origin: 40px 40px;
        }
        
        .lds-roller div:after {
          content: " ";
          display: block;
          position: absolute;
          width: 7px;
          height: 7px;
          border-radius: 50%;
          background: #0067FF;
          margin: -4px 0 0 -4px;
        }
        
        .lds-roller div:nth-child(1) {
          -webkit-animation-delay: -0.036s;
                  animation-delay: -0.036s;
        }
        
        .lds-roller div:nth-child(1):after {
          top: 63px;
          left: 63px;
        }
        
        .lds-roller div:nth-child(2) {
          -webkit-animation-delay: -0.072s;
                  animation-delay: -0.072s;
        }
        
        .lds-roller div:nth-child(2):after {
          top: 68px;
          left: 56px;
        }
        
        .lds-roller div:nth-child(3) {
          -webkit-animation-delay: -0.108s;
                  animation-delay: -0.108s;
        }
        
        .lds-roller div:nth-child(3):after {
          top: 71px;
          left: 48px;
        }
        
        .lds-roller div:nth-child(4) {
          -webkit-animation-delay: -0.144s;
                  animation-delay: -0.144s;
        }
        
        .lds-roller div:nth-child(4):after {
          top: 72px;
          left: 40px;
        }
        
        .lds-roller div:nth-child(5) {
          -webkit-animation-delay: -0.18s;
                  animation-delay: -0.18s;
        }
        
        .lds-roller div:nth-child(5):after {
          top: 71px;
          left: 32px;
        }
        
        .lds-roller div:nth-child(6) {
          -webkit-animation-delay: -0.216s;
                  animation-delay: -0.216s;
        }
        
        .lds-roller div:nth-child(6):after {
          top: 68px;
          left: 24px;
        }
        
        .lds-roller div:nth-child(7) {
          -webkit-animation-delay: -0.252s;
                  animation-delay: -0.252s;
        }
        
        .lds-roller div:nth-child(7):after {
          top: 63px;
          left: 17px;
        }
        
        .lds-roller div:nth-child(8) {
          -webkit-animation-delay: -0.288s;
                  animation-delay: -0.288s;
        }
        
        .lds-roller div:nth-child(8):after {
          top: 56px;
          left: 12px;
        }
        
        @-webkit-keyframes lds-roller {
          0% {
            transform: rotate(0deg);
          }
          100% {
            transform: rotate(360deg);
          }
        }
        
        @keyframes lds-roller {
          0% {
            transform: rotate(0deg);
          }
          100% {
            transform: rotate(360deg);
          }
        }
            </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/style.css">
    <title><?php echo $query['page_title'] ?></title>
    
</head>
<body>

    <div class="preloader-box">
        <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
    </div>

    <header id="header" class="header wow animate__animated animate__fadeInDown">
        <div class="container">
            <nav class="navbar">

                <div class="navbar__head">
    
                    <div class="navbar__head-logo">
                        <a href="/">
                            <img src="img/Logotype.svg" alt="PEstore">
                        </a>
                    </div>
    
                    <div class="navbar__head-btns">
                        <button id="open">
                            <img src="img/open-icon.svg" alt="open">
                        </button>
                        <button id="close">
                            <img src="img/close-icon.svg" alt="close">
                        </button>
                    </div>
    
                </div>

                <div class="mobile-links">
                    <div class="items">
                        <div class="search-form mobile">
                            <form class="form-inputs">
                                <input type="text" required name="searchInput" placeholder="Уведіть назву товару">
                                <input class=" btn-search" type="submit" value="Пошук">
                            </form>
                        </div>
            
                        <div class="navbar__links mobile mobile__links ">
                            
                            <button class="btn"> <i class="fa-solid fa-border-all"></i>Каталог</button>

                            <?php if($_SESSION['user']['admin'] == 1){?>
                              <a href="/administrator.php" class="cart">
                                <i class="fa-solid fa-user"></i>
                                <div class="title"><?php echo $_SESSION['user']['name']; ?></div>
                              </a>
                              <a href="inc/logout.php" class="cart"><i class="fa-solid fa-arrow-right-from-bracket"></i>
                                <div class="title">Вийти</div>
                              </a>
                            <?php }elseif($_SESSION['user']){?>
                              <a href="/" class="cart">
                                <i class="fa-solid fa-user"></i>
                                <div class="title"><?php echo $_SESSION['user']['name']; ?></div>
                              </a>
                              <a href="inc/logout.php" class="cart"><i class="fa-solid fa-arrow-right-from-bracket"></i>
                                <div class="title">Вийти</div>
                              </a>
                            
                            <?php }else{ ?>
                              <a href="/login.php" class="cart">
                                <i class="fa-solid fa-user"></i>
                                <div class="title">Профіль</div>
                              </a>   
                            <?php
                              }
                            ?>
            
                        </div>
                    </div>
                </div>


                <div class="search-form">
                    <form action="inc/search.php" method="post" class="form-inputs">
                        <input type="text" required name="search" placeholder="Уведіть назву товару">
                        <input class=" btn-search" type="submit" value="Пошук">
                    </form>
                </div>
    
                <div class="navbar__links">
                    
                <?php if($_SESSION['user']){?>
                  <a href="/administrator.php" class="cart">
                    <i class="fa-solid fa-user"></i>
                    <div class="title"><?php echo $_SESSION['user']['name']; ?></div>
                  </a>
                  <a href="inc/logout.php" class="cart"><i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <div class="title">Вийти</div>
                  </a>
                <?php }else{ ?>
                  <a href="/login.php" class="cart">
                    <i class="fa-solid fa-user"></i>
                    <div class="title">Профіль</div>
                  </a>   
                <?php
                  }
                ?>
                </div>
    
                
    
            </nav>
        </div>
    </header>