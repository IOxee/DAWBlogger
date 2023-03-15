<!doctype html>
<html>
    <head>
        <title>DAW Blogger</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Isidre Rosell">
        <meta name="description" content="DAW Blogger">

		<link rel="stylesheet" href="<?= base_url('assets/style.css') ?>">
		
        <!-- CDN -->
            <!-- Bootstrap CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

            <!-- Boostrap Icons -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css" integrity="sha512-YFENbnqHbCRmJt5d+9lHimyEMt8LKSNTMLSaHjvsclnZGICeY/0KYEeiHwD1Ux4Tcao0h60tdcMv+0GljvWyHg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

			<!-- JQuery -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

			
	</head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="<?= base_url() ?>">
					<img src="https://raw.githubusercontent.com/IOxee/DelawareTelegraph/main/app/assets/img/delaware_telegraph_background_white_icon.png" width="428" height="120">
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
						<li>
							<a class="btn btn-outline-dark mx-2 my-3" type="submit" href="<?= base_url() ?>">
							<i class="bi bi-newspaper"></i> Publicacions
						</a>
						</li>
						<li>
							<a class="btn btn-outline-dark mx-2 my-3" href="<?= base_url('news/create') ?>">
							<i class="bi bi-pen"></i> Crear publicació
						</a>
						</li>
						<li>
							<a class="btn btn-outline-dark mx-2 my-3" type="submit">
								<i class="bi bi-tags"></i> Categories
							</a>
						</li>
						<li>
							<a class="btn btn-outline-dark mx-2 my-3" type="submit" href="<?= base_url('contact') ?>">
								<i class="bi bi-clipboard"></i> Contacte
							</a>
						</li>
					</ul>
        		</div>
				<div class="float-right">
					<ul class="navbar-nav">
						<?php if (session()->get('loggedIn')): ?>
							<li>
								<a class="btn btn-outline-dark mx-2 my-3" type="submit" href="<?= base_url('panel') ?>">
									<i class="bi bi-person"></i>
									<?= strtoupper(substr(session()->get('name'), 0, 1)) . substr(session()->get('name'), 1)?>
								</a>
							</li>
							<li>
								<a class="btn btn-outline-dark mx-2 my-3" type="submit" href="<?= base_url('logout') ?>">
									<i class="bi bi-box-arrow-right"></i> Tancar sessió
								</a>
							</li>
						<?php else: ?>
							<li>
								<a class="btn btn-outline-dark mx-2 my-3" type="submit" href="<?= base_url('login') ?>">
									<i class="bi bi-box-arrow-in-right"></i> Iniciar sessió
								</a>
							</li>
							<li>
								<a class="btn btn-outline-dark mx-2 my-3" type="submit" href="<?= base_url('register') ?>">
									<i class="bi bi-person-plus"></i> Registrar-se
								</a>
							</li>
						<?php endif; ?>
					</ul>
				</div>
            </div>
        </nav>