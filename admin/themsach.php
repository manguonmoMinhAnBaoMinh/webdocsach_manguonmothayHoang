<?php
include 'header.php';
require "../dbcon.php";
//theloai
$querytl = "SELECT * FROM theloai";

$datatl = mysqli_query($connect, $querytl);
//tacgia
$querytg = "SELECT * FROM tacgia";

$datatg = mysqli_query($connect, $querytg);
//nxb
$querynxb = "SELECT * FROM nxb";

$datanxb = mysqli_query($connect, $querynxb);
if (!empty($_SESSION['current_user'])) {
?>

    <style>
        .item_select {
            padding-left: 9;
            padding-top: 9px;
            padding-bottom: 9px;
        }
    </style>

    <div class="main-content">
        <h1>Thêm sản phẩm</h1>
        <div id="content-box">
            <?php
            if (isset($_GET['action']) && $_GET['action'] == 'add') {


                $hinhanh=$_FILES['hinhanh']['name'];
                $hinhanh_tmp=$_FILES['hinhanh']['tmp_name'];
                move_uploaded_file($hinhanh_tmp,'../img/'.$hinhanh);
              
                $folder_path = '../pdf/';
                $filename = basename($_FILES['filesach']['name']);
                $newname = $folder_path . $filename;
                move_uploaded_file($_FILES['filesach']['tmp_name'], $newname);
            
                $qr= "INSERT INTO `sach` (`mota`, `tesach`, `hinhanh`, `pdf`, `idnxb`, `idtl`, `idtg`) VALUES ('" . $_POST['mota'] . "', '" . $_POST['tensach'] . "', '$hinhanh', '$filename', '" . $_POST['nxb'] . "', '" . $_POST['theloai'] . "', '" . $_POST['tacgia'] . "');"; 
                $result=mysqli_query($connect,$qr) or die("Error query string!");
                if($result){
                    header("Location: ../admin/dmsach.php");
                }
                else {
                    echo "no";
                }
                
         }?>
                <form id="product-form" method="POST" action="?action=add" enctype="multipart/form-data">

                    <input type="submit" title="Lưu sản phẩm" value="" />
                    <div class="clear-both"></div>

               
            <div class="wrap-field">
                <label>Tên sách: </label>
                <input type="text" name="tensach" value="" placeholder="Tên sách..."/>
                <div class="clear-both"></div>
            </div>

            <div class="wrap-field">
                <label>File sách: </label>
                <div class="right-wrap-field">
                    <input type="file" name="filesach" />
                </div>
                <div class="clear-both"></div>
            </div>

            <div class="wrap-field">
                <label>Ảnh bìa: </label>
                <div class="right-wrap-field">
                    <input type="file" name="hinhanh" />
                </div>
                <div class="clear-both"></div>
            </div>

            <br>

            <div class="wrap-field">
                <label>Thể loại </label>
                <div class="right-wrap-field">
                    <Select name="theloai" class="item_select">
                        <?php while ($rowtl = mysqli_fetch_array($datatl)) {
                        ?>
                            <option value="<?php echo $rowtl['idtl']; ?>">
                                <?php echo $rowtl['tentheloai']; ?></option>
                        <?php } ?>
                    </Select>
                </div>
                <div class="clear-both"></div>
            </div>

            <br>

            <div class="wrap-field">
                <label>Nhà xuất bản:</label>
                <div class="right-wrap-field">
                    <Select name="nxb" class="item_select">
                        <?php while ($rownxb = mysqli_fetch_array($datanxb)) {
                        ?>
                            <option value="<?php echo $rownxb['idnxb']; ?>">
                                <?php echo $rownxb['nxb']; ?></option>
                        <?php } ?>
                    </Select>
                </div>
                <div class="clear-both"></div>
            </div>

            <br>

            <div class="wrap-field">
                <label>Tác giả: </label>
                <input type="text" name="tacgia" value="" placeholder="Tên tác giả..."/>
                <div class="clear-both"></div>
            </div>

            <br>

            <div class="">
                <label>Mô tả: </label>
                <textarea name="mota" style="margin: 0px;width: 350px; height: 90px;" placeholder="Mô tả..."></textarea>
                <div class="clear-both"></div>
            </div>


                </form>

                <div class="clear-both"></div>
        </div>
    </div>

<?php
}
include './footer.php';
?>