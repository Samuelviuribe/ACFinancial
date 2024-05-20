<?php
session_start();

include_once('../Config/Conexion.php');
if (isset($_POST['Usuario']) && isset($_POST['Nombre']) && isset($_POST['Telefono']) && isset($_POST['Correo']) && isset($_POST['Contraseña'])  && isset($_POST['RContraseña'])) {
   function validar($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);

    return $data;
   }
 
   $usuario = validar($_POST['Usuario']);
   $nombre = validar($_POST['Nombre']);
   $telefono = validar($_POST['Telefono']);
   $correo = validar($_POST['Correo']);
   $contraseña = validar($_POST['Contraseña']);
   $Rcontraseña = validar($_POST['RContraseña']);


   $datosUsuario = 'Usuario='. $usuario .'&Correo='.$correo;

   if (empty($usuario)) {
    header("location: ../Validacion/registrarseAsesor.php?error= El Usuario es requerido&$datosUsuario");
    exit();
   }elseif (empty($nombre)) {
    header("location: ../Validacion/registrarseAsesor.php?error=El Nombre completo es requerido&$datosUsuario");
    exit();
   }elseif (empty($telefono)) {
    header("location: ../Validacion/registrarseAsesor.php?error=El Numero Telefonico es requerido&$datosUsuario");
    exit();
   }elseif (empty($correo)) {
    header("location: ../Validacion/registrarseAsesor.php?error=El correo electronico es requerido&$datosUsuario");
    exit();
   }elseif (empty($contraseña)) {
    header("location: ../Validacion/registrarseAsesor.php?error=La contraseña es requerida&$datosUsuario");
    exit();
   }elseif (empty($Rcontraseña)) {
    header("location: ../Validacion/registrarseAsesor.php?error=Repetir la clave es requerida&$datosUsuario");
    exit();
   }elseif ($contraseña !== $Rcontraseña) {
    header("location: ../Validacion/registrarseAsesor.php?error= Las contraseñas deben ser las mismas&$datosUsuario");
    exit();
   }else{
    $contraseña = password_hash($contraseña, PASSWORD_DEFAULT);

    $sql = "SELECT * FROM asesores WHERE usuario = '$usuario' OR correo = '$correo'";
    $query = $conexion->query($sql);
    
#Revisar esto mas tarde - La verificacion de correo
    if(mysqli_num_rows($query)>0){
        header('location: ../Validacion/registrarseAsesor.php?error="El usuario o correo ya existen"');
    exit();
    }else{
        $sql2 = "INSERT INTO asesores(usuario, nombre_completo, correo, contraseña, telefono) VALUES ('$usuario', '$nombre','$correo','$contraseña','$telefono')";
        $query2 = $conexion->query($sql2);

        if ($query2) {
            header("location: ../Validacion/registrarseAsesor.php?success=Usuario Creado");
    exit();
        }else {
            header("location: ../Validacion/registrarseAsesor.php?error=Ocurrio un error");
    exit();
        }

    }
   }
}else{
    header('location:.../Validacion/registrarseAsesor.php');
    exit();
}

