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
      'size' => 'required',
      'type' => 'required'
  ));

  $errors = str_replace('size', 'rozmiar t-shirtu', $errors);
  $errors = str_replace('agreement', 'akcept regulaminu', $errors);


  $validated_data = $gump->run($post);

  if($validated_data === false) {
      $resp['errors'] = $gump->get_readable_errors(false);
      render($resp);
  } 

  if(empty($files['cv']) || $files['cv']['error']){
    $resp['errors'] = ['The <p class="gump-field">CV</p> pole obowiązkowe.'];
    render($resp);
  }

  if($files['cv']['type'] != 'application/pdf'){
    $resp['errors'] = ['<p class="gump-field">CV</p> musi być w formacie PDF</p>'];
    render($resp);
  }


  if($files['cv']['size'] > 5242880){
    $resp['errors'] = ['<p class="gump-field">CV</p> może mieć maksymalnie 5MB'];
    render($resp);
  }

  $newFileName = 'uploads/' . md5(rand(0,999)) . '-' . $files['cv']['name'];
  move_uploaded_file($files['cv']['tmp_name'], $newFileName);


  // send confirmation mail to user
  // send mail with collected data

  $domain = 'softwear.it';
  $fromEmail = 'do-not-reply@softwear.it';
  $fromName = 'Soft Wear It';
  $operatorEmail = 'softwearit@connectis.pl';
  $fileUrl = $domain . $newFileName;

  // confirmation mail

  $mail = new PHPMailer;
  $mail->isSendmail();
  $mail->setFrom($fromEmail, $fromName);
  $mail->addAddress($post['email']);
  $mail->Subject = "Potwierdzenie zgłoszenia";
  $mail->msgHTML('<p>Dziękujemy za zgłoszenie. Niebawem otrzymasz test, a gdy go rozwiążesz, koszulka będzie Twoja!</p>');
  $mail->AltBody = 'Potwierdzamy dokonanie zgłoszenia';
  $mail->send();

  // mail with collected data


  $html = '<p> Następująca osoba wysłała zgłoszenie</p>
           Link do CV: <a href="' . $fileUrl  . '">' . $fileUrl . '</a><br>
           Rozmiar koszulki: ' . $post['rozmiar koszulki'] . '<br>
           Rodzaj koszulki: ' . $post['type'] . '<br>
           Email: ' . $post['email'] . '<br>
           Zgoda: ' . $post['akcept regulaminu'] . '<br>
  </p>';
  

  $mail2 = new PHPMailer;
  $mail2->isSendmail();
  $mail2->setFrom($fromEmail, $fromName);
  $mail2->addAddress($operatorEmail);
  $mail2->Subject = "Dane zgłoszeniowe uczestnika akcji";
  $mail2->msgHTML($html);
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
