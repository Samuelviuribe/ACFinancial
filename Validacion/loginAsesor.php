<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../CSS/Styles.css"> -->
    <link rel="stylesheet" href="../CSS/login-style.css">
    <link rel="shortcut icon" href="../Pagina/data/img/icon_wh.png" type="image/x-icon">

    <style>
        body {
            background-image: url("../IMG/FondoL-InOut-Assr.jpg") !important;
        }
    </style>
    <title>login Asesor</title>
</head>

<body>
    <article>
        <h1>Iniciar secion</h1>
        <p>Como asesor</p>
        <a href="login.php" rel="noopener noreferrer">¿Eres Cliente?</a>
        <!-- Cambiar este post -->
        <form action="../Login/LAsesorAuth.php" method="POST">

            <?php if(isset($_GET['error'])){?>
            <p class="warn"><?php echo $_GET['error']?></p>
            <?php }?>

            <label for="">
                <img width="25px" src="../IMG/ICONS/User.svg" alt="">
                Usuario
            </label>
            <input type="text" placeholder="Ingrese Usuario" name="Usuario" autocomplete="off">

            <label for="">
                <img width="25px" src="../IMG/ICONS/Key.svg" alt="">
                Contraseña
            </label>
            <input type="password" placeholder="Ingrese Contraseña" name="Contraseña" autocomplete="OFF">

            <div>
                <button class="butn"> Ingresar</button>
                <a href="registrarseAsesor.php" class="butn impo"> Registrarse</a>
            </div>

        </form>
    </article>
</body>

</html>