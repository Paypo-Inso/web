<nav class="navbar navbar-expand-lg bg-green-light">
	<div class="container">
		<a class="navbar-brand" href="javascript:void(0)">
			<img src="view/public/img/logo.png" alt="logo" class="img-fluid" width="50" />
		</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
			aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<div class="navbar-nav mx-lg-auto">
				<a class="nav-item nav-link" href="inicio">Inicio</a>
                <span class="fw-bold mx-2 py-2">|</span>
				<a class="nav-item nav-link" href="recordarios">Recordarios</a>
				<span class="fw-bold mx-2 py-2">|</span>
				<a class="nav-item nav-link" href="pendientes">Pagos pendientes</a>
				<span class="fw-bold mx-2 py-2">|</span>
				<a class="nav-item nav-link" href="agregar">Registrar pago</a>
			</div>
			<ul class="navbar-nav ms-auto mb-2 mb-lg-0 profile-menu">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown" role="button"
						data-bs-toggle="dropdown" aria-expanded="false">
						<i class="fas fa-user"></i>
						<span class="ms-1"><?php echo $_SESSION["nombrepaypo"] ?></span>
					</a>
					<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
						<li>
							<a class="dropdown-item" href="salir">
								<i class="fas fa-sign-out-alt fa-fw"></i> Salir
							</a>
						</li>
						<div class="js-contenedorrespuestasalertas"></div>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>