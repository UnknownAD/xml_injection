<?php
libxml_disable_entity_loader(false);
$file=fopen("php://input","r");
$data=fread($file,2048);
fclose($file);
$dom=new DOMDocument;
$dom->loadXML($data,LIBXML_NOENT|LIBXML_DTDLOAD);
$name=$dom->getElementsByTagName("user")->item(0);
$pass=$dom->getElementsByTagName("pass")->item(0);
echo $name->nodeValue;
echo $pass->nodeValue;
echo 'node length'.$dom->getElementsByTagName("login")[0]->childNodes->length;
?>
