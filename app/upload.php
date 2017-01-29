<?php
  init();

  include_once('library/Validators.php');
  include_once('library/PHPMailer.php');

  $gump = new GUMP();
  $resp = ['status'=>0];


  $post = $gump->sanitize($_POST);
  $files = $_FILES;


  $gump->validation_rules(array(
    'email' => 'required|valid_email',
      'agreement' => 'required',
      'tshirt-size' => 'required',
      'type' => 'required'
  ));


  $validated_data = $gump->run($post);

  if($validated_data === false) {
      $resp['errors'] = $gump->get_readable_errors(false);
      render($resp);
  } 

  if(empty($files['cv']) || $files['cv']['error']){
    $resp['errors'] = ['The <span class="gump-field">CV</span> jest wymagane.'];
    render($resp);
  }

  if($files['cv']['type'] != 'application/pdf'){
    $resp['errors'] = ['The <span class="gump-field">CV</span>musi być pdfem'];
    render($resp);
  }


  if($files['cv']['size'] > 5242880){
    $resp['errors'] = ['The <span class="gump-field">CV</span> moze miec maksymalnie 5mb'];
    render($resp);
  }

  $newFileName = 'uploads/' . md5(rand(0,999)) . '-' . $files['cv']['name'];
  move_uploaded_file($files['cv']['tmp_name'], $newFileName);


  // send confirmation mail to user
  // send mail with collected data

  $domain = 'http://localhost/soft-wear-it/app/';
  $fromEmail = 'soft@wear.it';
  $fromName = 'Soft Wear It';
  $operatorEmail = 'monika@krauze.com';
  $fileUrl = $domain . $newFileName;

  // confirmation mail

  $mail = new PHPMailer;
  $mail->isSendmail();
  $mail->setFrom($fromEmail, $fromName);
  $mail->addAddress($post['email']);
  $mail->Subject = "Potwierdzenie zgłoszenia";
  $mail->msgHTML('<p>Dziękujemy za zgłoszenie. Niebawem otrzymasz test, a gdy go rozwiażesz, koszulka będzie już Twoja!</p>');
  $mail->AltBody = 'Potwierdzamy dokonanie zgłoszenia';
  $mail->send();

  // email do opearatora

  $mail2 = new PHPMailer;
  $mail2->isSendmail();
  $mail2->setFrom($fromEmail, $fromName);
  $mail2->addAddress($operatorEmail);
  $mail2->Subject = "Dane zgłoszeniowe uczestnika akcji";
  $mail2->msgHTML('<p> Następująca osoba wysłała zgłoszenie <a href=' . $fileUrl  . '>' . $fileUrl . '</a></p>');
  $mail2->send();

  if($mail->send() && $mail2->send()){
    $resp['status'] = 1;
    render($resp);
  }

  render($resp);

  
  function render($a){
    echo json_encode($a); 
    exit;
  }

  
  function init(){
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    date_default_timezone_set('Europe/Warsaw');      
    header('Content-Type: application/json; charset=UTF-8'); 
    ob_start();        
      session_start();      
      session_regenerate_id();
  }
?>
