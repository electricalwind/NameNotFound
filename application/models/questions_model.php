<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/*
 * Question model to manage questions
 */

class Questions_model extends CI_Model
{
    protected $tableQuestion = 'question';
    protected $tableTheme = 'theme';
    protected $tableQuestionAuthor = 'question_author';
    protected $tableQuestionTheme = 'question_theme';

    /*
     * Mode constructor
     */
    public function __construct()
    {
        parent::__construct();

    }

    /***
     * Function addQuestion :
     * Add a question into the database
     * Return Value : Question ID or 0 if error
     * Parameters
     *      $idUser : Question User ID
     *      $content : Question content
     *      $themes : Project theme (ARRAY)
     *          [i] : theme ID
     */

    public function addQuestion($idUser, $content, $themes)
    {
        try {

            $this->db->query('BEGIN TRANSACTION');

            $dataQuestion = array(
              'idUser' => $idUser,
              'content' => $content
            );

            // Question insert
            $this->db->insert($this->tableQuestion, $dataQuestion);

            // Retrieve question id
            $questionId = $this->db->insert_id();
            if ($this->db->affected_rows() == 0) throw new Exception('No Project Insert');

            // For the themes
            $this->addThemes($questionId,  $themes);

            // If no errors, we can commit all transactions
            $this->db->query('COMMIT');

            return $questionId;

        } catch (Exception $e) {
            // If error, rollback all transactions
            $this->db->query('ROLLBACK');
            return 0;
        }

    }   /* END addQuestion() */

    //TODO: Edit question

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
    }
}