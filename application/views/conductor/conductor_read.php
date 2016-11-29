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
        <h2 style="margin-top:0px">Conductor Read</h2>
        <table class="table">
	    <tr><td>Nombre Conductor</td><td><?php echo $nombre_conductor; ?></td></tr>
	    <tr><td>Ap Conductor</td><td><?php echo $ap_conductor; ?></td></tr>
	    <tr><td>Am Conductor</td><td><?php echo $am_conductor; ?></td></tr>
	    <tr><td>Correo Conductor</td><td><?php echo $correo_conductor; ?></td></tr>
	    <tr><td>Contrasena</td><td><?php echo $contrasena; ?></td></tr>
	    <tr><td>Push C</td><td><?php echo $push_c; ?></td></tr>
	    <tr><td>Permisoconducir</td><td><?php echo $permisoconducir; ?></td></tr>
	    <tr><td>Iniciohorario</td><td><?php echo $iniciohorario; ?></td></tr>
	    <tr><td>Finhorario</td><td><?php echo $finhorario; ?></td></tr>
	    <tr><td>Latitud</td><td><?php echo $latitud; ?></td></tr>
	    <tr><td>Longitud</td><td><?php echo $longitud; ?></td></tr>
	    <tr><td>Estatus</td><td><?php echo $descripcion; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('conductor') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>