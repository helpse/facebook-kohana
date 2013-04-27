<?php

class Controller_Facebook extends Controller {
	function action_index()
	{
		if (IS_LOCAL){
			$this->response->body(View::factory('facebook_example'));
		}
	}
}