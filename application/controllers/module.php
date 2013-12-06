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
		$this->layout->setTitle('Notifications');
		$this->layout->setSelectedTab('notifications');
		$this->layout->addJs('notifications');

        /* Load Models */
        $this->load->model('Questions_Model', 'questions');
        $this->load->model('Users_Model', 'users');

        $result = $this->questions->listQuestion();
        $array = array();
        $i = 0;
        foreach ($result->result() as $row)
        {
	        $array[$i]['id'] = $row->id;
            $array[$i]['content'] = $row->content;
            $array[$i]['themes'] = $this->questions->getQuestionThemes($row->id);
            $array[$i]['user'] = $this->users->getUserInfo($row->idUser);
            $i++;
        }

        $themes = array();
        $result = $this->questions->getThemes();
        foreach ($result->result() as $row)
        {
            $themes[] = $row;
        }

        $data = array(
            'notifs' => $array,
            'themes' => $themes
        );

		/* Load page content */
		$this->layout->loadPageContent('notifications', $data);
	}
}
