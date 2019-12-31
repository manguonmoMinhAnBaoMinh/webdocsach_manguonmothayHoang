<style>
	.span12 {
		margin-top: 25px;
		margin-right: 50px;
		margin-left: 50px;
	}

	.xfor {
		text-align: center;
	}

	.thumbnail1 img {
		border: 2px solid black;
		margin-bottom: 5px;
	}

	.thumbnail1 {
		margin-bottom: 10px;
	}


	.hide-x {
		display: none;
	}
</style>
<?php
require "dbcon.php";
$query = "SELECT * FROM sach, theloai, nxb WHERE idsach = '" . $_GET['id'] . "' AND sach.idnxb = nxb.idnxb AND sach.idtl = theloai.idtl";
$data = mysqli_query($connect, $query);
?>

<div class="container">
	<div class="row">
		<div class="span12">
			<div>
				<?php while ($row = mysqli_fetch_array($data)) { ?>
					<div class="rowest">
						<div class="xfor">
							<div class="thumbnail1">

								<img src="img/<?php echo $row['hinhanh'] ?>" alt="<?php $row['tesach']?>" style="width: 190px;height: 280px;" />
							</div>
							<div class="lww">
								<h2><?php echo $row['tesach'] ?></h2>
								<p>
									<span class="xleft">Tác Giả: <?php echo $row['tacgia']; ?></span>
									<span>&nbsp;</span>
								</p>
								<p>
									<span class="xleft">Thể Loại: <?php echo $row['tentheloai'] ?></span>

								</p>
							</div>
						</div>

						<div class="rofx">
							<div style="display: block;margin: 5px auto;text-align: center;">
								<a  target="_blank"  class="btn btn-mini btn-success" href="<?php echo $row['pdf'];echo "/index.html"?>">
									<i class="icon-play icon-white"></i> Đọc truyện</a>
							</div>
							<div id="desc_story">
								<h4 style="font-weight: bold;">Giới Thiệu Truyện</h4>
								<p><?php echo $row['mota'] ?></p>

							</div>

							<div class="showmore"><a href="javascript:void(0)" class="btn btn-info btn-mini" onclick="$('#desc_story').css('height','auto');$('.showmore').hide()">Xem thêm »</a></div>

						</div>
					<?php } ?>
					<div class="clearfix"></div>

					</div>
			</div>

			<div class="clearfix"></div>

		</div>
	</div>
</div>