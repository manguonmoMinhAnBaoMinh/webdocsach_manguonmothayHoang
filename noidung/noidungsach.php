<style type="text/css">
#pdf-main-container 
{
	text-align: center;
}

#pdf-loader 
{
	display: none;
	
	color: #999999;
	font-size: 13px;

}

#pdf-contents 
{
	display: none;
}
#pdf-contents canvas
{
	width: 70%;
}

#pdf-meta 
{
	overflow: hidden;
	margin: 0 0 20px 0;
}

#pdf-buttons 
{
	text-align: center;
	margin-top: 5px;
}

#page-count-container 
{
	margin-top: 3px;
	text-align: center;
}

#pdf-current-page 
{
	display: inline;
}

#pdf-total-pages 
{
	display: inline;
}

#pdf-canvas 
{
	border: 1px solid rgba(0,0,0,0.2);

}

#page-loader 
{
	height: 100px;
	line-height: 100px;
	text-align: center;
	display: none;

	font-size: 13px;
}
.site-footer
{
	display: none;
}

</style>

<?php
require "dbcon.php";

$query = "SELECT * FROM sach WHERE idsach = '" . $_GET['id'] ."' ";

$data = mysqli_query($connect, $query);

$i = 0;

while ($row = mysqli_fetch_array($data)) {
    $name = $row['pdf'];
    $urls = "pdf/$name"; 
?>
<div id="pdf-main-container">
	<h1><?php echo $row['tesach']?></h1>
	<h3>Tác giả: <?php echo $row['tacgia']?></h3>
	<div id="pdf-loader">Loading document ...</div>
	<div id="pdf-contents">
		<div id="pdf-meta">
			<div id="pdf-buttons">
				<button id="pdf-prev">Trang trước</button>
				<button id="pdf-next">Trang tiếp</button>
				<button id="pdf-next">Tải xuống</button>
			</div>
			<div id="page-count-container">Trang <div id="pdf-current-page"></div> của <div id="pdf-total-pages"></div></div>
			<div><i>Bạn có thể tải trên điện thoại để xem rõ hơn</i></div>
			
		</div>
		<canvas id="pdf-canvas"></canvas>
		<div id="page-loader">Loading page ...</div>
		
	</div>
</div>
<?php }?>

<script>
var __PDF_DOC,
	__CURRENT_PAGE,
	__TOTAL_PAGES,
	__PAGE_RENDERING_IN_PROGRESS = 0,
	__CANVAS = $("#pdf-canvas").get(0),
	__CANVAS_CTX = __CANVAS.getContext('2d');
	$bien = 
showPDF(<?php echo json_encode($urls)?>);

function showPDF(pdf_url) {
	$("#pdf-loader").show();

	PDFJS.getDocument({ url: pdf_url }).then(function(pdf_doc) {
		__PDF_DOC = pdf_doc;
		__TOTAL_PAGES = __PDF_DOC.numPages;
		
		// Hide the pdf loader and show pdf container in HTML
		$("#pdf-loader").hide();
		$("#pdf-contents").show();
		$("#pdf-total-pages").text(__TOTAL_PAGES);

		// Show the first page
		showPage(1);
	}).catch(function(error) {
		alert(error.message);
	});;
}

function showPage(page_no) {
	__PAGE_RENDERING_IN_PROGRESS = 1;
	__CURRENT_PAGE = page_no;

	// Disable Prev & Next buttons while page is being loaded
	$("#pdf-next, #pdf-prev").attr('disabled', 'disabled');

	// While page is being rendered hide the canvas and show a loading message
	$("#pdf-canvas").hide();
	$("#page-loader").show();

	// Update current page in HTML
	$("#pdf-current-page").text(page_no);
	
	// Fetch the page
	__PDF_DOC.getPage(page_no).then(function(page) {
		// As the canvas is of a fixed width we need to set the scale of the viewport accordingly
		var scale_required = __CANVAS.width / page.getViewport(1).width;

		// Get viewport of the page at required scale
		var viewport = page.getViewport(scale_required);

		// Set canvas height
		__CANVAS.height = viewport.height;

		var renderContext = {
			canvasContext: __CANVAS_CTX,
			viewport: viewport
		};
		
		// Render the page contents in the canvas
		page.render(renderContext).then(function() {
			__PAGE_RENDERING_IN_PROGRESS = 0;

			// Re-enable Prev & Next buttons
			$("#pdf-next, #pdf-prev").removeAttr('disabled');

			// Show the canvas and hide the page loader
			$("#pdf-canvas").show();
			$("#page-loader").hide();
		});
	});
}

// Previous page of the PDF
$("#pdf-prev").on('click', function() {
	if(__CURRENT_PAGE != 1)
		showPage(--__CURRENT_PAGE);
});

// Next page of the PDF
$("#pdf-next").on('click', function() {
	if(__CURRENT_PAGE != __TOTAL_PAGES)
		showPage(++__CURRENT_PAGE);
});

</script> 
