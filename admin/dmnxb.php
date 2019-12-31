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

$query = "SELECT * FROM nxb";

$data = mysqli_query($connect, $query);
?>
<div class="main-content">
    <h1>Danh sách nhà xuất bản</h1>
    <div class="product-items">
        <div class="buttons">
            <a href="themnxb.php">Thêm nhà xuất bản</a>
        </div>
        <table class="fixed_header">
            <thead>
                <tr>
                    <th>Số thứ tự</th>
                    <th>Tên nhà xuất bản</th>
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
                    <td><?php echo $row['nxb']?></td>
                    <td style="font-weight: bold;"><a href="xulyxoanxb.php?id=<?php echo $row['idnxb'];?>" style=" text-decoration: none;">Xóa</a></s></td>
                    <td style="font-weight: bold;"><a href="xulysuanxb.php?id=<?php echo $row['idnxb'];?>" style=" text-decoration: none;">Sửa</a></s></td>
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