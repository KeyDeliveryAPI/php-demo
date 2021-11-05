<?php

	$url = 'https://www.kd100.com/api/v1/carriers/detect';
	$API_Key = ''; # You can find your ApiKey on https://app.kd100.com/api-managment
	$Secret = ''; # You can find your Secret on https://app.kd100.com/api-managment 

	$param = array(
		'tracking_number' => '285075106552'
	);
	$data = json_encode($param);

	$signature = strtoupper(md5($data . $API_Key . $Secret));

	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS => $data,
		CURLOPT_HTTPHEADER => array(
			'API-Key: ' . $API_Key,
			'signature: ' . $signature,
			'Content-Type: application/json'
		),
	));
	$response = curl_exec($curl);
	curl_close($curl);
	echo $response;
