
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="https://getbootstrap.com/docs/4.0/assets/img/favicons/favicon.ico">

	<title>Sticky Footer Navbar Template for Bootstrap</title>

	<link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sticky-footer-navbar/">

	<!-- Bootstrap core CSS -->
	<link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="https://getbootstrap.com/docs/4.0/examples/sticky-footer-navbar/sticky-footer-navbar.css" rel="stylesheet">
</head>

<body>

<header>
	<!-- Fixed navbar -->
	<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
		<a class="navbar-brand" href="#">Catálogo de Livros</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarCollapse">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="<?= base_url('/') ?>">Início<span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<?=
					($this->session->userdata('logado') == 1) ?
						'<a class="nav-link" href="' .base_url('/livros') .'">Painel</a>'
						:
						'<a class="nav-link" href="' .base_url('/admin') .'">Entrar</a>'
					?>
				</li>
			</ul>
			<form class="form-inline mt-2 mt-md-0" method="post" action="<?= base_url('/') ?>">
				<input class="form-control mr-sm-2" type="text" placeholder="Procurar" aria-label="Search" name="procurar">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Procurar</button>
			</form>
		</div>
	</nav>
</header>

<!-- Begin page content -->
<main role="main">

	<section class="jumbotron text-center mb-0">
		<div class="container">
			<h1 class="jumbotron-heading">Catálogo de exemplo</h1>
			<p class="lead text-muted">Seu catálogo de livros pessoal.</p>
			<p>
				<a href="#" class="btn btn-primary my-2">Repositório do Github</a>
				<a href="https://github.com/rafinhaa" class="btn btn-secondary my-2">Meu repositório </a>
			</p>
		</div>
	</section>

	<div class="album py-5 bg-light">
		<div class="container">
			<div class="row">
				<?php foreach ($livros as $livro) { ?>
					<div class="col-md-4">
						<div class="card mb-4 box-shadow">
							<img class="card-img-top" src="upload/<?= $livro->img?>" data-holder-rendered="true" style="height: 100%; width: 100%; display: block;">
							<div class="card-body">
								<h5 class="mt-0"><?= $livro->titulo ?></h5>
								<p class="card-text"><?= $livro->resumo ?></p>
								<div class="d-flex justify-content-between align-items-center">
									<div class="btn-group">
										<?php if($this->session->userdata('logado')) {
											echo '<a href="' . base_url('livros/editar/' . $livro->id) . '" class="btn btn-sm btn-outline-secondary">Editar</a>';
										} ?>
									</div>
									<small class="text-muted">R$ <?= $livro->preco ?></small>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>

</main>

<footer class="footer">
	<div class="container">
		<span class="text-muted">Catálogo de Livros - <a href="https://github.com/rafinhaa">By Rafinhaa</a></span>
	</div>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"><\/script>')</script>
<script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"></script>
<script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
