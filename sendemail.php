<?php

	header('Content-type: application/json');
	$status = array(
		'type'=>'OK',
		'message'=>'En breve te contamos lo que sea '
	);

    $name = @trim(stripslashes($_POST['name'])); 
    $email = @trim(stripslashes($_POST['email'])); 
    $subject = @trim(stripslashes($_POST['subject'])); 
    $message = @trim(stripslashes($_POST['message'])); 

    $email_from = $email;
    $email_to = 'jredondo@nomastickets.com';//replace with your email

    $body = 'Name: ' . $name . "\n\n" . 'Email: ' . $email . "\n\n" . 'Subject: ' . $subject . "\n\n" . 'Message: ' . $message;

    $success = @mail($email_to, $subject, $body, 'From: <'.$email_from.'>');

    if($success)
		echo json_encode($status);
	else
		echo json_encode(array(
			'type'=>'KO',
			'message'=>'Ha habido un problema'
		));
    die;