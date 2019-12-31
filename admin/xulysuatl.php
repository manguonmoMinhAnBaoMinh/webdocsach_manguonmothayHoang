<?php
include 'header.php';
require '../dbcon.php';
?>

<div class="main-content">
    <h1>Thay đổi thể loại sách</h1>
    <div id="content-box">
        <?php
        if (isset($_GET['action']) && $_GET['action'] == 'add') {
            if (isset($_POST['name']) && !empty($_POST['name'])) {

                if (empty($_POST['name'])) {
                    $error = "Bạn phải nhập tên sản phẩm";
                }
                if (!isset($error)) {
                    $result = mysqli_query($connect, "UPDATE nxb set nxb = '" . $_POST['name'] . "' WHERE idnxb = '" . $_GET['id'] . "'");
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
                <a href="dmtg.php">Quay lại danh sách tác giả</a>
            </div>
        <?php } else { ?>
            <form id="product-form" method="POST" action="?action=add" enctype="multipart/form-data">

                <input type="submit" title="Lưu sản phẩm" value="" />
                <div class="clear-both"></div>
                <?php 
                    $query2 = "SELECT * FROM theloai where idtl = '" . $_GET['id'] . "'";
                    $data2 = mysqli_query($connect, $query2);
                    while($row = mysqli_fetch_array($data2)){
                ?>
                <div class="wrap-field">
                    <label>Thể loại: </label>
                    <input type="text" name="name" value="<?php echo $row['tentheloai']?>" />
                    <div class="clear-both"></div>
                </div>
                    <?php }?>

            </form>
        <?php } ?>
    </div>
</div>