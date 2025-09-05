<?php
// favorites.php
session_start();
include_once "model/connectdb.php";
include_once "model/product.php";

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
    header('Location: favorites.php');
    exit;
}

// Remove product from favorites
if (isset($_GET['remove']) && is_numeric($_GET['remove'])) {
    $productId = intval($_GET['remove']);
    $_SESSION['favorites'] = array_diff($_SESSION['favorites'], [$productId]);
    header('Location: favorites.php');
    exit;
}

// Get favorite products
$favorites = [];
if (!empty($_SESSION['favorites'])) {
    $ids = implode(',', array_map('intval', $_SESSION['favorites']));
    $favorites = get_products_by_ids($ids); // You need to implement this in model/product.php
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
                        <div class="cart-left">
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
                        <div class="cart-right">
                            <div class="cart-info">Order Details</div>
                            <div class="cart-content">
                                <div class="cart-content-price">
                                    <div class="cart-content__text">Total Amount</div>
                                    <div class="cart-content__price"><span id="cart-total-display">0₹</span></div>
                                </div>
                                <div class="cart-item">
                                    <div class="cart-sale">Discount</div>
                                    <span>Valid at checkout</span>
                                </div>
                                <div class="cart-item">
                                    <div class="cart-sale">Delivery Charges</div>
                                    <span>Calculated at checkout</span>
                                </div>
                                <div class="detail-btn">
                                    <button class="detail-button" disabled>Go to Payment</button>
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
        <?php else: ?>
            <div class="favorites-list">
                <?php foreach ($favorites as $product): ?>
                    <div class="favorite-item">
                        <img src="upload/<?= htmlspecialchars($product['img']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" style="width:100px;">
                        <div><?= htmlspecialchars($product['name']) ?></div>
                        <a href="favorites.php?remove=<?= $product['id'] ?>">Remove</a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <a href="index.php">Back to Home</a>
    </div>
<?php include 'view/footer.php'; ?>
