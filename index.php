<?php require ('includes/config.inc.php'); ?>

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
	<link rel="stylesheet" type="text/css" href="./node_modules/aos/dist/aos.css"/>
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
					<button data-filter=".commercial" class="btn btn-primary btn-category">DIRECTOR</button>
				</div>
				<div class="col-6 col-md-3">
					<button data-filter=".creative" class="btn btn-primary btn-category">CREATIVE &amp; SCRIPT</button>
				</div>
				<!-- <div class="col-6 col-sm-3">
					<button data-filter=".narrative" class="btn btn-primary btn-category">NARRATIVE</button>
				</div> -->
			</div>
			
			<!-- Categorías end -->

			<!-- Proyectos -->
			<?php include_once("./includes/proyectos.php"); ?>

		</div>

	</section>
	<!-- Contenido HOME end -->

	<!-- Proyectos Modal -->
	<?php 
		include_once("./includes/proyectos-modal/proyecto-a.php");
		include_once("./includes/proyectos-modal/proyecto-b.php");
		include_once("./includes/proyectos-modal/proyecto-c.php");
		include_once("./includes/proyectos-modal/proyecto-d.php");
		include_once("./includes/proyectos-modal/proyecto-e.php");
		include_once("./includes/proyectos-modal/proyecto-f.php");
		include_once("./includes/proyectos-modal/proyecto-g.php");
		include_once("./includes/proyectos-modal/proyecto-h.php");
		include_once("./includes/proyectos-modal/proyecto-i.php");
		include_once("./includes/proyectos-modal/proyecto-j.php");
		include_once("./includes/proyectos-modal/proyecto-k.php");
		include_once("./includes/proyectos-modal/proyecto-l.php");
		include_once("./includes/proyectos-modal/proyecto-fernet.php");
		include_once("./includes/proyectos-modal/proyecto-halls.php");
		include_once("./includes/proyectos-modal/proyecto-powerade.php");
	?>

	<!-- Footer -->
	<?php include_once("./includes/footer.php"); ?>

	<script type="text/javascript" src="./node_modules/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="./node_modules/isotope-layout/dist/isotope.pkgd.min.js"></script>
	<script type="text/javascript" src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="./node_modules/aos/dist/aos.js"></script>
	<script src="https://player.vimeo.com/api/player.js"></script>
	<script type="text/javascript" src="./js/app.js"></script>
	<script type="text/javascript" src="./js/home.js"></script>

</body>

</html>