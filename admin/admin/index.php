<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            .box-content{
                margin: 0 auto;
                width: 800px;
                border: 2px solid #ccc;
                text-align: center;
                padding: 20px;
                background: #DBDBD9;
                
            }
            #user_login form{
                width: 200px;
                margin: 40px auto;
            }
            #user_login form input{
                margin: 5px 0;
            }
            .box-content a{
                text-decoration: none; 
                color: black;
                padding: 10px;
            }
            .box-content a:hover{
                background: #F0F413;
            }
        </style>
    </head>
    <body>
    <?php
        session_start();
        include 'connect_db.php';
        $error = false;
        if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {
            $result = mysqli_query($con, "Select `id`,`username`,`fullname` from `user` WHERE (`username` ='" . $_POST['username'] . "' AND `password` = '" . $_POST['password'] . "')");
            if (!$result) {
                $error = mysqli_error($con);
            } else {
                $user = mysqli_fetch_assoc($result);
                $_SESSION['current_user'] = $user;
            }
            mysqli_close($con);
            if ($error !== false || $result->num_rows == 0) {
                ?>
                <div id="login-notify" class="box-content">
                    <h1>Thông báo</h1>
                    <h4><?= !empty($error) ? $error : "Thông tin đăng nhập không chính xác" ?></h4>
                    <a href="./index.php">Quay lại</a>
                </div>
                <?php
                exit;
            }
            ?>
        <?php } ?>
        <?php if (empty($_SESSION['current_user'])) { ?>
            <div id="user_login" class="box-content">
                <h1>Đăng nhập tài khoản</h1>
                <form action="./index.php" method="Post" autocomplete="off">
                    <label>Username</label></br>
                    <input type="text" name="username" value="" /><br/>
                    <label>Password</label></br>
                    <input type="password" name="password" value="" /></br>
                    <br>
                    <input type="submit" value="Đăng nhập" />
                </form>
            </div>
            <?php
        } else {
            $currentUser = $_SESSION['current_user'];
            ?>
            <div id="login-notify" class="box-content">
            <p>Xin chào quản trị viên: <span style="color: black; background:#F0F413;"><?= $currentUser['fullname'] ?></span></p><br/>
                <a href="./dmsach.php">Quản lý sản phẩm</a><br/><br/>
                <a href="./edit.php">Đổi mật khẩu</a><br/><br/>
                <a href="./logout.php">Đăng xuất</a>
            </div>
        <?php } ?>
    </body>
</html>