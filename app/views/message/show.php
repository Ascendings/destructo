{% extends 'templates/default.php' %}

{% block content %}
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-body">
					{% if message.message %}
						<p>{{ message.message }}</p>
					{% else %}
						<p>The message has self destructed, or never existed to begin with!</p>
					{% endif %}
				</div>
			</div>
		</div>
	</div>
{% endblock %}