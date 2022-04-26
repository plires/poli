<?php

  include('includes/config.inc.php');

  $current = 'contact'; 

  if (isset($_GET['name'])) {
    $name = $_GET['name'];
  } else {
    $name = '';
  }

  if (isset($_GET['last_name'])) {
    $last_name = $_GET['last_name'];
  } else {
    $last_name = '';
  }

  if (isset($_GET['email'])) {
    $email = $_GET['email'];
  } else {
    $email = '';
  }

  if (isset($_GET['phone'])) {
    $phone = $_GET['phone'];
  } else {
    $phone = '';
  }

  if (isset($_GET['comments'])) {
    $comments = $_GET['comments'];
  } else {
    $comments = '';
  }

  if (isset($_GET['errors'])) {

    $errors = unserialize(urldecode($_GET['errors']));
  } else {
    $errors = '';
  }

  if (isset($_GET['msg_contacto'])) {
    $msg_contacto = urldecode($_GET['msg_contacto']);
  } 

?>

<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="I’ve been working in the advertisment industry fot the last 15 years. Contact.">
	<title>Pablo Granadé - Director. Contact</title>

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

	<!-- Contenido CONTACTO -->
	<section class="transition contacto">

		<div class="container">

			<!-- Contacto -->
			<div class="row contacto">

				<div class="col-md-4 col-lg-3 datos">

					<div data-aos="fade-up" class="content_header">
						<h1>Pablo granadé</h1>
						<p>
							I’ve been working in the advertisment industry fot the last 15 years. 
						</p>
						<p>
							I started as a Creative Art Director and worked in agencies like Grey, DDB, JWT, El Cielo (From Agulla y Baccetti). After 9 years I began another journey filming documentaries and working as a freelance creative.
						</p>
						<p>
							Nowadays, I also work as a commercial and film director, represented by Rebolucion.
						</p>	
					</div>

					<div data-aos="fade-up" class="content_footer">
						<a 
							class="transition" 
							rel="noopener" 
							target="_blank" 
							href="tel:5491149732844"><span>Phone number /</span> +54 911 4973 2844
						</a> <br>
						<a 
							class="transition" 
							rel="noopener" 
							target="_blank" 
							href="mailto:pablogranade@gmail.com"><span>E-mail /</span> pablogranade@gmail.com
						</a> <br>
						<a 
							class="transition" 
							rel="noopener" 
							target="_blank" 
							href="http://www.rebolucion.com/">
							<img class="img-fluid rebolucion_contact transition" src="./img/rebolucion-contact.png" alt="rebolucion contacto"> <br>
							Rep.latam: Rebolucion
						</a>
					</div>

				</div>

				<div class="col-md-7 offset-md-1 col-lg-8 offset-lg-1 formulario">

					<!-- Mensaje Exito -->
		      <?php if (isset($msg_contacto)): ?>
		        <div id="msg_contacto" class="alert alert-success alert-dismissible fade show" role="alert">
		          <strong>¡Datos recibidos!</strong>
		          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		          <ul style="padding: 0;">
		              <li>- <?php echo $msg_contacto; ?></li>
		          </ul>
		        </div>
		      <?php endif ?>
		      <!-- Mensaje Exito end -->

		      <!-- Errores Formulario -->
		      <?php if ($errors): ?>

		        <div id="error" class="alert alert-danger alert-dismissible fade show" role="alert">
		          <strong>¡Por favor verificá los datos!</strong>
		          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		          <ul style="padding: 0;">
		            <?php foreach ($errors as $error) { ?>
		              <li>- <?php echo $error; ?></li>
		            <?php } ?>
		          </ul>
		        </div>

		      <?php endif ?>
		      <!-- Errores Formulario end -->
					
					<form data-aos="fade-up" id="form-contacto" action="./php/validate-form.php" method="post" class="needs-validation" novalidate>

						<input name="origin" type="hidden" value="Contact Form">

						<div class="row">
							
							<!-- Nombre -->
							<div class="col-md-6">
							  <div class="mb-3">
							    <label for="name" class="form-label">Name</label>
							    <input 
							    	required 
							    	type="text" 
							    	class="form-control" 
							    	name="name" 
							    	value="<?= $name ?>" 
							    	aria-describedby="nameHelp">
							    <div class="invalid-feedback">
				            enter your name
				          </div>
							  </div>
							</div>
							<!-- Nombre end -->

							<!-- Apellido -->
							<div class="col-md-6">
							  <div class="mb-3">
							    <label for="last_name" class="form-label">Last Name</label>
							    <input 
							    	type="text" 
							    	class="form-control" 
							    	name="last_name" 
							    	value="<?= $last_name ?>" 
							    	aria-describedby="last_nameHelp">
							  </div>
							</div>
							<!-- Apellido end -->

						</div>

						<div class="row">
							
							<!-- Email -->
							<div class="col-md-6">
							  <div class="mb-3">
							    <label for="email" class="form-label">Email</label>
							    <input 
							    	required 
							    	type="email" 
							    	class="form-control" 
							    	name="email" 
							    	value="<?= $email ?>"
							    	aria-describedby="emailHelp">
							    <div class="invalid-feedback">
				            enter your email
				          </div>
							  </div>
							</div>
							<!-- Email end -->

							<!-- Teléfono -->
							<div class="col-md-6">
							  <div class="mb-3">
							    <label for="phone" class="form-label">Phone</label>
							    <input 
							    	type="text" 
							    	class="form-control" 
							    	name="phone" 
							    	value="<?= $phone ?>"
							    	aria-describedby="phoneHelp">
							  </div>
							</div>
							<!-- Teléfono end -->

						</div>

						<div class="row">
							
							<!-- Comments -->
							<div class="col-md-12">
							  <div class="mb-3">
							    <label for="comments" class="form-label">Message</label>
							    <textarea required rows="4" class="form-control" name="comments" aria-describedby="commentsHelp"><?= $comments ?></textarea>
							    <div class="invalid-feedback">
				            enter your comments
				          </div>
							  </div>
							</div>
							<!-- Comments end -->

						</div>

					  <button type="button" id="send" class="btn btn-primary">Send Message</button>

					</form>

				</div>

			</div>
			<!-- Contacto end -->

		</div>

	</section>
	<!-- Contenido CONTACTO end -->

	<!-- Footer -->
	<?php include_once("./includes/footer.php"); ?>

	<script type="text/javascript" src="./node_modules/jquery/dist/jquery.min.js"></script>
	<script src="https://www.google.com/recaptcha/api.js?render=<?= RECAPTCHA_KEY_SITE ?>"></script>
	<script type="text/javascript" src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="./node_modules/aos/dist/aos.js"></script>
	<script type="text/javascript" src="./js/app.js"></script>
	<script type="text/javascript" src="./js/formsContact.js"></script>

</body>

</html>