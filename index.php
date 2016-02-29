<?php 
session_start();
?>
<html>
<head> 
    <title>Film Review</title>
    <link href="css/general.css" rel="stylesheet" type="text/css" />
</head>
<body>

   <div id="page">
        <div id="header">  
			<div id="login">
<<<<<<< HEAD:Proyecto/index.php
				<h2>Bienvenido <?phpecho $_SESSION['nombresesion'];?></h2>
				</br>

				<h3><p><a href="login.php">Inicia Sesi&oacute;n</a> ó <a href="registro.php">reg&iacute;strate</a></p></h3>
			</div>
		</div>
        <div id="main">
		<div id="sidebaraso">
            <div id="sidebar">
                <h2>Men&uacute;</h2>
                <ul>
                    <li><a href="index.php">Inicio</a></li>
					<li><a href="administracion_bd.php">Panel Administraci&oacute;n</a></li>
					
                </ul>
                <h2>G&eacute;neros</h2>
				<?php
                echo "<ul>";
					echo "<li><a href='peliculas_genero.php?id=Accion'>Acci&oacute;n</a></li>";
                    echo "<li><a href='peliculas_genero.php?id=Aventura'>Aventura</a></li>";
                    echo "<li><a href='peliculas_genero.php?id=Belico'>B&eacute;lico</a></li>";   
                    echo "<li><a href='peliculas_genero.php?id=Comedia'>Comedia</a></li>";
                    echo "<li><a href='peliculas_genero.php?id=Thriller'>Thriller</a></li>";
				echo "</ul>";
				?>
            </div>
		</div>
				<div id="contenido">
						<?php
					$connection = new mysqli("localhost","root","","Cine");
						if($connection->connect_errno){
							echo "<h1>Se produjo un error a la hora de conectarse a la base de datos: $connection->connect_errno</h1>";
						}
					$result=$connection->query("SELECT * FROM peliculas");
						while($obj=$result->fetch_object()){
						echo "<div class='cajas'>";
						echo "<h4>$obj->titulo</h4>";
						echo "<a href='ficha_pelicula.php?id=".$obj->id_pelicula ."'>".$obj->imagen;
						echo "</div>";
						};
						?>
						</div>
        </div>
=======
				<h4>Bienvenido </h4>
				</br>
				<h4><a href="">Iniciar Sesion</a> o <a href="">regístrate</a></h4>
			</div>
		</div>
        <div id="main">
            <div id="sidebar">
                <h2>Menu</h2>
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="mas_votadas.php">Pelicula + Votada</a></li>    
                </ul>
                <h2>Genero</h2>
                <ul>
                    <li><a href="accion.php">Accion</a></li>
                    <li><a href="aventura.php">Aventura</a></li>
                    <li><a href="animacion.php">Animacion</a></li>
                    <li><a href="belico.php">Belico</a></li>    
                    <li><a href="comedia.php">Comedia</a></li> 
                    <li><a href="drama_romance.php">Drama & Romance</a></li>
                    <li><a href="thriller.php">Thriller</a></li>
                    <li><a href="terror.php">Terror</a></li>
            </div><!-- sidebar -->
				<div id="contenido">
				</div>
        </div><!-- main -->
>>>>>>> 35f18074de07e4aea7ce236a694900ec197bc869:index.php
        <div id="footer">
            <div id="footerleft">
          
            </div>
            <div id="footerright">
                <p>Copyright &copy; 2016, Desarrollada por <a href="">Velasco</a></p>
            </div>
		</div>
	</div>
<<<<<<< HEAD:Proyecto/index.php
=======


>>>>>>> 35f18074de07e4aea7ce236a694900ec197bc869:index.php
</body>
</html>