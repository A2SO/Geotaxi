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
        <h2 style="margin-top:0px">Vehiculos <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Placa <?php echo form_error('placa') ?></label>
            <input type="text" class="form-control" name="placa" id="placa" placeholder="Placa" value="<?php echo $placa; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Niv <?php echo form_error('niv') ?></label>
            <input type="text" class="form-control" name="niv" id="niv" placeholder="Niv" value="<?php echo $niv; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Numeroeconomico <?php echo form_error('numeroeconomico') ?></label>
            <input type="text" class="form-control" name="numeroeconomico" id="numeroeconomico" placeholder="Numeroeconomico" value="<?php echo $numeroeconomico; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Marca <?php echo form_error('marca') ?></label>
            <input type="text" class="form-control" name="marca" id="marca" placeholder="Marca" value="<?php echo $marca; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Modelo <?php echo form_error('modelo') ?></label>
            <input type="text" class="form-control" name="modelo" id="modelo" placeholder="Modelo" value="<?php echo $modelo; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tarjetacirculacion <?php echo form_error('tarjetacirculacion') ?></label>
            <input type="text" class="form-control" name="tarjetacirculacion" id="tarjetacirculacion" placeholder="Tarjetacirculacion" value="<?php echo $tarjetacirculacion; ?>" />
        </div>
        <div class="form-group">
        <label for="varchar">Concesionario <?php echo form_error('Concesionario') ?></label>:
        <select class="form-control" id="idconcesinario" name="idconcesinario">
            <?php
                foreach ($arrConcesioario as $i => $profesion){
                        echo "<option value=".$i ;
                        if($idconcesinario==$i) echo " selected='selected'";
                        echo ">".$profesion." ". $ape_pat." ".$ape_mat."</option>";
                                                             }
            ?>
                </select>
        </div>
        <div class="form-group">
        <label for="varchar">Conductor <?php echo form_error('Conductor') ?></label>:
        <select class="form-control" id="idconductor" name="idconductor">
            <?php
                foreach ($arrConductor as $i => $profesion){
                        echo "<option value=".$i ;
                        if($idconductor==$i) echo " selected='selected'";
                        echo ">".$profesion." ". $ap_conductor." ".$am_conductor."</option>";
                                                             }
            ?>
                </select>
        </div>
	   

        <div class="form-group">
        
                    <label for="varchar">Estatus <?php echo form_error('Estatus') ?></label>:
                     <select class="form-control" id="clave" name="clave">


            <?php
                foreach ($arrProfesiones as $i => $profesion){
                        echo "<option value=".$i ;
                        if($clave==$i) echo " selected='selected'";
                        echo ">".$profesion."</option>";
                                                             }
            ?>
                </select>
        </div>

	    <input type="hidden" name="idvehiculo" value="<?php echo $idvehiculo; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('vehiculos') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>