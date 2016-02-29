<!DOCTYPE html>
<head>
    <title></title>
</head>

   <div>
    <?php if (isset($_GET["id"])) : ?>
		<h2>Añadir <?php echo $_GET["id"]?></h2>
                    <?php
                       $connection = new mysqli("localhost","root","","Cine");
                        if($connection->connect_errno){
                            echo "<h1>Se produjo un error a la hora de conectarse a la base de datos: $connection->connect_errno</h1>";
                        } 
                       $consulta_mysql="select * from ".$_GET["id"];
                       $result=$connection->query($consulta_mysql);
						$registro = mysqli_fetch_fields($result);
						$variable=[];
						for($i=0;$i<count($result);$i++){
							foreach($registro as $valor){
							$variable[] = $valor->name;
							};
						};
							echo "<form action='inserta_bd.php'>";
						for($i=1;$i<count($variable);$i++){
							echo "<h3>".$variable[$i].": </h3>";
							echo "<input type='text' name='".$variable[$i]."'>"."</br>";
						};	
						echo "</br>"."<input type='submit' value='Enviar'>";
						echo "</form>";
						$_POST=$variable;
                        $result->close();
                        unset($connection);
                    ?>
					<?php else: ?>
					<?php
					$value=[];
						for($i=1;$i<count($_POST);$i++){
							$value[$i] = $_POST[$_POST[$i]];
						};
						var_dump($value);
					?>
					<?php endif ?>
    </div>
</body>
</html>