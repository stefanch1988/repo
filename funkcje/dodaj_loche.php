<?php
include("connect.php");

function karta_lochy()
{
     $zap = "SELECT data, rasa FROM inseminacja WHERE id_l = '".$_GET['id_l']."'";
     if(($wynik = mysql_query($zap)) AND ($liczba = mysql_num_rows($wynik)))
     {
         for($i = 0; $i < $liczba; $i++)
          {
               $karta_loch = mysql_fetch_row($wynik);
          }

          return $karta_loch;
     }
     else
     {
          echo '</br>Blad';
     }
}

function stan_loch()
{
     $zap = "SELECT id_l, nazwa, data_dodania, id_zapr, id_opro FROM locha WHERE data_zakonczenia IS NULL";
     if(($wynik = mysql_query($zap)) AND ($liczba = mysql_num_rows($wynik)))
     {
          for($i = 0; $i < $liczba; $i++)
          {
               $wyn[$i] = mysql_fetch_assoc($wynik);
          }

          return $wyn;
;    }
     else
     {
          return FALSE;
     }
}

function pokaz_ins($id)
{
     $zap = "SELECT data FROM inseminacja WHERE id_i = '".$id."'";
     if(($wynik = mysql_query($zap)) AND (mysql_num_rows($wynik) == 1))
     {
          $wyn = mysql_fetch_assoc($wynik);
          return $wyn;
     }
     else
     {
          return FALSE;
     }
}

function pokaz_opr($id)
{
     $zap = "SELECT data FROM oproszenie WHERE id_o = '".$id."'";
     if(($wynik = mysql_query($zap)) AND (mysql_num_rows($wynik) == 1))
     {
          $wyn = mysql_fetch_assoc($wynik);
          return $wyn;
     }
     else
     {
          return FALSE;
     }
}

function dodaj_loche($nazwa, $data)
{
     $zap = "INSERT INTO locha (`id_l`, `nazwa`, `data_dodania`, `data_zakonczenia`, `id_zapr`, `id_opro`) VALUES (NULL, '".$nazwa."', '".$data."', NULL, NULL, NULL)";
     if($wynik = mysql_query($zap))
     {
          return TRUE;
;     }
     else
     {
          return FALSE;
     }
}

function zakoncz_loche($id)
{
     $zap = "UPDATE locha SET data_zakonczenia = '".date("Y-m-d")."' WHERE id_l ='".$id."'";
     if($wynik = mysql_query($zap))
     {
          return TRUE;
     }
     else
     {
          return FALSE;
     }
}

function dodaj_zaproszenie($id, $l_ins, $data, $rasa)
{
     $zap = "INSERT INTO inseminacja (`id_i`, `l_ins`, `id_l`, `data`, `rasa`) VALUES (NULL, '".$l_ins."', '".$id."', '".$data."', '".$rasa."')";
     if($wynik = mysql_query($zap))
     {
          $ident = mysql_insert_id();
          $zap2 = "UPDATE locha SET id_zapr = '".$ident."', id_opro = NULL WHERE id_l ='".$id."'";
          if($wynik2 = mysql_query($zap2))
          {
               return TRUE;
          }
          else
          {
               return FALSE;
          }
     }
     else
     {
          return FALSE;
     }
}

function dodaj_oprodzenie($id, $data, $zywe, $martwe, $opis)
{
     $razem = $zywe + $martwe;
     $zap = "INSERT INTO oproszenie (`id_o`, `id_l`, `data`, `zywe`, `martwe`, `razem`, `opis`) VALUES (NULL, '".$id."', '".$data."', '".$zywe."', '".$martwe."', '".$razem."', '".$opis."')";
     if($wynik = mysql_query($zap))
     {
          $ident = mysql_insert_id();
          $zap2 = "UPDATE locha SET id_opro = '".$ident."', id_zapr = NULL WHERE id_l ='".$id."'";
          if($wynik2 = mysql_query($zap2))
          {
               return TRUE;
          }
          else
          {
              return FALSE;
          }
     }
     else
     {
          return FALSE;
     }
}

?>
