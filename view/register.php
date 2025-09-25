
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
              <div class="login-title">REGISTER</div>
              <div class="login-regiter">
                Already have an account, log in
                <a href="/deepus/index?pg=login" class="regester-link">here</a>
              </div>
            </div>
            <form action="/deepus/index?pg=register" method="post" class="login-form">
              <?php
                // Prevent undefined variable warnings
                $errusername = isset($errusername) ? $errusername : '';
                $erremail = isset($erremail) ? $erremail : '';
                $errpassword = isset($errpassword) ? $errpassword : '';
                $errrepassword = isset($errrepassword) ? $errrepassword : '';
                if(!isset($_SESSION['usernamesignup']) || !isset($_SESSION['passwordsignup'])){
                  $_SESSION['usernamesignup']='';
                  $_SESSION['passwordsignup']='';
                  $_SESSION['emailsignup']='';
                  $_SESSION['repasswordsignup']='';
               }
               echo '<input name="user" type="text" placeholder="Account Name" value='.$_SESSION['usernamesignup'].'> 
               <div class="errform mb-unset">'.$errusername.'</div>
               <input name="email" type="text" placeholder="Email "  value='.$_SESSION['emailsignup'].'> 
               <div class="errform mb-unset">'.$erremail.'</div>
               <div class="login-password">
                 <input name="pass" type="password" placeholder="Password "  value='.$_SESSION['passwordsignup'].'>
                 <i class="fa fa-eye hien"  onclick="anmatkhau()" aria-hidden="true"></i>
               </div>
               <div class="errform mb-unset">'.$errpassword.'</div>
               <div class="login-password">
                 <input name="repass" type="password" placeholder="Confirm Password "  value='.$_SESSION['repasswordsignup'].'>
                 <i class="fa fa-eye hien"  onclick="anmatkhau1()" aria-hidden="true"></i>
               </div>
               <div class="errform mb-unset">'.$errrepassword.'</div>';
              ?>
              
              <div class="login-button">
                <button name="btn_register" class="login-btn">Register</button>
              </div>
              <div class="login__center">
                <div class="form-group-center text">Or sign in with</div>
                <div class="form-app">
                  <div class="form-app__fb">
                  <button class="btn_google">
                    <ion-icon style="height:20px; width: 20px; margin-right: 10px" name="logo-facebook"></ion-icon>
                      <span> Facebook</span>
                    </button>
                  </div>
                  <div class="form-app__google">
                    <button class="btn_google">
                    <ion-icon style="height:20px; width: 20px; margin-right: 10px" name="logo-google"></ion-icon>
                      <span> Google</span>
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </section>