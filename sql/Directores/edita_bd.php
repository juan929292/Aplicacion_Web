<?php 
session_start();
include_once("../../db_configuration.php");
?>
<html>
<head>
    <title></title>
</head>
<body>
<?php if (!isset($_GET["idd"])) : ?>
	<div id="info1" style="">
		    <?php
        //conexion a la base de datos-peliculas
        $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
        if($connection->connect_errno){
            echo "<h1>Se produjo un error a la hora de conectarse a la base de datos: $connection->connect_errno</h1>";
        }
        $result=$connection->query("SELECT * FROM directores");

echo "<h3>Editar Director</h3>";
		?>
		<table class="centered bordered card-panel white"  style="text-align:center;">
            <tr class="card-panel teal lighten-2 white-text" style="font-weight:bold">
                <td>Id_Genero</td>
                <td>Nombre</td>
                <td>Pais</td>
            </tr>
            
        <?php
            while($obj=$result->fetch_object()){
                echo "<tr>";
                echo "<td>$obj->id_director</td>";
                echo "<td>$obj->nombre</td>";
                echo "<td>$obj->pais</td>";
                echo "<td><a href='edita_bd.php?idd=$obj->id_director'><img width=26 src='/proyecto/img/edita.png'/></a></td>";
                echo "</tr>";   
            }
        ?>
        </table>
	</div>
	<?php else : ?>
	  <?php
        //conexion a la base de datos-peliculas
        $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
        if($connection->connect_errno){
            echo "<h1>Se produjo un error a la hora de conectarse a la base de datos: $connection->connect_errno</h1>";
        }
        $result=$connection->query("SELECT * FROM directores where id_director=".$_GET['idd'].";");
							echo "<form method='post' action='edita_fila.php'>";
							while($obj=$result->fetch_object()){
								echo "<h3>Editar Director: ".$obj->nombre ."</h3>";
								echo "<input required type='hidden' value=".$obj->id_director ." name='val1' readonly='readonly'>"."</br>";
								echo "<h3>Nombre:</h3>";
								echo "<input required type='text' placeholder="."'".$obj->nombre ."'"." name='val2'>"."</br>";
								echo "<h3>Pais:</h3>";
								echo "<input required type='text' placeholder="."'".$obj->pais ."'"."name='val3'>"."</br>";
							echo "</br>"."<input type='submit' value='Enviar'>";
							}
							echo "</form>";
                    ?>
					<?php endif ?>
</body>
</html>
