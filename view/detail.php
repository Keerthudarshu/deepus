<style>
.main-image-container{
  position: relative;
  width: 100%;
  max-width: 520px;
  height: 520px;
  overflow: hidden;
  border: 1px solid #e6e6e6;
  background: #fff;
}
.detail-img{
  width: 100%;
  height: 100%;
  object-fit: contain;
  display: block;
  cursor: zoom-in;
  user-select: none;
}
  .zoom-wrapper{
    position: absolute;
    display: none;
    width: 300px;
    height: 300px;
    border-radius: 6px;
    border: 1px solid rgba(0,0,0,0.12);
    box-shadow: 0 8px 20px rgba(0,0,0,0.12);
    background-repeat: no-repeat;
    background-position: center;
    pointer-events: none;
    z-index: 30;
    overflow: hidden;
  }
.detail-image__list{
  margin-top: 12px;
  display: flex;
  gap: 8px;
  flex-wrap: wrap;
}
.detail-image__item{
  width: 64px;
  height: 64px;
  object-fit: cover;
  cursor: pointer;
  border-radius: 6px;
  border: 2px solid transparent;
  transition: border-color .15s;
}
.detail-image__item.active{
  border-color: #46694F;
}
/* Out of stock button styling */
.detail-button__cart.out-of-stock {
  background-color: #ccc !important;
  color: #666 !important;
  cursor: not-allowed !important;
  opacity: 0.6;
}
.detail-button__cart.out-of-stock:hover {
  background-color: #ccc !important;
  color: #666 !important;
}
@media(max-width:700px){
  .main-image-container{
    height: 360px;
    max-width: 360px;
  }
  .zoom-wrapper{
    width: 200px;
    height: 200px;
  }
}
</style>
<script>
document.addEventListener('DOMContentLoaded', function() {
  const ZOOM_SCALE = 2.5;
  document.querySelectorAll('.detail-image').forEach(function(container) {
    const mainImg = container.querySelector('.detail-img');
    const zoomEl  = container.querySelector('.zoom-wrapper');
    const thumbs  = container.querySelectorAll('.detail-image__item');

    function preloadNatural(src){
      return new Promise(function(resolve){
        const tmp = new Image();
        tmp.onload = function(){ resolve({w: tmp.naturalWidth, h: tmp.naturalHeight}); };
        tmp.onerror = function(){ resolve(null); };
        tmp.src = src;
      });
    }
    preloadNatural(mainImg.getAttribute('data-large') || mainImg.src).then(dim => {
      mainImg._nat = dim;
    });
    thumbs.forEach(function(t){
      t.addEventListener('click', function(e){
        const large = t.dataset.large || t.src;
        mainImg.src = large;
        mainImg.setAttribute('data-large', large);
        thumbs.forEach(x => x.classList.remove('active'));
        t.classList.add('active');
        preloadNatural(large).then(dim => mainImg._nat = dim);
      });
      t.setAttribute('tabindex', '0');
      t.addEventListener('keydown', function(ev){
        if(ev.key === 'Enter' || ev.key === ' '){
          ev.preventDefault();
          t.click();
        }
      });
    });

    // Only zoom when hovering the main image
    function showZoom(e) {
      const rect = mainImg.getBoundingClientRect();
      const x = e.clientX - rect.left;
      const y = e.clientY - rect.top;
      zoomEl.style.display = 'block';
      const zw = zoomEl.offsetWidth;
      const zh = zoomEl.offsetHeight;
      let left = x + rect.left - container.getBoundingClientRect().left - zw/2;
      let top  = y + rect.top - container.getBoundingClientRect().top - zh/2;
      left = Math.max(6, Math.min(left, container.offsetWidth - zw - 6));
      top  = Math.max(6, Math.min(top, container.offsetHeight - zh - 6));
      zoomEl.style.left = left + 'px';
      zoomEl.style.top  = top  + 'px';
      const src = mainImg.getAttribute('data-large') || mainImg.src;
      zoomEl.style.backgroundImage = `url("${src}")`;
      const nat = mainImg._nat;
      if(nat && nat.w && nat.h){
        const bgW = Math.round(nat.w * ZOOM_SCALE);
        const bgH = Math.round(nat.h * ZOOM_SCALE);
        zoomEl.style.backgroundSize = `${bgW}px ${bgH}px`;
      } else {
        zoomEl.style.backgroundSize = `${rect.width * ZOOM_SCALE}px ${rect.height * ZOOM_SCALE}px`;
      }
      const percentX = (x / rect.width) * 100;
      const percentY = (y / rect.height) * 100;
      zoomEl.style.backgroundPosition = `${percentX}% ${percentY}%`;
    }
    mainImg.addEventListener('mouseenter', function(e){
      zoomEl.style.display = 'block';
    });
    mainImg.addEventListener('mousemove', showZoom);
    mainImg.addEventListener('mouseleave', function(){
      zoomEl.style.display = 'none';
    });

    // Touch support for zoom on main image only
    let touchZoomActive = false;
    mainImg.addEventListener('touchstart', function(ev){
      const touch = ev.touches[0];
      if(!touch) return;
      touchZoomActive = true;
      showZoom({clientX: touch.clientX, clientY: touch.clientY});
    }, {passive:true});
    mainImg.addEventListener('touchmove', function(ev){
      const touch = ev.touches[0];
      if(!touch || !touchZoomActive) return;
      showZoom({clientX: touch.clientX, clientY: touch.clientY});
    }, {passive:true});
    mainImg.addEventListener('touchend', function(){
      touchZoomActive = false;
      zoomEl.style.display = 'none';
    });
  });
});
</script>
<?php
  // Display stock error message if set
  $html_stock_error = '';
  if(isset($_SESSION['stock_error'])) {
    $html_stock_error = '<div class="modal active">
      <div class="modal-overlay"></div>
      <div class="modal-content">
        <div class="modal-main">
          <img src="view/layout/assets/images/thatbai.png" alt="">
          <h3>' . $_SESSION['stock_error'] . '</h3>
          <div class="modal__succesfully">
              <button onclick="closeStockError()" class="monal__succesfully-btn">OK</button>
          </div>
        </div>
      </div>
    </div>';
    unset($_SESSION['stock_error']);
  }
  
  $html_color='';
  $i=0;
  foreach ($list_color as $item) {
    $i++;
    extract($item);
    if($i==1){
      $html_color.='
      <div id_color="'.$id.'" onclick="change_color(this)" class="detail-circle">
        <div  style="display:none;">'.$color.'</div>
        <span class="detail-color__circle" style="background-color: '.$ma_color.'"></span>
      </div>
    ';
    }else{
      $html_color.='
      <div  id_color="'.$id.'" onclick="change_color(this)" class="detail-circle">
        <div style="display:none;">'.$color.'</div>
        <span class="detail-color__circle" style="background-color: '.$ma_color.'"></span>
      </div>';
    }
  }

