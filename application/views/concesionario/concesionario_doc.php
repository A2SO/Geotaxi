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
        <h2>Concesionario List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nombre</th>
		<th>Ape Pat</th>
		<th>Ape Mat</th>
		<th>Direccion</th>
		<th>Telefono</th>
		<th>Correo</th>
		<th>Contrasena</th>
		<th>Direccion Doc</th>
		<th>Clave</th>
		
            </tr><?php
            foreach ($concesionario_data as $concesionario)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $concesionario->nombre ?></td>
		      <td><?php echo $concesionario->ape_pat ?></td>
		      <td><?php echo $concesionario->ape_mat ?></td>
		      <td><?php echo $concesionario->direccion ?></td>
		      <td><?php echo $concesionario->telefono ?></td>
		      <td><?php echo $concesionario->correo ?></td>
		      <td><?php echo $concesionario->contrasena ?></td>
		      <td><?php echo $concesionario->direccion_doc ?></td>
		      <td><?php echo $concesionario->clave ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>