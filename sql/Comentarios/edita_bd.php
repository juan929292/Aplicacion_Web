<html>
<head>
    <title></title>
</head>
<body>
<?php if (!isset($_GET["idd"])) : ?>
	<div id="info1" style="">
		    <?php
        //conexion a la base de datos-peliculas
        $connection = new mysqli("localhost","root","","Cine");
        if($connection->connect_errno){
            echo "<h1>Se produjo un error a la hora de conectarse a la base de datos: $connection->connect_errno</h1>";
        }
        $result=$connection->query("SELECT * FROM comentarios");

echo "<h3>Comentarios</h3>";
		?>
		<table class="centered bordered card-panel white"  style="text-align:center;">
            <tr class="card-panel teal lighten-2 white-text" style="font-weight:bold">
                <td>Id_Comentario</td>
                <td>Contenido</td>
                <td>Fecha</td>
                <td>id_usuario</td>
                <td>id_pelicula</td>
            </tr>
            
        <?php
            while($obj=$result->fetch_object()){
                echo "<tr>";
                echo "<td>$obj->id_comentario</td>";
                echo "<td>$obj->contenido</td>";
                echo "<td>$obj->fecha</td>";
                echo "<td>$obj->id_usuario</td>";
                echo "<td>$obj->id_pelicula</td>";
                echo "<td><a href='edita_bd.php?idd=$obj->id_comentario'><img width=26 src='/proyecto/img/edita.png'/></a></td>";
                echo "</tr>";   
            }
        ?>
        </table>
	</div>
	<?php else : ?>
	  <?php
        //conexion a la base de datos-peliculas
        $connection = new mysqli("localhost","root","","Cine");
        if($connection->connect_errno){
            echo "<h1>Se produjo un error a la hora de conectarse a la base de datos: $connection->connect_errno</h1>";
        }
        $result=$connection->query("SELECT * FROM comentarios where id_comentario=".$_GET['idd'].";");
		$result2=$connection->query("SELECT usuarios.id_usuario, usuarios.nombre FROM usuarios join comentarios on usuarios.id_usuario=comentarios.id_usuario where comentarios.id_comentario=".$_GET['idd'].";");
		//$result3=$connection->query("SELECT peliculas.id_pelicula, peliculas.titulo FROM peliculas join comentarios on peliculas.id_pelicula=comentarios.id_pelicula where comentarios.id_comentario=".$_GET['idd'].";");

							echo "<form method='post' action='edita_fila.php'>";
							while($obj=$result2->fetch_object()){
								echo "<h3>Editar Comentario de ".$obj->nombre .":</h3>"."</br>";
							}
								echo "<input required value=".$_GET['idd']." type='hidden' name='val1' readonly='readonly'>"."</br>";
								echo "<h3>Contenido:</h3>";
								while($obj2=$result->fetch_object()){
								echo "<textarea required name='val2' placeholder=".$obj2->contenido ." size=32 style='width:400px;height:100px' cols='60' rows='8'></textarea>"."</br>";
							}
							echo "</br>"."<input type='submit' value='Enviar'>";
							echo "</form>";
                    ?>
					<?php endif ?>
</body>
</html>