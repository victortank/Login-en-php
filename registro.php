<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title></title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
<div>
    <form action="registro.php" method="POST">

        <?php
            include("Procesos-form.php");
         ?>
        
        <input  type="text" name="apodo" placeholder="Nombre de usuario" maxlength="15" required=""> <br>
        <input  type="text" name="nombre" placeholder="Nombre" maxlength="15"   required=""> <br>
        <input  type="text" name="apellido" placeholder="Apellido" maxlength="15"   required=""> <br>
        <input  type="password" name="pass" placeholder="Contraseña" maxlength="20" required=""> <br>
        <input  type="email"    name="correo"   placeholder="Correo" required=""> <br>
        <input  type="number"   name="edad" placeholder="Edad" maxlength="2" required=""> <br>
        <input type="submit"    name="submit"> <br>

    </form>

</div>

    
</body>
</html>