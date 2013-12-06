<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Home extends CI_Controller {

	/**
	 * Home page
	 */
	public function index ()
	{
		/* Set layout properties */
		$this->layout->setTitle('Bienvenue');
		$this->layout->addLess('home');
		$this->layout->addJs('question');

		/* Load page content */
		$this->layout->loadPageContent('home');
	}
}
