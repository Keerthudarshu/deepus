<?php
include_once "connectdb.php";

function add_size_row($product_code, $sizes_data) {
    $pdo = pdo_get_connection();
    $fields = ['product_code'];
    $placeholders = ['?'];
    $values = [$product_code];
    for ($i = 20; $i <= 38; $i += 2) {
        $fields[] = 'size_' . $i;
        $placeholders[] = '?';
        $values[] = isset($sizes_data['size_' . $i]) ? $sizes_data['size_' . $i] : null;
    }
    $sql = "INSERT INTO size (" . implode(',', $fields) . ") VALUES (" . implode(',', $placeholders) . ")";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($values);
}

function get_all_sizes() {
    $pdo = pdo_get_connection();
    $sql = "SELECT * FROM size ORDER BY id DESC";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll();
}

/**
 * Get price by product code and numeric size.
 * Expects a table `size` with columns: product_code, size_20, size_22, ..., size_38.
 * Returns float price or null if not found.
 */
function get_price_by_code_and_size(string $code, $size) {
    // Normalize size to integer and to one of the allowed steps
    $sz = intval($size);
    if ($sz < 20 || $sz > 38 || $sz % 2 !== 0) {
        return null;
    }
    $col = 'size_' . $sz;
    $pdo = pdo_get_connection();
    // Safe column whitelist check
    $allowed = [];
    for ($i = 20; $i <= 38; $i += 2) { $allowed[] = 'size_'.$i; }
    if (!in_array($col, $allowed, true)) {
        return null;
    }
    // Build SQL dynamically only for the column name, keeping parameters for values
    $sql = "SELECT `$col` AS price FROM size WHERE product_code = ? LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$code]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row && $row['price'] !== null && $row['price'] !== '') {
        return (float)$row['price'];
    }
    return null;
}
?>
