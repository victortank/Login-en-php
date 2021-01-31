<?php
error_reporting(0);
session_start();
$varsession = $_SESSION['email'];
if(!empty($varsession) || !$versession == null){
    header("Location:base.php");
}
?>
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

    <div class="conteiner">
        
        <form method="POST" action="index.php" > 
            <input type="email" name="correo" placeholder="Email" required="" ><br>
            <input type="password" name="pass" placeholder="Contraseña" required=""><br>
            <input type="submit" name="submit"><br>
            <a  href="Registro.php" role="button">Registrar</a>
            
            <?php
            include("login.php");
            ?>
    
    </form>
    </div>


</body>
</html>