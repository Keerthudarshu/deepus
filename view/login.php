
<div class="link-mobile">
        <a href="#">Home </a>
        <i class="fa fa-chevron-right" aria-hidden="true"></i>
        <a href="#">T-Shirts</a>
      </div>
      <!-- Login -->
      <section class="login">
        <div class="container">
          <div class="login-box">
            <div class="login-auth__login">
              <div class="login-title">LOG IN</div>
              <div class="login-regiter">
                If you do not have an account, 
                <a href="/deepus/index?pg=register" class="regester-link"> register here</a>
              </div>
            </div>
            <form action="/deepus/index?pg=login" method="post" class="login-form">
              <?php
                if(!isset($_SESSION['usernamelogin']) || !isset($_SESSION['passwordlogin'])){
                  $_SESSION['usernamelogin']='';
                  $_SESSION['passwordlogin']='';
                }
                $errusername = isset($errusername) ? $errusername : '';
                $errpassword = isset($errpassword) ? $errpassword : '';
                echo '<input name="username" type="text" placeholder="Account Name" value="'.htmlspecialchars($_SESSION['usernamelogin']).'"> 
                <div class="errform mb-unset">'.$errusername.'</div>

                <div class="login-password">
                  <input name="password" type="password" placeholder="Password" value="'.htmlspecialchars($_SESSION['passwordlogin']).'" >
                  <i class="fa fa-eye hien"  onclick="anmatkhau()" aria-hidden="true"></i>
                </div>
                <div class="errform mb-unset">'.$errpassword.'</div>';

                // Show popup if there is an error
                if (!empty($errusername) || !empty($errpassword)) {
                  echo '<script>alert("'.($errusername ? $errusername : $errpassword).'");</script>';
                }
              ?>
              

              <a href="/deepus/index?pg=forgetpass"><div class="form-group-center">Forgot Password</div></a>
              <div class="login-button">
                <button class="login-btn" name="login">Log In</button>
              </div>
              
            </form>
          </div>
        </div>
      </section>