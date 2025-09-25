<?php
// --- COD Order + Mailer Integration (Create order, insert items, then send mail) ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['thanhtoan'])) {
  if (session_status() === PHP_SESSION_NONE) { session_start(); }
  require_once __DIR__ . '/../model/connectdb.php';
  require_once __DIR__ . '/../model/donhang.php';
  require_once __DIR__ . '/../model/cart.php';
  // Optional: reduce stock after inserting items
  require_once __DIR__ . '/../model/product.php';

  // Collect customer details
  $name   = isset($_POST['tendat']) ? trim($_POST['tendat']) : (isset($_SESSION['name']) ? $_SESSION['name'] : '');
  $email  = isset($_POST['emaildat']) ? trim($_POST['emaildat']) : (isset($_SESSION['email']) ? $_SESSION['email'] : '');
  $phone  = isset($_POST['sdtdat']) ? trim($_POST['sdtdat']) : (isset($_SESSION['sdt']) ? $_SESSION['sdt'] : '');
  $addr   = isset($_POST['diachidat']) ? trim($_POST['diachidat']) : (isset($_SESSION['diachi']) ? $_SESSION['diachi'] : '');

  // Build products list from either cart session or posted direct-buy inputs
  $products = [];
  if (isset($_SESSION['giohang']) && is_array($_SESSION['giohang']) && count($_SESSION['giohang']) > 0) {
    foreach ($_SESSION['giohang'] as $item) {
      $products[] = [
        'id_product' => isset($item['id']) ? (int)$item['id'] : 0,
        'size' => isset($item['size']) ? $item['size'] : '',
        'color' => isset($item['color']) ? $item['color'] : '',
        'price' => isset($item['price']) ? (int)$item['price'] : 0,
        'quantity' => isset($item['soluong']) ? (int)$item['soluong'] : 1,
        'img' => isset($item['img']) ? $item['img'] : '',
        'product_design' => isset($item['product_design']) ? $item['product_design'] : '',
        'id_product_design' => isset($item['id_product_design']) ? (int)$item['id_product_design'] : 0,
        'title' => isset($item['name']) ? $item['name'] : ''
      ];
    }
  } else if (isset($_POST['id_product']) || isset($_POST['id_product_list'])) {
    // Direct-buy or multi-product via form hidden inputs
    // Prefer array names if present
    $ids      = isset($_POST['id_product']) && is_array($_POST['id_product']) ? $_POST['id_product'] : (isset($_POST['id_product_list']) ? $_POST['id_product_list'] : []);
    $sizes    = isset($_POST['size']) && is_array($_POST['size']) ? $_POST['size'] : (isset($_POST['size_list']) ? $_POST['size_list'] : []);
    $colors   = isset($_POST['color']) && is_array($_POST['color']) ? $_POST['color'] : (isset($_POST['color_list']) ? $_POST['color_list'] : []);
    $prices   = isset($_POST['price']) && is_array($_POST['price']) ? $_POST['price'] : (isset($_POST['price_list']) ? $_POST['price_list'] : []);
    $qtys     = isset($_POST['quantity']) && is_array($_POST['quantity']) ? $_POST['quantity'] : (isset($_POST['quantity_list']) ? $_POST['quantity_list'] : []);
    $imgs     = isset($_POST['img']) && is_array($_POST['img']) ? $_POST['img'] : (isset($_POST['img_list']) ? $_POST['img_list'] : []);
    $pdesigns = isset($_POST['product_design']) && is_array($_POST['product_design']) ? $_POST['product_design'] : (isset($_POST['product_design_list']) ? $_POST['product_design_list'] : []);
    $pdids    = isset($_POST['id_product_design']) && is_array($_POST['id_product_design']) ? $_POST['id_product_design'] : (isset($_POST['id_product_design_list']) ? $_POST['id_product_design_list'] : []);

    // If non-array single inputs (legacy), normalize to arrays
    if (!is_array($ids) && isset($_POST['id_product'])) { $ids = [$_POST['id_product']]; }
    if (!is_array($sizes) && isset($_POST['size'])) { $sizes = [$_POST['size']]; }
    if (!is_array($colors) && isset($_POST['color'])) { $colors = [$_POST['color']]; }
    if (!is_array($prices) && isset($_POST['price'])) { $prices = [$_POST['price']]; }
    if (!is_array($qtys) && isset($_POST['quantity'])) { $qtys = [$_POST['quantity']]; }
    if (!is_array($imgs) && isset($_POST['img'])) { $imgs = [$_POST['img']]; }
    if (!is_array($pdesigns) && isset($_POST['product_design'])) { $pdesigns = [$_POST['product_design']]; }
    if (!is_array($pdids) && isset($_POST['id_product_design'])) { $pdids = [$_POST['id_product_design']]; }

    $count = is_array($ids) ? count($ids) : 0;
    for ($i = 0; $i < $count; $i++) {
      $products[] = [
        'id_product' => isset($ids[$i]) ? (int)$ids[$i] : 0,
        'size' => isset($sizes[$i]) ? $sizes[$i] : '',
        'color' => isset($colors[$i]) ? $colors[$i] : '',
        'price' => isset($prices[$i]) ? (int)$prices[$i] : 0,
        'quantity' => isset($qtys[$i]) ? (int)$qtys[$i] : 1,
        'img' => isset($imgs[$i]) ? $imgs[$i] : '',
        'product_design' => isset($pdesigns[$i]) ? $pdesigns[$i] : '',
        'id_product_design' => isset($pdids[$i]) ? (int)$pdids[$i] : 0,
      ];
    }
  }

  // Compute totals
  $tongtien = 0;
  foreach ($products as $p) {
    $tongtien += ((int)$p['price']) * ((int)$p['quantity']);
  }
  $giamgia = isset($_SESSION['giamgia']) ? (int)$_SESSION['giamgia'] : 0;
  if ($giamgia > 0) {
    $tongtien = $tongtien - intval($tongtien * $giamgia / 100);
  }

  // Create order
  $iduser = isset($_SESSION['iduser']) ? (int)$_SESSION['iduser'] : 0;
  $ma_donhang = createma_donhang();
  $ngaylap = date('Y-m-d H:i:s');
  $trangthai = 'pending';
  $tendat = $name; $tennhan = $name;
  $emaildat = $email; $emailnhan = $email;
  $sdtdat = $phone; $sdtnhan = $phone;
  $diachidat = $addr; $diachinhan = $addr;
  $ptthanhtoan = 'Cash on Delivery';
  $giaohangnhanh = isset($_POST['tocdo']) ? 1 : 0;
  $id_voucher = isset($_SESSION['id_voucher']) ? $_SESSION['id_voucher'] : null;

  creatdonhang(
    $iduser, $ma_donhang, $ngaylap, $trangthai, $tongtien,
    $tendat, $tennhan, $emaildat, $emailnhan,
    $sdtdat, $sdtnhan, $diachidat, $diachinhan,
    $ptthanhtoan, $giaohangnhanh, $id_voucher
  );
  $id_donhang = getiddonhang();

  // Insert items into cart table
  if ($id_donhang) {
    foreach ($products as $item) {
      $id_product = isset($item['id_product']) ? (int)$item['id_product'] : 0;
      $soluong    = isset($item['quantity']) ? (int)$item['quantity'] : 1;
      $price      = isset($item['price']) ? (int)$item['price'] : 0;
      $thanhtien  = $price * $soluong;
      $img        = isset($item['img']) ? $item['img'] : '';
      $size_text  = isset($item['size']) ? $item['size'] : '';
      $color_text = isset($item['color']) ? $item['color'] : '';
      // Try to resolve IDs but don't block insert if not found
      $id_size  = getidsize($id_product, $size_text);
      if ($id_size === null) { $id_size = 0; }
      $id_color = getidcolor($color_text);

      $product_design    = isset($item['product_design']) ? $item['product_design'] : '';
      $id_product_design = isset($item['id_product_design']) ? (int)$item['id_product_design'] : 0;

      add_cart(
        $iduser, $id_donhang, $id_product, $soluong,
        $price, $thanhtien, $img, $id_size, $id_color,
        $product_design, $id_product_design
      );
      // Reduce stock once per item
      if (function_exists('reduce_product_stock') && $id_product > 0 && $soluong > 0) {
        reduce_product_stock($id_product, $soluong);
      }
    }
  }

  // Prepare session for mail template
  $_SESSION['donhang'] = ['ma_donhang' => $ma_donhang];
  $_SESSION['ngaylap'] = $ngaylap;
  $_SESSION['name'] = $name;
  $_SESSION['email'] = $email;
  $_SESSION['sdt'] = $phone;
  $_SESSION['diachi'] = $addr;

  // If we built products from POST (direct-buy without session cart), create a temp session cart for mailer
  if (!isset($_SESSION['giohang']) || !is_array($_SESSION['giohang']) || count($_SESSION['giohang']) === 0) {
    $_SESSION['giohang'] = [];
    foreach ($products as $p) {
      $_SESSION['giohang'][] = [
        'id' => $p['id_product'],
        'name' => isset($p['title']) ? $p['title'] : '',
        'size' => $p['size'],
        'color' => $p['color'],
        'price' => $p['price'],
        'soluong' => $p['quantity'],
        'img' => $p['img']
      ];
    }
  }

  // Trigger mailer
  $_POST['sendmail'] = true;
  $_POST['emaildat'] = $email;
  $_POST['tendat']   = $name;
  include_once __DIR__ . '/../mailer/mailer.php';

  // Cleanup flags and redirect
  $_SESSION['mail'] = 1;
  echo '<script>window.location = "index.php?pg=thankyou";</script>';
  exit;
}
?>
<?php
  if(!isset($_SESSION['giamgia'])) $_SESSION['giamgia'] = 0;
  $html_product_checkout='';
  $tongtien=0;
  $tongsoluong=0;
  // If direct buy, use submitted product details
  if(isset($_POST['price_checkout']) && $_POST['price_checkout'] !== '') {
    $price_checkout = (float)$_POST['price_checkout'];
    $qty_checkout = isset($_POST['soluong_checkout']) ? (int)$_POST['soluong_checkout'] : 1;
    $tongtien = $price_checkout * $qty_checkout;
    $tongsoluong = $qty_checkout;
    $name_checkout = isset($_POST['name_checkout']) ? $_POST['name_checkout'] : '';
    $color_checkout = isset($_POST['color_checkout']) ? $_POST['color_checkout'] : '';
    $size_checkout = isset($_POST['size_checkout']) ? $_POST['size_checkout'] : '';
    $img_checkout = isset($_POST['img_checkout']) ? $_POST['img_checkout'] : '';
    $id_checkout = isset($_POST['id_checkout']) ? (int)$_POST['id_checkout'] : 0;
    // Always resolve to product's main image when id is provided
    if($id_checkout>0){
      $img_row = getimg_product_main($id_checkout);
      if(isset($img_row['main_img']) && $img_row['main_img'] !== ''){
        $img_checkout = $img_row['main_img'];
      }
    }
    $html_product_checkout.='<div class="checkout-right-list">
      <input type="hidden" name="id_product[]" value="'.(isset($_POST['id_checkout'])?$_POST['id_checkout']:'').'">
      <input type="hidden" name="img[]" value="'.$img_checkout.'">
      <input type="hidden" name="size[]" value="'.$size_checkout.'">
      <input type="hidden" name="color[]" value="'.$color_checkout.'">
      <input type="hidden" name="price[]" value="'.$price_checkout.'">
      <input type="hidden" name="quantity[]" value="'.$qty_checkout.'">
      <div class="checkout-right-item">
        <div class="checkout-right-image">
          '.check_img($img_checkout).'
        </div>
        <div class="checkout-right-content">
          <div class="checkout-right-title">'.$name_checkout.'</div>
          <div class="checkout-right-main">
            <div class="checkout-right-color">Color: '.$color_checkout.'</div>
            <div class="checkout-right-size">Size: '.$size_checkout.'</div>
            <div class="checkout-qty-text">Qty: '.$qty_checkout.'</div>
          </div>
        </div>
      </div>
      <div class="checkout-right-price">'.number_format($price_checkout,0,'',',').'₹</div>
    </div>';
  } else if(isset($_SESSION['giohang']) && count($_SESSION['giohang'])>0){
    foreach ($_SESSION['giohang'] as $item) {
      extract($item);
      $tongsoluong += (int)$soluong;
      $tongtien += ((int)$soluong) * ((int)$price);
      // Resolve main image from product id to ensure only the correct main image is shown
      $img_row = getimg_product_main($id);
      $img_main = isset($img_row['main_img']) ? $img_row['main_img'] : (isset($img) ? $img : '');
      // Use submitted size/price if available
      $size_checkout = isset($_POST['size_checkout']) && $_POST['size_checkout'] !== '' ? $_POST['size_checkout'] : $size;
      $price_checkout = isset($_POST['price_checkout']) && $_POST['price_checkout'] !== '' ? $_POST['price_checkout'] : $price;
      $html_product_checkout.='<div class="checkout-right-list">
        <input type="hidden" name="id_product[]" value="'.(isset($id)?$id:'').'">
        <input type="hidden" name="img[]" value="'.(isset($img_main)?$img_main:'').'">
        <input type="hidden" name="product_design[]" value="'.(isset($product_design)?$product_design:'').'">
        <input type="hidden" name="id_product_design[]" value="'.(isset($id_product_design)?$id_product_design:'').'">
        <input type="hidden" name="size[]" value="'.$size_checkout.'">
        <input type="hidden" name="color[]" value="'.$color.'">
        <input type="hidden" name="price[]" value="'.$price_checkout.'">
        <input type="hidden" name="quantity[]" value="'.(int)$item['soluong'].'">
      <div class="checkout-right-item">
        <div class="checkout-right-image">
          '.check_img($img_main).'
        </div>
        <div class="checkout-right-content">
          <div class="checkout-right-title">'.$name.'</div>
          <div class="checkout-right-main">
            <div class="checkout-right-color">Color: '.$color.'</div>
            <div class="checkout-right-size">Size: '.$size_checkout.'</div>
            <div class="checkout-qty-text">Qty: '.(int)$item['soluong'].'</div>
          </div>
        </div>
      </div>
      <div class="checkout-right-price">'.number_format($price_checkout,0,'',',').'₹</div>
    </div>';
    }
  }
  $html_giamgia='';
  $html_phuongthuc='<label class="phuongthuctt">
          <input name="phuongthuc" value="Cash on Delivery" type="radio" checked="checked"/>
          Cash on Delivery
        </label><br>
        <label id="phuongthuctt"
          >
          <input name="phuongthuc" value="International / Domestic Card Payment" type="radio"/>
          International / Domestic Card Payment
        </label><br>
        <label id="phuongthuctt"
          >
          <input name="phuongthuc" value="E-wallet Payment" type="radio"/>
          E-wallet Payment
        </label>';
  if(isset($_SESSION['giamgia']) && $_SESSION['giamgia']>0){
    $html_giamgia='<div class="form-flex">
    <span> Giảm giá</span>
    <span>'.number_format($_SESSION['giamgia']*$tongtien/100,0,'',',').'₹</span>
  </div>';
  }
  $html_tocdo='';
  if(isset($user) && !isset($_SESSION['btngiamgia']) && isset($_SESSION['namenhan']) && $_SESSION['namenhan']==''){
    extract($user);
    $namenhan='';
    $emailnhan='';
    $sdtnhan='';
    $diachinhan='';
    $_SESSION['namenhan']=$namenhan;
    $_SESSION['emailnhan']=$emailnhan;
    $_SESSION['sdtnhan']=$sdtnhan;
    $_SESSION['diachinhan']=$diachinhan;
    $_SESSION['name']=$name;
    $_SESSION['email']=$email;
    $_SESSION['sdt']=$sdt;
    $_SESSION['diachi']=$diachi;
  }
      
        if(isset($_SESSION['giaohangnhanh']) && $_SESSION['giaohangnhanh']==1){
          $html_tocdo=' checked="checked"';
        }
        if(isset($_SESSION['phuongthuc']) && $_SESSION['phuongthuc']=='Cash on Delivery'){
          $html_phuongthuc='<label class="phuongthuctt">
          <input name="phuongthuc" value="Cash on Delivery" type="radio" checked="checked"/>
          Cash on Delivery
        </label><br>
        <label id="phuongthuctt"
          >
          <input name="phuongthuc" value="International / Domestic Card Payment" type="radio"/>
          International / Domestic Card Payment
        </label><br>
        <label id="phuongthuctt"
          >
          <input name="phuongthuc" value="E-wallet Payment" type="radio"/>
          E-wallet Payment
        </label>';
        }
        if(isset($_SESSION['phuongthuc']) && $_SESSION['phuongthuc']=='International / Domestic Card Payment'){
          $html_phuongthuc='<label class="phuongthuctt">
          <input name="phuongthuc" value="Cash on Delivery" type="radio" />
          Cash on Delivery
        </label><br>
        <label id="phuongthuctt"
          >
          <input name="phuongthuc" value="International / Domestic Card Payment" type="radio" checked="checked"/>
          International / Domestic Card Payment
        </label><br>
        <label id="phuongthuctt"
          >
          <input name="phuongthuc" value="E-wallet Payment" type="radio"/>
          E-wallet Payment
        </label>';
        }
        if(isset($_SESSION['phuongthuc']) && $_SESSION['phuongthuc']=='E-wallet Payment'){
          $html_phuongthuc='<label class="phuongthuctt">
          <input name="phuongthuc" value="Cash on Delivery" type="radio"/>
          Cash on Delivery
        </label><br>
        <label id="phuongthuctt"
          >
          <input name="phuongthuc" value="International / Domestic Card Payment" type="radio"/>
          International / Domestic Card Payment
        </label><br>
        <label id="phuongthuctt"
          >
          <input name="phuongthuc" value="E-wallet Payment" type="radio"  checked="checked"/>
          E-wallet Payment
        </label>';
        }


        
  $html_mail="";
  if(isset($_SESSION['mail']) && $_SESSION['mail']==1){
    $html_mail='<div class="modal active">
    <div class="modal-overlay"></div>
    <div class="modal-content">
      <div class="modal-main">
      <img src="view/layout/assets/images/thanhcong.png" alt="">
        <h3>You have successfully placed your order.</h3>
        <div class="modal__succesfully">
          <a href="index.php?pg=account" class="monal__succesfully-btn">View order</a>
        </div>
      </div>
    </div>
  </div>';
    unset($_SESSION['mail']);
  }
  
  
