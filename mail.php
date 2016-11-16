<?php

$recepient = "info@wsksena.com";
$sitename = "Ksena";

$name = trim($_POST["name"]);
$mail = trim($_POST["mail"]);
$phone = trim($_POST["phone"]);
$text = trim($_POST["message"]);

$pagetitle = "Нове повідомлення з сайту Ksena \"$sitename\"";
$message = "Ім'я: $name \nEmail: $mail \nНомер телефона: $phone \nПовідомлення: $text";
mail($recepient, $pagetitle, $message, "Content-type: text/plain; charset=\"utf-8\"\n From: $recepient");