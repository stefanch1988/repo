<?php

include("dodaj_loche.php");

echo "Witaj. Dziś jest ".date('d.m.Y').".".'</br>';

switch ($_GET['p'])
{
     case "nl":
          if(isset($_POST['zapisz']) AND $_POST['nazwa'] AND $_POST['data'])
          {
            if(dodaj_loche($_POST['nazwa'],  $_POST['data']))
            {
                 echo "Dodano lochę";
            }
            else
            {
                 echo "Błąd";
            }
          }
          else
          {
               include('form_loch.php');
          }
          break;
     case "st":
          echo '<center><h2>Stany Loch</h2><table border="1">
                            <tr>
                     <td>Lp.</td>
                     <td>Nazwa Lochy</td>
                     <td>Data dodania</td>
                     <td>Data inseminacji</td>
                     <td>Termin plan. opr.</td>
                     <td>Dodaj ins.</td>
                     <td>Dodaj opr.</td>
                     <td>Zakończ</td>
             </tr>';
          if($plik=stan_loch())
          {
               $ii = 1;
               for($i = 0; $i < count($plik); $i++)
               {
                    echo '<tr>
                     <td>'.$ii.'</td>
                     <td><a href="?p=locha&id_l='.$plik[$i][id_l].'">'.$plik[$i][nazwa].'</a></td>
                     <td>'.$plik[$i][data_dodania].'</td>
                     <td>';
                    if($data_ins = pokaz_ins($plik[$i][id_zapr]))
                    {
                         echo $data_ins[data];
                    }
                    else
                    {
                         echo '&nbsp;';
                    }
                    echo '</td>
                     <td>';
                    if($data_opr = pokaz_opr($plik[$i][id_opro]))
                    {
                         echo '<strong>'.$data_opr[data].'</strong>';
                    }
                    if($data_ins)
                    {
                         $dni = 115;
                         $data = date($data_ins[data]);
                         $wynik = date("Y-m-d",(strtotime($data) + (60*60*24*$dni)));
                         echo $wynik;
                    }
		    else
		    {
			echo '&nbsp;';
		    }
                    echo '</td>
                     <td><a href="?p=ins&id_l='.$plik[$i][id_l].'">Dodaj</a></td>
                     <td><a href="?p=opr&id_l='.$plik[$i][id_l].'">Dodaj</a></td>
                     <td><a href="?p=locha&st=z&id_l='.$plik[$i][id_l].'">Zakończ</a></td>
                     </tr>';
                    $ii++;
               }
          }
          else
          {
               echo "Błąd";
          }
          echo '</table><h5>Aktualny stan na dzień '.date("d-m-Y").'</h5></center>';
          break;
     case "locha" OR "ins" OR "opr":
          include('locha.php');
          break;
     default:
          $linki = array('nl'=> "Nowa Locha",
                        'st'=>"Stan loch"
                        );

          foreach($linki as $key => $v)
          {
               echo '<a href="/funkcje/?p='.$key.'">'.$v.'</a><br>';
          }
}

?>
