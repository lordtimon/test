<?php

function curl($url){

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; ru; rv:1.9.2.23) Gecko/20110920 Firefox/3.6.23');
curl_setopt($ch, CURLOPT_TIMEOUT,30); 
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);

$html_curl = curl_exec($ch); 

$info=curl_getinfo($ch);
$return['info']=$info;
$return['html']=$html_curl;
curl_close($ch);

return $return;
}

function post_images($data){
$postfields=array('file1'=>'@C:\xampp\htdocs\lordtimon_test2\api_vk\test.png');
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $data['upload_url']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; ru; rv:1.9.2.23) Gecko/20110920 Firefox/3.6.23');
curl_setopt($ch, CURLOPT_TIMEOUT,30); 
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
//curl_setopt($ch, CURLOPT_COOKIESESSION, TRUE);
//curl_setopt($ch, CURLOPT_REFERER,'http://freelance.ru/login/');
//curl_setopt($ch, CURLOPT_COOKIEJAR, dirname(__FILE__).'/freelance.txt');
//curl_setopt($ch, CURLOPT_COOKIEFILE, dirname(__FILE__).'/freelance.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);

$html_curl = curl_exec($ch); 

$info=curl_getinfo($ch);
$return['info']=$info;
$return['html']=$html_curl;
curl_close($ch);

return $return;
}



?>