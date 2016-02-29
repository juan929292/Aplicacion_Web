<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">

  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
</head>

<body class ="card-panel #00897b teal lighten-5">
   <div class="container">
    <?php if (!isset($_POST["matri"])) : ?>
        <form method="post" action="#">
            <table class="card-panel white" style="width:600px; margin:0 auto;">
              <thead>
            <td class ="card-panel #00897b teal darken-1
 white-text center" style="font-size:25px;" colspan="6">Modificar reparación</td>
        </thead>
                <tr>
                    <td>Matricula:
                        
                    <?php
                       //echo "<td><a href='editar.php?id=$obj->IdReparacion&mat=$obj->Matricula&fent=$obj->FechaEntrada&km=$obj->Km$av=$obj->Averia$fsal=$obj->FechaSalida&$obs=obj->Observaciones'><img width=26 src='/imagenes/lapiz.png'/></a></td>"
                       $connection = new mysqli("localhost","root","","talleresfaber");
                        if($connection->connect_errno){
                            echo "<h1>Se produjo un error a la hora de conectarse a la base de datos: $connection->connect_errno</h1>";
                        }
                
                       $consulta_mysql='select Matricula from VEHICULOS';
                       $result=$connection->query($consulta_mysql);
                        
                       $mat = $_GET['mat'];
                       echo "<select name='matri' class='browser-default'>";
                       while($obj=$result->fetch_object()){
                            if($mat==$obj->Matricula){
                                echo "<option value='".$obj->Matricula."' selected>".$obj->Matricula."</option>";
                            }else{
                                echo "<option value='".$obj->Matricula."'>".$obj->Matricula."</option>";
                            }
                        }
                        echo "</select>";  
                        $result->close();
                        unset($obj);
                        unset($connection);
                        
                      $obs = $_GET['obs'];
                      $av = $_GET['av'];
                      $fent = $_GET['fent'];
                      $fsal= $_GET['fsal'];
                      $km = $_GET['km'];
                      $id = $_GET["id"];
                      $rep = $_GET["rep"];
                    
                    echo '</td>
                    <td>Fecha de Entrada: <input required type="date" name="fentrada" value="'.$fent.'" > </td>
                </tr>
                <tr>
                    <td>Km: <input required type="number" name="km" value='.$km.' ></td>
                    <td>Fecha de Salida: <input type="date" name="fsalida" value="'.$fsal.'"> </td>
                </tr>
                <tr>
                    <td colspan=2>Averia: <textarea required name="averia" style="height100px;" value="'.$av.'">'.$av.'</textarea></td></tr><tr>
                    
                    <td>Reparado:<br><br>';
                if($rep==1){
                    echo '<input  name="rep" value="1" type="radio" id="rep1" checked />
                    <label for="rep1">Si</label>
                    <input  name="rep" value="0" type="radio" id="rep2"/>
                    <label for="rep2">No</label>';
                }else{
                       echo '<input  name="rep" value="1" type="radio" id="rep1" />
                        <label for="rep1">Si</label>
                        <input  name="rep" value="0" type="radio" id="rep2" checked/>
                        <label for="rep2">No</label>'; 
                }
                echo '</td>
                </tr>
                <tr>
                    
                        <td colspan=2>Observaciones: <textarea  style="height100px;" required name="obs" value="'.$obs.'">'.$obs.'</textarea> </td>
                </tr>
             <input type="hidden" name="id" value="'.$id.'">
             <tr>
                    <td colspan="2"><input class="waves-effect waves-light btn" style="margin-left:35%" type="submit" name="send" value="enviar"></td>
                </tr></table>';
        ?>
        <?php else: ?>

        <?php
            $matri=$_POST['matri'];
            $fent=$_POST['fentrada'];
            $fsal=$_POST['fsalida'];
            $km=$_POST['km'];
            $averia=$_POST['averia'];
            $rep=$_POST['rep'];
            $obs= $_POST['obs'];
            $id= $_POST['id'];
        
         
            $connection = new mysqli("localhost","root","","talleresfaber");
                        if($connection->connect_errno){
                            echo "<h1>Se produjo un error a la hora de conectarse a la base de datos: $connection->connect_errno</h1>";
            } 
            $consulta="UPDATE REPARACIONES SET IdReparacion=$id,Matricula='$matri', FechaEntrada='$fent', Km=$km, Averia='$averia' ,FechaSalida='$fsal' ,Observaciones='$obs',  Reparado = $rep WHERE IdReparacion=$id";
            echo $consulta."<br>";
        
            
            if($connection->query($consulta)==true){
                echo "perfe";
                header('Location: reparaciones.php');
            }else{
                echo $connection->error;   
            }
            unset($connection);

        ?>
                </div>
      <?php endif ?>
</body>
</html>
