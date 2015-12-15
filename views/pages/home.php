<!---------------------------------------------------- Modales ------------------------------------------------------>
	<!-- ************************************ Modal para pincho/establecimiento ************************************** -->
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

	<!-- ************************************* Modales para registro de usuario ************************************** -->
	<div class="modal fade modal-nuevoUsuario" tabindex="-1" role="dialog"
		aria-labelledby="myLargeModalLabel">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"
						aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h3 class="modal-title" id="gridSystemModalLabel">Registro</h3>
				</div>
				<div class="modal-body">
					<h2>
						<span class="subrayado">Nuevo Usuario</span>
					</h2>
					<h3>
						<i>Unete y participa</i>
					</h3>
					<div class="panel panel-primary">
						<div class="panel-body">
							<form class="form-horizontal" method="POST"
								action="?controller=registro&action=validarRegistro">								
								<div class="form-group">
									<div class="col-xs-12">
										<label for="inputEmailNuevoUsuario">Email</label> <input
											type="email" name="inputEmailNuevoUsuario" class="form-control" id="inputEmailNuevoUsuario"
											pattern="[^@]+@[^@]+\.[a-zA-Z]{2,}" placeholder="Email" maxlength="50" required>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12">
										<label for="inputLoginNuevoUsuario">Nombre de Usuario</label>
										<input type="text" class="form-control"
											pattern="[A-Za-z0-9._-]*" id="inputLoginNuevoUsuario" name="inputLoginNuevoUsuario" placeholder="Nombre de Usuario (Letras,_,-,.)" maxlength="10" required>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12">
										<label for="inputPasswordNuevoUsuario">Password</label> 
										<input type="password" class="form-control" name="inputPasswordNuevoUsuario"
											pattern="[A-Za-z0-9._-]*" id="inputPasswordNuevoUsuario" placeholder="Password (Letras,_,-,.)" maxlength="20" required>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-12">
										<button type="submit" class="btn btn-default"
											name="registrarUsuario">Aceptar</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	<!-- ***************************** Modales para registro de establecimiento ************************************** -->
	<div class="modal fade modal-nuevoEstablecimiento" tabindex="-1"
		role="dialog" aria-labelledby="myLargeModalLabel">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"
						aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h3 class="modal-title" id="gridSystemModalLabel">Registro</h3>
				</div>
				<div class="modal-body">
					<h2>
						<span class="subrayado">Establecimiento</span>
					</h2>
					<h3>
						<i>Registra tu pincho</i>
					</h3>
					<div class="panel panel-primary">
						<div class="panel-body panelRegistro">
							<form class="form-horizontal" method="POST"
								action="?controller=registro&action=validarRegistroEstablecimientos" enctype="multipart/form-data">
								<div class="col-xs-12 col-lg-6">
									<div class="form-group">
										<div class="col-xs-12">
											<label for="inputLoginNuevoEstablecimiento">Login</label>
											<input type="text" class="form-control"
												name="inputLoginNuevoEstablecimiento"
												id="inputLoginNuevoEstablecimiento"
												pattern="[A-Za-z0-9._-]*"
												placeholder="Nombre de usuario (Letras,.,-,_)"
												maxlength="10" required>
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-12">
											<label for="inputPasswordNuevoEstablecimiento">Contraseña</label>
											<input type="password" class="form-control"
												name="inputPasswordNuevoEstablecimiento"
												id="inputPasswordNuevoEstablecimiento"												
												pattern="[A-Za-z0-9._-]*"
												placeholder="Contraseña (Letras,.,-,_)"
												maxlength="20" required>
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-12">
											<label for="inputNombreNuevoEstablecimiento">Establecimiento</label>
											<input type="text" class="form-control"
												name="inputNombreNuevoEstablecimiento"
												id="inputNombreNuevoEstablecimiento"												
												pattern="[A-Za-z0-9._-]*"
												placeholder="Nombre del establecimiento (Letras,.,-,_)"
												maxlength="50" required>
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-12">
											<label for="inputDireccionNuevoEstablecimiento">Direccion</label>
											<input type="text" class="form-control"
												name="inputDireccionNuevoEstablecimiento"
												id="inputDireccionNuevoEstablecimiento"												
												pattern="[A-Za-z0-9._-/]*"
												placeholder="Direccion"
												maxlength="255" required>
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-12">
											<label for="inputLocalizacionNuevoEstablecimiento">Localizacion</label>
											<input type="text" class="form-control"
												name="inputLocalizacionNuevoEstablecimiento"
												id="inputLocalizacionNuevoEstablecimiento"
												placeholder="Localizacion geográfica (Ej: 52.4,45.6)"
												maxlength="50" 
												pattern="[0-9]*[.][0-9]*[,][0-9]*[.][0-9]*"
												required>
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-12">
											<label for="inputEnlace1NuevoEstablecimiento">Enlace
												1</label> <input type="text" class="form-control"
												name="inputEnlace1NuevoEstablecimiento"
												id="inputEnlace1NuevoEstablecimiento"
												placeholder="Link a una red social" disabled>
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-12">
											<label for="inputEnlace2NuevoEstablecimiento">Enlace
												2</label> <input type="text" class="form-control"
												name="inputEnlace2NuevoEstablecimiento"
												id="inputEnlace2NuevoEstablecimiento"
												placeholder="Link a una red social" disabled>
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-12">
											<label for="inputEnlace3NuevoEstablecimiento">Enlace
												3</label> <input type="text" class="form-control"
												name="inputEnlace3NuevoEstablecimiento"
												id="inputEnlace3NuevoEstablecimiento"
												placeholder="Link a una red social" disabled>
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-12">
											<label for="inputDescripcionNuevoEstablecimiento">Descripcion</label>
											<textarea class="col-xs-12"rows="5"
												class="form-control"
												name="inputDescripcionNuevoEstablecimiento"
												id="inputDescripcionNuevoEstablecimiento"
												placeholder="Describe tu establecimiento"
												pattern="[A-Za-z0-9._-/]*"
												maxlength="10000" 
												required></textarea>
										</div>
									</div>
								</div>
								<div class="col-xs-12 col-lg-6">
									<div class="form-group">
										<div class="col-xs-12">
											<label for="inputNombreNuevoPincho">Pincho</label> <input
												name="inputNombreNuevoPincho"
												type="text" class="form-control"
												id="inputNombreNuevoPincho"
												placeholder="Nombre del pincho"
												maxlength="45" 
												required>
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-12">
											<label for="inputPrecioNuevoPincho">Precio (€)</label> <input
												name="inputPrecioNuevoPincho"
												type="text" class="form-control" 
												id="inputPrecioNuevoPincho"
												placeholder="Precio (Ej: 3.5)"
												maxlength="4"
												pattern="[0-9][.][0-9]{2}" 
												required>
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-12">
											<label for="inputFotoNuevoPincho">Foto</label> <input
												name="inputFotoNuevoPincho";
												type="file" class="form-control" id="inputFotoNuevoPincho"
												required>
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-12">
											<label for="inputIngredientesNuevoPincho">Buscar
												Ingrediente</label> <input type="text" class="form-control"
												id="inputIngredientesNuevoPincho"
												placeholder="Buscar Ingrediente" disabled>
											<button id="nuevoIngrediente"
												class="btn btn-default botonIngrediente" type="button" disabled="disabled">Añadir
												ingrediente</button>
										</div>
									</div>
									<div class="form-group">
										<div id="ingredientesSeleccionados" class="col-xs-12">
											<label for="inputDescripcionNuevoEstablecimiento">Ingredientes
												seleccionados</label>
										</div>
									</div>
								</div>
								<div class="col-xs-12">
									<div class="form-group">
										<div class="col-xs-12">
											<button type="submit" class="btn btn-default"
												name="registrarEstablecimiento">Aceptar</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>

	<!---------------------------------------------- Barra de navegacion ------------------------------------------------>
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
					<li><a href="" data-scroll-nav='1' class="hidden-xs">Descripcion</a></li>
					<li><a href="" data-scroll-nav='2'>Pinchos</a></li>
					<li><a href="" data-scroll-nav='3'>Jurado</a></li>
					<li><a href="" data-scroll-nav='5'>Gastromapa</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="" data-scroll-nav='4'>Login/Registro</a></li>
				</ul>

			</div>
		</div>
	</nav>


	<!----------------------------------------------- Contenido principal ----------------------------------------------->
	<!-- ************************************************** PORTADA ************************************************** -->
	<section id="portada" data-scroll-index='0'>
		<div class="row">
			<div class="col-xs-12">
						<img src="images/logo.png" alt="">
			</div>
		</div>
	</section>

	<!-- ************************************************ DESCRIPCION ************************************************ -->
	<section id="descripcion" data-scroll-index='1'
		class="ss-style-triangles">
		<div class="row">
			<div class="col-xs-6">
				<h2>
					Una <span class="subrayado">app</span> para tu concurso
				</h2>
				<p class="text-justify">Lorem ipsum dolor sit amet, consectetur
					adipisicing elit. Magnam quam tenetur hic facilis voluptas, veniam
					at accusantium. Consequatur inventore atque temporibus assumenda.
					Fugit commodi quidem, cupiditate adipisci perspiciatis vitae aut.
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero esse
					excepturi cupiditate iusto, maiores minus necessitatibus distinctio
					dicta possimus numquam. Illo atque sed, in impedit veniam adipisci
					cumque autem tempore?</p>
				<a href="folleto/folleto.pdf" class="btn btn-default" role="button">Descarga el folleto</a>
			</div>
			<div class="col-xs-6 hidden-xs">
				<!-- Slider -->
				<div id="fc-slideshow" class="fc-slideshow">
					<ul class="fc-slides">
					<?php 
					$i=0;
					foreach ($establecimientos as $establecimiento) { ?>
						<li><img src="<?php echo $pinchos[$i]->getFoto(); ?>" />
							<h3><?php echo $establecimiento->get_nombre(); ?></h3></li>
					<?php $i++; } ?>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<!-- ************************************************** PINCHOS ************************************************** -->
	<section id="pinchos" data-scroll-index='2' class="ss-style-triangles">
		<!-- ---------------------------------------- Version para moviles ---------------------------------------------- -->
		<div id="pinchosMovil">
			<h2>
				<span class="subrayado">LOS PINCHOS</span>
			</h2>
			<div class="gallery">
				<?php foreach ($pinchos as $pincho) { ?>
					<img src="<?php echo $pincho->getFoto(); ?>" alt="<?php echo $pincho->getNombre(); ?>" />
				<?php } ?>
			</div>
			<button class="captionFlickity btn btn-default" data-toggle="modal"
				data-target=".modal-pincho"></button>
		</div>
		<!-- --------------------------------------- Version para escritorio ------------------------------------------ -->
		<div id="pinchosEscritorio">
			<div class="row">
				<div class="col-xs-12">
					<h2 class="tituloPinchos">
						<span class="subrayado">LOS PINCHOS</span>
					</h2>
				</div>
			</div>			
			<?php 
				$i=0;
				$elements=4;
				foreach ($establecimientos as $establecimiento) { 
					if($elements%4==0) { ?>
						<div class="row">
					<?php } ?>
							<div class="col-xs-3">
								<div class="thumbnail">
									<img src="<?php echo $pinchos[$i]->getFoto(); ?>" alt="<?php echo $pinchos[$i]->getNombre(); ?>">
									<div class="caption">
										<h3><?php echo $pinchos[$i]->getNombre(); ?></h3>
										<p><?php echo $establecimiento->get_nombre(); ?></p>
										<button class="btn btn-default" data-toggle="modal"	data-target=".modal-pincho">Ver Mas</button>
									</div>
								</div>
							</div>
					<?php if($elements%4==3) { ?>
						</div>
					<?php } $elements++; ?>	
				<?php $i++; } ?>				
		</div>
	</section>

	<!-- ************************************************* JURADOS *************************************************** -->
    <section id="jurado" data-scroll-index='3' class="ss-style-triangles">
        <h2>
        	<span class="subrayado">EL JURADO</span>
        </h2>

        <div id="juradoMovil">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">  
			<?php $j = 0;
			foreach ($jurados as $jurado) { ?>
	            <div class="panel panel-default">
	                <div class="panel-heading" role="tab" id="<?php echo $j; ?>heading">
	                    <h4 class="panel-title">
	    					<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="<?php echo '#'.$j; ?>collapse" aria-expanded="false" aria-controls="<?php echo $j; ?>collapse">
	        					<?php echo $jurado->get_nombre(); ?>
	   					    </a>
	 	 				</h4>
	                </div>
	                <div id="<?php echo $j; ?>collapse" class="panel-collapse collapse" role="tabpanel" aria-labelledby="<?php echo $j; ?>heading">
	                    <div class="panel-body">
	   						<?php echo $jurado->get_descripcion(); ?>
	                    </div>
	                </div>
	            </div>
	        <?php $j++; } ?>
        	</div>
        </div>


        <div id="juradoEscritorio">
            <div class="row">
                <?php 
                $nJurados=4;
                foreach ($jurados as $jurado) { 
                	if($nJurados%4==0) { ?>
						<div class="row">
					<?php } ?>
                <div class="col-xs-3">
					<div class="thumbnail">
                        <img src="<?php echo $jurado->get_foto() ?>" alt="foto del jurado" class="img fotoPerfil" \>
                        <div class="caption">
                            <h3><?php echo $jurado->get_nombre(); ?></h3>
                            <button class="btn btn-default" data-toggle="modal" data-target=".modal-jurado">Info</button>
                        </div>
                    </div>
                </div>
				<?php if($nJurados%4==3) { ?>
						</div>
					<?php } $nJurados++; ?>	
				<?php } ?>	
            </div>
        </div>

    </section>

	<!-- ************************************************** LOGIN **************************************************** -->
	<section id="registro" data-scroll-index='4'>
		<div class="row">
			<div class="col-xs-12 col-lg-6">
				<h2>
					<span class="subrayado">Login</span>
				</h2>
				<h3>
					<i>Logueate para poder votar</i>
				</h3>
				<div class="panel panel-primary panelLogin">
					<div class="panel-body">
						<form class="form-horizontal" method="post"
							action="?controller=login&action=validarLogin">
							<div class="form-group">
								<div class="col-xs-12">
									<label for="inputLoginRegistrado">Login</label> <input
										type="text" class="form-control" name="inputLoginRegistrado" id="inputLoginRegistrado"
										placeholder="Nombre de Usuario"
										pattern="[A-Za-z0-9._-]*"
										maxlength="10" required
										>
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-12">
									<label for="inputPasswordRegistrado">Password</label> <input
										type="password" class="form-control" name="inputPasswordRegistrado"
										maxlength="20" required
										pattern="[A-Za-z0-9._-]*"
										id="inputPasswordRegistrado" placeholder="Password">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<button type="submit" class="btn btn-default" name="loguear" onclick="calculaMd5()">Aceptar</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-lg-6">
				<h2>
					<span class="subrayado">Registrate</span>
				</h2>
				<h3>
					<i>Participa en el concurso</i>
				</h3>
				<div class="panel panel-primary panelLogin">
					<div class="panel-body">
						<div class="row">
							<div class="col-xs-12 col-lg-6">
								<button class="btn btn-default botonRegistro "
									data-toggle="modal" data-target=".modal-nuevoUsuario">
									<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
									Nuevo Usuario
								</button>
							</div>
							<div class="col-xs-12 col-lg-6">
								<button class="btn btn-default btn botonRegistro"
									data-toggle="modal" data-target=".modal-nuevoEstablecimiento">
									<span class="glyphicon glyphicon-glass" aria-hidden="true"></span>
									Nuevo Establecimiento
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- ************************************************* DIVISOR *************************************************** -->
	<div class="divisor"></div>

	<!-- *********************************************** GOOGLE MAPS ************************************************* -->
	<section id="gastromapa" data-scroll-index='5'>
		<div class="google-maps">
			<iframe
				src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7098.94326104394!2d78.0430654485247!3d27.172909818538997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1385710909804"
				width="600" height="450" frameborder="0" style="border: 0"></iframe>
		</div>
	</section>

