<?php
    function update_quantity_of_inventory($id_product,$id_color,$id_size,$soluong){
        $sql = "UPDATE quantity_of_inventory SET soluong=? WHERE id_product=? and id_color=? and id_size=?";
        pdo_execute($sql,$soluong, $id_product, $id_color, $id_size);
    }
    function getquantity_of_inventorythat($id_product,$id_color,$id_size){
        $sql="SELECT * FROM quantity_of_inventory where id_product=? and id_color=? and id_size=?";
        return pdo_query_one($sql, $id_product,$id_color,$id_size)['soluong'];
    }
?>