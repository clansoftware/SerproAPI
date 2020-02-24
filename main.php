<?php
/**
	* @author Santos L. Victor
	* @see
*/
if (isset($_POST) && !empty($_POST)) {
	require_once("Serpro.php");
	$serpro = new Serpro($_POST['key'], $_POST['secrect'], True);
	$bearer = $serpro::getBearer($_POST['producao']);	
	$response = array(
			'type' => 'success',
			'msg' => 'Solicitação realizada com sucesso !',
			'data' => $bearer
			);
	$bearer = $bearer['access_token'];

	if(isset($_POST['bearer'])) {
		$params = '{"key": {"cpf": "33840981026"},"answer": {"data_nascimento": "1901-01-01", "situacao_cpf": "regular"}}';
		$faced = $serpro::pf_face($bearer['access_token'], $params);
		$response = array(
					'type' => 'success',
					'msg' => 'Solicitação realizada com sucesso !',
					'data' => $faced
					);
	}
} else {
	$response = array(
			'type' => 'warning',
			'msg' => 'Invalid Request !',
			'data' => null
			);
}

include 'index.php';