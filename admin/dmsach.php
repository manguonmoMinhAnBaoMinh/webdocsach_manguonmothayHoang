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
        width: 98px;
    }
</style>
<?php
include 'header.php';
require "../dbcon.php";

$query = "select * from sach, theloai, nxb where sach.idnxb = nxb.idnxb and sach.idtl = theloai.idtl";

$data = mysqli_query($connect, $query);
?>
<div class="main-content">
    <h1>Danh sách nhà xuất bản</h1>
    <div class="product-items">
        <div class="buttons">
            <a href="themsach.php">Thêm thông tin sách</a>
        </div>
        <table class="fixed_header">
            <thead>
                <tr>
                    <th>Số thứ tự</th>
                    <th>Tên sách</th>
                    <th>Ảnh bìa</th>
                    <th>Thể loại</th>
                    <th>Nhà xuất bản</th>
                    <th>Tác giả</th>
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
                        <td>
                            <p style="width: 100px; overflow: hidden;white-space: nowrap; text-overflow: ellipsis;"><?php echo $row['tesach'];?></p>
                        </td>
                        <td><img src="../img/<?php echo $row['hinhanh'];?>" alt="<?php echo $row['tesach'];?>" width="70px" height="90px"></td>
                        <td><?php echo $row['tentheloai'];?></td>
                        <td><?php echo $row['nxb'];?></td>
                        <td><?php echo $row['tacgia'];?></td>
                        <td style="font-weight: bold;"><a href="xulyxoasach.php?id=<?php echo $row['idsach'];?>" style=" text-decoration: none;">Xóa</a></td>
                        <td style="font-weight: bold;"><a href="xulysuasach.php?id=<?php echo $row['idsach'];?>" style=" text-decoration: none;">Sửa</a></td>
                    </tr>
                    <?php $i++;
                    }
                ?>
            </tbody>
  
        </table>


    </div>

</div>
<?php
include 'footer.php';
?>