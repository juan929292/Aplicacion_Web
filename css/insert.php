<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
</head>
<body>
<form action="insert.php" method="post">
<CENTER>
<TABLE BORDER>
<TR>
   <TD>Nombre:</TD>
       <TD> <INPUT TYPE="text" NAME="nombre" SIZE=20 MAXLENGTH=20></TD>
<TR>
   <TD>Clave de Usuario:</TD>
   <TD> <INPUT TYPE="password" NAME="clave" SIZE=20 MAXLENGTH=20></TD>
<TR>
   <TD>Confirmar clave:</TD>
   <TD> <INPUT TYPE="password" NAME="clave_2" SIZE=20 MAXLENGTH=20></TD>
<TR>
<TR>
   <TD>Correo:</TD>
   <TD> <INPUT TYPE="text" NAME="email" SIZE=20 MAXLENGTH=20></TD>
<TR>  
<TR>   
<TR>
   <TH>Pulse aqui:</TH>
   <TD ALIGN=CENTER>
       <INPUT TYPE="submit" name="enviar" VALUE="Enviar datos ">
   </TD>
</TABLE>
</CENTER>
</FORM>
    <?php
        // Conectando, seleccionando la base de datos
        $link = mysql_connect('localhost', 'root', 'asprilla')
    or die('No se pudo conectar: ' . mysql_error());
echo 'Conexion Realizada con Exito '."<br>";
mysql_select_db('Cine') or die('No se pudo seleccionar la base de datos'. mysql_error());

if (isset($_POST['nombre'])) {
$nombre = $_POST['nombre'];
} else {
$nombre = "";
}

if (isset($_POST['clave'])) {
$clave = $_POST['clave'];
} else {
$clave = "";
}

if (isset($_POST['clave_2'])) {
$confirmar_clave = $_POST['clave_2'];
} else {
$confirmar_clave = "";
}

if (isset($_POST['email'])) {
$email = $_POST['email'];
} else {
$email = "";
}

  if (isset($_POST['enviar'])) { 
  $sentencia = "INSERT INTO Usuarios (`id_usuario`, `Nombre`, `Clave`, `Correo`)
  VALUES( NULL,'".$_POST['nombre']."','".$_POST ['clave']."','".$_POST['email']."');"; 
  


  // Ejecuta la sentencia SQL 
 
  $resultado = mysql_query($sentencia,$link); 
  if(!$resultado) 
    die("ERROR: Existe un error en la sentencia o no se pudo realizar la consulta ");

  
  // Cierra la conexión con la base de datos 
  mysql_close($link); 

  }

?>
</body>
</html>