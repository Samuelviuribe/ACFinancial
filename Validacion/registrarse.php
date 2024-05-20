<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../CSS/Styles.css"> -->
    <link rel="stylesheet" href="../CSS/login-style.css">
    <link rel="shortcut icon" href="../Pagina/data/img/icon_wh.png" type="image/x-icon">
    <title>Registrarse</title>
</head>

<body>
    <article>
        <h1>Registrarse</h1>
        <br>
        <form action="../Login/Registrarse.php" method="post">

            <?php if(isset($_GET['error'])){ ?>
            <p class="warn"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <?php if(isset($_GET['success'])){ ?>
            <p class="nice"><?php echo $_GET['success']; ?></p>
            <?php } ?>

            <label for="">
                <img width="25px" src="../IMG/ICONS/User.svg" alt="">
                Usuario
            </label>
            <input type="text" placeholder="Ingrese Usuario" name="Usuario">

            <label for="">
                <img width="25px" src="../IMG/ICONS/User.svg" alt="">
                Nombre Completo
            </label>
            <input type="text" placeholder="Ingrese su Nombre" name="Nombre">

            <label for="">
                <img width="25px" src="../IMG/ICONS/Mail.svg" alt="">
                Correo Electronico
            </label>
            <input type="email" placeholder="Ingresar el Correo Electronico" name="Correo">


            <label for="">
                <img width="25px" src="../IMG/ICONS/Key.svg" alt="">
                Contraseña
            </label>
            <input type="password" placeholder="Ingresar Contraseña" name="Contraseña">

            <label for="">
                <img width="25px" src="../IMG/ICONS/Key.svg" alt="">
                Confirmar Contraseña
            </label>
            <input type="password" placeholder="Ingresar Contraseña" name="RContraseña">

            <div>
                <input type="submit" class="butn impo" value=" Registrarse">
                <a href="login.php" class="butn"> Ingresar</a>
            </div>


        </form>
    </article>
</body>

</html>