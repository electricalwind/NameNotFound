<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: cyrilcecchinel
 * Date: 05/12/2013
 * Time: 22:44
 */

class ReponsesTest extends CI_Controller {
    public function __construct() {
        parent::__construct();

        // Load the model projects_model
        $this->load->model('reponses_model', 'reponses');
    }

    public function test()
    {
        $result = $this->reponses->getAllReponsesForAQuestion(17,2);
        foreach ($result->result() as $result)
        {
            print_r($result);
        }
    }

}


