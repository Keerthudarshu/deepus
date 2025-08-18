<?php
     function getnew_home(){
        $sql="SELECT * FROM news ORDER BY id";
        return pdo_query($sql);
     }

     function getdetail($id){
      $sql="SELECT * FROM news WHERE id=?";
      return pdo_query_one($sql, $id);
   }

     function get_detail_news($limit=100000){
      $sql="SELECT * FROM news ORDER BY id DESC limit ".$limit;
      return pdo_query($sql);
   }
     function getnew_home_new(){
        $sql="SELECT * FROM news ORDER BY id DESC limit 1";
        return pdo_query($sql);
     }

     function get_idnews($id){
        $sql="SELECT * FROM news WHERE id=?";
        return pdo_query_one($sql, $id);
     }
     function create_news($id, $title, $img, $noidung, $thoigian){
      $sql="INSERT INTO news(id, title, img, noidung,thoigian) VALUES (?,?,?,?,?)";      
      pdo_execute($sql,$id, $title, $img, $noidung, $thoigian);
   }

  function update_news($id, $title, $img, $noidung, $thoigian){
      $sql = "UPDATE news SET title=?,img=?,noidung=?,thoigian=? WHERE id=?";
      pdo_execute($sql, $title, $img, $noidung, $thoigian, $id);
    }

  function del_news($id){
      $sql = "DELETE FROM news WHERE  id=?";
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