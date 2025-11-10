<?php
  /**
  * Contact Form Handler
  * Compatible with BootstrapMade templates using PHP Email Form
  */

  // Cambia este correo por el tuyo real:
  $receiving_email_address = 'josecar400@gmail.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Si deseas usar SMTP, descomenta y completa con tus credenciales
  /*
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  // Mensaje principal
  $contact->add_message( $_POST['name'], 'Nombre');
  $contact->add_message( $_POST['email'], 'Email');
  if (!empty($_POST['phone'])) {
    $contact->add_message( $_POST['phone'], 'Teléfono');
  }
  if (!empty($_POST['contact_preference'])) {
    $contact->add_message( $_POST['contact_preference'], 'Preferencia de contacto');
  }
  if (!empty($_POST['goal'])) {
    $contact->add_message( $_POST['goal'], 'Objetivo principal');
  }
  if (!empty($_POST['activity_level'])) {
    $contact->add_message( $_POST['activity_level'], 'Nivel de actividad física');
  }
  if (!empty($_POST['source'])) {
    $contact->add_message( $_POST['source'], 'Fuente');
  }
  $contact->add_message( $_POST['message'], 'Mensaje', 10);

  echo $contact->send();
?>
