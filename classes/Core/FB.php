<?php defined('SYSPATH') or die('No direct script access.');

class Core_FB extends Facebook {
	
	public $config;
	
	protected static $instance = null;

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
	
	public function get($url)
	{
		return $this->api($url, 'GET');
	}
	
	static function instance()
	{
		if ( ! self::$instance instanceof Core_FB)
		{
			self::$instance = new Core_FB;
		}
		return self::$instance;
	}

	static function factory()
	{
		return new Core_FB;
	}
}
