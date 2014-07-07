<?php header('Content-type: text/html; charset=UTF-8')?>
<?
require ('curl.php');
require 'vkapi.class.php';
 
$api_id = '3127633'; // Insert here id of your application
$vk_id = '18884330'; // Insert here you vk id
 
$VK = new vkapi($api_id, $vk_id);
 $photo['group_id']='18338864';
 $photo['album_id']='185905884';
 $photo['owner_id']='-17958709';
 


$resp = $VK->api('photos.get', 
   array('owner_id'=>"{$photo['owner_id']}",
         'album_id'=>"{$photo['album_id']}"				 
				)
				);
print_r($resp);
echo "<br>";
foreach($resp as $resp1){
	echo "Фото : <img src=\"$resp1->src_small\" /><br>";
}

$resp->asXML('test.xml');
?>
