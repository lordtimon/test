<?php header('Content-type: text/html; charset=UTF-8')?>
<?
require ('curl.php');
require 'vkapi.class.php';
 
$api_id = '3127633'; // Insert here id of your application
$vk_id = '18884330'; // Insert here you vk id
 
$VK = new vkapi($api_id, $vk_id);
 $photo['group_id']='18338864';
 $photo['album_id']='111884802';
 
$offset=0;

$resp = $VK->api('photos.getUploadServer', 
   array(
         'group_id'=>"{$photo['group_id']}",
		 'album_id'=>"{$photo['album_id']}"				 
				)
				);
print_r($resp);

$upload_url=$resp->upload_url;
echo $upload_url;
$data['upload_url']=$upload_url;
$curl=post_images($data);
print_r($curl['info']);
echo "<br>{$curl['html']}";
$json_photo=json_decode($curl['html']);
echo "<pre>";
print_r($json_photo);

$photo['server']=$json_photo->server;
$photo['photos_list']=$json_photo->photos_list;
$photo['hash']=$json_photo->hash;
$photo['caption']='Привет Катюша';

print_r($photo);

$resp_photosave=$VK->api('photos.save',
$photo);
print_r($resp_photosave);
$resp->asXML('test.xml');
?>
