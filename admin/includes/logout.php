<?php
// *** Logout the current user.
$logoutGoTo = "../../index.php";
if (!isset($_SESSION)) {
	session_start();
}
$_SESSION['MM_Name'] = NULL;
$_SESSION['MM_UserGroup'] = NULL;
$_SESSION['MM_Id'] = NULL;
$_SESSION['MM_Sala'] = NULL;
$_SESSION['ID_Sala'] = NULL;
$_SESSION['MM_Status'] = NULL;
$_SESSION['MM_AtendTipo'] = NULL;
$_SESSION['MM_Data'] = NULL;
$_SESSION['MM_Hora_Inicio'] = NULL;
$_SESSION['MM_Valor'] = NULL;
$_SESSION['MM_Obs'] = NULL;
$_SESSION['MM_Atend'] = NULL;
$_SESSION['ID_Atend'] = NULL;
$_SESSION['MM_Flag'] = NULL;
unset($_SESSION['MM_Name']);
unset($_SESSION['MM_UserGroup']);
unset($_SESSION['MM_Id']);
unset($_SESSION['MM_Sala']);
unset($_SESSION['ID_Sala'] );
unset($_SESSION['MM_Status']);
unset($_SESSION['MM_AtendTipo']);
unset($_SESSION['MM_Data']);
unset($_SESSION['MM_Hora_Inicio']);
unset($_SESSION['MM_Valor']);
unset($_SESSION['MM_Obs']);
unset($_SESSION['MM_Atend']);
unset($_SESSION['ID_Atend']);
unset($_SESSION['MM_Flag']);
if ($logoutGoTo != "") {header("Location: $logoutGoTo");
exit;
}
?>