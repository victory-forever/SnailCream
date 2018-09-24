<?php
header("Content-Type: text/html; charset=utf-8");
$email = htmlspecialchars($_POST["email"]);
$Name = htmlspecialchars($_POST["name"]);
$tel = htmlspecialchars($_POST["tel"]);
$blue = htmlspecialchars($_POST["wrinkles"]);
$purple = htmlspecialchars($_POST["acne"]);
$green = htmlspecialchars($_POST["moisturizing"]);

$refferer = getenv('HTTP_REFERER');
$date=date("d.m.y"); // число.месяц.год  
$time=date("H:i"); // часы:минуты:секунды 
$myemail = "snailcares@gmail.com";

$tema = "Новая заявка на покупку крема";
$message_to_myemail = "
Добрый день!
<br>
Поступила новая заявка на покупку крема. 
<br>
Детали заказа:<br>
Имя: $Name<br>
Телефон: $tel<br>
E-mail: $email<br>
Название крема: $blue $purple $green<br>
Источник: $refferer
";
mail($myemail, $tema, $message_to_myemail, "From: SNAILCARES <info@snailcare.ru> \r\n"."MIME-Version: 1.0\r\n"."Content-type: text/html; charset=utf-8\r\n" );
$tema = "Ваша заявка на покупку крема оформлена";
$message_to_myemail = "

Добрый день, $Name!
<br>
Ваша заявка на покупку крема $blue $purple $green успешно получена.
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


$f = fopen("leads.xls", "a+");
fwrite($f," <tr>");    
fwrite($f," <td>$email</td> <td>$name</td> <td>$tel</td> <td>$blue</td> <td>$purple</td> <td>$green</td>   <td>$date / $time</td>");   
fwrite($f," <td>$refferer</td>");    
fwrite($f," </tr>");  
fwrite($f,"\n ");    
fclose($f);


?>
