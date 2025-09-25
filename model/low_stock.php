<?php
// Returns products with low stock (<= 5)
function get_low_stock_products($limit = 10) {
    $limit = intval($limit);
    $sql = "SELECT * FROM product WHERE stock > 0 AND stock <= 5 ORDER BY stock ASC, id DESC LIMIT $limit";
    return pdo_query($sql);
}
