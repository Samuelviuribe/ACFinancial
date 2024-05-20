<?php
session_start();
if (isset($_SESSION['id_Assr']) && isset($_SESSION['usuario_Assr'])) {
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../CSS/Styles.css"> -->

    <link rel="stylesheet" href="global/global_style.css">
    <link rel="stylesheet" href="../CSS/login-style.css">
    <link rel="shortcut icon" href="../Pagina/data/img/icon_wh.png" type="image/x-icon">

    <meta name="asr" content="true">
    <script defer src="global/global_script.js"></script>

    <style>
    body {
        background-image: url("../IMG/Home-2.jpg") !important;
    }
    </style>
    <title>Perfil</title>
</head>

<body>

    <nav></nav>

    <article>
        <h1>Actualizar Informacion</h1>
        <br>
        <form action="../Login/ActualizarAssr.php" method="POST">
            <?php if(isset($_GET['error'])){ ?>
            <p class="warn"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <?php if(isset($_GET['success'])){ ?>
            <p class="nice"><?php echo $_GET['success']; ?></p>
            <?php } ?>

            <?php
        if (isset($_SESSION['id_Assr']) && isset($_SESSION['usuario_Assr'])) {
            include_once('../Config/Conexion.php');
        
            $id_Assr = $_SESSION['id_Assr'];
            $consulta = "SELECT * FROM asesores WHERE id = $id_Assr";    
            $resultado = mysqli_query($conexion, $consulta);
        
            if ($resultado) {
                $row = mysqli_fetch_assoc($resultado);
                $id = $row['id'];
                $nombre = $row['usuario'];
                $nombre_completo = $row['nombre_completo'];
                $correo = $row['correo'];
                $telefono = $row['telefono'];
                $contraseña = $row['contraseña'];
        
                // Campo ID, readonly
                // echo '<label>ID:</label> <input type="text" name="id" value="' . $id . '" readonly><br>';
                echo '<label>Nombre de Usuario:</label> <input type="text" name="usuario" value="' . $nombre . '">';
                echo '<label>Nombre Completo:</label> <input type="text" name="nombre_completo" value="' . $nombre_completo . '">';
                echo '<label>Correo:</label> <input type="email" name="correo" value="' . $correo . '">';
                echo '<label>Telefono:</label> <input type="tel" name="telefono" value="' . $telefono . '">';
                echo '<label>Contraseña:</label> <input type="password" name="contraseña" value="' . $contraseña . '">';
            } else {
                echo "Error en la consulta: " . mysqli_error($conexion);
            }
        
            mysqli_close($conexion); 
        } 
        ?>
            <button class="butn impo" type="submit">Actualizar</button>
            <button class="butn" name="eliminar"> Eliminar Cuenta</button>

        </form>
    </article>




</body>

</html>

<?php
} else {
    header('location:../Validacion/loginAsesor.php');
}
?>