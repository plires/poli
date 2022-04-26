<?php

  include('functions.php');
  include('../includes/config.inc.php');
  include('../clases/app.php');
  
	$token = $_POST['token'];
	$action = $_POST['action'];

	$cu = curl_init();
	curl_setopt($cu, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
	curl_setopt($cu, CURLOPT_POST, 1);
	curl_setopt($cu, CURLOPT_POSTFIELDS, http_build_query(array('secret' => RECAPTCHA_KEY_SECRET, 'response' => $token)));
	curl_setopt($cu, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($cu);
	curl_close($cu);

	$datos = json_decode($response, true);

	if($datos['success'] == 1 && $datos['score'] >= 0.5){

		// Verificamos si hay errores en el formulario
	  if (emptyInput($_POST['name'])){
	    $errors['error_name']='Ingresa tu nombre';
	  } else {
	    $name = $_POST['name'];
	  }

	  if (!emailCheck($_POST['email'])){
	    $errors['error_email']='Ingresa el mail :(';
	  } else {
	    $email = $_POST['email'];
	  }

	  if (emptyInput($_POST['comments'])){
	    $errors['error_comments']='Ingresa tu comentario';
	  } else {
	    $comments = $_POST['comments'];
	  }

	  if (!isset($errors)) {

	  	//Enviamos los mails al cliente y usuario
		  $app = new App;

		  //Enviamos los mails al cliente y usuario
		  $sendEmails = $app->prepareEmailFormContacto($_POST);
	  	
		  if ($sendEmails) {

		  	$msg_contacto = 'Mensaje recibido. Le contestaremos a la brevedad. Muchas gracias!';
		    $url = explode("?",$_SERVER['HTTP_REFERER']);

		    header("Location: " . $url[0] ."?msg_contacto=". urlencode($msg_contacto) . "#msg_contacto" );
	  	
	  		exit;

		  } else {

		    $url = explode("?",$_SERVER['HTTP_REFERER']);

		  	$errors['sends'] = 'Error al enviar la consulta, por favor intente nuevamente.';

		  	header("Location: " . $url[0] . "?errors=" . urlencode(serialize($errors)) . "#error");
		  	exit;

		  }

	  } else {

	  	$phone = $_POST['phone'];
	  	$last_name = $_POST['last_name'];
	  	$url = explode("?",$_SERVER['HTTP_REFERER']);

	  	header("Location: " . $url[0] . "?name=$name&email=$email&phone=$phone&last_name=$last_name&comments=$comments&errors=" . urlencode(serialize($errors)) . "#error");
	  	exit;

	  }
	  
  } else {

  	$url = explode("?",$_SERVER['HTTP_REFERER']);

  	$errors['recaptcha'] = 'Error al validar el recaptcha. Por favor intente nuevamente.';

  	header("Location: " . $url[0] . "?errors=" . urlencode(serialize($errors)) . "#error");
  	exit;

	} 