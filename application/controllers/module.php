<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Module extends CI_Controller {

	public function index () {
		$this->question();
	}

	public function question ()
	{
		/* Set layout properties */
		$this->layout->setTitle('Posez votre question');
		$this->layout->setSelectedTab('question');
		$this->layout->addJs('question');

		/* Load page content */
		$this->layout->loadPageContent('question');
	}

	public function notifications ()
	{
		/* Set layout properties */
		$this->layout->setTitle('Vos notifications');
		$this->layout->setSelectedTab('notifications');
		$this->layout->addJs('notifications');

		/* Load page content */
		$this->layout->loadPageContent('notifications');
	}
}
