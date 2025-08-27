<?php
// *** Logout the current user.
$logoutGoTo = "../index.php";
if (!isset($_SESSION)) {
	session_start();
}
$_SESSION['usu_nome'] = NULL;
$_SESSION['usu_email'] = NULL;
$_SESSION['usu_id'] = NULL;
unset($_SESSION['usu_nome']);
unset($_SESSION['usu_email']);
unset($_SESSION['usu_id']);
if ($logoutGoTo != "") {
	header("Location: $logoutGoTo");
	exit;
}
