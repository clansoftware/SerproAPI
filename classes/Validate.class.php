<?php
/**
	* @author SAntos L. Victor
	* @see Responsavel por materializar metodos de validacao da SERPRO
	* @doc [https://apidocs.datavalidp.estaleiro.serpro.gov.br/]
*/
class Validate {
	private static $wsdl = "https://apigateway.serpro.gov.br/datavalid/v1/validate/pf-face";

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

	/**
	 * @see Modelo rodando ,porem errado
	 * @param
	*/
	public static function face($access_token, $params) {

		$url = "https://apigateway.serpro.gov.br/datavalid/v1/validate/pf-face";

		// autenticação
		$auth = array("Authorization: Bearer {$access_token}","cache-control: no-cache","Content-Type: application/json"); 
		$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 60,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS =>$params,
			CURLOPT_HTTPHEADER => $auth,
		));

		// object return
		$response_serpro = curl_exec($curl);
		$err_serpro = curl_error($curl);
		curl_close($curl);

		// erro retorno serpro
		if ($err_serpro)
			return $err_serpro;

		return $response_serpro;
	}
}