<?php 
    ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comprobante</title>
    <style type="text/css">
        .table_1{border: 1px solid black;}
        table{border-collapse: collapse;}
        .table_2{border: 0px;width: 75%;}
        th, td {padding-right: 10px; padding-left: 10px; text-align: center;}
        body{font-family: Arial, Helvetica, sans-serif;}
    </style>
</head>
<body>
<center>
<h1>Restaurante</h1>
<h2><?php echo $this->cuenta->nombre_restaurante;?></h1>
<p>MESA <?php echo $this->cuenta->mesa;?></p>
<p>Numero de Comprobante: <?php echo $this->num_comprobante;?></p>
<br>
<table class="table_1" align="center">
                <tr>
                    <th class="table_1">Cantidad</th>
                    <th class="table_1">Descripcion</th>
                    <th class="table_1">Precio Unitario</th>
                    <th class="table_1">Subtotal</th>
                </tr>
                <?php
                $total=0;
                    foreach($this->cuenta->productos as $row){
                        $producto = new Producto();
                        $producto = $row;
                        echo"<tr>";
                        echo "<td>".$producto->cantidad."</td>";
                        echo "<td>".$producto->nombre."</td>";
                        echo "<td>$".$producto->precio."</td>";
                        echo "<td>$".(($producto->precio)*($producto->cantidad))."</td>";
                        echo"</tr>";
                        $total = $total + ($producto->precio)*($producto->cantidad);
                    }
                ?>
</table>
<br>
<h1>Total: $<?php echo $total;?></h1>
<br>
<p>Fecha: <?php echo $this->cuenta->fecha;?></p>
<br>
<p><em>Documento no valido como factura.</em></p>
</center>
</body>
</html>


    <?php
     require_once 'libs/dompdf/autoload.inc.php';
    use Dompdf\Dompdf;
    $dompdf = new DOMPDF();
    $dompdf->load_html(ob_get_clean());
    $dompdf->render();
    //$pdf = $dompdf->output();
    //$filename = "comprobante.pdf";
    //file_put_contents($filename, $pdf);
    $dompdf->stream('comprobante_'.$this->num_comprobante.'.pdf', array('Attachment' => true));
    //$dompdf->stream($filename);
    
?>