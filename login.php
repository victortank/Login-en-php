<?php
session_start();
include("conexion.php");

   if(isset($_POST['submit'])){
    
    $usuario =[
    'email' => $_POST['correo'],
    'password' => $_POST['pass'],
    ];

    if(!empty($usuario['email']) && !empty($usuario['password'])){
        
        $solicitud = "SELECT * From datos";
        $resultado = mysqli_query($conexion,$solicitud);

        while($fila = mysqli_fetch_array($resultado)){
            
               // echo $fila['Correo'] . $fila['Contraseña'];
            if($usuario['email'] == $fila['Correo'] && $usuario['password'] == $fila['Contraseña']){
                $_SESSION = [
                    'username' => $fila['Apodo'],
                    'name'  =>  $fila['Nombre'],
                    'lastname'  =>  $fila['Apellido'],
                    'password'  =>  $fila['Contraseña'],
                    'email' =>  $fila['Correo'],
                    'age'   =>  $fila['Edad']
                ];
                header("Location:base.php");
            break;    
            /*}
            else{
                echo "<li>Correo o Contraseña invalida</li>";
                
            */}
        }

    }
    else{
        echo "<li>Error<li>";
    }


   }//llave de "if" del submit o boton

?>