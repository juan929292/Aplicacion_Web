<html>
<head>
    <title></title>
</head>
<body>
				<?php
        $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
                        if($connection->connect_errno){
                            echo "<h1>Se produjo un error a la hora de conectarse a la base de datos: $connection->connect_errno</h1>";
								}
							$idusu=$_POST['val1'];
							$nomb=$_POST['val2'];
							$cont=$_POST['val3'];
							$corr=$_POST['val4'];
							$tip=$_POST['val5'];

								$consulta="update Usuarios set nombre='$nomb',contrasena='$cont',correo='$corr',tipo='$tip' WHERE id_usuario=$idusu;";
								echo "</br>";
								if($connection->query($consulta)==true){
									echo "<h2>Actualizacion realizada correctamente, Redireccionando...</h2>";
								}else{
									echo $connection->error;   
								}
								unset($connection);

								header('Refresh:5; url=/Proyecto/sql/Usuarios/resultado.php',True,303);
					?>
								
</body>
</html>
