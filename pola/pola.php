<?php
// Do³¹czamy niezbêdne pliki (koniecznie w takiej kolejnoœci)
require '../config.php';
require_once '../logger.class.php';
require_once '../db.class.php';

db::connect(); // £¹czymy z baz¹ danych
$result = db::query("SELECT * FROM {prefix}pola");

echo '<center><h3>Lista pól</h3>';
echo '<table border="2">';
echo '<tr><td>Lp.</td>'.
     '<td>Nazwa pola</td>'.
     '<td>Powierzchnia</td>'.
     '<td>Nazwa siewu</td>'.
     '<td>Data siewu</td>'.
     '<td>Nazwa dzia³ania</td>'.
     '<td>Data dzia³ania</td></tr>';
$i= 1;

while (@$pole = db::fetch($result))
{
    echo '<tr><td>'.$i.'</td><td><a href="/pola/zasiewy.php?id='.$pole['id_p'].'&nazwa='.$pole['nazwa_p'].'">'.$pole['nazwa_p'].'</a></td>'.
         '<td>'.number_format($pole['powierzchnia'], 2, ',', ' ')." ha".'</td>'.
         '<td><a href="/pola/siew.php?id='.$pole['id_p'].'">'.$pole['nazwa_s'].'</a></td>'.
         '<td>'.$pole['data_s'].'</td>'.
         '<td><a href="/pola/dzialanie.php?id='.$pole['id_p'].'">'.$pole['nazwa_d'].'</a></td>'.
         '<td>'.$pole['data_d'].'</td></tr>';
    $i++;
}

echo '</table>';

//echo '<h3>Podsumowanie</h3>';
//echo '<p>W sumie pobrano '.db::returnedRows($result).' rekordów przy u¿yciu '.db::$queriesCounter.' zapytañ.</p></center>';

db::close();

?>
