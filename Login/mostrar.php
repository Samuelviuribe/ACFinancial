<?php
$inc = include("../Config/Conexion.php");

if (isset($_POST['eliminar'])) {   

    $id_usuario = $_SESSION['id_User'];
    $consulta = "SELECT * FROM usuarios WHERE id = $id_usuario";    
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        $row = mysqli_fetch_assoc($resultado);
        
        $id =  $_SESSION['id_User'];
        $nombre_cliente = $row['nombre_completo'];
        $correo_cliente = $row['correo'];
        $telefono_cliente = $row['telefono'];

        $consulta_insert = "INSERT INTO clientes (asesor_id, nombre, correo, telefono) 
                            VALUES ('$id', '$nombre_cliente', '$correo_cliente', '$telefono_cliente')";
        $resultado_insert = mysqli_query($conexion, $consulta_insert);

        if ($resultado_insert) {
            echo "Datos del cliente guardados correctamente.";
        } else {
            echo "Error al guardar los datos del cliente: " . mysqli_error($conexion);
        }
    } else {
        echo "Error al obtener datos del usuario: " . mysqli_error($conexion);
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

            // POR FAVOR USA UN <P> PARA TODO
            // OK !! -s

            echo "<div class='info'>";
            echo    "<div >";
            echo       "<p>ID del asesor: " . $id . "</p>";
            echo       "<p>Usuario: " . $usuario . "</p>";
            echo       "<p>Nombre completo: " . $nombre . "</p>";
            echo       "<p>Correo: " . $correo . "</p>";
            echo       "<p>Experiencia: " . $experiencia . "</p>";
            echo       "<p>Especialización: " . $especializacion . "</p>";
            echo    "</div>";
            echo    "<div >";
            echo 	 " <button><a  class='butn blck' href='https://api.whatsapp.com/send?phone=57" . $telefono . "&text=%22Hola,%20necesito%20asesoramiento!' target='_blank' rel='noopener noreferrer' name='Contactar'>Contactar!</a></button>";
            echo    "</div>";
            echo "</div>";
            echo "<hr>"; // Separador entre registros

            // aqui
        } 
    } else {
        echo "Error en la consulta: " . mysqli_error($conexion);
    }
} else {
    echo "Error en la conexión a la base de datos: " . mysqli_connect_error();
}
?>
