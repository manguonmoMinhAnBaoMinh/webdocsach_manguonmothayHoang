<?php
require "dbcon.php";

$query = "SELECT * from sach, theloai where sach.idtl = theloai.idtl";

$data = mysqli_query($connect, $query);

$i = 1;

while ($row = mysqli_fetch_array($data)) {
    $name = $row['tesach'];
    $urls = "pdf/$name";
?>

    <div>

        <div class="col-md-3 flex-col" style="margin-top: 15px">
            <div class="product">
                <div class="image-feature-product">
                    <a href="index.php?xem=a&id=<?php echo $row['idsach'] ?>"><img src="img/<?php echo $row['hinhanh']; ?>" alt="<?php $row['tesach']; ?>"></a>
                </div>
                <div class="info-product">
                    <h4 class="title-product">
                        <a href="#">
                            <p style=" text-align: center;width: 180px; overflow: hidden;white-space: nowrap; text-overflow: ellipsis;"><?php echo $row['tesach']; ?></p>
                        </a>
                    </h4>
                </div>
            </div>
        </div>

    <?php $i++;
} ?>
    </div>