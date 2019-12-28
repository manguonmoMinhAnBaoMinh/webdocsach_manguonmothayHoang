<!DOCTYPE html>
<html>
    <head>
        <title>Đăng xuất tài khoản</title>
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
            #user_logout form{
                width: 200px;
                margin: 40px auto;
            }
            #user_logout form input{
                margin: 5px 0;
            }
            .box-content a{
                text-decoration: none;
            }
            .box-content a:hover{
                background: yellow;
            }
        </style>
    </head>
    <body>
        <?php
        session_start();
        unset($_SESSION['current_user']);
        ?>
        <div id="user_logout" class="box-content">
            <h1>Đăng xuất tài khoản thành công</h1>
            <a href="./index.php">Đăng nhập lại</a>
        </div>
    </body>
</html>
