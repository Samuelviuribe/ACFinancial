<?php
session_start();
if (isset($_SESSION['id_admin']) && isset($_SESSION['nombreAdmin'])) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/Styles.css">
    <title>Admin Home</title>
</head>
<body class="P-User-Admin">

<div class="mainContent">
    <div class="headerContainer">
        <div class="headerContent">
            <div class="logoContainer">
                <img src="../IMG/logo_wh.png" alt="" class="logo-Home-User">
            </div>
            <div class="menuContainer" id="Menu">
                <span class="menuItem"><a href="HomeAdmin.php" class="menuItemLink">Inicio</a></span>
                <span class="menuItem"><a href="AdminAsesores.php" class="menuItemLink">Asesores</a></span>
                <span class="menuItem"><a href="AdminUsuarios.php" class="menuItemLink">Usuarios</a></span>
                <span class="menuItem"><a href="../Login/CerrarSesionAdmin.php" class="menuItemLink">Salir</a></span>
            </div>
        </div>
    </div>
</div>

 <div class="Admin-Assr-Container">
    <h2 class="B-Texto-Mostrar">Datos de Asesores</h2>
    
    <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Experiencia</th>
                    <th>Especialización</th>
                </tr>
            </thead>

    <hr>

    <?php
    // Incluir el archivo mostrar.php
    include("../login/MostrarAssrAdmin.php");
    ?>
</div>  

</body>
</html>

<?php
} else {
    header('location:logAdmin.php');
}
?>
