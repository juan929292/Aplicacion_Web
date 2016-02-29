<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <?php
        $connection = new mysqli("localhost","root","","talleresfaber");
        if($connection->connect_errno){
            echo "<h1>Se produjo un error a la hora de conectarse a la base de datos: $connection->connect_errno</h1>";
        }
        $idRep = $_GET["id"];//
        echo $idRep;
        $connection->query("DELETE FROM INTERVIENEN WHERE IdReparacion=$idRep");
        $connection->query("DELETE FROM FACTURAS WHERE IdReparacion=$idRep");
        $connection->query("DELETE FROM INCLUYEN WHERE IdReparacion=$idRep");
        $connection->query("DELETE FROM REALIZAN WHERE IdReparacion=$idRep");
        $connection->query("DELETE FROM REPARACIONES WHERE IdReparacion=$idRep");
        unset($connection);
        header('Location: reparaciones.php');
    ?>
</body>
</html>