?>
 
<div class="link-mobile">
        <a href="#">Home</a>
        <i class="fa fa-chevron-right" aria-hidden="true"></i>
        <a href="#">T-shirts</a>
      </div>
  <form action="/deepus/checkout" method="post">
      <section class="checkout">
       
        <div class="container">
          <div class="checkout-center">
            <div class="checkout-center-icon">
              <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
            </div>
            <div class="checkout-center-text">Payment</div>
            <p>Please check customer information and order before payment.</p>
          </div>
          <div class="checkout-main">
            <div class="checkout-left">
              <div class="order">
                <h3 class="order-title">Order information</h3>
                <div action="" class="order-form order-info">
                  
                  <input name="tendat" class="order-input" type="text" placeholder="Enter your name" value="<?=$_SESSION['name']?>" />
                  <div class="errform"><?=$errname?></div>
                  <input name="emaildat" class="order-input" type="text" placeholder="Enter your email"  value="<?=$_SESSION['email']?>"/> 
                  <div class="errform"><?=$erremail?></div>
                  <input name="sdtdat" class="order-input" type="text" placeholder="Enter your phone number"  value="<?=$_SESSION['sdt']?>"/> 
                  <div class="errform"><?=$errsdt?></div>
                  <input name="diachidat" class="order-input" type="text" placeholder="Enter your address"  value="<?=$_SESSION['diachi']?>"/> 
                  <div class="errform"><?=$errdiachi?></div>
                </div>
                <div class="order-checkbox">
                  <input onchange='diachikhac()' class="checkdiachi" type="checkbox" />
                  Delivery to another address
                </div>
                <div class="diachikhac"  style="display:none">
                  <h3 class="order-title">Recipient information</h3>
                  <div class="order-form order-info">
                    <input name="tennhan" class="order-input" type="text" placeholder="Enter full name"  value="<?=$_SESSION['namenhan']?>"/> 
                    <div class="errform"><?=$errnamenhan?></div>
                    <input name="emailnhan" class="order-input" type="text" placeholder="Enter email"  value="<?=$_SESSION['emailnhan']?>"/>
                    <div class="errform"><?=$erremailnhan?></div>
                    <input name="sdtnhan" class="order-input" type="text" placeholder="Enter phone number"  value="<?=$_SESSION['sdtnhan']?>"/> 
                    <div class="errform"><?=$errsdtnhan?></div>
                    <input name="diachinhan" class="order-input" type="text" placeholder="Enter address"  value="<?=$_SESSION['diachinhan']?>"/> 
                    <div class="errform"><?=$errdiachinhan?></div>
                  </div>
                </div>
              </div>
              <div class="order-pt">
                <h3 class="order-title">Shipping method</h3>
                  <input type="checkbox" <?=$html_tocdo?> name="tocdo">
                  <label for="radio1">Standard shipping (2 - 5 business days)</label>
              </div>
              <div id="order-pt">
                <h3 class="order-title">Payment method</h3>
                
                <?=$html_phuongthuc?>

               
              </div>
            </div>
            <div class="checkout-right">
              <div class="checkout-right-box">
                <div class="checkout-right-title-heading">Order (<?=($tongsoluong>0?$tongsoluong:count($_SESSION['giohang']))?> products)</div>
                <div class="checkout-right-overflow">
                  
                <?=$html_product_checkout?>
                  
                </div>
                <div class="voucher">
                  
                    <?php
                      echo '<div class="voucher-list">
                      <div class="voucher-item">
                      <input name="magiamgia" type="text" placeholder="Enter coupon code" value='.$_SESSION['magiamgia'].'>
                    </div>
                    <div class="voucher-btn">
                      <button name="btngiamgia" class="voucher-button voucher-button-mobile">Apply</button>
                    </div>
                    </div>
                    <div class="errform">'.$errvoucher.'</div>';
                    ?>
                  
                </div>
                <div class="form-group">
                  <div class="form-flex">
                    <span> Provisional</span>
                    <span><?=number_format($tongtien > 0 ? $tongtien : 0,0,'',',')?>₹</span>
                  </div>

                  <?=$html_giamgia?>

                  <div class="form-flex">
                    <span>Shipping fee</span>
                    <span>-</span>
                  </div>
                </div>
                
                <div class="form-flex mt-10">
                  <span class="checkout-total">Total</span>
                  <span><?=number_format(($tongtien > 0 ? $tongtien : 0)-$_SESSION['giamgia']*($tongtien > 0 ? $tongtien : 0)/100,0,'',',')?>₹</span>
                </div>
                <div class="form-flex back-flex mt-10">
                  <div class="back-cart">
                    <a href="index.php?pg=cart">Back to cart</a>
                  </div>
                  
                  <div class="voucher-btn button-primary__primary">
                    <button name="thanhtoan" id="place-order-btn" class="voucher-button">Place order</button>
                  </div>
                </div>
              <!-- Razorpay Payment Button -->
              <div class="form-flex mt-10">
                <button id="rzp-button" class="voucher-button button-primary__primary" style="display:none;">Pay with Razorpay</button>
              </div>
              <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
              <script>
              function updatePaymentButtons() {
                var method = document.querySelector('input[name="phuongthuc"]:checked').value;
                var rzpBtn = document.getElementById('rzp-button');
                var placeOrderBtn = document.getElementById('place-order-btn');
                if (method === 'Cash on Delivery') {
                  rzpBtn.style.display = 'none';
                  placeOrderBtn.style.display = '';
                } else {
                  rzpBtn.style.display = '';
                  placeOrderBtn.style.display = 'none';
                }
              }
              document.querySelectorAll('input[name="phuongthuc"]').forEach(function(el){
                el.addEventListener('change', updatePaymentButtons);
              });
              updatePaymentButtons();

              var options = {
                  "key": "rzp_test_R9V9xLm1ZY5RW3", // Replace with your Razorpay Key ID
                  "amount": "<?=($tongtien > 0 ? $tongtien : 0)-$_SESSION['giamgia']*($tongtien > 0 ? $tongtien : 0)/100?>00", // Amount in paise
                  "currency": "INR",
                  "name": "keerthan",
                  "description": "Order Payment",
                  "handler": function (response){
                      // Send payment ID and order details to send_mail.php after successful payment
                      var xhr = new XMLHttpRequest();
                      xhr.open('POST', '/deepus/razorpay_process', true);
                      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                      xhr.onreadystatechange = function() {
                        if (xhr.readyState === 4) {
                          if (xhr.status === 200) {
                            if (xhr.responseText.trim() === 'success') {
                              alert('Payment successful! Order placed and mail sent.');
                              window.location = "index.php?pg=thankyou";
                            } else {
                              alert('Server response: ' + xhr.responseText);
                            }
                          } else {
                            alert('Payment failed! Server error: ' + xhr.status + '\n' + xhr.responseText);
                          }
                        }
                      };
                      xhr.onerror = function() {
                        alert('AJAX error: Could not reach server.');
                      };
                      // Collect product and user details from the form
                      var name = document.querySelector('input[name="tendat"]').value;
                      var email = document.querySelector('input[name="emaildat"]').value;
                      var phone = document.querySelector('input[name="sdtdat"]').value;
                      var address = document.querySelector('input[name="diachidat"]').value;
                      var products = [];
                      document.querySelectorAll('.checkout-right-list').forEach(function(item){
                        var title = item.querySelector('.checkout-right-title') ? item.querySelector('.checkout-right-title').textContent : '';
                        var color = item.querySelector('.checkout-right-color') ? item.querySelector('.checkout-right-color').textContent.replace('Color: ','') : '';
                        var size = item.querySelector('.checkout-right-size') ? item.querySelector('.checkout-right-size').textContent.replace('Size: ','') : '';
                        // Prefer hidden inputs (handles array names like price[]), fallback to text content
                        var priceInput = item.querySelector('input[name^="price"]');
                        var price = priceInput ? priceInput.value : (item.querySelector('.checkout-right-price') ? item.querySelector('.checkout-right-price').textContent.replace('₹','').replace(/,/g,'') : '0');
                        var qtyInput = item.querySelector('input[name^="quantity"]');
                        var quantity = qtyInput ? qtyInput.value : (item.querySelector('.number') ? item.querySelector('.number').textContent : '1');
                        var idEl = item.querySelector('input[name^="id_product"]');
                        var id_product = idEl ? idEl.value : '';
                        var imgEl = item.querySelector('input[name^="img"]');
                        var img = imgEl ? imgEl.value : '';
                        var pdEl = item.querySelector('input[name^="product_design"]');
                        var product_design = pdEl ? pdEl.value : '';
                        var pdiEl = item.querySelector('input[name^="id_product_design"]');
                        var id_product_design = pdiEl ? pdiEl.value : '';
                        products.push({
                          title: title,
                          color: color,
                          size: size,
                          price: price,
                          quantity: quantity,
                          id_product: id_product,
                          img: img,
                          product_design: product_design,
                          id_product_design: id_product_design
                        });
                      });
                      var params = 'razorpay_payment_id=' + encodeURIComponent(response.razorpay_payment_id)
                        + '&name=' + encodeURIComponent(name)
                        + '&email=' + encodeURIComponent(email)
                        + '&phone=' + encodeURIComponent(phone)
                        + '&address=' + encodeURIComponent(address)
                        + '&products=' + encodeURIComponent(JSON.stringify(products));
                      xhr.send(params);
                  },
                  "prefill": {
                      "name": "<?=isset($_SESSION['name']) ? $_SESSION['name'] : ''?>",
                      "email": "<?=isset($_SESSION['email']) ? $_SESSION['email'] : ''?>",
                      "contact": "<?=isset($_SESSION['sdt']) ? $_SESSION['sdt'] : ''?>"
                  }
              };
              var rzp1 = new Razorpay(options);
              document.getElementById('rzp-button').onclick = function(e){
                  rzp1.open();
                  e.preventDefault();
              }
              </script>
              </div>
            </div>
          </div>
        </div>

      </section>
      </form>
      <?=$html_mail?>