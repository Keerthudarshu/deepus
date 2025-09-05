
<?php
  if($erremail!=''){
    $erremail='<div class="errform mb-unset">'.$erremail.'</div>';
  }
  if($erruser!=''){
    $erruser='<div class="errform mb-unset">'.$erruser.'</div>';
  }

?>
 
<div class="link-mobile">
        <a href="#">Home</a>
        <i class="fa fa-chevron-right" aria-hidden="true"></i>
        <a href="#">T-Shirts</a>
      </div>
      <form action="index.php?pg=account" method="post" enctype="multipart/form-data">
      <section class="account">
        <div class="container">
          <h2 class="title-mobile">My profile</h2>
          <div class="account-main">
            <div class="account-left">
              <div class="account-info">
                <div class="account-avatar">
                  <?php
                  if(check_img($img)==""){
                    $img2='<img src="view/layout/assets/images/avatar.png" alt="" />';
                  }else{
                    $img2=check_img($img);
                  }         
                  ?>
                  <?=$img2?>
                </div>
                <div class="account-body">
                  <div class="account-name"><?=$user?></div>
                  <div class="account-edit">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                Edit profile
                  </div>
                </div>
              </div>
              <ul class="contact-menu account-menu">
                <li class="contact-list account-list" id="myaccount">
                  <a href="#" class="contact-link account-link active" data-tab="1">
                    <i class="fa fa-user" aria-hidden="true"></i>My account</a
                  >
                </li>
                <li class="contact-list account-list" id="history">
                  <a href="#" class="contact-link account-link" data-tab="2">
                    <i class="fa fa-calendar-check-o" aria-hidden="true"></i>Order history</a
                  >
                </li>
                <li class="contact-list account-list" style="display:none" id="history-order">
                  <a href="#" class="contact-link account-link" data-tab="2">
                    <i class="fa fa-product-hunt" aria-hidden="true"></i>Orders</a
                  >
                </li>
                <li class="contact-list account-list">
                  <a href="index.php?pg=logoutuser" class="contact-link account-link">
                  <i class="fas fa-sign-out-alt"></i>Log out</a
                  >
                </li>
              </ul>
            </div>
            
            <div class="account-right active tab-content" data-tab="1">
              
              <div class="account-box">
                <h2>My profile</h2>
                <p>Manage your profile information for account security</p>
                <div class="account-group">
                  <label for="">Username:</label> <br />
                  <input name="user" type="text" value="<?=$user?>" />
                </div>
                <?=$erruser?>
                <input name="pass" type="hidden" value="<?=$pass?>" />
                <div class="account-group">
                  <label for="">Full name:</label> <br />
                  <input name="name" type="text" value="<?=$name?>" />
                </div>
                <div class="account-group">
                  <label for="">Email:</label> <br />
                  <input name="email" type="text" value="<?=$email?>" />
                </div>
                <?=$erremail?>
                <div class="account-group">
                  <label for="">Phone number:</label> <br />
                  <input  name="sdt" type="text" value="<?=$sdt?>" />
                </div>
                <div class="account-group">
                  <label for="">Date of birth:</label> <br />
                  <input name="ngaysinh" type="date" value="<?=$ngaysinh?>" />
                </div>
                <div class="account-group">
                  <label for="">Address:</label> <br />
                  <input name="diachi" type="text" value="<?=$diachi?>" />
                </div>
                <div class="product-btn account-btn">
                  <button name="update_account" class="button-primary">Update account</button>
                  <button name="del_account" class="button-primary button-del">Delete account</button>
                </div>
                </div>
              
              <div class="account-right-image">
                <div class="account-right-avatar">
                <input type="hidden" name="hinhcu" value=<?=$img?>>
                  <?php
                    if(check_img($img)==""){
                      $img='<img id="img-preview" src="view/layout/assets/images/avatar.png" alt="" />';
                    }else{
                      $img=substr_replace(check_img($img), ' id="img-preview" ', 5, 0);
                    }
                  ?>
                  <?=$img?>
                  <input name="img" id="file-input" type="file" accept="image/*"/>
                </div>
                <script>
                    var input = document.getElementById("file-input");
                    var image = document.getElementById("img-preview");

                    input.addEventListener("change", (e) => {
                        if (e.target.files.length) {
                            const src = URL.createObjectURL(e.target.files[0]);
                            image.src = src;
                        }
                    });
                </script>
              </div>
            </div>
            
            <div class="account-history tab-content" data-tab="2">
              <p class="account-history-title">Order history</p>
              <div>Manage your purchase information</div>
              <table class="history-order" border="1">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Order ID</th>
                    <th>Customer ID</th>
                    <th>Order Date</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    if(isset($_SESSION['iduser']) && isset($_SESSION['role']) && $_SESSION['role']==0){
                     $listdonhang;
                     $html_donhang='';
                     $i=0;
                     foreach ($listdonhang as $item) {
                      $i++;
                      extract($item);
                      $html_donhang.='<tr>
                      <td>'.$i.'</td>
                      <td>'.$ma_donhang.'</td>
                      <td>'.$iduser.'</td>
                      <td>'.$ngaylap.'</td>
                      <td>'.number_format($tongtien,0,'.',',').'</td>
                      <td>'.$trangthai.'</td>
                      <td>
                        <a href="index.php?pg=account&id='.$id.'" class="del">Cancel</a>
                      </td>
                    </tr>';
                     } 
                    }
                    echo $html_donhang;
                  ?>
                </tbody>
              </table>
            </div>
            <div class="order-history tab-content" data-tab="2">
              <p class="account-history-title">Order details</p>
              <div>Manage your order information</div>
              <table class="history-order" border="1">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Order ID</th>
                    <th>Product ID</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>deepus120</td>
                    <td>GUEST123</td>
                    <td>12-08-2023</td>
                    <td class="green">Thành công</td>
                    <td>Xem - Hủy</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>deepus120</td>
                    <td>GUEST123</td>
                    <td>12-08-2023</td>
                    <td class="green">Thành công</td>
                    <td>Xem - Hủy</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>deepus120</td>
                    <td>GUEST123</td>
                    <td>12-08-2023</td>
                    <td class="green">Thành công</td>
                    <td>Xem - Hủy</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </section>
      </form>