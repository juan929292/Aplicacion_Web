<html>
<?php
session_start();
?>
<head> 
    <title>Film Review</title>
</head>
<body>
   <div id="page">
	<div id="info1" style="">
		    <?php
        //conexion a la base de datos-peliculas
        $connection = new mysqli("localhost","root","","Cine");
        if($connection->connect_errno){
            echo "<h1>Se produjo un error a la hora de conectarse a la base de datos: $connection->connect_errno</h1>";
        }
        $result=$connection->query("SELECT * FROM peliculas");

echo "<h3>"."<a href='inserta_bd.php?id=0'><img width=40 src='/proyecto/img/inserta.jpg'/></a>"."Peliculas</h3>";
		?>
		<table class="centered bordered card-panel white"  style="text-align:center;">
            <tr class="card-panel teal lighten-2 white-text" style="font-weight:bold">
                <td>Id Pelicula</td>
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
                echo "<td><a href='edita_bd.php?id=$obj->id_pelicula'><img width=26 src='/proyecto/img/edita.png'/></a></td>";
                echo "<td><a href='borra_bd.php?id=$obj->id_pelicula'><img width=26 src='/proyecto/img/borra.png'/></a></td>";
                echo "</tr>";   
            }
            $result->close();
            unset($obj);
            unset($connection);
        ?>
        <tr>
        </tr>
        </table>
	</div>
	<div id="info2">
		<?php
        //conexion a la base de datos-directores
        $connection = new mysqli("localhost","root","","Cine");
        if($connection->connect_errno){
            echo "<h1>Se produjo un error a la hora de conectarse a la base de datos: $connection->connect_errno</h1>";
        }
        $result=$connection->query("SELECT * FROM directores");

			echo "<h3>"."<a href='inserta_bd.php?id=0'><img width=40 src='/proyecto/img/inserta.jpg'/></a>"."Directores</h3>";
		?>
		<table class="centered bordered card-panel white"  style="text-align:center;">
            <tr class="card-panel teal lighten-2 white-text" style="font-weight:bold">
                <td>Id Director</td>
                <td>Nombre</td>
                <td>Pais</td>
            </tr>
            
        <?php
            while($obj=$result->fetch_object()){
                echo "<tr>";
                echo "<td>$obj->id_director</td>";
                echo "<td>$obj->nombre</td>";
                echo "<td>$obj->pais</td>";
                echo "<td><a href='edita_bd.php?id=$obj->id_director'><img width=26 src='/proyecto/img/edita.png'/></a></td>";
                echo "<td><a href='borra_bd.php?id=$obj->id_director'><img width=26 src='/proyecto/img/borra.png'/></a></td>";
                echo "</tr>";   
            }
		?>
        </table>
	</div>
	<div id="info3">
				<?php
        //conexion a la base de datos-generos
        $connection = new mysqli("localhost","root","","Cine");
        if($connection->connect_errno){
            echo "<h1>Se produjo un error a la hora de conectarse a la base de datos: $connection->connect_errno</h1>";
        }
        $result=$connection->query("SELECT * FROM generos");

			echo "<h3>"."<a href='inserta_bd.php?id=0'><img width=40 src='/proyecto/img/inserta.jpg'/></a>"."Generos</h3>";
		?>
		<table class="centered bordered card-panel white"  style="text-align:center;">
            <tr class="card-panel teal lighten-2 white-text" style="font-weight:bold">
                <td>Id genero</td>
                <td>Nombre</td>
            </tr>     
        <?php
            while($obj=$result->fetch_object()){
                echo "<tr>";
                echo "<td>$obj->id_genero</td>";
                echo "<td>$obj->nombre</td>";
                echo "<td><a href='edita_bd.php?id=$obj->id_genero'><img width=26 src='/proyecto/img/edita.png'/></a></td>";
                echo "<td><a href='borra_bd.php?id=$obj->id_genero'><img width=26 src='/proyecto/img/borra.png'/></a></td>";
                echo "</tr>";   
            }
		?>
		</table>
	</div>
	<div id="info4">
		<h3>Comentarios</h3>
	</div>
	
	<div id="info5">
		<h3>Valoraciones</h3>
	</div>
	<div id="info6">
	<?php
        //conexion a la base de datos-usuarios
        $connection = new mysqli("localhost","root","","Cine");
        if($connection->connect_errno){
            echo "<h1>Se produjo un error a la hora de conectarse a la base de datos: $connection->connect_errno</h1>";
        }
        $result=$connection->query("SELECT * FROM usuarios");

			echo "<h3>"."<a href='inserta_bd.php?id=0'><img width=40 src='/proyecto/img/inserta.jpg'/></a>"."Usuarios</h3>";
		?>
		<table class="centered bordered card-panel white"  style="text-align:center;">
            <tr class="card-panel teal lighten-2 white-text" style="font-weight:bold">
                <td>Id Usuario</td>
                <td>Nombre</td>
                <td>Contraseña</td>
                <td>Correo</td>
                <td>Tipo</td>
            </tr>
            
        <?php
            while($obj=$result->fetch_object()){
                echo "<tr>";
                echo "<td>$obj->id_usuario</td>";
                echo "<td>$obj->nombre</td>";
                echo "<td>$obj->contrasena</td>";
                echo "<td>$obj->correo</td>";
                echo "<td>$obj->tipo</td>";
                echo "<td><a href='edita_bd.php?id=$obj->id_usuario'><img width=26 src='/proyecto/img/edita.png'/></a></td>";
                echo "<td><a href='borra_bd.php?id=$obj->id_usuario'><img width=26 src='/proyecto/img/borra.png'/></a></td>";
                echo "</tr>";   
            }
            $result->close();
            unset($obj);
            unset($connection);
		?>
		</table>
	</div>
	</div>
</body>
</html>