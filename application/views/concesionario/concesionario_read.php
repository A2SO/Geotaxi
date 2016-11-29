<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Concesionario Read</h2>
        <table class="table">
	    <tr><td>Nombre</td><td><?php echo $nombre; ?></td></tr>
	    <tr><td>Ape Pat</td><td><?php echo $ape_pat; ?></td></tr>
	    <tr><td>Ape Mat</td><td><?php echo $ape_mat; ?></td></tr>
	    <tr><td>Direccion</td><td><?php echo $direccion; ?></td></tr>
	    <tr><td>Telefono</td><td><?php echo $telefono; ?></td></tr>
	    <tr><td>Correo</td><td><?php echo $correo; ?></td></tr>
	    <tr><td>Contrasena</td><td><?php echo $contrasena; ?></td></tr>
	    <tr><td>Direccion Doc</td><td><?php echo $direccion_doc; ?></td></tr>
	    <tr><td>Estatus</td><td><?php echo $descripcion; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('concesionario') ?>" class="btn btn-default">Cancelar</a></td></tr>
	</table>
        </body>
</html>