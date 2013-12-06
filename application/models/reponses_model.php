<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/*
 * Reponse model to manage reponses
 */

class Reponses_model extends CI_Model
{
    protected $tableReponses = 'reponse';

    /*
    * Mode constructor
    */
    public function __construct()
    {
        parent::__construct();

    }

    /***
     * Add a reponse to a question
     * Returned Value : Reponse ID
     * Parameters :
     *      $idUser : User ID
     *      $idQuestion : Question ID
     *      $content : Reponse content
     */
    public function addReponse($idUser, $idQuestion ,$content)
    {
        $data = array(
            'idUser' => $idUser,
            'idQuestion' => $idQuestion,
            'content' => $content
        );

        $this->db->insert($this->tablesReponses, $data);
        // Retrieve reponse id
        $reponseId = $this->db->insert_id();
        if ($this->db->affected_rows() == 0) throw new Exception('No Reponse Insert');

        return $reponseId;
    }

    /***
     * Get all Reponses for a question
     * Returned Value : Array of Reponses Objects
     * Parameters :
     *      $idQuestion : Question ID
     *      $idUser (optional) : User ID
     */
    public function getAllReponsesForAQuestion($idQuestion, $idUser = null)
    {

        if (isset($idUser) && !is_null($idUser))
            $query = $this->db->get_where($this->tableReponses, array('idQuestion' => $idQuestion, 'idUser' => $idUser), null, null);
        else
            $query = $this->db->get_where($this->tableReponses, array('idQuestion' => $idQuestion), null, null);


        return $query;


    }
}