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
        $result=$connection->query("SELECT * FROM usuarios");

echo "<h3>Editar Usuario</h3>";
		?>
		<table class="centered bordered card-panel white"  style="text-align:center;">
            <tr class="card-panel teal lighten-2 white-text" style="font-weight:bold">
                <td>Id_Usuario</td>
                <td>Nombre</td>
                <td>Contrasena</td>
                <td>Correo</td>
                <td>tipo</td>
            </tr>
            
        <?php
            while($obj=$result->fetch_object()){
                echo "<tr>";
                echo "<td>$obj->id_usuario</td>";
                echo "<td>$obj->nombre</td>";
                echo "<td>$obj->contrasena</td>";
                echo "<td>$obj->correo</td>";
                echo "<td>$obj->tipo</td>";
                echo "<td><a href='edita_bd.php?idd=$obj->id_usuario'><img width=26 src='/proyecto/img/edita.png'/></a></td>";
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
        $result=$connection->query("SELECT * FROM usuarios where id_usuario=".$_GET['idd'].";");
							echo "<form method='post' action='edita_fila.php' onsubmit='return checkForm(this);'>";
							while($obj=$result->fetch_object()){
								echo "<h3>Editar Usuario: ".$obj->nombre ."</h3>";
								echo "<input required type='hidden' value=".$obj->id_usuario ." name='val1' readonly='readonly'>"."</br>";
								echo "<h3>Nombre:</h3>";
								echo "<input required pattern='\w+' type='text' placeholder="."'".$obj->nombre ."'"." name='val2'>"."</br>";
								echo "<h3>contrasena:</h3>";
								echo "<input required type='password' title='La contrasena debe contener al menos 6 caracteres, incluyendo minusculas, mayusculas y numeros' pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}' onchange='this.setCustomValidity(this.validity.patternMismatch ? this.title : '');
  if(this.checkValidity()) form.pwd2.pattern = this.value;' name='val3'>"."</br>";
								echo "<h3>confirmar contrasena:</h3>";
								echo "<input required type='password' title='Por favor introduzca la misma contrasena que antes' pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}' name='pwd2' onchange=".'"'."
  this.setCustomValidity(this.validity.patternMismatch ? this.title : '');>".'"'."</br>";
								echo "<h3>Correo:</h3>";
								echo "<input required type='email' placeholder="."'".$obj->correo ."'"." name='val4'>"."</br>";
								echo "<h3>Tipo de usuario:</h3>";
								echo "<select required multiple placeholder="."'".$obj->tipo ."'"." name='val5'>";
								echo "<option value='admin'>Administrador</option>";
								echo "<option value='estandar'>Estandar</option>";
								echo " </select></br>";
							echo "</br>"."<input type='submit' value='Enviar'>";
							}
							echo "</form>";
                    ?>
					<?php endif ?>
</body>
</html>