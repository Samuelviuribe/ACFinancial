<?php
session_start();

    // Cerrar sesión de asesor
    unset($_SESSION['id_Assr']);
    unset($_SESSION['nombre_Assr']);
    session_destroy();
        // Deshabilitar el almacenamiento en caché del navegador
    header("Cache-Control: no-cache, no-store, must-revalidate");
    header("Pragma: no-cache");
    header("Expires: 0");

        // Redirigir a la página de inicio de sesión de asesor
    header('location:../Validacion/loginAsesor.php');
    exit();
?>

    