<?php
   session_start();
       // Cerrar sesión de administrador
    unset($_SESSION['id_admin']);
    unset($_SESSION['Pass_admin']);
    session_destroy();
        // Deshabilitar el almacenamiento en caché del navegador
    header("Cache-Control: no-cache, no-store, must-revalidate");
    header("Pragma: no-cache");
    header("Expires: 0");

       // Redirigir a la página de inicio de sesión de administrador
       header('location:../ViewsAdmin/LogAdmin.php');
       exit();
   
       
#lo voy a poner que te lleve a la pagina de inicio de secion por ahora lo ideal seria que 
#cuando termines o quieras cerrar secion te lleve a la pagina de inicio o pagina principal


?>