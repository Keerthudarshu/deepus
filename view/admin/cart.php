<?php
$html_cart = '';
foreach ($cart as $item) {
    extract($item);
    if (check_img_admin($img) == '') {
        $img = check_img_admin('user.webp');
    } else {
        $img = check_img_admin($img);
    }
    $html_cart .= '<tr>
        <td>' . $id_user . '</td>
        <td >' . $img . '</td>
        <td>' . number_format($price, 0, '.', ',') . '</td>
        <td>' . $soluong . '</td>
        <td>' . number_format($thanhtien, 0, '.', ',') . '</td>
        <td>' . $id_size . '</td>
        <td>' . $id_color . '</td>
        <td>
            
            <a href="index.php?pg=delcart&id=' . $id . '" class="del" style="padding: 0px">Erase</a>
        </td>
        </tr>';
    // $active = '';
    $iduser = '';
    $img = '';
    $price = '';
    $soluong = '';
    $thanhtien = '';
    $size = '';
    $color = '';


    $img = 'user.webp';

    $hinhcu = '';
    if (isset($_SESSION['update_id']) && $_SESSION['update_id']) {
        $active = 'active';
        if (isset($user_detail)) {
            extract($user_detail);
            if ($role == 1) {
                $role = 'Quản trị viên';
            } else {
                $role = 'Khách hàng';
            }
            if ($kichhoat == 1) {
                $kichhoat = 'Kích hoạt';
            } else {
                $kichhoat = 'Bị khóa';
            }
            if ($gioitinh == 0) {
                $gioitinh = 'Khác';
            } else {
                if ($gioitinh == 1) {
                    $gioitinh = 'Nam';
                } else {
                    $gioitinh = 'Nữ';
                }
            }
            $hinhcu = $img;
            if ($img == '') {
                $img = 'user.webp';
            }
        }
    }
}
?>

<div class="main">
        <div class="header-main">
          <div class="header-left">
            <div class="header-bar">
              <i class="fa fa-angle-left icon-bar" aria-hidden="true"></i>
            </div>
            <form action="index.php?pg=cart" method="post" class="header-form">
              <div class="header-input">
                <input name="keywordcart" type="text" placeholder="Tìm kiếm " />
                <div class="header-input-icon">
                  <button name="searchcart"><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
              </div>
            </form>
          </div>
          <div class="header-right">
            <div class="header-bell">
              <i class="fa fa-bell" aria-hidden="true"></i>
            </div>
            <div class="header-auth">
              <div class="header-avatar">
                <img src="../layout/assets/images/avatar.png" alt="" />
              </div>
              <div class="header-name">Hi, Deepus</div>
            </div>
          </div>
        </div>
        <div class="dashboard">
          <div class="container">
