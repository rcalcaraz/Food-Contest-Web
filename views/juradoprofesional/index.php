<!---------------------------------------------------- Modales ---------------------------------------------------------->
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
					<li><a href="#"><?php echo $_SESSION['login']; ?></a></li>
					<li><a href="?controller=login&action=cerrarSesion">Cerrar sesión</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<!---------------------------------------------- Contenido Version Movil ------------------------------------------------>
	<section id="adminMovil">
		<!---------------------------------------------- Acordeon ----------------------------------------------------------->
		<div class="panel-group" id="accordion" role="tablist"
			aria-multiselectable="true">

			<!--***************************************** ASIGNACIONES ****************************************************-->
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingFive">
					<h4 class="panel-title">
						<a role="button" data-toggle="collapse" data-parent="#accordion"
							href="#collapseOne" aria-expanded="false"
							aria-controls="collapseOne"> Votar </a>
					</h4>
				</div>
				<div id="collapseOne" class="panel-collapse collapse in"
					role="tabpanel" aria-labelledby="headingOne">
					<div class="panel-body">
					 <div class="table-responsive">
								<table class="table tablasAdmin">
									<thead>
										<tr>
											<th>Pincho</th>
											<th>Establecimiento</th>
											<th>Precio</th>
											<th>Detalles</th>
											<th>Votacion</th>
											<th>Confirmación</th>
										</tr>
									</thead>
									<tbody>

									<?php
										$i=0;
										foreach ($pinchosAsignados as $pincho) { ?>
											<tr>
												<td><?php echo $pincho->getNombre(); ?></td>
												<td><?php echo $establecimientosAsignados[$i]->get_nombre(); ?></td>
												<td><?php echo $pincho->getPrecio(); ?>
												<td>
													<button class="btn btn-default" data-toggle="modal"
														data-target=".modal-pincho">Ver más</button>
												</td>
												<form id="pincho<?php echo $i ?>" class="form-horizontal" method="POST"	action="?controller=juradoprofesional&action=votarProfesional">								
												<td>
													<select class="form-control" name="votacion">
													  <option>1</option>
													  <option>2</option>
													  <option>3</option>
													  <option>4</option>
													  <option>5</option>
													</select>
												</td>
												<td>
													<input type="hidden" name="idPincho" value="<?php echo $pincho->getId() ?>">
													<button type="submit" class="btn btn-success">Confirmar Votacion</button>
												</form>
												</td>
											</tr>										
									<?php $i++;} ?>
									</tr>
									</tbody>
								</table>
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
				<li class="active"><a href="#votacionPinchos" data-toggle="tab"><span
						class="glyphicon glyphicon-cog" aria-hidden="true"></span> Votar</a></li>
			</ul>
			<div id="my-tab-content" class="tab-content adminContenido">
				<!--******************************************** VOTAR PINCHOS ********************************************-->
				<div class="tab-pane active" id="votacionPinchos">
					<h1>Votar Pinchos</h1>
					<p>Vote por sus pinchos asignados</p>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Pinchos asignados</h3>
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
											<th>Votacion</th>
											<th>Confirmación</th>
										</tr>
									</thead>
									<tbody>

									<?php
										$i=0;
										foreach ($pinchosAsignados as $pincho) { ?>
											<tr>
												<td><?php echo $pincho->getNombre(); ?></td>
												<td><?php echo $establecimientosAsignados[$i]->get_nombre(); ?></td>
												<td><?php echo $pincho->getPrecio(); ?>
												<td>
													<button class="btn btn-default" data-toggle="modal"
														data-target=".modal-pincho">Ver más</button>
												</td>
												<form id="pincho<?php echo $i ?>" class="form-horizontal" method="POST"	action="?controller=juradoprofesional&action=votarProfesional">								
												<td>
													<select class="form-control" name="votacion">
													  <option>1</option>
													  <option>2</option>
													  <option>3</option>
													  <option>4</option>
													  <option>5</option>
													</select>
												</td>
												<td>
													<input type="hidden" name="idPincho" value="<?php echo $pincho->getId() ?>">
													<button type="submit" class="btn btn-success">Confirmar Votacion</button>
												</form>
												</td>
											</tr>										
									<?php $i++;} ?>
									</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
