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
        <h2 style="margin-top:0px">Concesionario <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nombre <?php echo form_error('nombre') ?></label>
            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" value="<?php echo $nombre; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ape Pat <?php echo form_error('ape_pat') ?></label>
            <input type="text" class="form-control" name="ape_pat" id="ape_pat" placeholder="Ape Pat" value="<?php echo $ape_pat; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ape Mat <?php echo form_error('ape_mat') ?></label>
            <input type="text" class="form-control" name="ape_mat" id="ape_mat" placeholder="Ape Mat" value="<?php echo $ape_mat; ?>" />
        </div>
	    <div class="form-group">
            <label for="direccion">Direccion <?php echo form_error('direccion') ?></label>
            <textarea class="form-control" rows="3" name="direccion" id="direccion" placeholder="Direccion"><?php echo $direccion; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="int">Telefono <?php echo form_error('telefono') ?></label>
            <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Telefono" value="<?php echo $telefono; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Correo <?php echo form_error('correo') ?></label>
            <input type="text" class="form-control" name="correo" id="correo" placeholder="Correo" value="<?php echo $correo; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Contrase&ntilde;a <?php echo form_error('contrasena') ?></label>
            <input type="password" class="form-control" name="contrasena" id="contrasena" placeholder="Contrasena" value="<?php echo $contrasena; ?>" />
        </div>
	    <div class="form-group">
            <label for="direccion_doc">Direccion Doc <?php echo form_error('direccion_doc') ?></label>
            <textarea class="form-control" rows="3" name="direccion_doc" id="direccion_doc" placeholder="Direccion Doc"><?php echo $direccion_doc; ?></textarea>
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
	    <input type="hidden" name="idconcesinario" value="<?php echo $idconcesinario; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('concesionario') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>