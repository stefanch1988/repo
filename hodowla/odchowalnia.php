<?php

if((int)$_GET['tucz'] == TRUE)
{
     // Do³¹czamy niezbêdne pliki (koniecznie w takiej kolejnoœci)
     require '../config.php';
     require_once '../logger.class.php';
     require_once '../db.class.php';

     db::connect(); // £¹czymy z baz¹ danych

     $ilosc = (int)$_GET['tucz'];
     // dodanie
     if($res1 = db::query("UPDATE `pom_stan` SET `data_aktu` = '".date("Y-m-d H:i:s")."', `stan` = stan - $ilosc WHERE `nazwa_st` ='porodowka'"))
     {
          if($res2 = db::query("UPDATE `pom_stan` SET `data_aktu` = '".date("Y-m-d H:i:s")."', `stan` = stan + $ilosc WHERE `nazwa_st` ='odchowalnia'"))
          {
               echo "jeden ";
          }
     }
     if($i == 2)
     {
          echo "dwa ";
     }

     //$result = db::query("");
     // UPDATE `08555327_pola`.`pom_stan` SET `id_ost_dzi` = NULL WHERE `pom_stan`.`id_st` =2

}

else
{
     echo "nie dzia³a";
}


?>