// Fetch size row from size table for current product code
include_once "model/size.php";
$size_row = null;
if (isset($ma_sanpham)) {
  $pdo = pdo_get_connection();
  $stmt = $pdo->prepare("SELECT * FROM size WHERE product_code = ? LIMIT 1");
  $stmt->execute([$ma_sanpham]);
  $size_row = $stmt->fetch(PDO::FETCH_ASSOC);
}
$html_size = '';
$js_size_prices = [];
for ($sz = 20; $sz <= 38; $sz += 2) {
    $price = isset($size_row['size_' . $sz]) ? $size_row['size_' . $sz] : '';
    $js_size_prices[$sz] = $price;
    $html_size .= '<div id_size="' . $sz . '" class="detail-size__item">' . $sz . '</div>';
}
  $html_relative_product='';
  foreach ($splienquan as $item) {
    $html_relative_product.=showproduct($item);
  }

  
  $arr='';
  if(isset($listquantity_of_inventory)){
    usort($listquantity_of_inventory, function($a, $b) {
      if ($a['id_color'] == $b['id_color']) {
          return $a['id_size'] - $b['id_size'];
      }
      return $a['id_color'] - $b['id_color'];
  });
    $arr = json_encode($listquantity_of_inventory);
  }
  $html_err_comment='';
  if(isset($_SESSION['err_comment']) && $_SESSION['err_comment']>0){
    if($_SESSION['err_comment']==1){
      $html_err_comment='<div class="modal active">
      <div class="modal-overlay"></div>
      <div class="modal-content">
        <div class="modal-main">
          <img src="view/layout/assets/images/thatbai.png" alt="">
          <h3>You must log in to your account before commenting.</h3>
          <div class="modal__succesfully">
              <button onclick="tatthongbaocart()" class="monal__succesfully-btn">OK</button>
          </div>
        </div>
      </div>
    </div>';
    }else{
      if($_SESSION['err_comment']==2){
        $html_err_comment='<div class="modal active">
      <div class="modal-overlay"></div>
      <div class="modal-content">
        <div class="modal-main">
          <img src="view/layout/assets/images/thatbai.png" alt="">
          <h3>You must place a successful order for at least one product before you can comment</h3>
          <div class="modal__succesfully">
              <button onclick="tatthongbaocart()" class="monal__succesfully-btn">OK</button>
          </div>
        </div>
      </div>
    </div>';
      }
    }
    unset($_SESSION['err_comment']);
  }
