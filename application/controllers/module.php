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

        /* Load Models */
        $this->load->model('Questions_Model', 'questions');

        $result = $this->questions->listQuestion();
        $array = array();
        $i = 0;
        foreach ($result->result() as $row)
        {
            $array[$i]['content'] = $row->content;
            $array[$i]['themes'] = $this->questions->getQuestionThemes($row->id);
            $i++;
        }

        $data = array(
            'notifs' => $array
        );

		/* Load page content */
		$this->layout->loadPageContent('notifications', $data);
	}
}
