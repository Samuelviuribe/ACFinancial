<?php
session_start();

include_once('../Config/Conexion.php');

// Verificar si se enviaron los datos del formulario y si hay una sesión activa
if (isset($_SESSION['id_Assr']) && isset($_POST['usuario']) && isset($_POST['nombre_completo']) && isset($_POST['correo']) && isset($_POST['contraseña']) && isset($_POST['telefono'])) {
    // Obtener datos del formulario
    $id = $_SESSION['id_Assr'];

    if (isset($_POST['eliminar'])) {
        // Consulta SQL para eliminar el usuario
        $consulta = "DELETE FROM asesores WHERE id = ?";
        $stmt = mysqli_prepare($conexion, $consulta);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            session_destroy();
            header("Location: ../pagina/?success=Cuenta eliminada exitosamente");
            exit();
        } else {
            header("Location: ../PViews/ConfiguracionAssr.php?error=Error al eliminar la cuenta");
            exit();
        }
    }

    $usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
    $nombre_completo = mysqli_real_escape_string($conexion, $_POST['nombre_completo']);
    $correo = mysqli_real_escape_string($conexion, $_POST['correo']);
    $contraseña = mysqli_real_escape_string($conexion, $_POST['contraseña']);
    $telefono = mysqli_real_escape_string($conexion, $_POST['telefono']);

    // Validar datos del formulario
    if (empty($usuario) || empty($nombre_completo) || empty($correo) || empty($contraseña) || empty($telefono)) {
        // Redirigir con mensaje de error si algún campo está vacío
        header("Location: ../PViews/ConfiguracionAssr.php?error=Todos los campos son obligatorios");
        exit();
    }

    // Consulta SQL para actualizar el usuario
    $consulta = "UPDATE asesores SET usuario = ?, nombre_completo = ?, correo = ?, telefono = ?, contraseña = ? WHERE id = ?";
    $stmt = mysqli_prepare($conexion, $consulta);
    mysqli_stmt_bind_param($stmt, "sssssi", $usuario, $nombre_completo, $correo, $telefono, $contraseña, $id);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        header("Location: ../PViews/ConfiguracionAssr.php?success=Perfil actualizado exitosamente");
        exit();
    } else {
        header("Location: ../PViews/ConfiguracionAssr.php?error=Error al actualizar el perfil");
        exit();
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conexion);
} else {
    // Redirigir si no se enviaron los datos del formulario o si no hay sesión iniciada
    header("Location: ../PViews/ConfiguracionAssr.php");
    exit();
}
?>
