<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Question extends CI_Controller {

    /**
     * Question page
     */
    public function send ()
    {
        if (getUserId() == 0) redirect('module/notifications');

        /* Load Models */
        $this->load->model('Questions_Model', 'questions');

        $question = $this->input->post('question');

        /* CURL */
        $this->load->library('curl');
        $this->curl->http_header('Accept: application/json');
        $url = urlencode($question);

        $names = $this->curl->simple_get('http://spotlight.dbpedia.org/rest/spot/?text=' . $url);
        $namesJSON = json_decode($names, true);
        $arrayIdThemes = array();

        if (isset($namesJSON["annotation"]["surfaceForm"])) {
            $tab = $namesJSON["annotation"]["surfaceForm"];

            $arrayThemes = array();

            // Check is it's a associative tab (one result)
            if (is_array($tab) && array_diff_key($tab,array_keys(array_keys($tab)))) {
                $arrayThemes [] = $tab["@name"];
            } else {
                foreach($tab as $noun) {
                    $arrayThemes [] = $noun["@name"];
                }
            }

            foreach($arrayThemes as $theme) {
                $result = $this->questions->getThemes();
                $array = array();
                foreach ($result->result() as $row)
                {
                    $array[] = $row->name;
                }

                if (in_array($theme, $array)) {
                    $theme;
                } else {
                    $this->questions->addTheme($theme);
                }
            }

            $result = $this->questions->getThemes();
            $arrayThemesExistants = array();
            foreach ($result->result() as $row)
            {
                $arrayThemesExistants[] = $row;
            }


            foreach ($arrayThemes as $theme) {
                foreach ($arrayThemesExistants as $themeExistant) {
                    if ($themeExistant->name == $theme)
                        $arrayIdThemes[] = $themeExistant->id;
                }
            }
        }

        $this->questions->addQuestion(getUserId(), $question, $arrayIdThemes);

        redirect('module/notifications');
    }

    /**
     * Question page
     */
    public function respond ($idQuestion)
    {
        if (getUserId() == 0) redirect('module/notifications');

        if (!isset($idQuestion))
            redirect('module/notifications');


        /* Load Models */
        $this->load->model('Reponses_Model', 'reponses');

        $response = $this->input->post('response');


        $this->reponses->addReponse(getUserId(), $idQuestion, $response);

        redirect('module/notifications');
    }
}