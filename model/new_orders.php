<?php
// Returns new/pending orders (status = 'pending' or 'choxacnhan')
function get_new_orders($limit = 10) {
    $limit = intval($limit);
    $sql = "SELECT * FROM donhang WHERE trangthai = 'pending' OR trangthai = 'choxacnhan' ORDER BY id DESC LIMIT $limit";
    return pdo_query($sql);
}
