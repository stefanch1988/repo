<?php

echo '
<form action="?p=opr&id_l='.$_GET['id_l'].'" method="POST">
      <p>Podaj id: <input type="text" name="id" value="'.$_GET['id_l'].'" /></p>
      <p>Podaj liczbę żywych: <input type="text" name="zywe" /></p>
      <p>Podaj liczbę martwych: <input type="text" name="martwe" /></p>
      <p>Podaj datę: <input type="text" name="data" /></p>
      <p>Podaj opis: <input type="text" name="opis" /></p></br>
      <input type="submit" name="zapisz" value="Zapisz" />
</form>';

?>
