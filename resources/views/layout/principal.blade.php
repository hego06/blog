<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Blog with laravel 5.6</title>
	<link rel="stylesheet" href="/css/normalize.css">
	<link rel="stylesheet" href="/css/framework.css">
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/css/responsive.css">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
	@stack('styles')
	
</head>
<body>
	<div class= "back">
	<div class="preload"></div>
	<header class="space-inter">
	
		<div class="container container-flex space-between ">
				<h2>Blog laravel 5.6</h2>
				<nav class="custom-wrapper" id="menu">
					<div class="pure-menu"></div>
					<ul class="container-flex list-unstyled">
						<li><a href="/" class="text-uppercase">Home</a></li>
						<li><a href="about.html" class="text-uppercase">About</a></li>
						<li><a href="archive.html" class="text-uppercase">Archive</a></li>
						<li><a href="contact.html" class="text-uppercase">Contact</a></li>
					</ul>
				</nav>
		</div>
	
	</header>
	</div>
	<div><p></p></div>
	
    @yield('content')

	<section class="footer">
		<footer>
			<div class="container">
				<p>All Rights Reserved</p>
			</div>
		</footer>
	</section>
	 @stack('scripts')
</body>
</html>