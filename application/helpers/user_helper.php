<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



function setUserConnected ($userid)
{
	$CI =& get_instance();
	$CI->session->set_userdata('userid', $userid);
}

function setUserDisconnected ()
{
	$CI =& get_instance();
	$CI->session->unset_userdata('userid');
}

function getUserId ()
{
	$CI =& get_instance();
	return intval($CI->session->userdata('userid'));
}
