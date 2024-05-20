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
    <title>Modificar Administrador</title>
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
                <span class="menuItem"><a href="../Login/CerrarSesionAdmin.php" class="menuItemLink">Salir</a></span>
            </div>
        </div>
    </div>
</div>


<div class="contenedor-update">
    <h1 class="B-Texto-Mostrar"> Informacion del Usuario</h1>
    <br>
    <form action="../Login/MostrarUserAdmin.php" method="POST">
        <?php if(isset($_GET['error'])){ ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <br>
        <?php if(isset($_GET['success'])){ ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>
        <br>
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            include_once('../Config/Conexion.php');

            $consulta = "SELECT * FROM usuarios WHERE id = $id";    
            $resultado = mysqli_query($conexion, $consulta);

            if ($resultado) {
                $row = mysqli_fetch_assoc($resultado);
                $id = $row['id'];
                $nombre = $row['usuario'];
                $nombre_completo = $row['nombre_completo'];
                $correo = $row['correo'];
                $contraseña = $row['contraseña'];

                // Campo ID, readonly
                echo '<label class="B-Texto-Mostrar">ID:</label> <input type="text" name="id" value="' . $id . '" readonly><br>';
                echo '<label class="B-Texto-Mostrar">Nombre de Usuario:</label> <input type="text" name="usuario" value="' . $nombre . '"><br>';
                echo '<label class="B-Texto-Mostrar">Nombre Completo:</label> <input type="text" name="nombre_completo" value="' . $nombre_completo . '"><br>';
                echo '<label class="B-Texto-Mostrar">Correo:</label> <input type="email" name="correo" value="' . $correo . '"><br>';
                echo '<label class="B-Texto-Mostrar">Contraseña:</label> <input type="password" name="contraseña" value="' . $contraseña . '"><br>';
                echo '<input type="hidden" name="id" value="' . $id . '">'; // Agregamos un campo oculto con el ID
            } else {
                echo "Error en la consulta: " . mysqli_error($conexion);
            }

            mysqli_close($conexion); 
        } 
        ?>
   
    </form>
</div>
</body>
</html>

<?php
} else {
    header('location:logAdmin.php');
}
?>
