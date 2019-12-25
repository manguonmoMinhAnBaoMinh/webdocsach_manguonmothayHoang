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
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

<style>

</style>

<body>
	<div id="wrapper">

		<!-- Bat dau header -->
		<?php include('module/body/header.php') ?>
		<!-- Het header -->

		<main id="main" class="site-main">
			<div class="container">
				<div class="wrapper-site-main">
					<!-- row -->
					<div class="row">

						<div class="col-md-3">
							<div class="sidebar">
							<!-- thong tin the loai -->
							<?php include('module/left/thongtintheloai.php')?>
							<!-- ket thuc thong tin the loai-->
							</div>
						</div>

						<!-- menu sach -->
						<div class="col-md-9">
							<?php include('module/right/sachtheloai.php'); ?>
						</div>
						<!-- menu sach -->
						<!-- het row -->
					</div>
				</div>
			</div>
		</main>

		<!-- Bat dau footer -->
		<?php include ('module/body/footer.php') ?>
		<!--Het footer-->

	</div>
</body>

</html>
<script type="text/javascript">
	$(document).ready(function() {

		$('#itemslider').carousel({
			interval: 3000
		});

		$('.carousel-showmanymoveone .item').each(function() {
			var itemToClone = $(this);

			for (var i = 1; i < 6; i++) {
				itemToClone = itemToClone.next();

				if (!itemToClone.length) {
					itemToClone = $(this).siblings(':first');
				}

				itemToClone.children(':first-child').clone()
					.addClass("cloneditem-" + (i))
					.appendTo($(this));
			}
		});
	});
</script>