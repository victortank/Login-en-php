<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
session_start();
$varsession = $_SESSION['email'];
if(empty($varsession)){
    header("Location:index.php");
}
echo "Bienvenido" . $_SESSION['username'] . $_SESSION['name'] . $_SESSION['email'];
    ?>
    <a href="exitsession.php">Cerrar sesion</a>    
</body>
</html>