 
<div class="link-mobile">
        <a href="#">Home </a>
        <i class="fa fa-chevron-right" aria-hidden="true"></i>
        <a href="#">T-Shirts</a>
      </div>
      <section class="news">
        <div class="container">
          <div class="design-center news-center">
         
            <h2 class="heading-primary heading-secondary">LATEST ARTICLES</h2>
          </div>
          <?php
            $html_new_new='';
            foreach ($new_news as $blog) {
              extract($blog);
              $html_new_new.='<div class="news-main">
              <div class="news-left">
                <img src="upload/'.$img.'" alt="" />
              </div>
              <div class="news-right">
                <div class="news-content">
                  <h2 class="news-content-heading">'.$title.'</h2>
                  <p class="news-content-desc">
                  '.$noidung.'...
                  </p>
                  <div class="news-content-more"><span>Read more</span> | '.$thoigian.'</div>
                </div>
              </div>
            </div>';
            }
          ?>
          <?=$html_new_new?>

          
        </div>
      </section>
      <section class="news-card">
        <div class="container">
          <h2>OTHER ARTICLES</h2>
          <div class="news-item">
            <div class="blog-list news-list">
            <?php
              $html_new='';
              foreach($new_home as $new){
                extract($new);
                $html_new.='<div class="blog-item news-item">
                <div class="news-image">
                  <a href="#">
                    <img src="upload/'.$img.'" alt="" id="new-img" />
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
                </div>
              </div>';
              }
            ?>
            <?=$html_new?>



              <!-- <div class="blog-item news-item">
                <div class="news-image">
                  <a href="#">
                    <img src="https://source.unsplash.com/random" alt="" />
                  </a>
                </div>
                <div class="blog-content">
                  <h3 class="blog-title">
                    <a href="#"
                      >Tất tần tật bí quyết chọn mua quần áo thể thao nam chất lượng nhất
                    </a>
                  </h3>
                  <div class="blog-date">05/10/2023</div>
                  <div class="blog-desc">
                    Là những người đam mê bộ môn Gym và mong muốn có thân hình đẹp, thu hút mọi ánh
                    nhìn của nữ giới,...
                  </div>
                </div>
              </div> -->
              <!-- <div class="blog-item news-item">
                <div class="news-image">
                  <a href="#">
                    <img src="https://source.unsplash.com/random" alt="" />
                  </a>
                </div>
                <div class="blog-content">
                  <h3 class="blog-title">
                    <a href="#"
                      >Tất tần tật bí quyết chọn mua quần áo thể thao nam chất lượng nhất
                    </a>
                  </h3>
                  <div class="blog-date">05/10/2023</div>
                  <div class="blog-desc">
                    Là những người đam mê bộ môn Gym và mong muốn có thân hình đẹp, thu hút mọi ánh
                    nhìn của nữ giới,...
                  </div>
                </div>
              </div> -->
              <!-- <div class="blog-item news-item">
                <div class="news-image">
                  <a href="#">
                    <img src="https://source.unsplash.com/random" alt="" />
                  </a>
                </div>
                <div class="blog-content">
                  <h3 class="blog-title">
                    <a href="#"
                      >Tất tần tật bí quyết chọn mua quần áo thể thao nam chất lượng nhất
                    </a>
                  </h3>
                  <div class="blog-date">05/10/2023</div>
                  <div class="blog-desc">
                    Là những người đam mê bộ môn Gym và mong muốn có thân hình đẹp, thu hút mọi ánh
                    nhìn của nữ giới,...
                  </div>
                </div>
              </div> -->
              <!-- <div class="blog-item news-item">
                <div class="news-image">
                  <a href="#">
                    <img src="https://source.unsplash.com/random" alt="" />
                  </a>
                </div>
                <div class="blog-content">
                  <h3 class="blog-title">
                    <a href="#"
                      >Tất tần tật bí quyết chọn mua quần áo thể thao nam chất lượng nhất
                    </a>
                  </h3>
                  <div class="blog-date">05/10/2023</div>
                  <div class="blog-desc">
                    Là những người đam mê bộ môn Gym và mong muốn có thân hình đẹp, thu hút mọi ánh
                    nhìn của nữ giới,...
                  </div>
                </div>
              </div> -->
              <!-- <div class="blog-item news-item">
                <div class="news-image">
                  <a href="#">
                    <img src="https://source.unsplash.com/random" alt="" />
                  </a>
                </div>
                <div class="blog-content">
                  <h3 class="blog-title">
                    <a href="#"
                      >Tất tần tật bí quyết chọn mua quần áo thể thao nam chất lượng nhất
                    </a>
                  </h3>
                  <div class="blog-date">05/10/2023</div>
                  <div class="blog-desc">
                    Là những người đam mê bộ môn Gym và mong muốn có thân hình đẹp, thu hút mọi ánh
                    nhìn của nữ giới,...
                  </div>
                </div>
              </div> -->
              <!-- <div class="blog-item news-item">
                <div class="news-image">
                  <a href="#">
                    <img src="https://source.unsplash.com/random" alt="" />
                  </a>
                </div>
                <div class="blog-content">
                  <h3 class="blog-title">
                    <a href="#"
                      >Tất tần tật bí quyết chọn mua quần áo thể thao nam chất lượng nhất
                    </a>
                  </h3>
                  <div class="blog-date">05/10/2023</div>
                  <div class="blog-desc">
                    Là những người đam mê bộ môn Gym và mong muốn có thân hình đẹp, thu hút mọi ánh
                    nhìn của nữ giới,...
                  </div>
                </div>
              </div> -->
            </div>
          </div>
        </div>
      </section>