<?php
include 'header.php';
require '../dbcon.php';
?>

<div class="main-content">
    <h1>Thêm thông tin thể loại</h1>
    <div id="content-box">
        <?php
        if (isset($_GET['action']) && $_GET['action'] == 'add') {
            if (isset($_POST['name']) && !empty($_POST['name'])) {

                if (empty($_POST['name'])) {
                    $error = "Bạn phải nhập tên sản phẩm";
                }
                if (!isset($error)) {
                    $result = mysqli_query($connect, "INSERT INTO nxb(nxb) values('" . $_POST['name'] . "')");
                    if (!$result) {
                        $error = "Có lỗi xảy ra trong quá trình thực hiện.";
                    }
                }
            } else {
                $error = "Bạn chưa nhập thông tin sản phẩm.";
            }
            ?>
            <div class="container">
                <div class="error"><?= isset($error) ? $error : "Cập nhật thành công" ?></div>
                <a href="dmnxb.php">Quay lại danh sách thể loại</a>
            </div>
        <?php } else { ?>
            <form id="product-form" method="POST" action="?action=add" enctype="multipart/form-data">

                <input type="submit" title="Lưu sản phẩm" value="" />
                <div class="clear-both"></div>

                <div class="wrap-field">
                    <label>Tên nhà xuất bản: </label>
                    <input type="text" name="name" value="" />
                    <div class="clear-both"></div>
                </div>

            </form>
        <?php } ?>
    </div>
</div>