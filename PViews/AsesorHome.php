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
    <link rel="shortcut icon" href="../Pagina/data/img/icon_wh.png" type="image/x-icon">

    <meta name="asr" content="true">
    <script defer src="global/global_script.js"></script>

    <style>
    body {
        background-image: url("../IMG/Home-2.jpg") !important;
    }
    </style>
    <title>User Home</title>
</head>

<body>

    <nav></nav>

    <article>
        <h2>Datos de clientes</h2>
        <hr>
        <?php
    // Incluir el archivo mostrar.php
    include("../login/mostrarClientes.php");
    ?>
    </article>

</body>

</html>

<?php
} else {
    header('location:../Login/LAsesorAuth.php');
}
?>