<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Question extends CI_Controller {

    /**
     * Question page
     */
    public function send ()
    {

        /* Load Models * /
        $this->load->model('Questions_Model', 'Questions');
        /* */

        //TODO
        $this->layout->addJs('notifications');

        /* CURL */
        $this->load->library('curl');
        $this->curl->http_header('Accept: application/json');

        // TODO
        $url = urlencode('Je veux un aquarium avec un poisson');

        $names = $this->curl->simple_get('http://spotlight.dbpedia.org/rest/spot/?text=' . $url);
        $namesJSON = json_decode($names, true);
        $tab = $namesJSON["annotation"]["surfaceForm"];

        // Check is it's a associative tab (one result)
        if (is_array($tab) && array_diff_key($tab,array_keys(array_keys($tab)))) {
            echo $tab["@name"];
        } else {
            foreach($tab as $noun) {
                echo $noun["@name"];
            }

        }

        /* Load page content */
        $this->layout->loadPageContent('notification');


    }
}