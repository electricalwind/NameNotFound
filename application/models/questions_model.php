<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/*
 * Question model to manage questions
 */

class Questions_model extends CI_Model
{
    protected $tableQuestion = 'question';
    protected $tableTheme = 'theme';
    protected $tableQuestionTheme = 'question_theme';

    /*
     * Mode constructor
     */
    public function __construct()
    {
        parent::__construct();

    }

    /* Questions */
    /***
     * Function addQuestion :
     * Add a question into the database
     * Return Value : Question ID or 0 if error
     * Parameters
     *      $idUser : Question User ID
     *      $content : Question content
     *      $themes : Question theme (ARRAY)
     *          [i] : theme ID
     */

    public function addQuestion($idUser, $content, $themes)
    {
        try {

            $this->db->query('START TRANSACTION');

            $dataQuestion = array(
              'idUser' => $idUser,
              'content' => $content,
              'status' => "UNSOLVED"
            );

            // Question insert
            $this->db->insert($this->tableQuestion, $dataQuestion);

            // Retrieve question id
            $questionId = $this->db->insert_id();
            if ($this->db->affected_rows() == 0) throw new Exception('No Question Insert');

            // For the themes
            $this->addQuestionThemes($questionId,  $themes);

            // If no errors, we can commit all transactions
            $this->db->query('COMMIT');

            return $questionId;

        } catch (Exception $e) {
            // If error, rollback all transactions
            $this->db->query('ROLLBACK');
            return 0;
        }

    }   /* END addQuestion() */


    /**
     * Get a list of Questions
     * Return Value : Array of Questions Object
     */
    public function listQuestion()
    {
        $query = $this->db->get($this->tableQuestion);
        return $query;
    }

    /***
     * Get a Question
     * Return Value : An object corresponding to the Question
     * Parameters :
     *      $id : Question ID
     */
    public function getQuestion($id)
    {
        $queryIdQuestion = $this->db->get_where($this->tableQuestion, array('id' => $id), NULL, NULL);
        return $queryIdQuestion;

    }


    /***
     * Remove a question
     * Return Value : Question ID or 0 if error
     * Parameters :
     *      $id : Question ID
     */
    public function removeQuestion($id)
    {
        $this->db->delete($this->tableQuestion, array('id' => $id));
        if ($this->db->affected_rows() == 0) return 0;
        else return $id;
    } /* END removeQuestion() */

    /* Themes */

    /***
     * Add a theme
     * Reutrn Value : Theme ID or 0 if error
     * Parameters :
     *      $name : Theme name
     */
    public function addTheme($name)
    {
        $data = array(
            'name'=> $name
        );

        $this->db->insert($this->tableTheme, $data);
        $themeId = $this->db->insert_id();
        if ($this->db->affected_rows() == 0) throw new Exception('No Theme Insert');

        return $themeId;
    }

    /***
     * Remove a theme
     * Return Value : Theme ID or 0 if error
     * Parameters :
     *      $id : Theme ID
     */
    public function removeTheme($id)
    {
        $this->db->delete($this->tableTheme, array('id' => $id));
        if ($this->db->affected_rows() == 0) return 0;
        else return $id;
    } /* END removeTheme() */

    /***
     * Get all themes
     * Return Value : Array of Themes Objects
     */
    public function getThemes(){
        $query = $this->db->get($this->tableTheme);
        return $query;
    }

    /**
     *   Get the question's themes
     *   Return Value : array of category id/name
     */
    public function getQuestionThemes($idQuestion) {
        // Get themes' id for the questions
        //
        $queryIdTheme = $this->db->get_where($this->tableQuestionTheme, array('idQuestion' => $idQuestion), NULL, NULL);

        // Get themes' name
        //
        $result = array();
        $i = 0;

        foreach($queryIdTheme->result() as $row) {
            $query = $this->db->get_where($this->tableTheme, array('id' => $row->idTheme), NULL, NULL);
            $result[$i]['id'] = $query->row()->id;
            $result[$i]['name'] = $query->row()->name;
            $i++;
        }

        return $result;
    }

    /***
     * Add a list of themes for the question
     * Parameters :
     *      $idQuestion : Question ID
     *      $themes : array of themes

     */
    private function addQuestionThemes($idQuestion, $themes)
    {
        for ($i = 0; $i < count($themes); $i++) {
            // Array of data for the question_theme insert
            $dataThemes = array(
                'idQuestion' => $idQuestion,
                'idTheme' =>  $themes[$i]
            );

            // Category of the question insert
            $this->db->insert($this->tableQuestionTheme, $dataThemes);
            if ($this->db->affected_rows() == 0) throw new Exception('No Question Category Insert');
        }
    } /* END addThemes*/
}