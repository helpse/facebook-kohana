<?php defined('SYSPATH') or die('No direct script access.');

class Kohana_FB extends Facebook {
	
	/**
	 *
	 * @var  Array  Configuration array
	 */
	public $config;
	
	/**
	 *
	 * @var  Kohana_FB  Singleton instance
	 */
	protected static $instance = null;

	public function __construct()
	{
		$this->config = Kohana::$config->load('FB')->as_array();

		parent::__construct($this->config);
	}

	/**
	 * Gets login URL based on settings
	 * 
	 * @param   Array  $params  Parameters array
	 * @return  string
	 */
	public function getLoginUrl($params = array())
	{
		if (empty($params))
		{
			$params = $this->config['params'];
			
			// Make redirect_uri absolute
			$params['redirect_uri'] = URL::site($params['redirect_uri'], TRUE);
		}
		return parent::getLoginUrl($params);
	}
	
	/**
	 * This is shortcut for $this->api($url, 'GET');
	 * 
	 * @param   string  $url  OpenGraph URL
	 * @return  mixed
	 */
	public function get($url)
	{
		return $this->api($url, 'GET');
	}
	/**
	 * Creates a singleton instance of FB
	 * 
	 * @return  FB
	 */
	public static function instance()
	{
		if ( ! self::$instance instanceof Kohana_FB)
		{
			self::$instance = new FB;
		}
		return self::$instance;
	}

	/**
	 * @return  FB
	 */
	public static function factory()
	{
		return new FB;
	}
}
