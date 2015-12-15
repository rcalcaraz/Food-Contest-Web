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
											placeholder="Email">
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12">
										<label for="inputLoginNuevoUsuario">Nombre de Usuario</label>
										<input type="text" class="form-control"
											id="inputLoginNuevoUsuario" name="inputLoginNuevoUsuario" placeholder="Nombre de Usuario">
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12">
										<label for="inputPasswordNuevoUsuario">Password</label> <input
											type="password" class="form-control" name="inputPasswordNuevoUsuario"
											id="inputPasswordNuevoUsuario" placeholder="Password">
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
												placeholder="Nombre de usuario">
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-12">
											<label for="inputPasswordNuevoEstablecimiento">Contraseña</label>
											<input type="password" class="form-control"
												name="inputPasswordNuevoEstablecimiento"
												id="inputPasswordNuevoEstablecimiento"
												placeholder="Contraseña">
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-12">
											<label for="inputNombreNuevoEstablecimiento">Establecimiento</label>
											<input type="text" class="form-control"
												name="inputNombreNuevoEstablecimiento"
												id="inputNombreNuevoEstablecimiento"
												placeholder="Nombre del establecimiento">
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-12">
											<label for="inputDireccionNuevoEstablecimiento">Direccion</label>
											<input type="text" class="form-control"
												name="inputDireccionNuevoEstablecimiento"
												id="inputDireccionNuevoEstablecimiento"
												placeholder="Direccion">
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-12">
											<label for="inputLocalizacionNuevoEstablecimiento">Localizacion</label>
											<input type="text" class="form-control"
												name="inputLocalizacionNuevoEstablecimiento"
												id="inputLocalizacionNuevoEstablecimiento"
												placeholder="Localizacion geográfica (Ej: 52.4,45.6)">
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-12">
											<label for="inputEnlace1NuevoEstablecimiento">Enlace
												1</label> <input type="text" class="form-control"
												name="inputEnlace1NuevoEstablecimiento"
												id="inputEnlace1NuevoEstablecimiento"
												placeholder="Link a una red social">
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-12">
											<label for="inputEnlace2NuevoEstablecimiento">Enlace
												2</label> <input type="text" class="form-control"
												name="inputEnlace2NuevoEstablecimiento"
												id="inputEnlace2NuevoEstablecimiento"
												placeholder="Link a una red social">
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-12">
											<label for="inputEnlace3NuevoEstablecimiento">Enlace
												3</label> <input type="text" class="form-control"
												name="inputEnlace3NuevoEstablecimiento"
												id="inputEnlace3NuevoEstablecimiento"
												placeholder="Link a una red social">
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-12">
											<label for="inputDescripcionNuevoEstablecimiento">Descripcion</label>
											<textarea class="col-xs-12"rows="5"
												class="form-control"
												name="inputDescripcionNuevoEstablecimiento"
												id="inputDescripcionNuevoEstablecimiento"
												placeholder="Describe tu establecimiento"></textarea>
										</div>
									</div>
								</div>
								<div class="col-xs-12 col-lg-6">
									<div class="form-group">
										<div class="col-xs-12">
											<label for="inputNombreNuevoPincho">Pincho</label> <input
												type="text" class="form-control"
												id="inputNombreNuevoPincho"
												placeholder="Nombre del pincho">
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-12">
											<label for="inputPrecioNuevoPincho">Precio (€)</label> <input
												type="text" class="form-control" id="inputPrecioNuevoPincho"
												placeholder="Precio (Ej: 3.5)">
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-12">
											<label for="inputFotoNuevoPincho">Foto</label> <input
												type="file" class="form-control" id="inputFotoNuevoPincho">
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-12">
											<label for="inputIngredientesNuevoPincho">Buscar
												Ingrediente</label> <input type="text" class="form-control"
												id="inputIngredientesNuevoPincho"
												placeholder="Buscar Ingrediente">
											<button id="nuevoIngrediente"
												class="btn btn-default botonIngrediente" type="button">Añadir
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
					<li><a href="" data-scroll-nav='4'>Votar</a></li>
					<li><a href="" data-scroll-nav='5'>Gastromapa</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#"><?php echo $_SESSION['login']; ?></a></li> 
					<li><a href="?controller=login&action=cerrarSesion">Cerrar sesión</a></li>
				</ul>

			</div>
		</div>
	</nav>


	<!----------------------------------------------- Contenido principal ----------------------------------------------->
	<!-- ************************************************** PORTADA ************************************************** -->
	<section id="portada" data-scroll-index='0'>
		<div class="row">
			<div class="col-xs-12">
				<h1>
					<span class="subrayadoTitulo">CLICK-A-PINCHO</span>
				</h1>
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
				<button class="btn btn-default">Descarga el folleto</button>
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
					<img src="images/1.jpg" alt="<?php echo $pincho->getNombre(); ?>" />
				<?php } ?>
				<img src="images/2.jpg" alt="deconstrucmetal" />
			    <img src="images/3.jpg" alt="sidatuna" />
			    <img src="images/4.jpg" alt="bitchplease" />
			    <img src="images/5.jpg" alt="melones" />
			</div>
			<button class="captionFlickity btn btn-default" data-toggle="modal"
				data-target=".modal-pincho"></button>
			<p class="local subrayado">Local</p>
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
			<div class="row">
				<?php 
					$i=0;
					foreach ($establecimientos as $establecimiento) { ?>
						<div class="col-xs-3">
						<div class="thumbnail">
							<img src="<?php echo $pinchos[$i]->getFoto(); ?>" alt="<?php echo $pinchos[$i]->getNombre(); ?>">
							<div class="caption">
								<h3><?php echo $pinchos[$i]->getNombre(); ?></h3>
								<p><?php echo $establecimiento->get_nombre(); ?></p>
								<button class="btn btn-default" data-toggle="modal"
									data-target=".modal-pincho">Ver Mas</button>
								</div>
							</div>
						</div>
				<?php $i++; } ?>
			</div>
		</div>
	</section>

	<!-- ********************************************** JURADOS ********************************************* -->
    <section id="jurado" data-scroll-index='3' class="ss-style-triangles">
        <h2><span class="subrayado">EL JURADO</span></h2>
        <div id="juradoMovil">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <?php echo $jurados[0]->get_nombre(); ?>
        </a>
      </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>
		<?php
		 $j = 0;
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
                <?php foreach ($jurados as $jurado) { ?>
                <div class="col-xs-3">
					<div class="thumbnail">
                        <img src="<?php echo $jurado->get_foto() ?>" alt="..." class="img fotoPerfil" \>
                        <div class="caption">
                            <h3><?php echo $jurado->get_nombre(); ?></h3>
                            <button class="btn btn-default" data-toggle="modal" data-target=".modal-jurado">Info</button>
                        </div>
                    </div>
                </div>
				<?php ; } ?>
            </div>
        </div>
    </section>
	<!-- *********************************************** VOTAR ******************************************************* -->
	<section id="votacion" data-scroll-index='4'>
		<div class="row">
			<div class="col-xs-12">
				<h2>
					<span class="subrayado">Vota</span>
				</h2>
				<p class="subtituloVotacion">Introduce el codigo del pincho que
					quieres votar en primer lugar, y a continuación dos más</p>
				<div class="panel panel-primary">
					<div class="panel-body">
						<form class="form-horizontal" method="POST"
								action="?controller=juradopopular&action=votar">
							<div class="form-group">
								<div class="col-xs-12">
									<label for="inputVoto1">Codigo del pincho por el que voto</label> 
									<input type="text" class="form-control" id="inputVoto1" name="inputVoto1" placeholder="Código por el que voto">
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-12">
									<label for="inputVoto2">Otro código</label> 
									<input type="text" class="form-control" id="inputVoto2" name="inputVoto2" placeholder="Otro código">
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-12">
									<label for="inputVoto2">Otro código</label> 
									<input type="text"class="form-control" id="inputVoto3" name="inputVoto3" placeholder="Otro código">
								</div>
							</div>

							<div class="form-group">
								<div class="col-sm-12">
									<button type="submit" class="btn btn-default">Aceptar</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- ******************************************** DIVISOR ****************************************************** -->
	<div class="divisor"></div>

	<!-- ******************************************** GOOGLE MAPS **************************************************** -->
	<section id="gastromapa" data-scroll-index='5'>
		<div class="google-maps">
			<iframe
				src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7098.94326104394!2d78.0430654485247!3d27.172909818538997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1385710909804"
				width="600" height="450" frameborder="0" style="border: 0"></iframe>
		</div>
	</section>