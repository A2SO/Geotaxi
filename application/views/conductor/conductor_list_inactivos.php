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
                <h2 style="margin-top:0px">Conductor</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('conductor/create'), 'Create', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('conductor/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('conductor/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <!--<th width="80px">No</th>-->
		    <th>Nombre Conductor</th>
		    <th>Ap Conductor</th>
		    <th>Am Conductor</th>
		    <!--<th>Correo Conductor</th>
		    <th>Contrasena</th>
		    <th>Push C</th>-->
		    <th>Permisoconducir</th>
		    <th>Iniciohorario</th>
		    <th>Finhorario</th>
		    <!--<th>Latitud</th>
		    <th>Longitud</th>-->
		    <th>Estatus</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($conductor_data as $conductor)
            {
                ?>
                <tr>
		    <!--<td><?php #echo ++$start ?><!--</td> -->
		    <td><?php echo $conductor->nombre_conductor ?></td>
		    <td><?php echo $conductor->ap_conductor ?></td>
		    <td><?php echo $conductor->am_conductor ?></td>
		    <!--<td><?php #echo $conductor->correo_conductor ?><!--</td>-->
		    <!--<td><?php #echo $conductor->contrasena ?><!--</td>-->
		    <!--<td><?php #echo $conductor->push_c ?><!--</td>-->
		    <td><?php echo $conductor->permisoconducir ?></td>
		    <td><?php echo $conductor->iniciohorario ?></td>
		    <td><?php echo $conductor->finhorario ?></td>
		    <!--<td><?php #echo $conductor->latitud ?><!--</td>-->
		    <!--<td><?php #echo $conductor->longitud ?><!--</td>-->
		    <td><?php echo $conductor->descripcion ?></td>
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('conductor/read/'.$conductor->idconductor),'Read'); 
			echo ' | '; 
			echo anchor(site_url('conductor/update/'.$conductor->idconductor),'Update'); 
			echo ' | '; 
			echo anchor(site_url('conductor/delete/'.$conductor->idconductor),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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