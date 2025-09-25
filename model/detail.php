<?php

    function getlistcolor($idproduct){
        $sql="SELECT * FROM img_product_color WHERE id_product=?";
        $list_id_color=pdo_query($sql, $idproduct);
        $list_color=[];
        foreach ($list_id_color as $item) {
            extract($item);
            $sql = "SELECT * FROM color WHERE id=?";
            $list_color[]=pdo_query_one($sql, $id_color);
        }
        return $list_color;
    }
    function getlistsize(){
        $sql="SELECT * FROM size";
        return pdo_query($sql);
    }
    function getlistimgcolor($idproduct){
        $sql="SELECT * FROM img_product_color WHERE id_product=?";
        return pdo_query($sql, $idproduct);
    }
    function showimgdetail($img_product){
        $html_img='';
        $i=0;
        foreach ($img_product as $item) {
            $i++;
            // build full paths via your helper
            $main_src = check_link_img($item['main_img']);
            $sub1_src = isset($item['sub_img1']) ? check_link_img($item['sub_img1']) : '';
            $sub2_src = isset($item['sub_img2']) ? check_link_img($item['sub_img2']) : '';
            $sub3_src = isset($item['sub_img3']) ? check_link_img($item['sub_img3']) : '';

            // thumbnails HTML
            $sub_img_html = '';
            // add main as first thumbnail (useful)
            $sub_img_html .= '<img class="detail-image__item'.($i==1 ? ' active' : '').'" onclick="change_img(this)" data-large="'.$main_src.'" src="'.$main_src.'" alt="thumb" loading="lazy"/>';
            if(!empty($sub1_src)) $sub_img_html .= '<img class="detail-image__item" onclick="change_img(this)" data-large="'.$sub1_src.'" src="'.$sub1_src.'" alt="thumb" loading="lazy"/>';
            if(!empty($sub2_src)) $sub_img_html .= '<img class="detail-image__item" onclick="change_img(this)" data-large="'.$sub2_src.'" src="'.$sub2_src.'" alt="thumb" loading="lazy"/>';
            if(!empty($sub3_src)) $sub_img_html .= '<img class="detail-image__item" onclick="change_img(this)" data-large="'.$sub3_src.'" src="'.$sub3_src.'" alt="thumb" loading="lazy"/>';

            // main image + zoom wrapper
            $main_img_tag = '<img class="detail-img" src="'.$main_src.'" data-large="'.$main_src.'" alt="Product image" />';

            // first visible block keeps the same behavior as before
            if($i==1){
                $html_img.='
                <div class="detail-image">
                  <div class="main-image-container">
                    '.$main_img_tag.'
                    <div style="display:none;">'.$item['main_img'].'</div>
                    <div class="zoom-wrapper" aria-hidden="true"></div>
                  </div>
                  <div class="detail-image__list">
                    '.$sub_img_html.'
                  </div>
                </div>';
            }else{
                $html_img.='
                <div class="detail-image" style="display: none;">
                  <div class="main-image-container">
                    '.$main_img_tag.'
                    <div style="display:none;">'.$item['main_img'].'</div>
                    <div class="zoom-wrapper" aria-hidden="true"></div>
                  </div>
                  <div class="detail-image__list">
                    '.$sub_img_html.'
                  </div>
                </div>';
            }
        }
        echo $html_img;
  }

    function showcomment($listcomment){
        $html_comment='';
        $j=0;
        foreach ($listcomment as $item) {
          extract($item);
          $j++;
          $user=getuser($id_user);
          if($j<=5){
          
            $html_comment.='<div class="comment-card mb-20">
            <div class="comment-avatar">';
            if($user['img']==''){
              $html_comment.=check_img('avatar.png');
            }else{
              $html_comment.=check_img($user['img']);
            }
    
            $html_comment.='</div>
            <div class="comment-info">
              <div class="comment-list">
                <div class="comment-name">'.$user['email'].'</div>
                <div class="comment-date">'.$thoigian.'</div>
              </div>
              <div class="comment-rating">';
              for($i=1;$i<=$rate;$i++){
                $html_comment.='<i style="color:#f8df00" class="fa fa-star star1"></i>';
            }
            for($i=$rate;$i<5;$i++){
                $html_comment.='<i style="color:black" class="fa fa-star star1"></i>';
            }
              $html_comment.='</div>
              
              <p class="comment-review">'.$noidung.'</p>
            </div>
          </div>';
          }else{
            break;
          }
          
        }
        echo $html_comment;
      }

    function getproductdetail($idproduct){
        $sql = "SELECT * FROM product WHERE id=?";
        return pdo_query_one($sql, $idproduct);
    }

    function getproductdesigndetail($idproduct){
        $sql = "SELECT * FROM design WHERE id=?";
        return pdo_query_one($sql, $idproduct);
    }
    
    function getidproductcolor($id_product, $color){
        $sql = "SELECT * FROM product_color WHERE id_product=? and color=?";
        return pdo_query_one($sql, $id_product, $color)['id'];
    }
    function getrelatedproduct($idproduct,$idcatalog){
        $sql="SELECT * FROM product WHERE idcatalog=".$idcatalog." AND id<>".$idproduct." ORDER BY id DESC LIMIT 4";
        return pdo_query($sql);
     }
     function getdetailproductcolor($idproduct, $color){
        $sql = "SELECT * FROM product_color WHERE id_product=? and color=?";
        return pdo_query_one($sql, $idproduct, $color);
     }
     function getpriceproductcolor($idproduct, $color){
        $sql = "SELECT * FROM product_color WHERE id_product=? and color=?";
        return pdo_query_one($sql, $idproduct, $color)['price'];
     }
     function getsoluongtonkho($id){
        try{
            $sql="SELECT * FROM soluongtonkho WHERE id_product=? ORDER BY id";
            return pdo_query($sql, $id);
        }catch(PDOException $e){
            $sql2="SELECT * FROM quantity_of_inventory WHERE id_product=? ORDER BY id";
            return pdo_query($sql2, $id);
        }
     }
?>