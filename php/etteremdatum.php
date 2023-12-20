<?php

if (isset($_POST['sub'])) {
	$datum = $_POST['datum'];
	$etteremID = $_POST['eid'];


		header("Location: ../etterem?eid=$etteremID&fdatum=$datum#foglalt");
		exit();
}