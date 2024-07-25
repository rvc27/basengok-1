<!doctype html>
<html>

<head>
	<title>404 Page Not Found</title>
	<link href='https://fonts.googleapis.com/css?family=Poppins:700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Poppins:400' rel='stylesheet' type='text/css'>


	<style>
		body {
			background-image: url('<?= base_url('assets'); ?>/uploads/images/404G.jpg');
			background-size: 100%;
			background-repeat: no-repeat;
			color: white;
		}

		div {
			font-family: Source Sans Pro, sans-serif;
			position: absolute;
			width: 400px;
			height: 300px;
			z-index: 15;
			top: 15%;
			left: 50%;
			margin: -100px 0 0 -200px;
			text-align: center;
		}

		h1,
		h2 {
			text-align: center;
		}

		h1 {
			font-family: Poppins, sans-serif;
			font-size: 160px;
			font-weight: 900;
			margin-bottom: 5px;

		}

		h2 {
			font-family: Poppins, sans-serif;
			font-size: 36px;
			margin-top: -60px;

		}

		p {
			font-family: Poppins, sans-serif;
			margin-top: -10px;
			margin-bottom: 40px;
		}

		a {
			margin-top: 10px;
			letter-spacing: 1px;
			text-decoration: none;
			padding: 10px 25px;
			background-color: transparent;
			border-radius: 6px;
			color: white;
			margin-top: 20px;
		}
	</style>
</head>

<body>
	<div>
		<h1>404</h1>
		<h2>PAGE NOT FOUND</h2>
		<p>Sorry, we couldn't find the page you're looking for.</p>
		<a href='<?= base_url(); ?>'>BACK TO HOMEPAGE</a>
	</div>
</body>

</html>