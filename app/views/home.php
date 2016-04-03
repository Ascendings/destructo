{% extends 'templates/default.twig' %}

{% block content %}
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-body">
					<form action="{{ path_for('send') }}" method="POST" autocomplete="off">
						<div class="form-group">
							<label for="email">Send to</label>
							<input type="email" name="email" id="email" class="form-control" placeholder="someone@example.com" />
						</div>

						<div class="form-group">
							<label for="message">Message</label>
							<textarea name="message" id="message" placeholder="Enter a message to your recipient" cols="30" rows="10"  class="form-control"></textarea>
						</div>

						<button class="btn">Send</button>
					</form>
				</div>
			</div>
		</div>
	</div>
{% endblock %}
