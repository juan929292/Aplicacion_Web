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
        $result=$connection->query("SELECT * FROM peliculas");

echo "<h3>Borrar Pelicula</h3>";
		?>
		<table class="centered bordered card-panel white"  style="text-align:center;">
            <tr class="card-panel teal lighten-2 white-text" style="font-weight:bold">
                <td>Id_Pelicula</td>
                <td>Titulo</td>
                <td>Duracion</td>
                <td>Año</td>
                <td>nota_media</td>
                <td>imagen</td>
            </tr>
            
        <?php
            while($obj=$result->fetch_object()){
                echo "<tr>";
                echo "<td>$obj->id_pelicula</td>";
                echo "<td>$obj->titulo</td>";
                echo "<td>$obj->duracion</td>";
                echo "<td>$obj->anio</td>";
                echo "<td>$obj->nota_media</td>";
                echo "<td>$obj->imagen</td>";
                echo "<td><a href='borra_bd.php?idd=$obj->id_pelicula'><img width=26 src='/proyecto/img/borra.png'/></a></td>";
                echo "</tr>";   
            }
        ?>
        </table>
	</div>
	<?php else: ?>
				<?php
        $connection = new mysqli("localhost","root","","Cine");
                        if($connection->connect_errno){
                            echo "<h1>Se produjo un error a la hora de conectarse a la base de datos: $connection->connect_errno</h1>";
								}
								$idpeli=$_GET['idd'];
								$consulta="DELETE FROM Peliculas WHERE id_pelicula=$idpeli;";
								echo "</br>";
								if($connection->query($consulta)==true){
									echo "<h2>Borrado realizado correctamente, Redireccionando...</h2>";
								}else{
									echo $connection->error;   
								}
								unset($connection);

								header('Refresh:3; url=/Proyecto/sql/Peliculas/resultado.php',True,303);
					?>
								<?php endif ?>
</body>
</html>
