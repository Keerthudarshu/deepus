<?php
$html_donhang = '';
$i = 1;
foreach ($donhang as $item) {
    extract($item);
 
    $html_donhang .= '<tr>
        <td>' . $i . '</td>
        <td>' . $iduser . '</td>
        <td>' . $tendat . '</td>
        <td >' . $ma_donhang . '</td>
        <td>' . $diachidat . '</td>
        <td>' . number_format($tongtien, 0, '.', ',') . '</td>
        <td>' . $trangthai. '</td>
        <td>
            <a href="index.php?pg=deldonhang&id=' . $id . '" class="del" style="padding: 0px">Cancel</a>
            <a href="index.php?pg=invoice&id=' . $id . '" class="invoice" style="padding: 0px; margin-left:10px; color:#007bff;">Invoice</a>
        </td>
        </tr>';
    // $active = '';
    $iduser = '';
    $price = '';
    $soluong = '';
    $thanhtien = '';
    $size = '';
    $color = '';


    

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
    $i++;
}
?>

<div class="main">
        <div class="header-main">
          <div class="header-left">
            <div class="header-bar">
              <i class="fa fa-angle-left icon-bar" aria-hidden="true"></i>
            </div>
            <form action="index.php?pg=donhang" method="post" class="header-form">
              <div class="header-input">
                <input name="keyworddonhang" type="text" placeholder="Search " />
                <div class="header-input-icon">
                  <button name="searchdonhang"><i class="fa fa-search" aria-hidden="true"></i></button>
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
    data-tab="5">

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
                    action="index.php?pg=addorder"
                    method="post"
                    enctype="multipart/form-data">
                    <div
                        class="modal-heading">
                        Add new product
                    </div>
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
            <h2 class="title-primary">Orders</h2>
            <button class="modal-button" onclick="document.querySelector('.modal-addorder').classList.add('active')">
                + Add Order
            </button>
        </div>

        <!-- Add Order Modal with Cart -->
        <div class="modal modal-addorder">
            <div class="modal-overlay" onclick="this.parentElement.classList.remove('active')"></div>
            <div class="modal-content modal-addproduct">
                <span class="modal-close" onclick="this.closest('.modal-addorder').classList.remove('active')">✖</span>
                <div class="modal-main">
                    <form id="adminOrderForm" action="index.php?pg=addorder" method="post">
                        <div class="modal-heading">Place New Order</div>
                        <div class="modal-form modal-form-addpro">
                            <!-- Product Selection -->
                            <div class="modal-form-item">
                                <div class="modal-form-name">Product Code</div>
                                <select id="product_code_select">
                                    <option value="">-- Select Product Code --</option>
                                    <?php
                                    $conn = pdo_get_connection();
                                    $stmt = $conn->query("SELECT ma_sanpham FROM product");
                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        echo "<option value='{$row['ma_sanpham']}'>{$row['ma_sanpham']}</option>";
                                    }
                                    ?>
                                </select>
                                <button type="button" id="addProductBtn" style="margin-left:10px;">Add Product</button>
                            </div>
                            <!-- Cart Table -->
                            <div class="modal-form-item">
                                <table id="orderCartTable" style="width:100%;margin-bottom:10px;">
                                    <thead>
                                        <tr>
                                            <th>Code</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                            <th>Total</th>
                                            <th>Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                            <!-- Customer Info (hidden until cart has items) -->
                            <div id="customerInfoSection" style="display:none;">
                                <div class="modal-form-item">
                                    <div class="modal-form-name">Customer Name</div>
                                    <input name="customer_name" type="text" required />
                                </div>
                                <div class="modal-form-item">
                                    <div class="modal-form-name">Phone Number</div>
                                    <input name="customer_phone" type="text" required />
                                </div>
                                <div class="modal-form-item">
                                    <div class="modal-form-name">Address</div>
                                    <input name="customer_address" type="text" required />
                                </div>
                            </div>
                            <input type="hidden" name="cart_data" id="cart_data" />
                        </div>
                        <div class="modal-btn">
                            <button type="button" id="confirmOrderBtn" class="modal-button">Confirm Order</button>
                            <button type="submit" id="submitOrderBtn" class="modal-button" style="display:none;">Place Order</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
        // Cart logic
        let cart = [];
        function renderCart() {
            const tbody = document.querySelector('#orderCartTable tbody');
            tbody.innerHTML = '';
            let total = 0;
            cart.forEach((item, idx) => {
                const row = document.createElement('tr');
                row.innerHTML = `<td>${item.code}</td><td>${item.name}</td><td>${item.price}</td><td><input type='number' min='1' value='${item.qty}' style='width:50px;' onchange='updateQty(${idx}, this.value)' /></td><td>${(item.price*item.qty).toFixed(2)}</td><td><button type='button' onclick='removeCartItem(${idx})'>✖</button></td>`;
                tbody.appendChild(row);
                total += item.price * item.qty;
            });
            // Show customer info if cart has items
            document.getElementById('customerInfoSection').style.display = cart.length ? '' : 'none';
        }
        window.updateQty = function(idx, val) {
            cart[idx].qty = parseInt(val)||1;
            renderCart();
        }
        window.removeCartItem = function(idx) {
            cart.splice(idx,1);
            renderCart();
        }
        document.getElementById('addProductBtn').onclick = function() {
            const code = document.getElementById('product_code_select').value;
            if (!code) return alert('Select a product code!');
            fetch('index.php?pg=getproduct&code='+code)
                .then(res=>res.json())
                .then(data=>{
                    if(data.success) {
                        // Check if already in cart
                        if(cart.find(p=>p.code===code)) return alert('Product already in cart!');
                        cart.push({code:code, name:data.product.name, price:parseFloat(data.product.price), qty:1});
                        renderCart();
                    } else {
                        alert('Product not found!');
                    }
                });
        }
        document.getElementById('confirmOrderBtn').onclick = function() {
            if (!cart.length) return alert('Add at least one product!');
            // Save cart data to hidden field
            document.getElementById('cart_data').value = JSON.stringify(cart);
            // Show submit button, hide confirm
            document.getElementById('confirmOrderBtn').style.display = 'none';
            document.getElementById('submitOrderBtn').style.display = '';
        }
        // Only reset cart when opening modal via Add Order button
        document.querySelector('.dashboard-heading button').addEventListener('click', function(){
            cart = [];
            renderCart();
            document.getElementById('confirmOrderBtn').style.display = '';
            document.getElementById('submitOrderBtn').style.display = 'none';
            document.getElementById('customerInfoSection').style.display = 'none';
            document.getElementById('cart_data').value = '';
        });
        </script>

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
                                Date of birth
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
                                        Customer
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
                <th>STT</th>
                <th>User ID</th>
                <th>Placer's Name</th>
                <th>Order Code</th>
                <th>Address</th>
                <th>Total Amount</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            <?= $html_donhang; ?>

        </tbody>
    </table>
</div>