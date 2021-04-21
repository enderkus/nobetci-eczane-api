<?php

include "db.php";

$nobetcigetir = $database2->select("ECZ",[
    "NAME",
    "CITY",
    "DISTRICT",
    "ADDRESS",
    "PHONE",
    "LON",
    "LAT"
],[
    "ISNIGHT" => 1,
    "ORDER" => ["CITY"=>"ASC"]
]);

##print_r($nobetcigetir);

foreach ($nobetcigetir as $ng) {
    
    $aktar = $database->insert("nobetciler",[
        "eczane_adi" => $ng["NAME"],
        "il" => $ng["CITY"],
        "ilce" => $ng["DISTRICT"],
        "adres" => $ng["ADDRESS"],
        "telefon" => $ng["PHONE"],
        "lon" => $ng["LON"],
        "lat" => $ng["LAT"]
    ]);
}

?>