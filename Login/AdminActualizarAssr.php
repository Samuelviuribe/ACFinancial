<?php
session_start();

include_once('../Config/Conexion.php');

// Verificar si se enviaron los datos del formulario y si hay una sesión activa
if (isset($_SESSION['id']) && isset($_POST['usuario']) && isset($_POST['nombre_completo']) && isset($_POST['correo']) && isset($_POST['contraseña']) && isset($_POST['telefono'])) {
    // Obtener datos del formulario
    $id = $_POST['id'];

    if (isset($_POST['eliminar'])) {
        // Consulta SQL para eliminar el usuario
        $consulta = "DELETE FROM asesores WHERE id = $id";

        // Ejecutar la consulta
        $resultado = mysqli_query($conexion, $consulta);

        // Verificar si la eliminación fue exitosa
        if ($resultado) {
            // Cerrar sesión del usuario
            session_destroy();
            // Redirigir al usuario a la página de inicio con mensaje de éxito
            header("Location: ../ViewsAdmin/HomeAdmin.php?success=Cuenta eliminada exitosamente");
            exit();
        } else {
            // Si la eliminación falla, redirigir con mensaje de error
            header("Location: ../ViewsAdmin/HomeAdmin.php?error=Error al eliminar la cuenta");
            exit();
        }
    }

    $usuario = $_POST['usuario'];
    $nombre_completo = $_POST['nombre_completo'];
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];
    $telefono = $_POST['telefono'];

    // Validar datos del formulario
    if(empty($usuario) || empty($nombre_completo) || empty($correo) || empty($contraseña) || empty($telefono)) {
        // Redirigir con mensaje de error si algún campo está vacío
        header("Location: ../ViewsAdmin/HomeAdmin.php?error=Todos los campos son obligatorios");
        exit();
    }

    // Escapar datos para evitar inyección SQL
    $usuario = mysqli_real_escape_string($conexion, $usuario);
    $nombre_completo = mysqli_real_escape_string($conexion, $nombre_completo);
    $correo = mysqli_real_escape_string($conexion, $correo);
    $telefono = mysqli_real_escape_string($conexion, $telefono);
    $contraseña = mysqli_real_escape_string($conexion, $contraseña);

    // Consulta SQL para actualizar el usuario
    $consulta = "UPDATE asesores SET usuario='$usuario', nombre_completo='$nombre_completo', correo='$correo', contraseña='$contraseña' WHERE id='$id'";

    // Ejecutar la consulta
    $resultado = mysqli_query($conexion, $consulta);

    // Verificar si la actualización fue exitosa
    if($resultado) {
        // Redirigir de vuelta al perfil con mensaje de éxito
        header("Location: ../PViews/ConfiguracionAssr.php?success=Perfil actualizado exitosamente");
        exit();
    } else {
        // Si la actualización falla, redirigir con mensaje de error
        header("Location: ../PViews/ConfiguracionAssr.php?error=Error al actualizar el perfil");
        exit();
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
} else {
    // Redirigir si no se enviaron los datos del formulario o si no hay sesión iniciada
    header("Location: ../PViews/ConfiguracionAssr.php");
    exit();
}
?>
