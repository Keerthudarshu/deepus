
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
    $html_size .= '<tr>';
    $html_size .= '<td>' . htmlspecialchars($row['id']) . '</td>';
    $html_size .= '<td>' . htmlspecialchars($row['product_code']) . '</td>';
    for ($i = 20; $i <= 38; $i += 2) {
        $key = 'size_' . $i;
        $html_size .= '<td>' . (isset($row[$key]) ? number_format($row[$key], 2) . '₹' : '-') . '</td>';
    }
    $html_size .= '<td><a href="#" class="edit">Edit</a> <a href="#" class="del">Delete</a></td>';
    $html_size .= '</tr>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ...existing code... -->
    <div class="main">
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
                          <div style="margin-bottom: 100px;"></div>
                          <div class="modal modal-addpro">
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
                        <table class="product">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Product Code</th>
                                    <?php for ($i = 20; $i <= 38; $i += 2): ?>
                                        <th>Size <?= $i ?></th>
                                    <?php endfor; ?>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?=$html_size?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
