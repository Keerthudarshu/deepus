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
?>
