<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Deepus</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link
      rel="stylesheet"
      type="text/css"
      href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="view/layout/assets/css/style.css" />
    <link rel="stylesheet" href="view/layout/assets/css/responsive.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
      integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer" />
      <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
      integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <link
      rel="stylesheet"
      type="text/css"
      href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

    <link
      href="https://fonts.googleapis.com/css?family=Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic"
      rel="stylesheet" />
<link rel="icon" type="image/png" href="view/layout/assets/images/logo.jpg" />
  </head>
  <body>
    <div class="app">
      
      <!-- Header -->
      <header class="header" style="  background-color: white!important">
        <div class="container">
          <div class="header-main">
            <div class="header-bars">
              <i class="fa fa-bars menu-toggle" aria-hidden="true" style="background-color:#1b3252"></i>
            </div>
            <div class="header-logo">
              <a href="index.php">
                <img src="view/layout/assets/images/logo.jpg" alt="" style="height:72px; width: 150px;; max-width:350px;" />
              </a>
            </div>
            <div class="header-logo-mobile">
              <a href="#">
                <img src="view/layout/assets/images/logo.jpg" alt="" />
              </a>
            </div>
            <div class="header-bad">
              <a href="index.php?pg=cart" style="color:inherit;text-decoration:none;">
                <i class="fa fa-shopping-bag" aria-hidden="true" style="background-color:#1b3252; color:#fff; border-radius:6px; padding:6px;"></i>
              </a>
            </div>
            <div class="header-bad">
              <a href="favorites.php" style="color:inherit;text-decoration:none;">
                <i class="fa fa-heart" aria-hidden="true" style="background-color:#1b3252; color:#fff; border-radius:6px; padding:6px;"></i>
              </a>
            </div>
            <div class="header-bad">
              <a href="index.php?pg=login" style="color:inherit;text-decoration:none;">
                <i class="fa fa-user-circle" aria-hidden="true" style="background-color:#1b3252; color:#fff; border-radius:6px; padding:6px;"></i>
              </a>
            </div>
            
            <div class="header-form">
              <div class="header-input">
                <form action="index.php?pg=product" method="post">
                <input name="search" type="text" placeholder="Search products" style="border:2px solid #000;" />
                <div class="header-input-icon">
                  <button name="btn_search" ><i class="fa fa-search" aria-hidden="true" ></i></button>
                </div>
                </form>
              </div>
            </div>
            <div class="header-auth" style="color: #060606ff;">
              <div class="header-auth__item">
                <i class="fa fa-heart" aria-hidden="true"></i>
                <a href="favorites.php" class="header-link" style="color: #060606ff;" >Favorites</a>
              </div>
              <div class="header-auth__item">
              <?php
                $link_taikhoan='';
                $tentaikhoan='Account';
                  if(isset($_SESSION['loginuser']) && isset($_SESSION['iduser']) && isset($_SESSION['role']) && $_SESSION['role']==0){
                    $taikhoan=getuser($_SESSION['iduser']);
                    if(is_array($taikhoan)) {
                      $tentaikhoan=$taikhoan['user'];
                      $img=$taikhoan['img'];
                      if(check_img($img)==''){
                        $img='<img src="view/layout/assets/images/avatar.png" alt="" />';
                      }else{
                        $img=check_img($img);
                      }
                      $link_taikhoan='index.php?pg=account';
                    } else {
                      $tentaikhoan='Account';
                      $img='<img src="view/layout/assets/images/avatar.png" alt="" />';
                      $link_taikhoan='index.php?pg=login';
                    }
                  }else{
                    $img='<i class="fa fa-user-circle" aria-hidden="true"></i>';
                    $link_taikhoan='index.php?pg=login';
                  }
                  
                
                    
                  
                ?>
                
                <?=$img?>
                <a href="<?=$link_taikhoan?>" class="header-link" style="color: #060606ff;" ><?=$tentaikhoan?></a>
              </div>
              <div class="header-auth__item">
                <i class="fa fa-shopping-bag" aria-hidden="true" style="background-color:#1b3252; color:#fff; border-radius:6px; padding:6px;"></i>
                <a href="index.php?pg=cart" class="header-link" style="color: #060606ff;">Shopping Cart</a>
              </div>
            </div>
          </div>
        </div>
      </header>
      <ul class="menu-mobile">
        <li class="menu-mobile-item">
          <a href="#" class="menu-mobile-link icon-close"
            ><i class="fa fa-times close-menu" aria-hidden="true"></i
          ></a>
        </li>
        <li class="menu-mobile-item">
          <a href="index.php" class="menu-mobile-link active">Home</a>
        </li>
        <li class="menu-mobile-item">
          <a href="index.php?pg=about" class="menu-mobile-link">About</a>
        </li>
        <li class="menu-mobile-item">
          <a href="index.php?pg=product" class="menu-mobile-link">Products</a>
        </li>
        <li class="menu-mobile-item">
          <a href="index.php?pg=design" class="menu-mobile-link">Design</a>
        </li>
        <li class="menu-mobile-item">
          <a href="index.php?pg=news" class="menu-mobile-link">News</a>
        </li>
        <li class="menu-mobile-item">
          <a href="index.php?pg=contact" class="menu-mobile-link">Contact</a>
        </li>
        <li class="menu-mobile-item">
          <a href="index.php?pg=account" class="menu-mobile-link">Account</a>
        </li>
        <li class="menu-mobile-item">
          <a href="index.php?pg=logout" class="menu-mobile-link logout">Logout</a>
        </li>
      </ul>

      <section class="header-bottom" style="  background-color: #1b3252 ;">
        <div class="container">
          <div class="header-bottom__main">
            <form action="" class="header-form header-form-mobile">
              <div class="header-input">
                <input type="text" placeholder="Search products" />
                <div class="header-input-icon">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </div>
              </div>
            </form>
            <ul class="header-menu"  >
              <li class="header-menu-item">
                <a href="index.php" class="header-menu-link">Home</a>
              </li>
              <li class="header-menu-item">
                <a href="index.php?pg=design" class="header-menu-link">Design</a>
              </li>
              <li class="header-menu-item">
                <a href="index.php?pg=about" class="header-menu-link">About</a>
              </li>
              <li class="header-menu-item">
                <a href="index.php?pg=product" class="header-menu-link">Products</a>
              </li>
              <li class="header-menu-item">
                <a href="index.php?pg=boys" class="header-menu-link">Boys</a>
              </li>
              <li class="header-menu-item">
                <a href="index.php?pg=girls" class="header-menu-link">Girls</a>
              </li>
              <li class="header-menu-item">
                <a href="index.php?pg=news" class="header-menu-link">News</a>
              </li>
              <li class="header-menu-item">
                <a href="index.php?pg=contact" class="header-menu-link">Contact</a>
              </li>
            </ul>
          </div>
        </div>
      </section>
      