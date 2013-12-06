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

    public function myquestions ()
    {
        if (getUserId() == 0) redirect('module/notifications');

        /* Set layout properties */
        $this->layout->setTitle('Mes questions');
        $this->layout->setSelectedTab('myquestions');
        $this->layout->addJs('myquestions');

        /* Load Models */
        $this->load->model('Questions_Model', 'questions');
        $this->load->model('Users_Model', 'users');

        $result = $this->questions->listQuestion();
        $array = array();
        $i = 0;
        foreach ($result->result() as $row)
        {
            if ($row->idUser == getUserId()) {
                $array[$i]['id'] = $row->id;
                $array[$i]['content'] = $row->content;
                $array[$i]['themes'] = $this->questions->getQuestionThemes($row->id);
                $array[$i]['user'] = $this->users->getUserInfo($row->idUser);
                $i++;
            }
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
        $this->layout->loadPageContent('myquestions', $data);
    }

    public function responses ($idQuestion = '')
    {
        if (!isset($idQuestion) || $idQuestion == '') redirect('module/notifications');

        /* Set layout properties */
        $this->layout->setTitle('Réponses');
        $this->layout->addJs('responses');

        /* Load Models */
        $this->load->model('Reponses_Model', 'reponses');
        $this->load->model('Users_Model', 'users');
        $this->load->model('Questions_Model', 'questions');

        $questions = $this->questions->listQuestion();
        $question = null;
        foreach ($questions->result() as $row)
        {
            if ($idQuestion == $row->id) {
                $question = $row;
            }
        }
        if ($question == null) redirect('module/notifications');

        $result = $this->reponses->getAllReponsesForAQuestion($idQuestion);
        $array = array();
        $i = 0;
        foreach ($result->result() as $row)
        {
            $array[$i]['id'] = $row->id;
            $array[$i]['content'] = $row->content;
            $array[$i]['user'] = $this->users->getUserInfo($row->idUser);
            $i++;
        }


        $data = array(
            'notifs' => $array,
            'question' => $question
        );

        /* Load page content */
        $this->layout->loadPageContent('responses', $data);
    }
}
