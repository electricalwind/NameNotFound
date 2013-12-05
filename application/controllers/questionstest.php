<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: cyrilcecchinel
 * Date: 05/12/2013
 * Time: 22:44
 */

class QuestionsTest extends CI_Controller {
    public function __construct() {
        parent::__construct();

        // Load the model projects_model
        $this->load->model('questions_model', 'questions');
    }

    public function add()
    {

        echo $this->questions->addQuestion(1, "Mon autre super question", array(1,2));

    }

    public function remove($id)
    {
        echo $this->questions->removeQuestion($id);
    }

    public function test()
    {
        $result = $this->questions->getQuestionThemes(63);


        foreach ($result as $row)
        {
            echo $row["name"];

        }
    }

}

