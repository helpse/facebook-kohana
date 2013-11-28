<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Example extends Controller {

	function action_index()
	{
		$fb = FB::instance();
		
		if ($fb->getUser())
		{
			$fb->getAccessToken();
		}
		$this->response->body('<script>window.close();</script>');
	}
}
