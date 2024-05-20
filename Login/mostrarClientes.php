<?php
$inc = include("../Config/Conexion.php");

 

if ($inc) {
    $consulta = "SELECT * FROM clientes WHERE  asesor_id = $_SESSION[id_Assr]";
    $resultado = mysqli_query($conexion, $consulta);
    
    if ($resultado) {
        while ($row = $resultado->fetch_array()) {
             
            $asesor_id = $row["asesor_id"];    
            $nombre = $row['nombre'];
            $correo = $row['correo'];
            $telefono = $row['telefono'];
         
            
            // Aquí imprimimos todos los campos de cada registro

            // POR FAVOR USA UN <P> PARA TODO
            // OK !! -s

            echo "<div class='info'>";
            echo    "<div >";
            
            echo       "<p>id (borrar): " . $asesor_id . "</p>";
            echo       "<p>Nombre completo: " . $nombre . "</p>";
            echo       "<p>Correo: " . $correo . "</p>";
          
            echo    "</div>";
            echo    "<div >";
            // echo        "<div class='butn blck'>Contratar</div>";
            echo 		"<div><a class='butn blck' href='https://api.whatsapp.com/send?phone=57" . $telefono . "&text=%22Hola,%20necesito%20asesoramiento!' target='_blank' rel='noopener noreferrer'>Contactar!</a></div>";
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