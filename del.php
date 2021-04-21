<?php

include "db.php";

$sil = $database->delete("eczane_bilgileri","*");


if($sil) {
    echo "Silme işlemi başarıyla tamamlandı.";
} else {
    echo "Birşeyler ters gitti...";
}

?>