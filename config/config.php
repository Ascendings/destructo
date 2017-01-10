<?php

return [
	
	'url' => 'https://localhost:3500',
	
	'db' => [
		'sqlite3' => [
			'path' => 'destructo.db',
		],
	],

	'services' => [
		
		'mailgun' => [
			'domain' => 'destructo.example.com',
			'secret' => 'secret-key',
		]
		
	]
	
];
