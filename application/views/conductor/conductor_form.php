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
        <h2 style="margin-top:0px">Conductor <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nombre Conductor <?php echo form_error('nombre_conductor') ?></label>
            <input type="text" class="form-control" name="nombre_conductor" id="nombre_conductor" placeholder="Nombre Conductor" value="<?php echo $nombre_conductor; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ap Conductor <?php echo form_error('ap_conductor') ?></label>
            <input type="text" class="form-control" name="ap_conductor" id="ap_conductor" placeholder="Ap Conductor" value="<?php echo $ap_conductor; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Am Conductor <?php echo form_error('am_conductor') ?></label>
            <input type="text" class="form-control" name="am_conductor" id="am_conductor" placeholder="Am Conductor" value="<?php echo $am_conductor; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Correo Conductor <?php echo form_error('correo_conductor') ?></label>
            <input type="text" class="form-control" name="correo_conductor" id="correo_conductor" placeholder="Correo Conductor" value="<?php echo $correo_conductor; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Contrasena <?php echo form_error('contrasena') ?></label>
            <input type="text" class="form-control" name="contrasena" id="contrasena" placeholder="Contrasena" value="<?php echo $contrasena; ?>" />
        </div>
	    <div class="form-group">
            <label for="push_c">Push C <?php echo form_error('push_c') ?></label>
            <textarea class="form-control" rows="3" name="push_c" id="push_c" placeholder="Push C"><?php echo $push_c; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Permisoconducir <?php echo form_error('permisoconducir') ?></label>
            <input type="text" class="form-control" name="permisoconducir" id="permisoconducir" placeholder="Permisoconducir" value="<?php echo $permisoconducir; ?>" />
        </div>
	    <div class="form-group">
            <label for="time">Iniciohorario <?php echo form_error('iniciohorario') ?></label>
            <input type="text" class="form-control" name="iniciohorario" id="iniciohorario" placeholder="Iniciohorario" value="<?php echo $iniciohorario; ?>" />
        </div>
	    <div class="form-group">
            <label for="time">Finhorario <?php echo form_error('finhorario') ?></label>
            <input type="text" class="form-control" name="finhorario" id="finhorario" placeholder="Finhorario" value="<?php echo $finhorario; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Latitud <?php echo form_error('latitud') ?></label>
            <input type="text" class="form-control" name="latitud" id="latitud" placeholder="Latitud" value="<?php echo $latitud; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Longitud <?php echo form_error('longitud') ?></label>
            <input type="text" class="form-control" name="longitud" id="longitud" placeholder="Longitud" value="<?php echo $longitud; ?>" />
        </div>
	    <div class="form-group">
        Estatus: <select class="form-control" id="clave" name="clave">
            <?php
                foreach ($arrProfesiones as $i => $profesion){
                        echo "<option value=".$i ;
                        if($clave==$i) echo " selected='selected'";
                        echo ">".$profesion."</option>";
                                                             }
            ?>
                </select>
        </div>
	    <input type="hidden" name="idconductor" value="<?php echo $idconductor; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('conductor') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>