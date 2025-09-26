<?php
// favorites.php
session_start();
include_once "model/connectdb.php";
include_once "model/global.php";
include_once "model/product.php";
include_once "model/user.php";

// Initialize favorites in session if not set
if (!isset($_SESSION['favorites'])) {
    $_SESSION['favorites'] = [];
}

// Add product to favorites
if (isset($_GET['add']) && is_numeric($_GET['add'])) {
    $productId = intval($_GET['add']);
    if (!in_array($productId, $_SESSION['favorites'])) {
        $_SESSION['favorites'][] = $productId;
    }
    header('Location: /deepus/favorites');
    exit;
}

// Remove product from favorites
if (isset($_GET['remove']) && is_numeric($_GET['remove'])) {
    $productId = intval($_GET['remove']);
    $_SESSION['favorites'] = array_diff($_SESSION['favorites'], [$productId]);
    header('Location: /deepus/favorites');
    exit;
}

// Get favorite products
$favorites = [];
if (!empty($_SESSION['favorites'])) {
    $ids = implode(',', array_map('intval', $_SESSION['favorites']));
    if ($ids !== '') {
        $sql = "SELECT * FROM product WHERE id IN ($ids) ORDER BY id DESC";
        $favorites = pdo_query($sql);
    }
}

include 'view/header.php';
?>
    <div class="container">
        <h2>My Favorites</h2>
        <?php if (empty($favorites)): ?>
            <section class="cart">
                <div class="container">
                    <div class="cart-title-heading">Favorites</div>
                    <div class="cart-main">
                        <div class="cart-left" style="width:100%">
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
                                    <tr>
                                        <td colspan="4" style="text-align:center; padding:40px 0;">
                                            <img class="giohangtrong" src="view/layout/assets/images/giohangtrong.jpg" alt="Empty Favorites" style="width:120px; margin-bottom:20px;">
                                            <h3>Your Favorites List is Empty</h3>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="cart-auth">
                                <div class="cart-auth-del">
                                    <button class="cart-auth-del__btn" disabled>Clear All</button>
                                </div>
                                <div class="cart-auth-continue">
                                    <a href="index.php?pg=product"><button class="cart-auth-continue__btn">Continue Shopping</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php else: ?>
            <section class="cart">
                <div class="container">
                    <div class="cart-title-heading">Favorites</div>
                    <div class="cart-main">
                        <div class="cart-left" style="width:100%">
                            <table class="cart-table">
                                <thead>
                                    <tr>
                                        <th class="pro-info">Product Details</th>
                                        <th>Item Price</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($favorites as $product): ?>
                                        <?php 
                                            $main = getimg_product_main($product['id']);
                                            $mainImg = isset($main['main_img']) ? trim((string)$main['main_img']) : '';
                                            $imgSrc = $mainImg !== '' ? 'upload/'.htmlspecialchars($mainImg, ENT_QUOTES) : 'view/layout/assets/images/avatar.png';
                                            $alt = htmlspecialchars((string)$product['name'], ENT_QUOTES);
                                            $price = (int)$product['price'];
                                        ?>
                                        <tr>
                                            <td style="display:flex;align-items:center;gap:12px;">
                                                <a href="index.php?pg=detail&id=<?= (int)$product['id'] ?>" style="display:flex;align-items:center;gap:12px;color:inherit;text-decoration:none;">
                                                    <img src="<?= $imgSrc ?>" alt="<?= $alt ?>" style="width:60px;height:60px;object-fit:cover;border:1px solid #eee;border-radius:4px;">
                                                    <div><?= htmlspecialchars((string)$product['name']) ?></div>
                                                </a>
                                            </td>
                                            <td><?= number_format($price,0,'',',') ?>₹</td>
                                            <td>1</td>
                                            <td><?= number_format($price,0,'',',') ?>₹</td>
                                            <td><a href="favorites.php?remove=<?= (int)$product['id'] ?>" class="del">Remove</a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    <a href="/deepus/index">Back to Home</a>
    </div>
<?php include 'view/footer.php'; ?>
