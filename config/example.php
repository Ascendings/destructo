<?php

return [
	
	'url' => 'https://destructo.example.com',
	
	'db' => [
		'mysql' => [
			'host' => 'db.example.com',
			'dbname' => 'appname',
			'username' => 'appname',
			'password' => 'secret-pass',
		]
	],

	'services' => [
		
		'mailgun' => [
			'domain' => 'destructo.example.com',
			'secret' => 'secret-key',
		]
		
	]
	
];