?>                

<?=$html_stock_error?>
<?=$html_err_comment?>

<div id="myData" data-array='<?php echo $arr; ?>'></div>
<script>
   var basePrice = <?=$detail['price']?>;
   function update_soluong() {
     var qtyInput = document.getElementById('detail-quantity');
     var qty = Number(qtyInput.value);
     if (!qty || qty < 1) {
       qty = 1;
       qtyInput.value = 1;
     }
     var priceInput = document.getElementById('detail-price-value');
     if (priceInput) {
       var total = basePrice * qty;
       priceInput.value = total.toLocaleString() + '₹';
       console.log('Qty:', qty, 'BasePrice:', basePrice, 'Total:', total);
     }
     var checkoutQty = document.querySelector('input[name="soluong_checkout"]');
     if (checkoutQty) checkoutQty.value = qty;
     var cartQty = document.querySelector('form.addtocart input[name="soluong"]');
     if (cartQty) cartQty.value = qty;
   }
   document.addEventListener('DOMContentLoaded', function() {
     var qtyInput = document.getElementById('detail-quantity');
     var minusBtn = document.querySelector('.detail-input__minus');
     var plusBtn = document.querySelector('.detail-input__plus');
     if (qtyInput) {
       qtyInput.addEventListener('input', update_soluong);
     }
     if (minusBtn) {
       minusBtn.addEventListener('click', function(e) {
         var qty = Number(qtyInput.value);
         if (qty > 1) {
           qty--;
           qtyInput.value = qty;
           update_soluong();
         }
       });
     }
     if (plusBtn) {
       plusBtn.addEventListener('click', function(e) {
         var qty = Number(qtyInput.value);
         qty++;
         qtyInput.value = qty;
         update_soluong();
       });
     }
     update_soluong();
   });
</script>
<?=$html_err_comment?>

<div class="link-mobile">
    <a href="#">Home</a>
    <i class="fa fa-chevron-right" aria-hidden="true"></i>
    <a href="#">T-Shirts</a>
</div>

