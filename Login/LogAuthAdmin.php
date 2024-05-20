<?php

session_start();

include_once('../Config/Conexion.php'); 
if (isset($_POST['AdminUser']) && isset($_POST['AdminPass'])) {

    function Validar($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }

    $usuario = Validar($_POST['AdminUser']);
    $contraseña = Validar($_POST['AdminPass']);

    if (empty($usuario)) {
        header('location: ../ViewsAdmin/LogAdmin.php?error=Usuario de Administrador requerido');
        exit();
    } elseif (empty($contraseña)) {
        header('location: ../ViewsAdmin/LogAdmin.php?error=Contraseña de Administrador es requerida');
        exit();
    } else {
        $Sql = "SELECT * FROM administradores WHERE nombreAdmin = '$usuario' AND contraseña = '$contraseña'";
        $query = mysqli_query($conexion, $Sql);

        if ($query->num_rows == 1) {
            $usuarioQ = $query->fetch_assoc();

            $id = $usuarioQ['id_admin'];
            $usuarioAdmin = $usuarioQ['nombreAdmin'];

            $_SESSION['id_admin'] = $id;
            $_SESSION['nombreAdmin'] = $usuarioAdmin;

            echo "<script>
                alert('Bienvenido Administrador $usuarioAdmin');
                location.href = '../ViewsAdmin/HomeAdmin.php';
            </script>";
            exit();
        } else {
            header('location: ../ViewsAdmin/LogAdmin.php?error=Usuario o Clave incorrecta');
            exit();
        }
    }
}
?>
