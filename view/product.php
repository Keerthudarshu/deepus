<?php
    $html_catalog='<li class="navbar-list">
    <a href="index.php?pg=product&tatca=1" class="navbar-link">All</a>
    </li>';
    foreach ($catalog as $item) {
        extract($item);
        $html_catalog.='<li class="navbar-list">
        <a href="index.php?pg=product&ind='.$id.'" class="navbar-link">'.$name.'</a>
        </li>';
    }

    $html_product='<div class="product-list list-product-items subpage" page="1">';
    $i=1;
    $j=1;
    $html_iconsubpage='';
    foreach ($_SESSION['product'] as $item) {
      $html_product.=showproduct($item);
      if($i==12*$j){
        $html_product.='</div>
        <div class="product-list list-product-items subpage" style="display:none" page="'.($j+1).'">';
        if($j==1){
          $html_iconsubpage.='<li class="product-pagination-list">
              <a onclick="changesubpage(this)" class="product-pagination-link active">'.$j.'</a>
            </li>';
              }else{
                $html_iconsubpage.='<li class="product-pagination-list">
                <a onclick="changesubpage(this)" class="product-pagination-link">'.($j).'</a>
              </li>';
              }
        
        $j++;
      }
        
        $i++;
    }
    if($j>1){
$html_iconsubpage.='<li class="product-pagination-list">
    <a onclick="changesubpage(this)" class="product-pagination-link">'.$j.'</a>
  </li>';
    }
    
    $html_product.='</div>';
    
    $catalog_show='';
    if(isset($_SESSION['filtercatalog']) && ($_SESSION['filtercatalog']>0)){
    if (is_array($catalog_pick) && isset($catalog_pick['name'])) {
      $catalog_show=$catalog_pick['name'];
    } else {
      $catalog_show='All products';
    }
    }else{
        $catalog_show='All products';
    }
    if(isset($_SESSION['filterprice'])){
      $checkprice=$_SESSION['filterprice'];
    }
    if(isset($_SESSION['filtergioitinh'])){
      $checkgioitinh=$_SESSION['filtergioitinh'];
    }
    $html_sort='';
    $arr_sort=['Mặc định','Từ A-Z','Từ Z-A','Giá tăng dần','Giá giảm dần'];
    if(isset($_SESSION['sort'])){
      $html_sort=$arr_sort[$_SESSION['sort']-1];
    }else{
      $html_sort='Sort by';
    }
?>

      <div class="link-mobile">
        <a href="#">Home </a>
        <i class="fa fa-chevron-right" aria-hidden="true"></i>
        <a href="#">T-shirt</a>
      </div>
      <!-- <div class="banner">
        <a href="#">
          <img src="view/layout/assets/images/banner-product.png" alt="" />
        </a>
      </div> -->
      
      <section class="list-product">
        <div class="container">
          <div class="design-center mb-0">
           
            <h2 class="heading-primary">PRODUCT LIST</h2>
          </div>
          <!-- <div class="heading-primary">Danh sách sản phẩm</div> -->
          <!-- Mobile: Filter Button -->
          <div class="mobile-cat-filter-btns" style="display:none; gap:10px; margin-bottom:16px;">
            <button id="mobile-categories-btn" style="padding:8px 18px; background:#1b3252; color:#fff; border:none; border-radius:4px;">Categories</button>
            <button id="mobile-filter-btn" style="padding:8px 18px; background:#d87c2a; color:#fff; border:none; border-radius:4px;">Filter</button>
          </div>
          <!-- USF Facets Wrapper for mobile filter overlay -->
          <div class="usf-facets-wrapper" id="usf-facets-wrapper" style="display:none; position:fixed; top:0; left:0; width:100vw; height:100vh; background:rgba(0,0,0,0.4); z-index:9999;">
            <div class="usf-facets-panel" style="background:#fff; width:80vw; max-width:350px; height:100vh; overflow-y:auto; position:relative; box-shadow:2px 0 8px rgba(0,0,0,0.08);">
              <button id="usf-facets-close" style="position:absolute; top:10px; right:10px; background:none; border:none; font-size:24px; color:#1b3252; z-index:10;">&times;</button>
              <div id="usf-facets-content"></div>
            </div>
          </div>
          <div class="list-product__main">
            <div class="list-product__left" id="mobile-filter-panel">
              <div class="list-product__left-aside">Product categories</div>
              <div class="list-product__left-aside-item">
                <ul class="navbar-aside">
                  
                <?=$html_catalog?>

                </ul>
              </div>
              <div class="list-product__left-aside">Product Filter</div>
              <div class="list-product__box">
                <div class="list-product-title">Select price range</div>
                <div class="list-product-menu">
                  <ul class="list-product-nav" id="listprice" checkprice="<?=$checkprice?>">
                    <li class="list-product-item">
                      <input type="checkbox" onclick="tailai(this)" link="index.php?pg=product&price=1"/>
                      Under 3,000₹
                    </li>
                    <li class="list-product-item">
                      <input type="checkbox"  onclick="tailai(this)" link="index.php?pg=product&price=2"/>
                      From 3000₹ - 4000₹
                    </li>
                    <li class="list-product-item">
                      <input type="checkbox"  onclick="tailai(this)" link="index.php?pg=product&price=3"/>
                      From 4000₹ - 5000₹
                    </li>
                    <li class="list-product-item">
                      <input type="checkbox"  onclick="tailai(this)" link="index.php?pg=product&price=4"/>
                      Over 5000₹
                    </li>
                  </ul>
                </div>
                <div class="list-product-title">Color</div>
                <div class="list-product-colors">
                  <?php
                    $html_color='';
                    foreach ($listcolor as $item) {
                      $html_color.='<a href="index.php?pg=product&color='.$item['id'].'"  style="background-color:'.$item['ma_color'].'"></a>';
                    }     
                  ?>
                  <?=$html_color?>
                </div>
                <div class="list-product-title">Gender</div>
                <div class="list-product-menu">
                  <ul class="list-product-nav"   id="listgioitinh" checkgioitinh="<?=$checkgioitinh?>">
                    <li class="list-product-item">
                      <input type="checkbox" onclick="tailai(this)" link="index.php?pg=product&gioitinh=1"/>
                      Male
                    </li>
                    <li class="list-product-item">
                      <input type="checkbox"  onclick="tailai(this)" link="index.php?pg=product&gioitinh=2"/>
                      Female
                    </li>
                    <li class="list-product-item">
                      <input type="checkbox"  onclick="tailai(this)" link="index.php?pg=product&gioitinh=3"/>
                      Unisex
                    </li>
                  </ul>
                </div>
              </div>
