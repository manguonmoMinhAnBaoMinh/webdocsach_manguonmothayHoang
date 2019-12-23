<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

<head>
    <title>Trang quản trị (admin)</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/admin_style.css">
    <script src="../resources/ckeditor/ckeditor.js"></script>
</head>

<body>
    <?php
    session_start();
    include 'connect_db.php';
    $result = mysqli_query($con, "Select `id`,`username`,`fullname` from `user`");
    if (!$result) {
        $error = mysqli_error($con);
    } else {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['current_user'] = $user;
    }
    mysqli_close($con);
    ?>
    <?php
    include '../function.php';
    if (!empty($_SESSION['current_user'])) { //Kiểm tra xem đã đăng nhập chưa?
        ?>
        <div id="admin-heading-panel">
            <div class="container">
                <div class="left-panel">
                    Xin chào quản trị viên: <span><?= $user['fullname'] ?></span>
                </div>
                <div class="right-panel">
                    <img height="24" src="../images/home.png" />
                    <a href="#">Trang chủ</a>
                    <img height="24" src="../images/logout.png" />
                    <a href="logout.php">Đăng xuất</a>
                </div>
            </div>
        </div>
        <div id="content-wrapper">
            <div class="container">
                <div class="left-menu">
                    <div class="menu-heading">Trang quản lý</div>
                    <div class="menu-items">
                        <ul>
                            <li><a href="dmsach.php">Sách</a></li>
                            <li><a href="dmtg.php">Tác giả</a></li>
                            <li><a href="dmnxb.php">Nhà xuất bản</a></li>
                            <li><a href="dmtheloai.php">Thể loại</a></li>
                        </ul>
                    </div>
                </div>
            <?php } ?>