<div class="dashboard-content"
    data-tab="6">

    <div class="modal modal-addpro">
        <div class="modal-overlay">
        </div>
        <div
            class="modal-content modal-addproduct">
            <span class="modal-close">
                <svg xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M6 18L18 6M6 6l12 12" />
                </svg>
            </span>
            <div class="modal-main">
                <form
                    action="index.php?pg=addcart"
                    method="post"
                    enctype="multipart/form-data">
                    <div
                        class="modal-heading">
                        Add new product</div>
                    <div
                        class="modal-form modal-form-addpro">
                        <div
                            class="modal-form-item">
                            <div
                                class="modal-form-name">
                                Customer ID
                            </div>
                            <input
                                name="id_user"
                                type="text" />
                        </div>
                        <div
                            class="modal-form-item">
                            <div
                                class="modal-form-name">
                                Image
                            </div>
                            <div
                                class='input-image'>
                                <input
                                    id="file-input2"
                                    name="img2"
                                    type="file"
                                    accept="image/*" />
                                <?= substr_replace(check_img_admin($img), ' id="img-preview2" ', 5, 0) ?>
                            </div>
                        </div>
                        <input
                            type="hidden"
                            name="hinhcu"
                            value="<?= $hinhcu ?>">
                        <script>
                            var input2 = document.getElementById("file-input2");
                            var image2 = document.getElementById("img-preview2");

                            input2.addEventListener("change", (e) => {
                                if (e.target.files.length) {
                                    const src = URL.createObjectURL(e.target.files[0]);
                                    image2.src = src;
                                }
                            });
                        </script>
                        <div
                            class="modal-form-item">
                            <div
                                class="modal-form-name">
                                Price
                            </div>
                            <input
                                name="price"
                                type="text" />
                        </div>
                        <div
                            class="modal-form-item">
                            <div
                                class="modal-form-name">
                                Quantity
                            </div>
                            <input
                                name="soluong"
                                type="text" />
                        </div>
                        <div
                            class="modal-form-item">
                            <div
                                class="modal-form-name">
                                Total
                            </div>
                            <input
                                name="thanhtien"
                                type="text" />
                        </div>
                        <div
                            class="modal-form-item">
                            <div
                                class="modal-form-name">
                                Size
                            </div>
                            <div
                                class="dropdown">
                                <div
                                    class="dropdown-select">
                                    <div class="dropdown-content"
                                        dropdown="1">
                                       Other
                                    </div>
                                    <input
                                        name="size"
                                        type="hidden"
                                        class="dropdown-input"
                                        value="Khác"
                                        dropdown="1" />
                                    <i class="fa fa-angle-down dropdown-icon icon1"
                                        aria-hidden="true"
                                        dropdown="1"
                                        onclick="dropdown(this)"></i>
                                </div>
                                <div class="dropdown-list active"
                                    dropdown="1">
                                    <div class="dropdown-item"
                                        onclick="select(this)">
                                        Other
                                    </div>
                                    <div class="dropdown-item"
                                        onclick="select(this)">
                                        1
                                    </div>
                                    <div class="dropdown-item"
                                        onclick="select(this)">
                                        2
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="modal-form-item">
                            <div
                                class="modal-form-name">
                                Color
                            </div>
                            <div
                                class="dropdown">
                                <div
                                    class="dropdown-select">
                                    <div class="dropdown-content"
                                        dropdown="2">
                                        Other
                                    </div>
                                    <input
                                        name="color"
                                        type="hidden"
                                        class="dropdown-input"
                                        value="Khác"
                                        dropdown="2" />
                                    <i class="fa fa-angle-down dropdown-icon icon1"
                                        aria-hidden="true"
                                        dropdown="2"
                                        onclick="dropdown(this)"></i>
                                </div>
                                <div class="dropdown-list active"
                                    dropdown="2">
                                    <div class="dropdown-item"
                                        onclick="select(this)">
                                        Other
                                    </div>
                                    <div class="dropdown-item"
                                        onclick="select(this)">
                                        1
                                    </div>
                                    <div class="dropdown-item"
                                        onclick="select(this)">
                                        2
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            var input = document.getElementById("file-input1");
                            var image = document.getElementById("img-preview1");

                            input.addEventListener("change", (e) => {
                                if (e.target.files.length) {
                                    const src = URL.createObjectURL(e.target.files[0]);
                                    image.src = src;
                                }
                            });
                        </script>


                    </div>
                    <div
                        class="modal-btn">
                        <button
                            name="btnsave"
                            class="modal-button">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="dashboard-heading">
        <h2 class="title-primary">Shopping Cart</h2>

    </div>

    <div
        class="modal modal-update <?= $active ?>">
        <div class="modal-overlay">
        </div>
        <div class="modal-content">
            <a
                href="index.php?pg=updateuser&close=1">
                <span
                    class="modal-close">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </span>
            </a>
            <div class="modal-main">
                <form
                    action="index.php?pg=updateuser"
                    method="post"
                    enctype="multipart/form-data">
                    <div
                        class="modal-heading">
                        Update Category</div>
                    <div
                        class="modal-form  modal-form-addpro">
                        <div
                            class="modal-form-item">
                            <div
                                class="modal-form-name">
                                Full Name*
                            </div>
                            <input
                                name="name"
                                type="text"
                                value="<?= $name ?>" />
                        </div>
                        <div
                            class="modal-form-item">
                            <div
                                class="modal-form-name">
                                Username*
                            </div>
                            <input
                                name="user"
                                type="text"
                                value="<?= $user ?>" />
                        </div>
                        <div
                            class="modal-form-item">
                            <div
                                class="modal-form-name">
                                Password*
                            </div>
                            <input
                                name="pass"
                                type="text"
                                value="<?= $pass ?>" />
                        </div>
                        <div
                            class="modal-form-item">
                            <div
                                class="modal-form-name">
                                Email
                            </div>
                            <input
                                name="email"
                                type="text"
                                value="<?= $email ?>" />
                        </div>
                        <div
                            class="modal-form-item">
                            <div
                                class="modal-form-name">
                                Phone Number
                            </div>
                            <input
                                name="sdt"
                                type="text"
                                value="<?= $sdt ?>" />
                        </div>
                        <div
                            class="modal-form-item">
                            <div
                                class="modal-form-name">
                                Gender
                            </div>

                            <div
                                class="dropdown">
                                <div
                                    class="dropdown-select">
                                    <div class="dropdown-content"
                                        dropdown="4">
                                        <?= $gioitinh ?>
                                    </div>
                                    <input
                                        name="gioitinh"
                                        type="hidden"
                                        class="dropdown-input"
                                        value="<?= $gioitinh ?>"
                                        dropdown="4" />
                                    <i class="fa fa-angle-down dropdown-icon icon1"
                                        aria-hidden="true"
                                        dropdown="4"
                                        onclick="dropdown(this)"></i>
                                </div>
                                <div class="dropdown-list active"
                                    dropdown="4">
                                    <div class="dropdown-item"
                                        onclick="select(this)">
                                        Other
                                    </div>
                                    <div class="dropdown-item"
                                        onclick="select(this)">
                                        Male
                                    </div>
                                    <div class="dropdown-item"
                                        onclick="select(this)">
                                        Female
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="modal-form-item">
                            <div
                                class="modal-form-name">
                                Date of Birth
                            </div>
                            <input
                                name="ngaysinh"
                                type="date"
                                value="<?= $ngaysinh ?>" />
                        </div>
                        <div
                            class="modal-form-item">
                            <div
                                class="modal-form-name">
                                Address
                            </div>
                            <input
                                name="diachi"
                                type="text"
                                value="<?= $diachi ?>" />
                        </div>
                        <div
                            class="modal-form-item">
                            <div
                                class="modal-form-name">
                                Image
                            </div>
                            <div
                                class='input-image'>
                                <input
                                    id="file-input1"
                                    name="img1"
                                    type="file"
                                    accept="image/*" />
                                <?= substr_replace(check_img_admin('user.webp'), ' id="img-preview1" ', 5, 0) ?>
                            </div>
                        </div>
                        <input
                            type="hidden"
                            name="hinhcu"
                            value="<?= $hinhcu ?>">
                        <script>
                            var input2 = document.getElementById("file-input2");
                            var image2 = document.getElementById("img-preview2");

                            input2.addEventListener("change", (e) => {
                                if (e.target.files.length) {
                                    const src = URL.createObjectURL(e.target.files[0]);
                                    image2.src = src;
                                }
                            });
                        </script>
                        <div
                            class="modal-form-item">
                            <div
                                class="modal-form-name">
                                Role
                            </div>

                            <div
                                class="dropdown">
                                <div
                                    class="dropdown-select">
                                    <div class="dropdown-content"
                                        dropdown="5">
                                        <?= $role ?>
                                    </div>
                                    <input
                                        name="role"
                                        type="hidden"
                                        class="dropdown-input"
                                        value="<?= $role ?>"
                                        dropdown="5" />
                                    <i class="fa fa-angle-down dropdown-icon icon1"
                                        aria-hidden="true"
                                        dropdown="5"
                                        onclick="dropdown(this)"></i>
                                </div>
                                <div class="dropdown-list active"
                                    dropdown="5">
                                    <div class="dropdown-item"
                                        onclick="select(this)">
                                       Client
                                    </div>
                                    <div class="dropdown-item"
                                        onclick="select(this)">
                                        Administrator
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="modal-form-item">
                            <div
                                class="modal-form-name">
                                Activate
                            </div>

                            <div
                                class="dropdown">
                                <div
                                    class="dropdown-select">
                                    <div class="dropdown-content"
                                        dropdown="6">
                                        <?= $kichhoat ?>
                                    </div>
                                    <input
                                        name="kichhoat"
                                        type="hidden"
                                        class="dropdown-input"
                                        value="<?= $kichhoat ?>"
                                        dropdown="6" />
                                    <i class="fa fa-angle-down dropdown-icon icon1"
                                        aria-hidden="true"
                                        dropdown="6"
                                        onclick="dropdown(this)"></i>
                                </div>
                                <div class="dropdown-list active"
                                    dropdown="6">
                                    <div class="dropdown-item"
                                        onclick="select(this)">
                                        Activate
                                    </div>
                                    <div class="dropdown-item"
                                        onclick="select(this)">
                                        Deactivate
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="modal-btn">
                        <button
                            name="btnupdate"
                            class="modal-button">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <table class="product">
        <thead>
            <tr>
                <th>Customer Code</th>
                <th>Image</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Size</th>
                <th>Color</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            <?= $html_cart; ?>

        </tbody>
    </table>
</div>