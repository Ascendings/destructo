{% extends 'templates/default.php' %}

{% block content %}
	<div class="row">
		<div class="medium-6 medium-offset-3 columns">
			<div class="panel">
				<form action="#" method="POST" autocomplete="off">
					<div class="input-group">
						<label for="email">
							Send to
							<input type="email" name="email" id="email" placeholder="someone@example.com" />
						</label>
					</div>
					<div class="input-group">
						<label for="message">
							Message
							<textarea name="message" id="message" placeholder="Enter a message to your recipient" cols="30" rows="10"></textarea>
						</label>
					</div>
					
					<button class="btn">Send</button>
				</form>
			</div>
		</div>
	</div>
{% endblock %}