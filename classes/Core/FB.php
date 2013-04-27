<?php

class Core_FB extends Facebook {
	public $config;

	public function __construct()
	{
		$this->config = Kohana::$config->load('FB')->as_array();

		parent::__construct($this->config);
	}

	static function factory()
	{
		return new Core_FB;
	}
}
