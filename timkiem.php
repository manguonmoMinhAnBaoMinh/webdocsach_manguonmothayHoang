<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>docsach.net</title>

	<!-- Style CSS -->

	<link rel="stylesheet" href="css/style.css">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script src="js/pdf.js"></script>
	<script src="js/pdf.worker.js"></script>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

<style>
	.span12 {
		margin-top: 25px;
		margin-right: 50px;
		margin-left: 50px;
		margin-bottom: 20px;
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
$search = addslashes($_GET['search']);
$query = "SELECT * FROM sach, theloai, nxb WHERE sach.idnxb = nxb.idnxb AND sach.idtl = theloai.idtl AND sach.tesach like '%$search%'";
$data = mysqli_query($connect, $query);
?>

<body>
	<div id="wrapper">

		<!-- Bat dau header -->
		<?php include('module/body/header.php') ?>
		<!-- Het header -->

		<main id="main" class="site-main">
			<div class="container">
				<div class="wrapper-site-main">
					<div class="row">
						<div class="span12">
							<div>
								<?php while ($row = mysqli_fetch_array($data)) { ?>
									<div class="rowest">
										<div class="xfor">
											<div class="thumbnail1">

												<img src="img/<?php echo $row['hinhanh'] ?>" alt="<?php $row['tesach'] ?>" style="width: 190px;height: 280px;" />
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
												<a target="_blank" class="btn btn-mini btn-success" href="<?php echo $row['pdf'];
																											echo "/index.html" ?>">
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
			</div>
	</div>
	</main>
	<div>
		<!-- Bat dau footer -->
		<?php include('module/body/footer.php') ?>
		<!--Het footer-->
	</div>

</body>

</html>