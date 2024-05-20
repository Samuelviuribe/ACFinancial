<?php
session_start();

include_once('../Config/Conexion.php');

if (isset($_SESSION['id_User']) && isset($_POST['usuario']) && isset($_POST['nombre_completo']) && isset($_POST['correo']) && isset($_POST['contraseña'])) {
    $id = $_SESSION['id_User'];

    if (isset($_POST['eliminar'])) {
        $id = mysqli_real_escape_string($conexion, $id);
        $consulta = "DELETE FROM usuarios WHERE id = ?";
        $stmt = mysqli_prepare($conexion, $consulta);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            session_destroy();
            header("Location: ../pagina/?success=Cuenta eliminada exitosamente");
            exit();
        } else {
            header("Location: ../PViews/Configuracion.php?error=Error al eliminar la cuenta");
            exit();
        }
    }

    $usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
    $nombre_completo = mysqli_real_escape_string($conexion, $_POST['nombre_completo']);
    $correo = mysqli_real_escape_string($conexion, $_POST['correo']);
    $contraseña = mysqli_real_escape_string($conexion, $_POST['contraseña']);

    if(empty($usuario) || empty($nombre_completo) || empty($correo) || empty($_POST['contraseña'])) {
        header("Location: ../PViews/Configuracion.php?error=Todos los campos son obligatorios");
        exit();
    }

    $consulta = "UPDATE usuarios SET usuario=?, nombre_completo=?, correo=?, contraseña=? WHERE id=?";
    $stmt = mysqli_prepare($conexion, $consulta);
    mysqli_stmt_bind_param($stmt, "ssssi", $usuario, $nombre_completo, $correo, $contraseña, $id);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        header("Location: ../PViews/Configuracion.php?success=Perfil actualizado exitosamente");
        exit();
    } else {
        header("Location: ../PViews/Configuracion.php?error=Error al actualizar el perfil");
        exit();
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conexion);
} else {
    header("Location: ../PViews/Configuracion.php");
    exit();
}
?>
