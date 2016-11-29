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
        <h2>Conductor List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nombre Conductor</th>
		<th>Ap Conductor</th>
		<th>Am Conductor</th>
		<th>Correo Conductor</th>
		<th>Contrasena</th>
		<th>Push C</th>
		<th>Permisoconducir</th>
		<th>Iniciohorario</th>
		<th>Finhorario</th>
		<th>Latitud</th>
		<th>Longitud</th>
		<th>Clave</th>
		
            </tr><?php
            foreach ($conductor_data as $conductor)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $conductor->nombre_conductor ?></td>
		      <td><?php echo $conductor->ap_conductor ?></td>
		      <td><?php echo $conductor->am_conductor ?></td>
		      <td><?php echo $conductor->correo_conductor ?></td>
		      <td><?php echo $conductor->contrasena ?></td>
		      <td><?php echo $conductor->push_c ?></td>
		      <td><?php echo $conductor->permisoconducir ?></td>
		      <td><?php echo $conductor->iniciohorario ?></td>
		      <td><?php echo $conductor->finhorario ?></td>
		      <td><?php echo $conductor->latitud ?></td>
		      <td><?php echo $conductor->longitud ?></td>
		      <td><?php echo $conductor->clave ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>