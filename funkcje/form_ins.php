<?php

echo'
<form action="?p=ins&id_l='.$_GET['id_l'].'" method="POST">
      <p>Podaj id: <input type="text" name="id" value="'.$_GET['id_l'].'" /></p>
      <p>Podaj liczbe inseminacji: <select name="l_ins" size="1">
               <option value="1">Pierwszy zabieg</option>
               <option value="2">Drugi zabieg</option>
               <option value="3">Trzeci zabieg</option>
      </select>
      <p>Podaj rase: <input type="text" name="rasa" /></p>
      <p>Podaj date: <input type="text" name="data" value="'.date("Y-m-d").'"/></p>
      <input type="submit" name="zapisz" value="Zapisz" />
</form>';
?>
