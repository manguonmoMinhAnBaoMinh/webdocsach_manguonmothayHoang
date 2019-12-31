<?php
include 'header.php';
require "../dbcon.php";
//theloai
$querytl = "SELECT * FROM theloai";

$datatl = mysqli_query($connect, $querytl);
//tacgia
$querysach = "SELECT * FROM sach";

$datasach = mysqli_query($connect, $querysach);

$querysach2 = "SELECT * FROM sach";

$datasach2 = mysqli_query($connect, $querysach2);
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
        <h1>Danh mục sửa sách</h1>
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
            
                $qr= "UPDATE sach set tesach = '" . $_POST['mota'] . "', tacgia = '" . $_POST['tacgia'] . "', idtl = '" . $_POST['theloai'] . "', idnxb = '" . $_POST['nxb'] . "', mota = '" . $_POST['mota'] . "' WHERE idsach = '" . $_GET['id'] . "';"; 
                $result=mysqli_query($connect,$qr) or die("Error query string!");
                if($result){
                    header("Location: ../admin/dmsach.php");
                }
                else {
                    echo "no";
                }               
         }
         ?>
                <form id="product-form" method="POST" action="?action=add" enctype="multipart/form-data">

                    <input type="submit" title="Lưu sản phẩm" value="" />
                    <div class="clear-both"></div>
             <?php 
                  while($rowsach = mysqli_fetch_array($datasach)){
             ?>  
            <div class="wrap-field">
                <label>Tên sách: </label>
                <input type="text" name="tensach" value="<?php echo $rowsach['tesach'];?>" placeholder="Tên sách"/>
                <div class="clear-both"></div>
            </div>
            <br>
            <div class="wrap-field">
                <label>Tác giả: </label>
                <input type="text" name="tacgia" value="<?php echo $rowsach['tacgia'];?>" placeholder="Tên tác giả..."/>
                <div class="clear-both"></div>
            </div>
            <?php }?>  
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
            <?php 
                  while($rowsach1 = mysqli_fetch_array($datasach2)){
             ?>  
            <div class="">
                <label>Mô tả: </label>
                <textarea name="mota" value="<?php echo $rowsach1['mota'];?>" style="margin: 0px;width: 350px; height: 90px;" placeholder="Mô tả..."></textarea>
                <div class="clear-both"></div>
            </div>
            <?php } ?>
     
                </form>

                <div class="clear-both"></div>
        </div>
    </div>

<?php
}
include './footer.php';
?>