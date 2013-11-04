<center>
<table border="1" cellpadding="2" cellspacing="0" width="1000px">
       <tr align="center">
        <td rowspan="4" width="5%">Kolejne mioty</td>
        <td colspan="4" width="20%">Sektor krycia</td>
        <td colspan="7" width="45%">Porodówka</td>
        <td colspan="4" width="30%">Wskaźnik produkcji</td>
       </tr>
       <tr align="center">
        <td colspan="3">data pokrycia</td>
        <td>knur</td>
        <td colspan="3" width="22,5%">data</td>
        <td colspan="4" width="22,5%">liczba prosiąt</td>
        <td colspan="2">cykl oproszeń</td>
        <td rowspan="3">czestotliwość oproszeń</td>
        <td rowspan="3">indeks produkcji</td>
       </tr>
       <tr align="center">
        <td rowspan="2">1.</td>
        <td rowspan="2">2.</td>
        <td rowspan="2">3.</td>
        <td rowspan="2">&nbsp; </td>
        <td rowspan="2" width="9%">przewidywanego oproszenia</td>
        <td rowspan="2" width="8%">oproszenia</td>
        <td rowspan="2" width="8%">odsadzenia</td>
        <td colspan="2">urodzonych</td>
        <td colspan="2">odsadzonych</td>
        <td rowspan="2">dni na miot</td>
        <td rowspan="2">suma dni cyklu</td>
       </tr>
       <tr align="center">
        <td>martwe</td>
        <td>żywe</td>
        <td>w miocie</td>
        <td>suma</td>
       </tr>
       <?php
       //include("dodaj_loche.php");
       print_r($karta_loch = karta_lochy());
       //karta_lochy("1");

       for($i=1; $i<=10; $i++)
       {
       echo '
       <tr>
        <td>'.$i.'</td>
        <td>'.$karta_loch[0].'</td>
        <td>'.$karta_loch[3].'</td>
        <td>'.$karta_loch[4].'</td>
        <td>'.$karta_loch[1].'</td>
        <td>'.$karta_loch[6].'</td>
        <td>'.$karta_loch[7].'</td>
        <td>'.$karta_loch[8].'</td>
        <td>'.$karta_loch[9].'</td>
        <td>'.$karta_loch[10].'</td>
        <td>'.$karta_loch[11].'</td>
        <td>'.$karta_loch[12].'</td>
        <td>'.$karta_loch[13].'</td>
        <td>'.$karta_loch[14].'</td>
        <td>'.$karta_loch[15].'</td>
        <td>'.$karta_loch[16].'</td>
       </tr>';
       }
       ?>
</table>
</center>
