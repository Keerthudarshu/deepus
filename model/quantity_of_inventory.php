   
<?php
    function update_quantity_of_inventory($id_product,$id_color,$id_size,$soluong){
        $sql = "UPDATE quantity_of_inventory SET soluong=? WHERE id_product=? and id_color=? and id_size=?";
        pdo_execute($sql,$soluong, $id_product, $id_color, $id_size);
        // Sync total stock to product table
        $total_stock = getsoluongkho($id_product);
        $sql2 = "UPDATE product SET stock=? WHERE id=?";
        pdo_execute($sql2, $total_stock, $id_product);
    }
    function getquantity_of_inventorythat($id_product,$id_color,$id_size){
        $sql="SELECT * FROM quantity_of_inventory where id_product=? and id_color=? and id_size=?";
        $result = pdo_query_one($sql, $id_product,$id_color,$id_size);
        return (is_array($result) && isset($result['soluong'])) ? $result['soluong'] : 0;
    }

     function getsoluongkho($id_product){
        $sql = "SELECT SUM(soluong) as total FROM quantity_of_inventory WHERE id_product=?";
        $result = pdo_query_one($sql, $id_product);
        return isset($result['total']) ? $result['total'] : 0;
    }
?>