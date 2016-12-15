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
                <h2 style="margin-top:0px">Lista de Vehiculos con información Completa</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('vehiculos/create'), 'Crear', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('vehiculos/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('vehiculos/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Placa</th>
		    <th>Niv</th>
		    <th>Numeroeconomico</th>		    
		    <th>Tarjeta Circulacion</th>	
            <th>Concesionario</th> 	  
            <th>Conductor</th> 
		    <th>Estatus</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($vehiculos_data as $vehiculos)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $vehiculos->placa ?></td>
		    <td><?php echo $vehiculos->niv ?></td>
		    <td><?php echo $vehiculos->numeroeconomico ?></td>
		    <td><?php echo $vehiculos->tarjetacirculacion ?></td>
             <td><?php echo $vehiculos->idconcesinario ." ".$vehiculos->nombre." ".$vehiculos->ape_pat." ".$vehiculos->ape_mat ?></td>
            <td><?php echo $vehiculos->idconductor." ".$vehiculos->nombre_conductor." ".$vehiculos->ap_conductor." ".$vehiculos->am_conductor ?></td>
		    <td><?php echo $vehiculos->descripcion ?></td>
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('vehiculos/read_informacion_completa/'.$vehiculos->idvehiculo ),'Detalles'); 
			echo ' | '; 
			echo anchor(site_url('vehiculos/update_informacion_total/'.$vehiculos->idvehiculo),'Modificar'); 
			echo ' | '; 
			echo anchor(site_url('vehiculos/desactivar_informacion_completa/'.$vehiculos->idvehiculo),'Eliminar','onclick="javasciprt: return confirm(\'
¿Está seguro?\')"'); 
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