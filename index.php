<pre>
<?php
/*
$xml = simplexml_load_file('TERC.xml');
$result = $xml->xpath('//WOJ');
print_r($result);
*/
// http://pocztowekody.pl/ajax/city
// POST, city   Krzeszowce
 
/*
$ch = curl_init();
// CURLOPT_URL, CURLOPT_RETURNTRANSFER, CURLOPT_POST, CURLOPT_POSTFIELDS
curl_setopt($ch, CURLOPT_URL, "http://pocztowekody.pl/ajax/city");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, "city=Krzeszowice");
 
$result = curl_exec($ch);
print_r($result);
curl_close($ch);
*/
 
// id -> 114933 (Krzeszowice)
// http://pocztowekody.pl/?city=Krzeszowice%3BKrzeszowice%3Bkrakowski%3BMa%C5%82opolskie&street=&nr=&id_city=114933
/*
$ch = curl_init();
curl_setopt ($ch, CURLOPT_URL, "http://pocztowekody.pl/index/index/id_city/114933/city/Krzeszowice;Krzeszowice;krakowski;Ma%C5%82opolskie/page/1");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$result = curl_exec ($ch);
curl_close ($ch);
print_r($result);
*/
$doc = new DOMDocument();
@$doc->loadHTMLFile("http://pocztowekody.pl/index/index/id_city/114933/city/Krzeszowice;Krzeszowice;krakowski;Ma%C5%82opolskie/page/1");
$xml = simplexml_import_dom($doc);
$result = $xml->xpath('//span[@class="lblPaging"]');
print_r($result);
?>