<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class InstallDB extends CI_Controller {

	/**
	 * Install database script
	 */
	public function index ()
	{
		$confirmed = $this->input->post('confirmed');

		if ($confirmed) {
			$file = $this->load->file('application/database/installdb.sql', true);
			$queries = explode(';', $file);

			foreach ($queries as $q) {
				if (!empty(trim($q))) {
					$this->db->query($q);
				}
			}

			echo 'Installation finished!';

		} else {
			echo '<form method="post"><button type="submit">Reinstall database</button><input type="hidden" name="confirmed" value="1"/></form>';
		}
	}
}
