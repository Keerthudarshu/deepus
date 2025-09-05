
    <!-- Category Card Section -->
    <style>
      .category-scroll-section {
        width: 100%;
        overflow-x: auto;
        margin: 0 auto 24px auto;
        padding: 16px 0 8px 0;
        background: #fff;
        display: flex;
        justify-content: center;
        /* Hide scrollbar for all browsers */
        scrollbar-width: none; /* Firefox */
        -ms-overflow-style: none; /* IE 10+ */
      }
      .category-scroll-section::-webkit-scrollbar {
        display: none;
      }
      .category-scroll-list {
        display: flex;
        gap: 24px;
        min-width: 600px;
        padding: 0 16px;
        margin: 0 auto;
      }
      .category-card {
        flex: 0 0 140px;
        background: #f8f8f8;
        border-radius: 16px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-end;
        padding: 12px 8px 8px 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        min-height: 170px;
        transition: box-shadow 0.2s;
      }
      .category-card:hover {
        box-shadow: 0 4px 16px rgba(0,0,0,0.10);
      }
      .category-card-img {
        width: 173px;
        height: 173px;
        object-fit: cover;
        border-radius: 22px;
        margin-bottom: 16px;
        background: #eee;
        transition: width 0.2s, height 0.2s;
      }
      .category-card-label {
        font-weight: bold;
        font-size: 1.1em;
        text-align: center;
        margin-top: 4px;
        color: #222;
      }
      /* Hide scrollbar but allow scroll on mobile */
      @media (max-width: 900px) {
        .category-scroll-list { min-width: 480px; gap: 16px; }
        .category-card { flex-basis: 202px; min-height: 202px; }
        .category-card-img { width: 130px; height: 130px; }
      }
      @media (max-width: 600px) {
        .category-scroll-section {
          padding-left: 0; padding-right: 0;
          justify-content: center;
        }
        .category-scroll-list {
          min-width: 0;
          gap: 8px;
          padding: 0 8px;
        }
        .category-card {
          flex: 0 0 calc((100vw - 32px) / 3);
          min-width: 0;
          min-height: 132px;
          padding: 8px 2px 6px 2px;
        }
        .category-card-img { width: 103px; height: 103px; }
      }
    </style>
    <div class="category-scroll-section">
      <div class="category-scroll-list">
        <a href="#" class="category-card" >
          <img src="view/layout/assets/images/girls.webp" class="category-card-img" alt="Girls" />
        </a>
        <a href="#" class="category-card" >
          <img src="view/layout/assets/images/boys.webp" class="category-card-img" alt="Boys" />
        </a>
        <a href="#" class="category-card" >
          <img src="view/layout/assets/images/infant.webp" class="category-card-img" alt="Infant" />
        </a>
        <a href="#" class="category-card" >
          <img src="view/layout/assets/images/casual wear.webp" class="category-card-img" alt="Casual wear" />
        </a>
        <a href="#" class="category-card" >
          <img src="view/layout/assets/images/part wear.webp" class="category-card-img" alt="Party wear" />
        </a>
        <a href="#" class="category-card" >
          <img src="view/layout/assets/images/ethnic wear.webp" class="category-card-img" alt="Ethnic wear" />
         
        </a>
        <a href="#" class="category-card" >
          <img src="view/layout/assets/images/luxe.webp" class="category-card-img" alt="Luxe" />
        </a>
      </div>
    </div>

     <section class="hero">
        <div class="hero-slider">
          <div class="hero-item">
            <div class="hero-image">
              <a href="index.php?pg=design">
                <img src="view/layout/assets/images/banner 1.webp" alt="" />
              </a>
              
            </div>
          </div>
          <div class="hero-item">
            <a href="index.php?pg=product">
              <img src="view/layout/assets/images/banner 2.webp" alt="" />
            </a>
          </div>
          <div class="hero-item">
            <div class="hero-image">
              <a href="index.php?pg=design">
                <img src="view/layout/assets/images/banner 3.webp" alt="" />
              </a>
              
            </div>
          </div>
        </div>
      </section>
      <section class="product">
        <div class="container">
          <div class="heading-primary">Outstanding Products</div>
          <div class="product-main">
            <!-- Left Column -->
            <div class="product-left">
              <div class="product-list product-list-2">
                <?php
                  $product_latest = getproduct(8);
                  $html_product='';
                  foreach (array_slice($product_latest, 0, 4) as $item) {
                      $html_product.= showproduct($item);
                  }
                  echo $html_product;
                ?>
              </div>
            </div>
            <!-- Right Column -->
            <div class="product-right">
              <div class="product-list product-list-2">
                <?php
                  $html_product='';
                  foreach (array_slice($product_latest, 4, 4) as $item) {
                      $html_product.= showproduct($item);
                  }
                  echo $html_product;
                ?>
              </div>
            </div>
          </div>
          <!-- Button -->
          <div class="product-btn">
            <a href="index.php?pg=product">
              <button class="button-primary">See all</button>
            </a>
          </div>
      </section>
      <section class="deal">
        <div class="container">
          <div class="heading-primary deal-heading">HOT DEAL OF THE WEEK</div>
          <div class="deal-main">
          <?=showproduct_box_mobile($product_hot, 1)?>
            
          <?php
                $html_product='';
                foreach ($product_hot as $item) {
                    $html_product.= showproduct_box($item);
                }
                echo $html_product;
            ?>

          </div>
          <div class="product-btn">
            <a href="index.php?pg=product"><button class="button-primary button-secondary">View all</button></a>
          </div>
        </div>
      </section>
      <section class="top">
        <div class="container">
          <div class="heading-primary">JUST FOR YOU</div>
          <h2 class="top-item-title top-item-title-mobile">Best Seller</h2>
          <div class="top-list">
            <div class="top-main-list">

              <?= showproduct_column($product_bestsell, 'Best Seller')?>

            </div>
            <h2 class="top-item-title top-item-title-mobile">Many views</h2>
            <div class="top-main-list">
              
            <?= showproduct_column($product_topview, 'Many views')?>
        
            </div>
            <h2 class="top-item-title top-item-title-mobile">Trend</h2>
            <div class="top-main-list">
              
            <?= showproduct_column($product_trend, 'Trend')?>

            </div>
          </div>
        </div>
      </section>
      <section class="product">
        <div class="container">
          <div class="heading-primary">OUR BEST SELLING PRODUCTS</div>
          <ul class="tab-menu">
            <?php
                $html_catalog='';
                $html_product='';
                $i=0;
                foreach ($catalog_home as $item) {
                    $i++;
                    if($i==1){
                        $html_catalog.='<li class="tab-item"><a onclick="click_catalog(this)" class="tab-link active">'.$item['name'].'</a></li>';
                    }else{
                        $html_catalog.='<li class="tab-item"><a onclick="click_catalog(this)" class="tab-link">'.$item['name'].'</a></li>';
                    }
                    $product_catalog=getproduct_catalog($item['id']);
          if (isset($product_catalog[0]) && is_array($product_catalog[0])) {
            extract($product_catalog[0]);
          }
                    
                    $html_product.='<div class="my-product" style="display:none;">
                    <div class="product-main mt-30">
                    <div class="product-box">
                    <div class="deal-item">
                        <div class="deal-list">
                        <div class="deal-item__image">
                            <a href="#">
                            '.check_img(getimg_product_main($id)['main_img']).'
                            </a>
                            <div class="deal-items">
                            '.check_img(getimg_product_main($id)).'
                            </div>
                        </div>
                        <div class="deal-content">
                            <div class="deal-title">'.$name.'</div>
                            <div class="deal-price">'.(isset($product_catalog[0]['price']) && $product_catalog[0]['price'] !== null ? number_format($product_catalog[0]['price'],0,'',',') : '0').'₹
                            '.(isset($product_catalog[0]) && is_array($product_catalog[0]) ? sale($product_catalog[0]) : '').'
                            </div>
                            <div class="deal-bestseller">Best Seller</div>
                            <div class="deal-auth">
                            <a href="#" class="deal-view">View details</a>
                            <a href="index.php?pg=checkout&id='.$id.'" class="add"><button class="deal-btn">Buy now</button></a>

                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="product-list product-box__list">';
                
                    if(isset($product_catalog[1])){
                        $html_product.=showproduct($product_catalog[1]);
                    }
                    
                    if(isset($product_catalog[2])){
                        $html_product.=showproduct($product_catalog[2]);
                    }
                    $html_product.='</div>
                    </div>
                    <div class="product-list mt-30">';
                    if(isset($product_catalog[3])){
                        $html_product.=showproduct($product_catalog[3]);
                    }
                    if(isset($product_catalog[4])){
                        $html_product.=showproduct($product_catalog[4]);
                    }
                    if(isset($product_catalog[5])){
                        $html_product.=showproduct($product_catalog[5]);
                    }
                    if(isset($product_catalog[6])){
                        $html_product.=showproduct($product_catalog[6]);
                    }
                    
                    $html_product.=
                '</div>
                </div>';
                }
                echo $html_catalog;
            ?>
          </ul>
            <?=$html_product?>
        
        </div>
      </section>
      <section class="service" style="background-color: white !important;">
        <div class="container">
          <div class="service-list">
            <div class="service-box item-1">
              <div class="service-icon">
                <img src="view/layout/assets/images/customer-icon.svg" alt="" />
              </div>
              <div class="service-content">
                <h4 class="service-title">Free shipping</h4>
                <p class="service-desc">
                  Apply free shipping for all orders from 500,000 VND, delivered within 24 hours.                </p>
              </div>
            </div>
            <div class="service-box item-2">
              <div class="service-icon">
                <img src="view/layout/assets/images/customer-icon-2.svg" alt="" />
              </div>
              <div class="service-content">
                <h4 class="service-title">Easy Exchanges/Returns</h4>
                <p class="service-desc">
                Exchange on the same day if the product is defective or delivered incorrectly as per your request.                </p>
              </div>
            </div>
            <div class="service-box item-3">
              <div class="service-icon">
                <img src="view/layout/assets/images/customer-icon-3.svg" alt="" />
              </div>
              <div class="service-content">
                <h4 class="service-title">24/7 Consultation</h4>
                <p class="service-desc">
                  Call hotline: 1900 6750 for immediate support, consulting on all sports-related issues.
                </p>
              </div>
            </div>
            <div class="service-box item-4">
              <div class="service-icon">
                <img src="view/layout/assets/images/customer-icon-4.svg" alt="" />
              </div>
              <div class="service-content">
                <h4 class="service-title">DIVERSE PAYMENT OPTIONS</h4>
                <p class="service-desc">
                  Payment on delivery (COD), Bank Transfer, Napas, Visa, ATM, Installment Payment.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>
      
      <section class="customer">
        <div class="customer-main">
          <div class="customer-banner">
            <a href="#">
              <img class="customer-image" src="<?php echo 'view/layout/assets/images/kisd poster.avif'; ?>" alt="" />
            </a>
          </div>
          <div class="customer-content">
            <div class="customer-icon">
              <i class="fa fa-quote-left" aria-hidden="true"></i>
            </div>
            <div class="customer-title">WHAT CUSTOMERS SAY ABOUT Deepus SPORTS PRODUCTS</div>
            <p class="customer-desc">
             "Thank you Deepus for helping me get 2 pairs of nice shoes for this summer. For me, Deepus is always my first choice, with diverse designs, attentive service, and always providing enthusiastic support to customers. Wishing Deepus even more success."
            </p>
            <div class="customer-info">
              <div class="customer-name">Harsha</div>
              <div class="customer-member">Customer who bought a t-shirt from Deepus</div>
              <div class="customer-rating">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="blog">
        <div class="container">
          <div class="heading-primary">Latest News</div>
          <div class="blog-list">
            
          <?php
              $html_new='';
              foreach($new_home as $new){
                extract($new);
                $html_new.='<div class="blog-item">
                <div class="blog-image">
                  <a href="#">
                    <img src="upload/'.$img.'" alt="" />
                  </a>
                </div>
                <div class="blog-content">
                  <h3 class="blog-title">
                    <a href="#"
                      >'.$title.'
                    </a>
                  </h3>
                  <div class="blog-date">'.$thoigian.'</div>
                  <div class="blog-desc">
                    '.$noidung.'...
                  </div>
                  <div class="blog-btn">
                  <a href="index.php?pg=news"><button class="blog-button">Read more</button></a>
                  </div>
                </div>
              </div>';
              }
            ?>
            <?=$html_new?>

          </div>
        </div>
      </section>
