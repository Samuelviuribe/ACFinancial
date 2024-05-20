<?php

    session_start();

    include_once('../Config/Conexion.php'); 
    if (isset($_POST['Usuario']) && isset($_POST['Contraseña'])) {

       function Validar($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);

        return $data;
       }
       $usuario = Validar($_POST['Usuario']);
       $contraseña = Validar($_POST['Contraseña']);

       if (empty($usuario)) {
        header('location: ../Validacion/login.php?error=El usuario es requerido');
        exit();
       }elseif(empty($contraseña)){
        header('location: ../Validacion/login.php?error=La contraseña es requerida');
        exit();
       }else{
        $Sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
        $query = mysqli_query($conexion, $Sql);

        if ($query->num_rows==1) {
            $usuarioQ = $query->fetch_assoc();

            $id = $usuarioQ['id'];
            $usuario = $usuarioQ['usuario'];
            $Contraseña = $usuarioQ['contraseña'];

            if($usuario === $usuario){
                if (password_verify($contraseña, $Contraseña)) {
                    $_SESSION['id_User']=$id;
                    $_SESSION['usuario_User']=$usuario;

                    // alert('Bienvenido $usuario');
                    echo "<script>
                    location.href = '../PViews/UserHome.php';
                  </script>";
            
                }else {
                    header('location: ../Validacion/login.php?error=Usuario o Clave incorrecta');
                }
            }else {
                    header('location: ../Validacion/login.php?error=Usuario o Clave incorrecta');
            }
        }else {
            header('location: ../Validacion/login.php?error=Usuario o Clave incorrecta');
        }

       }
    }
