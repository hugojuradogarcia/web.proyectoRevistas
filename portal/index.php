<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Inicio</title>
		<meta name="description" content="Contenido Digital de libros, revistas, enciclopedias y muchos más..." />
		<meta name="keywords" content="Biblioteca Digital, Biblioteca, Digital, Biblioteca Virtual, Virtual" />
		<meta name="author" content="Grupo Difusión Científica" />
		<link rel="shortcut icon" href="../favicon.ico" />
		<!-- Bootsatrap 3.1.1 CSS -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="all" />
		<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css" media="all" />
		<!-- <link rel="stylesheet" type="text/css" href="css/normalize.css" media="all" /> -->		
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.2.0/css/font-awesome.min.css" media="all" />
		<link rel="stylesheet" type="text/css" href="css/index.css" media="all" />
		<link rel="stylesheet" type="text/css" href="css/drag.css" media="all" />
		<link rel="stylesheet" type="text/css" href="css/pullupmenu.css" media="all" />
		<script src="js/jquery-1.9.1.js"></script>
		<script src="js/jquery-login.js"></script>
		<script src="js/snap.svg-min.js"></script>
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="content">
			<nav id="menu" class="menu">
				<button class="menu__handle"><span>Menu</span></button>
				<div class="menu__inner">
					<ul>
						<li>¿Quieres tu propia biblioteca? Para mayor información haz clic <a href="#">aquí</a></li>
					</ul>
				</div>
				<div class="morph-shape-menu" data-morph-open="M-10,100c0,0,44-95,290-95c232,0,290,95,290,95" data-morph-close="M-10,100c0,0,44,95,290,95c232,0,290-95,290-95">
					<svg width="100%" height="100%" viewBox="0 0 560 200" preserveAspectRatio="none">
						<path fill="none" d="M-10,100c0,0,44,0,290,0c232,0,290,0,290,0" />
					</svg>
				</div>
			</nav>
			<div class="main">
				<div class="top">
					<div class="col-md-offset-6 col-md-6">
						<h1>Ingresa a tu Biblioteca</h1>
					</div>
					<div class="col-md-offset-8 col-md-4">
						<form id="frmLogin" name="frmLogin">
							<label>Usuario:</label>
							<input type="text" id="user" class="placeholder" name="user" placeholder="Escriba su Usuario" required />

							<label>Contraseña:</label>
							<input type="password" id="password" class="placeholder" name="password" placeholder="Escriba su Password" required />

							<input type="submit" id="btnLogin" id="btnLogin" value="Acceder" />

							<div class="loading">
								<img src="img/loading.gif" width="40" height="40" />
							</div>
							<div class="center">
								<label class="link"><a href="#">Soy usuario nuevo</a> /</label>
								<label class="link"><a href="#">Olvidé mi contraseña</a></label>
							</div>
							<div class="message"></div>
						</form>
					</div>
				</div>
				<div class="drag-container">
					<div class="drag-element" id="drag-element-1">
						<span id="morph-shape" class="morph-shape" data-morph-active="M273,273c0,0-55.8,24-123,24c-78.2,0-123-24-123-24S3,235.3,3,150C3,79.936,27,27,27,27S72,3,150,3c85,0,123,24,123,24s24,38.43,24,123C297,229.646,273,273,273,273z">
							<svg width="100%" height="100%" viewBox="0 0 300 300" preserveAspectRatio="none">
								<defs>
									<pattern id="img1" patternUnits="userSpaceOnUse" width="100%" height="100%">
										<image xlink:href="img/asce.png" x="0" y="0" width="100%" height="100%" />
									</pattern>
								</defs>
								<path d="M273,273c0,0-55.8,0-123,0c-78.2,0-123,0-123,0s0-37.7,0-123c0-70.064,0-123,0-123s45,0,123,0c85,0,123,0,123,0s0,38.43,0,123C273,229.646,273,273,273,273z" fill="url(#img1)" />
							</svg>
						</span>
						<!-- <i class="fa fa-fw fa-arrows"></i> -->
					</div>
					<div class="drag-element" id="drag-element-2">
						<span id="morph-shape" class="morph-shape" data-morph-active="M273,273c0,0-55.8,24-123,24c-78.2,0-123-24-123-24S3,235.3,3,150C3,79.936,27,27,27,27S72,3,150,3c85,0,123,24,123,24s24,38.43,24,123C297,229.646,273,273,273,273z">
							<svg width="100%" height="100%" viewBox="0 0 300 300" preserveAspectRatio="none">
								<defs>
									<pattern id="img2" patternUnits="userSpaceOnUse" width="100%" height="100%">
										<image xlink:href="img/aula-padres.png" x="0" y="0" width="100%" height="100%" />
									</pattern>
								</defs>
								<path d="M273,273c0,0-55.8,0-123,0c-78.2,0-123,0-123,0s0-37.7,0-123c0-70.064,0-123,0-123s45,0,123,0c85,0,123,0,123,0s0,38.43,0,123C273,229.646,273,273,273,273z" fill="url(#img2)" />
							</svg>
						</span>
						<!-- <i class="fa fa-fw fa-arrows"></i> -->
					</div>
					<div class="drag-element drag-element--alt" id="drag-element-3">
						<span id="morph-shape" class="morph-shape" data-morph-active="M273,273c0,0-55.8,24-123,24c-78.2,0-123-24-123-24S3,235.3,3,150C3,79.936,27,27,27,27S72,3,150,3c85,0,123,24,123,24s24,38.43,24,123C297,229.646,273,273,273,273z">
							<svg width="100%" height="100%" viewBox="0 0 300 300" preserveAspectRatio="none">
								<defs>
									<pattern id="img3" patternUnits="userSpaceOnUse" width="100%" height="100%">
										<image xlink:href="img/bibliotechnia.png" x="0" y="0" width="100%" height="100%" />
									</pattern>
								</defs>
								<path d="M273,273c0,0-55.8,0-123,0c-78.2,0-123,0-123,0s0-37.7,0-123c0-70.064,0-123,0-123s45,0,123,0c85,0,123,0,123,0s0,38.43,0,123C273,229.646,273,273,273,273z" fill="url(#img3)" />
							</svg>
						</span>
						<!-- <i class="fa fa-fw fa-arrows"></i> -->
					</div>
					<div class="drag-element drag-element--alt" id="drag-element-4">
						<span id="morph-shape" class="morph-shape" data-morph-active="M273,273c0,0-55.8,24-123,24c-78.2,0-123-24-123-24S3,235.3,3,150C3,79.936,27,27,27,27S72,3,150,3c85,0,123,24,123,24s24,38.43,24,123C297,229.646,273,273,273,273z">
							<svg width="100%" height="100%" viewBox="0 0 300 300" preserveAspectRatio="none">
								<defs>
									<pattern id="img4" patternUnits="userSpaceOnUse" width="100%" height="100%">
										<image xlink:href="img/legis.png" x="0" y="0" width="100%" height="100%" />
									</pattern>
								</defs>
								<path d="M273,273c0,0-55.8,0-123,0c-78.2,0-123,0-123,0s0-37.7,0-123c0-70.064,0-123,0-123s45,0,123,0c85,0,123,0,123,0s0,38.43,0,123C273,229.646,273,273,273,273z" fill="url(#img4)" />
							</svg>
						</span>
						<!-- <i class="fa fa-fw fa-arrows"></i> -->
					</div>
					<div class="drag-element drag-element--alt" id="drag-element-5">
						<span id="morph-shape" class="morph-shape" data-morph-active="M273,273c0,0-55.8,24-123,24c-78.2,0-123-24-123-24S3,235.3,3,150C3,79.936,27,27,27,27S72,3,150,3c85,0,123,24,123,24s24,38.43,24,123C297,229.646,273,273,273,273z">
							<svg width="100%" height="100%" viewBox="0 0 300 300" preserveAspectRatio="none">
								<defs>
									<pattern id="img5" patternUnits="userSpaceOnUse" width="100%" height="100%">
										<image xlink:href="img/oceano-admon.png" x="0" y="0" width="100%" height="100%" />
									</pattern>
								</defs>
								<path d="M273,273c0,0-55.8,0-123,0c-78.2,0-123,0-123,0s0-37.7,0-123c0-70.064,0-123,0-123s45,0,123,0c85,0,123,0,123,0s0,38.43,0,123C273,229.646,273,273,273,273z" fill="url(#img5)" />
							</svg>
						</span>
						<!-- <i class="fa fa-fw fa-arrows"></i> -->
					</div>
					<div class="drag-element drag-element--alt" id="drag-element-6">
						<span id="morph-shape" class="morph-shape" data-morph-active="M273,273c0,0-55.8,24-123,24c-78.2,0-123-24-123-24S3,235.3,3,150C3,79.936,27,27,27,27S72,3,150,3c85,0,123,24,123,24s24,38.43,24,123C297,229.646,273,273,273,273z">
							<svg width="100%" height="100%" viewBox="0 0 300 300" preserveAspectRatio="none">
								<defs>
									<pattern id="img6" patternUnits="userSpaceOnUse" width="100%" height="100%">
										<image xlink:href="img/smrt.png" x="0" y="0" width="100%" height="100%" />
									</pattern>
								</defs>
								<path d="M273,273c0,0-55.8,0-123,0c-78.2,0-123,0-123,0s0-37.7,0-123c0-70.064,0-123,0-123s45,0,123,0c85,0,123,0,123,0s0,38.43,0,123C273,229.646,273,273,273,273z" fill="url(#img6)" />
							</svg>
						</span>
						<!-- <i class="fa fa-fw fa-arrows"></i> -->
					</div>
					<div class="drag-element drag-element--alt" id="drag-element-7">
						<span id="morph-shape" class="morph-shape" data-morph-active="M273,273c0,0-55.8,24-123,24c-78.2,0-123-24-123-24S3,235.3,3,150C3,79.936,27,27,27,27S72,3,150,3c85,0,123,24,123,24s24,38.43,24,123C297,229.646,273,273,273,273z">
							<svg width="100%" height="100%" viewBox="0 0 300 300" preserveAspectRatio="none">
								<defs>
									<pattern id="img7" patternUnits="userSpaceOnUse" width="100%" height="100%">
										<image xlink:href="img/vademecum.png" x="0" y="0" width="100%" height="100%" />
									</pattern>
								</defs>
								<path d="M273,273c0,0-55.8,0-123,0c-78.2,0-123,0-123,0s0-37.7,0-123c0-70.064,0-123,0-123s45,0,123,0c85,0,123,0,123,0s0,38.43,0,123C273,229.646,273,273,273,273z" fill="url(#img7)" />
							</svg>
						</span>
						<!-- <i class="fa fa-fw fa-arrows"></i> -->
					</div>
				</div>
			</div><!-- main -->
		</div><!-- content -->
		<script src="js/classie.js"></script>
		<script src="js/draggabilly.pkgd.min.js"></script>
		<script src="js/menu.js"></script>
		<script src="js/footer.js"></script>
	</body>
</html>
