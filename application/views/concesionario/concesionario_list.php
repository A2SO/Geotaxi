<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <!--<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>-->
    </head>
    <body>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Concesionario </h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('concesionario/create'), 'Create', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('concesionario/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('concesionario/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Nombre</th>
		    <th>Ape Pat</th>
		    <th>Ape Mat</th>
		    <th>Direccion</th>
		    <th>Telefono</th>
		    <th>Correo</th>
		    <th>Contrase&ntilde;a</th>
		    <th>Direccion Doc</th>
		    <th>Estatus</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
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
		    <td><?php echo $concesionario->descripcion ?></td>
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('concesionario/read/'.$concesionario->idconcesinario),'Detalles'); 
			echo ' | '; 
			echo anchor(site_url('concesionario/update/'.$concesionario->idconcesinario),'Modificar'); 
			echo ' | '; 
			echo anchor(site_url('concesionario/delete/'.$concesionario->idconcesinario),'Eliminar','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>
    </body>
</html>