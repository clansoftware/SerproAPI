<?php
/**
 * @author Santos L. Victor
 * @see Responsavel por realizar uma solicitacao de metodo ao servidor da Serpro
*/
require_once("classes/Validate.class.php");

class Serpro extends Validate {

	private static $token_url = "https://apigateway.serpro.gov.br/token";
	private static $url;
	private static $key;
	private static $secret;

	/**
		* @see 
		* @param [String] $key, exemplo: Consumer Key: djaR21PGoYp1iyK2n2ACOH9REdUb   
		* @param [String] $secret, exemplo: Consumer Secret: ObRsAJWOL4fv2Tp27D1vd8fB3Ote
		* @param [String] $secret, exemplo: Consumer Secret: ObRsAJWOL4fv2Tp27D1vd8fB3Ote
		* @param [String] $secret, exemplo: Consumer Secret: ObRsAJWOL4fv2Tp27D1vd8fB3Ote
	*/
	function __construct($key, $secret, $url, $debug=False) {
		try {
			if ($debug) {
				ini_set('display_errors', 1);
				ini_set('display_startup_errors', 1);
				error_reporting(E_ALL);
			}
			
			self::$url = $url;
			self::$key = $key;
			self::$secret = $secret;
		} catch (Exception $e) {
			die('[Erro: '.$e->getCode().'] '.$e->getMessage());
		}
	}

	/**
	 * @see Responsavel por solicitar o Token de Acesso (Bearer)
	 * @param [String] $isSandBox , determinad se eta utilizando ambiente de DEV
	 * @return [Array] 'acess_token' bearer necessario para utilizar metodos das classes da serpro
	*/
	public static function getBearer($isSandBox=False) {
		try {
			if ($isSandBox) {
				return array(
				    "scope" => "am_application_scope default", 
				    "token_type" => "Bearer", 
				    "expires_in" => "never", 
				    "access_token" => "4e1a1858bdd584fdc077fb7d80f39283"
				);
			}
			
			$response = array();
			
			$ch = curl_init();

			$headers = array();
			$authorization = base64_encode(self::$key.':'.self::$secret);
			$headers[] = 'Authorization: Basic '.$authorization;
			$headers[] = 'Content-Type: application/x-www-form-urlencoded';

			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_URL, self::$token_url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");

			$result = curl_exec($ch);
			if (curl_errno($ch)) {
			    echo 'Error:' . curl_error($ch);
			}
			curl_close($ch);

		} catch (Exception $e) {
			$result['error'] = $e->getMessage();
		}
		return $result;
	}
}