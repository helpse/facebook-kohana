<?php

class Core_FB extends Facebook {
	public $config;

	public function __construct()
	{
		$this->config = Kohana::$config->load('FB')->as_array();

		parent::__construct($this->config);
	}

	public function getLoginUrl($params = array())
	{
		if (empty($params))
		{
			$params = array(
				'display' => 'popup',
				'redirect_uri' => URL::site(Route::get('FB-auth')->uri(), Request::$current),
				'scope' => 'email,user_likes,friends_likes'
			);
		}
		return parent::getLoginUrl($params);
	}

	static function factory()
	{
		return new Core_FB;
	}
}
