<!---------------------------------------------------- Modales -------------------------------------------------------- -->
	<!-- ********************************** Modales para pincho/establecimiento ****************************************** -->
	<div class="modal fade modal-pincho" tabindex="-1" role="dialog"
		aria-labelledby="myLargeModalLabel">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"
						aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h3 class="modal-title" id="gridSystemModalLabel">Nombre del
						pincho</h3>
					<h5>
						<i>Establecimiento</i>
					</h5>
				</div>
				<div class="modal-body">
					<!-- PINCHO -->
					<div class="row">
						<!-- Imagen -->
						<div class="col-xs-12 col-sm-6 col-md-4">
							<img class="img-responsive" src="images/1.jpg" alt="">
						</div>
						<div class="col-xs-12 col-sm-6 col-md-8">
							<!-- Descripcion -->
							<div class="row  descripcionPinchoModal">
								<p class="text-justify">Lorem ipsum dolor sit amet,
									consectetur adipisicing elit. Ea veniam cupiditate consequuntur
									incidunt eius ab ipsa! Quod aliquam eius suscipit nisi quidem
									iure. Aliquid dolorum voluptatum repellat, distinctio
									perferendis hic.</p>
							</div>
							<!-- Alergenos -->
							<div class="row">
								<div class="col-xs-3 col-md-2">
									<img src="images/altramuces.jpg" alt="altramuces"
										class="img-responsive">
								</div>
								<div class="col-xs-3 col-md-2">
									<img src="images/cacahuetes.jpg" alt="cacahuetes"
										class="img-responsive">
								</div>
								<div class="col-xs-3 col-md-2">
									<img src="images/moluscos.jpg" alt="moluscos"
										class="img-responsive">
								</div>
								<div class="col-xs-3 col-md-2">
									<img src="images/soja.jpg" alt="soja" class="img-responsive">
								</div>
							</div>
						</div>
					</div>
					<hr>
					<!-- ESTABLECIMIENTO -->
					<div class="row">
						<!-- Descripcion -->
						<div class="col-xs-12 col-sm-6">
							<div>
								<h3>Establecimiento</h3>
								<p class="text-justify">Lorem ipsum dolor sit amet,
									consectetur adipisicing elit. Dolores tenetur eos perferendis
									vitae reprehenderit, deleniti similique dolorem libero,
									delectus iure, quo! Facilis soluta accusamus temporibus
									voluptatibus quos, veritatis, explicabo reiciendis!</p>
							</div>
						</div>
						<!-- Datos -->
						<div class="col-xs-12 col-sm-6">
							<ul class="list-group">
								<li class="list-group-item">Direccion</li>
								<li class="list-group-item">Localizacion</li>
								<li class="list-group-item">Enlace1</li>
								<li class="list-group-item">Enlace2</li>
								<li class="list-group-item">Enlace3</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>

	<!-- ***************************************** Modales para jurados ************************************************** -->
	<div class="modal fade modal-juradoAdmin" tabindex="-1" role="dialog"
		aria-labelledby="myLargeModalLabel">
		<div class="modal-dialog modal-lg">
			<div class="modal-content descripcionJuradoModal">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"
						aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h3 class="modal-title" id="gridSystemModalLabel">Nombre del
						jurado</h3>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-xs-12 col-sm-4">
							<img class="img-responsive" src="images/perfil1.jpg" alt="">
						</div>
						<div class="col-xs-12 col-sm-8">
							<div class="row">
								<p class="text-justify">Lorem ipsum dolor sit amet,
									consectetur adipisicing elit. Ea veniam cupiditate consequuntur
									incidunt eius ab ipsa! Quod aliquam eius suscipit nisi quidem
									iure. Aliquid dolorum voluptatum repellat, distinctio
									perferendis hic.</p>
							</div>
							<hr>
							<div class="row">
								<ul class="list-group">
									<li class="list-group-item">Nombre</li>
									<li class="list-group-item">Email</li>
									<li class="list-group-item">Login</li>
									<li class="list-group-item">Password</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>


	<!---------------------------------------------- Barra de navegacion -------------------------------------------------- -->
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
					<li><a href="#">Administrador</a></li>
					<li><a href="?controller=login&action=cerrarSesion">Cerrar sesión</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<!---------------------------------------------- Contenido Version Movil ---------------------------------------------- -->
	<section id="adminMovil">
		<!---------------------------------------------- Acordeon --------------------------------------------------------- -->
		<div class="panel-group" id="accordion" role="tablist"
			aria-multiselectable="true">
			<!--************************************** ELEGIR FINALISTAS ************************************************** -->
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingOne">
					<h4 class="panel-title">
						<a class="collapsed" role="button" data-toggle="collapse"
							data-parent="#accordion" href="#collapseOne"
							aria-expanded="false" aria-controls="collapseOne"> Elegir
							Finalistas </a>
					</h4>
				</div>
				<div id="collapseOne" class="panel-collapse collapse in"
					role="tabpanel" aria-labelledby="headingOne">
					<div class="panel-body">
						<form class="form-horizontal tablasAdminMovil">
							<div class="form-group">
								<div class="col-xs-12">
									<button type="submit" class="btn btn-primary" method="POST" action="?controller=admin&action=elegirFinalistas">Elegir
										Finalistas</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!--*************************************** REPARTIR PINCHOS ************************************************** -->
				<div class="panel panel-default">
					<div class="panel-heading" role="tab" id="headingSeven">
						<h4 class="panel-title">
							<a class="collapsed" role="button" data-toggle="collapse"
								data-parent="#accordion" href="#collapseSeven"
								aria-expanded="false" aria-controls="collapseSeven"> Repartir Pinchos al Jurado Profesional </a>
						</h4>
					</div>
					<div id="collapseSeven" class="panel-collapse collapse in"
						role="tabpanel" aria-labelledby="headingSeven">
						<div class="panel-body">
							<form class="form-horizontal tablasAdminMovil">
								<div class="form-group">
									<div class="col-xs-12">
										<button type="submit" class="btn btn-primary" method="POST" action="?controller=admin&action=repartirPinchos">Jurado Profesional</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			<!--*************************************** ELEGIR FOLLETO **************************************************** -->
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingTwo">
					<h4 class="panel-title">
						<a class="collapsed" role="button" data-toggle="collapse"
							data-parent="#accordion" href="#collapseTwo"
							aria-expanded="false" aria-controls="collapseTwo"> Elegir
							Folleto </a>
					</h4>
				</div>
				<div id="collapseTwo" class="panel-collapse collapse"
					role="tabpanel" aria-labelledby="headingTwo">
					<div class="panel-body">
						<form class="form-horizontal" method="POST"
										enctype="multipart/form-data" action="?controller=admin&action=actualizarFolleto">
										<div class="form-group">
											<label class="col-sm-2 control-label" for="inputFolleto">Folleto</label>
											<input	name="inputFolleto" class="col-sm-10" type="file" class="form-control" id="inputFolleto">
										</div>
										<div class="form-group">
											<div class="col-sm-offset-2 col-sm-10">
												<button type="submit" class="btn btn-primary">Aceptar</button>
											</div>
										</div>
						</form>
					</div>
				</div>
			</div>
			<!--******************************************* FECHAS ******************************************************** -->
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingThree">
					<h4 class="panel-title">
						<a class="collapsed" role="button" data-toggle="collapse"
							data-parent="#accordion" href="#collapseThree"
							aria-expanded="false" aria-controls="collapseThree"> Fechas </a>
					</h4>
				</div>
				<div id="collapseThree" class="panel-collapse collapse"
					role="tabpanel" aria-labelledby="headingThree">
					<div class="panel-body">
						<form class="form-horizontal tablasAdminMovil adminContenido" method="POST" action="?controller=admin&action=actualizarConcurso">
										<div class="form-group">
											<input class="col-xs-12" type="text" class="form-control"
												id="inputIniciovotacion" placeholder="Inicio Popular" name="inputIniciovotacion" value="<?php echo $concursoactual->get_comienzo_vot_popular(); ?>">
										</div>
										<div class="form-group">
											<input class="col-xs-12" type="text" class="form-control"
												id="inputFinalvotacionpopular" placeholder="Final Popular" name="inputFinalvotacionpopular" value="<?php echo $concursoactual->get_final_vot_pop(); ?>">
										</div>
										<div class="form-group">
											<input class="col-xs-12" type="text" class="form-control"
												id="inputFinalvotacionprofesional"
												placeholder="Final Profesional" name="inputFinalvotacionprofesional" value="<?php echo $concursoactual->get_final_vot_pro(); ?>">
										</div>
										<div class="form-group">
											<input class="col-xs-12" type="text" class="form-control"
												id="inputComienzovotacionfinalistas"
												placeholder="Inicio Finalistas" name="inputComienzovotacionfinalistas" value="<?php echo $concursoactual->get_comienzo_vot_finalistas(); ?>">
										</div>
										<div class="form-group">
											<input class="col-xs-12" type="text" class="form-control"
												id="inputFinalvotacionfinalistas"
												placeholder="Final Finalistas" name="inputFinalvotacionfinalistas" value="<?php echo $concursoactual->get_final_vot_finalistas(); ?>">
										</div>
										<div class="form-group">
											<div class="col-sm-1 col-sm-offset-11">
												<button type="submit" class="btn btn-primary">Aceptar</button>
											</div>
										</div>
									</form>
					</div>
				</div>
			</div>
			<!--************************************** ESTABLECIMIENTOS *************************************************** -->
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingFour">
					<h4 class="panel-title">
						<a class="collapsed" role="button" data-toggle="collapse"
							data-parent="#accordion" href="#collapseFour"
							aria-expanded="false" aria-controls="collapseFour">
							Establecimientos </a>
					</h4>
				</div>
				<div id="collapseFour" class="panel-collapse collapse"
					role="tabpanel" aria-labelledby="headingFour">
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table tablasAdmin">
								<thead>
									<tr>
										<th>Nombre</th>
										<th>Dirección</th>
										<th>Detalles</th>
										<th>Eliminar</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($establecimientosConfirmados as $establecimiento) { ?>
										<tr>
											<td><?php echo $establecimiento->get_nombre(); ?></td>
											<td><?php echo $establecimiento->get_direccion(); ?></td>
											<td>
												<button class="btn btn-default" data-toggle="modal"	data-target=".modal-pincho">Ver más</button>
											</td>
											<td>
												<form class="form" action="?controller=admin&action=eliminarEstablecimiento" method="POST">
													<input type="hidden" name="idEstablecimiento" value="<?php echo $establecimiento->get_id_establecimiento() ?>">
													<button class="botonEliminarEstablecimiento" type="submit">
														<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
													</button>
												</form>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<!--***************************************** SOLICITUDES ***************************************************** -->
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingFive">
					<h4 class="panel-title">
						<a class="collapsed" role="button" data-toggle="collapse"
							data-parent="#accordion" href="#collapseFive"
							aria-expanded="false" aria-controls="collapseFive">
							Solicitudes </a>
					</h4>
				</div>
				<div id="collapseFive" class="panel-collapse collapse"
					role="tabpanel" aria-labelledby="headingFive">
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table tablasAdmin">
								<thead>
									<tr>
										<th>Pincho</th>
										<th>Establecimiento</th>
										<th>Precio</th>
										<th>Detalles</th>
										<th colspan="2"></th>
									</tr>
								</thead>
								<tbody>
									<?php
										$i=0;
										foreach ($establecimientos as $establecimiento) { ?>
										<tr>
											<td><?php echo $pinchos[$i]->getNombre(); ?></td>
											<td><?php echo $establecimiento->get_nombre(); ?></td>
											<td><?php echo $pinchos[$i]->getPrecio(); ?> €</td>
											<td>
												<button class="btn btn-default" data-toggle="modal"
													data-target=".modal-pincho">Ver más</button>
											</td>
											<td>
											<form method="POST"	action="?controller=admin&action=aceptarSolicitud">
												<button class="btn btn-success" type="submit">Aceptar Solicitud</button>
												<input type="hidden" name="idEstablecimiento" value="<?php echo $establecimiento->get_id_establecimiento() ?>">
											</form>
											</td>
											<td>
												<form method="POST" action="?controller=admin&action=denegarSolicitud">
													<button class="btn btn-danger" type="submit">Denegar Solicitud</button>
													<input type="hidden" name="idEstablecimiento" value="<?php echo $establecimiento->get_id_establecimiento() ?>">
												</form>
											</td>
										</tr>
										<?php $i++; } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<!--******************************************* JURADO ******************************************************** -->
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingSix">
					<h4 class="panel-title">
						<a class="collapsed" role="button" data-toggle="collapse"
							data-parent="#accordion" href="#collapseSix"
							aria-expanded="false" aria-controls="collapseSix"> Jurado </a>
					</h4>
				</div>
				<div id="collapseSix" class="panel-collapse collapse"
					role="tabpanel" aria-labelledby="headingSix">
					<div class="panel-body">
						<form class="form-horizontal adminContenido" enctype="multipart/form-data" method="POST" action="?controller=admin&action=registrarJurado">
								<div class="form-group">
									<input class="col-xs-12" type="text" class="form-control"
										name="inputNombreJurado"
										id="inputNombreJurado" placeholder="Nombre">
								</div>
								<div class="form-group">
									<input class="col-xs-12" type="email" class="form-control"
										name="inputEmailJurado"
										id="inputEmailJurado" placeholder="Email">
								</div>
								<div class="form-group">
									<input class="col-xs-12" type="text" class="form-control"
										name="inputLoginJurado"
										id="inputLoginJurado" placeholder="Nombre de usuario">
								</div>
								<div class="form-group">
									<input class="col-xs-12" type="password" class="form-control"
										name="inputPasswordJurado"
										id="inputPasswordJurado" placeholder="Contraseña">
								</div>
								<div class="form-group">
									<input class="col-xs-12" type="tel" class="form-control"
										name="inputTelefonoJurado"
										id="inputTelefonoJurado" placeholder="Telefono">
								</div>
								<div class="form-group">
									<textarea class="col-xs-12" rows="5"
										name="inputDescripcionJurado"
										class="form-control" id="inputDescripcionJurado"
										placeholder="Descripción"></textarea>
								</div>
								<div class="form-group">
									<input class="col-xs-12" type="file" class="form-control"
										name="inputFotoJurado"
										id="inputFotoJurado">
								</div>
								<div class="form-group">
									<div class="col-xs-12">
										<button type="submit" class="btn btn-primary">Aceptar</button>
									</div>
								</div>
							</form>
						<div class="table-responsive">
							<table class="table tablasAdmin">
								<thead>
									<tr>
										<th>Nombre</th>
										<th>Email</th>
										<th>Login</th>
										<th>Detalles</th>
										<th>Eliminar</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($jurados as $jurado) { ?>
									<tr>
										<td><?php echo $jurado->get_nombre(); ?></td>
										<td><?php echo $jurado->get_email(); ?></td>
										<td><?php echo $jurado->get_login(); ?></td>
										<td>
											<button class="btn btn-default" data-toggle="modal"
												data-target=".modal-juradoAdmin">Ver más</button>
										</td>
										<td>
											<form class="form" action="?controller=admin&action=eliminarJurado" method="POST">
												<input type="hidden" name="idJurado" value="<?php echo $jurado->get_id() ?>">
												<button class="botonEliminarEstablecimiento" type="submit">
													<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
												</button>
											</form>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-------------------------------------------- Contenido Verion Escritorio -------------------------------------------- -->
	<section id="adminEscritorio" data-scroll-index='0'>
		<div id="content">
			<!----------------------------------------------- Tabs -------------------------------------------------------- -->
			<ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
				<li class="active"><a href="#concurso" data-toggle="tab"><span
						class="glyphicon glyphicon-cog" aria-hidden="true"></span>
						Concurso</a></li>
				<li><a href="#establecimientos" data-toggle="tab"><span
						class="glyphicon glyphicon-glass" aria-hidden="true"></span>
						Establecimientos</a></li>
				<li><a href="#pinchos" data-toggle="tab"><span
						class="glyphicon glyphicon-ice-lolly-tasted" aria-hidden="true"></span>
						Propuestas de pinchos</a></li>
				<li><a href="#juradoprofesional" data-toggle="tab"><span
						class="glyphicon glyphicon-user" aria-hidden="true"></span> Jurado
						Profesional</a></li>
			</ul>
			<div id="my-tab-content" class="tab-content adminContenido">
				<!--************************************************** CONCURSO ******************************************* -->
				<div class="tab-pane active" id="concurso">
					<h1>Concurso</h1>
					<p>Introduzca o modifique los datos del concurso</p>
					<div class="row">
						<!--------------------------------- Panel Folleto ------------------------------------------------ -->
						<div class="col-sm-12 col-lg-4">
							<div class="panel panel-default elegirFolleto">
								<div class="panel-heading">
									<h3 class="panel-title">Actualizar Folleto</h3>
								</div>
								<div class="panel-body">
									<form class="form-horizontal" method="POST"
										enctype="multipart/form-data" action="?controller=admin&action=actualizarFolleto">
										<div class="form-group">
											<label class="col-sm-2 control-label" for="inputFolleto">Folleto</label>
											<input	name="inputFolleto" class="col-sm-10" type="file" class="form-control" id="inputFolleto">
										</div>
										<div class="form-group">
											<div class="col-sm-offset-2 col-sm-10">
												<button type="submit" class="btn btn-primary">Aceptar</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<!------------------------------- Panel Finalistas ------------------------------------------------ -->
						<div class="col-sm-12 col-lg-4">
							<div class="panel panel-default elegirFinalistas">
								<div class="panel-heading">
									<h3 class="panel-title">Elegir Finalistas</h3>
								</div>
								<div class="panel-body adminContenido">
									<form class="form-horizontal" method="POST" action="?controller=admin&action=elegirFinalistas">
										<div class="form-group">
											<div class="col-sm-offset-2 col-sm-10">
												<button type="submit" class="btn btn-primary"
												<?php
													if($finalistasNoPulsable){
														echo "disabled='disabled'";
													}
												 ?>
												 >Elegir Finalistas</button>
											</div>
										</div>
									</form>
								</div>
							</div>
					</div>
					<!------------------------------- Panel Repartir Pinchos ------------------------------------------------ -->
					<div class="col-sm-12 col-lg-4">
						<div class="panel panel-default elegirFinalistas">
							<div class="panel-heading">
								<h3 class="panel-title">Repartir Pinchos al Jurado Profesional</h3>
							</div>
							<div class="panel-body adminContenido">
								<form class="form-horizontal" method="POST" action="?controller=admin&action=repartirPinchos">
									<div class="form-group">
										<div class="col-sm-offset-2 col-sm-10">
											<button type="submit" class="btn btn-primary"
											<?php
												if($repartirNoPulsable){
													echo "disabled='disabled'";
												}
											?>
											>Repartir Pinchos</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
						<!--------------------------------- Panel Fechas --------------------------------------------------- -->
						<div class="col-xs-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">Elegir Fechas de concurso</h3>
								</div>
								<div class="panel-body adminContenido">
									<form class="form-horizontal tablasAdminMovil adminContenido" method="POST" action="?controller=admin&action=actualizarConcurso">
										<div class="form-group">
										<label class="col-sm-4 control-label"
													for="inputiniciovotacion">Inicio de votaciones</label>
											<input class="col-sm-8" type="text" class="form-control"
												id="inputIniciovotacionE" placeholder="Inicio Popular" name="inputIniciovotacion" value="<?php echo $concursoactual->get_comienzo_vot_popular(); ?>">
										</div>
										<div class="form-group">
										<label class="col-sm-4 control-label"
													for="inputFinalvotacionpopularE">Final de votaciones populares</label>
											<input class="col-sm-8" type="text" class="form-control"
												id="inputFinalvotacionpopularE" placeholder="Final Popular" name="inputFinalvotacionpopular" value="<?php echo $concursoactual->get_final_vot_pop(); ?>">
										</div>
										<div class="form-group">
										<label class="col-sm-4 control-label"
													for="inputFinalvotacionprofesionalE">Final de votaciones profesionales</label>
											<input class="col-sm-8" type="text" class="form-control"
												id="inputFinalvotacionprofesionalE"
												placeholder="Final Profesional" name="inputFinalvotacionprofesional" value="<?php echo $concursoactual->get_final_vot_pro(); ?>">
										</div>
										<div class="form-group">
										<label class="col-sm-4 control-label"
													for="inputComienzovotacionfinalistasE">Inicio votacion finalistas</label>
											<input class="col-sm-8" type="text" class="form-control"
												id="inputComienzovotacionfinalistasE"
												placeholder="Inicio Finalistas" name="inputComienzovotacionfinalistas" value="<?php echo $concursoactual->get_comienzo_vot_finalistas(); ?>">
										</div>
										<div class="form-group">
										<label class="col-sm-4 control-label"
													for="inputFinalvotacionfinalistasE">Final votacion finalistas</label>
											<input class="col-sm-8" type="text" class="form-control"
												id="inputFinalvotacionfinalistasE"
												placeholder="Final Finalistas" name="inputFinalvotacionfinalistas" value="<?php echo $concursoactual->get_final_vot_finalistas(); ?>">
										</div>
										<div class="form-group">
											<div class="col-sm-1 col-sm-offset-11">
												<button type="submit" class="btn btn-primary">Aceptar</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--********************************************** ESTABLECIMIENTOS *************************************** -->
				<div class="tab-pane" id="establecimientos">
					<h1>Establecimientos</h1>
					<p>Elimine establecimientos</p>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Establecimientos registrados</h3>
						</div>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table tablasAdmin">
									<thead>
										<tr>
											<th>Nombre</th>
											<th>Dirección</th>
											<th>Detalles</th>
											<th>Eliminar</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($establecimientosConfirmados as $establecimiento) { ?>
										<tr>
											<td><?php echo $establecimiento->get_nombre(); ?></td>
											<td><?php echo $establecimiento->get_direccion(); ?></td>
											<td>
												<button class="btn btn-default" data-toggle="modal"	data-target=".modal-pincho">Ver más</button>
											</td>
											<td>
												<form class="form" action="?controller=admin&action=eliminarEstablecimiento" method="POST">
													<input type="hidden" name="idEstablecimiento" value="<?php echo $establecimiento->get_id_establecimiento() ?>">
													<button class="botonEliminarEstablecimiento" type="submit">
														<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
													</button>
												</form>
											</td>
										</tr>
									<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<!--************************************************* SOLICITUDES ***************************************** -->
				<div class="tab-pane" id="pinchos">
					<h1>Pinchos</h1>
					<p>Acepte o deniegue solicitudes de pinchos</p>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Solicitudes de pinchos</h3>
						</div>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table tablasAdmin">
									<thead>
										<tr>
											<th>Pincho</th>
											<th>Establecimiento</th>
											<th>Precio</th>
											<th>Detalles</th>
											<th colspan="2"></th>
										</tr>
									</thead>
									<tbody>
									<?php
										$i=0;
										foreach ($establecimientos as $establecimiento) { ?>
										<tr>
											<td><?php echo $pinchos[$i]->getNombre(); ?></td>
											<td><?php echo $establecimiento->get_nombre(); ?></td>
											<td><?php echo $pinchos[$i]->getPrecio(); ?> €</td>
											<td>
												<button class="btn btn-default" data-toggle="modal"
													data-target=".modal-pincho">Ver más</button>
											</td>
											<td>
											<form method="POST"	action="?controller=admin&action=aceptarSolicitud">
												<button class="btn btn-success" type="submit">Aceptar Solicitud</button>
												<input type="hidden" name="idEstablecimiento" value="<?php echo $establecimiento->get_id_establecimiento() ?>">
											</form>
											</td>
											<td>
												<form method="POST" action="?controller=admin&action=denegarSolicitud">
													<button class="btn btn-danger" type="submit">Denegar Solicitud</button>
													<input type="hidden" name="idEstablecimiento" value="<?php echo $establecimiento->get_id_establecimiento() ?>">
												</form>
											</td>
										</tr>
										<?php $i++; } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<!--************************************************** JURADO *********************************************-->
				<div class="tab-pane" id="juradoprofesional">
					<h1>Jurado profesional</h1>
					<p>Introduzca nuevos miembros del jurado, modifique existentes
						o eliminelos. Para modificar un miembro pincha en modificar en la
						tabla, los datos aparecerán en el formulario. Modificalos y pulsa
						aceptar para confirmar los nuevos datos</p>
					<!--------------------------------------- Panel Nuevo Jurado -------------------------------------------->
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Insertar/Modificar miembro del
								jurado</h3>
						</div>
						<div class="panel-body">
							<form class="form-horizontal adminContenido" enctype="multipart/form-data" method="POST" action="?controller=admin&action=registrarJurado">
								<div class="form-group">
									<input class="col-xs-12" type="text" class="form-control"
										name="inputNombreJurado"
										id="inputNombreJurado" placeholder="Nombre">
								</div>
								<div class="form-group">
									<input class="col-xs-12" type="email" class="form-control"
										name="inputEmailJurado"
										id="inputEmailJurado" placeholder="Email">
								</div>
								<div class="form-group">
									<input class="col-xs-12" type="text" class="form-control"
										name="inputLoginJurado"
										id="inputLoginJurado" placeholder="Nombre de usuario">
								</div>
								<div class="form-group">
									<input class="col-xs-12" type="password" class="form-control"
										name="inputPasswordJurado"
										id="inputPasswordJurado" placeholder="Contraseña">
								</div>
								<div class="form-group">
									<input class="col-xs-12" type="tel" class="form-control"
										name="inputTelefonoJurado"
										id="inputTelefonoJurado" placeholder="Telefono">
								</div>
								<div class="form-group">
									<textarea class="col-xs-12" rows="5"
										name="inputDescripcionJurado"
										class="form-control" id="inputDescripcionJurado"
										placeholder="Descripción"></textarea>
								</div>
								<div class="form-group">
									<input class="col-xs-12" type="file" class="form-control"
										name="inputFotoJurado"
										id="inputFotoJurado">
								</div>
								<div class="form-group">
									<div class="col-xs-12">
										<button type="submit" class="btn btn-primary">Aceptar</button>
									</div>
								</div>
							</form>
						</div>
					</div>
					<!--------------------------------------- Panel Jurados ----------------------------------------------- -->
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Miembros del jurado profesional</h3>
						</div>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table tablasAdmin">
									<thead>
										<tr>
											<th>Nombre</th>
											<th>Email</th>
											<th>Login</th>
											<th>Detalles</th>
											<th>Eliminar</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($jurados as $jurado) { ?>
										<tr>
											<td><?php echo $jurado->get_nombre(); ?></td>
											<td><?php echo $jurado->get_email(); ?></td>
											<td><?php echo $jurado->get_login(); ?></td>
											<td>
												<button class="btn btn-default" data-toggle="modal"
													data-target=".modal-juradoAdmin">Ver más</button>
											</td>
											<td>
												<form class="form" action="?controller=admin&action=eliminarJurado" method="POST">
													<input type="hidden" name="idJurado" value="<?php echo $jurado->get_id() ?>">
													<button class="botonEliminarEstablecimiento" type="submit">
														<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
													</button>
												</form>
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
