<?php

if (isset($_POST['sub'])) {
	$datum = $_POST['datum'];
	$etteremID = $_POST['eid'];


		header("Location: ../fogado?eid=$etteremID&fdatum=$datum#foglalt");
		exit();
}