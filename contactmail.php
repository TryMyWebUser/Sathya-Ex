<?php
$subject = "Contact Mail";
$email   = "trymywebsites@gmail.com";
$url="";
$message = '<!DOCTYPE html PUBLIC ">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Contact Mail</title>
</head>
<body>
<h2>Hello Sir / Madam</h2>
<p style="font-size=16px;">Kindly find below the  Contact Details>
</p>
<div style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif;">

<table style="width: 100%;">
      <tr>
        <td></td>
        <td bgcolor="#FFFFFF ">
          <div style="padding: 15px; max-width: 600px;margin: 0 auto;display: block; border-radius: 0px;padding: 0px; border: 1px solid lightseagreen;">           
            <table style="padding: 10px;font-size:18px; width:100%;">
              <tr>
                <td style="padding:10px;font-size:18px; width:100%;">                  
                    <p>Name : '.$_POST['name'].'</p>
                    <p>Email Id : '.$_POST['email'].'</p>
                    <p>Subject: '.$_POST['subject'].'</p>
                     <p>Message: '.$_POST['message'].'</p>                             
                 </td>
              </tr>
            </table>
            </div>

</body>
</html>';
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: Sathya Groups<'.$_POST['email'].'>' . "\r\n";
if(mail($email,$subject,$message,$headers )){
  echo "<script>alert('Email sent successfully!');</script>";
  echo "<script>window.location.href='contact.php';</script>";
}
else{
  echo "<script>alert('Email not sent');</script>";
  echo "<script>window.location.href='contact.php';</script>";
}
?>