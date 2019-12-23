<style>
    .fixed_header {
        border: 1.5px solid black;
        width: 100%;
        table-layout: fixed;
        border-collapse: collapse;
    }

    .fixed_header tbody {
        display: block;
        width: 100%;
        overflow: auto;
        height: 390px;
    }

    .fixed_header thead tr {
        display: block;
    }

    .fixed_header thead {
        background: black;
        color: #fff;
    }

    .fixed_header th,
    .fixed_header td {
        border: 1.5px solid black;
        padding: 5px;
        text-align: center;
        width: 210px;
    }
</style>
<?php
include 'header.php';
require "../dbcon.php";

$query = "SELECT * FROM theloai";

$data = mysqli_query($connect, $query);
?>
<div class="main-content">
    <h1>Danh sách thể loại</h1>
    <div class="product-items">
        <div class="buttons">
            <a href="themtloai.php">Thêm thể loại</a>
        </div>
        <table class="fixed_header">
            <thead>
                <tr>
                    <th>Số thứ tự</th>
                    <th>Tên thể loại</th>
                    <th>Xóa</th>
                    <th>Sửa</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1;
                    while($row = mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $row['tentheloai']?></td>
                    <td style="font-weight: bold;"><a href="#" style=" text-decoration: none;">Xóa</a></s></td>
                    <td style="font-weight: bold;"><a href="#" style=" text-decoration: none;">Sửa</a></s></td>
                </tr>
                <?php $i++;
                    }
                ?>
            </tbody>
        </table>
        <div class="clear-both"></div>

    </div>

</div>
<?php
include 'footer.php';
?>