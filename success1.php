<?php
header("Content-Type: text/html; charset=utf-8");
$Name = htmlspecialchars($_POST["name"]);
$tel = htmlspecialchars($_POST["tel"]);
$email = htmlspecialchars($_POST["email"]);

$refferer = getenv('HTTP_REFERER');
$date=date("d.m.y"); // число.месяц.год  
$time=date("H:i"); // часы:минуты:секунды 
$myemail = "snailcares@gmail.com";

$tema = "Новая заявка на консультацию";
$message_to_myemail = "
Добрый день!
<br>
Поступила новая заявка на консультацию по выбору крема. 
<br>
Детали заявки:<br>
Имя: $Name<br>
Телефон: $tel<br>
Источник: $refferer
";
mail($myemail, $tema, $message_to_myemail, "From: SNAILCARES <info@snailcare.ru> \r\n"."MIME-Version: 1.0\r\n"."Content-type: text/html; charset=utf-8\r\n" );
$tema = "Ваша заявка на консультацию оформлена";
$message_to_myemail = "

Добрый день, $Name!
<br>
Ваша заявка на консультацию успешно получена.
<br>
Наши специалисты свяжутся с вами в ближайшее время.
<br>
Спасибо, что выбрали нашу продукцию.
<br>
<br>
$refferer
";
$myemail = $email;
mail($myemail, $tema, $message_to_myemail, "From: SNAILCARES <info@snailcare.ru> \r\n"."MIME-Version: 1.0\r\n"."Content-type: text/html; charset=utf-8\r\n" );


$f = fopen("consultation.xls", "a+");
fwrite($f," <tr>");    
fwrite($f," <td>$name</td> <td>$tel</td> <td>$email</td>   <td>$date / $time</td>");   
fwrite($f," <td>$refferer</td>");    
fwrite($f," </tr>");  
fwrite($f,"\n ");    
fclose($f);


?>
