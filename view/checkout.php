<?php
  if(!isset($_SESSION['giamgia'])) $_SESSION['giamgia'] = 0;
  $html_product_checkout='';
  $tongtien=0;
  $tongsoluong=0;
  // Always recalculate tongtien from cart session
  if(isset($_SESSION['giohang']) && count($_SESSION['giohang'])>0){
    foreach ($_SESSION['giohang'] as $item) {
      extract($item);
      $tongsoluong += (int)$soluong;
      $tongtien += ((int)$soluong) * ((int)$price);
      if($soluong==1){
        $soluong='';
      }else{
        $soluong='<div class="checkout-right-quantity">
        <span class="number">'.$soluong.'</span>
      </div>';
      }
      $html_product_checkout.='<div class="checkout-right-list">
        <input type="hidden" name="id_product" value="'.(isset($id)?$id:'').'">
        <input type="hidden" name="img" value="'.(isset($img)?$img:'').'">
        <input type="hidden" name="product_design" value="'.(isset($product_design)?$product_design:'').'">
        <input type="hidden" name="id_product_design" value="'.(isset($id_product_design)?$id_product_design:'').'">
      <div class="checkout-right-item">
        <div class="checkout-right-image">
          '.check_img($img).$soluong.'
        </div>
        <div class="checkout-right-content">
          <div class="checkout-right-title">'.$name.'</div>
          <div class="checkout-right-main">
            <div class="checkout-right-color">Color: '.$color.'</div>
            <div class="checkout-right-size">Size: '.$size.'</div>
          </div>
        </div>
      </div>
      <div class="checkout-right-price">'.number_format($price,0,'',',').'₹</div>
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
          <form action="mailer.php" method="post">
            <input type="hidden" name="emaildat" value="'.$_SESSION['email'].'">
            <input type="hidden" name="tendat" value="'.$_SESSION['name'].'">
            <button name="sendmail" class="monal__succesfully-btn">View order</button>
          </form>
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
    <form action="index.php?pg=checkout" method="post">
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
                      xhr.open('POST', 'razorpay_process.php', true);
                      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                      xhr.onreadystatechange = function() {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                          alert('Payment successful! Order placed and mail sent.');
                          window.location = "index.php?pg=thankyou";
                        }
                      };
                      // Collect product and user details from the form
                      var name = document.querySelector('input[name="tendat"]').value;
                      var email = document.querySelector('input[name="emaildat"]').value;
                      var phone = document.querySelector('input[name="sdtdat"]').value;
                      var address = document.querySelector('input[name="diachidat"]').value;
                      var products = [];
                      document.querySelectorAll('.checkout-right-list').forEach(function(item){
                        var title = item.querySelector('.checkout-right-title').textContent;
                        var color = item.querySelector('.checkout-right-color').textContent.replace('Color: ','');
                        var size = item.querySelector('.checkout-right-size').textContent.replace('Size: ','');
                        var price = item.querySelector('.checkout-right-price').textContent.replace('₹','').replace(/,/g,'');
                        var quantity = item.querySelector('.number') ? item.querySelector('.number').textContent : '1';
                        var id_product = item.querySelector('input[name="id_product"]') ? item.querySelector('input[name="id_product"]').value : '';
                        var img = item.querySelector('input[name="img"]') ? item.querySelector('input[name="img"]').value : '';
                        var product_design = item.querySelector('input[name="product_design"]') ? item.querySelector('input[name="product_design"]').value : '';
                        var id_product_design = item.querySelector('input[name="id_product_design"]') ? item.querySelector('input[name="id_product_design"]').value : '';
                        products.push({
                          title:title,
                          color:color,
                          size:size,
                          price:price,
                          quantity:quantity,
                          id_product:id_product,
                          img:img,
                          product_design:product_design,
                          id_product_design:id_product_design
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