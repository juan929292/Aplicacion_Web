<!DOCTYPE html>
<head>
    <title></title>
</head>

   <div>
    <?php if (!isset($_POST["val2"])) : ?>
		<h2>Añadir Pelicula</h2>
                    <?php
							echo "<form method='post' enctype='multipart/form-data' action='inserta_bd.php'>";
								//	id_pelicula	
								echo "<input required value='NULL' type='hidden' name='val1' readonly='readonly'>"."</br>";
								echo "<h3>titulo:</h3>";
								echo "<input required type='text' name='val2'>"."</br>";
								echo "<h3>duracion:</h3>";
								echo "<input required type='text' name='val3'>"."</br>";
								echo "<h3>anio:</h3>";
								echo "<input required type='text' name='val4'>"."</br>";
								//	nota_media
								echo "<input type='hidden' value='0' name='val5'>"."</br>";
								echo "<h3>imagen:</h3>";
								echo "<input type='hidden' name='MAX_FILE_SIZE' value='30000'/>";
								echo "<input type='file' name='val6'>"."</br>";
							echo "</br>"."<input type='submit' value='Enviar'>";
							echo "</form>";
                    ?>
					<?php else: ?>
					<?php
							$id=$_POST['val1'];
							$tit=$_POST['val2'];
							$dur=$_POST['val3']." min";
							$ani=$_POST['val4'];
							$not=$_POST['val5'];
							$img=$_POST['val6'];
							//$img= '"'."<img width='150' height='200' src='/Proyecto/img/".$_POST['val6']."'>".'"';
							
							


							echo '<pre>';
							if (move_uploaded_file($_FILES[$img]['tmp_name'],'/Proyecto/img/'.$_FILES[$img]['name'])) {
								echo "El fichero es válido y se subió con éxito.\n";
							} else {
								echo "¡Posible ataque de subida de ficheros!\n";
							}

							echo 'Más información de depuración:';
							print_r($_FILES);

							print "</pre>";
							
							//echo $id."</br>";
							//echo $tit."</br>";
							//echo $dur."</br>";
							//echo $ani."</br>";
							//echo $not."</br>";
							//echo $img."</br>";
							
						/*	$connection = new mysqli("localhost","root","","Cine");
                        if($connection->connect_errno){
                            echo "<h1>Se produjo un error a la hora de conectarse a la base de datos: $connection->connect_errno</h1>";
								} 
								$consulta="insert into peliculas(id_pelicula,titulo,duracion,anio,nota_media,imagen) VALUES($id,'$tit','$dur',$ani,$not,$img);";
								echo $consulta."</br>";
								if($connection->query($consulta)==true){
									echo "Inserción realizada correctamente";
									
								}else{
									echo $connection->error;   
								}
								header('Refresh:3; url=/Proyecto/sql/Peliculas/resultado.php',True,303);		*/		
						?>
					<?php endif ?>
    </div>
</body>
</html>