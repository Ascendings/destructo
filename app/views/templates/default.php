<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<Title>Home</title>
	<!-- stylesheets -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>
	{% include 'templates/partials/navbar.twig' %}

	<div class="container">
		{% block content %}{% endblock %}
	</div>

	<!-- javascripts -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>
