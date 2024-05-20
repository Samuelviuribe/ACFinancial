<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/Styles.css">
    <title>Admin Login</title>
</head>
<body class="contenedor-l-Admin">
     
    <div class="contenedor-log-Admin">
        <h1>Iniciar secion</h1>    
        <br>
        <form  action="../Login/LogAuthAdmin.php" method="POST">

            <?php if(isset($_GET['error'])){?>
                <p><?php echo $_GET['error']?></p>
            <?php }?>

            <label class="Log-User-W" for="">
                <img width="25px" src="../IMG/ICONS/User.svg" alt="">
                Usuario 
            </label>
                <input  type="text" placeholder="Ingrese Usuario" name="AdminUser" autocomplete="off">

            <label class="Log-User-W" for="">
                <img width="25px" src="../IMG/ICONS/Key.svg" alt="">
                Contraseña
            </label>
                <input type="password" placeholder="Ingrese Contraseña" name="AdminPass" autocomplete="OFF">

            <button class="button"> Ingresar</button>

        </form>
    </div>
    
</body>
</html>