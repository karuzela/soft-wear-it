<?php
  init();

  include_once('library/Validators.php');

  require 'vendor/autoload.php';

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

  

  $validated_data = $gump->run($post);

  if($validated_data === false) {
      $resp['errors'] = $gump->get_readable_errors(false);
      render($resp);
  } 


  if(empty($files['cv']) || $files['cv']['error']){
    $resp['errors'] = [' <p class="gump-error-message"><span class="gump-field">CV pole obowiązkowe.</span></p>'];
    render($resp);
  }

  if($files['cv']['type'] != 'application/pdf'){
    $resp['errors'] = [' <p class="gump-error-message"><span class="gump-field">CV musi być w formacie PDF</span></p>'];
    render($resp);
  }


  if($files['cv']['size'] > 5242880){
    $resp['errors'] = [' <p class="gump-error-message"><span class="gump-field">CV może mieć maksymalnie 5MB</span></p>'];
    render($resp);
  }

  $newFileName = 'uploads/' . md5(rand(0,999)) . '-' . $files['cv']['name'];
  move_uploaded_file($files['cv']['tmp_name'], $newFileName);


  // send confirmation mail to user
  // send mail with collected data

  $domain = 'htttp://softwear.it/';
  $operatorEmail = 'softwearit@connectis.pl';
  $fileUrl = $domain . $newFileName;


  $html = '<p>Dziękujemy za zgłoszenie. Niebawem otrzymasz test, a gdy go rozwiążesz, koszulka będzie Twoja!</p>';
  $mail = sendEmail($post['email'], 'Potwierdzamy dokonanie zgłoszenia',$html);

  $html = '<p> Następująca osoba wysłała zgłoszenie</p>
           Link do CV: <a href="' . $fileUrl  . '">' . $fileUrl . '</a><br>
           Rozmiar koszulki: ' . $post['size'] . '<br>
           Rodzaj koszulki: ' . $post['type'] . '<br>
           Email: ' . $post['email'] . '<br>
           Zgoda: ' . $post['agreement'] . '<br>
  </p>';

  $mail2 = sendEmail($operatorEmail, "Dane zgłoszeniowe uczestnika akcji", $html);


  if($mail && $mail2){
    $resp['status'] = 1;
  } else {
     $resp['errors'] = [' <p class="gump-error-message"><span class="gump-field">Coś poszło nie tak!</span></p>'];
  }

  render($resp);

  function render($a){

    $resp = json_encode($a);

    $translationsKeys = [
      'Size',
      'Agreement'
    ];

    $translationsValues = [
      'rozmiar t-shirtu',
      'akcept regulaminu'
    ];

    $translatedResp = str_replace($translationsKeys, $translationsValues, $resp);

    echo $translatedResp;
    exit;
  }

  function sendEmail($to, $topic, $html){

    $vFrom = 'do-not-reply@softwear.it';
    $fromName = 'Soft Wear It';
    $apiKey = '';


    $from = new SendGrid\Email(null, $vFrom);
    $subject = $topic;
    $to = new SendGrid\Email(null, $to);
    $content = new SendGrid\Content("text/html", $html);
    $mail = new SendGrid\Mail($from, $topic, $to, $content);

    $sg = new \SendGrid($apiKey);
    $response = $sg->client->mail()->send()->post($mail);
    if($response->statusCode() == "202"){
      return true;
    }



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
