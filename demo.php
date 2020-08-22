<?php
libxml_disable_entity_loader(false);
// code injection from the client side
$file='<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE login SYSTEM "http://localhost/e.ent">
<login><user>&name;</user><pass>password</pass></login>';
//
$dom=new DOMDocument();
$dom->loadXML($file,LIBXML_NOENT | LIBXML_DTDLOAD);
$element=$dom->getElementsByTagName('user')[0];
echo $element->nodeValue;
?>
