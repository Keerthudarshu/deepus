<?php
include_once '../../model/size.php';
// Handle add size form for all sizes 20-38
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_code'])) {
    $product_code = trim($_POST['product_code']);
    $sizes_data = [];
    for ($i = 20; $i <= 38; $i += 2) {
        $key = 'size_' . $i;
        $sizes_data[$key] = isset($_POST[$key]) ? floatval($_POST[$key]) : null;
    }
    if ($product_code) {
        // You need to implement add_size_row in model/size.php
        add_size_row($product_code, $sizes_data);
        header('Location: size.php');
        exit;
    }
}
$sizes = get_all_sizes();
$html_size = '';
foreach ($sizes as $row) {
    $html_size .= '<tr style="border-bottom: 1px solid #eee;">';
    $html_size .= '<td style="padding: 10px 8px; border-right: 1px solid #eee; min-width: 60px; text-align: center;">' . htmlspecialchars($row['id']) . '</td>';
    $html_size .= '<td style="padding: 10px 8px; border-right: 1px solid #eee; font-weight: 500; min-width: 120px; white-space: nowrap;">' . htmlspecialchars($row['product_code']) . '</td>';
    for ($i = 20; $i <= 38; $i += 2) {
        $key = 'size_' . $i;
        $value = isset($row[$key]) ? number_format($row[$key], 2) . '₹' : '-';
        $html_size .= '<td style="padding: 10px 8px; border-right: 1px solid #eee; text-align: center; min-width: 90px; font-size: 12px; white-space: nowrap;">' . $value . '</td>';
    }
    $html_size .= '<td class="chunhieu" style="padding: 10px 8px; min-width: 120px; white-space: nowrap;">
        <a href="#" class="edit" style="color: #007bff; margin-right: 8px; font-size: 12px;">Edit</a>
        <a href="#" class="del" style="color: #dc3545; font-size: 12px;">Delete</a>
    </td>';
    $html_size .= '</tr>';
}
?>

<div class="main">
<style>
    /* Prevent page horizontal scroll */
    html, body {
        overflow-x: hidden !important;
        max-width: 100vw !important;
    }
    
    /* Ensure main container doesn't cause horizontal scroll */
    .main {
        margin-left: 0px;
        max-width: 100% !important;
        overflow-x: hidden !important;
    }
    
    /* Fix header positioning and z-index */
    .header-main {
        position: relative;
        top: 0;
        left: 0;
        right: 0;
        background: white;
        z-index: 1000 !important;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        height: 80px;
        max-width: 100% !important;
        overflow-x: hidden !important;
    }
    
    /* Ensure dashboard content goes under header */
    .dashboard {
        padding-top: 20px;
        max-width: 100% !important;
        overflow-x: hidden !important;
    }
    
    /* Container controls */
    .container {
        max-width: 100% !important;
        margin: 0;
        padding: 0 20px;
        overflow-x: hidden !important;
    }
    
    /* Dashboard content */
    .dashboard-content {
        max-width: 100% !important;
        overflow-x: hidden !important;
    }
    
    /* Sidebar should stay fixed */
    .sidebar {
        position: fixed !important;
        z-index: 999 !important;
    }
</style>
        <div class="header-main">
          <div class="header-left">
            <div class="header-bar">
              <i class="fa fa-angle-left icon-bar" aria-hidden="true"></i>
            </div>
            <form action="" class="header-form">
              <div class="header-input">
                <input type="text" placeholder="Search Product Code" />
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
<div class="dashboard-content" data-tab="14">

<div class="modal modal-addpro" style="margin-right:-100px;">
                <div class="modal-overlay"></div>
                <div class="modal-content modal-addproduct">
                  <span class="modal-close">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                  </span>
                  <div class="modal-main">
                    <form action="#" method="post">
                    <div class="modal-heading">Add Product Sizes & Prices</div>
                    <div class="modal-form modal-form-addpro">
                      <div class="modal-form-item">
                        <div class="modal-form-name">Product Code*</div>
                        <input name="product_code" type="text" required />
                      </div>
                      <div class="modal-form-item">
                        <div class="modal-form-name">Sizes & Prices (20-38)</div>
                        <div style="display: flex; flex-wrap: wrap; gap: 10px;">
                          <?php for ($i = 20; $i <= 38; $i += 2): ?>
                            <div style="display: flex; flex-direction: column; align-items: center;">
                              <label style="font-size:12px;">Size <?= $i ?></label>
                              <input name="size_<?= $i ?>" type="number" min="0" step="0.01" style="width:70px;" placeholder="₹" />
                            </div>
                          <?php endfor; ?>
                        </div>
                      </div>
                    </div> 
                    <div class="modal-btn">
                      <button name="btnsave" class="modal-button">Save</button>
                    </div>
                </form>
                  </div>
                </div>
              </div>

              <div class="dashboard-heading">
                <h2 class="title-primary">Product Size Management</h2>
                <button class="dashboard-add">
                  <i class="fa fa-plus" aria-hidden="true"></i>
                  Add
                </button>
                <div class="modal">
                  <div class="modal-overlay"></div>
                  <div class="modal-content">
                    <span class="modal-close">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                      </svg>
                    </span>
                  </div>
                </div>
              </div>

                <!-- Table with horizontal scroll container -->
                <div style="background: white; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); margin-top: 20px; overflow: hidden; max-width: 100%;">
                    <div style="overflow-x: auto; overflow-y: auto; max-height: 70vh; max-width: 100%;">
                        <table class="product" style="width: 100%; min-width: 1200px; border-collapse: collapse;">
                        <thead style="position: sticky; top: 0; background: #1a1a1a; z-index: 10;">
                          <tr>
                            <th style="padding: 12px 8px; text-align: left; color: white; border-bottom: 2px solid #333; min-width: 60px;">ID</th>
                            <th style="padding: 12px 8px; text-align: left; color: white; border-bottom: 2px solid #333; min-width: 120px;">Product Code</th>
                            <?php for ($i = 20; $i <= 38; $i += 2): ?>
                              <th style="padding: 12px 8px; text-align: center; color: white; border-bottom: 2px solid #333; min-width: 90px; font-size: 12px;">Size <?= $i ?></th>
                            <?php endfor; ?>
                            <th style="padding: 12px 8px; text-align: left; color: white; border-bottom: 2px solid #333; min-width: 120px;">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?=$html_size?>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>