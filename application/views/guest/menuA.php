	<!-- Second navbar -->
	<div class="navbar navbar-default" id="navbar-second">
		<ul class="nav navbar-nav no-border visible-xs-block">
			<li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second-toggle"><i class="icon-menu7"></i></a></li>
		</ul>

		<div class="navbar-collapse collapse" id="navbar-second-toggle">
			<ul class="nav navbar-nav">
				<li><a href="<?= base_url()?>Admin"><i class="icon-display4 position-left"></i>Inicio</a></li>
				<li><a href="<?= base_url()?>Concesionario"><i class="icon-display4 position-left"></i>Concesionario</a></li>
				
				<li><a href="<?= base_url()?>Conductor"><i class="icon-display4 position-left"></i>Conductor</a></li>


				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-strategy position-left"></i> Usuario <span class="caret"></span>
					</a>

					<ul class="dropdown-menu width-200">
						<li class="dropdown-header">Basic layouts</li>
						<li><?php echo anchor('auth', '<i class="fa fa-list-alt"></i> Listas de Usuarios');?></li>
						<li><?php echo anchor('auth/create_user','<i class="fa fa-user-plus"></i>' .lang( 'index_create_user_link'))?></li>
						<li><?php echo anchor('auth/create_group', '<i class="fa fa-users"></i>'.lang('index_create_group_link'))?></li>
					</ul>

				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-strategy position-left"></i> Vehiculo <span class="caret"></span>
					</a>

					<ul class="dropdown-menu width-200">
						<li class="dropdown-header">Basic layouts</li>
						<li><?php echo anchor(site_url('vehiculos/espera'), 'Espera');?></li>
						<li><?php echo anchor(site_url('vehiculos/validado'), 'Validado');?></li>
						<li><?php echo anchor(site_url('vehiculos/asignado_concesionario'), 'Concesionarios Asignados');?></li>
						<li><?php echo anchor(site_url('vehiculos/informacion_completa'), 'Conductor y Concesionario');?></li>
						<li><?php echo anchor(site_url('vehiculos/inactivo'), 'Inactivo');?></li>
					</ul>

				</li>
				
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="changelog.html">
						<i class="icon-history position-left"></i>
						Changelog
						<span class="label label-inline position-right bg-success-400">1.0</span>
					</a>
				</li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-cog3"></i>
						<span class="visible-xs-inline-block position-right">Share</span>
						<span class="caret"></span>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
						<li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
						<li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
						<li class="divider"></li>
						<li><a href="#"><i class="icon-gear"></i> All settings</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- /second navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">
