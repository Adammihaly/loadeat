<?php

if(isset($_POST['login'])) {


	$lang = $_POST['lang'];

if ($lang == 'hu') {
	header("location: ../bejelentkezes");
		exit();
}
else if ($lang == 'en') {
	header("location: ../en/bejelentkezes");
		exit();
}
else if ($lang == 'rs') {
	header("location: ../rs/bejelentkezes");
		exit();
}
}