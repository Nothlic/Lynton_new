<!DOCTYPE html>
<html lang="en">
<!-- Required meta tags -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="initial-scale = 1.0,maximum-scale = 1.0" />
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Lynton</title>
<meta name="description" content="Lynton Description">
<meta name="keywords" content="Lynton Keywords">

<head>
	<link rel="icon" href="<?php echo base_url() ?>assets/img/logo.png" type="image/png" sizes="16x16">
	<link href="<?= base_url('assets/'); ?>sass/style.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/'); ?>css/navbar.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/'); ?>css/footer.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/library/boostrap.min.css" />

	<link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css" rel="stylesheet" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css" rel="stylesheet" />
	<link href="<?= base_url('assets/'); ?>css/library/aos.css" rel="stylesheet">
</head>

<body>

	<div class="navigation-wrap start-header start-style">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<nav class="navbar navbar-expand-md navbar-light">

						<a class="navbar-brand" href="<?php echo base_url() ?>"><img src="<?= base_url('assets/img/') ?>Logo.png" alt=""></a>

						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>

						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav ml-auto py-4 py-md-0">
								<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
									<a class="nav-link" href="<?= base_url() ?>">Home</a>
								</li>
								<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
									<a class="nav-link" href="<?php echo base_url() ?>tenant">Become Tenant</a>
								</li>
								<li class="pl-4 pl-md-0 ml-0 ml-md-4">
									<a class="btn btn-sm btn-primary btn-nav" href="<?php echo base_url() ?>login">Login</a>
								</li>
							</ul>
						</div>

					</nav>
				</div>
			</div>
		</div>
	</div>