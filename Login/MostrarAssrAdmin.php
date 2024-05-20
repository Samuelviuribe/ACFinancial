<?php

$inc = include("../Config/Conexion.php");

if (isset($_SESSION['id_admin']) && isset($_SESSION['nombreAdmin'])) {
    if (isset($_POST['eliminar']) && isset($_POST['id'])) {
        // Obtener el ID del asesor a eliminar
        $id = intval($_POST['id']); // Asegurarse de que sea un entero
        
        // Consulta SQL para eliminar el usuario
        $consulta = "DELETE FROM asesores WHERE id = ?";
        $stmt = mysqli_prepare($conexion, $consulta);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            // Redirigir con mensaje de éxito
            header("Location: ../ViewsAdmin/AdminAsesores.php?success=Cuenta eliminada exitosamente");
            exit();
        } else {
            // Redirigir con mensaje de error
            header("Location: ../PViews/ConfiguracionAssr.php?error=Error al eliminar la cuenta");
            exit();
        }
    }

    if ($inc) {
        $consulta = "SELECT * FROM asesores";
        $resultado = mysqli_query($conexion, $consulta);
        
        if ($resultado) {
            while ($row = $resultado->fetch_array()) {
                $id = $row['id'];
                $usuario = $row["usuario"];    
                $nombre = $row['nombre_completo'];
                $correo = $row['correo'];
                $telefono = $row['telefono'];
                $experiencia = $row['experiencia'];
                $especializacion = $row['especializacion'];    
                
                // Aquí imprimimos todos los campos de cada registro
                echo $id . " " . $usuario . " " . $nombre . " " . $correo . " " . $telefono . " " . $experiencia . " " . $especializacion . 
                " <a href='../ViewsAdmin/AdminVerAssr.php?id=$id'>Ver Perfil de Asesor</a> ";
                // Añadir un formulario para eliminar
                echo "<form class='AdminAssr-View-Delete' method='post' action=''>
                        <input type='hidden' name='id' value='$id'>
                        <input type='submit' name='eliminar' value='Eliminar'>
                      </form>";
                echo "<hr>";            
            }
        } else {
            echo "Error en la consulta: " . mysqli_error($conexion);
        }
    } else {
        echo "Error en la conexión a la base de datos: " . mysqli_connect_error();
    }
} else {
    // Redirigir si no hay sesión iniciada
    header("Location: ../Validacion/login.php?error=Por favor, inicie sesión primero");
    exit();
}
?>
