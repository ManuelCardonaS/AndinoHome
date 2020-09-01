<?php defined('BASEPATH') OR exit('No direct script access allowed');

function sesion() {

	$CI = & get_instance();

	$user = $CI->session->userdata('USU_Usuario');
	if (!isset($user)) {
		return false;
	} else {
		return true;
	}
}

function validar_Sesion() {

	if (!sesion()) {
		redirect(base_url() . 'index.php/administracion/Login', 'refresh');
	}
	
}
