<?php
include("conexion.php");

   if(isset($_POST['submit'])){

        $usuario = [
           "apodo"  =>  strtolower($_POST['apodo']),
           "nombre" => strtolower($_POST['nombre']),
           "apellido"   => strtolower($_POST['apellido']),
           "password"   =>$_POST['pass'],
           "email"  => $_POST['correo'],
           "edad"   => $_POST['edad']
    ];
////////////////////////////////Nombre de Usuario///////////////////////////////////////////////////////////
    if(empty($usuario['apodo'])){
       echo "<li>El campo (Nombre de usuario) no puede estar vacio </li>";
    }
    else{
    if(strlen($usuario['apodo']) < 4){
         echo "<li>El Nombre de usuario debe ser mayor 4 Caracteres</li>";
      }
      else{
         if(strlen($usuario['apodo']) > 15){
            echo "<li>El Nombre de usuario tiene demasiados caracteres</li>";
         }
         else{
            $usuarioValido['apodo']= $usuario['apodo'];
         }
      }
   }
////////////////////////////////Nombre Real////////////////////////////////////////////////////////////
   if(empty($usuario['nombre'])){
      echo "<li>El campo (Nombre) no puede estar vacio</li>";
   }
   else{
      if(strlen($usuario['nombre']) < 4){
         echo "<li>El Nombre debe ser mayor 4 Caracteres</li>";
      }
      else{
         if(strlen($usuario['nombre']) > 15){
            echo "<li>El Nombre tiene demasiados caracteres</li>";
         }
         else{
            $usuarioValido['nombre']= $usuario['nombre'];
         }
      }
   }
////////////////////////////////Apellido////////////////////////////////////////////////////////////
if(empty($usuario['apellido'])){
   echo "<li>EL campo (Apellido) no puede estar vacio</li>";
}
else{
   if(strlen($usuario['apellido']) < 4){
      echo "<li>El Apellido debe ser mayor 4 Caracteres</li>";
   }
   else{
      if(strlen($usuario['apellido']) > 15){
         echo "<li>El Apellido tiene demasiados caracteres</li>";
      }
      else{
         $usuarioValido['apellido'] = $usuario['apellido'];
      }
   }
}
////////////////////////////////Contraseña////////////////////////////////////////////////////////////
if(empty($usuario['password'])){
   echo "<li>EL campo (Contraseña) no puede estar vacio</li>";
}
else{
   if(strlen($usuario['password']) < 6){
      echo "<li>La Contraseña debe ser mayor a 6 caracteres alfanumerico</li>";
   }
   else{
      if(strlen($usuario['password']) > 256){
         echo "<li>La Contraseña no puede ser mayor a 16 caracteres alfanumerico</li>";
      }
      else{
         if (!preg_match('`[a-z]`',$usuario['password'])){
            echo "<li>La Contraseña debe tener al menos una letra minúscula</li>";
         }
         /*else{
            if (!preg_match('`[A-Z]`',$usuario['password'])){
               echo "<li>La Contraseña debe tener al menos una letra Mayuscula</li>";
             }*/
            else{
               if (!preg_match('`[0-9]`',$usuario['password'])){
                  echo "<li>La Contraseña debe tener al menos un caracter numérico</li>";
               } 
               else{
                  $usuarioValido['password']= $usuario['password'];
               }  
            }
         }
      }
   }

////////////////////////////////Correo o Email///////////////////////////////////////////////////////
   if(empty($usuario['email'])){
      echo "<li>El campo (email) no puede estar vacio</li>";
   }
   else{
      if(!filter_var($usuario['email'], FILTER_VALIDATE_EMAIL)){  
         echo "<li>EL Correo no es valido</li>";
      }
      else{
         $usuarioValido['email']= $usuario['email'];
      }    
}
/////////////////////////////////////////////////////////////////////////////////////////////////////  
   if(empty($usuario['edad'])){
      echo "<li>El Campo (Edad) no puede estar vacio</li>";
      }
      else{
         if(strlen($usuario['edad']) > 2){
            echo "<li>Error en la edad</li>";
         }
         else{
            if(!is_numeric($usuario['edad'])){
               echo "<li>La edad tiene que ser numeros</li>";
            }
            else{
               $usuarioValido['edad']= $usuario['edad'];
            }
         }
      }
   }
////////////////////////////////////////////////////////////////////////////////////////////////////
//Validar que todo el contenido del array este lleno && validar datos DB y agregarlos //

if(!empty($usuarioValido['apodo']) && !empty($usuarioValido['nombre']) && !empty($usuarioValido['apellido']) && !empty($usuarioValido['password']) && !empty($usuarioValido['email']) && !empty($usuarioValido['edad']) ){

$consultaDB = "SELECT * From datos 
where Apodo = '$usuarioValido[apodo]' ";

$result = mysqli_query($conexion,$consultaDB);

if(mysqli_num_rows($result) > 0){
   echo "<li>Este Apodo esta en Uso</li>";
}
else{
      $consultaDB = "SELECT * From datos 
      where Correo = '$usuarioValido[email]' ";
      
      $result = mysqli_query($conexion,$consultaDB);
      
      if(mysqli_num_rows($result) > 0){
         echo "<li>Este Correo esta en uso</li>";
      }
      else{
         $solicitud = "INSERT INTO datos (Apodo,Nombre,Apellido,Contraseña,Correo,Edad) VALUES ('$usuarioValido[apodo]', '$usuarioValido[nombre]', '$usuarioValido[apellido]', '$usuarioValido[password]', '$usuarioValido[email]', '$usuarioValido[edad]')";
         $result = mysqli_query($conexion,$solicitud); 
         mysqli_close($conexion);
         echo "<li>El usuario se agrego satisfactoriamente </li>";
      }   
   }
}

   ?>
