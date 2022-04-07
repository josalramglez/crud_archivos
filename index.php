<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Archivos</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/style.css" />
</head>
<body>
    <header>
        <h1>CRUD en Archivos .TXT</h1>
    </header>
    <?php
        $f=file("productos.txt");
        function llenar(){
            $f=file("productos.txt");
            $r="";
            for($i=0; $i < count($f); $i++){
                $a=explode(" ",$f[$i]);
                $r.="<option>".$a[0]."</option>";
            }
            return $r;
        } 
        if(isset($_GET["guardar"])){
            $id=$_GET["id"];
            $nombre=$_GET["nombre"];
            $precioCompra=$_GET["precioCompra"];
            $precioVenta=$_GET["precioVenta"];
            $departamento=$_GET["departamento"];
            $v=$id." ".$nombre." ".$precioCompra." ".$precioVenta." ".$departamento.PHP_EOL;
            $fi=fopen("productos.txt", "w+");
            for($i=0; $i < count($f); $i++){
                fwrite($fi,$f[$i]);
            }
            fwrite($fi,$v);
            fclose($fi);
        }
        if(isset($_GET["modificar"])){
            $id=$_GET["id"];
            $nombre=$_GET["nombre"];
            $precioCompra=$_GET["precioCompra"];
            $precioVenta=$_GET["precioVenta"];
            $departamento=$_GET["departamento"];
            $v=$id." ".$nombre." ".$precioCompra." ".$precioVenta." ".$departamento.PHP_EOL;
            $fi=fopen("productos.txt", "w+");
            for($i=0; $i < count($f); $i++){
                $a=explode(" ",$f[$i]);
                     if($a[0]==$id){
                         fwrite($fi,$v);
                     }else{
                         fwrite($fi,$f[$i]);
                     }
            }
            fclose($fi);
        }
        if(isset($_GET["eliminar"])){
            $id=$_GET["id"];
            $fi=fopen("productos.txt", "w+");
            for($i=0; $i < count($f); $i++){
                $a=explode(" ",$f[$i]);
                     if($a[0]!=$id){
                         fwrite($fi,$f[$i]);
                     }
            }
            fclose($fi);
        }
        
    ?>
    <section>
        <div id="izquierda">
        <img src="./img/1.jpg" width="600">
        </div>
    
        <div class="column col-md-5" id="derecha">
            <form action="#">
                <select name="id" class="form-control">
                    <?php echo llenar(); ?>
                </select>
                <input type="submit" name="b1" value="Leer" class="btn btn-primary">
            </form>
            <?php 
             $id="";
             $nombre="";
             $precioCompra="";
             $precioVenta="";
             $departamento="";
             if(isset($_GET["b1"])){
                 $b=$_GET["id"];
                 for($i=0; $i < count($f); $i++){
                     $a=explode(" ",$f[$i]);
                     if($a[0]==$b){
                         $id=$a[0];
                         $nombre=$a[1];
                         $precioCompra=$a[2];
                         $precioVenta=$a[3];
                         $departamento=$a[4];
                     }
                 }
             }
            ?><br/>
            <form action="#">
                Código de Barras<input type="text" value="<?=$id ?>" name="id" id="id" class="form-control"><br/>
                Nombre del Producto<input type="text" value="<?=$nombre ?>" name="nombre" id="nombre" class="form-control"><br/>
                Precio de Compra<input type="text" value="<?=$precioCompra ?>" name="precioCompra" id="precioCompra" class="form-control"><br/>
                Precio de Venta<input type="text" value="<?=$precioVenta ?>" name="precioVenta" id="precioVenta" class="form-control"><br/>
                Departamento<input type="text" value="<?=$departamento ?>" name="departamento" id="departamento" class="form-control"><br/>
                <!--input type="button" onclick="$('#id').val('');$('#nombre').val('');$('#precioCompra').val('');$('#precioVenta').val('');$('#departamento').val('');" value="Limpiar" name="" class="btn btn-outline-secondary"-->
                <input type="submit" name="guardar" value="Crear" class="btn btn-outline-success">
                <input type="submit" name="modificar" value="Modificar" class="btn btn-outline-warning">
                <input type="submit" name="eliminar" value="Eliminar" class="btn btn-outline-info">

            </form>

        </div>
        
    </section>
</body>
</html>