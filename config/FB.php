<?php defined('SYSPATH') OR die('No direct access allowed.');

return array(
	'appId'         => '',
	'secret'        => '',
	'sharedSession' => FALSE,
	'params'        => array(
		'display'      => 'popup',
		'redirect_uri' => 'welcome/return',
		'scope'        => 'email,user_likes,friends_likes'
	),
);
