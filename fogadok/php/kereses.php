<?php

if (isset($_POST['sub'])) {

	$telepules = $_POST['helyseg'];
	$datum = $_POST['datum'];
	$idopont = $_POST['idopont'];
	
	if (isset($_POST['n'])) {
		$lang = $_POST['n'];
		if ($lang == 'en') {
			header("Location: ../en/talalatok?telepules=$telepules&datum=$datum&idopont=$idopont");
			exit();
		}
	}
	if (isset($_POST['n'])) {
		$lang = $_POST['n'];
		if ($lang == 'rs') {
			header("Location: ../rs/talalatok?telepules=$telepules&datum=$datum&idopont=$idopont");
			exit();
		}
	}




	header("Location: ../talalatok?telepules=$telepules&datum=$datum&idopont=$idopont");
	exit();
	
}
else
{
	header("Location: https://loadeat.com");
	exit();
}