 
<div class="link-mobile">
        <a href="#">Home </a>
        <i class="fa fa-chevron-right" aria-hidden="true"></i>
        <a href="#">T-shirt</a>
      </div>
      <!-- Login -->
      <section class="cart">
        <div class="container">
          <div class="cart-title-heading">Shopping Cart</div>
          <div class="cart-main">
            <div class="cart-left">
              <!-- <div class="cart-box">
                <div class="cart-box-heading">
                  <div class="cart-box__info">Thông tin sản phẩm</div>
                  <div class="cart-box__right">
                    <div class="cart-box__price">Đơn giá</div>
                    <div class="cart-box__quantity">Số lượng</div>
                    <div class="cart-box__total">Thành tiền</div>
                  </div>
                </div>
              </div> -->
              <table class="cart-table">
              <thead>
                  <tr>
                    <th class="pro-info">Product Details</th>
                    <th>Item Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                  </tr>
              </thead>
                
                <tbody>
                  <?php
                    require_once "model/cart.php";
                    require_once "model/product.php";
                    require_once "model/user.php";
                    $html_cart = '';
                    $tongtien = 0;
                    $j = 0;
                    // Show session cart (unpaid)
                    if(isset($_SESSION['giohang']) && count($_SESSION['giohang']) > 0){
                      foreach ($_SESSION['giohang'] as $item) {
                        extract($item);
                        // ...existing code...
                        if($product_design==0){
                          $html_cart.='<tr class="cart-product">
                          <td>
                            <div class="pro-main">
                              <div class="pro-image">
                                '.check_img($img).'
                              </div>
                              <div class="cart-body-auth">
                                <div class="cart-body-title">'.$name.'</div>
                                <div class="cart-body-size">'.$color.'/'.$size.'</div>
                                <div class="detail-input pro-quantity-mobile">
                                  <button class="detail-input__minus tru">-</button>
                                  <input class="soluong" type="number" min="1" value="'.(intval($soluong)>0?intval($soluong):1).'" />
                                  <button class="detail-input__plus cong">+</button>
                                  <input class="index" type="hidden" value="'.$j.'">
                                  <input class="price" type="hidden" value="'.$price.'">
                                </div>
                                <div class="cart-body-del">
                                <a href="index.php?pg=cart&id='.$j.'"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </div>
                              </div>
                            </div>
                          </td>
                          <td class="pro-price">'.number_format($price,0,'',',').'₹</td>
                          <td class="pro-td-quantity">
                            <div class="detail-input pro-quantity">
                              <button class="detail-input__minus tru">-</button>
                              <input class="soluong" type="number" min="1" value="'.(intval($soluong)>0?intval($soluong):1).'" />
                              <button class="detail-input__plus cong">+</button>
                              <input class="index" type="hidden" value="'.$j.'">
                              <input class="price" type="hidden" value="'.$price.'">
                            </div>
                          </td>
                            <td class="pro-price-quantity">'.number_format(intval($price)*max(intval($soluong),1),0,'',',').'₹</td>
                        </tr>';
                          $tongtien+=intval($price)*intval($soluong);
                          $j++;
                        }else{
                          if($product_design==1){
                            $html_cart.='<tr class="cart-product">
                              <td>
                                <div class="pro-main">
                                  <div class="pro-image">
                                    '.check_img($img).'
                                    <img class="design-icon" src="view/layout/assets/images/design-icon.svg" alt="" />
                                  </div>
                                  <div class="cart-body-auth">
                                    <div class="cart-body-title">'.$name.'</div>
                                    <div class="cart-body-size">'.$color.'/'.$size.'</div>
                                    <div class="detail-input pro-quantity-mobile">
                                      <button class="detail-input__minus tru">-</button>
                                      <input class="soluong" type="text" value='.$soluong.' />
                                      <button class="detail-input__plus cong">+</button>
                                      <input class="index" type="hidden" value="'.$j.'">
                                      <input class="price" type="hidden" value="'.$price.'">
                                    </div>
                                    <div class="cart-body-del">
                                    <a href="index.php?pg=cart&id='.$j.'"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </div>
                                  </div>
                                </div>
                              </td>
                              <td class="pro-price">'.number_format($price,0,'',',').'₹</td>
                              <td class="pro-td-quantity">
                                <div class="detail-input pro-quantity">
                                  <button class="detail-input__minus tru">-</button>
                                  <input class="soluong" type="text" value='.$soluong.' />
                                  <button class="detail-input__plus cong">+</button>
                                  <input class="index" type="hidden" value="'.$j.'">
                                  <input class="price" type="hidden" value="'.$price.'">
                                </div>
                              </td>
                              <td class="pro-price-quantity">'.number_format(intval($price)*intval($soluong),0,'',',').'₹</td>
                            </tr>';
                            $tongtien+=intval($price)*intval($soluong);
                            $j++;
                          }
                        }
                      }
                    }
                    // Show paid orders from database cart
                    if(isset($_SESSION['user']) && isset($_SESSION['id_user'])){
                      $id_user = $_SESSION['id_user'];
                      // Get paid cart items (id_donhang != 1)
                      $paid_cart_items = pdo_query("SELECT * FROM cart WHERE id_user=? AND id_donhang<>1", $id_user);
                      foreach($paid_cart_items as $item){
                        // Get product info
                        $product = pdo_query_one("SELECT * FROM product WHERE id=?", $item['id_product']);
                        $img = isset($product['img']) ? $product['img'] : $item['img'];
                        $name = isset($product['name']) ? $product['name'] : '';
                        $color = getcolor($item['id_color']);
                        $size = getsize($item['id_size']);
                        $price = $item['price'];
                        $soluong = $item['soluong'];
                        $product_design = $item['product_design'];
                        if($product_design==0){
                          $html_cart.='<tr class="cart-product paid-order">
                          <td>
                            <div class="pro-main">
                              <div class="pro-image">
                                '.check_img($img).'
                              </div>
                              <div class="cart-body-auth">
                                <div class="cart-body-title">'.$name.' <span style="color:green;font-size:12px;">[Paid]</span></div>
                                <div class="cart-body-size">'.$color.'/'.$size.'</div>
                                <div class="detail-input pro-quantity-mobile">
                                  <input class="soluong" type="number" min="1" value="'.(intval($soluong)>0?intval($soluong):1).'" readonly />
                                  <input class="price" type="hidden" value="'.$price.'">
                                </div>
                              </div>
                            </div>
                          </td>
                          <td class="pro-price">'.number_format($price,0,'',',').'₹</td>
                          <td class="pro-td-quantity">
                            <div class="detail-input pro-quantity">
                              <input class="soluong" type="number" min="1" value="'.(intval($soluong)>0?intval($soluong):1).'" readonly />
                              <input class="price" type="hidden" value="'.$price.'">
                            </div>
                          </td>
                            <td class="pro-price-quantity">'.number_format(intval($price)*max(intval($soluong),1),0,'',',').'₹</td>
                        </tr>';
                          $tongtien+=intval($price)*intval($soluong);
                        }else{
                          if($product_design==1){
                            $html_cart.='<tr class="cart-product paid-order">
                              <td>
                                <div class="pro-main">
                                  <div class="pro-image">
                                    '.check_img($img).'
                                    <img class="design-icon" src="view/layout/assets/images/design-icon.svg" alt="" />
                                  </div>
                                  <div class="cart-body-auth">
                                    <div class="cart-body-title">'.$name.' <span style="color:green;font-size:12px;">[Paid]</span></div>
                                    <div class="cart-body-size">'.$color.'/'.$size.'</div>
                                    <div class="detail-input pro-quantity-mobile">
                                      <input class="soluong" type="text" value='.$soluong.' readonly />
                                      <input class="price" type="hidden" value="'.$price.'">
                                    </div>
                                  </div>
                                </div>
                              </td>
                              <td class="pro-price">'.number_format($price,0,'',',').'₹</td>
                              <td class="pro-td-quantity">
                                <div class="detail-input pro-quantity">
                                  <input class="soluong" type="text" value='.$soluong.' readonly />
                                  <input class="price" type="hidden" value="'.$price.'">
                                </div>
                              </td>
                              <td class="pro-price-quantity">'.number_format(intval($price)*intval($soluong),0,'',',').'₹</td>
                            </tr>';
                            $tongtien+=intval($price)*intval($soluong);
                          }
                        }
                      }
                    }
                    echo $html_cart;
                    if($tongtien>0){
                      $_SESSION['cart_total'] = $tongtien;
                    }else{
                      unset($_SESSION['cart_total']);
                    }
                  ?>
                </tbody>
              </table>  
              <?php
                
                  if(!isset($_SESSION['giohang']) || count($_SESSION['giohang'])==0){
                    echo '<img class="giohangtrong" src="view/layout/assets/images/giohangtrong.jpg" alt="">';
                  }
                
              ?>
              <div class="cart-auth">
                <div class="cart-auth-del">
                <a href="index.php?pg=cart&delcart=true"><button class="cart-auth-del__btn">Clear All</button></a>
                </div>
                <div class="cart-auth-continue">
                <a href="index.php?pg=product"><button class="cart-auth-continue__btn">Continue Shopping</button></a>
                </div>
              </div>
            </div>
            <div class="cart-right">
              <div class="cart-info">Order Details</div>
              <div class="cart-content">
                <div class="cart-content-price">
                  <div class="cart-content__text">Total Amount</div>
                  <input class="tong" type="hidden" value="<?=$tongtien?>">
                  <div class="cart-content__price"><span id="cart-total-display"><?=number_format($tongtien,0,'',',')?>₹</span></div>
                </div>
                <script>
        $(document).ready(function () {
          function updateTotal() {
            var total = 0;
            $('.pro-price-quantity').each(function () {
              var text = $(this).text().replace(/[^\d]/g, '');
              var value = parseInt(text);
              if (!isNaN(value)) {
                total += value;
              }
            });
            $('#cart-total-display').html(total.toLocaleString('en-US') + '₹');
            $('.tong').val(total);
          }
          // Initial sync on page load
          updateTotal();
          $(".tru").click(function (e) {
            e.preventDefault();
            var soluong = parseInt($(this).parent().find('.soluong').val());
            if (soluong > 1) {
              soluong--;
              $(this).parent().find('.soluong').val(soluong);
              var ind = $(this).parent().find('.index').val();
              var price = $(this).parent().find('.price').val();
              var thanhtienso = soluong * price;
              var thanhtien = thanhtienso.toLocaleString('en-US') + '₹';
              $(this).closest('tr').find('.pro-price-quantity').html(thanhtien);
              updateTotal();
            }
          });
          $(".cong").click(function (e) {
            e.preventDefault();
            var soluong = parseInt($(this).parent().find('.soluong').val());
            soluong++;
            $(this).parent().find('.soluong').val(soluong);
            var ind = $(this).parent().find('.index').val();
            var price = $(this).parent().find('.price').val();
            var thanhtienso = soluong * price;
            var thanhtien = thanhtienso.toLocaleString('en-US') + '₹';
            $(this).closest('tr').find('.pro-price-quantity').html(thanhtien);
            updateTotal();
          });
        });
    </script>
                <div class="cart-item">
                  <div class="cart-sale">Discount</div>
                  <span>Valid at checkout</span>
                </div>
                <div class="cart-item">
                  <div class="cart-sale">Delivery Charges</div>
                  <span>Calculated at checkout</span>
                </div>
                <div class="detail-btn">
                  <a href="index.php?pg=checkout">
                    <button class="detail-button">Go to Payment</button>
                  </a>
                </div>
                <div class="cart-checkout">
                  <p>We accept payments via</p>
                  <div class="cart-checkout-icon">
                    <img src="view/layout/assets/images/visa.svg" alt="" />
                    <img src="view/layout/assets/images/napas.svg" alt="" />
                    <img src="view/layout/assets/images/zalopay-icon.svg" alt="" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>