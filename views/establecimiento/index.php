
	<!---------------------------------------------- Barra de navegacion ---------------------------------------------------->
	<nav class="navbar navbar-inverse navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed"
					data-toggle="collapse" data-target="#navbar" aria-expanded="false"
					aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#" data-scroll-nav='0'>Click-A-Pincho</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#">Establecimiento</a></li>
					<li><a href="?controller=login&action=cerrarSesion">Cerrar sesión</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<!---------------------------------------------- Contenido Version Movil ------------------------------------------------>
	<section id="adminMovil" class="movil">
		<!---------------------------------------------- Acordeon ----------------------------------------------------------->
		<div class="panel-group" id="accordion" role="tablist"
			aria-multiselectable="true">

			<!--************************************* MI ESTABLECIMIENTO **************************************************-->
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingOne">
					<h4 class="panel-title">
						<a role="button" data-toggle="collapse" data-parent="#accordion"
							href="#collapseOne" aria-expanded="false"
							aria-controls="collapseOne"> Mis Datos </a>
					</h4>
				</div>
				<div id="collapseOne" class="panel-collapse collapse in"
					role="tabpanel" aria-labelledby="headingOne">
					<div class="panel-body">
						<div class="panel panel-primary">
							<div class="panel-body panelRegistro">
										<form class="form-horizontal" method="POST" action="?controller=establecimiento&action=actualizarEstablecimiento">
										<div class="col-xs-12">
											<div class="form-group">
												<div class="col-xs-12">
													<label for="inputNombreNuevoEstablecimiento">Establecimiento</label>
													<input type="text" class="form-control"
														name="inputNombreNuevoEstablecimiento"
														id="inputNombreNuevoEstablecimiento"
														placeholder="Nombre del establecimiento" value="<?php echo $nombre; ?>">
												</div>
											</div>
											<div class="form-group">
												<div class="col-xs-12">
													<label for="inputDireccionNuevoEstablecimiento">Direccion</label>
													<input type="text" class="form-control"
														name="inputDireccionNuevoEstablecimiento"
														id="inputDireccionNuevoEstablecimiento"
														placeholder="Direccion" value="<?php echo $direccion; ?>">
												</div>
											</div>
											<div class="form-group">
												<div class="col-xs-12">
													<label for="inputLocalizacionNuevoEstablecimiento">Localizacion</label>
													<input type="text" class="form-control"
														name="inputLocalizacionNuevoEstablecimiento"
														id="inputLocalizacionNuevoEstablecimiento"
														placeholder="Localizacion geográfica (Ej: 52.4,45.6)" value="<?php echo $localizacion; ?>">
												</div>
											</div>
											<div class="form-group">
												<div class="col-xs-12">
													<label for="inputEnlace1NuevoEstablecimiento">Enlace
														1</label> <input type="text" class="form-control"
														id="inputEnlace1NuevoEstablecimiento"
														placeholder="Link a una red social" disabled>
												</div>
											</div>
											<div class="form-group">
												<div class="col-xs-12">
													<label for="inputEnlace2NuevoEstablecimiento">Enlace
														2</label> <input type="text" class="form-control"
														id="inputEnlace2NuevoEstablecimiento"
														placeholder="Link a una red social" disabled>
												</div>
											</div>
											<div class="form-group">
												<div class="col-xs-12">
													<label for="inputEnlace3NuevoEstablecimiento">Enlace
														3</label> <input type="text" class="form-control"
														id="inputEnlace3NuevoEstablecimiento"
														placeholder="Link a una red social" disabled>
												</div>
											</div>
											<div class="form-group">
												<div class="col-xs-12">
													<label for="inputDescripcionNuevoEstablecimient">Descripcion</label>
													<textarea class="col-xs-12" rows="5"
														class="form-control"
														name="inputDescripcionNuevoEstablecimiento"
														id="inputDescripcionNuevoEstablecimiento"
														placeholder="Describe tu establecimiento"><?php echo $descripcion; ?></textarea>
												</div>
											</div>
										</div>
										<div class="col-xs-12">
											<div class="form-group">
												<div class="col-xs-12">
													<button type="submit" class="btn btn-default">Aceptar</button>
												</div>
											</div>
										</div>
									</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--*************************************** MIS CODIGOS *******************************************************-->
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingTwo">
					<h4 class="panel-title">
						<a class="collapsed" role="button" data-toggle="collapse"
							data-parent="#accordion" href="#collapseTwo"
							aria-expanded="false" aria-controls="collapseTwo"> Mis
							Codigos </a>
					</h4>
				</div>
				<div id="collapseTwo" class="panel-collapse collapse"
					role="tabpanel" aria-labelledby="headingTwo">
					<div class="panel-body">
						<ul>
							<?php foreach ($codigos as $codigo) { ?>
										<li><?php echo $codigo->getId(); ?></li>
							<?php } ?>	
						</ul>
					</div>
				</div>
			</div>
			<!--************************************** GENERAR CODIGOS ****************************************************-->
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingThree">
					<h4 class="panel-title">
						<a class="collapsed" role="button" data-toggle="collapse"
							data-parent="#accordion" href="#collapseThree"
							aria-expanded="false" aria-controls="collapseThree"> Generar
							Codigos </a>
					</h4>
				</div>
				<div id="collapseThree" class="panel-collapse collapse"
					role="tabpanel" aria-labelledby="headingThree">
					<div class="panel-body">
						<form class="form-horizontal" method="POST" action="?controller=establecimiento&action=generarCodigos">
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-primary">Generar
										Codigos</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-------------------------------------------- Contenido Verion Escritorio ---------------------------------------------->
	<section id="adminEscritorio" data-scroll-index='0'>
		<div id="content">
			<!----------------------------------------------- Tabs ---------------------------------------------------------->
			<ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
				<li class="active"><a href="#establecimiento" data-toggle="tab"><span
						class="glyphicon glyphicon-cog" aria-hidden="true"></span>
						Concurso</a></li>
			</ul>
			<div id="my-tab-content" class="tab-content adminContenido">
				<!--********************************************* ESTABLECIMIENTO *****************************************-->
				<div class="tab-pane active" id="establecimiento">
					<h1>Establecimiento</h1>
					<p>Gestiona tu establecimiento</p>
					<div class="row">
						<!--------------------------------- Panel Datos ---------------------------------------------------->
						<div class="col-xs-6">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">Mis Datos</h3>
								</div>
								<div class="panel-body adminContenido">
									<form class="form-horizontal" method="POST" action="?controller=establecimiento&action=actualizarEstablecimiento">
										<div class="col-xs-12">
											<div class="form-group">
												<div class="col-xs-12">
													<label for="inputNombreNuevoEstablecimiento">Establecimiento</label>
													<input type="text" class="form-control"
														name="inputNombreNuevoEstablecimiento"
														id="inputNombreNuevoEstablecimiento"
														placeholder="Nombre del establecimiento" value="<?php echo $nombre; ?>">
												</div>
											</div>
											<div class="form-group">
												<div class="col-xs-12">
													<label for="inputDireccionNuevoEstablecimiento">Direccion</label>
													<input type="text" class="form-control"
														name="inputDireccionNuevoEstablecimiento"
														id="inputDireccionNuevoEstablecimiento"
														placeholder="Direccion" value="<?php echo $direccion; ?>">
												</div>
											</div>
											<div class="form-group">
												<div class="col-xs-12">
													<label for="inputLocalizacionNuevoEstablecimiento">Localizacion</label>
													<input type="text" class="form-control"
														name="inputLocalizacionNuevoEstablecimiento"
														id="inputLocalizacionNuevoEstablecimiento"
														placeholder="Localizacion geográfica (Ej: 52.4,45.6)" value="<?php echo $localizacion; ?>">
												</div>
											</div>
											<div class="form-group">
												<div class="col-xs-12">
													<label for="inputEnlace1NuevoEstablecimiento">Enlace
														1</label> <input type="text" class="form-control"
														id="inputEnlace1NuevoEstablecimiento"
														placeholder="Link a una red social" disabled>
												</div>
											</div>
											<div class="form-group">
												<div class="col-xs-12">
													<label for="inputEnlace2NuevoEstablecimiento">Enlace
														2</label> <input type="text" class="form-control"
														id="inputEnlace2NuevoEstablecimiento"
														placeholder="Link a una red social" disabled>
												</div>
											</div>
											<div class="form-group">
												<div class="col-xs-12">
													<label for="inputEnlace3NuevoEstablecimiento">Enlace
														3</label> <input type="text" class="form-control"
														id="inputEnlace3NuevoEstablecimiento"
														placeholder="Link a una red social" disabled>
												</div>
											</div>
											<div class="form-group">
												<div class="col-xs-12">
													<label for="inputDescripcionNuevoEstablecimient">Descripcion</label>
													<textarea class="col-xs-12" rows="5"
														class="form-control"
														name="inputDescripcionNuevoEstablecimiento"
														id="inputDescripcionNuevoEstablecimiento"
														placeholder="Describe tu establecimiento"><?php echo $descripcion; ?></textarea>
												</div>
											</div>
										</div>
										<div class="col-xs-12">
											<div class="form-group">
												<div class="col-xs-12">
													<button type="submit" class="btn btn-default">Aceptar</button>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<!------------------------------- Generar Codigos -------------------------------------------------->
						<div class="col-xs-12 col-lg-6">
							<div class="panel panel-default generarCodigos">
								<div class="panel-heading">
									<h3 class="panel-title">Generar Codigos</h3>
								</div>
								<div class="panel-body adminContenido">
									<form class="form-horizontal" method="POST" action="?controller=establecimiento&action=generarCodigos">
										<div class="form-group">
											<div class="col-sm-offset-2 col-sm-10">
												<button type="submit" class="btn btn-primary">Generar Codigos</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<!--------------------------------- Panel Codigos -------------------------------------------------->
						<div class="col-sm-12 col-lg-6">
							<div class="panel panel-default codigos">
								<div class="panel-heading">
									<h3 class="panel-title">Mis codigos</h3>
								</div>
								<div class="panel-body">
									<ul>
									<?php foreach ($codigos as $codigo) { ?>
										<li><?php echo $codigo->getId(); ?></li>
									<?php } ?>										
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>