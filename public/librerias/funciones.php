<?php

function getGUID(){
  if (function_exists('com_create_guid')){
    return com_create_guid();
  }else{
    mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
    $charid = strtoupper(md5(uniqid(rand(), true)));
    $hyphen = chr(45);// "-"
    $uuid = chr(123)// "{"
      .substr($charid, 0, 8).$hyphen
      .substr($charid, 8, 4).$hyphen
      .substr($charid,12, 4).$hyphen
      .substr($charid,16, 4).$hyphen
      .substr($charid,20,12).$hyphen
      .chr(125);// "}"
    $uuid = substr($uuid, 1, 36);
    return $uuid;
  }
}

function create_json_post($post){
    $request="{";

    for ($i=0; $i < count($post) ; $i++) {
      $llave = key($post);
      $valor = $post[$llave];
      if($i==count($post)-1){
          $request = $request. "\"$llave\":\"$valor\"";
      }else{
          $request = $request. "\"$llave\":\"$valor\",";
      }
      next($post);
    }

    $request = $request."}";
    return $request;
}

function contador(){
    $archivo = "contador.txt";
    $contador = 0;
    $fp = fopen($archivo,"r");
    $contador = fgets($fp, 26);
    fclose($fp);
    ++$contador;
    $fp = fopen($archivo,"w+");
    fwrite($fp, $contador, 26);
    fclose($fp);
    return $contador;
}

function guarda_sessionToken($sessionToken){
    $archivo = "sessionToken.txt";
    $fp = fopen($archivo,"w+");
    fwrite($fp, $sessionToken, 96);
    fclose($fp);
}

function recupera_sessionToken(){
    $archivo = "sessionToken.txt";
    $fp = fopen($archivo,"r");
    $valor = fgets($fp, 96);
    fclose($fp);
    return $valor;
}

function guarda_sessionKey($sessionKey){
    $archivo = "sessionKey.txt";
    $fp = fopen($archivo,"w+");
    fwrite($fp, $sessionKey, 96);
    fclose($fp);
}

function recupera_sessionKey(){
    $archivo = "sessionKey.txt";
    $fp = fopen($archivo,"r");
    $valor = fgets($fp, 96);
    fclose($fp);
    return $valor;
}



function authorization($environment,$merchantId,$transactionToken,$accessKey,$secretKey,$sessionToken){
    switch ($environment) {
        case 'prd':
            $url = "https://apice.vnforapps.com/api.authorization/api/v1/authorization/web/{$merchantId}";
            break;
        case 'dev':
            $url = "https://devapice.vnforapps.com/api.authorization/api/v1/authorization/web/{$merchantId}";
            break;
    }
    $header = array("Content-Type: application/json","VisaNet-Session-Key: $sessionToken");
    $request_body="{
        \"transactionToken\":\"$transactionToken\",
        \"sessionToken\":\"$sessionToken\"
    }";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch, CURLOPT_USERPWD, "$accessKey:$secretKey");
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $request_body);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $response = curl_exec($ch);
    $json = json_decode($response);
	if (version_compare(PHP_VERSION, '5.4.0', '<')) {
		 $json = json_encode($json);
	}else{
	 $json = json_encode($json, JSON_PRETTY_PRINT);
	}
    //$dato = $json->sessionKey;
    return $json;
}

function create_token($amount,$environment,$merchantId,$accessKey,$secretKey,$uuid){
    switch ($environment) {
        case 'prd':
            $url = "https://apice.vnforapps.com/api.ecommerce/api/v1/ecommerce/token/{$merchantId}";
            break;
        case 'dev':
            $url = "https://devapice.vnforapps.com/api.ecommerce/api/v1/ecommerce/token/{$merchantId}";
            break;
    }
    $header = array("Content-Type: application/json","VisaNet-Session-Key: $uuid");
    $request_body="{
        \"amount\":{$amount}
    }";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch, CURLOPT_USERPWD, "$accessKey:$secretKey");
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $request_body);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $response = curl_exec($ch);
    $json = json_decode($response);
    $dato = $json->sessionKey;
    return $dato;
}


function post_form($array_post,$url){
    $html="<html>
    <head>
    </head>
    <body onload=\"f1.submit();\">
    <form name=\"f1\" method=\"post\" action=\"{$url}\">";
    for ($i=0; $i < count($array_post) ; $i++) {
        $llave = key($array_post);
        $valor = $array_post[$llave];
        $html = $html."<input type=\"hidden\" name=\"$llave\" value=\"$valor\" />";
        next($array_post);
    }
    $html = $html."</form>
    </body>
    </html>";
    return $html;
}


function jsonpp($json, $istr='  ')
{
    $result = '';
    for($p=$q=$i=0; isset($json[$p]); $p++)
    {
        $json[$p] == '"' && ($p>0?$json[$p-1]:'') != '\\' && $q=!$q;
        if(strchr('}]', $json[$p]) && !$q && $i--)
        {
            strchr('{[', $json[$p-1]) || $result .= "\n".str_repeat($istr, $i);
        }
        $result .= $json[$p];
        if(strchr(',{[', $json[$p]) && !$q)
        {
            $i += strchr('{[', $json[$p])===FALSE?0:1;
            strchr('}]', $json[$p+1]) || $result .= "\n".str_repeat($istr, $i);
        }
    }
    return $result;
}
?>
