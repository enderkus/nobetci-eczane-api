<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
require "db.php";
require 'flight/Flight.php';




Flight::route('/il(/@id(/@key))', function($id,$key)use($database){


if($key != "") {
  // Key boş ise uygulanacak işlemler. Henüz yazmadım :(
}

  
$buyuk_harf = mb_strtoupper($id);

$id = str_replace(array('ç', 'Ç', 'ğ', 'Ğ', 'ı', 'İ', 'ö', 'Ö', 'ş', 'Ş', 'ü', 'Ü'),array('c', 'C', 'g', 'G', 'i', 'I', 'o', 'O', 's', 'S', 'u', 'U'),$buyuk_harf);

$kayit_sorgula = $database->count("nobetciler",[
  "il" => $id,
]);

if($kayit_sorgula > 0) {
  $sonuclar = $database->select("nobetciler",[
    "eczane_adi",
    "il",
    "ilce",
    "adres",
    "telefon",
    "lon",
    "lat"
    ],[
    "il" => $id,
]);




echo $cikti_uret =  json_encode(array(
  "success" => true,
  "status" => "200",
  "data" => $sonuclar),JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES );



} else {
       echo $gecersiz_parametre = json_encode(array(
        "success" => false,
        "status" => "400",
        "data" => "İstek Hatası"),JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES );
   }


});



Flight::route('/all', function()use($database){

    
        $sonuclar2 = $database->select("nobetciler",[
          "eczane_adi",
          "il",
          "ilce",
          "adres",
          "telefon",
          "lon",
          "lat"
        ]);
        
       echo json_encode(array(
             "success" => true,
             "status" => "ok",
             "data" => $sonuclar2),JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
 
   
 
 
 });

Flight::start();

?>