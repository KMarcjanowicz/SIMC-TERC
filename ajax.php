<?php
    $xml = simplexml_load_file('TERC.xml');

    $xml2 = simplexml_load_file('SIMC.xml');
    if (isset($_GET["x"])) {
        
    
switch ($_GET["x"]) {
    case "start":
        $result = $xml->xpath('//row[NAZWA_DOD="województwo"]');
        echo json_encode($result);
        break;
    case "woj":
    
    ////row[WOJ=02 and NAZWA_DOD="powiat"]
        $result = $xml->xpath('//row[WOJ='.$_GET["woj"] .' and NAZWA_DOD="powiat"]');
        echo json_encode($result);
        break;
    case "pow":
        
        //////row[WOJ=02 and POW=02 and not(NAZWA_DOD="powiat") and not(NAZWA_DOD="województwo")]
        $result = $xml->xpath('//row[WOJ='.$_GET["woj"].' and POW='.$_GET["pow"].' and not(NAZWA_DOD="powiat") and not(NAZWA_DOD="województwo") and not(NAZWA_DOD="miasto") and not(NAZWA_DOD="obszar wiejski")]');
        echo json_encode($result);
        break;
    case "gmi":
          
          //////row[WOJ=02 and POW=02 and not(NAZWA_DOD="powiat") and not(NAZWA_DOD="województwo")]
        $result = $xml2->xpath('//row[WOJ='.$_GET["woj"].' and POW='.$_GET["pow"].' and GMI='.$_GET["gmi"].' and not(NAZWA_DOD="powiat") and not(NAZWA_DOD="województwo")and not(NAZWA_DOD="obszar wiejski")]');
        echo json_encode($result);
        break;
    case "mia":
        $ch = curl_init();
        // CURLOPT_URL, CURLOPT_RETURNTRANSFER, CURLOPT_POST, CURLOPT_POSTFIELDS
        curl_setopt($ch, CURLOPT_URL, "http://pocztowekody.pl/ajax/city");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "city=Krzeszowice");
     
        $result = curl_exec($ch);
        print_r($result);
        curl_close($ch);
    case "mia2":
        $ch = curl_init();
        curl_setopt ($ch, CURLOPT_URL, "http://pocztowekody.pl/index/index/id_city/114933/city/Krzeszowice;Krzeszowice;krakowski;Ma%C5%82opolskie/page/1");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $result = curl_exec ($ch);
        curl_close ($ch);
        print_r($result);
        
        break;
}
    }
?> 