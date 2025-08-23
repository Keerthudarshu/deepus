<?php
function get_img_product_color($limit=100000){
    $sql="SELECT * FROM img_product_color ORDER BY id DESC limit ".$limit;
    return pdo_query($sql);
 }

 function getdetail_product($id){
    $sql="SELECT * FROM img_product_color WHERE id=?";
    return pdo_query_one($sql, $id);
 }

function create_img_product_color($main_img, $sub_img1, $sub_img2, $sub_img3, $ma_sanpham, $id_color){
    // Check if id exists in product table
    $sql_check = "SELECT id FROM product WHERE id = ?";
    $product = pdo_query_one($sql_check, $ma_sanpham);
    if ($product) {
        $sql="INSERT INTO img_product_color(main_img, sub_img1,sub_img2, sub_img3,id_product,id_color) VALUES (?,?,?,?,?,?)";
        pdo_execute($sql,$main_img, $sub_img1,$sub_img2,$sub_img3, $ma_sanpham, $id_color);
    } else {
        echo '<div style=\"color:red;font-weight:bold;\">Error: Product ID '.$ma_sanpham.' does not exist. Cannot add image.</div>';
        return false;
    }
 }

function update_img_product_color($id,$main_img, $sub_img1, $sub_img2, $sub_img3, $ma_sanpham, $id_color){
    $sql = "UPDATE img_product_color SET main_img=?,sub_img1=?,sub_img2=?,sub_img3=?,id_product=?,id_color=? WHERE id=?";
    pdo_execute($sql, $main_img, $sub_img1, $sub_img2, $sub_img3, $ma_sanpham, $id_color,$id);
  }

function del_img_product_color($id){
    $sql = "DELETE FROM img_product_color WHERE  id=?";
    if(is_array($id)){
        foreach ($id as $ma) {
            pdo_execute($sql, $ma);
        }
    }
    else{
        pdo_execute($sql, $id);
    }
 }


?>