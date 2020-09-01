<?php
switch (@$_GET['do'])
 {

 case "send":

      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $femail = $_POST['femail'];
      $fsendmail = $_POST['fsendmail'];
      

    if (!preg_match("/\S+/",$fname))
    {
      unset($_GET['do']);
      $message = "Nombre es requerido. Intente nuevamente.";
      break;
    }
    if (!preg_match("/\S+/",$lname))
    {
      unset($_GET['do']);
      $message = "Apellido es requerido. Intente nuevamente.";
      break;
    }
     
       $myemail = "contacto@kyronsoft.com";
       $emess = "Nombre: ".$fname."\n";
       $emess.= "Apellidos: ".$lname."\n";
       $emess.= "Email 1: ".$femail."\n";
       $emess.= "Comentarios: ".$fsendmail;
       $ehead = "From: ".$femail."\r\n";
       $subj = "Mensaje enviado de ".$fname." ".$lname."!";
       $mailsend=mail("$myemail","$subj","$emess","$ehead");
       $message = "Mensaje Enviado.";
 
       unset($_GET['do']);
       header("location: single.php");
     break;
 
 default: break;
 }
?>