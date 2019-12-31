<style>
.h3name{
	margin-left: 30px;
}
.hide-x{
	display: none;
}
</style>

<?php
require "dbcon.php";

$query = "SELECT * from sach, theloai where sach.idtl=theloai.idtl and theloai.idtl = '" . $_GET['id'] . "'";

$data = mysqli_query($connect, $query);

$query2 = "SELECT * FROM theloai where idtl= '" . $_GET['id'] . "' ";

$data2 = mysqli_query($connect, $query2);
 
?>


<div>

<h3 class="h3name">Thể loại: <?php while($row = mysqli_fetch_array($data2)){ echo $row['tentheloai'];}?> </h3>
<hr>

<?php  $i = 1; while($row2 = mysqli_fetch_array($data)){ ?>
	
            <div class="product">
                <div class="image-feature-product">
                    <a href="index.php?xem=a&id=<?php echo $row2['idsach'] ?>"><img src="img/<?php echo $row2['hinhanh']; ?>" alt="<?php $row2['tesach']; ?>"></a>
                </div>
                <div class="info-product">
                    <h4 class="title-product">
                        <a href="#">
                            <p style=" text-align: center;width: 180px; overflow: hidden;white-space: nowrap; text-overflow: ellipsis;"><?php echo $row2['tesach']; ?></p>
                        </a>
                    </h4>
                </div>
			</div>
			
			
        </div>
<?php $i++; } ?>
		</div>
