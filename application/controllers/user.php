<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class User extends CI_Controller {

	public function connect () {
		$username = $this->input->post('username');

		if ($username) {
			$this->load->model('users_model');
			$userid = $this->users_model->isUsernameExists($username);
			if ($userid) {
				setUserConnected($userid);
			}
		}

		redirect();
	}

	public function disconnect () {
		setUserDisconnected();
		redirect();
	}
}
