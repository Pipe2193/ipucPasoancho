<?php
	error_reporting(0);
	// check if fields passed are empty
	if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message']) || !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
		
	}
		
	$email_address = $_POST['email'];
		
	// create email body and send it	
	$to = 'ipucpasoanchocali@gmail.com'; // put your email
	$email_subject = "formulario de Suscripcion Ingresado por: $email_address";
	$email_body = "Tienes un nuevo Mensaje. \n\n".
					  " Aqui Estan los Detalles:\n".
					  "Email: $email_address\n";
	$headers = "From: ".$to."\n";
	$headers .= "Reply-To: $email_address";	
	mail($to,$email_subject,$email_body,$headers);
	
	die();			
?>