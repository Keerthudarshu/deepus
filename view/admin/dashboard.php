<div class="main">
        <div class="header-main">
          <div class="header-left">
            <div class="header-bar">
              <i class="fa fa-angle-left icon-bar" aria-hidden="true"></i>
            </div>
            <form action="" class="header-form">
              <div class="header-input">
                <input type="text" placeholder="Search " />
                <div class="header-input-icon">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </div>
              </div>
            </form>
          </div>
          <div class="header-right">
            <div class="header-bell">
              <i class="fa fa-bell" aria-hidden="true"></i>
            </div>
            <div class="header-auth">
              <div class="header-avatar">
                <img src="../layout/assets/images/avatar.png" alt="" />
              </div>
              <div class="header-name">Hi, Deepus</div>
            </div>
          </div>
        </div>
        <div class="dashboard">
          <div class="container">
           <div class="dashboard-content active" data-tab="1">
            
              <div class="dashboard-title">Overview</div>
              <div class="dashboard-list">
                <div class="dashboard-card">
                  <div class="dashboard-card-quantity">
                    <div class="dashboard-card-name">Visitors</div>
                    <span><?=count(getusertable())?></span>
                  </div>
                  <div class="dashboard-card-icon">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="52"
                      height="28"
                      viewBox="0 0 52 28"
                      fill="none">
                      <path
                        d="M51.6859 12.9354C46.7901 5.2201 37.0979 0 26 0C14.9021 0 5.20718 5.22375 0.314118 12.9361C0.1076 13.2661 0 13.6306 0 14.0004C0 14.3701 0.1076 14.7346 0.314118 15.0646C5.20989 22.7799 14.9021 28 26 28C37.0979 28 46.7928 22.7762 51.6859 15.0639C51.8924 14.7339 52 14.3694 52 13.9996C52 13.6299 51.8924 13.2654 51.6859 12.9354ZM26 24.5C23.4288 24.5 20.9154 23.8842 18.7776 22.7304C16.6397 21.5767 14.9735 19.9368 13.9895 18.0182C13.0056 16.0996 12.7482 13.9884 13.2498 11.9516C13.7514 9.91475 14.9895 8.04383 16.8076 6.57538C18.6257 5.10693 20.9421 4.1069 23.4638 3.70175C25.9856 3.29661 28.5995 3.50454 30.9749 4.29926C33.3503 5.09399 35.3807 6.4398 36.8091 8.16651C38.2376 9.89323 39 11.9233 39 14C39.0009 15.3791 38.6652 16.7447 38.0122 18.019C37.3591 19.2932 36.4016 20.451 35.1943 21.4261C33.9869 22.4013 32.5535 23.1747 30.9759 23.7021C29.3983 24.2295 27.7074 24.5007 26 24.5ZM26 7C25.2264 7.00873 24.4579 7.10169 23.7151 7.27635C24.3273 7.94841 24.6212 8.77544 24.5432 9.60746C24.4653 10.4395 24.0208 11.2214 23.2903 11.8114C22.5598 12.4014 21.5917 12.7604 20.5616 12.8234C19.5315 12.8863 18.5075 12.649 17.6755 12.1545C17.2017 13.5644 17.2872 15.0588 17.92 16.4274C18.5528 17.796 19.7011 18.9698 21.2032 19.7837C22.7053 20.5976 24.4855 21.0105 26.2934 20.9644C28.1012 20.9183 29.8457 20.4154 31.2812 19.5266C32.7166 18.6377 33.7709 17.4077 34.2955 16.0096C34.8201 14.6115 34.7887 13.1157 34.2056 11.7327C33.6226 10.3498 32.5173 9.14932 31.0453 8.30033C29.5733 7.45134 27.8088 6.99656 26 7Z"
                        fill="#46694F" />
                    </svg>
                  </div>
                </div>
                <div class="dashboard-card">
                  <div class="dashboard-card-quantity">
                    <div class="dashboard-card-name">Orders</div>
                    <span><?=count(getdonhangtable())?></span>
                  </div>
                  <div class="dashboard-card-icon">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="30"
                      height="28"
                      viewBox="0 0 30 28"
                      fill="none">
                      <path
                        d="M23.5714 8.75V7C23.5714 3.14016 19.7263 0 15 0C10.2737 0 6.42857 3.14016 6.42857 7V8.75H0V23.625C0 26.0413 2.39846 28 5.35714 28H24.6429C27.6015 28 30 26.0413 30 23.625V8.75H23.5714ZM10.7143 7C10.7143 5.07008 12.6368 3.5 15 3.5C17.3632 3.5 19.2857 5.07008 19.2857 7V8.75H10.7143V7ZM21.4286 13.5625C20.541 13.5625 19.8214 12.9749 19.8214 12.25C19.8214 11.5251 20.541 10.9375 21.4286 10.9375C22.3162 10.9375 23.0357 11.5251 23.0357 12.25C23.0357 12.9749 22.3162 13.5625 21.4286 13.5625ZM8.57143 13.5625C7.68382 13.5625 6.96429 12.9749 6.96429 12.25C6.96429 11.5251 7.68382 10.9375 8.57143 10.9375C9.45904 10.9375 10.1786 11.5251 10.1786 12.25C10.1786 12.9749 9.45904 13.5625 8.57143 13.5625Z"
                        fill="#46694F" />
                    </svg>
                  </div>
                </div>
                <div class="dashboard-card">
                    <div class="dashboard-card-quantity">
                      <div class="dashboard-card-name">Revenue</div>
                      <span><?=number_format(tongdoanhthu()[0]['tongdoanhthu'],0,'.',',')?></span>
                    </div>
                    <div class="dashboard-card-icon">
                      <svg xmlns="http://www.w3.org/2000/svg" width="44" height="28" viewBox="0 0 44 28" fill="none">
                        <path d="M43.3934 5.27734L30.0095 0C28.6278 1.52031 25.5689 2.58125 22.0012 2.58125C18.4336 2.58125 15.3746 1.52031 13.9929 0L0.60906 5.27734C0.0660074 5.49609 -0.153964 6.02109 0.114126 6.45312L4.04611 12.7148C4.32107 13.1469 4.98098 13.3219 5.52403 13.1086L9.41477 11.5938C10.1434 11.3094 10.9958 11.7305 10.9958 12.3812V26.25C10.9958 27.218 11.9788 28 13.1955 28H30.7932C32.0099 28 32.9929 27.218 32.9929 26.25V12.3758C32.9929 11.7305 33.8453 11.3039 34.5739 11.5883L38.4647 13.1031C39.0077 13.3219 39.6676 13.1469 39.9426 12.7094L43.8815 6.45312C44.1564 6.02109 43.9365 5.49062 43.3934 5.27734Z" fill="#46694F"/>
                      </svg>
                    </div>
                  </div>
                <div class="dashboard-card">
                  <div class="dashboard-card-quantity">
                    <div class="dashboard-card-name">Product</div>
                    <span><?=count(getproduct())?></span>
                  </div>
                  <div class="dashboard-card-icon">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="30"
                      height="28"
                      viewBox="0 0 30 28"
                      fill="none">
                      <path
                        d="M23.5714 8.75V7C23.5714 3.14016 19.7263 0 15 0C10.2737 0 6.42857 3.14016 6.42857 7V8.75H0V23.625C0 26.0413 2.39846 28 5.35714 28H24.6429C27.6015 28 30 26.0413 30 23.625V8.75H23.5714ZM10.7143 7C10.7143 5.07008 12.6368 3.5 15 3.5C17.3632 3.5 19.2857 5.07008 19.2857 7V8.75H10.7143V7ZM21.4286 13.5625C20.541 13.5625 19.8214 12.9749 19.8214 12.25C19.8214 11.5251 20.541 10.9375 21.4286 10.9375C22.3162 10.9375 23.0357 11.5251 23.0357 12.25C23.0357 12.9749 22.3162 13.5625 21.4286 13.5625ZM8.57143 13.5625C7.68382 13.5625 6.96429 12.9749 6.96429 12.25C6.96429 11.5251 7.68382 10.9375 8.57143 10.9375C9.45904 10.9375 10.1786 11.5251 10.1786 12.25C10.1786 12.9749 9.45904 13.5625 8.57143 13.5625Z"
                        fill="#46694F" />
                    </svg>
                  </div>
                </div>
                    
                      <path
                        d="M43.3934 5.27734L30.0095 0C28.6278 1.52031 25.5689 2.58125 22.0012 2.58125C18.4336 2.58125 15.3746 1.52031 13.9929 0L0.60906 5.27734C0.0660074 5.49609 -0.153964 6.02109 0.114126 6.45312L4.04611 12.7148C4.32107 13.1469 4.98098 13.3219 5.52403 13.1086L9.41477 11.5938C10.1434 11.3094 10.9958 11.7305 10.9958 12.3812V26.25C10.9958 27.218 11.9788 28 13.1955 28H30.7932C32.0099 28 32.9929 27.218 32.9929 26.25V12.3758C32.9929 11.7305 33.8453 11.3039 34.5739 11.5883L38.4647 13.1031C39.0077 13.3219 39.6676 13.1469 39.9426 12.7094L43.8815 6.45312C44.1564 6.02109 43.9365 5.49062 43.3934 5.27734Z"
                        fill="#46694F" />
                    </svg>
                  </div>
                  
               
                  

            <!-- Stock Alerts Block -->
            <?php
            require_once __DIR__ . '/../../model/low_stock.php';
            $lowStock = get_low_stock_products(50);
            if (!function_exists('get_out_of_stock_products')) {
              function get_out_of_stock_products($limit = 50) {
                $limit = intval($limit);
                $sql = "SELECT * FROM product WHERE stock = 0 ORDER BY id DESC LIMIT $limit";
                return pdo_query($sql);
              }
            }
            $outOfStock = get_out_of_stock_products(50);
            $allStockAlerts = array_merge($lowStock, $outOfStock);
            usort($allStockAlerts, function($a, $b) {
              if ($a['stock'] == $b['stock']) return 0;
              return ($a['stock'] == 0) ? 1 : (($b['stock'] == 0) ? -1 : $a['stock'] - $b['stock']);
            });
            ?>
              <div style="margin-top:20px; margin-bottom:32px;">
              <div >
                <div >
                  <div >
                    <i class="fa fa-exclamation-triangle" style="color:#ffb300;font-size:1.5rem;"></i>
                    <span style="font-weight:600;font-size:1.2rem;">Stock Alerts</span>
                    <span style="background:#ffb300;color:#fff;border-radius:16px;padding:2px 12px;font-size:0.95rem;font-weight:600;">
                      <?= count($lowStock) + count($outOfStock) ?>
                    </span>
                  </div>
                </div>
                <div style="display:grid;grid-template-columns:repeat(5,1fr);gap:24px;">
                  <?php 
                  require_once __DIR__ . '/../../model/product.php';
                  foreach ($allStockAlerts as $p): 
                    $isOut = intval($p['stock']) === 0;
                    $stockText = $isOut ? '0 left' : intval($p['stock']) . ' left';
                    $stockColor = $isOut ? '#d32f2f' : (intval($p['stock']) <= 5 ? '#e65100' : '#333');
                    $weight = $p['variant'] ?? $p['weight'] ?? '';
                    $imgData = getimg_product_main($p['id']);
                    $imgTag = isset($imgData['main_img']) ? check_img_admin($imgData['main_img']) : '';
                  ?>
                  <div style="background:#f9f9f9;border-radius:8px;padding:16px;box-shadow:0 1px 4px rgba(0,0,0,0.03);display:flex;align-items:center;gap:16px;">
                    <div style="flex-shrink:0;width:56px;height:56px;display:flex;align-items:center;justify-content:center;overflow:hidden;border-radius:6px;background:#fff;border:1px solid #eee;">
                      <?=$imgTag?>
                    </div>
                    <div style="flex:1;">
                      <div style="font-weight:500;font-size:1.08rem;line-height:1.2;word-break:break-word;\"><?=htmlspecialchars($p['name'])?></div>
                      <?php if ($weight): ?>
                        <div style="font-size:0.98rem;color:#888;line-height:1.2;word-break:break-word;\"><?=$weight?></div>
                      <?php endif; ?>
                      <div style="margin-top:12px;">
                        <span style="color:<?=$stockColor?>;font-weight:600;font-size:1.08rem;min-width:48px;text-align:right;\"><?=$stockText?></span>
                      </div>
                    </div>
                  </div>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
            <!-- New Orders Notification -->
            
             
              <div class="statistical-main">
                <div class="statistical-left">
                  <h2 class="title">Category product ratio</h2>
                  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

                  <canvas id="myChart" style="width:100%;max-width:450px; margin-bottom:50px"></canvas>

                  <script>
                  <?php
                    $catalog=getcatalog();
                    $i=0;
                    $htmlx='';
                    $htmly='';
                    $htmlbar='';
                    foreach ($catalog as $item) {
                        $i++;
                        if($i==1){
                          $htmlx.='const xValues = ["'.$item['name'].'",';
                          $htmly.='const yValues = ['.countproduct($item['id']).',';
                        }else{
                          if($i==count($catalog)){
                            $htmlx.='"'.$item['name'].'"];';
                            $htmly.=countproduct($item['id']).'];';
                          }else{
                            $htmlx.=' "'.$item['name'].'",';
                            $htmly.=countproduct($item['id']).',';
                          }
                        }
                    }
                    echo $htmlx;
                    echo $htmly;
                  ?>
                  const barColors = [
                    "#b91d47",
                    "#00aba9",
                    "#2b5797",
                    "#1e7145"
                  ];
                  new Chart("myChart", {
                    type: "doughnut",
                    data: {
                      labels: xValues,
                      datasets: [{
                        backgroundColor: barColors,
                        data: yValues
                      }]
                    },
                    options: {
                      title: {
                        display: true,
                        text: ""
                      }
                    }
                  });
                  </script>
                </div>
                <div class="statistical-right">
                  <h2 style="margin-bottom:0" class="title">View</h2>
                  <script src="https://www.gstatic.com/charts/loader.js"></script>

                  <div id="myChart1" style="width:100%; max-width:600px; height:300px;"></div>

                  <script>
                  google.charts.load('current', {'packages':['corechart']});
                  google.charts.setOnLoadCallback(drawChart);

                  function drawChart() {

                  // Set Data
                  const data = google.visualization.arrayToDataTable([
  
                    ['Contry', 'view'],
                    <?php
                        $luotview=luotview();
                        $i=0;
                        foreach ($luotview as $item) {
                          $i++;
                          if($i==count($luotview)){
                            echo "['".$item['name_catalog']."',".$item['tongview']."]";
                          }else{
                            echo "['".$item['name_catalog']."',".$item['tongview']."], ";
                          }
                        }
                      ?>
                  ]);

                  // Set Options
                  const options = {
                    title:''
                  };

                  // Draw
                  const chart = new google.visualization.BarChart(document.getElementById('myChart1'));
                  chart.draw(data, options);

                  }
                  </script>



                    
                </div>
              </div>
              <section class="dashboard-list-pro">
                <div class="container">
                  <div class="">
                    <h2 class="title mt-0">Revenue statistics by month (million VND)</h2>


                    <canvas id="myChart2" style="width:100%;"></canvas>

                    <script>
                    const xValues2 = ["January", "February","March","April","May","June","July","August","September","October","November","December"];
                    <?php
                      $doanhthu=doanhthu();
                      $i=0;
                      $htmly='';
                      foreach ($doanhthu as $item) {
                          $i++;
                          if($i==1){
                            $htmly.='const yValues2 = ['.($item['doanhthu_thang']/1000000).',';
                          }else{
                            if($i==count($doanhthu)){
                              $htmly.=($item['doanhthu_thang']/1000000).'];';
                            }else{
                              $htmly.=($item['doanhthu_thang']/1000000).',';
                            }
                          }
                      }
                      echo $htmly;
                    ?>
                    const barColors2 = ["rgba(0,0,255)", "rgba(0,0,255)", "rgba(0,0,255)", "rgba(0,0,255)", "rgba(0,0,255)", "rgba(0,0,255)", "rgba(0,0,255)", "rgba(0,0,255)", "rgba(0,0,255)", "rgba(0,0,255)", "rgba(0,0,255)", "rgba(0,0,255)"];

                    new Chart("myChart2", {
                      type: "bar",
                      data: {
                        labels: xValues2,
                        datasets: [{
                          backgroundColor: barColors2,
                          data: yValues2
                        }]
                      },
                      options: {
                        legend: {display: false},
                        title: {
                          display: true,
                          text: ""
                        }
                      }
                    });
                    </script>
                    
            </div>




            