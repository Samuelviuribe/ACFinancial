<?php
session_start();

// Eliminar variables de sesión y destruir la sesión
unset($_SESSION['id_User']);
unset($_SESSION['nombre_User']);
session_destroy();

// Deshabilitar el almacenamiento en caché del navegador
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

// Redirigir a la página de inicio de sesión
header('Location: ../Validacion/login.php');
exit();
?>
