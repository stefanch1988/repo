<?php

if($_GET AND is_integer((int)$_GET['id']) AND (int)$_GET['id'] != 0)
{
     // Do³¹czamy niezbêdne pliki (koniecznie w takiej kolejnoœci)
     require '../config.php';
     require_once '../logger.class.php';
     require_once '../db.class.php';

     db::connect(); // £¹czymy z baz¹ danych
     $result = db::query("SELECT * FROM {prefix}siew WHERE id_p='".$_GET['id']."' ORDER BY data_s DESC");

     echo '<center><h3>Lista zasiewów</br>'.$_GET['nazwa'].'</h3>';
     echo '<table border="2">';
     echo '<tr style="background-color: gray;"><td><strong>Lp.</strong></td>'.
          '<td><strong>Nazwa zasiewu</strong></td>'.
          '<td><strong>Powierzchnia</strong></td>'.
          '<td><strong>Rok zasiwu</strong></td></tr>';
     $i= 1;
     $k=0; //flaga koloru
     $r=0; //flaga roku
     while ($zasiew = db::fetch($result))
     {
          if($r == $zasiew['data_s'])
          {
                if($k == 0)
                {
                      echo '<tr><td>'.
                      $i.'</td><td>'.$zasiew['nazwa_s'].
                      '</td><td>'.number_format($zasiew['powierzchnia_s'], 2, ',', ' ').
                      " ha".'</td><td>'.$zasiew['data_s'].'</td></tr>';
                }
                if($k == 1)
                {
                      echo '<tr style="background-color: silver;"><td>'.
                      $i.'</td><td>'.$zasiew['nazwa_s'].
                      '</td><td>'.number_format($zasiew['powierzchnia_s'], 2, ',', ' ').
                      " ha".'</td><td>'.$zasiew['data_s'].'</td></tr>';
                }
          }
          else
          {
                $k==0 ? $k=1 : $k=0;
                if($k == 0)
                {
                      echo '<tr><td>'.
                      $i.'</td><td>'.$zasiew['nazwa_s'].
                      '</td><td>'.number_format($zasiew['powierzchnia_s'], 2, ',', ' ').
                      " ha".'</td><td>'.$zasiew['data_s'].'</td></tr>';
                }
                if($k == 1)
                {
                      echo '<tr style="background-color: silver;"><td>'.
                      $i.'</td><td>'.$zasiew['nazwa_s'].
                      '</td><td>'.number_format($zasiew['powierzchnia_s'], 2, ',', ' ').
                      " ha".'</td><td>'.$zasiew['data_s'].'</td></tr>';
                }
          }
          $r=$zasiew['data_s'];
          $i++;
          }

     echo '</table>';

     //echo '<h3>Podsumowanie</h3>';
     //echo '<p>W sumie pobrano '.db::returnedRows($result).' rekordów przy u¿yciu '.db::$queriesCounter.' zapytañ.</p></center>';

     db::close();
}
else
{
     echo '<a href="index.php">'."&lt;&lt;&lt; Powrót".'</a>';
}

?>