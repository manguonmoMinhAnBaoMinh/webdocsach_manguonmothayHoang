<?php
require "dbcon.php";

$query = "SELECT * from sach, theloai where sach.idtl=theloai.idtl";

$data = mysqli_query($connect, $query);

?>

<div>

	<!-- <div class="headding-products">
		<h4>thể loại tâm lý</h4>
	</div> -->


	<div class="col-md-3 flex-col" style="margin-top: 15px">
		<div class="product">
			<div class="image-feature-product">
				<img src="images/tranh-kinh-op-bep-13.jpg">
			</div>
			<div class="info-product">
				<h4 class="title-product">
					<a href="#">Những trang sách hay nhất</a>
				</h4>
			</div>
		</div>
	</div>

</div>