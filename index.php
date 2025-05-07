<?php require('includes/config.inc.php'); ?>

<?php
$current = 'work';
?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="I’ve been working in the advertisment industry fot the last 15 years. ">
	<title>Pablo Granadé - Director</title>

	<!-- Favicons -->
	<?php include('includes/favicon.php'); ?>

	<link rel="stylesheet" type="text/css" href="./node_modules/normalize.css/normalize.css">
	<link rel="stylesheet" type="text/css" href="./node_modules/@fortawesome/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./node_modules/aos/dist/aos.css" />
	<link rel="stylesheet" href="./css/app.css">
</head>

<body>

	<!-- Header -->
	<?php include_once("./includes/header.php"); ?>

	<!-- Contenido HOME -->
	<section class="transition home">

		<div class="container">

			<!-- Categorías -->
			<div id="categories" class="row categorias transition filter-button-group">
				<!-- <div class="col-6 col-sm-3">
					<button data-filter="*" class="btn btn-primary btn-category active">ALL</button>
				</div> -->
				<div class="col-6 col-md-3">
					<button data-filter=".commercial" class="btn btn-primary btn-category active">DIRECTOR</button>
				</div>
				<div class="col-6 col-md-3">
					<button data-filter=".creative" class="btn btn-primary btn-category">CREATIVE &amp; SCRIPT</button>
				</div>
			</div>

			<!-- Categorías end -->

			<!-- Proyectos -->
			<?php include_once("./includes/proyectos.php"); ?>

		</div>

	</section>
	<!-- Contenido HOME end -->

	<!-- Modal de video -->
	<div class="modal fade" id="videoModal" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-centered">
			<div class="modal-content bg-dark">
				<div class="modal-body p-0">
					<div
						id="modal-video-container"
						style="position: relative; padding: 56.25% 0 0 0"></div>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->
	<?php include_once("./includes/footer.php"); ?>

	<script type="text/javascript" src="./node_modules/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="./node_modules/isotope-layout/dist/isotope.pkgd.min.js"></script>
	<script type="text/javascript" src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="./node_modules/aos/dist/aos.js"></script>
	<script src="https://player.vimeo.com/api/player.js"></script>
	<script type="text/javascript" src="./js/app.js"></script>
	<script type="text/javascript" src="./js/home.js"></script>

	<script>
		const videoModal = document.getElementById("videoModal");

		videoModal.addEventListener("show.bs.modal", (event) => {
			const button = event.relatedTarget;
			const videoId = button.getAttribute("data-video-id");
			const hash = button.getAttribute("data-hash");

			const iframe = document.createElement("iframe");
			iframe.src = `https://player.vimeo.com/video/${videoId}?h=${hash}&autoplay=1`;
			iframe.setAttribute("frameborder", "0");
			iframe.setAttribute(
				"allow",
				"autoplay; fullscreen; picture-in-picture"
			);
			iframe.setAttribute("allowfullscreen", "");
			iframe.style.position = "absolute";
			iframe.style.top = 0;
			iframe.style.left = 0;
			iframe.style.width = "100%";
			iframe.style.height = "100%";

			document.getElementById("modal-video-container").appendChild(iframe);
		});

		videoModal.addEventListener("hidden.bs.modal", () => {
			document.getElementById("modal-video-container").innerHTML = "";
		});
	</script>

</body>

</html>