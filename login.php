<!DOCTYPE html>
<html lang="">
<head>
    <title></title>
</head>
<body class ="card-panel #00897b teal lighten-5">
   <div class="container">
        <form method="post" action="#">
            <table class="card-panel white" style="width:600px; margin:0 auto;">
              <thead>
            <td class ="card-panel #00897b teal darken-1
 white-text center" style="font-size:25px;" colspan="6">Añadir <?php echo $_GET["id"]?></td>
        </thead>
                <tr>

                    <?php
                       $connection = new mysqli("localhost","root","","talleresfaber");
                        if($connection->connect_errno){
                            echo "<h1>Se produjo un error a la hora de conectarse a la base de datos: $connection->connect_errno</h1>";
                        } 
                       $consulta_mysql='select * from $_GET["id"]';
                       $result=$connection->query($consulta_mysql);

                       echo "<select class='browser-default' name='matri'>";
                       while($obj=$result->fetch_object()){
                            echo "<option value='".$obj->Matricula."'>".$obj->Matricula."</option>";
                        }
                        echo "</select>";  
                        $result->close();
                        unset($obj);
                        unset($connection);
    
                    ?> 
                    </td>
                </tr>
                <tr>    
                    <td>Fecha de Entrada:</td><td><input required type="date" name="fentrada"> </td>
                </tr>
                <tr>
                    <td>Km:</td><td> <input required type="number" name="km"></td>
                </tr>
                <tr>
                    <td>Fecha de Salida:</td><td><input required type="date" name="fsalida"> </td>
                </tr>
                <tr>
                    <td>Averia:</td> <td><input required type="text" name="averia"></td>
                </tr>
                <tr>
                    <td>Reparado: </td>
                        <td><input  name="rep" value="1" type="radio" id="rep1" checked />
                        <label for="rep1">Si</label>
                        <input  name="rep" value="0" type="radio" id="rep2"/>
                        <label for="rep2">No</label>
                    </td>
                </tr>
                <tr>
                    <td>Observaciones:</td><td> <input required type="text" name="obs"> </td>
                </tr>
                <tr>
                    <td colspan="2"><input class="waves-effect waves-light btn" style="margin-left:35%" type="submit" name="send" value="enviar"></td>
                </tr>
            </table>
        
        </form>
        <?php else: ?>
        <?php
            $matri=$_POST['matri'];
            $fent=$_POST['fentrada'];
            $fsal=$_POST['fsalida'];
            $km=$_POST['km'];
            $averia=$_POST['averia'];
            $rep=$_POST['rep'];
            $obs= $_POST['obs'];
        
            //$fent = date('Y-m-d',$fent);
            //$fsal = date('Y-m-d',$fsal);
            
            //echo strtotime($fent);
            //echo strtotime($fsal);

            //$fent = strtotime($fent);
           // $fsal = strtotime($fsal);

            //echo $matri;
            //echo $fent;
            //echo $fsal;
            //echo $km;
            //echo $averia;
            //echo $rep;
            //echo $obs;   
         
            $connection = new mysqli("localhost","root","","talleresfaber");
                        if($connection->connect_errno){
                            echo "<h1>Se produjo un error a la hora de conectarse a la base de datos: $connection->connect_errno</h1>";
            } 
    
            //$consulta="INSERT INTO REPARACIONES (IdReparacion,Matricula, FechaEntrada, FechaSalida, Km, Averia ,Observaciones) VALUES(NULL,$matri,$fent,$fsal,$km,$averia,$obs)";
    
            $consulta="INSERT INTO REPARACIONES (IdReparacion,Matricula, FechaEntrada, Km, Averia ,FechaSalida ,Observaciones) VALUES(NULL,'$matri','$fsal',$km,'$averia','$fent','$obs')";
            echo $consulta."<br>";
        
            
            if($connection->query($consulta)==true){
                echo "perfe";
            }else{
                echo $connection->error;   
            }
            unset($connection);

            header('Location: reparaciones.php');
        ?>

      <?php endif ?>
    </div>
</body>
</html>