<script>
// USF Facets Wrapper for mobile filter overlay
function showUsfFacets(contentHtml) {
  var wrapper = document.getElementById('usf-facets-wrapper');
  var content = document.getElementById('usf-facets-content');
  if (wrapper && content) {
    content.innerHTML = contentHtml;
    wrapper.style.display = 'block';
  }
}
function hideUsfFacets() {
  var wrapper = document.getElementById('usf-facets-wrapper');
  if (wrapper) wrapper.style.display = 'none';
}
document.addEventListener('DOMContentLoaded', function() {
  function isMobile() {
    return window.innerWidth <= 768;
  }
  var catBtn = document.getElementById('mobile-categories-btn');
  var filterBtn = document.getElementById('mobile-filter-btn');
  var usfWrapper = document.getElementById('usf-facets-wrapper');
  var closeBtn = document.getElementById('usf-facets-close');
  var btns = document.querySelector('.mobile-cat-filter-btns');
  var aside = document.getElementById('mobile-filter-panel');
  function updateMobileBtns() {
    if (isMobile()) {
      btns.style.display = 'flex';
      aside.style.display = 'none';
    } else {
      btns.style.display = 'none';
      aside.style.display = '';
      hideUsfFacets();
    }
  }
  updateMobileBtns();
  window.addEventListener('resize', updateMobileBtns);
  if (catBtn) catBtn.addEventListener('click', function() {
    // Show only categories section
    var html = '';
    var aside = document.getElementById('mobile-filter-panel');
    if (aside) {
      var cats = aside.querySelector('.list-product__left-aside-item');
      if (cats) html += '<div class="list-product__left-aside">Product categories</div>' + cats.outerHTML;
    }
    showUsfFacets(html);
  });
  if (filterBtn) filterBtn.addEventListener('click', function() {
    // Show only filter section
    var html = '';
    var aside = document.getElementById('mobile-filter-panel');
    if (aside) {
      var filterTitle = aside.querySelectorAll('.list-product__left-aside');
      var filterBox = aside.querySelector('.list-product__box');
      if (filterTitle.length > 0 && filterBox) {
        html += '<div class="list-product__left-aside">' + filterTitle[0].innerHTML + '</div>' + filterBox.outerHTML;
      }
    }
    showUsfFacets(html);
  });
  if (closeBtn) closeBtn.addEventListener('click', function() { hideUsfFacets(); });
  if (usfWrapper) {
    usfWrapper.addEventListener('click', function(e) {
      if (e.target === usfWrapper) hideUsfFacets();
    });
  }
  // CSS helper for hiding only the left panel on mobile
  var style = document.createElement('style');
  style.innerHTML = `@media (max-width: 768px) { .mobile-cat-filter-btns { display: flex !important; } #mobile-filter-panel { display: none !important; } }`;
  document.head.appendChild(style);
});
</script>
              <div class="banner-custom">
                <a href="#">
                  <img src="view/layout/assets/images/banner-custom-1.png" alt="" />
                </a>
              </div>
            </div>
            <div class="list-product__right">
              <div class="list-product-main">
                <div class="list-text"><?=$catalog_show?></div>
                <div class="list-val">
                  <?=$html_sort?> <i class="icon-sort fa updown-toggle fa-angle-down" aria-hidden="true"></i>
                  <ul class="list-val-menu" >
                  <li class="list-val-list">
                      <a href="index.php?pg=product&sort=1" class="list-val-link">Default</a>
                    </li>
                    <li class="list-val-list">
                      <a href="index.php?pg=product&sort=2" class="list-val-link">From A-Z</a>
                    </li>
                    <li class="list-val-list">
                      <a href="index.php?pg=product&sort=3" class="list-val-link">From Z-A</a>
                    </li>
                    <li class="list-val-list">
                      <a href="index.php?pg=product&sort=4" class="list-val-link">Price increases gradually</a>
                    </li>
                    <li class="list-val-list">
                      <a href="index.php?pg=product&sort=5" class="list-val-link">Price decreasing</a>
                    </li>
                  </ul>
                </div>
              </div>
              <section class="mt-10">
                
                  
                <?=$html_product?>

                
                <div class="product-pagination">
                  <ul class="product-pagination-item">
                   
                  <?=$html_iconsubpage?>
                   
                  </ul>
                </div>
                <div class="product-mobile-btn">
                  <button class="top-button">See more</button>
                </div>
              </section>
            </div>
          </div>
        </div>
      </section>
