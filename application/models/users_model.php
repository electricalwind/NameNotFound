<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/*
 * User model to manage users
 */

class Users_model extends CI_Model
{
    protected $tableUsers = 'user';
    protected $tableExpertUsers = 'expertise';

    /*
     * Mode constructor
     */
    public function __construct()
    {
        parent::__construct();

    }

    /* Function addUser :
     * Add an user into the database
     * Parameters
     *    $name : name of the user
     *    $username : username of the user
     *    $password : password of the account
     *    $email    : email of the user
     * Returns the ID of the new user
     */

    public function addUser($name, $username ,$password, $email)
    {
        $data = array(
            'name' => $name,
            'username' => $username,
            'password' => $password,
            'email' => $email
        );

        $this->db->insert($this->tableUsers, $data);
        // Retrieve user id
        $userId = $this->db->insert_id();
        if ($this->db->affected_rows() == 0) throw new Exception('No Question Insert');

        return $userId;
    }

    /* Function isUsernameExists :
    * Check if an user exists in the database giving his username
    * Parameters
    *    $username : name of the user
    * Returns the user ID or 0 if the user not exists
    */
    public function isUsernameExists($username) {

        // Get the number of rows matching this with this username and this password
        //
        $query = $this->db
            ->where('username', $username)
            ->get($this->tableUsers);

        if($query->num_rows() > 0) return $query->row()->id;
        else return 0;
    }

    /* Function isValidAuth :
     * Check if the username and the password are correct
     * Parameters
     *    $username : name of the user
     *    $password : password of the account
     * Returns the user ID or 0 if not a valid user
     */
    public function isValidAuth($username, $password) {
        // Create the array for the where clause
        //
        $data = array(
            'username' => $username,
            'password' => $password
        );

        // Get the number of rows matching this with this username and this password
        //
        $query = $this->db
            ->where($data)
            ->get($this->tableUsers);

        if($query->num_rows() > 0) return $query->row()->id;
        else return 0;
    }

    /* Function getUserInfo :
     * Get all user's informations giving his ID
     * Parameters
     *    $id       : ID of the user
     * Returns a new User object
     */
    public function getUserInfo($id) {
        // Return informations about a specific user
        //
        $query = $this->db
            ->where('id', $id)
            ->get($this->tableUsers);

        if($query->num_rows() > 0) return $query->row();
        else return NULL;
    }

    /*
 * Function getUsers :
 * Get the list of registered users
 * Parameters
 *     $search : search string on user name
 * Returns the result object of the request if not empty, an empty array otherwise
 */
    public function getUsers($search = null) {
        // Create SQL request using WHERE 1 ti generically use AND keyword bellow
        //
        $sql = 'SELECT * FROM ' . $this->tableUsers . ' WHERE 1';
        $params = array();

        // Create search constraint
        //
        if(!is_null($search)) {
            $sql .= ' AND username LIKE ?';

            // add ? parameter
            //
            array_push($params, '%'.$search.'%');
        }

        // Execute query and return result object
        //
        $query = $this->db->query($sql, $params);
        return $query->result();
    }

    /***
     * Get the users expertise on a theme
     * Returned Value : An array of Expertise Objects
     * Parameters :
     *      $idTheme : Theme ID
     */
    public function getUsersScoreOnTheme($idTheme)
    {

        $queryIdUsersExpert = $this->db->get_where($this->tableExpertUsers, array('idTheme'=>$idTheme), null, null);
        return $queryIdUsersExpert;

    }

    /***
     * Get an user expertise on a theme
     * Returned Value : An array of the user expertise object
     * Parameters :
     *      $idUser : User ID
     *      $idTheme : Theme ID
     */
    public function getUserScoreOnTheme($idUser, $idTheme)
    {
        $queryIdUserExpert = $this->db->get_where($this->tableExpertUsers, array('idTheme'=>$idTheme, 'idUser'=>$idUser), null, null);
        return $queryIdUserExpert;
    }
    /***
     * Add a score for an user on a theme
     * Parameters :
     *      $idUser : User ID
     *      $idTheme : Theme ID
     *      $value : Score to add
     */
    public function addExpertiseScore($idUser,$idTheme,$value)
    {
        $newScore = ($this->getUserScoreOnTheme($idUser, $idTheme)->row()->score) + $value;

        $data = array(
            'score' => $newScore
        );

        $this->db->where('idUser',$idUser);
        $this->db->where('idTheme', $idTheme);

        $this->db->update($this->tableExpertUsers, $data);

    }
}