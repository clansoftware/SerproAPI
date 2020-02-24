<?php
/**
	* @author SAntos L. Victor
	* @see 
*/
class Validate {
	private static $wsdl = "https://apigateway.serpro.gov.br/datavalid-trial/v1/validate/pf";

	public static function pf_face($bearer, $params) {
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, self::$wsdl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $params);

		$headers = array();
		$headers[] = 'Accept: application/json';
		$headers[] = 'Authorization: Bearer '.$bearer;
		$headers[] = 'Content-Type: application/json';
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$result = curl_exec($ch);
		if (curl_errno($ch)) {
		    echo 'Error:' . curl_error($ch);
		}
		curl_close($ch);
		return $result;
	}
}