<?php
session_start();
if (isset($_SESSION['id_User']) && isset($_SESSION['usuario_User'])) {
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../CSS/Styles.css"> -->

    <link rel="stylesheet" href="global/global_style.css">
    <link rel="shortcut icon" href="../Pagina/data/img/icon_wh.png" type="image/x-icon">

    <meta name="asr" content="false">
    <script defer src="global/global_script.js"></script>

    <title>User Home</title>
</head>

<body>

    <nav>
    </nav>

    <article>
        <h2>Datos de Asesores</h2>
        <hr>
        <?php
        // Incluir el archivo mostrar.php
        include("../login/mostrar.php");
        ?>
    </article>

</body>

</html>

<?php
} else {
    header('location:../Validacion/login.php');
}
?>