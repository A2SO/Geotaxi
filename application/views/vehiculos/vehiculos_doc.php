<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Vehiculos List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Placa</th>
		<th>Niv</th>
		<th>Numeroeconomico</th>
		<th>Marca</th>
		<th>Modelo</th>
		<th>Tarjetacirculacion</th>
		<th>Idconcesinario</th>
		<th>Idconductor</th>
		<th>Clave</th>
		
            </tr><?php
            foreach ($vehiculos_data as $vehiculos)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $vehiculos->placa ?></td>
		      <td><?php echo $vehiculos->niv ?></td>
		      <td><?php echo $vehiculos->numeroeconomico ?></td>
		      <td><?php echo $vehiculos->marca ?></td>
		      <td><?php echo $vehiculos->modelo ?></td>
		      <td><?php echo $vehiculos->tarjetacirculacion ?></td>
		      <td><?php echo $vehiculos->idconcesinario ?></td>
		      <td><?php echo $vehiculos->idconductor ?></td>
		      <td><?php echo $vehiculos->clave ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>