<section class="detail">
        <div class="container">
          <div class="detail-main">

            <?=showimgdetail($imgproduct);?>

            <div class="detail-content">
              <h3 class="detail-title"><?=$name?></h3>
              <div class="detail-code">Product code: <span><?=$ma_sanpham?></span></div>
              <div class="detail-price">
                <input id="detail-price-value" type="text" value="<?=number_format($detail['price'],0,'',',')?>₹" readonly style="border:none;background:transparent;font-size:inherit;width:100px;" />
                <?=sale($detail)?>
              </div>
              <div class="detail-auth__color">
                <div class="detail-colors">Color: </div>
                <?=$html_color?>
              </div>
              <div class="detail-size">Size: <span class="pick-size">XS</span></div>
              <style>
                .detail-size__list {
                  display: grid;
                  grid-template-columns: repeat(5, 1fr);
                  grid-template-rows: repeat(2, 1fr);
                  gap: 16px;
                  margin-bottom: 16px;
                  max-width: 500px;
                }
                .detail-size__item {
                  display: flex;
                  align-items: center;
                  justify-content: center;
                  height: 48px;
                  font-size: 1.2rem;
                  background: #fff;
                  border: 2px solid #e6e6e6;
                  border-radius: 8px;
                  cursor: pointer;
                  transition: border-color 0.2s, box-shadow 0.2s;
                }
                .detail-size__item.active {
                  border-color: #46694F;
                  box-shadow: 0 2px 8px rgba(70,105,79,0.08);
                }
              </style>
              <script>
                var sizePrices = <?php echo json_encode($js_size_prices); ?>;
                document.addEventListener('DOMContentLoaded', function() {
                  var priceInput = document.getElementById('detail-price-value');
                  var sizeEls = document.querySelectorAll('.detail-size__item');
                  sizeEls.forEach(function(el) {
                    el.addEventListener('click', function() {
                      sizeEls.forEach(x => x.classList.remove('active'));
                      el.classList.add('active');
                      var sz = el.getAttribute('id_size');
                      var price = sizePrices[sz];
                      if (price && price > 0) {
                        priceInput.value = Number(price).toLocaleString() + '₹';
                        window.basePrice = Number(price);
                      } else {
                        priceInput.value = 'N/A';
                        window.basePrice = 0;
                      }
                    });
                  });
                  // Set initial price to first size with price
                  for (var sz = 20; sz <= 38; sz += 2) {
                    var price = sizePrices[sz];
                    if (price && price > 0) {
                      priceInput.value = Number(price).toLocaleString() + '₹';
                      window.basePrice = Number(price);
                      var firstEl = document.querySelector('.detail-size__item[id_size="'+sz+'"]');
                      if (firstEl) firstEl.classList.add('active');
                      break;
                    }
                  }
                });
              </script>
              <div class="detail-size__list">
                <?php echo $html_size; ?>
              </div>
              <div class="detail-auth">
                <div class="detail-text">Quantity:</div>
                  <div class="detail-input">
                    <button class="detail-input__minus">-</button>
                    <input id="detail-quantity" type="number" value="1" min="1" />
                    <button class="detail-input__plus">+</button>
                  </div>
                  <?php  echo get_stock_status_html($stock); ?>

                <div style="display:none" id="slcon"></div>
              </div>
              <div class="detail-btn">
                <form id="checkoutdung" action="index?pg=checkout" method="post">
                  <input type="hidden" name="soluong_checkout" id="checkout-qty" value="1">
                  <input type="hidden" name="id_checkout" value="<?=$detail['id']?>">
                  <input type="hidden" name="size_checkout" id="checkout-size" value="">
                  <input type="hidden" name="price_checkout" id="checkout-price" value="">
                </form>
                <script>
                document.addEventListener('DOMContentLoaded', function() {
                  var sizeEls = document.querySelectorAll('.detail-size__item');
                  var sizePrices = <?php echo json_encode($js_size_prices); ?>;
                  var checkoutSize = document.getElementById('checkout-size');
                  var checkoutPrice = document.getElementById('checkout-price');
                  var checkoutQty = document.getElementById('checkout-qty');
                  // Set initial size/price if available
                  if (sizeEls.length > 0) {
                    var activeSize = document.querySelector('.detail-size__item.active');
                    var sz = activeSize ? activeSize.getAttribute('id_size') : sizeEls[0].getAttribute('id_size');
                    checkoutSize.value = sz;
                    checkoutPrice.value = sizePrices[sz] || '';
                  }
                  sizeEls.forEach(function(el) {
                    el.addEventListener('click', function() {
                      var sz = el.getAttribute('id_size');
                      checkoutSize.value = sz;
                      checkoutPrice.value = sizePrices[sz] || '';
                    });
                  });
                  // Update qty if changed elsewhere
                  var qtyInput = document.querySelector('.soluong');
                  if (qtyInput) {
                    qtyInput.addEventListener('input', function() {
                      checkoutQty.value = qtyInput.value;
                    });
                  }
                });
                </script>
              </div>
              <div class="detail-btn">
                <form id="cartdung" class="addtocart" action="index?pg=addtocart" method="post">
                  <input type="hidden" name="id" value="<?=$detail['id']?>">
                  <input type="hidden" name="img" value="<?=isset($imgproduct['main_img']) ? $imgproduct['main_img'] : (isset($imgproduct[0]) ? $imgproduct[0] : '')?>">
                  <input type="hidden" name="name" value="<?=$name?>">
                  <input type="hidden" name="color" id="cart-color" value="<?=isset($list_color[0]['color']) ? $list_color[0]['color'] : ''?>">
                  <input type="hidden" name="size" id="cart-size" value="<?=isset($list_size[0]['ma_size']) ? $list_size[0]['ma_size'] : ''?>">
                  <input type="hidden" name="soluong" id="cart-qty" value="1">
                  <input type="hidden" name="price" id="cart-price" value="">
                  <?php if($stock > 0): ?>
                    <button name="addtocart" class="detail-button__cart">Add to cart</button>
                  <?php else: ?>
                    <button type="button" class="detail-button__cart out-of-stock" disabled>Product Out of Stock</button>
                  <?php endif; ?>
                </form>
                <script>
                function closeStockError() {
                  document.querySelector('.modal.active').style.display = 'none';
                }
                // Update hidden fields for color, size, and quantity on selection
                document.addEventListener('DOMContentLoaded', function() {
                  // Color
                  document.querySelectorAll('.detail-circle').forEach(function(el) {
                    el.addEventListener('click', function() {
                      var color = this.querySelector('div').textContent.trim();
                      document.getElementById('cart-color').value = color;
                    });
                  });
                  // Size
                  var sizeEls = document.querySelectorAll('.detail-size__item');
                  var sizePrices = <?php echo json_encode($js_size_prices); ?>;
                  sizeEls.forEach(function(el) {
                    el.addEventListener('click', function() {
                      var size = this.textContent.trim();
                      document.getElementById('cart-size').value = size;
                      var sz = el.getAttribute('id_size');
                      var price = sizePrices[sz];
                      document.getElementById('cart-price').value = price ? price : '';
                    });
                  });
                  // Set initial price for first active size
                  var activeEl = document.querySelector('.detail-size__item.active');
                  if (activeEl) {
                    var sz = activeEl.getAttribute('id_size');
                    var price = sizePrices[sz];
                    document.getElementById('cart-price').value = price ? price : '';
                  }
                  // Quantity
                  var qtyInput = document.getElementById('detail-quantity');
                  if(qtyInput) {
                    qtyInput.addEventListener('input', function() {
                      var currentStock = <?=$stock?>;
                      var requestedQty = parseInt(this.value);
                      
                      if (currentStock <= 0) {
                        // Disable add to cart button if out of stock
                        var addBtn = document.querySelector('button[name="addtocart"]');
                        if (addBtn) {
                          addBtn.disabled = true;
                          addBtn.textContent = 'Product Out of Stock';
                          addBtn.classList.add('out-of-stock');
                        }
                        this.value = 0;
                        document.getElementById('cart-qty').value = 0;
                        return;
                      }
                      
                      if (requestedQty > currentStock) {
                        alert('Only ' + currentStock + ' items available in stock.');
                        this.value = currentStock;
                        requestedQty = currentStock;
                      }
                      
                      document.getElementById('cart-qty').value = requestedQty;
                    });
                  }
                });
                </script>
                <!-- Hidden fallback button removed. Main Add to cart button above is always visible. -->
              </div>
            </div>
          </div>
          <section id="tab" class="detail-menu-comment">
            <div class="detail-menu">
              <ul class="detail-tab">
                <li class="detail-tab__item" id="iddetail">
                  <a href="#tab" class="detail-tab__link active">Product Details</a>
                </li>
                <li class="detail-tab__item" id="policy">
                  <a href="#tab" class="detail-tab__link">Sales Policy</a>
                </li>
                <li class="detail-tab__item" id="comment">
                  <a href="#tab" class="detail-tab__link">Product Reviews</a>
                </li>
              </ul>
            </div>
            <div class="detail-policy">
              <div class="detail-body">
                <p class="detail-body__text">
                  Our stylish range of kids wear, including kurthas, t-shirts, and all types of boys’ and girls’ outfits, breathes creativity into every design with sophisticated and playful color schemes. With a harmonious blend of shades, each piece adds a fresh and unique highlight to your child’s style. Made from soft, sweat-absorbent, and quick-drying fabrics, our kids wear ensures comfort, durability, and ease of movement in every activity. More than just fashion, our collection is an inspiration for vibrant and joyful days for your little ones.
                </p>
              </div>
              <div class="detail-brand">
                <div class="detail-brand__text">Brand: Deepus</div>
                <div class="detail-brand__text">Origin: Vietnam</div>
                <div class="detail-brand__text">Gender: Male</div>
                <div class="detail-brand__text">Color: Blue, Black</div>
                <div class="detail-brand__text">Material: Polyester, Polyurethane</div>
              </div>
              <div class="detail-desc">
                Design
                <ul class="detail-design">
                  <li class="detail-design__item">
                  Reflective details are included at the back for increased safety when running at night.
                  </li>
                  <li class="detail-design__item">The fabric is soft and highly absorbent.</li>
                  <li class="detail-design__item">
                    The modern color palette easily coordinates with various outfits.
                  </li>
                </ul>
              </div>
            </div>
            <div class="detail-content-2">
              <h3 class="detail-content-heading">PRODUCT EXCHANGE POLICY:</h3>
              <div class="detail-content-title">1. Conditions for Exchange</div>
              <ul class="detail-menu">
                <li class="detail-menu-item">
                  Please keep the invoice to exchange the product within 30 days.
                </li>
                <li class="detail-menu-item">
                  For discounted personal accessories, exchanges are not accepted.
                </li>
                <li class="detail-menu-item">
                  All purchased products cannot be exchanged for cash.
                </li>
                <li class="detail-menu-item">
                  You can exchange for a different size or product within 30 days (Note: the product must be unused, with tags and purchase invoice intact).
                </li>
                <li class="detail-menu-item">
                  Please send us a video of the packaging and images of your return order, and our consultants will verify and proceed with your return order.
                </li>
              </ul>
              <div class="detail-content-title">2. Cases for Complaints</div>
              <ul class="detail-menu">
                <li class="detail-menu-item">
                  Please keep the invoice to exchange the product within 30 days.
                </li>
                <li class="detail-menu-item">
                  For discounted personal accessories, exchanges are not accepted.
                </li>
                <li class="detail-menu-item">
                  All purchased products cannot be exchanged for cash.
                </li>
                <li class="detail-menu-item">
                  You can exchange for a different size or product within 30 days (Note: the product must be unused, with tags and purchase invoice intact).
                </li>
                <li class="detail-menu-item">
                  Please send us a video of the packaging and images of your return order, and our consultants will verify and proceed with your return order.
                </li>
              </ul>
            </div>
            <div class="detail-content-comment">
              <h2 class="detail-content-heading"><?=count($listcomment)?> Evaluate</h2>

              
              <?=showcomment($listcomment)?>
              <div class="review">
                Your review
                <div class="your-rating">
                    <input type="radio" id="star5" name="rating" value="5">
                    <label for="star5"></label>
                    <input type="radio" id="star4" name="rating" value="4">
                    <label for="star4"></label>
                    <input type="radio" id="star3" name="rating" value="3">
                    <label for="star3"></label>
                    <input type="radio" id="star2" name="rating" value="2">
                    <label for="star2"></label>
                    <input type="radio" id="star1" name="rating" value="1">
                    <label for="star1"></label>
                </div>
                
                <!-- <form class="div-comment" action="index.php?pg=comment" method="post">
                    <input id="selectedRating" type="hidden" name="rate">
                    <input type="text" name="comment" class="comment" placeholder="Bình luận...">
                    <button type="submit" name="send"><i class="fa fa-send send"></i></button>
                </form> -->
  
              </div>
              <form class="div-comment" action="index.php?pg=comment" method="post">
                    <input id="selectedRating" type="hidden" name="rate">
                    <input type="hidden" name="id_product" value="<?=$detail['ma_sanpham']?>">
                    <input type="text" name="comment" class="comment" placeholder="Bình luận...">
                    <button type="submit" name="send"><i class="fa fa-send send"></i></button>
                </form>
            </div>
          </section>
        </div>
      </section>
      <section class="product">
        <div class="container">
          <div class="heading-primary">PRODUCTS IN THE SAME CATEGORY</div>
          <div class="product-list">
              
          <?=$html_relative_product?>

          </div>
        </div>
        <div class="product-btn">
          <a href='index.php?pg=product'><button class="button-primary">View All</button></a>
        </div>
      </section>
      <div class="modal">
    <div class="modal-overlay"></div>
    <div class="modal-content">
      <div class="modal-main">
        <img src="view/layout/assets/images/thatbai.png" alt="">
        <h3>The remaining quantity of the product is not enough to meet your request</h3>
        <div class="modal__succesfully">
            <button onclick="tatthongbaocart()" class="monal__succesfully-btn">Agree</button>
        </div>
      </div>
    </div>
  </div>
  <div class="app-fixed">
        <ul class="app-fixed-menu">
          <li class="app-fixed-list">
            <a href="index.php" class="app-fixed-link">
              <i class="fa fa-home" aria-hidden="true"></i>
            </a>
          </li>
          <li class="app-fixed-list active">
            <a href="index.php?pg=product" class="app-fixed-link">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="35"
                height="28"
                viewBox="0 0 35 28"
                fill="none">
                <path
                  d="M25 14C25 16.7614 22.7614 19 20 19C17.2386 19 15 16.7614 15 14C15 11.2386 17.2386 9 20 9C22.7614 9 25 11.2386 25 14Z"
                  fill="white" />
                <circle cx="20" cy="14" r="5" fill="#46694F" />
                <path
                  d="M34.5175 5.27734L23.8712 0C22.7722 1.52031 20.3389 2.58125 17.501 2.58125C14.6631 2.58125 12.2298 1.52031 11.1307 0L0.48448 5.27734C0.0525059 5.49609 -0.122471 6.02109 0.090782 6.45312L3.21849 12.7148C3.43721 13.1469 3.96214 13.3219 4.39412 13.1086L7.48902 11.5938C8.06863 11.3094 8.74667 11.7305 8.74667 12.3812V26.25C8.74667 27.218 9.52859 28 10.4964 28H24.4946C25.4624 28 26.2444 27.218 26.2444 26.25V12.3758C26.2444 11.7305 26.9224 11.3039 27.502 11.5883L30.5969 13.1031C31.0289 13.3219 31.5538 13.1469 31.7725 12.7094L34.9057 6.45312C35.1244 6.02109 34.9494 5.49062 34.5175 5.27734Z"
                  fill="white" />
              </svg>
            </a>
          </li>
          <li class="app-fixed-list">
            <a href="index.php?pg=design" class="app-fixed-link">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="31"
                height="31"
                viewBox="0 0 31 31"
                fill="none">
                <path
                  d="M18 15.5C18 16.8807 16.8807 18 15.5 18C14.1193 18 13 16.8807 13 15.5C13 14.1193 14.1193 13 15.5 13C16.8807 13 18 14.1193 18 15.5Z"
                  fill="white" />
                <circle cx="15.5" cy="15.5" r="2.5" fill="#46694F" />
                <path
                  d="M6.62767 14.7762L14.7759 6.62915L12.1047 3.95787L8.37018 7.69233C8.32565 7.73695 8.27275 7.77235 8.21452 7.7965C8.15629 7.82066 8.09387 7.83309 8.03082 7.83309C7.96778 7.83309 7.90536 7.82066 7.84713 7.7965C7.78889 7.77235 7.736 7.73695 7.69146 7.69233L7.01274 7.01361C6.82505 6.82592 6.82505 6.52198 7.01274 6.3349L10.7472 2.60044L8.71045 0.563075C7.96029 -0.187086 6.74452 -0.187086 5.99436 0.563075L0.562779 5.99463C-0.186781 6.74479 -0.187386 7.96055 0.562779 8.71071L6.62767 14.7762ZM30.148 7.70444C31.2838 6.5686 31.2832 4.72741 30.148 3.59157L27.4083 0.851878C26.2724 -0.283959 24.4306 -0.283959 23.2942 0.851878L20.5078 3.63759L27.3616 10.4914L30.148 7.70444ZM19.1377 5.00834L1.15552 22.988L0.019681 29.493C-0.1335 30.3703 0.63059 31.1344 1.50851 30.98L8.01417 29.8393L25.9915 11.8615L19.1377 5.00834ZM30.4374 22.2899L28.4006 20.2531L24.6661 23.9876C24.4784 24.1753 24.1745 24.1753 23.9874 23.9876L23.3087 23.3089C23.1216 23.1212 23.1216 22.8173 23.3087 22.6302L27.0432 18.8957L24.3707 16.2232L16.2224 24.3703L22.2897 30.4369C23.0399 31.1871 24.2556 31.1871 25.0058 30.4369L30.4374 25.006C31.1875 24.2558 31.1875 23.0401 30.4374 22.2899Z"
                  fill="white" />
              </svg>
            </a>
          </li>
          <li class="app-fixed-list">
            <a href="index.php?pg=login" class="app-fixed-link">
              <i class="fa fa-user-circle" aria-hidden="true"></i>
            </a>
          </li>
          <div class="selected-option-bg"></div>
        </ul>
      </div>